<?php

namespace App\Behavioral\Command;

/**
 * EN: A destructive command. It cannot reconstruct the previous text from
 * its parameters, so it snapshots the state before changing it.
 * RU: Разрушающая команда. Она не может восстановить прежний текст из своих
 * параметров, поэтому делает снимок состояния перед изменением.
 */
class ClearDocumentCommand implements CommandInterface
{
    private ?string $backup = null;

    public function __construct(
        private readonly TextDocument $document
    ) {}

    public function execute(): void
    {
        echo "ClearDocumentCommand: clearing the document" . PHP_EOL;

        $this->backup = $this->document->getContent();
        $this->document->replaceAll('');
    }

    public function undo(): void
    {
        echo "ClearDocumentCommand: restoring the document" . PHP_EOL;

        $this->document->replaceAll($this->backup ?? '');
    }
}
