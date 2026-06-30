# Factory Method / Фабричный метод

**Category:** Creational / Порождающий

## 🇬🇧 English

**What is it?**
Factory Method is a creational design pattern that provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created.

**What problem does it solve?**
It eliminates tight coupling between the creator class and the concrete products it produces. If you need to add a new product type (e.g., Push Notifications), you don't have to modify the existing creator's code; you just create a new subclass.

**When to use it?**

- When you don't know beforehand the exact types and dependencies of the objects your code should work with.
- When you want to provide users of your library or framework with a way to extend its internal components.

---

## 🇷🇺 Русский

**Что это такое?**
Фабричный метод - это порождающий паттерн проектирования, который определяет общий интерфейс для создания объектов в суперклассе, позволяя подклассам изменять тип создаваемых объектов.

**Какую проблему решает?**
Паттерн избавляет от жесткой привязки класса-создателя к конкретным классам продуктов. Если нужно добавить новый тип продукта (например, Push-уведомления), не придется менять существующий код создателя - достаточно создать новый подкласс.

**Где применяется?**

- Когда заранее неизвестны точные типы и зависимости объектов, с которыми должен работать код.
- Когда вы хотите дать пользователям вашей библиотеки или фреймворка возможность расширять ее внутренние компоненты (например, драйверы БД или логгеры).
