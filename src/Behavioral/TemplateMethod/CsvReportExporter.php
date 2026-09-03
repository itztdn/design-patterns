<?php

namespace App\Behavioral\TemplateMethod;

/**
 * EN: A Concrete Class. It implements only the required steps and leaves the
 * optional footer hook untouched, so a CSV file gets no footer.
 * RU: Конкретный класс. Реализует только обязательные шаги и не трогает
 * необязательный хук-подвал, поэтому у CSV-файла подвала нет.
 */
class CsvReportExporter extends ReportExporter
{
    protected function header(array $columns): string
    {
        return implode(',', $columns) . PHP_EOL;
    }

    protected function row(array $values): string
    {
        return implode(',', $values) . PHP_EOL;
    }
}
