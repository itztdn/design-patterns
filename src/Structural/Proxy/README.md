# Proxy / Заместитель

**Category:** Structural / Структурный

## 🇬🇧 English

**What is it?**
Proxy is a structural design pattern that lets you provide a substitute or placeholder for another object. The proxy implements the same interface as the real object and controls access to it, doing something either before or after the request reaches the original.

**What problem does it solve?**
It adds a layer of control over an object without changing that object or the client. A report service should not have to worry about lazy loading, caching or permission checks - and the client should not have to arrange them. The proxy sits between them and adds exactly that, while looking identical to the real service.

**When to use it?**

- **Virtual proxy** - when an object is expensive to create, and you want to defer that cost until it is really needed (lazy loading), optionally caching the result.
- **Protection proxy** - when different clients should have different access rights to the same object.
- **Remote proxy** - when the real object lives elsewhere (another process or server) and the proxy hides the communication.

**Proxy vs Decorator:** the code looks similar - both wrap an object behind its own interface. The intent differs: a decorator *adds behaviour* the client asked for, while a proxy *controls access* to the object, often creating or hiding it, and usually the client does not even know the proxy is there.

**Proxy vs Facade:** a facade invents a new, simpler interface over many objects; a proxy keeps the exact same interface as the single object it stands in for.

**Note on the example:** `LazyReportProxy` is a virtual proxy - it builds `ReportGenerator` only on the first request and caches answers, so an unused proxy costs nothing. `AccessControlledReportProxy` is a protection proxy; because it depends on the interface, it wraps the lazy proxy just as easily as the real service.

---

## 🇷🇺 Русский

**Что это такое?**
Заместитель - это структурный паттерн проектирования, который позволяет подставлять вместо реального объекта его заменитель. Заместитель реализует тот же интерфейс, что и реальный объект, и контролирует доступ к нему, делая что-то до или после того, как запрос дойдет до оригинала.

**Какую проблему решает?**
Добавляет слой контроля над объектом, не меняя ни сам объект, ни клиента. Сервис отчетов не должен думать про ленивую загрузку, кэширование или проверку прав - а клиент не должен все это организовывать. Заместитель встает между ними и добавляет ровно это, выглядя при этом неотличимо от реального сервиса.

**Где применяется?**

- **Виртуальный заместитель** - когда объект дорого создавать и хочется отложить эту цену до момента, когда он действительно понадобится (ленивая загрузка), попутно кэшируя результат.
- **Защищающий заместитель** - когда у разных клиентов должны быть разные права доступа к одному объекту.
- **Удаленный заместитель** - когда реальный объект живет в другом месте (другом процессе или на сервере), а заместитель скрывает общение с ним.

**Заместитель против Декоратора:** код похож - оба оборачивают объект за его же интерфейсом. Отличается намерение: декоратор *добавляет поведение*, которое запросил клиент, а заместитель *контролирует доступ* к объекту, часто создавая или скрывая его, и обычно клиент даже не знает, что заместитель вообще есть.

**Заместитель против Фасада:** фасад придумывает новый, более простой интерфейс поверх множества объектов; заместитель сохраняет ровно тот же интерфейс, что и у единственного объекта, которого он подменяет.

**Про пример:** `LazyReportProxy` - виртуальный заместитель: он создает `ReportGenerator` только при первом обращении и кэширует ответы, поэтому неиспользованный заместитель ничего не стоит. `AccessControlledReportProxy` - защищающий заместитель; так как он зависит от интерфейса, он оборачивает ленивый заместитель так же легко, как и реальный сервис.
