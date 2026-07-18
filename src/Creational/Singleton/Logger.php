<?php

namespace App\Creational\Singleton;

class Logger
{
    use SingletonTrait;

    /** @var string[] */
    private array $records = [];

    public function log(string $message): void
    {
        $this->records[] = $message;

        echo "Logger: {$message}" . PHP_EOL;
    }

    /**
     * EN: The shared state proves that every caller works with the same object.
     * RU: Общее состояние доказывает, что все вызывающие работают с одним объектом.
     *
     * @return string[]
     */
    public function getRecords(): array
    {
        return $this->records;
    }
}
