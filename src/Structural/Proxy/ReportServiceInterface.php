<?php

namespace App\Structural\Proxy;

/**
 * EN: The Subject interface. The real service and every proxy implement it,
 * so the client cannot tell whether it holds the real object or a stand-in.
 * RU: Интерфейс субъекта. Его реализуют и настоящий сервис, и каждый заместитель,
 * поэтому клиент не может понять, держит он реальный объект или подставной.
 */
interface ReportServiceInterface
{
    public function getReport(string $id): string;
}
