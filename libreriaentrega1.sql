-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2024 a las 22:32:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreriaentrega1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Premiaciones` int(11) NOT NULL,
  `GeneroDestacado` varchar(150) NOT NULL,
  `FechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `Nombre`, `Premiaciones`, `GeneroDestacado`, `FechaNacimiento`) VALUES
(1, 'George Orwell', 3, 'Terror', '1965-05-12'),
(2, 'Richard Blair', 1, 'Romance', '1998-09-11'),
(3, 'Aldous Huxley', 6, 'Ciencia Ficcion', '1925-08-22'),
(4, 'J. K. Rowling', 2, 'Comedia', '1967-10-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `Titulo` varchar(150) NOT NULL,
  `Autor` int(11) NOT NULL,
  `CantidadPaginas` int(11) NOT NULL,
  `Genero` varchar(150) NOT NULL,
  `Editorial` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `Titulo`, `Autor`, `CantidadPaginas`, `Genero`, `Editorial`) VALUES
(2, 'Harry Potter y las reliquias de la muerte', 4, 390, 'Ciencia Ficcion', 'Roble Oscuro CO.'),
(3, 'Rebelion en la Granja', 1, 300, 'Terror', 'Madero Company'),
(4, 'El Señor de las Moscas', 2, 175, 'Romance', 'Aguas Tibias SS'),
(5, 'Un Mundo Feliz', 3, 233, 'Romance', 'Aguas Tibias SS'),
(6, 'Los dias de Birmania', 1, 912, 'Ciencia Ficcion', 'Madero Company'),
(22, 'Harry Potter y la piedra filosofal', 4, 478, 'Aventuras', 'Roble Oscuro C.O.'),
(23, 'Harry Potter y la cámara secreta', 4, 320, 'Ciencia Ficcion', 'Roble Oscuro CO.'),
(24, 'Harry Potter y el cáliz de fuego', 4, 220, 'Aventuras', 'Roble Oscuro CO.'),
(25, 'Las Puertas de la Percepción', 3, 129, 'Terror', 'Aguas Tibias SS'),
(26, 'La isla', 3, 215, 'Suspenso', 'Madero Company'),
(27, '1984 ', 1, 462, 'Terror', 'Aguas Tibias SS'),
(28, 'Animales Fantásticos y Dónde Encontrarlos', 4, 289, 'Ciencia Ficcion', 'Roble Oscuro CO.'),
(29, 'El Camino a Wigan Pier', 1, 462, 'Suspenso', 'Madero Company');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `contrasena` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasena`) VALUES
(1, 'webadmin', '$2y$10$n1MveO0TItRCQBHbOg5hpurrdzQlzKpeZB9An//uq4BuUNZy4h3D6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Autor` (`Autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`Autor`) REFERENCES `autores` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
