<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: A concrete product of the MySQL family. It quotes identifiers with
 * backticks - the dialect the MySQL connection expects.
 * RU: Конкретный продукт семейства MySQL. Экранирует идентификаторы
 * обратными кавычками - диалект, который ждет соединение MySQL.
 */
class MySqlQueryBuilder implements QueryBuilderInterface
{
    public function selectAll(string $table): string
    {
        return "SELECT * FROM `{$table}`";
    }
}
