-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2017 at 03:01 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.1.3-3+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SD25quiz`
--

-- drop database SD25quiz;
create database SD25quiz;
use SD25quiz;
-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(10) UNSIGNED NOT NULL,
  `AdminName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `AnswerID` int(10) UNSIGNED NOT NULL,
  `Answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuestionID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`AnswerID`, `Answer`, `QuestionID`) VALUES
(22, 'AAA', 12),
(23, 'BBB', 12),
(24, 'CCC', 12),
(25, 'DDD', 12),
(26, 'AAA1-2', 13),
(27, 'BBB1-2', 13),
(28, 'CCC1-2', 13),
(29, 'DDD1-2', 13),
(30, 'AAA', 14),
(31, 'BBB', 14),
(32, 'CCC', 14),
(33, 'DDD', 14);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `InstructorID` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`InstructorID`, `FirstName`, `LastName`, `id`) VALUES
(1, 'Doug', 'Jackson', NULL),
(2, 'Brian', 'Westbrook', NULL),
(3, 'Doug', 'Jackson', NULL),
(4, 'Brian', 'Westbrook', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2017_04_12_192401_create_admins_table', 1),
(28, '2017_04_13_173005_create_programs_table', 1),
(29, '2017_04_17_172654_create_modules_table', 1),
(30, '2017_04_19_205020_change_Models_table', 2),
(31, '2017_04_20_174638_create_quizzes_table', 3),
(32, '2017_04_20_174639_create_quizzes_table', 4),
(33, '2017_04_13_173006_create_programs_table', 5),
(34, '2017_04_17_172655_create_modules_table', 5),
(35, '2017_04_20_174630_create_quizzes_table', 5),
(36, '2017_04_20_175236_create_students_table', 6),
(37, '2017_04_20_174631_create_quizzes_table', 7),
(38, '2017_04_21_171220_create_questions_table', 8),
(39, '2017_04_21_183404_create_answers_table', 9),
(40, '2017_04_21_174932_create_instructors_table', 10),
(41, '2017_04_24_191149_create_tests_table', 11),
(42, '2017_04_24_203545_create_responses_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `ModuleID` int(10) UNSIGNED NOT NULL,
  `ModuleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProgramID` int(10) UNSIGNED NOT NULL,
  `Active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`ModuleID`, `ModuleName`, `ProgramID`, `Active`) VALUES
(1, 'Module 1 - Intro to Programming Concepts', 1, 'Yes'),
(2, 'Module 2 - C# & .NET Framework', 1, 'No'),
(3, 'Module 3 - Databases', 1, 'No'),
(4, 'Accounting', 2, 'Yes'),
(5, 'Intro to Computers', 2, 'Yes'),
(7, 'Administration', 4, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `ProgramID` int(10) UNSIGNED NOT NULL,
  `ProgramName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProgramType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`ProgramID`, `ProgramName`, `ProgramType`, `Active`) VALUES
(1, 'Software Development', 'Technology', 'Yes'),
(2, 'Business Administration', 'Business', 'Yes'),
(4, 'Health Care', 'Health', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(10) UNSIGNED NOT NULL,
  `Question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CorrectAnswer` int(10) UNSIGNED NOT NULL,
  `QuizID` int(10) UNSIGNED NOT NULL,
  `Active` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `Question`, `Link`, `CorrectAnswer`, `QuizID`, `Active`) VALUES
(12, 'Quiz 1 Q1 Correct answer A', NULL, 22, 1, 'Yes'),
(13, 'Quiz1 Question2 Correct Answer C', NULL, 28, 1, 'Yes'),
(14, 'QQQ???', NULL, 30, 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `QuizID` int(10) UNSIGNED NOT NULL,
  `QuizName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No description',
  `ModuleID` int(10) UNSIGNED NOT NULL,
  `Active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`QuizID`, `QuizName`, `Description`, `ModuleID`, `Active`) VALUES
(1, 'Quiz on Intro to Programming Concepts', 'No description', 1, 'Yes'),
(2, 'Quiz on C# & .NET Framework', 'No description', 2, 'Yes'),
(3, 'Quiz on Databases', 'No description', 3, 'Yes'),
(4, 'Quiz on Accounting', 'No description', 4, 'Yes'),
(5, 'Quiz on Intro to computers', 'No description', 5, 'Yes'),
(6, 'New QuizTemplate', 'New Template', 1, 'No'),
(7, 'Template 2', 'test', 3, 'No'),
(8, 'Quiz on Administration', 'Empty Template for Health Care Program', 7, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `ResponseID` int(10) UNSIGNED NOT NULL,
  `TestID` int(10) UNSIGNED NOT NULL,
  `QuestionID` int(10) UNSIGNED NOT NULL,
  `AnswerID` int(10) UNSIGNED NOT NULL,
  `Correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IntakeID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `FirstName`, `LastName`, `Photo`, `IntakeID`, `id`) VALUES
(1, 'Jane', 'Doe', '1.jpg', 'SD25', NULL),
(2, 'David', 'Smith', '2.jpg', 'SD26', NULL),
(3, 'Allice', 'Xu', '3.jpg', 'SD24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `TestID` int(10) UNSIGNED NOT NULL,
  `QuizID` int(10) UNSIGNED NOT NULL,
  `StudentID` int(10) UNSIGNED NOT NULL,
  `StartDateTime` datetime NOT NULL,
  `StopDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`TestID`, `QuizID`, `StudentID`, `StartDateTime`, `StopDateTime`) VALUES
(1, 1, 1, '2017-03-14 05:00:00', '2017-03-14 08:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`AnswerID`),
  ADD KEY `answers_questionid_foreign` (`QuestionID`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`InstructorID`),
  ADD KEY `instructors_id_foreign` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`ModuleID`),
  ADD KEY `modules_programid_foreign` (`ProgramID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`ProgramID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `questions_quizid_foreign` (`QuizID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`QuizID`),
  ADD KEY `quizzes_moduleid_foreign` (`ModuleID`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`ResponseID`),
  ADD KEY `responses_testid_foreign` (`TestID`),
  ADD KEY `responses_questionid_foreign` (`QuestionID`),
  ADD KEY `responses_answerid_foreign` (`AnswerID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `students_studentid_unique` (`StudentID`),
  ADD KEY `students_id_foreign` (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`TestID`),
  ADD KEY `tests_quizid_foreign` (`QuizID`),
  ADD KEY `tests_studentid_foreign` (`StudentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `AnswerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `InstructorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `ModuleID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `ProgramID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `QuizID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `ResponseID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `TestID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_questionid_foreign` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_programid_foreign` FOREIGN KEY (`ProgramID`) REFERENCES `programs` (`ProgramID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quizid_foreign` FOREIGN KEY (`QuizID`) REFERENCES `quizzes` (`QuizID`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_moduleid_foreign` FOREIGN KEY (`ModuleID`) REFERENCES `modules` (`ModuleID`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_answerid_foreign` FOREIGN KEY (`AnswerID`) REFERENCES `answers` (`AnswerID`),
  ADD CONSTRAINT `responses_questionid_foreign` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`),
  ADD CONSTRAINT `responses_testid_foreign` FOREIGN KEY (`TestID`) REFERENCES `questions` (`QuestionID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_quizid_foreign` FOREIGN KEY (`QuizID`) REFERENCES `quizzes` (`QuizID`),
  ADD CONSTRAINT `tests_studentid_foreign` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
