-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Már 23. 16:26
-- Kiszolgáló verziója: 10.4.16-MariaDB
-- PHP verzió: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kaloria_kalkulator`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `elfogyasztott_etel`
--

CREATE TABLE `elfogyasztott_etel` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `elelmiszer_neve` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `feherje` int(11) NOT NULL,
  `szenhidrat` int(11) NOT NULL,
  `zsir` int(11) NOT NULL,
  `cukor` int(11) NOT NULL,
  `kaloria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `elfogyasztott_etel`
--

INSERT INTO `elfogyasztott_etel` (`id`, `user_id`, `datum`, `elelmiszer_neve`, `mennyiseg`, `feherje`, `szenhidrat`, `zsir`, `cukor`, `kaloria`) VALUES
(1, 13, '2021-03-22', '2', 100, 11, 22, 33, 44, 55),
(2, 13, '2021-03-22', '\n                            Ételek\n              ', 1000, 11, 22, 33, 44, 55),
(3, 13, '2021-03-22', 'sdasdasd2', 100, 11, 22, 33, 44, 55),
(4, 13, '2021-03-22', 'sdasdasd2', 1000, 0, 0, 0, 0, 0),
(5, 13, '2021-03-22', 'sdasdasd2', 100, 11, 22, 33, 44, 55),
(13, 13, '2021-03-23', 'Sajt', 123, 29, 1, 34, 1, 432),
(17, 13, '2021-03-23', 'Tojás', 100, 13, 1, 10, 0, 143),
(18, 13, '2021-03-23', 'Tej', 100, 3, 5, 3, 5, 56),
(20, 13, '2021-03-23', 'Tojás', 100, 13, 1, 10, 0, 143),
(22, 13, '2021-03-23', 'Tej', 100, 3, 5, 3, 5, 56),
(25, 13, '2021-03-23', 'Tojás', 100, 13, 1, 10, 0, 143),
(28, 13, '2021-03-22', 'Tojás', 10, 1, 0, 1, 0, 14),
(29, 13, '2021-03-22', 'Tojás', 10, 1, 0, 1, 0, 14),
(30, 13, '2021-03-22', 'Tojás', 10, 1, 0, 1, 0, 14),
(31, 13, '2021-03-20', 'Tej', 10, 0, 0, 0, 0, 5),
(33, 13, '2021-03-23', 'Tej', 321, 9, 16, 9, 16, 179),
(34, 13, '2021-03-23', 'Csirkemell', 200, 46, 0, 6, 0, 240);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `elozmeny`
--

CREATE TABLE `elozmeny` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `feherje` int(11) NOT NULL,
  `szenhidrat` int(11) NOT NULL,
  `zsir` int(11) NOT NULL,
  `cukor` int(11) NOT NULL,
  `kaloria` int(11) NOT NULL,
  `elegetett_kaloria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `elozmeny`
--

INSERT INTO `elozmeny` (`id`, `user_id`, `datum`, `feherje`, `szenhidrat`, `zsir`, `cukor`, `kaloria`, `elegetett_kaloria`) VALUES
(1, 13, '2021-03-23', 129, 30, 85, 27, 1392, 308),
(3, 13, '2021-03-22', 47, 88, 135, 176, 262, 0),
(4, 13, '2021-03-20', 0, 0, 0, 0, 5, 0),
(5, 13, '2021-03-21', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `elvegzett_mozgasforma`
--

CREATE TABLE `elvegzett_mozgasforma` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `mozgasforma_neve` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `sportolt_ido` int(11) NOT NULL,
  `elegetett_kaloria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `elvegzett_mozgasforma`
--

INSERT INTO `elvegzett_mozgasforma` (`id`, `user_id`, `datum`, `mozgasforma_neve`, `sportolt_ido`, `elegetett_kaloria`) VALUES
(7, 13, '2021-03-23', 'futás', 10, 50),
(8, 13, '2021-03-23', 'futás', 10, 50),
(10, 13, '2021-03-23', 'súlyzós edzés', 50, 208);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `etel`
--

CREATE TABLE `etel` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `elelmiszer_neve` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `feherje` int(11) NOT NULL,
  `szenhidrat` int(11) NOT NULL,
  `zsir` int(11) NOT NULL,
  `cukor` int(11) NOT NULL,
  `kaloria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `etel`
--

INSERT INTO `etel` (`id`, `user_id`, `elelmiszer_neve`, `feherje`, `szenhidrat`, `zsir`, `cukor`, `kaloria`) VALUES
(2, 13, 'Tojás', 13, 1, 10, 0, 143),
(3, 13, 'Tej', 3, 5, 3, 5, 56),
(5, 13, 'Sertés oldalas', 15, 0, 23, 0, 277),
(6, 13, 'Csirkemell', 23, 0, 3, 0, 120);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `id` int(11) NOT NULL,
  `teljes_nev` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `nem` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `eletkor` int(11) NOT NULL,
  `magassag` int(11) NOT NULL,
  `testsuly` int(11) NOT NULL,
  `alapanyagcsere` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`id`, `teljes_nev`, `email`, `jelszo`, `nem`, `eletkor`, `magassag`, `testsuly`, `alapanyagcsere`) VALUES
(13, 'Szőlősi Barbara', 'barbi@barbi.hu', 'e10adc3949ba59abbe56e057f20f883e', 'Nő', 20, 149, 60, 1270.25),
(14, 'csabi', 'csabi@csabi.hu', 'e10adc3949ba59abbe56e057f20f883e', 'Férfi', 24, 182, 134, 2196);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mozgasforma`
--

CREATE TABLE `mozgasforma` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mozgasforma_neve` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `elegetett_kaloria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `mozgasforma`
--

INSERT INTO `mozgasforma` (`id`, `user_id`, `mozgasforma_neve`, `elegetett_kaloria`) VALUES
(20, 13, 'súlyzós edzés', 250),
(22, 13, 'séta', 500);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `elfogyasztott_etel`
--
ALTER TABLE `elfogyasztott_etel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `elozmeny`
--
ALTER TABLE `elozmeny`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `elvegzett_mozgasforma`
--
ALTER TABLE `elvegzett_mozgasforma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `etel`
--
ALTER TABLE `etel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- A tábla indexei `mozgasforma`
--
ALTER TABLE `mozgasforma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `elfogyasztott_etel`
--
ALTER TABLE `elfogyasztott_etel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT a táblához `elozmeny`
--
ALTER TABLE `elozmeny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `elvegzett_mozgasforma`
--
ALTER TABLE `elvegzett_mozgasforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `etel`
--
ALTER TABLE `etel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `mozgasforma`
--
ALTER TABLE `mozgasforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `elfogyasztott_etel`
--
ALTER TABLE `elfogyasztott_etel`
  ADD CONSTRAINT `elfogyasztott_etel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalo` (`id`);

--
-- Megkötések a táblához `elozmeny`
--
ALTER TABLE `elozmeny`
  ADD CONSTRAINT `elozmeny_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalo` (`id`);

--
-- Megkötések a táblához `elvegzett_mozgasforma`
--
ALTER TABLE `elvegzett_mozgasforma`
  ADD CONSTRAINT `elvegzett_mozgasforma_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalo` (`id`);

--
-- Megkötések a táblához `etel`
--
ALTER TABLE `etel`
  ADD CONSTRAINT `etel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalo` (`id`);

--
-- Megkötések a táblához `mozgasforma`
--
ALTER TABLE `mozgasforma`
  ADD CONSTRAINT `mozgasforma_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
