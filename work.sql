-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 11 2022 г., 06:14
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `work`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `surname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `adress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `signup_time` datetime DEFAULT NULL,
  `user_group` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `phone`, `adress`, `signup_time`, `user_group`) VALUES
(38, 'Станислав', 'Кобилянский', 'kobilyansky.s@gmail.com', '$2y$10$1/13rWkvYHbZIC8ZzEvW/etICd8G8eS2kfRYyhxn86LlY/wLsyTMy', '+79000000000', NULL, '2022-05-10 00:30:20', 'employee'),

-- --------------------------------------------------------

--
-- Структура таблицы `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `salary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `employer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `vacancies`
--

INSERT INTO `vacancies` (`id`, `name`, `salary`, `description`, `employer`) VALUES
(1, 'Должность 1', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(2, 'Должность 2', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(3, 'Должность 3', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(4, 'Должность 4', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(5, 'Должность 5', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(6, 'Должность 6', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(7, 'Должность 7', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(8, 'Должность 8', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(9, 'Должность 9', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(10, 'Должность 10', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(11, 'Должность 11', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(12, 'Должность 12', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(13, 'Должность 13', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(14, 'Должность 14', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(15, 'Должность 15', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(16, 'Должность 16', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(17, 'Должность 17', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(18, 'Должность 18', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(19, 'Должность 19', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(20, 'Должность 20', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(21, 'Должность 21', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(22, 'Должность 22', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(23, 'Должность 23', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(24, 'Должность 24', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(25, 'Должность 25', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(26, 'Должность 26', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(27, 'Должность 27', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(28, 'Должность 28', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(29, 'Должность 29', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(30, 'Должность 30', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(31, 'Должность 31', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(32, 'Должность 32', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(33, 'Должность 33', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(34, 'Должность 34', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(35, 'Должность 35', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(36, 'Должность 36', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(37, 'Должность 37', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(38, 'Должность 38', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(39, 'Должность 39', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(40, 'Должность 40', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(41, 'Должность 41', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(42, 'Должность 42', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(43, 'Должность 43', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(44, 'Должность 44', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(45, 'Должность 45', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(46, 'Должность 46', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(47, 'Должность 47', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(48, 'Должность 48', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(49, 'Должность 49', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(50, 'Должность 50', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(51, 'Должность 51', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(52, 'Должность 52', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(53, 'Должность 53', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(54, 'Должность 54', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(55, 'Должность 55', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(56, 'Должность 56', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(57, 'Должность 57', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(58, 'Должность 58', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(59, 'Должность 59', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(60, 'Должность 60', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(61, 'Должность 61', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(62, 'Должность 62', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(63, 'Должность 63', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(64, 'Должность 64', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(65, 'Должность 65', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(66, 'Должность 66', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(67, 'Должность 67', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(68, 'Должность 68', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(69, 'Должность 69', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(70, 'Должность 70', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(71, 'Должность 71', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(72, 'Должность 72', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(73, 'Должность 73', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(74, 'Должность 74', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(75, 'Должность 75', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(76, 'Должность 76', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(77, 'Должность 77', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(78, 'Должность 78', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(79, 'Должность 79', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель'),
(80, 'Должность 80', 'з/п', 'Описание должности Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis distinctio qui repellendus placeat enim nulla, quidem necessitatibus laudantium', 'Работодатель');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
