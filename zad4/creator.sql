
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `class` varchar(30) NOT NULL,
  `strength` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `characters` (`id`, `nickname`, `class`, `strength`, `intelligence`, `agility`, `level`) VALUES
(1, 'Warrior123', 'Wojownik', 80, 45, 60, 35),
(2, 'MagicMike', 'Mag', 35, 90, 50, 42),
(3, 'ShadowHunter', 'Łucznik', 55, 65, 85, 38);

ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
