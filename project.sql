-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 09 2020 г., 18:25
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlAlias` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(26, 'Tasks/e1ad82.jpg', 9, 1, 'Task', '59c323cf41-1', ''),
(27, 'Tasks/376ea6.docx', 8, 1, 'Task', '265fdaafc2-1', ''),
(28, 'Tasks/Task8/12e33b.docx', 8, NULL, 'Task', '13c65ad470-2', '');

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `languagename` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id_language`, `languagename`) VALUES
(1, 'C#'),
(2, 'PHP'),
(3, 'JS'),
(4, 'HTML');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m140622_111540_create_image_table', 1583130018),
('m140622_111545_add_name_to_image_table', 1583130018);

-- --------------------------------------------------------

--
-- Структура таблицы `organization`
--

CREATE TABLE `organization` (
  `id_organization` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lvl` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetask` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) NOT NULL,
  `automat_ruch` int(11) NOT NULL,
  `id_organization` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id_task`, `title`, `description`, `lvl`, `language`, `filetask`, `time`, `automat_ruch`, `id_organization`, `answer`) VALUES
(1, 'Физика: Кинетика', 'Не следует, однако, забывать о том, что дальнейшее развитие различных форм деятельности напрямую зависит от существующих финансовых и административных условий. Значимость этих проблем настолько очевидна, что курс на социально-ориентированный национальный проект играет важную роль в формировании системы обучения кадров, соответствующей насущным потребностям. Значимость этих проблем настолько очевидна, что сложившаяся структура организации позволяет выполнить важнейшие задания по разработке системы обучения кадров, соответствующей насущным потребностям.\r\n\r\nПовседневная практика показывает, что начало повседневной работы по формированию позиции позволяет выполнить важнейшие задания по разработке ключевых компонентов планируемого обновления? Задача организации, в особенности же дальнейшее развитие различных форм деятельности обеспечивает широкому кругу специалистов участие в формировании дальнейших направлений развития проекта? Дорогие друзья, сложившаяся структура организации обеспечивает широкому кругу специалистов участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, что постоянный количественный рост и сфера нашей активности позволяет оценить значение новых предложений!\r\n\r\nЗначимость этих проблем настолько очевидна, что рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы масштабного изменения ряда параметров.\r\n\r\nЗадача организации, в особенности же сложившаяся структура организации требует определения и уточнения существующих финансовых и административных условий. С другой стороны реализация намеченного плана развития играет важную роль в формировании направлений прогрессивного развития? Значимость этих проблем настолько...', 4, '1', '/uploads/spisok_voprosov.docx', 1248, 1, 1, 'asdasd'),
(2, 'Массивы', 'Задача организации, в особенности же консультация с профессионалами из IT позволяет выполнить важнейшие задания по разработке ключевых компонентов планируемого обновления! Задача организации, в особенности же дальнейшее развитие различных форм деятельности представляет собой интересный эксперимент проверки существующих финансовых и административных условий? Дорогие друзья, реализация намеченного плана развития требует определения и уточнения новых предложений.\r\n\r\nСоображения высшего порядка, а также постоянное информационно-техническое обеспечение нашей деятельности требует от нас системного анализа новых предложений? Таким образом, реализация намеченного плана развития играет важную роль в формировании дальнейших направлений развития проекта. Разнообразный и богатый опыт рамки и место обучения кадров требует от нас системного анализа ключевых компонентов планируемого обновления? Дорогие друзья, постоянный количественный рост и сфера нашей активности требует определения и уточнения дальнейших направлений развития проекта?\r\n\r\nРазнообразный и богатый опыт начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствующей насущным потребностям. Задача организации, в особенности же повышение уровня гражданского сознания позволяет выполнить важнейшие задания по разработке форм воздействия. Соображения высшего порядка, а также реализация намеченного плана развития создаёт предпосылки качественно новых шагов для новых предложений. С другой стороны сложившаяся структура организации позволяет выполнить важнейшие задания по разработке экономической целесообразности принимаемых решений.\r\n\r\nТаким образом, повышение уровня гражданского сознания играет важную...', 4, '2', '', 1248, 2, 1, ''),
(3, 'Биология', 'аким образом, дальнейшее развитие различных форм деятельности влечет за собой процесс внедрения и модернизации ключевых компонентов планируемого обновления. Равным образом реализация намеченного плана развития представляет собой интересный эксперимент проверки всесторонне сбалансированных нововведений! Равным образом начало повседневной работы по формированию позиции требует определения и уточнения позиций, занимаемых участниками в отношении поставленных задач?\r\n\r\nЗадача организации, в особенности же рамки и место обучения кадров в значительной степени обуславливает создание форм воздействия. Таким образом, постоянный количественный рост и сфера нашей активности позволяет выполнить важнейшие задания по разработке дальнейших направлений развитая системы массового участия? Соображения высшего порядка, а также выбранный нами инновационный путь создаёт предпосылки качественно новых шагов для ключевых компонентов планируемого обновления. Таким образом, социально-экономическое развитие обеспечивает широкому кругу специалистов участие в формировании системы обучения кадров, соответствующей насущным потребностям.\r\n\r\nЗадача организации, в особенности же выбранный нами инновационный путь создаёт предпосылки качественно новых шагов для ключевых компонентов планируемого обновления. Равным образом рамки и место обучения кадров требует определения и уточнения позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же новая модель организационной деятельности обеспечивает актуальность направлений прогрессивного развития. Значимость этих проблем настолько очевидна, что начало повседневной работы по формированию позиции играет важную роль в формировании модели развития!\r\n\r\nДорогие друзья, сложившаяся структура организации...', 2, '2', '', 1248, 1, 1, 'asdasd'),
(4, 'Проверка', 'gfdsfasd', 3, '2', NULL, 1208, 1, 1, 'adsdada'),
(5, 'Физика: Кинетика2', 'Не следует, однако, забывать о том, что дальнейшее развитие различных форм деятельности напрямую зависит от существующих финансовых и административных условий. Значимость этих проблем настолько очевидна, что курс на социально-ориентированный национальный проект играет важную роль в формировании системы обучения кадров, соответствующей насущным потребностям. Значимость этих проблем настолько очевидна, что сложившаяся структура организации позволяет выполнить важнейшие задания по разработке системы обучения кадров, соответствующей насущным потребностям.\r\n\r\nПовседневная практика показывает, что начало повседневной работы по формированию позиции позволяет выполнить важнейшие задания по разработке ключевых компонентов планируемого обновления? Задача организации, в особенности же дальнейшее развитие различных форм деятельности обеспечивает широкому кругу специалистов участие в формировании дальнейших направлений развития проекта? Дорогие друзья, сложившаяся структура организации обеспечивает широкому кругу специалистов участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Значимость этих проблем настолько очевидна, что постоянный количественный рост и сфера нашей активности позволяет оценить значение новых предложений!\r\n\r\nЗначимость этих проблем настолько очевидна, что рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы масштабного изменения ряда параметров.\r\n\r\nЗадача организации, в особенности же сложившаяся структура организации требует определения и уточнения существующих финансовых и административных условий. С другой стороны реализация намеченного плана развития играет важную роль в формировании направлений прогрессивного развития? Значимость этих проблем настолько...', 4, '2', '', 1248, 1, 1, 'asdasd'),
(6, 'Проверка2', 'Текст ответа', 1, '2', NULL, 1208, 1, 2, 'adsdada'),
(7, 'Проверка3', 'gfdsfasd', 1, '3', NULL, 1208, 1, 1, 'adsdada'),
(8, 'Массивы2', 'Задача организации, в особенности же консультация с профессионалами из IT позволяет выполнить важнейшие задания по разработке ключевых компонентов планируемого обновления! Задача организации, в особенности же дальнейшее развитие различных форм деятельности представляет собой интересный эксперимент проверки существующих финансовых и административных условий? Дорогие друзья, реализация намеченного плана развития требует определения и уточнения новых предложений.\r\n\r\nСоображения высшего порядка, а также постоянное информационно-техническое обеспечение нашей деятельности требует от нас системного анализа новых предложений? Таким образом, реализация намеченного плана развития играет важную роль в формировании дальнейших направлений развития проекта. Разнообразный и богатый опыт рамки и место обучения кадров требует от нас системного анализа ключевых компонентов планируемого обновления? Дорогие друзья, постоянный количественный рост и сфера нашей активности требует определения и уточнения дальнейших направлений развития проекта?\r\n\r\nРазнообразный и богатый опыт начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствующей насущным потребностям. Задача организации, в особенности же повышение уровня гражданского сознания позволяет выполнить важнейшие задания по разработке форм воздействия. Соображения высшего порядка, а также реализация намеченного плана развития создаёт предпосылки качественно новых шагов для новых предложений. С другой стороны сложившаяся структура организации позволяет выполнить важнейшие задания по разработке экономической целесообразности принимаемых решений.\r\n\r\nТаким образом, повышение уровня гражданского сознания играет важную...', 5, '2', 'uploads/pfOn6Q1NLUhNLMc0fShE35 (3).jpg', 1248, 2, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_organization` int(11) DEFAULT NULL,
  `name_org` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `status`, `id_organization`, `name_org`, `fio`, `access_token`) VALUES
(1, 'admin', 'admin@yandex.ru', 'admin', '5GSdik7JKclZip6pYjTET7AN5S2lOWZ3', 1582567694, '', NULL, '127.0.0.1', 1582567671, 1582605362, 0, 1582610724, 1, 1, '', '', 0),
(2, 'orgrtk', 'orgrtk@gmail.com', 'pass', '', NULL, '', NULL, '', NULL, NULL, 0, NULL, 2, 1, 'RTK', NULL, NULL),
(3, 'kit', 'kit@gmail.com', 'pass', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, 3, 'KIT', NULL, NULL),
(4, 'user_1', 'user@gmail.com', 'pass', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 3, 1, NULL, 'Петров Иван Пышникович', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_language`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id_organization`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Индексы таблицы `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `organization`
--
ALTER TABLE `organization`
  MODIFY `id_organization` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
