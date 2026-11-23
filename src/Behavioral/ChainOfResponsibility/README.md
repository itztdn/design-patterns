# Chain of Responsibility / Цепочка обязанностей

**Category:** Behavioral / Поведенческий

## 🇬🇧 English

**What is it?**
Chain of Responsibility is a behavioral design pattern that lets you pass a request along a chain of handlers. Upon receiving a request, each handler decides either to process it and stop, or to pass it to the next handler in the chain.

**What problem does it solve?**
It decouples the sender of a request from its receivers. Without the pattern, all the checks an HTTP request must go through - rate limiting, authentication and so on - end up in one big method full of `if` statements. That method grows with every new rule, and its checks are hard to reorder or reuse. Chain of Responsibility turns each check into a separate handler object with a single job. The handlers are linked into a chain, and the client sends the request only to the first one, without knowing how many handlers there are or which of them will respond.

**When to use it?**

- When a request must go through a sequence of checks or processing steps, and any of them may stop it (middleware in Laravel, Symfony and PSR-15, event handling, validation).
- When the set of handlers and their order should be configurable at runtime.
- When more than one object may handle a request, and the handler is not known in advance - it is found as the request travels along the chain.

**How it works:** the `Handler` interface (`HandlerInterface`) declares `setNext()` for linking and `handle()` for processing. The `Base Handler` (`AbstractHandler`) stores the link to the next handler and by default simply passes the request on. Each `Concrete Handler` (`RateLimitHandler`, `AuthenticationHandler`, `ControllerHandler`) either returns a response, which stops the chain, or calls `parent::handle()` to pass the request further.

**Chain of Responsibility vs Decorator:** the structure is very similar - each object implements a common interface and holds a reference to the next one. The difference is in the control flow. A decorator always delegates to the wrapped object and only adds behaviour around the call. A handler in a chain may decide **not** to pass the request on at all, and the handlers are independent of one another.

**Note on the example:** the order of the links matters. The cheap `RateLimitHandler` stands first, so a client over the limit is rejected before the more expensive token check even runs. The same handler classes are then combined into a different chain for a public page that needs no authentication. The last scenario shows a known consequence of the pattern: if no handler at the end of the chain responds, the request falls off the chain unhandled and `handle()` returns `null`.

---

## 🇷🇺 Русский

**Что это такое?**
Цепочка обязанностей - это поведенческий паттерн проектирования, который позволяет передавать запрос по цепочке обработчиков. Получив запрос, каждый обработчик решает: обработать его и остановиться или передать следующему обработчику в цепочке.

**Какую проблему решает?**
Отвязывает отправителя запроса от его получателей. Без паттерна все проверки, через которые должен пройти HTTP-запрос, - ограничение частоты запросов, аутентификация и так далее - оказываются в одном большом методе, полном `if`. Такой метод разрастается с каждым новым правилом, а его проверки трудно переставить или переиспользовать. Цепочка обязанностей превращает каждую проверку в отдельный объект-обработчик с одной задачей. Обработчики связываются в цепочку, а клиент отправляет запрос только первому из них, не зная, сколько всего обработчиков и какой из них ответит.

**Где применяется?**

- Когда запрос должен пройти последовательность проверок или шагов обработки, и любой из них может его остановить (middleware в Laravel, Symfony и PSR-15, обработка событий, валидация).
- Когда набор обработчиков и их порядок должны настраиваться во время выполнения.
- Когда запрос может обработать несколько объектов, и заранее неизвестно какой - это выясняется по мере движения запроса по цепочке.

**Как это работает:** интерфейс `Handler` (`HandlerInterface`) объявляет `setNext()` для связывания и `handle()` для обработки. `Base Handler` (`AbstractHandler`) хранит ссылку на следующий обработчик и по умолчанию просто передает запрос дальше. Каждый `Concrete Handler` (`RateLimitHandler`, `AuthenticationHandler`, `ControllerHandler`) либо возвращает ответ, останавливая этим цепочку, либо вызывает `parent::handle()`, чтобы передать запрос дальше.

**Цепочка обязанностей против Декоратора:** структура очень похожа - каждый объект реализует общий интерфейс и хранит ссылку на следующий. Разница - в управлении потоком. Декоратор всегда делегирует вызов обернутому объекту и лишь добавляет поведение вокруг него. Обработчик в цепочке может решить вообще **не** передавать запрос дальше, а сами обработчики не зависят друг от друга.

**Про пример:** порядок звеньев имеет значение. Дешевый `RateLimitHandler` стоит первым, поэтому клиент, превысивший лимит, получает отказ еще до того, как запустится более дорогая проверка токена. Затем из тех же классов обработчиков собирается другая цепочка - для публичной страницы, которой не нужна аутентификация. Последний сценарий показывает известное следствие паттерна: если в конце цепочки нет обработчика, который ответит, запрос «проваливается» необработанным, и `handle()` возвращает `null`.
