-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2021 a las 02:27:38
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba-nexura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(0, ''),
(1, 'Administracion'),
(2, 'Desarrollo'),
(3, 'Ventas'),
(4, 'Produccion'),
(5, 'Servicios generales'),
(6, 'Direccion'),
(7, 'Contabilidad'),
(8, 'Investigacion'),
(9, 'Mesa de ayuda'),
(10, 'Seguridad de la informacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `area_id` int(11) NOT NULL,
  `boletin` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) VALUES
(24, 'julian andres zapata', 'seederzapata@gmail.com', 'M', 2, 1, 'help desk                          \r\n                             '),
(25, 'diana ausenon                                            ', 'dausenon@gmail.com', 'F', 7, 1, '                            practicante                                                     \r\n                            '),
(26, 'julian cardona', 'jzapata@gmail.com', 'M', 4, 1, 'operario                        \r\n                             '),
(27, 'lina zapata                                            ', 'lina@gmail.com', 'F', 9, 1, '                            lider                                                                                                     \r\n                            '),
(28, 'fernanda zapata', 'fzapata@gmail.com', 'F', 3, 0, 'PSICOLOGA                 '),
(29, 'haide cano', 'hcano@gmail.com', 'M', 2, 1, 'ingeniero\r\n                             '),
(30, 'salome correa', 'salo@gmail.com', 'F', 1, 0, 'niña                   '),
(31, 'Pepito', 'pepito@gmail.com', 'M', 2, 0, 'Pepe             \r\n                             '),
(32, 'Julian Zapata Cardona                                            ', 'jzapata@adon.uniajc', 'M', 6, 1, 'Segundo Administrador                                    \r\n                            ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_rol`
--

CREATE TABLE `empleado_rol` (
  `empleado_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado_rol`
--

INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES
(24, 1),
(24, 2),
(26, 3),
(28, 3),
(29, 2),
(30, 3),
(31, 1),
(32, 5),
(32, 10),
(25, 3),
(27, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Desarrollador'),
(2, 'Analista de software'),
(3, 'Auxiliar administrativo'),
(4, 'Gerente'),
(5, 'Administrador'),
(6, 'Guarda de seguridad'),
(7, 'Auxiliar tecnico'),
(8, 'Asesor de ventas'),
(9, 'Operario'),
(10, 'Analista de base de datos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
