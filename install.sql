-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2017 at 01:18 PM
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

-- --------------------------------------------------------

create database SD25quiz;
use SD25quiz;
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
(30, 'AAA-1', 14),
(31, 'BBB-1', 14),
(32, 'CCC', 14),
(33, 'DDD', 14),
(34, 'Answer 1', 15),
(35, 'Answer 2', 15),
(36, 'Answer 3', 15),
(37, 'Both C and D', 15),
(38, 'Answer1', 16),
(39, 'Answer2', 16),
(40, 'Answer3', 16),
(41, 'Answer4', 16);

-- --------------------------------------------------------

--
-- Table structure for table `InstructorIntakes`
--

CREATE TABLE `InstructorIntakes` (
  `InstructorID` int(10) UNSIGNED NOT NULL,
  `IntakeID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `InstructorIntakes`
--

INSERT INTO `InstructorIntakes` (`InstructorID`, `IntakeID`) VALUES
(1, 1),
(1, 2),
(2, 3);

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
(2, 'Brian', 'Westbrook', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intakes`
--

CREATE TABLE `intakes` (
  `IntakeID` int(10) UNSIGNED NOT NULL,
  `IntakeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProgramID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intakes`
--

INSERT INTO `intakes` (`IntakeID`, `IntakeName`, `ProgramID`) VALUES
(1, 'SD25', 1),
(2, 'SD26', 1),
(3, 'BA25', 2);

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
(42, '2017_04_24_203545_create_responses_table', 12),
(43, '2017_04_27_273722_create_intakes_table', 13),
(44, '2017_05_01_163527_Add_version_to_quizzes_table', 14),
(45, '2017_04_27_273723_create_intakes_table', 15),
(46, '2017_05_03_182005_create_instructorIntake_table', 16);

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
(1, 'Module 1_1', 1, 'Yes'),
(2, 'Module 2', 1, 'Yes'),
(3, 'Module 3', 1, 'No'),
(4, 'Accounting', 2, 'Yes'),
(5, 'Intro to Computers', 2, 'No'),
(7, 'JavaScript Intro', 4, 'Yes'),
(8, 'JavaScript Intro', 1, 'No');

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
(4, 'Health Care', 'Health', 'No');

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
(14, 'Question?', NULL, 32, 1, 'Yes'),
(15, 'Another question', NULL, 37, 1, 'Yes'),
(16, 'Question 1', NULL, 39, 7, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `QuizID` int(10) UNSIGNED NOT NULL,
  `QuizName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No description',
  `ModuleID` int(10) UNSIGNED NOT NULL,
  `Active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Version` int(11) NOT NULL DEFAULT '1',
  `ParentQuizID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`QuizID`, `QuizName`, `Description`, `ModuleID`, `Active`, `Version`, `ParentQuizID`) VALUES
(1, 'Quiz on Intro to Programming Concepts', 'Some Description', 1, 'Yes', 1, NULL),
(2, 'Quiz on C# & .NET Framework', 'No description', 2, 'Yes', 1, NULL),
(3, 'Quiz on Databases', 'No description', 3, 'Yes', 1, NULL),
(4, 'Quiz on Accounting', 'No description', 4, 'Yes', 1, NULL),
(5, 'Quiz on Intro to computers', 'No description', 5, 'Yes', 1, NULL),
(6, 'New QuizTemplate', 'New Template', 1, 'No', 1, NULL),
(7, 'Template 2_2', 'test_2', 3, 'No', 1, NULL),
(21, 'New Quiz 01', 'No description', 4, 'No', 1, NULL);

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
(1, 'Jane', 'Doe', '1.jpg', '1', NULL),
(2, 'David', 'Smith', '2.jpg', '2', NULL),
(3, 'Allice', 'Xu', '3.jpg', '1', NULL);

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
-- Indexes for table `InstructorIntakes`
--
ALTER TABLE `InstructorIntakes`
  ADD KEY `instructorintakes_instructorid_foreign` (`InstructorID`),
  ADD KEY `instructorintakes_intakeid_foreign` (`IntakeID`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`InstructorID`),
  ADD KEY `instructors_id_foreign` (`id`);

--
-- Indexes for table `intakes`
--
ALTER TABLE `intakes`
  ADD PRIMARY KEY (`IntakeID`),
  ADD KEY `intakes_programid_foreign` (`ProgramID`);

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
  MODIFY `AnswerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `InstructorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `intakes`
--
ALTER TABLE `intakes`
  MODIFY `IntakeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `ModuleID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `ProgramID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `QuizID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
-- Constraints for table `InstructorIntakes`
--
ALTER TABLE `InstructorIntakes`
  ADD CONSTRAINT `instructorintakes_instructorid_foreign` FOREIGN KEY (`InstructorID`) REFERENCES `instructors` (`InstructorID`),
  ADD CONSTRAINT `instructorintakes_intakeid_foreign` FOREIGN KEY (`IntakeID`) REFERENCES `intakes` (`IntakeID`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `intakes`
--
ALTER TABLE `intakes`
  ADD CONSTRAINT `intakes_programid_foreign` FOREIGN KEY (`ProgramID`) REFERENCES `programs` (`ProgramID`);

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
