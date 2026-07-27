<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Behavioral\Command\AppendTextCommand;
use App\Behavioral\Command\ClearDocumentCommand;
use App\Behavioral\Command\EditorInvoker;
use App\Behavioral\Command\TextDocument;

$document = new TextDocument();
$invoker = new EditorInvoker();

/**
 * EN: A tiny helper so we can watch the document change after each step.
 * RU: Маленький помощник, чтобы видеть состояние документа после каждого шага.
 */
$show = static function (TextDocument $document): void {
    echo "  document is now: '{$document->getContent()}'" . PHP_EOL;
};

echo "App: The invoker executes commands without knowing their internals.\n";
echo "---------------------------------\n";

$invoker->run(new AppendTextCommand($document, 'Hello'));
$show($document);

$invoker->run(new AppendTextCommand($document, ', world'));
$show($document);

$invoker->run(new ClearDocumentCommand($document));
$show($document);

echo "\nApp: Undo walks the history backwards, each command reverting itself.\n";
echo "---------------------------------\n";

$invoker->undoLast(); // EN: bring the cleared text back / RU: возвращаем очищенный текст
$show($document);

$invoker->undoLast(); // EN: remove ', world' / RU: убираем ', world'
$show($document);

$invoker->undoLast(); // EN: remove 'Hello' / RU: убираем 'Hello'
$show($document);

echo "\nApp: An empty history is handled gracefully.\n";
echo "---------------------------------\n";

$invoker->undoLast();
$show($document);
