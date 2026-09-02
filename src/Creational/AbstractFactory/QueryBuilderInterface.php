<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: The second abstract product. It must match the connection it is used
 * with: a query built for one database will not run correctly on another.
 * RU: Второй абстрактный продукт. Он должен соответствовать соединению,
 * с которым используется: запрос, собранный под одну БД, не отработает верно в другой.
 */
interface QueryBuilderInterface
{
    public function selectAll(string $table): string;
}
