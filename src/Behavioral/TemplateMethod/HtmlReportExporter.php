<?php

namespace App\Behavioral\TemplateMethod;

/**
 * EN: A Concrete Class. Besides the required steps it also overrides the
 * footer hook to append a row count - the same algorithm, a different result.
 * RU: Конкретный класс. Помимо обязательных шагов он переопределяет и
 * хук-подвал, добавляя число строк, - тот же алгоритм, другой результат.
 */
class HtmlReportExporter extends ReportExporter
{
    protected function header(array $columns): string
    {
        $cells = array_map(static fn (string $c): string => "<th>{$c}</th>", $columns);

        return '<table>' . PHP_EOL . '  <tr>' . implode('', $cells) . '</tr>' . PHP_EOL;
    }

    protected function row(array $values): string
    {
        $cells = array_map(static fn (string $v): string => "<td>{$v}</td>", $values);

        return '  <tr>' . implode('', $cells) . '</tr>' . PHP_EOL;
    }

    protected function footer(int $rowCount): string
    {
        return "  <caption>{$rowCount} rows</caption>" . PHP_EOL . '</table>' . PHP_EOL;
    }
}
