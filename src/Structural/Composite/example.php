<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Structural\Composite\Directory;
use App\Structural\Composite\File;
use App\Structural\Composite\FileSystemItemInterface;

/**
 * EN: The client works with the interface, so it makes no distinction
 * between a single file and a whole directory tree.
 * RU: Клиент работает с интерфейсом, поэтому не делает разницы между
 * одиночным файлом и целым деревом папок.
 */
function report(FileSystemItemInterface $item): void
{
    echo $item->render();
    echo "Total size of '{$item->getName()}': {$item->getSize()} B" . PHP_EOL;
}

// EN: Build a tree of directories and files nested to any depth.
// RU: Строим дерево из папок и файлов, вложенных на любую глубину.
$project = (new Directory('project'))
    ->add(new File('README.md', 120))
    ->add((new Directory('src'))
        ->add(new File('App.php', 400))
        ->add((new Directory('Models'))
            ->add(new File('User.php', 250))
            ->add(new File('Order.php', 300))));

echo "App: A whole tree is handled through one call.\n";
echo "---------------------------------\n";
report($project);

echo "\nApp: The very same call works on a single leaf.\n";
echo "---------------------------------\n";
report(new File('standalone.txt', 42));
