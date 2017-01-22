-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 22 Sty 2017, 12:57
-- Wersja serwera: 5.5.53-0+deb8u1
-- Wersja PHP: 7.0.14-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `database`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `category` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
`id` int(11) NOT NULL,
  `picture` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `category` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(11) NOT NULL,
  `tresc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `odpa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `odpb` text CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `odpc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `odpd` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `answer` text CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `kategoria` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`id`, `tresc`, `odpa`, `odpb`, `odpc`, `odpd`, `answer`, `kategoria`) VALUES
(1, 'Pierwsza prędkość kosmiczna jest wystarczająca...', 'do okrążenia kuli Ziemskiej.', 'aby dolecieć do Księżyca.', 'aby dolecieć na Marsa.', 'wszystkie odpowiedzi są prawidłowe.', 'a', 'grawitacja'),
(2, 'Pierwsza prędkość kosmiczna Ziemi wynosi?', '$${8,91 km/s}$$', '$${6,67 km/s^2}$$', '$${7,91 km/s}$$', '$${10,11 km/s}$$', 'c', 'grawitacja'),
(3, 'Dwa ciała o masach m oraz M znajdują się w odległości R. Siłę przyciągania grawitacyjnego pomiędzy tymi ciałami prawidłowo opisuje wzór: ', '$${F = GmMR^2}$$', '$${F = GmMR}$$', '$${F = G\\frac{mM}{R^2}}$$', '$${F=G\\frac{mM}{R}}$$', 'c', 'grawitacja'),
(4, 'Oblicz przyspieszenie grawitacyjne na powierzchni Marsa, przyjmując promień planety jako 3397 km i jej masę jako M = 6,42*10<sup>23</sup>kg oraz stał grawitacji G = 6,67*10<sup>-11</sup>m<sup>3</sup>/kgs<sup>3<sup3>', '$${\\sim 3,65 m/s^2}$$', '$${\\sim 3,72 m/s^2}$$', '$${\\sim 3,81 m/s^2}$$', '$${\\sim 3,92 m/s^2}$$', 'b', 'grawitacja'),
(5, 'Oblicz pierwszą prędkość kosmiczną dla Księżyca. Przyjmij masę Księżyca jako M = 0,74*10<sup>23</sup> kg i promień Księżyca R = 1,74*10<sup>6</sup> m.', '$${1,68 km/s}$$', '$${2,84km/s}$$', '$${10,11 km/s}$$', '$${7,91 km/s}$$', 'a', 'grawitacja'),
(6, 'Zaćmienie Słońca występuje gdy... ?', 'Księżyc znajdzie się pomiędzy Ziemią i Słońcem.', 'Gwiazdą Polarną znajdzie się pomiędzy Słońcem.', 'Księżyc znajdzie się pomiędzy Ziemią i Słońcem.', 'Ziemia znajdzie się pomiędzy Słońcem i Księżycem.', 'a', 'układ słoneczny'),
(7, 'Ile jest rodzajów zaćmień słońca?', '5', '2', '4', '7', 'c', 'układ słoneczny'),
(8, 'Podaj odległość Ziemni - Księżyc.', '$${380 tys. km}$$', '$${150 tys. km}$$', '$${150 mln. km}$$', '$${310 tys. km}$$', 'a', 'układ słoneczny'),
(9, 'Podaj jaki czas musi pokonać światło ze Słońca do Ziemi?', '24 godziny', '8 minut', '24 minuty', '10 minut', 'b', 'układ słoneczny'),
(10, 'W przypadku zaćmienia całkowitego obserwator nie znajdujący się w centrum, czyli nie jest w cieniu, ale jest w półcieniu i obserwuje jedynie...', 'zaćmienie obrączkowe.', 'zaćmienie całkowite.', 'zaćmienie częściowe.', 'zaćmienie hybrydowe', 'c', 'układ słoneczny'),
(11, 'Jaki izotop Uranu jest wykorzystywany w reaktorach jądrowych:', '$${^{238}U}$$', '$${^{233}U}$$', '$${^{235}U}$$', '$${^{234}U}$$', 'c', 'fizyka jądrowa'),
(12, 'Czas połowicznego rozpadu jest oznaczany jako:', '$${T_{1/2}}$$', '$${t}$$', '$${N_0}$$', '$${N_t}$$', 'a', 'fizyka jądrowa'),
(13, 'Okres połowicznego rozpadu kobaltu wynosi 5 lat. Ile g kobaltu pozostanie po 15 latach z próbki o masie 20 g?', '$${10 g}$$', '$${2,5 g}$$', '$${5 g}$$', '$${18 g}$$', 'b', 'fizyka jądrowa'),
(14, 'Po upływie 20 lat z 3 kg próbki plutonu pozostało 750 g. Oblicz okres połowicznego rozpadu.', '$${5 lat}$$', '$${12 lat}$$', '$${3 lat}$$', '$${10 lat}$$', 'd', 'fizyka jądrowa'),
(15, 'Co oznacza liczba <sup>238</sup>U', 'liczba atomów', 'gęstość', 'masa atomowa', 'temperatura topnienia', 'c', 'fizyka jądrowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `login` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$eCCsS/CnG0jqvH6scUotauAVYHj/AXdaFEp7NMxXcB3cGiOcozNPq');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id` int(11) NOT NULL,
  `tresc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `czytaj` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `video`
--

INSERT INTO `video` (`id`, `tresc`, `url`, `czytaj`) VALUES
(1, 'Skąd się biorą pasaty?', 'https://www.youtube.com/watch?v=8eZDX4DOLxM', 'Pasaty to ciepłe niezbyt silne wiatry, wiejące od szerokości zwrotnikowych w kierunku równika. Wiedzieli o nich już starożytni żeglarze  (również Kolumb, kiedy odkrywał Amerykę). Jak powstają? Jak można je modelować doświadczalnie?  Dwa zjawiska odpowiadają za powstawanie pasatów: konwekcja i siła Coriolisa.  Obejrzyj powyższy film.'),
(2, 'Promieniowanie jonizujące i jego przenikalność', 'https://www.youtube.com/watch?v=TQDIKL8jOTs', 'Jaka jest przenikalność promieniowania jonizującego w zależności jego rodzaju? Dowiesz się tego oglądając powyższy film.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `pictures`
--
ALTER TABLE `pictures`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
