<?php

namespace App\Behavioral\Command;

/**
 * EN: A Concrete Command. It stores the receiver and the parameters
 * of the request, and knows how to undo itself.
 * RU: Конкретная команда. Хранит получателя и параметры запроса,
 * а также знает, как отменить саму себя.
 */
class AppendTextCommand implements CommandInterface
{
    public function __construct(
        private readonly TextDocument $document,
        private readonly string $text
    ) {}

    public function execute(): void
    {
        echo "AppendTextCommand: appending '{$this->text}'" . PHP_EOL;

        $this->document->append($this->text);
    }

    public function undo(): void
    {
        echo "AppendTextCommand: removing '{$this->text}'" . PHP_EOL;

        // EN: We appended a known string, so undoing is simply cutting it off.
        // RU: Мы дописали известную строку, поэтому отмена - это просто отрезать ее.
        $this->document->removeFromEnd(strlen($this->text));
    }
}
