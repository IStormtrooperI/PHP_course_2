-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2021 г., 15:10
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nauka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statya`
--

CREATE TABLE `statya` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `lid` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `rubrics` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statya`
--

INSERT INTO `statya` (`id`, `title`, `lid`, `content`, `rubrics`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Носимое устройство на базе ИИ отличает человека от машины по голосу', 'Команда австралийских исследователей из технологического агентства DT представила устройство для тех, кто боится, что скоро отличить человека от машины будет невозможно.', 'Носимая система под названием Anti-AI AI определяет синтетическую речь и предупреждает пользователя, что голос, который он слышит, не принадлежит человеку. Прототип устройства был разработан всего за пять дней. Он работает на нейронной сети на базе системы машинного обучения Tensorflow от Google. Исследователи натренировали искусственный интеллект, используя базу данных синтетических голосов. Так сеть научилась распознавать образцы искусственной речи. Носимое устройство захватывает звук и отправляет его в облако. Если оно распознаёт синтетическую речь, то тонко намекает человеку, что он общается не с себе подобным. Вместо того, чтобы предупреждать пользователя посредством света, звука или вибраций, прототип делает это с помощью миниатюрного термоэлектрического охлаждающего элемента. «Мы хотели, чтобы устройство давало носителю уникальное ощущение, которое соответствует тому, что он чувствует, когда понимает, что голос синтетический», — объяснили разработчики.', 'Распознавание образов', 'a4.jpg', '2021-04-23 21:30:01', '2021-04-23 21:30:01'),
(2, '\r\nOracle внедрила искусственный интеллект в свои облачные сервисы', 'Компания Oracle наделила большинство своих облачных приложений искусственным интеллектом, чтобы предложить корпоративным клиентам современные и многофункциональные решения.', 'Приложения Oracle Adaptive Intelligent Apps с искусственным интеллектом встроены в сервисы Oracle Cloud Applications и ориентированы на использование в таких областях, как финансы, управление персоналом, цепочки поставок, электронная коммерция, маркетинг, продажи и услуги. Представленные технологии могут использоваться, к примеру, для работы чат-ботов, дающих автоматические ответы на вопросы клиентов или сотрудников компаний. «Новые функции искусственного интеллекта позволяют использовать собственные данные и данные третьих лиц в сочетании с расширенным алгоритмом машинного обучения и продуманными методами принятия решений, что обеспечивает предложение самых эффективных в отрасли современных бизнес-приложений на базе искусственного интеллекта», — отметил исполнительный вице-президент Oracle по разработке бизнес-приложений Стив Миранда. Согласно пресс-релизу Oracle, приложения Oracle Adaptive Intelligent Apps помогают оптимизировать финансовые процессы и требования к технологиям, сокращать расходы, модернизировать операции и улучшать качество взаимодействия, совершенствовать управление персоналом, повысить операционную эффективность, рационализировать процессы и улучшать потребительский опыт посредством использования клиентских данных и соответствующих новостных уведомлений.', 'Искусственный интеллект', 'a5.jpg', '2021-04-23 21:30:01', '2021-04-23 21:30:01'),
(3, '\r\nНайдены области мозга, которые распознают летящий в лицо предмет', 'Французские нейробиологи, просканировав мозг двух макак-резусов, обнаружили регионы мозга, которые отвечают за предсказание столкновения с предметом и оценку возможных последствий.', 'Способность эффективно распознавать движущиеся объекты, определяя хищников и потенциальную добычу, необходима для выживания в джунглях. Ранее было показано, что быстро приближающийся к лицу объект, имитирующий движение хищника, вызывает защитную реакцию как у человекоподобных обезьян, так и у маленьких детей. Эти наблюдения предполагают, что мозг способен предсказывать траекторию движения угрожающих стимулов и оценивать возможные последствия от столкновения с ними. В новом исследовании французским ученым удалось зафиксировать активность мозга, сопряженную с подобной оценкой, и выяснить, какие именно регионы мозга за нее отвечают. Активность головного мозга двух макак-резусов измеряли при помощи имплантированной системы для функциональной магнитно-резонансной томографии. Анализ данных фМРТ выявил сеть нейронов, которые активизируются при обнаружении приближающегося к лицу предмета и столкновении с ним. Результаты исследования свидетельствуют, что мозг макак способен интегрировать данные от разных органов чувств, используя визуальную информацию для прогноза тактильных ощущений.', 'Искусственная нейронная сеть', 'a6.jpg', '2021-04-23 21:30:01', '2021-04-23 21:30:01'),
(6, '\r\nВласти передумали строить федеральную Wi-Fi-сеть в российских городах', 'В распоряжении CNews оказался проект Плана мероприятий по реализацию раздела «Информационная инфраструктура» программы «Цифровая экономика».', 'Документ разработан рабочей группой при центре компетенций по данному направлению, созданному на базе «Ростелекома». В документе не в полной мере отражены идеи, ранее заложенные в «Цифровую экономику» по данному пункту. В частности, программа предполагала строительство федеральной сети Wi-Fi. До конца 2020 г. планировалась запустить такие сети в двух российских городах-миллионниках и десяти городах с числом жителей от 100 тыс человек. Однако в проекте плана мероприятий об этом не говорится. Два источника, близких к соответствующей рабочей группе, подтвердили CNews, что проект строительства федеральной сети Wi-Fi в российских городах планируется исключить из программы «Цифровая экономика». Такое решение может быть связано с тем, что программа также предполагает строительстве сотовых пятого поколения (5G), что делает неочевидным необходимость в городских Wi-Fi-сетях. Несмотря на это, в документе остался пункт о создании производства в России оборудования для беспроводных сетей 802.16 ax (Wi-Fi со скоростями доступа до 2,5-5 Гбит/с). Также говорится о том, что при разработке национального плана обеспечения населения широкополосным доступом в интернет необходимо предусмотреть наличие Wi-Fi в общественных местах. Из дорожной карты программы «Цифровая экономика» исчез пункт о строительстве федеральной сети Wi-Fi. Сохранился и пункт об упрощении процедур регистрации точек доступа Wi-Fi мощностью до 100 мВт.', 'Информационное общество', 'a9.jpg', '2021-04-23 21:30:01', '2021-04-23 21:30:01'),
(7, '\r\nНа МКС появится искусственная гравитация', 'На новом российском модуле, который будет в будущем запущен к МКС, установят специальную центрифугу, которая создаст искусственную гравитацию.', 'О создании искусственной гравитации на борту МКС со ссылкой на руководителя Института медико-биологических проблем (ИМБП) РАН Олега Орлова сообщило издание «РИА Новости». Специальная центрифуга будет размещена на борту трансформируемого модуля от РКК «Энергия», концептуально похожего на американский BEAM. Последний является экспериментальным надувным жилым модулем. По словам Орлова, сначала будет создан макет центрифуги. Затем, после отработки технологий, будет построена центрифуга малого радиуса, которая и отправится к МКС. Если быть точнее, речь идет о вращающемся цилиндре, где центробежная сила будет имитировать земное притяжение. Точные размеры центрифуги не называются. А вот NASA в 2005 году закрыло программу, в рамках которой планировалось запустить к МКС модуль с центрифугой для создания искусственной гравитации.', 'Робототехника', 'a10.jpg', '2021-04-23 21:30:01', '2021-04-23 21:30:01');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@mail.ru', NULL, '$2y$10$ksQHw1agrjysHRK/0UHDwemYxA8p.LpIrC4hqicm0dr7v4fKaTL/S', 'T3K4wTbi3UKsOEFG09GFx9CVdc4ZUzNRckxPZBVvRD6JPRdjpnYJ8GeWEytf', '2021-04-25 12:16:06', '2021-04-25 12:16:06'),
(2, 0, 'user', 'user@mail.ru', NULL, '$2y$10$uxHsGMWPJybhQrcSptQIweg5qGtk7NVcW8m9LMtQslgZj06SFX0qq', NULL, '2021-04-27 06:34:28', '2021-04-27 06:34:28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `statya`
--
ALTER TABLE `statya`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `statya`
--
ALTER TABLE `statya`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
