-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2020 at 06:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `innft`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_proy`
--

CREATE TABLE `tab_proy` (
  `ident_proy` int(11) NOT NULL,
  `nombr_proy` varchar(150) DEFAULT NULL,
  `desco_proy` varchar(150) NOT NULL,
  `descr_proy` longtext,
  `areaa_proy` varchar(45) NOT NULL,
  `motor_proy` varchar(45) NOT NULL,
  `fecre_proy` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statu_proy` char(1) NOT NULL,
  `ident_usua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tab_tipo`
--

CREATE TABLE `tab_tipo` (
  `ident_tipo` int(11) NOT NULL,
  `nombr_tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tab_tipo`
--

INSERT INTO `tab_tipo` (`ident_tipo`, `nombr_tipo`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'FUNCIONARIO'),
(3, 'USUARIO');

-- --------------------------------------------------------

--
-- Table structure for table `tab_usua`
--

CREATE TABLE `tab_usua` (
  `ident_usua` int(11) NOT NULL,
  `cedul_usua` varchar(10) DEFAULT NULL,
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
-- Dumping data for table `tab_usua`
--

INSERT INTO `tab_usua` (`ident_usua`, `cedul_usua`, `nombr_usua`, `apeli_usua`, `gener_usua`, `civil_usua`, `nivel_usua`, `telef_usua`, `email_usua`, `image_usua`, `estad_usua`, `munic_usua`, `direc_usua`, `usuar_usua`, `contr_usua`, `fecre_usua`, `statu_usua`, `ident_tipo`) VALUES
(1, 'V-26607655', 'CARLOS AGUSTIN', 'GUANIPA ALVAREZ', 'MASCULINO', 'SOLTERO', 'BACHILLERATO', '(0426) 690 8396', 'AGUSTINGUANIPA98@GMAIL.COM', '../../imagen/perfil/FOTO TIPO CARNET (optimizado).jpg', 'TACHIRA', 'SAN CRISTOBAL', 'CALLE 2 PUEBLO NUEVO', 'AGUSTIN', '827ccb0eea8a706c4c34a16891f84e7b', '2020-03-06 04:00:00', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_proy`
--
ALTER TABLE `tab_proy`
  ADD PRIMARY KEY (`ident_proy`),
  ADD KEY `fk_tab_proy_tab_usua1_idx` (`ident_usua`);

--
-- Indexes for table `tab_tipo`
--
ALTER TABLE `tab_tipo`
  ADD PRIMARY KEY (`ident_tipo`);

--
-- Indexes for table `tab_usua`
--
ALTER TABLE `tab_usua`
  ADD PRIMARY KEY (`ident_usua`),
  ADD UNIQUE KEY `cedul_usua` (`cedul_usua`),
  ADD KEY `fk_tab_usua_tab_tipo1_idx` (`ident_tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_proy`
--
ALTER TABLE `tab_proy`
  MODIFY `ident_proy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_tipo`
--
ALTER TABLE `tab_tipo`
  MODIFY `ident_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tab_usua`
--
ALTER TABLE `tab_usua`
  MODIFY `ident_usua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tab_proy`
--
ALTER TABLE `tab_proy`
  ADD CONSTRAINT `fk_tab_proy_tab_usua1` FOREIGN KEY (`ident_usua`) REFERENCES `tab_usua` (`ident_usua`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tab_usua`
--
ALTER TABLE `tab_usua`
  ADD CONSTRAINT `fk_tab_usua_tab_tipo1` FOREIGN KEY (`ident_tipo`) REFERENCES `tab_tipo` (`ident_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
