# State / Состояние

**Category:** Behavioral / Поведенческий

## 🇬🇧 English

**What is it?**
State is a behavioral design pattern that lets an object change its behaviour when its internal state changes. It looks as if the object changed its class.

**What problem does it solve?**
It removes sprawling conditionals that check a status field in every method. Without the pattern, `pay()`, `ship()` and `cancel()` each grow a `switch ($this->status)` with a branch per state, and every new state means editing all of them. The State pattern moves the behaviour of each state into its own class, and the allowed transitions live right next to that behaviour.

**When to use it?**

- When an object behaves differently depending on its current state, and the number of states and state-specific methods is large.
- When the code is full of conditionals that branch on the object's status.
- When transitions between states follow clear rules that you want to keep in one place per state, not scattered across the context.

**State vs Strategy:** the structure is almost identical - a context delegates to a swappable object. The difference is who swaps it and why. A strategy is chosen by the client from the outside and usually does not know about the others. A state is usually chosen from the inside: states know each other and trigger the transitions between themselves, forming a state machine.

**Note on the example:** the transition rules live inside the states - `NewOrderState::pay()` decides that paying leads to `PaidOrderState`. The context only holds the current state and forwards calls, so adding a new state never touches `OrderContext`.

---

## 🇷🇺 Русский

**Что это такое?**
Состояние - это поведенческий паттерн проектирования, который позволяет объекту менять поведение при изменении его внутреннего состояния. Выглядит так, будто объект сменил свой класс.

**Какую проблему решает?**
Убирает разрастающиеся условия, которые в каждом методе проверяют поле статуса. Без паттерна `pay()`, `ship()` и `cancel()` обрастают конструкцией `switch ($this->status)` с веткой на каждое состояние, и любое новое состояние означает правку их всех. Паттерн «Состояние» выносит поведение каждого состояния в отдельный класс, а разрешенные переходы живут рядом с этим поведением.

**Где применяется?**

- Когда объект ведет себя по-разному в зависимости от текущего состояния, а число состояний и зависящих от них методов велико.
- Когда код переполнен условиями, ветвящимися по статусу объекта.
- Когда переходы между состояниями подчиняются четким правилам, которые хочется держать в одном месте на каждое состояние, а не размазывать по контексту.

**Состояние против Стратегии:** структура почти одинакова - контекст делегирует работу заменяемому объекту. Разница в том, кто и зачем его заменяет. Стратегию выбирает клиент снаружи, и обычно она не знает о других. Состояние обычно выбирается изнутри: состояния знают друг о друге и сами инициируют переходы между собой, образуя конечный автомат.

**Про пример:** правила переходов живут внутри состояний - `NewOrderState::pay()` решает, что оплата ведет в `PaidOrderState`. Контекст лишь хранит текущее состояние и пересылает вызовы, поэтому добавление нового состояния не затрагивает `OrderContext`.
