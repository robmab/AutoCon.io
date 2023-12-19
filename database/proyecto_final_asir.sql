-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2023 a las 12:03:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final_asir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `tipo` varchar(50) NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `ruta` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `descuento` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `nombre`, `tipo`, `cantidad`, `ruta`, `precio`, `descuento`) VALUES
(1, 'Cilindro de freno de rueda', 'Serie 3', 43, '2.jpg', '34.00', 20),
(2, 'Zapatas de freno', 'Serie 3', 176, '11.jpg', '23.00', 0),
(3, 'Latiguillos de freno', 'Z8', 0, '7.jpg', '32.00', 0),
(4, 'Discos de freno', 'Serie 1', 33, '5.png', '34.00', 0),
(5, 'Batería', 'i3', 117, '1.jpg', '12.00', 12),
(8, 'Pastillas de freno', 'X7', 5, '8.jpg', '10.00', 45),
(9, 'Sensor de abs', 'Serie 2', 75, '9.jpg', '130.00', 0),
(10, 'Tambor de freno', '02', 27, '10.jpg', '78.00', 0),
(11, 'Cilindro receptor de embrague', '2500', 62, '4.jpg', '34.00', 0),
(14, 'Cilindro maestro de embrague', '2000', 431, '3.jpg', '56.00', 0),
(15, 'Cilindro de freno de rueda', 'Serie 5', 2, '2.jpg', '32.00', 0),
(16, 'Pastillas de freno', 'Serie B', 1, '8.jpg', '9.00', 0),
(17, 'Pastillas de freno', 'Z8', 0, '8.jpg', '17.00', 0),
(18, 'Zapatas de freno', 'Serie 5', 8, '11.jpg', '45.00', 0),
(19, 'Discos de freno', 'X4', 64, '5.png', '23.00', 0),
(20, 'Discos de freno', '1500-2000', 22, '5.png', '12.00', 0),
(21, 'Tambor de freno', '1600', 262, '10.jpg', '60.00', 0),
(22, 'Latiguillos de freno', 'X4', 0, '7.jpg', '14.00', 0),
(23, 'Sensor de abs', 'X6', 92, '9.jpg', '150.00', 0),
(24, 'Sensor de abs', 'Z1', 2, '9.jpg', '210.00', 0),
(25, 'Cilindro maestro de embrague', '1500-2000', 3, '3.jpg', '58.00', 0),
(26, 'Batería', 'Z3', 343, '1.jpg', '14.00', 0),
(29, 'Kit de embrague', 'Serie 3', 56, '6.jpg', '89.00', 0),
(30, 'Kit de embrague', 'Serie 5', 249, '6.jpg', '110.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_usuario`
--

CREATE TABLE `componente_usuario` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL DEFAULT 0,
  `n` bigint(20) NOT NULL DEFAULT 0,
  `fecha` date NOT NULL DEFAULT curdate(),
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `componente` int(11) NOT NULL DEFAULT 0,
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `finalizado` enum('Si','No') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `componente_usuario`
--

INSERT INTO `componente_usuario` (`id`, `usuario`, `n`, `fecha`, `cantidad`, `componente`, `precio`, `finalizado`) VALUES
(114, 33, 1317937388, '2023-11-22', 2, 3, '64.00', 'No'),
(115, 33, 4284421456, '2023-12-06', 1, 18, '45.00', 'No'),
(116, 33, 9787779217, '2023-12-06', 1, 14, '56.00', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_descuentos`
--

CREATE TABLE `eventos_descuentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_in` date NOT NULL,
  `banner` varchar(200) NOT NULL,
  `porciento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `eventos_descuentos`
--

INSERT INTO `eventos_descuentos` (`id`, `nombre`, `fecha_in`, `banner`, `porciento`, `fecha_fin`) VALUES
(1, 'Evento de Verano', '2019-06-24', '', '40.00', '2019-06-26'),
(2, 'Evento de Invierno', '2019-12-06', '¡Aprovéchate de nuestras ofertas de competición!', '60.00', '2019-12-09'),
(3, 'Evento de competición BMW', '2019-12-02', ' ', '20.00', '2019-12-02'),
(4, 'Promoción con Hyundai', '2020-09-27', '', '25.00', '2020-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `disponibilidad` enum('Si','No') NOT NULL,
  `numero` int(9) NOT NULL DEFAULT 0,
  `logo` varchar(50) NOT NULL DEFAULT '0',
  `correo` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `disponibilidad`, `numero`, `logo`, `correo`) VALUES
(3, 'A.B.S', 'Si', 613254879, 'abs.jpg', 'gatteredohe-6135@yopmail.com'),
(9, 'Stark', 'Si', 935826437, 'stark.png', 'izuzunyro-4802@yopmail.com'),
(10, 'TRW', 'No', 659487543, 'trw.jpg', 'iffofopu-9136@yopmail.com'),
(12, 'Topran', 'No', 946532615, 'top.jpg', 'tepporenaru-8900@yopmail.com'),
(13, 'Swag', 'Si', 645132648, 'swag.jpg', 'giqejuffogo-3926@yopmail.com'),
(15, 'Van Wezel', 'No', 659461325, 'van.png', 'immomalab-6043@yopmail.com'),
(17, 'Sachs', 'Si', 923164312, 'sach.jpg', 'iddowemina-7417@yopmail.com'),
(19, 'NGK', 'Si', 987598798, 'ngk.png', 'hossassettef-8085@yopmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion`
--

CREATE TABLE `reparacion` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL DEFAULT 0,
  `servicio` varchar(50) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT curdate(),
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `aceptado` enum('Si','Espera','Finalizado') NOT NULL,
  `n` bigint(22) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reparacion`
--

INSERT INTO `reparacion` (`id`, `usuario`, `servicio`, `fecha`, `precio`, `aceptado`, `n`) VALUES
(72, 33, 'sustituir', '2019-12-04', '120.00', 'Finalizado', 2545058844),
(73, 33, 'neumatico', '2019-12-05', '150.00', 'Finalizado', 6277012250),
(75, 33, 'aceite', '2019-12-05', '100.00', 'Finalizado', 588305242),
(82, 33, 'neumatico', '2019-12-05', '451.00', 'Finalizado', 2808351169),
(89, 33, 'sustituir', '2019-12-06', '12.00', 'Finalizado', 6766016430),
(91, 33, 'bateria', '2019-12-06', '10.00', 'Finalizado', 1622085197),
(110, 33, 'carroceria', '2019-12-10', '20.00', 'Finalizado', 5992131527),
(117, 33, 'limpieza', '2023-11-22', '56.00', 'Finalizado', 6736074511),
(120, 33, 'pintura', '2023-11-22', '0.00', 'Espera', 6951252016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL DEFAULT '',
  `nif` varchar(50) NOT NULL DEFAULT '',
  `domicilio` varchar(50) NOT NULL DEFAULT '',
  `fechaNacimiento` date NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `rol` enum('Admin','Usuario') NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `codigoPostal` varchar(50) NOT NULL DEFAULT '0',
  `nombreUsuario` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `población` varchar(50) NOT NULL,
  `numeroMovil` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `nif`, `domicilio`, `fechaNacimiento`, `contraseña`, `rol`, `apellidos`, `codigoPostal`, `nombreUsuario`, `correo`, `provincia`, `población`, `numeroMovil`) VALUES
(33, 'Roberto', '47097702G', 'C/Antonio Gotor Nº1', '2000-02-10', 'dW5pbWFkZSsw', 'Admin', 'Maiquez Barahona', '02002', 'Rob', 'Rob@outlook.es', 'Albacete', 'Albacete', 659974555),
(36, 'Ignacio', '25227112E', 'C/Maria Dolores S3 Nº89', '1978-02-01', 'MTIzNA==', 'Usuario', 'Elmer Balado', '5468', 'Nacho', 'Sadfasdf@dfasdf', 'Barcelona', 'Barcelona', 643124658),
(37, 'Carlos', '67193230H', 'C/San Pablo Nº2', '1994-12-06', 'MTIzNA==', 'Usuario', 'Aceituno', '34234', 'Carlos', 'Asdfsdfsd@adf', 'Alicante', 'Alicante', 643521649),
(39, 'Joaquin', '39703019M', 'C/Cordoba Nº56 7ºd', '1985-12-12', 'dW5pbWFkZSsw', 'Usuario', 'Andeka Rocha', '2923', 'Juak', 'Juan@dfdasf', 'Madrid', 'Torrejon', 659974555),
(44, 'Ben', '23546534P', 'Asadfasdfsdfs', '1994-12-20', 'MTIzNA==', 'Usuario', 'Oliver', '12015', 'Benito', 'Ben@hot.com', 'Albacete', 'Sdfasdf', 659874598);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_facturacion`
--

CREATE TABLE `usuarios_facturacion` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL DEFAULT 0,
  `numero` varchar(16) NOT NULL DEFAULT '0',
  `tipo` enum('Visa','Mastercard') NOT NULL,
  `titular` varchar(50) NOT NULL DEFAULT '',
  `ccv` int(3) NOT NULL,
  `fechaM` varchar(2) NOT NULL DEFAULT '0',
  `fechaA` varchar(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_facturacion`
--

INSERT INTO `usuarios_facturacion` (`id`, `usuario`, `numero`, `tipo`, `titular`, `ccv`, `fechaM`, `fechaA`) VALUES
(67, 33, '4970100000000055', 'Visa', 'Roberto Maiquez', 304, '02', '95');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `vendidos` int(11) NOT NULL DEFAULT 0,
  `disponibles` int(11) NOT NULL DEFAULT 0,
  `rebaja` int(3) NOT NULL DEFAULT 0,
  `img` varchar(20) NOT NULL,
  `alquilados` int(11) NOT NULL DEFAULT 0,
  `ruta` varchar(20) NOT NULL DEFAULT '0',
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `precioAlquiler` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `modelo`, `vendidos`, `disponibles`, `rebaja`, `img`, `alquilados`, `ruta`, `precio`, `precioAlquiler`) VALUES
(2, 'BMW Serie 1 cinco puertas', 2, 3, 30, '/1.jpg', 1, 'Serie1', '28800.00', '80.00'),
(5, 'BMW Serie 2 Cabrio', 0, 0, 14, '/3.jpg', 5, 'Serie2C', '61550.00', '120.00'),
(7, 'BMW Serie 2 Gran Tourer', 4, 1, 0, '/4.jpg', 2, 'Serie2GT', '49250.00', '100.00'),
(8, 'BMW Serie 2 Active Tourer Híbrido Enchufable', 0, 2, 0, '/2.jpg', 2, 'Serie2', '29200.00', '80.00'),
(9, 'Nuevo BMW Serie 5 Berlina', 0, 1, 20, '/9.jpg', 1, 'Serie3', '63000.00', '120.00'),
(12, 'BMW Serie 6 Gran Turismo', 0, 2, 50, '/5.jpg', 2, 'Serie6GT', '42800.00', '140.00'),
(14, 'BMW X4', 1, 3, 0, '/7.jpg', 0, 'X4', '54600.00', '120.00'),
(16, 'Nuevo BMW Z4', 1, 3, 0, '/10.jpg', 1, 'Z4', '70100.00', '120.00'),
(17, 'Nuevo BMW i8 Coupé', 0, 2, 0, '/8.jpg', 0, 'I8', '61550.00', '120.00'),
(18, 'BMW Serie 7 Híbrido Enchufable', 0, 1, 0, '/6.jpg', 0, 'Serie7H', '112900.00', '200.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_usuarios`
--

CREATE TABLE `vehiculos_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL DEFAULT 0,
  `vehiculo` int(11) NOT NULL DEFAULT 0,
  `alquilado` enum('Si','No') NOT NULL DEFAULT 'No',
  `fecha` date NOT NULL DEFAULT curdate(),
  `n` bigint(20) NOT NULL DEFAULT 0,
  `reservado` enum('Si','No','Comprado') NOT NULL DEFAULT 'No',
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculos_usuarios`
--

INSERT INTO `vehiculos_usuarios` (`id`, `usuario`, `vehiculo`, `alquilado`, `fecha`, `n`, `reservado`, `precio`) VALUES
(48, 33, 9, 'No', '2019-12-03', 2072370780, 'Comprado', '50400.00'),
(71, 33, 7, 'No', '2019-12-07', 9093347831, 'Comprado', '49250.00'),
(72, 33, 7, 'No', '2019-12-07', 8447348921, 'Comprado', '49250.00'),
(73, 33, 2, 'No', '2019-12-07', 7591700932, 'Comprado', '20160.00'),
(74, 33, 7, 'No', '2019-12-07', 3979478613, 'Comprado', '49250.00'),
(81, 33, 14, 'No', '2019-12-09', 1619760641, 'Comprado', '54600.00'),
(92, 33, 2, 'No', '2019-12-10', 1681496857, 'Comprado', '8064.00'),
(96, 33, 2, 'No', '2023-11-14', 9931975744, 'Si', '20160.00'),
(97, 33, 17, 'No', '2023-11-20', 3954520278, 'Si', '61550.00'),
(98, 33, 8, 'No', '2023-11-20', 5689746583, 'Si', '29200.00'),
(99, 33, 5, 'Si', '2023-11-20', 1383807592, 'No', '120.00'),
(100, 33, 16, 'Si', '2023-12-07', 5129671828, 'No', '120.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_tipo` (`nombre`,`tipo`);

--
-- Indices de la tabla `componente_usuario`
--
ALTER TABLE `componente_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `n` (`n`),
  ADD KEY `FK_componente_usuario_componentes` (`componente`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `eventos_descuentos`
--
ALTER TABLE `eventos_descuentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fecha_in_fecha_fin` (`fecha_in`,`fecha_fin`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nombre` (`nombre`);

--
-- Indices de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `n` (`n`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nif` (`nif`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `usuarios_facturacion`
--
ALTER TABLE `usuarios_facturacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modelo` (`modelo`);

--
-- Indices de la tabla `vehiculos_usuarios`
--
ALTER TABLE `vehiculos_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `n` (`n`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `vehiculo` (`vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `componente_usuario`
--
ALTER TABLE `componente_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `eventos_descuentos`
--
ALTER TABLE `eventos_descuentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios_facturacion`
--
ALTER TABLE `usuarios_facturacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `vehiculos_usuarios`
--
ALTER TABLE `vehiculos_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `componente_usuario`
--
ALTER TABLE `componente_usuario`
  ADD CONSTRAINT `FK_componente_usuario_componentes` FOREIGN KEY (`componente`) REFERENCES `componentes` (`id`),
  ADD CONSTRAINT `FK_componente_usuario_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `reparacion`
--
ALTER TABLE `reparacion`
  ADD CONSTRAINT `FK_reparacion_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios_facturacion`
--
ALTER TABLE `usuarios_facturacion`
  ADD CONSTRAINT `FK_usuarios_facturacion_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `vehiculos_usuarios`
--
ALTER TABLE `vehiculos_usuarios`
  ADD CONSTRAINT `FK_vehiculos_usuarios_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `FK_vehiculos_usuarios_vehiculos` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
