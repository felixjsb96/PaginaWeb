-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2016 a las 05:01:47
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` char(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` char(8) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `apellido`, `dni`, `sexo`, `fecha_nac`) VALUES
('00001', 'Mario', 'Merino', '34252677', 'Masculino', '1998-12-29'),
('00002', 'Manuel', 'Chiroque', '57213942', 'Femenino', '1997-12-12'),
('00003', 'Jose', 'Cruz', '57876942', 'Masculino', '1997-01-12'),
('00004', 'Lionel', 'Romero', '51236942', 'Masculino', '1997-04-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` char(5) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre`, `descripcion`) VALUES
('00001', 'Matematica', 'Numeros'),
('00002', 'Comunicacion', 'Letras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_grado`
--

CREATE TABLE `detalle_grado` (
  `id_curso` char(5) NOT NULL,
  `id_grado` char(5) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_grado`
--

INSERT INTO `detalle_grado` (`id_curso`, `id_grado`, `descripcion`) VALUES
('00001', '00001', 'Primer Grado'),
('00001', '00002', 'Segundo Grado'),
('00001', '00003', 'Tercer Grado'),
('00001', '00004', 'Cuarto Grado'),
('00001', '00005', 'Quinto Grado'),
('00001', '00006', 'Sexto Grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` char(5) NOT NULL,
  `Nombres` varchar(20) DEFAULT NULL,
  `Apellidos` varchar(20) DEFAULT NULL,
  `DNI` char(8) DEFAULT NULL,
  `Sexo` varchar(20) DEFAULT NULL,
  `Fecha_nacim` date DEFAULT NULL,
  `id_tipo` char(5) NOT NULL,
  `id_curso` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `Nombres`, `Apellidos`, `DNI`, `Sexo`, `Fecha_nacim`, `id_tipo`, `id_curso`) VALUES
('00001', 'Hilary', 'Manrique', '94823432', 'Femenino', '1989-02-02', '00001', NULL),
('00002', 'Carlos', 'Dominguez', '24823332', 'Masculino', '1990-02-02', '00002', '00001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_matricula`
--

CREATE TABLE `ficha_matricula` (
  `numero` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_grado` char(5) NOT NULL,
  `id_alumno` char(5) NOT NULL,
  `id_empleado` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ficha_matricula`
--

INSERT INTO `ficha_matricula` (`numero`, `fecha`, `id_grado`, `id_alumno`, `id_empleado`) VALUES
(2, '2016-11-25', '00001', '00001', '00001'),
(3, '2016-11-26', '00002', '00001', '00001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` char(5) NOT NULL,
  `turno` varchar(6) NOT NULL,
  `seccion` char(1) NOT NULL,
  `aula` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `turno`, `seccion`, `aula`) VALUES
('00001', 'Mañana', 'A', '100'),
('00002', 'Mañana', 'A', '101'),
('00003', 'Mañana', 'A', '102'),
('00004', 'Mañana', 'A', '103'),
('00005', 'Mañana', 'A', '104'),
('00006', 'Mañana', 'A', '105');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id_tipo` char(5) NOT NULL,
  `Descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`id_tipo`, `Descripcion`) VALUES
('00001', 'Secretaria'),
('00002', 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `codigo` char(5) NOT NULL DEFAULT '',
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`codigo`, `username`, `password`) VALUES
('00001', 'root', 'root');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `detalle_grado`
--
ALTER TABLE `detalle_grado`
  ADD PRIMARY KEY (`id_grado`,`id_curso`),
  ADD KEY `fk_id_curso_detalle` (`id_curso`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `R_8` (`id_tipo`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_curso_2` (`id_curso`);

--
-- Indices de la tabla `ficha_matricula`
--
ALTER TABLE `ficha_matricula`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `fk_matricula_grado` (`id_grado`),
  ADD KEY `fk_matricula_alumno` (`id_alumno`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ficha_matricula`
--
ALTER TABLE `ficha_matricula`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_grado`
--
ALTER TABLE `detalle_grado`
  ADD CONSTRAINT `fk_id_curso_detalle` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `fk_id_grado_detalle` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `fk_tipo_empleado` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_empleado` (`id_tipo`);

--
-- Filtros para la tabla `ficha_matricula`
--
ALTER TABLE `ficha_matricula`
  ADD CONSTRAINT `fk_matricula_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`),
  ADD CONSTRAINT `fk_matricula_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `fk_matricula_grado` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
