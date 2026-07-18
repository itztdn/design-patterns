# Singleton / Одиночка

**Category:** Creational / Порождающий

## 🇬🇧 English

**What is it?**
Singleton is a creational design pattern that ensures a class has only one instance, while providing a global access point to this instance.

**What problem does it solve?**
It protects a shared resource from being created twice. Instead of passing an expensive object (a database connection, a logger, a configuration holder) through the whole application, the class itself controls its lifecycle: the constructor is hidden, and the single access point returns the already created instance.

**When to use it?**

- When a class must have exactly one instance available to all clients (e.g., a single database connection shared by all repositories).
- When you need stricter control over global variables: unlike a global variable, a singleton cannot be overwritten from the outside.

**Caution:** the pattern hides dependencies instead of declaring them and makes unit testing harder, because the shared state leaks between tests. In modern applications the same goal is usually achieved with a dependency injection container.

---

## 🇷🇺 Русский

**Что это такое?**
Одиночка - это порождающий паттерн проектирования, который гарантирует, что у класса есть только один экземпляр, и предоставляет к нему глобальную точку доступа.

**Какую проблему решает?**
Защищает общий ресурс от повторного создания. Вместо того чтобы протаскивать дорогой объект (соединение с БД, логгер, хранилище конфигурации) через все приложение, класс сам управляет своим жизненным циклом: конструктор скрыт, а единая точка доступа возвращает уже созданный экземпляр.

**Где применяется?**

- Когда у класса должен быть ровно один экземпляр, доступный всем клиентам (например, одно соединение с БД на все репозитории).
- Когда нужен более строгий контроль над глобальными переменными: в отличие от глобальной переменной, одиночку нельзя перезаписать извне.

**Осторожно:** паттерн скрывает зависимости вместо того, чтобы объявлять их, и усложняет модульное тестирование, так как общее состояние протекает между тестами. В современных приложениях ту же задачу обычно решает контейнер внедрения зависимостей.
