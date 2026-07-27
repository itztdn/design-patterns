<?php

namespace App\Behavioral\Command;

/**
 * EN: The Command interface. It turns a request into a stand-alone object,
 * so requests can be stored, queued, logged and undone.
 * RU: Интерфейс команды. Превращает запрос в самостоятельный объект,
 * чтобы запросы можно было хранить, ставить в очередь, логировать и отменять.
 */
interface CommandInterface
{
    public function execute(): void;

    /**
     * EN: Revert whatever execute() did. Storing the data needed for the
     * rollback is the command's own responsibility.
     * RU: Отменить то, что сделал execute(). Хранение данных, нужных для
     * отката, - забота самой команды.
     */
    public function undo(): void;
}
