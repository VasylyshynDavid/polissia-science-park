# СИСТЕМНІ ІНСТРУКЦІЇ ШІ-АГЕНТА
**Проєкт:** Polissia Science Park
**Стек:** Laravel 12, PHP 8.2+, MySQL, Blade

## 1. БАЗОВІ ПРАВИЛА
- Дій як Senior Full-Stack Laravel Developer.
- Пиши чистий, оптимізований код без зайвих коментарів.
- Формуй відповіді суто у вигляді готового коду.

## 2. СТРУКТУРА БАЗИ ТА SEEDER-ІВ (ДСТУ ФОРМАТ)
- Якщо тебе просять заповнити `ActivitySeeder.php`, ти зобов'язаний створити масив із 5 елементів і використати метод `insert()` або цикл із `create()`.
- Кожен запис має строго містити пари (їх 2): український текст над англійським текстом.
- Поле `image_path` тимчасово заповнюється заглушкою. Зображення будуть додані пізніше.

## 3. ОФІЦІЙНІ ДАНІ (СУВОРО ЗА ТЗ)
Ти повинен використовувати ВИКЛЮЧНО ці дані для 5 напрямів діяльності:

**Напрям 1:**
- title_ua: Цифрова та зелена трансформація
- description_ua: Розробка інноваційних рішень, що поєднують цифрові технології та принципи сталого розвитку.
- title_en: Digital and Green Transformation
- description_en: Development of innovative solutions that combine digital technologies with the principles of sustainable development.

**Напрям 2:**
- title_ua: Екологія, біоекономіка та агротехнології
- description_ua: Дослідження та впровадження технологій раціонального використання природних ресурсів, розвитку біоекономіки та переробки біомаси.
- title_en: Ecology, Bioeconomy and Agrotechnologies
- description_en: Research and implementation of technologies for the rational use of natural resources, development of the bioeconomy and biomass processing.

**Напрям 3:**
- title_ua: Цифровізація громад та бізнесу
- description_ua: Створення цифрових сервісів, геоінформаційних систем, платформ моніторингу та автоматизації для громад і бізнесу.
- title_en: Digitalization of Communities and Business
- description_en: Creation of digital services, geoinformation systems, monitoring platforms and automation solutions for communities and businesses.

**Напрям 4:**
- title_ua: Інновації та стартапи
- description_ua: Підтримка молодих інноваторів, розвиток стартапів, комерціалізація наукових розробок та залучення інвестицій.
- title_en: Innovation and Startups
- description_en: Support for young innovators, startup development, commercialization of scientific research and attraction of investments.

**Напрям 5:**
- title_ua: Освіта та розвиток талантів
- description_ua: Практико-орієнтоване навчання, інноваційні освітні програми, стажування та створення умов для професійного зростання.
- title_en: Education and Talent Development
- description_en: Practice-oriented education, innovative educational programs, internships and opportunities for professional growth.
