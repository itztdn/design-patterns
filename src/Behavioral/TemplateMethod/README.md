# Template Method / Шаблонный метод

**Category:** Behavioral / Поведенческий

## 🇬🇧 English

**What is it?**
Template Method is a behavioral design pattern that defines the skeleton of an algorithm in a base class and lets subclasses override specific steps of that algorithm without changing its overall structure.

**What problem does it solve?**
It removes duplication between several algorithms that are the same in outline but differ in the details. Instead of copying the whole procedure into every class and changing a few lines, the shared sequence lives once in the base class, and each subclass supplies only the steps that actually differ. The order of the steps is guaranteed to stay the same everywhere.

**When to use it?**

- When several classes contain almost the same algorithm with minor differences, and you want to keep the invariant part in one place.
- When you want subclasses to extend only particular steps of an algorithm, not its structure.
- When you want to offer optional extension points: a hook step has a default (often empty) implementation that subclasses may override or ignore.

**Template Method vs Strategy:** both let you vary an algorithm, but by different means. Template Method works through **inheritance**: the skeleton is fixed at compile time and subclasses change parts of it. Strategy works through **composition**: the whole algorithm is an object you can swap at runtime. Template Method varies pieces of one algorithm; Strategy swaps the entire algorithm.

**Note on the example:** `export()` is `final` - it fixes the order header -> rows -> footer. `header()` and `row()` are required steps, while `footer()` is a hook with an empty default: `CsvReportExporter` ignores it, `HtmlReportExporter` overrides it to add a row count.

---

## 🇷🇺 Русский

**Что это такое?**
Шаблонный метод - это поведенческий паттерн проектирования, который определяет скелет алгоритма в базовом классе и позволяет подклассам переопределять отдельные шаги этого алгоритма, не меняя его общей структуры.

**Какую проблему решает?**
Убирает дублирование между несколькими алгоритмами, которые одинаковы в общих чертах, но различаются в деталях. Вместо того чтобы копировать всю процедуру в каждый класс и менять пару строк, общая последовательность живет в базовом классе один раз, а каждый подкласс поставляет только действительно отличающиеся шаги. Порядок шагов при этом гарантированно остается везде одинаковым.

**Где применяется?**

- Когда несколько классов содержат почти один и тот же алгоритм с небольшими отличиями и инвариантную часть хочется держать в одном месте.
- Когда нужно, чтобы подклассы расширяли только конкретные шаги алгоритма, а не его структуру.
- Когда нужно дать необязательные точки расширения: шаг-хук имеет реализацию по умолчанию (часто пустую), которую подклассы могут переопределить или проигнорировать.

**Шаблонный метод против Стратегии:** оба позволяют варьировать алгоритм, но разными средствами. Шаблонный метод работает через **наследование**: скелет зафиксирован на этапе компиляции, а подклассы меняют его части. Стратегия работает через **композицию**: весь алгоритм - это объект, который можно заменить во время выполнения. Шаблонный метод варьирует куски одного алгоритма; Стратегия подменяет алгоритм целиком.

**Про пример:** `export()` объявлен `final` - он фиксирует порядок заголовок -> строки -> подвал. `header()` и `row()` - обязательные шаги, а `footer()` - хук с пустой реализацией по умолчанию: `CsvReportExporter` его игнорирует, `HtmlReportExporter` переопределяет, добавляя число строк.
