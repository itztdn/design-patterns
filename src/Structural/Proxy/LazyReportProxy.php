<?php

namespace App\Structural\Proxy;

/**
 * EN: A Virtual Proxy. It creates the real subject only on the first
 * request (lazy loading) and caches results, so repeated calls never
 * reach the expensive service again.
 * RU: Виртуальный заместитель. Создает реальный субъект только при первом
 * обращении (ленивая загрузка) и кэширует результаты, поэтому повторные
 * вызовы больше не доходят до дорогого сервиса.
 */
class LazyReportProxy implements ReportServiceInterface
{
    private ?ReportGenerator $generator = null;

    /** @var array<string, string> */
    private array $cache = [];

    public function getReport(string $id): string
    {
        if (array_key_exists($id, $this->cache)) {
            echo "LazyReportProxy: returning cached report '{$id}'" . PHP_EOL;

            return $this->cache[$id];
        }

        // EN: The real subject is built here, not in the constructor:
        // if no report is ever requested, it is never created at all.
        // RU: Реальный субъект создается здесь, а не в конструкторе:
        // если отчет так и не запросят, он вообще не будет создан.
        if ($this->generator === null) {
            echo 'LazyReportProxy: first request, creating the real generator' . PHP_EOL;
            $this->generator = new ReportGenerator();
        }

        return $this->cache[$id] = $this->generator->getReport($id);
    }
}
