<?php

namespace App\Structural\Proxy;

/**
 * EN: The Real Subject - the class that does the actual, expensive work.
 * Both creating it and running a report are costly, which is exactly
 * what the proxies below help to avoid when possible.
 * RU: Реальный субъект - класс, который делает настоящую, дорогую работу.
 * И его создание, и построение отчета затратны - именно этого заместители
 * ниже и помогают избегать, когда это возможно.
 */
class ReportGenerator implements ReportServiceInterface
{
    public function __construct()
    {
        // EN: Imagine a heavy connection or warm-up happening here.
        // RU: Представьте здесь тяжелое подключение или прогрев.
        echo 'ReportGenerator: expensive initialization...' . PHP_EOL;
    }

    public function getReport(string $id): string
    {
        echo "ReportGenerator: crunching numbers for report '{$id}'..." . PHP_EOL;

        return "REPORT[{$id}]";
    }
}
