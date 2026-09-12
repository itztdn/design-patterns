# Composite / Компоновщик

**Category:** Structural / Структурный

## 🇬🇧 English

**What is it?**
Composite is a structural design pattern that lets you compose objects into tree structures and then work with these trees as if they were individual objects.

**What problem does it solve?**
It removes the need for the client to tell a single object from a container of objects. Without the pattern, code that walks a tree is full of "is this a leaf or a branch?" checks. Composite gives leaves and containers one common interface, so the client calls the same method on any node, and a container simply forwards the call to its children and combines the results.

**When to use it?**

- When you need to represent a part-whole hierarchy of objects (a file system, a UI made of nested components, a bill of materials, an org chart).
- When you want the client to treat single objects and compositions of objects uniformly.

**How it works:** the `Component` interface (`FileSystemItemInterface`) is shared by both the `Leaf` (`File`) and the `Composite` (`Directory`). The leaf does the real work; the composite stores children and delegates to them, so operations like `getSize()` naturally recurse down the whole tree.

**Composite vs Decorator:** both are built on an object that implements the same interface it wraps, but the goal differs. A decorator wraps exactly **one** component to add behaviour to it. A composite holds **many** children to represent a tree. Composite is about structure (part-whole), Decorator is about responsibilities.

---

## 🇷🇺 Русский

**Что это такое?**
Компоновщик - это структурный паттерн проектирования, который позволяет собирать объекты в древовидные структуры и затем работать с этими деревьями так, будто это одиночные объекты.

**Какую проблему решает?**
Избавляет клиента от необходимости отличать одиночный объект от контейнера объектов. Без паттерна код, обходящий дерево, переполнен проверками «это лист или ветка?». Компоновщик дает листьям и контейнерам один общий интерфейс, поэтому клиент вызывает один и тот же метод на любом узле, а контейнер просто пересылает вызов детям и объединяет результаты.

**Где применяется?**

- Когда нужно представить иерархию «часть-целое» (файловая система, интерфейс из вложенных компонентов, спецификация изделия, оргструктура).
- Когда нужно, чтобы клиент одинаково обращался с одиночными объектами и с их композициями.

**Как это работает:** интерфейс `Component` (`FileSystemItemInterface`) разделяют и `Leaf` (`File`), и `Composite` (`Directory`). Лист делает реальную работу; компоновщик хранит детей и делегирует им, поэтому операции вроде `getSize()` естественно рекурсивно спускаются по всему дереву.

**Компоновщик против Декоратора:** оба строятся на объекте, реализующем тот же интерфейс, что он оборачивает, но цель разная. Декоратор оборачивает ровно **один** компонент, чтобы добавить ему поведение. Компоновщик держит **много** детей, чтобы представить дерево. Компоновщик - про структуру (часть-целое), Декоратор - про обязанности.
