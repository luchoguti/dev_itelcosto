-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2018 a las 01:50:14
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `db_itelcost`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE `bienes` (
  `Id` int(11) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Ciudad` varchar(250) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Codigo_Postal` int(11) NOT NULL,
  `Tipo` varchar(250) NOT NULL,
  `Precio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
