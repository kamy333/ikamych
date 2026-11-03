<?php
require_once __DIR__ . '/../includes/loan_exp_people.php';

function check($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$people = [
    ['id' => 28, 'person_name' => 'Kamy_2026', 'close_person' => 0],
    ['id' => 26, 'person_name' => 'Kamy_2025', 'close_person' => 1],
    ['id' => 2, 'person_name' => 'Zero account', 'close_person' => 0],
];
$balances = [28 => -13000, 26 => -17190, 2 => 0];
$all = loan_exp_people_selection(['person_id' => 'all'], $people, true, 2);
check($all['ids'] === [28, 26, 2], 'All people must include historical accounts.');

$combined = loan_exp_people_selection([
    'person_id' => 'selected',
    'person_ids' => ['28', '26', '28', '9999', '1 OR 1=1', ['28']],
], $people, true, 2);
check($combined['ids'] === [28, 26], 'Only distinct known integer IDs may reach the table query.');
check($combined['title'] === 'Kamy_2026 + Kamy_2025', 'The heading must identify the combination.');
$params = [];
$types = '';
$where = loan_exp_people_where($combined, $balances, false, $params, $types);
check($params === [28, 26] && $types === 'ii' && substr_count($where, '?') === 2, 'Both accounts must be bound to the query.');

$params = [];
$types = '';
loan_exp_people_where($all, $balances, true, $params, $types);
check($params === [28, 26], 'Hide zero balances must apply to grouped views.');
check($all['ids'] === [28, 26, 2], 'Balance filters must preserve the chosen scope.');

foreach ([[], ['9999'], '28', [['28']]] as $invalid) {
    $empty = loan_exp_people_selection(['person_id' => 'selected', 'person_ids' => $invalid], $people, true, 2);
    $params = [];
    $types = '';
    check($empty['invalid'] && strpos(loan_exp_people_where($empty, [], false, $params, $types), '1=0') !== false, 'An invalid selection must never expand to all accounts.');
}

foreach (['all', 'selected', '28'] as $mode) {
    $restricted = loan_exp_people_selection(['person_id' => $mode, 'person_ids' => [28, 26]], $people, false, 2);
    check($restricted['mode'] === 'single' && $restricted['ids'] === [2], 'Grouped filters must not expand a restricted user scope.');
}

function h($value) { return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8'); }
$html = loan_exp_people_hidden_inputs($combined);
check(substr_count($html, 'name="person_ids[]"') === 2 && strpos($html, 'value="selected"') !== false, 'Advanced filter forms must preserve the combination.');
echo "Loan people regression checks passed.\n";
