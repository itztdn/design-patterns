<?php

namespace App\Behavioral\Command;

/**
 * EN: The Invoker. It triggers commands and keeps a history, but it has no
 * idea what a command does or which receiver stands behind it.
 * RU: Инициатор. Он запускает команды и ведет историю, но понятия не имеет,
 * что делает команда и какой получатель стоит за ней.
 */
class EditorInvoker
{
    /** @var CommandInterface[] */
    private array $history = [];

    public function run(CommandInterface $command): void
    {
        $command->execute();

        // EN: Remember the command so it can be undone later.
        // RU: Запоминаем команду, чтобы позже ее можно было отменить.
        $this->history[] = $command;
    }

    public function undoLast(): void
    {
        $command = array_pop($this->history);

        if ($command === null) {
            echo "EditorInvoker: nothing to undo" . PHP_EOL;

            return;
        }

        $command->undo();
    }
}
