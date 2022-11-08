-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 08-11-2022 a las 02:37:40
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `assipark`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamento`
--

CREATE TABLE `apartamento` (
  `IdApartamento` int(11) NOT NULL,
  `IdNumeroApartamento` int(11) NOT NULL,
  `IdBloque` int(11) NOT NULL,
  `estadoApartamento` int(11) NOT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque`
--

CREATE TABLE `bloque` (
  `IdBloque` int(11) NOT NULL,
  `Bloque` char(30) NOT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `IdColor` int(11) NOT NULL,
  `Color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_asignaciones`
--

CREATE TABLE `detalle_asignaciones` (
  `IdApartamento` int(11) NOT NULL,
  `IdVehiculo` int(11) NOT NULL,
  `IdParqueadero` int(11) NOT NULL,
  `Inicio` datetime DEFAULT NULL,
  `Fin` datetime DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `IdEvento` int(11) NOT NULL,
  `title` varchar(99) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `final` datetime DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `IdMarca` int(11) NOT NULL,
  `Marca` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numero_apartamento`
--

CREATE TABLE `numero_apartamento` (
  `IdNumeroApartamento` int(11) NOT NULL,
  `NumeroApartamento` int(11) NOT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueadero`
--

CREATE TABLE `parqueadero` (
  `IdParqueadero` int(11) NOT NULL,
  `IdTipoParqueadero` int(11) NOT NULL,
  `tamaño` varchar(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estadoParqueadero` int(11) DEFAULT NULL,
  `ocupado` int(11) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueadero_visitas`
--

CREATE TABLE `parqueadero_visitas` (
  `IdParqueaderoVisitas` int(11) NOT NULL,
  `IdTipoParqueadero` int(11) NOT NULL,
  `tamaño` varchar(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estadoParqueadero` int(11) DEFAULT NULL,
  `Ocupado` int(11) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residente`
--

CREATE TABLE `residente` (
  `IdResidente` int(11) NOT NULL,
  `IdTipoIdentificacion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Sexo` enum('Masculino','Femenino') NOT NULL,
  `Telefono` varchar(13) DEFAULT NULL,
  `Celular1` varchar(13) DEFAULT NULL,
  `Celular2` varchar(13) DEFAULT NULL,
  `Email` varchar(99) DEFAULT NULL,
  `IdApartamento` int(11) NOT NULL,
  `EstadoResidente` int(11) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `IdTipoIdentificacion` int(11) NOT NULL,
  `Identificacion` varchar(20) NOT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`IdTipoIdentificacion`, `Identificacion`, `Created_at`, `Updated_at`) VALUES
(1, '1034657605', '2022-11-07 22:21:03', '2022-11-07 22:21:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_parqueadero`
--

CREATE TABLE `tipo_parqueadero` (
  `IdTipoParqueadero` int(11) NOT NULL,
  `TipoParqueadero` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `IdTipoUsuario` int(11) NOT NULL,
  `TipoUsuario` varchar(30) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`IdTipoUsuario`, `TipoUsuario`, `Created_at`, `Updated_at`) VALUES
(1, 'juan', '2022-11-07 22:21:03', '2022-11-07 22:21:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `IdTipoUsuario` int(11) NOT NULL,
  `IdTipoIdentificacion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Sexo` enum('Masculino','Femenino') DEFAULT NULL,
  `Direccion` varchar(90) NOT NULL,
  `Telefono` varchar(13) DEFAULT NULL,
  `celular1` varchar(13) DEFAULT NULL,
  `email` varchar(99) NOT NULL,
  `VerificacionEmail` datetime DEFAULT NULL,
  `contraseña` varchar(99) NOT NULL,
  `RecordarToken` varchar(99) DEFAULT NULL,
  `EstadoUsuario` int(11) NOT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `IdTipoUsuario`, `IdTipoIdentificacion`, `Nombre`, `Apellido`, `Sexo`, `Direccion`, `Telefono`, `celular1`, `email`, `VerificacionEmail`, `contraseña`, `RecordarToken`, `EstadoUsuario`, `Created_at`, `Updated_at`) VALUES
(1, 1, 1, 'juan_manuel', 'berdugo', 'Masculino', '767788776', '7899', '78990', 'fvgfu', '2022-11-07 17:21:03', '1234567', 'eretrt', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `IdVehiculo` int(11) NOT NULL,
  `IdResidente` int(11) NOT NULL,
  `IdMarca` int(11) NOT NULL,
  `IdColor` int(11) NOT NULL,
  `IdTipoParqueadero` int(11) NOT NULL,
  `Placa` varchar(10) DEFAULT NULL,
  `EstadoVehiculo` int(11) NOT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

CREATE TABLE `visitante` (
  `IdVisitante` int(11) NOT NULL,
  `IdTipoIdentificacion` int(11) NOT NULL,
  `numeroDocumento` varchar(13) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `celular1` varchar(13) DEFAULT NULL,
  `celular2` varchar(13) DEFAULT NULL,
  `estadoVisitante` int(11) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD PRIMARY KEY (`IdApartamento`),
  ADD KEY `IdBloque` (`IdBloque`),
  ADD KEY `IdNumeroApartamento` (`IdNumeroApartamento`);

--
-- Indices de la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD PRIMARY KEY (`IdBloque`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`IdColor`);

--
-- Indices de la tabla `detalle_asignaciones`
--
ALTER TABLE `detalle_asignaciones`
  ADD KEY `IdApartamento1` (`IdApartamento`),
  ADD KEY `IdVehiculo1` (`IdVehiculo`),
  ADD KEY `IdParqueadero` (`IdParqueadero`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`IdEvento`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`IdMarca`);

--
-- Indices de la tabla `numero_apartamento`
--
ALTER TABLE `numero_apartamento`
  ADD PRIMARY KEY (`IdNumeroApartamento`);

--
-- Indices de la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
  ADD PRIMARY KEY (`IdParqueadero`),
  ADD KEY `IdTipoParqueadero1` (`IdTipoParqueadero`);

--
-- Indices de la tabla `parqueadero_visitas`
--
ALTER TABLE `parqueadero_visitas`
  ADD PRIMARY KEY (`IdParqueaderoVisitas`),
  ADD KEY `IdTipoParqueadero` (`IdTipoParqueadero`);

--
-- Indices de la tabla `residente`
--
ALTER TABLE `residente`
  ADD PRIMARY KEY (`IdResidente`),
  ADD KEY `IdTipoIdentificacion1` (`IdTipoIdentificacion`),
  ADD KEY `IdApartamento2` (`IdApartamento`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`IdTipoIdentificacion`);

--
-- Indices de la tabla `tipo_parqueadero`
--
ALTER TABLE `tipo_parqueadero`
  ADD PRIMARY KEY (`IdTipoParqueadero`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`IdTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdTipoIdentificacion2` (`IdTipoIdentificacion`),
  ADD KEY `IdTipoUsuario` (`IdTipoUsuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`IdVehiculo`),
  ADD KEY `IdMarca` (`IdMarca`),
  ADD KEY `IdColor` (`IdColor`),
  ADD KEY `IdTipoParqueadero2` (`IdTipoParqueadero`);

--
-- Indices de la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`IdVisitante`),
  ADD KEY `IdTipoIdentificacion` (`IdTipoIdentificacion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD CONSTRAINT `IdBloque` FOREIGN KEY (`IdBloque`) REFERENCES `bloque` (`IdBloque`),
  ADD CONSTRAINT `IdNumeroApartamento` FOREIGN KEY (`IdNumeroApartamento`) REFERENCES `numero_apartamento` (`IdNumeroApartamento`);

--
-- Filtros para la tabla `detalle_asignaciones`
--
ALTER TABLE `detalle_asignaciones`
  ADD CONSTRAINT `IdApartamento1` FOREIGN KEY (`IdApartamento`) REFERENCES `apartamento` (`IdApartamento`),
  ADD CONSTRAINT `IdParqueadero` FOREIGN KEY (`IdParqueadero`) REFERENCES `parqueadero` (`IdParqueadero`),
  ADD CONSTRAINT `IdVehiculo1` FOREIGN KEY (`IdVehiculo`) REFERENCES `vehiculo` (`IdVehiculo`);

--
-- Filtros para la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
  ADD CONSTRAINT `IdTipoParqueadero1` FOREIGN KEY (`IdTipoParqueadero`) REFERENCES `tipo_parqueadero` (`IdTipoParqueadero`);

--
-- Filtros para la tabla `parqueadero_visitas`
--
ALTER TABLE `parqueadero_visitas`
  ADD CONSTRAINT `IdTipoParqueadero` FOREIGN KEY (`IdTipoParqueadero`) REFERENCES `tipo_parqueadero` (`IdTipoParqueadero`);

--
-- Filtros para la tabla `residente`
--
ALTER TABLE `residente`
  ADD CONSTRAINT `IdApartamento2` FOREIGN KEY (`IdApartamento`) REFERENCES `apartamento` (`IdApartamento`),
  ADD CONSTRAINT `IdTipoIdentificacion1` FOREIGN KEY (`IdTipoIdentificacion`) REFERENCES `tipo_identificacion` (`IdTipoIdentificacion`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `IdTipoIdentificacion2` FOREIGN KEY (`IdTipoIdentificacion`) REFERENCES `tipo_identificacion` (`IdTipoIdentificacion`),
  ADD CONSTRAINT `IdTipoUsuario` FOREIGN KEY (`IdTipoUsuario`) REFERENCES `tipo_usuario` (`IdTipoUsuario`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `IdColor` FOREIGN KEY (`IdColor`) REFERENCES `color` (`IdColor`),
  ADD CONSTRAINT `IdMarca` FOREIGN KEY (`IdMarca`) REFERENCES `marca` (`IdMarca`),
  ADD CONSTRAINT `IdTipoParqueadero2` FOREIGN KEY (`IdTipoParqueadero`) REFERENCES `tipo_parqueadero` (`IdTipoParqueadero`);

--
-- Filtros para la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD CONSTRAINT `IdTipoIdentificacion` FOREIGN KEY (`IdTipoIdentificacion`) REFERENCES `tipo_identificacion` (`IdTipoIdentificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
