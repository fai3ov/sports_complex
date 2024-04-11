-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 11 2024 г., 01:23
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gymnsb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `name`) VALUES
(2, 'admin', 'f2d0ff370380124029c2b807a924156c', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `announcements`
--

INSERT INTO `announcements` (`id`, `message`, `date`) VALUES
(12, 'Мы открылись!', '2023-09-01'),
(13, 'Больше сотни различных тренажёров! Приходи - не пожалеешь!', '2023-11-01');

-- --------------------------------------------------------

--
-- Структура таблицы `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `curr_date` mediumtext NOT NULL,
  `curr_time` mediumtext NOT NULL,
  `present` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `amount`, `quantity`, `vendor`, `description`, `address`, `contact`, `date`) VALUES
(13, 'Беговая дорожка', 500000, 10, 'SportTech Innovations', 'Кардиотренажёр', 'Казань, ул. Спортивная, д. 1', '9991001010', '2023-10-01'),
(14, 'Эллиптический тренажёр', 230000, 10, 'SportTech Innovations', 'Кардиотренажёр', 'Казань, ул. Спортивная, д. 1', '9991001010', '2023-10-01'),
(15, 'Велотренажёр', 1500000, 10, 'SportTech Innovations', 'Кардиотренажёр', 'Казань, ул. Спортивная, д. 1', '9991001010', '2023-10-01'),
(24, 'g', 50000, 5, 'h', 'g', 'h', '8888888888', '2023-02-01');

-- --------------------------------------------------------

--
-- Структура таблицы `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `dor` date NOT NULL DEFAULT current_timestamp(),
  `services` varchar(50) NOT NULL,
  `amount` int(100) DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `end_of_plan` date DEFAULT NULL,
  `plan` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `attendance_count` int(100) NOT NULL,
  `ini_weight` int(100) NOT NULL DEFAULT 0,
  `curr_weight` int(100) NOT NULL DEFAULT 0,
  `ini_bodytype` varchar(50) NOT NULL,
  `curr_bodytype` varchar(50) NOT NULL,
  `progress_date` date DEFAULT NULL,
  `reminder` int(11) NOT NULL DEFAULT 0,
  `last_reminder_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `members`
--

INSERT INTO `members` (`user_id`, `fullname`, `username`, `password`, `gender`, `dob`, `dor`, `services`, `amount`, `paid_date`, `end_of_plan`, `plan`, `address`, `contact`, `status`, `attendance_count`, `ini_weight`, `curr_weight`, `ini_bodytype`, `curr_bodytype`, `progress_date`, `reminder`, `last_reminder_date`) VALUES
(80, 'Иванов Иван Иванович', 'ivan', '81dc9bdb52d04dc20036dbd8313ed055', 'Мужской', '1990-01-01', '2024-04-10', 'Фитнес, Сауна', 45000, '2024-04-10', '2024-07-10', '3', 'Казань', '9000000000', 'Active', 2, 100, 75, 'Толстое', 'Плотное', '2024-04-10', 1, '2024-04-10'),
(81, 'Игнатов Игнат Игнатович', 'ignat', '81dc9bdb52d04dc20036dbd8313ed055', 'Мужской', '2002-01-01', '2024-04-10', 'Фитнес, Сауна, Кардио', 276000, '2024-04-10', '2025-04-10', '12', 'Казань', '9000000000', 'Active', 2, 0, 0, '', '', NULL, 1, '2024-04-10'),
(82, 'Иванова Екатерина Михайловна', 'kate', '81dc9bdb52d04dc20036dbd8313ed055', 'Женский', '2002-01-01', '2024-04-10', 'Фитнес, Кардио', 54000, '2024-04-10', '2024-07-10', '3', 'Казань', '9000000000', 'Active', 1, 0, 0, '', '', NULL, 0, NULL),
(83, 'Алексеев Алексей Алексеевич', 'alex', '81dc9bdb52d04dc20036dbd8313ed055', 'Мужской', '1980-01-01', '2024-04-10', 'Фитнес, Сауна, Кардио', 138000, '2024-04-10', '2024-10-10', '6', 'Казань', '9000000000', 'Active', 12, 0, 0, '', '', NULL, 1, '2024-04-10'),
(85, 'Попова Алёна Андреевна', 'alyona', '81dc9bdb52d04dc20036dbd8313ed055', 'Женский', '1995-05-01', '2024-04-11', 'Фитнес, Кардио', 108000, '2024-04-11', '2024-10-11', '6', 'Казань', '9000000000', 'Active', 2, 0, 0, '', '', NULL, 1, '2024-04-11'),
(104, 'Артёмов Артём Артёмович', 'artyom', '81dc9bdb52d04dc20036dbd8313ed055', 'Мужской', '2002-02-01', '2024-04-11', 'Фитнес, Сауна, Кардио', 23000, '2024-04-11', '2024-05-11', '1', 'Казань', '9000000000', 'Active', 0, 0, 0, '', '', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `rates`
--

INSERT INTO `rates` (`id`, `name`, `charge`) VALUES
(1, 'Fitness', '55'),
(2, 'Sauna', '35'),
(3, 'Cardio', '40');

-- --------------------------------------------------------

--
-- Структура таблицы `reminder`
--

CREATE TABLE `reminder` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` mediumtext NOT NULL,
  `status` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reminder`
--

INSERT INTO `reminder` (`id`, `name`, `message`, `status`, `date`, `user_id`) VALUES
(12, 'staff', 'asd', 'unread', '2020-04-16 22:39:59', 0),
(13, 'staff', 'asdasdas', 'unread', '2020-04-16 22:40:49', 0),
(14, 'staff', 'ASasA', 'unread', '2020-04-16 22:41:59', 0),
(15, 'staff', 'asdasdasd', 'unread', '2020-04-16 22:42:28', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `staffs`
--

CREATE TABLE `staffs` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `staffs`
--

INSERT INTO `staffs` (`user_id`, `username`, `password`, `email`, `fullname`, `address`, `designation`, `gender`, `contact`) VALUES
(6, 'arnoldschwarzenegger', 'fe61aa31009a322dce4bb57f8d53ad74', 'arnoldschwarzenegger@gmail.com', ' Арнольд Шварценеггер', 'г. Лос-Анжелес, США', 'Тренер (зал)', 'Мужской', '2121234567'),
(11, 'nevskyalexander', '248592b4d3dda8886e337e0ee9660db0', 'nevskyalexander@gmail.com', 'Невский Александр Александрович', 'г. Москва, Россия', 'Тренер (зал)', 'Мужской', '9873332211'),
(13, 'hasbik', '89114437c407ededddf1335d8f0e06eb', 'hasbik@gmail.com', 'Хасбик Магомедов', 'г. Махачкала, Россия', 'Тренер (зал)', 'Мужской', '8721001010');

-- --------------------------------------------------------

--
-- Структура таблицы `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task_status` varchar(50) NOT NULL,
  `task_desc` varchar(30) NOT NULL,
  `user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `todo`
--

INSERT INTO `todo` (`id`, `task_status`, `task_desc`, `user_id`) VALUES
(20, 'In Progress', 'Test Completed', 14),
(21, 'Pending', 'Mastering Crunches', 6),
(22, 'In Progress', 'Standing Workouts For Flat Abs', 6),
(23, 'In Progress', 'Triceps Buildup - 3 set', 14),
(24, 'Pending', 'Decline dumbbell bench press', 6),
(27, 'Pending', 'dddd', 0),
(28, 'In Progress', 'Test 1', 23),
(44, 'In Progress', '44', 0),
(53, 'In Progress', 'Планка 5 мин', 2),
(54, 'In Progress', 'Планка 5 мин', 51),
(55, 'In Progress', 'Прыгать', 79);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT для таблицы `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `staffs`
--
ALTER TABLE `staffs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
