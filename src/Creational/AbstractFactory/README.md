# Abstract Factory / Абстрактная фабрика

**Category:** Creational / Порождающий

## 🇬🇧 English

**What is it?**
Abstract Factory is a creational design pattern that lets you produce families of related objects without specifying their concrete classes. The client picks a factory once and gets a whole set of matching products from it.

**What problem does it solve?**
It guarantees that objects meant to work together are actually used together. When several products form a family (a connection and a query builder for the same database, or a set of widgets for the same UI theme), it is easy to mix incompatible ones by mistake. A single concrete factory only ever returns products from one family, so the mismatch becomes impossible.

**When to use it?**

- When your code must work with several families of related products and must not mix them.
- When you want to swap an entire family at once by changing a single factory (e.g., switch the whole app from MySQL to PostgreSQL from one config value).
- When you want to isolate the client code from the concrete classes of the products it uses.

**Abstract Factory vs Factory Method:** Factory Method produces *one* product through a single overridable method, and variation comes from subclassing the creator. Abstract Factory produces a *family of several* products and is usually built from composition: the client is handed a factory object. In fact, an abstract factory's creation methods are often factory methods.

**Note on the example:** the two families differ visibly - `MySqlQueryBuilder` quotes identifiers with backticks, `PostgresQueryBuilder` with double quotes. Because the connection and the builder always come from the same factory, a Postgres query is never sent over a MySQL connection.

---

## 🇷🇺 Русский

**Что это такое?**
Абстрактная фабрика - это порождающий паттерн проектирования, который позволяет создавать семейства связанных объектов, не указывая их конкретных классов. Клиент один раз выбирает фабрику и получает от нее целый набор подходящих друг другу продуктов.

**Какую проблему решает?**
Гарантирует, что объекты, предназначенные работать вместе, действительно используются вместе. Когда несколько продуктов образуют семейство (соединение и построитель запросов для одной БД или набор виджетов для одной темы интерфейса), легко по ошибке смешать несовместимые. Одна конкретная фабрика всегда возвращает продукты только одного семейства, поэтому несовместимость становится невозможной.

**Где применяется?**

- Когда код должен работать с несколькими семействами связанных продуктов и не должен их смешивать.
- Когда нужно менять целое семейство разом, подменяя одну фабрику (например, переключить все приложение с MySQL на PostgreSQL одним значением конфигурации).
- Когда нужно изолировать клиентский код от конкретных классов продуктов, которыми он пользуется.

**Абстрактная фабрика против Фабричного метода:** Фабричный метод создает *один* продукт через единственный переопределяемый метод, а вариативность достигается наследованием создателя. Абстрактная фабрика создает *семейство из нескольких* продуктов и обычно строится на композиции: клиенту передают объект-фабрику. По сути, методы создания абстрактной фабрики часто сами являются фабричными методами.

**Про пример:** два семейства заметно отличаются - `MySqlQueryBuilder` экранирует идентификаторы обратными кавычками, `PostgresQueryBuilder` - двойными. Поскольку соединение и построитель всегда берутся из одной фабрики, запрос Postgres никогда не уйдет по соединению MySQL.
