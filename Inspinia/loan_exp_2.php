<?php
ob_start();

require_once('../includes/initialize.php');
require_once(SITE_ROOT . DS . 'includes' . DS . 'functions' . DS . 'xlsx_export_functions.php');

$session->confirmation_protected_page();

if (!(User::is_caroline() || User::is_weslley())) {
    redirect_to('../index.php');
}

function loan_exp_export_report($report, $id)
{
    if ($report === "Report1" && $id === 0) {
        return ["Prêt-Rbt Mum Year Month", ReportFinance::Report1(true)];
    }

    if ($report === "Report" && in_array($id, [1, 2, 3, 4, 5], true)) {
        $titles = [
            1 => "Prêt-Rbt Mum Year",
            2 => "Mum Prêt by Year",
            3 => "Mum Rbt by Year",
            4 => "Mum Year Cash Rbt",
            5 => "Mum Year Cash Pret",
        ];
        return [$titles[$id], ReportFinance::Report($id, true)];
    }

    if ($report === "Report4" && $id === 0) {
        return ["Prêt-Rbt Mum All", ReportFinance::Report4(true)];
    }

    if ($report === "Report4a" && $id === 0) {
        return ["Prêt-Rbt Mum Cash", ReportFinance::Report4a(true)];
    }

    return null;
}

function loan_exp_table_rows_from_html($html)
{
    $previous = libxml_use_internal_errors(true);
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->loadHTML('<?xml encoding="UTF-8">' . $html, LIBXML_NOWARNING | LIBXML_NOERROR);
    libxml_clear_errors();
    libxml_use_internal_errors($previous);

    $tables = $dom->getElementsByTagName('table');
    if ($tables->length === 0) {
        return [];
    }

    $rows = [];
    foreach ($tables->item(0)->getElementsByTagName('tr') as $tr) {
        $row = [];
        foreach ($tr->childNodes as $cell) {
            if (!in_array($cell->nodeName, ['th', 'td'], true)) {
                continue;
            }
            $text = preg_replace('/\s+/u', ' ', $cell->textContent);
            $row[] = trim($text);
        }
        if ($row) {
            $rows[] = $row;
        }
    }

    return $rows;
}

$report = isset($_GET['report']) ? (string)$_GET['report'] : "";
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$payload = loan_exp_export_report($report, $id);

if ($payload === null) {
    http_response_code(400);
    echo "Invalid export request.";
    exit;
}

[$title, $html] = $payload;
$rows = loan_exp_table_rows_from_html($html);

if (!$rows) {
    http_response_code(500);
    echo "No table data found for export.";
    exit;
}

$filename = ikamy_xlsx_safe_filename($_GET['filename'] ?? "", $title);
$xlsx = ikamy_xlsx_build($title, $rows);

while (ob_get_level() > 0) {
    ob_end_clean();
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . addcslashes($filename, '"\\') . '.xlsx"');
header('Content-Length: ' . strlen($xlsx));
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

echo $xlsx;
exit;
