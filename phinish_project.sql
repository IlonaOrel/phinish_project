-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 03 2021 г., 18:15
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phinish_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `photo`, `name`, `phone`, `email`, `password`, `specialization_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'doc1.jpg', 'Petra Volk', '315-15-15', 'asd@gmail.com', '$2y$10$Jjpy4RwsX7UuUSW8pkaAqunO6zzPapA0OSeyH5/mHScwkAY/fdsW6', 10, NULL, NULL, NULL),
(2, 'doc2.jpg', 'Rita Dydko', '(097)489-56-23', 'zxc45@gmail.com', 'qwerty', 3, NULL, NULL, NULL),
(3, 'doc3.jpg', 'Alice Bybka', '(097)489-56-23', 'zxc@gmail.com', 'asdfgh', 7, NULL, NULL, NULL),
(4, 'doc4.jpg', 'Ivo Bobyl', '315-15-15', 'boss@mail.com', '$2y$10$UozOnhaILAwZLXHI.kzja.Fr858o6Z0Pyo1tAQY/8foSpIuPz8B82', 4, NULL, NULL, NULL),
(5, 'doc5.jpg', 'Lilija Savchuk', '(066)715-99-88', 'LiliSav@mail.com', 'asdfgh', 5, NULL, '2021-10-03 05:36:25', '2021-10-03 05:36:25');

-- --------------------------------------------------------

--
-- Структура таблицы `doctor_patients`
--

CREATE TABLE `doctor_patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `conclusion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `treatment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_visit` datetime NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `examination_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctor_patients`
--

INSERT INTO `doctor_patients` (`id`, `conclusion`, `treatment`, `date_visit`, `patient_id`, `doctor_id`, `examination_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim fuga ipsum laborum minus pariatur repudiandae. Accusamus consequatur debitis ipsam officia quidem rerum saepe? Aliquid aspernatur consequuntur corporis cum delectus eos error, est inventore ipsam iure, molestias nostrum perferendis quam quasi quod sint ut! A aspernatur assumenda atque aut consequuntur cumque delectus dolor dolore doloremque ea eligendi esse eum eveniet ex magnam natus nisi nostrum nulla, odio officiis optio provident quia sunt temporibus tenetur ut veritatis vero vitae voluptatem voluptatum. Accusantium adipisci aspernatur beatae blanditiis consectetur culpa cum cumque, delectus doloribus ea eaque earum eius eligendi et facilis fugiat fugit inventore ipsa ipsam itaque iusto labore laboriosam laudantium magnam maiores minus necessitatibus nemo non, numquam perspiciatis quasi quisquam recusandae reiciendis reprehenderit soluta velit, voluptatem. Aut dolorem doloribus eveniet ipsa iste nam nobis? Culpa debitis doloremque esse eveniet molestias nisi porro provident quae quaerat, sint. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2021-08-01 00:00:00', 1, 3, 6, 1, NULL, NULL),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim fuga ipsum laborum minus pariatur repudiandae. Accusamus consequatur debitis ipsam officia quidem rerum saepe? Aliquid aspernatur consequuntur corporis cum delectus eos error, est inventore ipsam iure, molestias nostrum perferendis quam quasi quod sint ut! A aspernatur assumenda atque aut consequuntur cumque delectus dolor dolore doloremque ea eligendi esse eum eveniet ex magnam natus nisi nostrum nulla, odio officiis optio provident quia sunt temporibus tenetur ut veritatis vero vitae voluptatem voluptatum. Accusantium adipisci aspernatur beatae blanditiis consectetur culpa cum cumque, delectus doloribus ea eaque earum eius eligendi et facilis fugiat fugit inventore ipsa ipsam itaque iusto labore laboriosam laudantium magnam maiores minus necessitatibus nemo non, numquam perspiciatis quasi quisquam recusandae reiciendis reprehenderit soluta velit, voluptatem. Aut dolorem doloribus eveniet ipsa iste nam nobis? Culpa debitis doloremque esse eveniet molestias nisi porro provident quae quaerat, sint. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2021-08-17 00:00:00', 1, 2, 1, 2, NULL, NULL),
(3, 'test1 ', 'test2', '2021-08-31 00:00:00', 3, 3, 2, 1, NULL, NULL),
(4, '', '', '2021-09-07 00:00:00', 3, 3, 13, 3, NULL, NULL),
(5, 'test2', 'test1', '2021-10-01 00:00:00', 4, 1, 1, 2, '2021-10-03 06:08:13', '2021-10-03 11:43:44'),
(6, '', '', '2021-09-16 00:00:00', 1, 1, 8, 2, '2021-10-03 11:51:28', '2021-10-03 11:51:28');

-- --------------------------------------------------------

--
-- Структура таблицы `examinations`
--

