<?php

namespace App\Creational\Singleton;

trait SingletonTrait
{
    /**
     * EN: Instances are stored per class name, so every class using
     * this trait keeps its own single instance.
     * RU: Экземпляры хранятся по имени класса, поэтому каждый класс,
     * использующий этот трейт, имеет собственный единственный экземпляр.
     *
     * @var array<class-string, static>
     */
    private static array $instances = [];

    /**
     * EN: The constructor is private to prevent creation via the `new` operator.
     * RU: Конструктор закрыт, чтобы объект нельзя было создать через оператор `new`.
     */
    private function __construct() {}

    /**
     * EN: Cloning is forbidden, otherwise a second instance would appear.
     * RU: Клонирование запрещено, иначе появился бы второй экземпляр.
     */
    private function __clone() {}

    /**
     * EN: Unserializing is forbidden for the same reason.
     * RU: Десериализация запрещена по той же причине.
     */
    public function __wakeup(): void
    {
        throw new \LogicException('Cannot unserialize a singleton.');
    }

    /**
     * EN: The single access point that creates the instance on first call
     * and returns the very same object on every next call.
     * RU: Единая точка доступа: создает объект при первом вызове
     * и возвращает тот же самый объект при каждом следующем.
     */
    public static function getInstance(): static
    {
        $class = static::class;

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }
}
