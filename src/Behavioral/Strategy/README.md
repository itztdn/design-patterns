# Strategy / Стратегия

**Category:** Behavioral / Поведенческий

## 🇬🇧 English

**What is it?**
Strategy is a behavioral design pattern that lets you define a family of algorithms, put each of them into a separate class, and make their objects interchangeable.

**What problem does it solve?**
It prevents the "fat controller" or massive `if/else` (or `switch`) statements when a class does something specific in lots of different ways. Instead of keeping all the logic in one class, you delegate it to separate strategy objects.

**When to use it?**

- When you have many similar classes that only differ in the way they execute some behavior.
- To isolate the business logic of a class from the implementation details of algorithms that may not be that important in the context of that logic.
- When you want to swap algorithms dynamically at runtime (e.g., switching payment methods, sorting algorithms, or export formats).

---

## 🇷🇺 Русский

**Что это такое?**
Стратегия - это поведенческий паттерн проектирования, который определяет семейство схожих алгоритмов и помещает каждый из них в собственный класс, после чего алгоритмы можно взаимозаменять прямо во время исполнения программы.

**Какую проблему решает?**
Избавляет от огромных конструкций `if/else` или `switch` внутри одного класса. Вместо того чтобы хранить все варианты поведения в одном месте (что ведет к разрастанию кода и конфликтам при слиянии), логика выносится в отдельные классы-стратегии.

**Где применяется?**

- Когда есть множество похожих классов, отличающихся только поведением.
- Когда нужно скрыть детали реализации алгоритмов от других классов.
- Когда требуется менять алгоритм работы объекта на лету (например, выбор способа оплаты, алгоритма сортировки или формата выгрузки данных).
