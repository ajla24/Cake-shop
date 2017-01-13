-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 10:33 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt8`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`) VALUES
('admin', 'adminpass'),
('guest', ''),
('korisnik', 'korisnikpass'),
('maja11', 'majapass'),
('mujo13', 'mujopass');

-- --------------------------------------------------------

--
-- Table structure for table `kupci`
--

CREATE TABLE `kupci` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `adresa` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `kupci`
--

INSERT INTO `kupci` (`id`, `ime`, `prezime`, `adresa`, `email`) VALUES
(12, 'Neko', 'Nekic', 'Sarajevo', 'neko@hotmail.com'),
(13, 'Niko', 'Nikic', 'Polje', 'niko@hotmail.com'),
(15, 'Ajla', 'Sakic', 'osenik33', 'AJLA@HOTMAIL.COM'),
(40, 'Reuf', 'Refic', 'Zagrebacka bb', 'reuf@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id` int(11) NOT NULL,
  `datum` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `kolac` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `kolicina` int(11) NOT NULL,
  `napomena` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `kupac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`id`, `datum`, `kolac`, `kolicina`, `napomena`, `kupac`) VALUES
(17, '2017-01-11 16:51:52', 'kolac1', 5, 'dodati vise slaga', 12),
(18, '2017-01-11 16:59:05', 'kolac2', 6, 'nmapomena...', 15);

-- --------------------------------------------------------

--
-- Table structure for table `pocetna`
--

CREATE TABLE `pocetna` (
  `id` int(11) NOT NULL,
  `tip` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `text` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(200) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `pocetna`
--

INSERT INTO `pocetna` (`id`, `tip`, `text`, `autor`) VALUES
(1, 'novost', 'Probajte naš novi čokoladni okus! <b>Nutela-cake</b> je idealan za sve ljubitelje čokolade.\r\n		Ako ste i Vi među njima, obavezno nas posjetite!', 'admin'),
(2, 'obavjestenje', 'Obavještavamo naše drage i vjerne kupce, da će za vrijeme praznika 25.11. naše radno vrijeme biti\r\n		skraćeno <b>(08:00-12:00 sati)</b>.', 'admin'),
(3, 'ponudaMjeseca', 'Ne propustite Vaše omiljene torte po akcijskim cijenama, samo ovaj mjesec\r\n			naša najprodavanija <b>Monte torta snižena 30%!</b>', 'admin'),
(4, 'ponudaDana', 'Samo danas, uz kupovinu <b>bilo koja dva kolača, treći gratis!</b> \r\n			Uživajte u divnom danu uz kolač više!', 'autor');

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `ID` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `poruka` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`ID`, `ime`, `email`, `poruka`, `autor`) VALUES
(47, 'Ajla', 'ajlasakic@hotmail.com', 'Sadrzaj poruke', 'korisnik'),
(48, 'Ajla', 'ajlasakic@hotmail.com', 'sadrzaj poruke nesto', 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `restkorisnici`
--

CREATE TABLE `restkorisnici` (
  `ID` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `adresa` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `restkorisnici`
--

INSERT INTO `restkorisnici` (`ID`, `ime`, `prezime`, `adresa`) VALUES
(1, 'Ajla', 'Sakic', 'osenik'),
(2, 'Ajla', 'Bozalija', 'sarajevo'),
(3, 'Mustafa', 'Mustafic', 'sarajevo'),
(4, 'Hamo', 'Hamic', 'Polje');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `kupci`
--
ALTER TABLE `kupci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kupac` (`kupac`);

--
-- Indexes for table `pocetna`
--
ALTER TABLE `pocetna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `autor` (`autor`);

--
-- Indexes for table `restkorisnici`
--
ALTER TABLE `restkorisnici`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kupci`
--
ALTER TABLE `kupci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pocetna`
--
ALTER TABLE `pocetna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `restkorisnici`
--
ALTER TABLE `restkorisnici`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `narudzba_ibfk_1` FOREIGN KEY (`kupac`) REFERENCES `kupci` (`id`);

--
-- Constraints for table `poruke`
--
ALTER TABLE `poruke`
  ADD CONSTRAINT `poruke_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `korisnici` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
