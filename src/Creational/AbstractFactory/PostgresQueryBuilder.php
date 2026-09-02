<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: A concrete product of the PostgreSQL family. It quotes identifiers
 * with double quotes - a different dialect from MySQL, which is exactly why
 * the query builder must match its connection.
 * RU: Конкретный продукт семейства PostgreSQL. Экранирует идентификаторы
 * двойными кавычками - диалект, отличный от MySQL, и именно поэтому
 * построитель запросов должен соответствовать своему соединению.
 */
class PostgresQueryBuilder implements QueryBuilderInterface
{
    public function selectAll(string $table): string
    {
        return "SELECT * FROM \"{$table}\"";
    }
}
