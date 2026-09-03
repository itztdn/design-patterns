<?php

namespace App\Behavioral\TemplateMethod;

/**
 * EN: The Abstract Class defines the template method - the skeleton of the
 * algorithm. It fixes the order of the steps once and for all; subclasses
 * fill in the format-specific ones but can never change the order.
 * RU: Абстрактный класс определяет шаблонный метод - скелет алгоритма.
 * Он раз и навсегда закрепляет порядок шагов; подклассы заполняют шаги,
 * зависящие от формата, но не могут изменить их порядок.
 */
abstract class ReportExporter
{
    /**
     * EN: The template method. It is final on purpose: the whole point of the
     * pattern is that subclasses customize the steps, not the algorithm itself.
     * RU: Шаблонный метод. Он final намеренно: весь смысл паттерна в том, что
     * подклассы настраивают шаги, а не сам алгоритм.
     *
     * @param string[] $columns
     * @param array<int, string[]> $rows
     */
    final public function export(array $columns, array $rows): string
    {
        echo static::class . ": building the report" . PHP_EOL;

        $document = $this->header($columns);

        foreach ($rows as $row) {
            $document .= $this->row($row);
        }

        // EN: A hook: subclasses may add something at the end, or ignore it.
        // RU: Хук: подклассы могут что-то добавить в конце или проигнорировать его.
        $document .= $this->footer(count($rows));

        return $document;
    }

    /**
     * EN: Required steps - every concrete exporter must provide them.
     * RU: Обязательные шаги - каждый конкретный экспортер должен их предоставить.
     *
     * @param string[] $columns
     */
    abstract protected function header(array $columns): string;

    /**
     * @param string[] $values
     */
    abstract protected function row(array $values): string;

    /**
     * EN: A hook step with a default empty implementation. Subclasses override
     * it only if they need a footer, so it is optional, not required.
     * RU: Шаг-хук с пустой реализацией по умолчанию. Подклассы переопределяют
     * его, только если нужен подвал, поэтому он необязательный.
     */
    protected function footer(int $rowCount): string
    {
        return '';
    }
}
