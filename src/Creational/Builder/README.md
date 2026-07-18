# Builder / Строитель

**Category:** Creational / Порождающий

## 🇬🇧 English

**What is it?**
Builder is a creational design pattern that lets you construct complex objects step by step. The pattern allows you to produce different types and representations of an object using the same construction code.

**What problem does it solve?**
It removes the "telescoping constructor" - a constructor with a dozen parameters, most of which are optional and passed as `null` at every call site. Instead of one giant constructor, the object is assembled by calling only the steps that are actually needed, and the product itself stays immutable.

**When to use it?**

- When an object requires many optional parameters and you want to avoid constructors with a long list of arguments.
- When you need to create different representations of the same product (e.g., an HTTP request object and an equivalent curl command).
- When construction must happen step by step, and a half-configured object should never be visible to the client.

**Note on the director:** the director is optional. It simply stores the order of steps for typical configurations so that the client code does not repeat them. A client can always drive the builder directly, as the last part of `example.php` shows.

**Note on the interface:** `RequestBuilderInterface` declares only the building steps, not a method that returns the result. Concrete builders produce different types (an `HttpRequest` object and a `string`), and these types have nothing in common, so the result is retrieved from a concrete builder.

---

## 🇷🇺 Русский

**Что это такое?**
Строитель - это порождающий паттерн проектирования, который позволяет создавать сложные объекты пошагово. Паттерн дает возможность получать разные типы и представления объекта, используя один и тот же код сборки.

**Какую проблему решает?**
Избавляет от «телескопического конструктора» - конструктора с десятком параметров, большая часть которых необязательна и в каждом вызове передается как `null`. Вместо одного огромного конструктора объект собирается вызовом только тех шагов, которые действительно нужны, а сам продукт остается неизменяемым.

**Где применяется?**

- Когда у объекта много необязательных параметров и хочется избежать конструктора с длинным списком аргументов.
- Когда нужно создавать разные представления одного продукта (например, объект HTTP-запроса и эквивалентную команду curl).
- Когда конструирование должно идти пошагово и клиент не должен видеть объект в наполовину настроенном состоянии.

**Про директора:** директор необязателен. Он лишь хранит порядок шагов для типовых конфигураций, чтобы клиентский код не повторял их каждый раз. Клиент всегда может управлять строителем напрямую - это показано в последней части `example.php`.

**Про интерфейс:** `RequestBuilderInterface` объявляет только шаги сборки, но не метод получения результата. Конкретные строители возвращают разные типы (объект `HttpRequest` и `string`), у которых нет ничего общего, поэтому результат забирается у конкретного строителя.
