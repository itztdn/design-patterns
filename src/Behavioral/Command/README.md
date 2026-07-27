# Command / Команда

**Category:** Behavioral / Поведенческий

## 🇬🇧 English

**What is it?**
Command is a behavioral design pattern that turns a request into a stand-alone object containing all the information about that request. This lets you pass requests as method arguments, queue or log them, and support undoable operations.

**What problem does it solve?**
It decouples the object that invokes an operation from the one that knows how to perform it. The invoker (a button, a menu item, a job queue) works only with the command interface, so the same trigger can run any command, and new commands are added without touching the invoker.

**When to use it?**

- When you want to parametrize objects with operations (buttons, menu items, hotkeys that all share one "run a command" mechanism).
- When you need to queue, schedule or execute operations remotely.
- When you want reversible operations: because a command is an object, it can store the state needed to undo itself and be kept in a history.

**Note on the example:** the two commands undo themselves differently. `AppendTextCommand` can reconstruct the change from its own parameters. `ClearDocumentCommand` is destructive, so it snapshots the previous text before clearing and restores it on undo - a common split between reversible and destructive commands.

**Command vs Strategy:** both wrap behaviour in an object, but a strategy is a swappable *way of doing one thing* (how to pay), while a command is a *whole request* the invoker fires blindly and can put in a history or a queue.

---

## 🇷🇺 Русский

**Что это такое?**
Команда - это поведенческий паттерн проектирования, который превращает запрос в самостоятельный объект, содержащий всю информацию об этом запросе. Это позволяет передавать запросы как аргументы методов, ставить их в очередь, логировать и поддерживать отмену операций.

**Какую проблему решает?**
Разрывает связь между объектом, который вызывает операцию, и объектом, который знает, как ее выполнить. Инициатор (кнопка, пункт меню, очередь задач) работает только с интерфейсом команды, поэтому один и тот же триггер может запускать любую команду, а новые команды добавляются без изменения инициатора.

**Где применяется?**

- Когда нужно параметризовать объекты операциями (кнопки, пункты меню, горячие клавиши используют один механизм «выполнить команду»).
- Когда операции нужно ставить в очередь, планировать или выполнять удаленно.
- Когда нужны обратимые операции: команда - это объект, поэтому она может хранить состояние для отмены самой себя и лежать в истории.

**Про пример:** две команды отменяются по-разному. `AppendTextCommand` восстанавливает изменение из собственных параметров. `ClearDocumentCommand` разрушающая, поэтому перед очисткой сохраняет снимок прежнего текста и восстанавливает его при отмене - типичное разделение на обратимые и разрушающие команды.

**Команда против Стратегии:** оба паттерна оборачивают поведение в объект, но стратегия - это взаимозаменяемый *способ делать одно дело* (как оплатить), а команда - это *целый запрос*, который инициатор запускает вслепую и может положить в историю или очередь.
