# Facade / Фасад

**Category:** Structural / Структурный

## 🇬🇧 English

**What is it?**
Facade is a structural design pattern that provides a simple, unified interface to a complex subsystem of classes, a library or a framework.

**What problem does it solve?**
It stops the details of a subsystem from leaking into the client code. Without a facade, every controller that places an order has to know which services to call, in which order, and what to do when one of the steps fails. The facade keeps that scenario in one place, so the client makes a single call and depends on one class instead of four.

**When to use it?**

- When you need a simple entry point to a subsystem whose full power is only rarely required.
- When you want to reduce coupling: client code depends on the facade, and rearranging the subsystem behind it changes nothing for the client.
- When you wrap a bulky third-party library and want the rest of the application to see only the part you actually use.

**Facade vs Adapter:** an adapter makes an existing object fit an interface the client already requires. A facade invents a new, more convenient interface over several objects - nobody asked it to match an existing contract.

**Note on the example:** the facade does not forbid direct access. The last part of `example.php` calls `InventoryService` on its own, because a facade is a convenience layer, not a wall around the subsystem.

---

## 🇷🇺 Русский

**Что это такое?**
Фасад - это структурный паттерн проектирования, который предоставляет простой единый интерфейс к сложной подсистеме классов, библиотеке или фреймворку.

**Какую проблему решает?**
Не дает деталям подсистемы протечь в клиентский код. Без фасада каждый контроллер, оформляющий заказ, обязан знать, какие сервисы вызывать, в каком порядке и что делать, если один из шагов не удался. Фасад держит этот сценарий в одном месте: клиент делает один вызов и зависит от одного класса вместо четырех.

**Где применяется?**

- Когда нужна простая точка входа в подсистему, вся мощь которой требуется лишь изредка.
- Когда нужно ослабить связанность: клиентский код зависит от фасада, и перестановки внутри подсистемы для клиента ничего не меняют.
- Когда оборачивается громоздкая сторонняя библиотека и остальному приложению нужно видеть только используемую часть.

**Фасад против Адаптера:** адаптер подгоняет существующий объект под интерфейс, который клиент уже требует. Фасад придумывает новый, более удобный интерфейс поверх нескольких объектов - никто не просил его соответствовать существующему контракту.

**Про пример:** фасад не запрещает прямой доступ. В последней части `example.php` `InventoryService` вызывается напрямую, потому что фасад - это слой удобства, а не стена вокруг подсистемы.