CREATE TABLE `examinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `examinations`
--

INSERT INTO `examinations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Электрокардиография (ЭКГ)', NULL, NULL),
(2, 'ХОЛТЕРОВСКОЕ МОНИТОРИРОВАНИЕ ЭКГ', NULL, NULL),
(3, 'СУТОЧНОЕ МОНИТОРИРОВАНИЕ АРТЕРИАЛЬНОГО ДАВЛЕНИЯ (СМАД)', NULL, NULL),
(4, 'СПИРОГРАФИЯ ', NULL, NULL),
(5, 'МУЛЬТИСПИРАЛЬНАЯ КОМПЬЮТЕРНАЯ ТОМОГРАФИЯ (МСКТ)', NULL, NULL),
(6, 'МАГНИТНО-РЕЗОНАНСНАЯ ТОМОГРАФИЯ (МРТ)', NULL, NULL),
(7, 'Общий (клинический) анализ крови (ОАК)', NULL, NULL),
(8, 'Общий анализ мочи', NULL, NULL),
(9, 'Биохимические исследование крови', NULL, NULL),
(10, 'Микробиологические (бактериологические) исследования', NULL, NULL),
(11, 'Иммунологические исследования методом иммуноферментного анализа', NULL, NULL),
(12, 'Ультразвуковое исследование', NULL, NULL),
(13, 'Флюорография', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_09_28_135813_create_specializations_table', 1),
(4, '2021_09_28_140107_create_examinations_table', 1),
(5, '2021_09_28_140150_create_statuses_table', 1),
(6, '2021_09_28_140223_create_patients_table', 1),
(7, '2021_09_28_140250_create_doctors_table', 1),
(8, '2021_09_28_140322_create_doctor_patients_table', 1),
(9, '2021_09_30_073641_rename_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confidant` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `photo`, `name`, `birthday`, `address`, `phone`, `email`, `confidant`, `created_at`, `updated_at`) VALUES
(1, 'photo8.jpg', 'Ivan Bybko', '1981-03-02', 'Dnepr, st. Kazakova, 12/45', '745-12-23', 'bybko@qwe.qwe', 'Svetlana: 7891566', NULL, NULL),
(2, 'photo2.jpg', 'Artem Filipov', '1987-10-11', 'Dnepr, st Kazakova, 13\r\n', '(099)715-89-63', 'Art@qwe.qwe', 'Alisa:823-47-11', NULL, NULL),
(3, 'photo3.jpg', 'Sveta Soroka', '1995-12-23', 'Dnepr, st. Titova, 17/23', '(063)451-23-74', 'sorok@asd.as', 'Den:122-44-55', NULL, NULL),
(4, 'photo6.png', 'Vita Garkusha', '2021-10-13', 'Dnept, st Sv.Horobrogo 18 /5', '(093) 459-11-55', 'Garkush@mail.com', 'Sveta Garkusha: (073)125-45-63', '2021-10-03 06:07:16', '2021-10-03 06:07:16');

-- --------------------------------------------------------

--
-- Структура таблицы `specializations`
--

CREATE TABLE `specializations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL),
(2, 'Педиатр', NULL, NULL),
(3, 'Ортопед-травматолог', NULL, NULL),
(4, 'Семейный доктор', NULL, NULL),
(5, 'Невролог', NULL, NULL),
(6, 'Отоларинголог', NULL, NULL),
(7, 'Офтальмолог', NULL, NULL),
(8, 'Эндокринолог', NULL, NULL),
(9, 'Хирург', NULL, NULL),
(10, 'Кардиолог', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'discharged', NULL, NULL),
(2, 'undergoing examinal', NULL, NULL),
(3, 'undergoing treatment', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'ivan', 'boss@mail.com', NULL, '$2y$10$UozOnhaILAwZLXHI.kzja.Fr858o6Z0Pyo1tAQY/8foSpIuPz8B82', NULL, '2021-09-28 17:37:44', '2021-09-28 17:37:44');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `specialization_id` (`specialization_id`);

--
-- Индексы таблицы `doctor_patients`
--
ALTER TABLE `doctor_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_patients_patient_id_foreign` (`patient_id`),
  ADD KEY `doctor_patients_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_patients_examination_id_foreign` (`examination_id`),
  ADD KEY `doctor_patients_status_id_foreign` (`status_id`);

--
-- Индексы таблицы `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
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
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `doctor_patients`
--
ALTER TABLE `doctor_patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`);

--
-- Ограничения внешнего ключа таблицы `doctor_patients`
--
ALTER TABLE `doctor_patients`
  ADD CONSTRAINT `doctor_patients_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctor_patients_examination_id_foreign` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`),
  ADD CONSTRAINT `doctor_patients_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `doctor_patients_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
