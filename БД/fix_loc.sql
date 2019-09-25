-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 24 2019 г., 18:00
-- Версия сервера: 5.6.41
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fix.loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `club`
--

CREATE TABLE `club` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `playlist_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `club`
--

INSERT INTO `club` (`id`, `name`, `playlist_id`) VALUES
(1, 'Не клуб', 1),
(2, 'alfa', 1),
(3, 'beta', 2),
(4, 'gama', 3),
(5, 'delta', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT 'Без группы'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'Без группы'),
(2, 'second'),
(3, 'third'),
(4, 'fourth'),
(5, 'fifth');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'неизвестен'),
(2, 'romance'),
(3, 'rock'),
(4, 'pop'),
(5, 'classic');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1568663812),
('m190916_183513_create_genre_table', 1569337157),
('m190916_183938_create_playlist_table', 1569337157),
('m190916_184005_create_company_table', 1569337157),
('m190916_184025_create_track_table', 1569337159),
('m190916_184147_create_playlist_track_table', 1569337160),
('m190916_184210_create_club_table', 1569337161),
('m190916_184232_create_visitor_table', 1569337162),
('m190916_184244_create_visitor_genre_table', 1569337163),
('m190917_080420_insert_genre_table', 1569337163),
('m190917_080933_insert_playlist_table', 1569337163),
('m190917_081100_insert_company_table', 1569337163),
('m190917_081254_insert_track_table', 1569337163),
('m190917_081457_insert_playlist_track_table', 1569337164),
('m190917_081642_insert_club_table', 1569337164),
('m190917_081753_insert_visitor_table', 1569337164),
('m190917_082125_insert_visitor_genre_table', 1569337164);

-- --------------------------------------------------------

--
-- Структура таблицы `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT 'Плейлист пуст'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `playlist`
--

INSERT INTO `playlist` (`id`, `name`) VALUES
(1, 'playlist #1'),
(2, 'playlist #2'),
(3, 'playlist #3'),
(4, 'playlist #4');

-- --------------------------------------------------------

--
-- Структура таблицы `playlist_track`
--

CREATE TABLE `playlist_track` (
  `id` int(11) UNSIGNED NOT NULL,
  `playlist_id` int(11) UNSIGNED DEFAULT NULL,
  `track_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `playlist_track`
--

INSERT INTO `playlist_track` (`id`, `playlist_id`, `track_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `track`
--

CREATE TABLE `track` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `genre_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `track`
--

INSERT INTO `track` (`id`, `name`, `genre_id`) VALUES
(1, 'track #1', 2),
(2, 'track #2', 3),
(3, 'track #3', 4),
(4, 'track #4', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` enum('мужской','женский') DEFAULT NULL,
  `club_id` int(11) UNSIGNED DEFAULT NULL,
  `company_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `visitor`
--

INSERT INTO `visitor` (`id`, `name`, `gender`, `club_id`, `company_id`) VALUES
(1, 'Anton', 'мужской', 2, 2),
(2, 'Bella', 'женский', 2, 2),
(3, 'Vlad', 'мужской', 3, 3),
(4, 'Galla', 'женский', 3, 3),
(5, 'Denis', 'мужской', 5, NULL),
(6, 'Elena', 'женский', 5, NULL),
(7, 'Fry', 'мужской', 1, NULL),
(8, 'George', 'мужской', 4, NULL),
(9, 'Hovard', 'мужской', 2, 4),
(10, 'Jay', 'женский', 2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `visitor_genre`
--

CREATE TABLE `visitor_genre` (
  `id` int(11) UNSIGNED NOT NULL,
  `visitor_id` int(11) UNSIGNED DEFAULT NULL,
  `genre_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `visitor_genre`
--

INSERT INTO `visitor_genre` (`id`, `visitor_id`, `genre_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 1, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 4),
(9, 8, 3),
(10, 9, 3),
(11, 10, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_club_playlist_id` (`playlist_id`);

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `playlist_track`
--
ALTER TABLE `playlist_track`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_playlist_track_playlist_id` (`playlist_id`),
  ADD KEY `FK_playlist_track_track_id` (`track_id`);

--
-- Индексы таблицы `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_track_genre_id` (`genre_id`);

--
-- Индексы таблицы `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_visitor_club_id` (`club_id`),
  ADD KEY `FK_visitor_company_id` (`company_id`);

--
-- Индексы таблицы `visitor_genre`
--
ALTER TABLE `visitor_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_visitor_genre_visitor_id` (`visitor_id`),
  ADD KEY `FK_visitor_genre_genre_id` (`genre_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `playlist_track`
--
ALTER TABLE `playlist_track`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `visitor_genre`
--
ALTER TABLE `visitor_genre`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `FK_club_playlist_id` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `playlist_track`
--
ALTER TABLE `playlist_track`
  ADD CONSTRAINT `FK_playlist_track_playlist_id` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_playlist_track_track_id` FOREIGN KEY (`track_id`) REFERENCES `track` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `FK_track_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `FK_visitor_club_id` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_visitor_company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `visitor_genre`
--
ALTER TABLE `visitor_genre`
  ADD CONSTRAINT `FK_visitor_genre_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_visitor_genre_visitor_id` FOREIGN KEY (`visitor_id`) REFERENCES `visitor` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
