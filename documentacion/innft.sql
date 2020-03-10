-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-03-2020 a las 12:16:13
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `innft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_area`
--

CREATE TABLE `tab_area` (
  `ident_area` int(11) NOT NULL,
  `nombr_area` varchar(45) DEFAULT NULL,
  `statu_area` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cate`
--

CREATE TABLE `tab_cate` (
  `ident_cate` int(11) NOT NULL,
  `nombr_cate` varchar(45) DEFAULT NULL,
  `statu_cate` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_proy`
--

CREATE TABLE `tab_proy` (
  `ident_proy` int(11) NOT NULL,
  `nombr_proy` varchar(150) DEFAULT NULL,
  `descr_proy` longtext,
  `fecre_proy` datetime DEFAULT NULL,
  `ident_cate` int(11) NOT NULL,
  `ident_area` int(11) NOT NULL,
  `ident_usua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_tipo`
--

CREATE TABLE `tab_tipo` (
  `ident_tipo` int(11) NOT NULL,
  `nombr_tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_tipo`
--

INSERT INTO `tab_tipo` (`ident_tipo`, `nombr_tipo`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'FUNCIONARIO'),
(3, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_usua`
--

CREATE TABLE `tab_usua` (
  `ident_usua` int(11) NOT NULL,
  `tipce_usua` varchar(1) NOT NULL,
  `cedul_usua` int(10) DEFAULT NULL,
  `nombr_usua` varchar(45) DEFAULT NULL,
  `apeli_usua` varchar(45) DEFAULT NULL,
  `gener_usua` varchar(45) DEFAULT NULL,
  `civil_usua` varchar(45) DEFAULT NULL,
  `nivel_usua` varchar(45) DEFAULT NULL,
  `telef_usua` varchar(45) DEFAULT NULL,
  `email_usua` varchar(100) DEFAULT NULL,
  `image_usua` varchar(250) NOT NULL,
  `estad_usua` varchar(45) DEFAULT NULL,
  `munic_usua` varchar(45) DEFAULT NULL,
  `direc_usua` varchar(150) DEFAULT NULL,
  `usuar_usua` varchar(45) DEFAULT NULL,
  `contr_usua` varchar(45) DEFAULT NULL,
  `fecre_usua` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statu_usua` char(1) NOT NULL,
  `ident_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_usua`
--

INSERT INTO `tab_usua` (`ident_usua`, `tipce_usua`, `cedul_usua`, `nombr_usua`, `apeli_usua`, `gener_usua`, `civil_usua`, `nivel_usua`, `telef_usua`, `email_usua`, `image_usua`, `estad_usua`, `munic_usua`, `direc_usua`, `usuar_usua`, `contr_usua`, `fecre_usua`, `statu_usua`, `ident_tipo`) VALUES
(1, 'V', 26607655, 'CARLOS AGUSTIN', 'GUANIPA ALVAREZ', 'MASCULINO', 'SOLTERO', 'BACHILLERATO', '(0426) 690 8396', 'AGUSTINGUANIPA98@GMAIL.COM', '../../imagen/perfil/FOTO TIPO CARNET (optimizado).jpg', 'TACHIRA', 'SAN CRISTOBAL', 'CALLE 2 PUEBLO NUEVO', 'AGUSTIN', '827ccb0eea8a706c4c34a16891f84e7b', '2020-03-06 04:00:00', '1', 1),
(2, 'V', 7491156, 'CARLOS LUIS', 'GUANIPA BUENO', 'MASCULINO', 'SOLTERO', 'UNIVERSITARIO', '(0414) 707 8002', 'GUANIPABUENO@GMAIL.COM', '../../imagen/perfil/Agustin 1 x 1.jpeg', 'TACHIRA', 'SAN CRISTOBAL', 'CALLE 2 PUEBLO NUEVO RESIDENCIAS MILDREY PISO 7 APTO 74', 'GUANIPA', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '1', 3),
(3, 'V', 5028153, 'ALBA ALIDA', 'ALVAREZ SANCHEZ', 'FEMENINO', 'CASADO', 'UNIVERSITARIO', '(0426) 822 6711', 'ALBALIDA2006@HOTMAIL.COM', '../../imagen/perfil/user.png', 'TACHIRA', 'SAN CRISTOBAL', 'CALLE 2 PUEBLO NUEVO', 'ALBA', '827ccb0eea8a706c4c34a16891f84e7b', '2020-03-07 14:48:33', '1', 3),
(4, 'V', 13587648, 'JEAN CARLO', 'ALVAREZ SANCHEZ', 'MASCULINO', 'SOLTERO', 'UNIVERSITARIO', '(0416) 777 0773', 'AGROJEAN1978@GMAIL.COM', '../../imagen/perfil/IMG_0643.JPG', 'TACHIRA', 'SAN CRISTOBAL', 'BARRIO PEDRO ROA GONZALEZ', 'AGROJEAN', '827ccb0eea8a706c4c34a16891f84e7b', '2020-03-07 15:33:56', '1', 3),
(5, 'V', 9247232, 'ALEXIS ENRIQUE', 'ALVAREZ SANCHEZ', 'MASCULINO', 'CASADO', 'TÉCNICO MEDIO', '(0414) 175 3065', 'ALEXISALVAREZ35@HOTMAIL.COM', '../../imagen/perfil/user.png', 'TACHIRA', 'SAN CRISTOBAL', 'URBANIZACION LA CASTELLANA', 'ALEXIS', '827ccb0eea8a706c4c34a16891f84e7b', '2020-03-07 16:33:32', '1', 2),
(6, 'V', 4209679, 'PEDRO ROGELIO', 'ALVAREZ SANCHEZ', 'MASCULINO', 'SOLTERO', 'BACHILLERATO', '(0424) 271 1759', 'PEDRO@MAIL', '../../imagen/perfil/user.png', 'TACHIRA', 'SAN CRISTOBAL', 'LA POPITA TORRE DIESCO', 'PEDRO', '827ccb0eea8a706c4c34a16891f84e7b', '2020-03-07 16:36:00', '1', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tab_area`
--
ALTER TABLE `tab_area`
  ADD PRIMARY KEY (`ident_area`);

--
-- Indices de la tabla `tab_cate`
--
ALTER TABLE `tab_cate`
  ADD PRIMARY KEY (`ident_cate`);

--
-- Indices de la tabla `tab_proy`
--
ALTER TABLE `tab_proy`
  ADD PRIMARY KEY (`ident_proy`),
  ADD KEY `fk_tab_proy_tab_cate_idx` (`ident_cate`),
  ADD KEY `fk_tab_proy_tab_area1_idx` (`ident_area`),
  ADD KEY `fk_tab_proy_tab_usua1_idx` (`ident_usua`);

--
-- Indices de la tabla `tab_tipo`
--
ALTER TABLE `tab_tipo`
  ADD PRIMARY KEY (`ident_tipo`);

--
-- Indices de la tabla `tab_usua`
--
ALTER TABLE `tab_usua`
  ADD PRIMARY KEY (`ident_usua`),
  ADD KEY `fk_tab_usua_tab_tipo1_idx` (`ident_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_cate`
--
ALTER TABLE `tab_cate`
  MODIFY `ident_cate` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_proy`
--
ALTER TABLE `tab_proy`
  MODIFY `ident_proy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_tipo`
--
ALTER TABLE `tab_tipo`
  MODIFY `ident_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tab_usua`
--
ALTER TABLE `tab_usua`
  MODIFY `ident_usua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tab_proy`
--
ALTER TABLE `tab_proy`
  ADD CONSTRAINT `fk_tab_proy_tab_area1` FOREIGN KEY (`ident_area`) REFERENCES `tab_area` (`ident_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tab_proy_tab_cate` FOREIGN KEY (`ident_cate`) REFERENCES `tab_cate` (`ident_cate`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tab_proy_tab_usua1` FOREIGN KEY (`ident_usua`) REFERENCES `tab_usua` (`ident_usua`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tab_usua`
--
ALTER TABLE `tab_usua`
  ADD CONSTRAINT `fk_tab_usua_tab_tipo1` FOREIGN KEY (`ident_tipo`) REFERENCES `tab_tipo` (`ident_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
