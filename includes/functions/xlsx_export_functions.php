<?php

function ikamy_xlsx_column_name($index)
{
    $name = "";
    while ($index > 0) {
        $index--;
        $name = chr(65 + ($index % 26)) . $name;
        $index = intdiv($index, 26);
    }
    return $name;
}

function ikamy_xlsx_xml($value)
{
    $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F]/u', '', (string)$value);
    return htmlspecialchars((string)$value, ENT_XML1 | ENT_COMPAT, "UTF-8");
}

function ikamy_xlsx_normalize_number($value)
{
    $text = trim((string)$value);
    if ($text === "" || preg_match('/\d{4}-\d{2}-\d{2}/', $text)) {
        return null;
    }

    $normalized = str_replace(["'", " ", ","], "", $text);
    if (!preg_match('/^-?\d+(?:\.\d+)?$/', $normalized)) {
        return null;
    }

    return [
        "value" => $normalized,
        "decimal" => str_contains($text, ".") || str_contains($text, ","),
        "negative" => (float)$normalized < 0,
    ];
}

function ikamy_xlsx_sheet_xml($title, array $rows)
{
    $columnCount = 1;
    foreach ($rows as $row) {
        $columnCount = max($columnCount, count($row));
    }

    $rowCount = count($rows) + 1;
    $lastColumn = ikamy_xlsx_column_name($columnCount);
    $dimension = 'A1:' . $lastColumn . $rowCount;
    $widths = array_fill(1, $columnCount, 10);

    foreach ($rows as $row) {
        foreach ($row as $index => $value) {
            $widths[$index + 1] = min(60, max($widths[$index + 1], mb_strlen((string)$value) + 2));
        }
    }

    $cols = "";
    foreach ($widths as $index => $width) {
        $cols .= '<col min="' . $index . '" max="' . $index . '" width="' . max(9, $width) . '" customWidth="1"/>';
    }

    $sheetData = '<row r="1" ht="24" customHeight="1"><c r="A1" t="inlineStr" s="1"><is><t>' . ikamy_xlsx_xml($title) . '</t></is></c></row>';

    foreach ($rows as $rowIndex => $row) {
        $excelRow = $rowIndex + 2;
        $sheetData .= '<row r="' . $excelRow . '">';
        foreach ($row as $columnIndex => $value) {
            $excelColumn = ikamy_xlsx_column_name($columnIndex + 1);
            $cellRef = $excelColumn . $excelRow;
            $number = $rowIndex === 0 ? null : ikamy_xlsx_normalize_number($value);

            if ($rowIndex === 0) {
                $sheetData .= '<c r="' . $cellRef . '" t="inlineStr" s="2"><is><t>' . ikamy_xlsx_xml($value) . '</t></is></c>';
            } elseif ($number !== null) {
                $style = $number["decimal"] ? ($number["negative"] ? 4 : 3) : 0;
                $styleAttr = $style ? ' s="' . $style . '"' : "";
                $sheetData .= '<c r="' . $cellRef . '"' . $styleAttr . '><v>' . $number["value"] . '</v></c>';
            } else {
                $sheetData .= '<c r="' . $cellRef . '" t="inlineStr"><is><t>' . ikamy_xlsx_xml($value) . '</t></is></c>';
            }
        }
        $sheetData .= '</row>';
    }

    $autoFilter = $rowCount >= 2 ? '<autoFilter ref="A2:' . $lastColumn . $rowCount . '"/>' : "";
    $mergeCells = '<mergeCells count="1"><mergeCell ref="A1:' . $lastColumn . '1"/></mergeCells>';

    return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'
        . '<dimension ref="' . $dimension . '"/>'
        . '<sheetViews><sheetView workbookViewId="0"><pane ySplit="2" topLeftCell="A3" activePane="bottomLeft" state="frozen"/></sheetView></sheetViews>'
        . '<sheetFormatPr defaultRowHeight="15"/>'
        . '<cols>' . $cols . '</cols>'
        . '<sheetData>' . $sheetData . '</sheetData>'
        . $autoFilter
        . $mergeCells
        . '<pageMargins left="0.7" right="0.7" top="0.75" bottom="0.75" header="0.3" footer="0.3"/>'
        . '</worksheet>';
}

