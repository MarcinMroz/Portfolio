-- phpMyAdmin SQL Dump
-- version 4.4.2
-- http://www.phpmyadmin.net
--
-- Host: 172.16.0.1
-- Czas generowania: 12 Sty 2017, 19:58
-- Wersja serwera: 5.5.52-log
-- Wersja PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `i4737_mroz1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `friends`
--

CREATE TABLE `friends` (
  `my_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `friends`
--

INSERT INTO `friends` (`my_id`, `friend_id`) VALUES
(1, 5),
(1, 7),
(1, 3),
(1, 2),
(1, 6),
(3, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `type` char(1) NOT NULL,
  `owner` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `data` datetime NOT NULL,
  `label` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `note`
--

INSERT INTO `note` (`id`, `author`, `title`, `type`, `owner`, `content`, `data`, `label`) VALUES
(2, 1, 'Lubię naleśniki', '1', 1, 'Lubię pożerać duże naleśniki na śniadanie, a na kolację zjadam kisiel. Lubię pożerać duże naleśniki na śniadanie, a na kolację zjadam kisiel. Lubię pożerać duże naleśniki na śniadanie, a na kolację zjadam kisiel. Lubię pożerać duże naleśniki na śniadanie, a na kolację zjadam kisiel. Lubię pożerać duże naleśniki na śniadanie, a na kolację zjadam kisiel. Lubię pożerać duże naleśniki na śniadanie, a na kolację zjadam kisiel. Lubię pożerać duże naleśniki na śniadanie, a na kolację zjadam kisiel. Lubię pożerać duże naleśniki na śniadanie, a na kolację zjadam kisiel.', '2016-12-21 16:46:01', 0),
(3, 1, 'Lista zakupów', '0', 1, 'Chleb Masło Pasztet Piwo Woda', '2016-12-21 23:58:12', 0),
(25, 3, 'bbbb', '1', 3, 'bb', '2016-12-30 22:22:57', 0),
(28, 3, 'Notatka od Ani', '1', 1, 'Cześć Adaś', '2016-12-31 11:55:26', 0),
(32, 3, 'tramwajek', '1', 3, '', '2017-01-03 15:39:37', 0),
(33, 1, 'lubie placki', '1', 1, 'a ja wole placki z ogĂłrkami kiszonymi', '2017-01-08 14:59:21', 2),
(34, 1, 'test', '1', 1, 'zxc jhf f', '2017-01-09 17:58:04', 2),
(35, 3, 'Od Ani dla Adasia', '1', 3, 'babababaa', '2017-01-09 18:45:24', 0),
(36, 3, 'Od Ani dla Adasia', '1', 1, 'babababaa', '2017-01-09 18:45:24', 1),
(37, 1, 'tramwajek', '1', 1, 'tramwajek najbardziej', '2017-01-09 18:55:35', 0),
(38, 1, 'Tanki', '1', 1, 'ochota na tanki rośnie jak... szczególnie gdy widzisz sylwię', '2017-01-09 19:16:13', 2),
(49, 3, 'Od Ani dla Adasia', '1', 6, 'babababaa', '2017-01-09 18:45:24', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`) VALUES
(1, 'adam', 'qwerty', 'adam@gmail.com'),
(2, 'marek', 'asdfg', 'marek@gmail.com'),
(3, 'anna', 'zxcvb', 'anna@gmail.com'),
(4, 'andrzej', 'asdfg', 'andrzej@gmail.com'),
(5, 'justyna', 'yuiop', 'justyna@gmail.com'),
(6, 'kasia', 'hjkkl', 'kasia@gmail.com'),
(7, 'beata', 'fgthj', 'beata@gmail.com'),
(8, 'jakub', 'ertyu', 'jakub@gmail.com'),
(9, 'janusz', 'cvbnm', 'janusz@gmail.com'),
(10, 'roman', 'dfghj', 'roman@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD KEY `my_id` (`my_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
