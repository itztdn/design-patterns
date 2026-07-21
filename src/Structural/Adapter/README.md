# Adapter / Адаптер

**Category:** Structural / Структурный

## 🇬🇧 English

**What is it?**
Adapter is a structural design pattern that allows objects with incompatible interfaces to work together. It acts as a wrapper that translates calls from one interface into another.

**What problem does it solve?**
It keeps third-party and legacy code out of your business logic. Your application depends on its own interface, and a thin adapter absorbs everything that does not fit: different method names, a different argument order, unusual units or return types. When the vendor library is replaced, only the adapter changes.

**When to use it?**

- When you want to use an existing class, but its interface does not match the rest of your code.
- When you integrate a third-party SDK that you cannot (or should not) modify.
- When you gradually replace legacy code: new code talks to the new interface, and adapters keep the old implementations working.

**Note on the example:** `RedisCacheAdapter` performs pure translation - it converts seconds into milliseconds and unwraps the vendor's array into a string. `LegacyDatabaseCacheAdapter` also has to emulate a missing feature: the legacy storage knows nothing about expiration, so the adapter saves the deadline next to the value and checks it on read. Both situations are typical for this pattern.

---

## 🇷🇺 Русский

**Что это такое?**
Адаптер - это структурный паттерн проектирования, который позволяет объектам с несовместимыми интерфейсами работать вместе. Он выступает оберткой, переводящей вызовы одного интерфейса в другой.

**Какую проблему решает?**
Не пускает сторонний и легаси-код в бизнес-логику. Приложение зависит от собственного интерфейса, а тонкий адаптер поглощает все, что не совпадает: другие имена методов, другой порядок аргументов, непривычные единицы измерения или типы результата. При замене библиотеки вендора меняется только адаптер.

**Где применяется?**

- Когда нужно использовать существующий класс, но его интерфейс не совпадает с остальным кодом.
- Когда интегрируется сторонний SDK, который нельзя (или не следует) изменять.
- Когда легаси-код заменяется постепенно: новый код работает с новым интерфейсом, а адаптеры поддерживают жизнь старых реализаций.

**Про пример:** `RedisCacheAdapter` занимается чистым переводом - конвертирует секунды в миллисекунды и разворачивает массив вендора в строку. `LegacyDatabaseCacheAdapter` вдобавок эмулирует отсутствующую возможность: легаси-хранилище ничего не знает про время жизни, поэтому адаптер сохраняет срок рядом со значением и проверяет его при чтении. Обе ситуации типичны для этого паттерна.
