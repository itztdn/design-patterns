# Design Patterns (EN/RU)

- **EN**: A curated collection of classic software design patterns implemented in modern PHP 8.2+. Each pattern includes practical, real-world examples and clear explanations in both English and Russian. This repository is built as a reference guide for developers, a practical resource for students, and an interactive tool for code reviews and mentoring.
- **RU**: Тщательно подобранная коллекция классических паттернов проектирования, реализованных на современном PHP 8.2+. Каждый паттерн включает практические примеры из реальной жизни и понятные объяснения на английском и русском языках. Этот репозиторий создан как надежный справочник для разработчиков, ресурс для студентов и инструмент для код-ревью и менторских сессий.

---

## Project Structure / Структура проекта

| Directory / File            | Description / Описание                                                                                                                                                    |
| --------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `src/`                      | Pattern implementations (PSR-4 compliant). <br> Реализация паттернов (соответствует PSR-4).                                                                               |
| `src/<Category>/<Pattern>/` | Each pattern is located in its own directory inside the corresponding category. <br> Каждый паттерн расположен в собственной директории внутри соответствующей категории. |
| `example.php`               | Runnable example for the pattern. <br> Исполняемый пример паттерна.                                                                                                       |
| `README.md`                 | Detailed explanation for each pattern inside its folder. <br> Подробное описание каждого паттерна внутри его папки.                                                       |

---

## Patterns / Паттерны

| Category / Категория         | Pattern / Паттерн                              | Path to example / Путь к example.php                    |
| ---------------------------- | ---------------------------------------------- | ------------------------------------------------------- |
| [Creational](src/Creational) | [Factory Method](src/Creational/FactoryMethod) | [example.php](src/Creational/FactoryMethod/example.php) |
| [Creational](src/Creational) | [Singleton](src/Creational/Singleton)          | [example.php](src/Creational/Singleton/example.php)     |
| [Creational](src/Creational) | [Builder](src/Creational/Builder)              | [example.php](src/Creational/Builder/example.php)       |
| [Behavioral](src/Behavioral) | [Strategy](src/Behavioral/Strategy)            | [example.php](src/Behavioral/Strategy/example.php)      |
| [Behavioral](src/Behavioral) | [Observer](src/Behavioral/Observer)            | [example.php](src/Behavioral/Observer/example.php)      |
| [Structural](src/Structural) | [Adapter](src/Structural/Adapter)              | [example.php](src/Structural/Adapter/example.php)       |
| [Structural](src/Structural) | [Decorator](src/Structural/Decorator)          | [example.php](src/Structural/Decorator/example.php)     |

---

## How to use / Как использовать

**1. Clone the repository / Склонируйте репозиторий**

- **Using HTTPS** (if you don't have SSH key set up) / **Через HTTPS** (если вы не настраивали SSH-ключ):

```bash
git clone https://github.com/itztdn/design-patterns.git
cd design-patterns
```

- **Using SSH** (recommended if you have SSH key configured): / **Через SSH** (рекомендуется, если у вас настроен SSH-ключ):

```bash
git clone git@github.com:itztdn/design-patterns.git
cd design-patterns
```

**2. Install dependencies / Установите зависимости**

```bash
composer install
```

**3. Run an example / Запустите пример**

```bash
php src/Behavioral/Strategy/example.php
```

or any other pattern example / или другой пример паттерна

## 🤝 Contribution / Как помочь проекту

- **EN**: If you want to add or fix something, create a Pull Request!

- **RU**: Если хотите что-то добавить или исправить, создайте Pull Request!