function ikamy_xlsx_styles_xml()
{
    return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
        . '<numFmts count="1"><numFmt numFmtId="164" formatCode="#,##0.00"/></numFmts>'
        . '<fonts count="4">'
        . '<font><sz val="11"/><name val="Calibri"/></font>'
        . '<font><b/><sz val="14"/><color rgb="FFFFFFFF"/><name val="Calibri"/></font>'
        . '<font><b/><color rgb="FFFFFFFF"/><name val="Calibri"/></font>'
        . '<font><color rgb="FFC00000"/><name val="Calibri"/></font>'
        . '</fonts>'
        . '<fills count="4">'
        . '<fill><patternFill patternType="none"/></fill>'
        . '<fill><patternFill patternType="gray125"/></fill>'
        . '<fill><patternFill patternType="solid"><fgColor rgb="FF002B7F"/><bgColor indexed="64"/></patternFill></fill>'
        . '<fill><patternFill patternType="solid"><fgColor rgb="FFFCD116"/><bgColor indexed="64"/></patternFill></fill>'
        . '</fills>'
        . '<borders count="2">'
        . '<border><left/><right/><top/><bottom/><diagonal/></border>'
        . '<border><left style="thin"><color rgb="FFD9E2F3"/></left><right style="thin"><color rgb="FFD9E2F3"/></right><top style="thin"><color rgb="FFD9E2F3"/></top><bottom style="thin"><color rgb="FFD9E2F3"/></bottom><diagonal/></border>'
        . '</borders>'
        . '<cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0"/></cellStyleXfs>'
        . '<cellXfs count="5">'
        . '<xf numFmtId="0" fontId="0" fillId="0" borderId="0" xfId="0"/>'
        . '<xf numFmtId="0" fontId="1" fillId="2" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1"><alignment horizontal="center"/></xf>'
        . '<xf numFmtId="0" fontId="2" fillId="2" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1"><alignment horizontal="center"/></xf>'
        . '<xf numFmtId="164" fontId="0" fillId="0" borderId="0" xfId="0" applyNumberFormat="1"><alignment horizontal="right"/></xf>'
        . '<xf numFmtId="164" fontId="3" fillId="0" borderId="0" xfId="0" applyFont="1" applyNumberFormat="1"><alignment horizontal="right"/></xf>'
        . '</cellXfs>'
        . '<cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0"/></cellStyles>'
        . '</styleSheet>';
}

function ikamy_xlsx_build($title, array $rows)
{
    if (!class_exists('ZipArchive')) {
        throw new RuntimeException("ZipArchive is required to export Excel files.");
    }

    $tmp = tempnam(sys_get_temp_dir(), "ikamy_xlsx_");
    $zip = new ZipArchive();
    if ($zip->open($tmp, ZipArchive::OVERWRITE) !== true) {
        throw new RuntimeException("Unable to create Excel export.");
    }

    $zip->addFromString('[Content_Types].xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types"><Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/><Default Extension="xml" ContentType="application/xml"/><Override PartName="/docProps/core.xml" ContentType="application/vnd.openxmlformats-package.core-properties+xml"/><Override PartName="/docProps/app.xml" ContentType="application/vnd.openxmlformats-officedocument.extended-properties+xml"/><Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/><Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/><Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/></Types>');
    $zip->addFromString('_rels/.rels', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/><Relationship Id="rId2" Type="http://schemas.openxmlformats.org/package/2006/relationships/metadata/core-properties" Target="docProps/core.xml"/><Relationship Id="rId3" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/extended-properties" Target="docProps/app.xml"/></Relationships>');
    $zip->addFromString('docProps/app.xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Properties xmlns="http://schemas.openxmlformats.org/officeDocument/2006/extended-properties" xmlns:vt="http://schemas.openxmlformats.org/officeDocument/2006/docPropsVTypes"><Application>ikamy.ch</Application></Properties>');
    $zip->addFromString('docProps/core.xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><cp:coreProperties xmlns:cp="http://schemas.openxmlformats.org/package/2006/metadata/core-properties" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><dc:title>' . ikamy_xlsx_xml($title) . '</dc:title><dc:creator>ikamy.ch</dc:creator><cp:lastModifiedBy>ikamy.ch</cp:lastModifiedBy><dcterms:created xsi:type="dcterms:W3CDTF">' . gmdate('c') . '</dcterms:created><dcterms:modified xsi:type="dcterms:W3CDTF">' . gmdate('c') . '</dcterms:modified></cp:coreProperties>');
    $zip->addFromString('xl/workbook.xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><workbookPr/><bookViews><workbookView xWindow="0" yWindow="0" windowWidth="28800" windowHeight="17600"/></bookViews><sheets><sheet name="Loan Export" sheetId="1" r:id="rId1"/></sheets></workbook>');
    $zip->addFromString('xl/_rels/workbook.xml.rels', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/><Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/></Relationships>');
    $zip->addFromString('xl/styles.xml', ikamy_xlsx_styles_xml());
    $zip->addFromString('xl/worksheets/sheet1.xml', ikamy_xlsx_sheet_xml($title, $rows));
    $zip->close();

    $bytes = file_get_contents($tmp);
    unlink($tmp);
    return $bytes;
}

function ikamy_xlsx_safe_filename($filename, $fallback)
{
    $name = urldecode((string)$filename);
    $name = trim(preg_replace('/[^\pL\pN _.-]+/u', '', $name));
    $name = trim(preg_replace('/\s+/u', ' ', $name));
    if ($name === "") {
        $name = $fallback;
    }
    return $name;
}
