-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 27 mrt 2025 om 12:01
-- Serverversie: 10.4.34-MariaDB-1:10.4.34+maria~ubu2004
-- PHP-versie: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holiday`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `holiday_db`
--

CREATE TABLE `holiday_db` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `land` varchar(100) NOT NULL,
  `continent` varchar(100) NOT NULL,
  `vakantietype` varchar(100) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(6,2) NOT NULL,
  `thumbnail_url` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `holiday_db`
--

INSERT INTO `holiday_db` (`id`, `name`, `land`, `continent`, `vakantietype`, `beschrijving`, `prijs`, `thumbnail_url`) VALUES
(1, 'Pura Tanah Lot', 'Indonesië', 'Azië', 'Strand', 'Iconische tempel op een rots in zee, perfect voor zonsondergangen en cultuur.', 1200.00, 'https://mybestplace.com/en/article/pura-tanah-lot-a-temple-dedicated-to-the-divinity-of-the-sea'),
(2, 'Tokyo Tower', 'Japan', 'Azië', 'Stad', 'Futuristische metropool met hypermoderne technologie en traditionele tempels.', 1800.00, 'https://example.com/tokyo.jpg'),
(3, 'Eiffeltoren', 'Frankrijk', 'Europa', 'Cultuur', 'Het symbool van Parijs, met adembenemende uitzichten over de stad.', 950.00, 'https://example.com/eiffel.jpg'),
(4, 'Santorini', 'Griekenland', 'Europa', 'Strand', 'Witte huisjes met blauwe daken tegen een achtergrond van azuurblauwe zee.', 1600.00, 'https://example.com/santorini.jpg'),
(5, 'Tafelberg', 'Zuid-Afrika', 'Afrika', 'Cultuur', 'Iconische berg in Kaapstad met een panoramisch uitzicht over de stad.', 1400.00, 'https://example.com/tafelberg.jpg'),
(6, 'Maasai Mara', 'Kenia', 'Afrika', 'Cultuur', 'Wildlifereservaat bekend om de Grote Migratie van gnoes en zebra’s.', 2000.00, 'https://example.com/maasai.jpg'),
(7, 'Times Square', 'Verenigde Staten', 'Noord-Amerika', 'Stad', 'Het bruisende hart van New York City met neonreclames en Broadway.', 1700.00, 'https://example.com/timessquare.jpg'),
(8, 'Cancun', 'Mexico', 'Noord-Amerika', 'Strand', 'Witte stranden en turquoise water, perfect voor duiken en ontspanning.', 1350.00, 'https://example.com/cancun.jpg'),
(9, 'Christus de Verlosser', 'Brazilië', 'Zuid-Amerika', 'Cultuur', 'Kolossaal standbeeld in Rio de Janeiro met uitzicht over de stad.', 1100.00, 'https://example.com/christstatue.jpg'),
(10, 'Machu Picchu', 'Peru', 'Zuid-Amerika', 'Cultuur', 'Verloren Inca-stad in de Andes, omringd door mistige bergtoppen.', 1900.00, 'https://example.com/machupicchu.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `holiday_db`
--
ALTER TABLE `holiday_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `holiday_db`
--
ALTER TABLE `holiday_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
