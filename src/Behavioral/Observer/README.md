# Observer / Наблюдатель

**Category:** Behavioral / Поведенческий

## 🇬🇧 English

**What is it?**
Observer is a behavioral design pattern that lets you define a subscription mechanism to notify multiple objects about any events that happen to the object they're observing.

**What problem does it solve?**
It eliminates tight coupling between core business logic and its side effects. Instead of hardcoding all the actions that should happen after a specific event (e.g., sending emails, writing logs, updating cache), the main object simply announces that the event occurred, and all interested subscribers react to it independently.

**When to use it?**

- When changes to the state of one object may require changing other objects, and the actual set of objects is unknown beforehand or changes dynamically.
- When creating event-driven systems (Publish/Subscribe architecture).
- When some objects in your app must observe others, but only for a limited time or in specific cases.

---

## 🇷🇺 Русский

**Что это такое?**
Наблюдатель - это поведенческий паттерн проектирования, который создает механизм подписки, позволяющий одним объектам следить и реагировать на события, происходящие в других объектах.

**Какую проблему решает?**
Устраняет жесткую привязку основной бизнес-логики к побочным эффектам. Вместо того чтобы прописывать все действия (отправку писем, логирование, сброс кэша) прямо в коде, основной объект просто оповещает, что событие произошло. Все заинтересованные подписчики реагируют на это самостоятельно.

**Где применяется?**

- Когда изменение состояния одного объекта требует изменения других, причем список этих объектов может меняться динамически.
- При создании событийно-ориентированных систем (архитектура Publish/Subscribe).
- Когда объектам нужно наблюдать за другими объектами, но не постоянно, а только в определенных случаях.
