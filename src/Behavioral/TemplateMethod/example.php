<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Behavioral\TemplateMethod\CsvReportExporter;
use App\Behavioral\TemplateMethod\HtmlReportExporter;
use App\Behavioral\TemplateMethod\ReportExporter;

/**
 * EN: The client works with the base type and calls the template method.
 * It relies on the fixed algorithm and does not care which steps a concrete
 * exporter plugged in.
 * RU: Клиент работает с базовым типом и вызывает шаблонный метод. Он опирается
 * на фиксированный алгоритм и не знает, какие шаги подставил конкретный экспортер.
 */
function printReport(ReportExporter $exporter, array $columns, array $rows): void
{
    echo $exporter->export($columns, $rows);
}

$columns = ['id', 'name'];
$rows = [
    ['1', 'John Doe'],
    ['2', 'Jane Doe'],
];

echo "App: The same data exported as CSV (no footer hook).\n";
echo "---------------------------------\n";
printReport(new CsvReportExporter(), $columns, $rows);

echo "\nApp: The same algorithm, HTML output (footer hook used).\n";
echo "---------------------------------\n";
printReport(new HtmlReportExporter(), $columns, $rows);
