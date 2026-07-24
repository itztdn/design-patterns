# Decorator / Декоратор

**Category:** Structural / Структурный

## 🇬🇧 English

**What is it?**
Decorator is a structural design pattern that lets you attach new behaviour to an object by placing it inside a special wrapper object that implements the same interface.

**What problem does it solve?**
It replaces the explosion of subclasses. Without the pattern, combining logging, caching and retries would require a separate class for every combination. With decorators each responsibility lives in its own small class, and the combinations are assembled at runtime, in any order.

**When to use it?**

- When you need to add responsibilities to an object dynamically, without changing its code.
- When inheritance is impossible (the class is `final`) or would produce too many combinations.
- When you want to keep the core class focused on business logic, moving logging, caching, retries or access checks into separate layers.

**Decorator vs Adapter:** an adapter changes the interface of an object so that incompatible code can talk to it. A decorator keeps the interface exactly the same and changes the behaviour behind it.

**Note on the order:** wrapping order matters, and `example.php` shows it. With logging outside caching the log records every call, including cache hits. With caching outside logging the log only sees the calls that actually reached the database.

---

## 🇷🇺 Русский

**Что это такое?**
Декоратор - это структурный паттерн проектирования, который позволяет добавлять объекту новое поведение, помещая его в объект-обертку, реализующую тот же интерфейс.

**Какую проблему решает?**
Избавляет от лавины подклассов. Без паттерна для сочетания логирования, кэширования и повторных попыток пришлось бы создавать отдельный класс под каждую комбинацию. С декораторами каждая обязанность живет в своем маленьком классе, а комбинации собираются во время выполнения и в любом порядке.

**Где применяется?**

- Когда нужно добавлять обязанности объекту на лету, не меняя его код.
- Когда наследование невозможно (класс объявлен `final`) или дало бы слишком много комбинаций.
- Когда основной класс хочется оставить сосредоточенным на бизнес-логике, вынеся логирование, кэширование, повторные попытки или проверку прав в отдельные слои.

**Декоратор против Адаптера:** адаптер меняет интерфейс объекта, чтобы с ним смог работать несовместимый код. Декоратор оставляет интерфейс ровно тем же и меняет поведение за ним.

**Про порядок:** порядок обертывания важен, и `example.php` это показывает. Когда логирование снаружи кэша, в лог попадают все вызовы, включая попадания в кэш. Когда снаружи кэш, лог видит только те вызовы, которые дошли до базы.
