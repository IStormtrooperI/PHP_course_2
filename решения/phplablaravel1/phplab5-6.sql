-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 15 2021 г., 19:35
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
-- База данных: `phplab5-6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `firm`
--

CREATE TABLE `firm` (
  `id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `firm`
--

INSERT INTO `firm` (`id`, `Name`, `Adress`) VALUES
(1, 'ОАО Этажи', 'Тюмень, ул.Ленина, 35'),
(2, 'ООО Престиж', 'Тюмень, ул.Профсоюзная, 8'),
(3, 'ИП Зуевский', 'Тюмень, ул.Пирогова, 34-61');

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `id` int NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `Staff` int NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Stage` int NOT NULL,
  `Image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id`, `FIO`, `Staff`, `Phone`, `Stage`, `Image`, `created_at`, `updated_at`) VALUES
(5, 'Калугин', 3, '555555', 6, 'ava5.jpg', NULL, NULL),
(6, 'Веселина', 3, '666665', 8, 'ava6.jpg', NULL, NULL),
(7, 'Мистер Х', 2, '00-00-00', 3, 'ava1.jpg', '2017-12-05 17:40:47', '2017-12-05 17:40:47'),
(8, 'Мистер Х', 2, '00-00-00', 3, 'ava1.jpg', '2017-12-05 17:41:02', '2017-12-05 17:41:02'),
(10, 'Алейников', 1, '00-00-00', 3, 'ava4.jpg', '2017-12-10 16:20:15', '2017-12-10 16:20:15');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE `staff` (
  `id` int NOT NULL,
  `staff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id`, `staff`) VALUES
(1, 'Программист'),
(2, 'Менеджер'),
(3, 'Дизайнер'),
(4, 'Дворник');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int NOT NULL,
  `Firm` int NOT NULL,
  `Staff` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`id`, `Firm`, `Staff`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `firm`
--
ALTER TABLE `firm`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Staff` (`Staff`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Firm` (`Firm`),
  ADD KEY `Staff` (`Staff`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `firm`
--
ALTER TABLE `firm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`Staff`) REFERENCES `staff` (`id`);

--
-- Ограничения внешнего ключа таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`Firm`) REFERENCES `firm` (`id`),
  ADD CONSTRAINT `vacancy_ibfk_2` FOREIGN KEY (`Staff`) REFERENCES `staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
