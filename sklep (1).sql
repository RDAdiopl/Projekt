-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Sty 2020, 00:38
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `idproduktu` int(11) NOT NULL,
  `produkt` varchar(255) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`idproduktu`, `produkt`, `cena`) VALUES
(1, 'paczki', 11),
(2, 'dywan', 15),
(3, 'bluzka', 5),
(4, 'rajstopy', 50),
(5, 'Torebka', 20),
(6, 'Telefon', 120);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `login` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`iduser`, `login`, `password`) VALUES
(1, 'Adio', '$2y$10$GI.XMrWiaqjOe5nAiECkkuIcN2He3oh5YVAjtAd32AjRZbxtb2.ke'),
(2, 'Kako', '$2y$10$myy5CvVcTAIJnT4RPr/L/uIUYjlrgjSrJBxqIZ/LY.yys/VtVltJG'),
(3, 'admin', '$2y$10$EdcDopBoYaHyT/BQo/CpDOWZYotE.7p6mxTQriEKT0qzl2YrBhON6');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `idzamowienia` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idproduktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `dnia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`idzamowienia`, `iduser`, `idproduktu`, `ilosc`, `dnia`) VALUES
(1, 1, 1, 5, '0000-00-00'),
(2, 1, 2, 3, '0000-00-00'),
(3, 2, 1, 5, '0000-00-00'),
(4, 2, 2, 3, '0000-00-00'),
(5, 2, 3, 1, '0000-00-00'),
(6, 2, 1, 5, '0000-00-00'),
(7, 2, 2, 5, '0000-00-00'),
(8, 2, 2, 5, '2020-01-27'),
(9, 2, 3, 3, '2020-01-27'),
(10, 2, 4, 10, '2020-01-27');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`idproduktu`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`idzamowienia`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `idproduktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idzamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
