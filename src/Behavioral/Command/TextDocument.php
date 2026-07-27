<?php

namespace App\Behavioral\Command;

/**
 * EN: The Receiver. It knows how to actually change the text.
 * Commands call these methods but contain no business logic themselves.
 * RU: Получатель. Он умеет реально менять текст. Команды вызывают эти
 * методы, но сами бизнес-логики не содержат.
 */
class TextDocument
{
    private string $content = '';

    public function append(string $text): void
    {
        $this->content .= $text;
    }

    public function removeFromEnd(int $length): void
    {
        $this->content = substr($this->content, 0, -$length);
    }

    public function replaceAll(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
