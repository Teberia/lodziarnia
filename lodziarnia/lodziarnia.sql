-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sty 11, 2026 at 12:35 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lodziarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `platnosci`
--

CREATE TABLE `platnosci` (
  `platnosc_id` int(11) NOT NULL,
  `zamowienie_id` int(11) DEFAULT NULL,
  `rodzaj` varchar(50) DEFAULT NULL,
  `kwota` decimal(10,2) DEFAULT NULL,
  `data_utworzenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `rola_id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `status` char(1) DEFAULT 'T',
  `data_utworzenia` date DEFAULT NULL,
  `utworzyl` int(11) DEFAULT NULL,
  `data_modyfikacji` date DEFAULT NULL,
  `zmodyfikowal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rola_id`, `nazwa`, `status`, `data_utworzenia`, `utworzyl`, `data_modyfikacji`, `zmodyfikowal`) VALUES
(1, 'admin', 'A', '2000-12-12', 1, '2000-12-12', 1),
(2, 'produkcja', 'A', '2000-12-12', 1, '2000-12-12', 1),
(3, 'sprzedawca', 'A', '2012-12-12', 1, '2012-12-12', 1),
(4, 'manager', 'A', '2026-01-04', 1, '2026-01-04', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `smaki`
--

CREATE TABLE `smaki` (
  `smak_id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'aktywny',
  `dostepna_ilosc` decimal(10,2) DEFAULT 0.00,
  `data_modyfikacji` date DEFAULT NULL,
  `zmodyfikowal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `smaki`
--

INSERT INTO `smaki` (`smak_id`, `nazwa`, `status`, `dostepna_ilosc`, `data_modyfikacji`, `zmodyfikowal`) VALUES
(1, 'Kremówka', 'A', 213.70, '2026-01-05', NULL),
(2, 'Śmietankaa', 'A', 10.00, '2026-01-05', NULL),
(5, 'Truskawka', 'N', 0.00, '2026-01-05', NULL),
(6, 'Amarena', 'A', 1200.00, '2026-01-05', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `uzytkownik_id` int(11) NOT NULL,
  `imie` varchar(255) DEFAULT NULL,
  `nazwisko` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `haslo_hash` varchar(255) NOT NULL,
  `status_konta` char(1) DEFAULT 'A',
  `data_utworzenia` date DEFAULT NULL,
  `utworzyl` int(11) DEFAULT NULL,
  `data_modyfikacji` date DEFAULT NULL,
  `zmodyfikowal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`uzytkownik_id`, `imie`, `nazwisko`, `login`, `haslo_hash`, `status_konta`, `data_utworzenia`, `utworzyl`, `data_modyfikacji`, `zmodyfikowal`) VALUES
(1, 'Ela', 'Test', 'test', '$2y$12$cgD/Y4YKkijG1pl0ALEUuOz7OQ7sXBB5D12ca6u9kxBJVDnZXPhYS', 'A', '2000-12-12', 1, '2026-01-09', 1),
(2, 'Tom', 'Lyn', 'tom', '$2y$12$yg0z7g/li515Uxz4ngA4kudmOgMFK2JFp.cJ0M20yJs2i3hgUtRMW', 'N', '2000-12-12', 1, '2026-01-11', 1),
(4, 'Anna', 'Lim', 'alim', '$2y$12$umed0B6O2ycClzmPd3nSDeJLKW8Vh.m/cch2PubuOXjptyRWcNWoq', 'N', '2026-01-04', NULL, '2026-01-10', NULL),
(5, 'anna', 'ana', 'ana', '$2y$12$73N.7QlLBjZ52TG1FlBbkexrzbqmIOEuKrtcQdBFlIG4kMFGJAoUi', 'N', '2012-12-12', 1, '2026-01-10', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_role`
--

CREATE TABLE `uzytkownicy_role` (
  `uzytkownik_id` int(11) NOT NULL,
  `rola_id` int(11) NOT NULL,
  `data_nadania` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `uzytkownicy_role`
--

INSERT INTO `uzytkownicy_role` (`uzytkownik_id`, `rola_id`, `data_nadania`) VALUES
(1, 1, '2026-01-09'),
(2, 2, '2000-12-12'),
(4, 4, '2026-01-04'),
(5, 3, '2026-01-09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `zamowienie_id` int(11) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL,
  `kwota` decimal(10,2) NOT NULL,
  `status` char(1) DEFAULT 'N',
  `data_utworzenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowione_pozycje`
--

CREATE TABLE `zamowione_pozycje` (
  `pozycja_id` int(11) NOT NULL,
  `zamowienie_id` int(11) NOT NULL,
  `ilosc` decimal(10,2) NOT NULL,
  `cena_za_sztuke` decimal(10,2) NOT NULL,
  `smak_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `platnosci`
--
ALTER TABLE `platnosci`
  ADD PRIMARY KEY (`platnosc_id`),
  ADD UNIQUE KEY `uq_pl_zam` (`zamowienie_id`);

--
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rola_id`);

--
-- Indeksy dla tabeli `smaki`
--
ALTER TABLE `smaki`
  ADD PRIMARY KEY (`smak_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`uzytkownik_id`),
  ADD UNIQUE KEY `uq_login` (`login`);

--
-- Indeksy dla tabeli `uzytkownicy_role`
--
ALTER TABLE `uzytkownicy_role`
  ADD PRIMARY KEY (`uzytkownik_id`,`rola_id`),
  ADD KEY `fk_ur_role` (`rola_id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`zamowienie_id`),
  ADD KEY `idx_zam_uzytk` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `zamowione_pozycje`
--
ALTER TABLE `zamowione_pozycje`
  ADD PRIMARY KEY (`pozycja_id`),
  ADD KEY `idx_pz_zam` (`zamowienie_id`),
  ADD KEY `fk_pz_smak` (`smak_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `platnosci`
--
ALTER TABLE `platnosci`
  MODIFY `platnosc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `rola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smaki`
--
ALTER TABLE `smaki`
  MODIFY `smak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `uzytkownik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `zamowienie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zamowione_pozycje`
--
ALTER TABLE `zamowione_pozycje`
  MODIFY `pozycja_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `platnosci`
--
ALTER TABLE `platnosci`
  ADD CONSTRAINT `fk_pl_zam` FOREIGN KEY (`zamowienie_id`) REFERENCES `zamowienia` (`zamowienie_id`);

--
-- Constraints for table `uzytkownicy_role`
--
ALTER TABLE `uzytkownicy_role`
  ADD CONSTRAINT `fk_ur_role` FOREIGN KEY (`rola_id`) REFERENCES `role` (`rola_id`),
  ADD CONSTRAINT `fk_ur_uzytk` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownicy` (`uzytkownik_id`);

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `fk_zam_uzytk` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownicy` (`uzytkownik_id`);

--
-- Constraints for table `zamowione_pozycje`
--
ALTER TABLE `zamowione_pozycje`
  ADD CONSTRAINT `fk_pz_smak` FOREIGN KEY (`smak_id`) REFERENCES `smaki` (`smak_id`),
  ADD CONSTRAINT `fk_pz_zam` FOREIGN KEY (`zamowienie_id`) REFERENCES `zamowienia` (`zamowienie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
