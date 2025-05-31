-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2025 a las 22:28:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siperteg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonados`
--

CREATE TABLE `abonados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `ci` varchar(255) NOT NULL,
  `telefono1` varchar(255) NOT NULL,
  `telefono2` varchar(255) DEFAULT NULL,
  `zona` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `numero_casa` varchar(255) NOT NULL,
  `fecha_corte` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `abonados`
--

INSERT INTO `abonados` (`id`, `nombre`, `apellido`, `ci`, `telefono1`, `telefono2`, `zona`, `calle`, `numero_casa`, `fecha_corte`, `created_at`, `updated_at`, `estado`) VALUES
(1, 'Jesús Nelson', 'Cochi Matías', '8329855', '73242698', '77744101', 'Villa Trinidad', 'Calle 3', '300', NULL, '2025-05-31 22:21:14', '2025-05-31 22:21:14', 'activo'),
(2, 'Juan Carlos', 'Arteaga Calle', '6071175', '68103073', '73235764', 'Las Lomas Fatic', 'Calle 7', '000', NULL, '2025-05-31 22:25:42', '2025-05-31 22:25:42', 'activo'),
(3, 'Juana', 'Serrano', '3473719', '78780323', '68062891', 'Las Lomas Fatic', 'Av. Perimetral', '000', NULL, '2025-05-31 22:29:13', '2025-05-31 22:29:13', 'activo'),
(4, 'Katherine Patricia', 'Olano Quispe', '9183905', '73021634', NULL, 'Sajonia II', 'Calle E', '000', NULL, '2025-05-31 22:34:42', '2025-05-31 22:34:42', 'activo'),
(5, 'Benedicto', 'Huiza Huiza', '6767814', '74862165', '68093972', 'Sagrado Corazón de Jesús', 'calle', '000', NULL, '2025-05-31 22:37:50', '2025-05-31 22:37:50', 'activo'),
(6, 'Lidia', 'Choque Villca', '6075893', '63148863', '68173386', '2 de febrero', 'Av. Comercio', '000', NULL, '2025-05-31 22:41:21', '2025-05-31 22:41:21', 'activo'),
(7, 'Sofia', 'Mamani Quispe', '10039412', '74021439', '73709402', 'Sajonia II', 'Calle F', '2015', NULL, '2025-05-31 22:44:30', '2025-05-31 22:44:30', 'activo'),
(8, 'Reynaldo', 'Adrián Huallpa', '6820489', '62454144', '78819000', 'Sajonia II', 'Calle E', '000', NULL, '2025-05-31 22:48:16', '2025-05-31 22:48:16', 'activo'),
(9, 'Fernando', 'Cochi Quispe', '10097209', '64211594', NULL, 'Urb. 2 de marzo', 'calle', '000', NULL, '2025-05-31 22:51:17', '2025-05-31 22:51:17', 'activo'),
(10, 'Mariano', 'Mamani Gonzales', '2606440', '73538477', '73541248', 'Sajonia II', 'Calle E', '2360', NULL, '2025-05-31 22:54:25', '2025-05-31 22:54:25', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas_distribucion`
--

CREATE TABLE `cajas_distribucion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nodo_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `zona` varchar(255) NOT NULL,
  `capacidad` tinyint(3) UNSIGNED NOT NULL DEFAULT 16,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cajas_distribucion`
--

INSERT INTO `cajas_distribucion` (`id`, `nodo_id`, `nombre`, `zona`, `capacidad`, `created_at`, `updated_at`) VALUES
(1, 1, 'Buenos Aires', 'Villa Trinidad', 16, '2025-05-31 22:17:02', '2025-05-31 22:17:02'),
(2, 2, 'Delta', 'Las Lomas Fatic', 16, '2025-05-31 22:17:25', '2025-05-31 22:17:25'),
(3, 2, 'Omega', 'Sajonia II', 16, '2025-05-31 22:17:53', '2025-05-31 22:17:53'),
(4, 3, 'Arequipa', 'Sagrado Corazón de Jesús', 16, '2025-05-31 22:18:19', '2025-05-31 22:18:19'),
(5, 4, 'Zacatecas', '2 de febrero', 16, '2025-05-31 22:18:50', '2025-05-31 22:18:50'),
(6, 2, 'Beta', 'Sajonia II', 16, '2025-05-31 22:19:14', '2025-05-31 22:19:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobros`
--

CREATE TABLE `cobros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `abonado_id` bigint(20) UNSIGNED NOT NULL,
  `mes` varchar(255) NOT NULL,
  `anio` year(4) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `plataforma` varchar(255) DEFAULT NULL,
  `estado_pago` enum('pagado','pendiente') NOT NULL DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cobros`
--

INSERT INTO `cobros` (`id`, `abonado_id`, `mes`, `anio`, `monto`, `plataforma`, `estado_pago`, `created_at`, `updated_at`, `dia`) VALUES
(1, 1, '1', '2025', 100.00, 'Banco BCP', 'pagado', '2025-05-31 22:58:32', '2025-05-31 22:59:23', 30),
(2, 1, '2', '2025', 96.00, 'Tigo Money', 'pagado', '2025-05-31 23:00:14', '2025-05-31 23:00:14', 27),
(3, 1, '3', '2025', 100.00, 'Banco BCP', 'pagado', '2025-05-31 23:00:50', '2025-05-31 23:01:13', 25),
(4, 1, '4', '2025', 100.00, 'Banco BCP', 'pagado', '2025-05-31 23:01:45', '2025-05-31 23:01:45', 26),
(5, 1, '5', '2025', 96.00, 'Tigo Money', 'pagado', '2025-05-31 23:02:29', '2025-05-31 23:02:29', 23),
(6, 2, '1', '2025', 100.00, 'Personal', 'pagado', '2025-05-31 23:03:07', '2025-05-31 23:03:07', 25),
(7, 2, '2', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:03:39', '2025-05-31 23:03:39', 28),
(8, 2, '3', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:04:37', '2025-05-31 23:05:32', 25),
(9, 2, '4', '2025', 0.00, NULL, 'pendiente', '2025-05-31 23:05:13', '2025-05-31 23:05:13', 25),
(10, 2, '5', '2025', 0.00, NULL, 'pendiente', '2025-05-31 23:05:54', '2025-05-31 23:05:54', 25),
(11, 3, '1', '2025', 150.00, 'Yape', 'pagado', '2025-05-31 23:06:33', '2025-05-31 23:06:33', 13),
(12, 3, '2', '2025', 150.00, 'Yape', 'pagado', '2025-05-31 23:07:04', '2025-05-31 23:07:04', 15),
(13, 3, '3', '2025', 150.00, 'Yape', 'pagado', '2025-05-31 23:07:38', '2025-05-31 23:07:38', 14),
(14, 3, '4', '2025', 150.00, 'Yape', 'pagado', '2025-05-31 23:08:21', '2025-05-31 23:08:21', 14),
(15, 3, '5', '2025', 150.00, 'Yape', 'pagado', '2025-05-31 23:08:46', '2025-05-31 23:08:46', 14),
(16, 4, '1', '2025', 100.00, 'Personal', 'pagado', '2025-05-31 23:09:29', '2025-05-31 23:09:29', 22),
(17, 4, '2', '2025', 100.00, 'Yape', 'pagado', '2025-05-31 23:10:47', '2025-05-31 23:10:47', 22),
(18, 4, '3', '2025', 100.00, 'Yape', 'pagado', '2025-05-31 23:11:22', '2025-05-31 23:11:22', 22),
(19, 4, '4', '2025', 100.00, 'Yape', 'pagado', '2025-05-31 23:11:49', '2025-05-31 23:11:49', 22),
(20, 4, '5', '2025', 100.00, 'Yape', 'pagado', '2025-05-31 23:12:33', '2025-05-31 23:12:33', 25),
(21, 5, '1', '2024', 100.00, 'Banco Fie', 'pagado', '2025-05-31 23:13:37', '2025-05-31 23:13:37', 4),
(22, 5, '2', '2025', 100.00, 'Banco Fie', 'pagado', '2025-05-31 23:14:35', '2025-05-31 23:14:35', 24),
(23, 5, '3', '2025', 100.00, 'Banco Fie', 'pagado', '2025-05-31 23:15:19', '2025-05-31 23:15:19', 1),
(24, 5, '4', '2025', 100.00, 'Yape', 'pagado', '2025-05-31 23:15:54', '2025-05-31 23:15:54', 29),
(25, 5, '5', '2025', 100.00, 'Yape', 'pagado', '2025-05-31 23:16:26', '2025-05-31 23:16:26', 26),
(26, 6, '1', '2025', 100.00, 'Banco BCP', 'pagado', '2025-05-31 23:17:55', '2025-05-31 23:17:55', 25),
(27, 6, '2', '2025', 100.00, 'Banco BCP', 'pagado', '2025-05-31 23:18:27', '2025-05-31 23:18:27', 25),
(28, 6, '3', '2025', 100.00, 'Banco BCP', 'pagado', '2025-05-31 23:18:50', '2025-05-31 23:18:50', 25),
(29, 6, '4', '2025', 100.00, 'Banco BCP', 'pagado', '2025-05-31 23:19:11', '2025-05-31 23:19:11', 25),
(30, 6, '5', '2025', 100.00, 'Banco BCP', 'pagado', '2025-05-31 23:19:35', '2025-05-31 23:19:35', 25),
(31, 7, '1', '2025', 96.00, 'Tigo Money', 'pagado', '2025-05-31 23:20:34', '2025-05-31 23:20:34', 28),
(32, 7, '2', '2025', 100.00, 'Yape', 'pagado', '2025-05-31 23:21:02', '2025-05-31 23:21:02', 26),
(33, 7, '3', '2025', 0.00, NULL, 'pagado', '2025-05-31 23:22:07', '2025-05-31 23:22:07', 21),
(34, 7, '4', '2025', 0.00, NULL, 'pagado', '2025-05-31 23:22:27', '2025-05-31 23:22:27', 21),
(35, 7, '5', '2025', 100.00, 'Yape', 'pagado', '2025-05-31 23:23:00', '2025-05-31 23:23:00', 8),
(36, 8, '1', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:23:30', '2025-05-31 23:23:30', 17),
(37, 8, '2', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:24:13', '2025-05-31 23:24:13', 20),
(38, 8, '3', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:24:38', '2025-05-31 23:24:38', 18),
(39, 8, '4', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:25:08', '2025-05-31 23:25:08', 21),
(40, 8, '5', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:25:34', '2025-05-31 23:25:34', 21),
(41, 9, '1', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:26:02', '2025-05-31 23:26:02', 25),
(42, 9, '2', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:26:39', '2025-05-31 23:26:39', 25),
(43, 9, '3', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:27:14', '2025-05-31 23:27:14', 25),
(44, 9, '4', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:27:44', '2025-05-31 23:27:44', 25),
(45, 9, '5', '2025', 100.00, 'Banco SOL', 'pagado', '2025-05-31 23:28:05', '2025-05-31 23:28:05', 28),
(46, 10, '1', '2025', 100.00, 'Banco Fie', 'pagado', '2025-05-31 23:28:59', '2025-05-31 23:28:59', 21),
(47, 10, '2', '2025', 100.00, 'Banco Fie', 'pagado', '2025-05-31 23:29:42', '2025-05-31 23:29:42', 21),
(48, 10, '3', '2025', 100.00, 'Banco Fie', 'pagado', '2025-05-31 23:30:14', '2025-05-31 23:30:14', 10),
(49, 10, '4', '2025', 100.00, 'Banco Fie', 'pagado', '2025-05-31 23:31:09', '2025-05-31 23:31:09', 21),
(50, 10, '5', '2025', 100.00, 'Banco Fie', 'pagado', '2025-05-31 23:31:31', '2025-05-31 23:31:31', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `conversations`
--

INSERT INTO `conversations` (`id`, `title`, `created_at`, `updated_at`) VALUES
(12, 'PRUEBA 1', '2025-06-01 00:07:01', '2025-06-01 00:07:01'),
(13, 'PRUEBA 2', '2025-06-01 00:10:52', '2025-06-01 00:10:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_tecnicos`
--

CREATE TABLE `datos_tecnicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `abonado_id` bigint(20) UNSIGNED NOT NULL,
  `plan` varchar(255) NOT NULL,
  `odn` varchar(255) NOT NULL,
  `pon` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `codigo_tecnico` varchar(255) NOT NULL,
  `codigo_sistema` varchar(255) NOT NULL,
  `nodo` varchar(255) NOT NULL,
  `caja_distribucion` varchar(255) NOT NULL,
  `fecha_instalacion` date NOT NULL,
  `foto_plano` varchar(255) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mapa_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos_tecnicos`
--

INSERT INTO `datos_tecnicos` (`id`, `abonado_id`, `plan`, `odn`, `pon`, `password`, `codigo_tecnico`, `codigo_sistema`, `nodo`, `caja_distribucion`, `fecha_instalacion`, `foto_plano`, `observaciones`, `created_at`, `updated_at`, `mapa_link`) VALUES
(1, 1, '100', 'DF302B218F91', '15', 'A1L9B5F5RTO', '2125', '83298550', 'Argentina', 'Buenos Aires', '2024-02-19', NULL, 'Sin Observaciones', '2025-05-31 22:24:07', '2025-05-31 22:24:07', NULL),
(2, 2, '100', 'GPON00D091D0', '1', 'J1U9A7N8CARLOS', '2125', '60711750', 'Hydra', 'Delta', '2025-01-25', NULL, 'Sin Observaciones', '2025-05-31 22:27:49', '2025-05-31 22:27:49', NULL),
(3, 3, '150', 'DF302B2187F9', '1', 'PATZI878', '2125', '34737190', 'Hydra', 'Delta', '2024-03-16', NULL, 'Sin Observaciones', '2025-05-31 22:32:18', '2025-05-31 22:32:18', NULL),
(4, 4, '100', 'GPON00D06D68', '1', 'DILAN2023', '2125', '91839050', 'Hydra', 'Omega', '2025-01-22', NULL, 'Sin Observaciones', '2025-05-31 22:36:28', '2025-05-31 22:36:28', NULL),
(5, 5, '100', 'DC912B05C42A', '15', 'HUIZA6767814', '2125', '67678140', 'Perú', 'Arequipa', '2024-02-10', NULL, 'Sin Observaciones', '2025-05-31 22:40:04', '2025-05-31 22:40:04', NULL),
(6, 6, '100', 'DF302B218FC1', '13', '15416338', '2125', '6075893', 'México', 'Zacatecas', '2024-01-25', NULL, 'Sin Observaciones', '2025-05-31 22:43:13', '2025-05-31 22:43:13', NULL),
(7, 7, '100', 'DC70B3D7FDBF', '1', 'J1A9I9M09', '2125', '100394120', 'Hydra', 'Omega', '2024-02-21', NULL, 'Sin Observaciones', '2025-05-31 22:46:47', '2025-05-31 22:46:58', NULL),
(8, 8, '100', 'DF302B2187F1', '1', 'BOCAJUNIORS.AR.', '2125', '68204890', 'Hydra', 'Omega', '2024-02-21', NULL, 'Sin Observaciones', '2025-05-31 22:49:55', '2025-05-31 22:49:55', NULL),
(9, 9, '100', 'GPON00D0A2F0', '1', 'FERCHITOCOCHIS', '2125', '10097289', 'Hydra', 'Beta', '2024-12-21', NULL, 'Sin Observaciones', '2025-05-31 22:53:08', '2025-05-31 22:53:08', NULL),
(10, 10, '100', 'DF302B2187E9', '1', 'M1A9R6I4ANO', '2125', '26064400', 'Hydra', 'Omega', '2024-02-20', NULL, 'Sin Observaciones', '2025-05-31 22:56:44', '2025-05-31 22:56:44', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `defectos`
--

CREATE TABLE `defectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `detalle` text NOT NULL,
  `estado` enum('PENDIENTE','RESUELTA') NOT NULL DEFAULT 'PENDIENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `defectos`
--

INSERT INTO `defectos` (`id`, `nombre`, `celular`, `direccion`, `ubicacion`, `detalle`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Erick Flores', '76554810', 'alamos fatic', 'https://maps.app.goo.gl/WckZmHuV25Jtgkx3A', 'no hay internet', 'RESUELTA', '2025-06-01 00:12:32', '2025-06-01 00:21:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fallas`
--

CREATE TABLE `fallas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `abonado_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_falla` enum('material','caja') NOT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `estado` enum('pendiente','resuelta') NOT NULL DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fallas`
--

INSERT INTO `fallas` (`id`, `abonado_id`, `tipo_falla`, `detalle`, `estado`, `created_at`, `updated_at`) VALUES
(1, 5, 'material', 'Conector dañado', 'resuelta', '2025-05-31 23:50:00', '2025-05-31 23:50:00'),
(2, 9, 'caja', 'Puerto Atenuado', 'pendiente', '2025-05-31 23:50:25', '2025-05-31 23:50:25'),
(3, 1, 'material', 'cable doblado', 'resuelta', '2025-05-31 23:51:01', '2025-05-31 23:51:01'),
(4, 2, 'material', 'Router descompuesto', 'resuelta', '2025-05-31 23:52:24', '2025-05-31 23:52:24'),
(5, 3, 'caja', 'Toda la caja atenuada', 'pendiente', '2025-05-31 23:53:06', '2025-05-31 23:53:06'),
(6, 4, 'material', 'fibra quebrada', 'resuelta', '2025-05-31 23:54:22', '2025-05-31 23:54:22'),
(7, 6, 'material', 'conector dañado', 'resuelta', '2025-05-31 23:54:57', '2025-05-31 23:54:57'),
(8, 10, 'caja', 'acople dañado', 'resuelta', '2025-05-31 23:55:14', '2025-05-31 23:55:14'),
(9, 8, 'material', 'fibra quebrada', 'resuelta', '2025-05-31 23:56:17', '2025-05-31 23:56:17'),
(10, 7, 'material', 'Router descompuesto', 'resuelta', '2025-05-31 23:56:33', '2025-05-31 23:56:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `estado` enum('PENDIENTE','COMPLETADA') NOT NULL DEFAULT 'PENDIENTE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instalaciones`
--

INSERT INTO `instalaciones` (`id`, `nombre`, `celular`, `direccion`, `ubicacion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Erick Flores', '76554810', 'alamos Fatic', 'https://maps.app.goo.gl/WckZmHuV25Jtgkx3A', 'PENDIENTE', '2025-06-01 00:10:33', '2025-06-01 00:10:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `sender` enum('user','bot') NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender`, `content`, `created_at`, `updated_at`) VALUES
(89, 12, 'user', 'HOLA', '2025-06-01 00:07:08', '2025-06-01 00:07:08'),
(90, 12, 'bot', '**¿Qué necesitas hoy?**\n\n- *instalación*: registrar una instalación\n- *falla*: reportar un problema\n- *cuentas de pago*: ver datos de pago\n- *planes de internet*: ver planes disponibles', '2025-06-01 00:07:08', '2025-06-01 00:07:08'),
(91, 12, 'user', 'instalación', '2025-06-01 00:07:23', '2025-06-01 00:07:23'),
(92, 12, 'bot', '¡Vamos a registrar tu instalación! ¿Cuál es tu nombre completo?', '2025-06-01 00:07:23', '2025-06-01 00:07:23'),
(93, 12, 'user', 'Erick Flores', '2025-06-01 00:07:46', '2025-06-01 00:07:46'),
(94, 12, 'bot', 'Perfecto, Erick Flores. ¿Cuál es tu número de celular?', '2025-06-01 00:07:46', '2025-06-01 00:07:46'),
(95, 12, 'user', '76554810', '2025-06-01 00:07:57', '2025-06-01 00:07:57'),
(96, 12, 'bot', 'Anotado. ¿Cuál es tu dirección completa?', '2025-06-01 00:07:57', '2025-06-01 00:07:57'),
(97, 12, 'user', 'alamos Fatic', '2025-06-01 00:08:12', '2025-06-01 00:08:12'),
(98, 12, 'bot', 'Gracias. Finalmente, ¿dónde se realizará la instalación (ubicación)?', '2025-06-01 00:08:12', '2025-06-01 00:08:12'),
(99, 12, 'user', 'https://maps.app.goo.gl/WckZmHuV25Jtgkx3A', '2025-06-01 00:10:33', '2025-06-01 00:10:33'),
(100, 12, 'bot', 'Tu solicitud de instalación ha sido registrada. ¡Gracias!', '2025-06-01 00:10:33', '2025-06-01 00:10:33'),
(101, 13, 'user', 'HOLA', '2025-06-01 00:11:00', '2025-06-01 00:11:00'),
(102, 13, 'bot', '**¿Qué necesitas hoy?**\n\n- *instalación*: registrar una instalación\n- *falla*: reportar un problema\n- *cuentas de pago*: ver datos de pago\n- *planes de internet*: ver planes disponibles', '2025-06-01 00:11:00', '2025-06-01 00:11:00'),
(103, 13, 'user', 'falla', '2025-06-01 00:11:05', '2025-06-01 00:11:05'),
(104, 13, 'bot', 'Entendido: reporte de falla. Para comenzar, ¿cuál es tu nombre completo?', '2025-06-01 00:11:05', '2025-06-01 00:11:05'),
(105, 13, 'user', 'Erick Flores', '2025-06-01 00:11:21', '2025-06-01 00:11:21'),
(106, 13, 'bot', 'Gracias, Erick Flores. ¿Cuál es tu número de celular?', '2025-06-01 00:11:21', '2025-06-01 00:11:21'),
(107, 13, 'user', '76554810', '2025-06-01 00:11:43', '2025-06-01 00:11:43'),
(108, 13, 'bot', 'Entendido. ¿Cuál es tu dirección completa?', '2025-06-01 00:11:43', '2025-06-01 00:11:43'),
(109, 13, 'user', 'alamos fatic', '2025-06-01 00:12:07', '2025-06-01 00:12:07'),
(110, 13, 'bot', 'Perfecto. ¿Dónde ocurrió la falla (ubicación)?', '2025-06-01 00:12:07', '2025-06-01 00:12:07'),
(111, 13, 'user', 'https://maps.app.goo.gl/WckZmHuV25Jtgkx3A', '2025-06-01 00:12:14', '2025-06-01 00:12:14'),
(112, 13, 'bot', 'Por favor, describe en detalle la falla.', '2025-06-01 00:12:14', '2025-06-01 00:12:14'),
(113, 13, 'user', 'no hay internet', '2025-06-01 00:12:32', '2025-06-01 00:12:32'),
(114, 13, 'bot', 'Tu reporte de falla ha sido registrado. ¡Gracias!', '2025-06-01 00:12:32', '2025-06-01 00:12:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2025_04_14_144051_create_datos_tecnicos_table', 2),
(6, '2025_04_16_135644_create_cobros_table', 3),
(7, '2025_04_17_182128_create_fallas_table', 4),
(8, '2025_04_18_013039_create_nodos_table', 5),
(9, '2025_04_18_013355_create_cajas_distribucion_table', 6),
(10, '2025_04_18_014224_create_cajas_distribucion_table', 7),
(11, '2025_04_18_230348_add_rol_and_telefono_to_users_table', 8),
(12, '2025_04_18_230743_add_rol_and_telefono_to_users_table', 9),
(13, '2025_05_12_160711_add_mapa_link_to_datos_tecnicos_table', 10),
(14, '2025_05_12_161030_add_mapa_link_to_datos_tecnicos_table', 11),
(15, '2025_05_14_152741_create_instalaciones_table', 12),
(16, '2025_05_14_160904_create_defectos_table', 13),
(17, '2025_05_25_221042_add_two_factor_columns_to_users_table', 14),
(18, '2025_05_26_201642_add_google2fa_secret_to_users_table', 15),
(19, '2025_05_28_000000_create_conversations_table', 16),
(20, '2025_05_28_000001_create_messages_table', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodos`
--

CREATE TABLE `nodos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `zona` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nodos`
--

INSERT INTO `nodos` (`id`, `nombre`, `zona`, `created_at`, `updated_at`) VALUES
(1, 'Argentina', 'Villa Trinidad', '2025-05-31 22:14:23', '2025-05-31 22:14:23'),
(2, 'Hydra', 'Los Andes III', '2025-05-31 22:14:46', '2025-05-31 22:14:46'),
(3, 'Perú', 'Sagrado Corazón de Jesús', '2025-05-31 22:15:51', '2025-05-31 22:15:51'),
(4, 'Mexico', 'Zacatecas', '2025-05-31 22:16:18', '2025-05-31 22:16:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qrYVG33Vjet6fsM8ZbQPrYIZaCAOpzCk1jzc06ZH', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZTMydEo2QTlFVHFXY1ptSWZPb1V4b0N2UGFZTmhEV3gzZ1dhWW93MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lc3RhZGlzdGljYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6ImNhcHRjaGEiO2E6MTp7czo2OiJwYXNzZWQiO2I6MTt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1748722876),
('stOSL7Nu83i7uuYVjUWQwWXgQksaTIut4OiFbSgT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3RCTUd1dWFuSDd6UzdwdnUxdUs1WFhuWlpDWnV4NDF0djhTM3FpcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGF0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748722352),
('wckbTW6ku6ZBjjRsAJaEl4QOZC4RGWwVH4j8Xy9L', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNkdRNnhNbUNoRWNuY052eHNxdmZpVHdOUURsQmJtTFVHSGtZNWQ3MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6ImNhcHRjaGEiO2E6MTp7czo2OiJwYXNzZWQiO2I6MTt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1748721835);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `google2fa_secret` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google2fa_secret`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Erick', 'erickfranciscofloresmendoza@gmail.com', NULL, '$2y$12$VttjXJEK2G0H9dwKmqVjk.2SeqIopSouZbOulkGyVh56dbu0e3QuG', NULL, NULL, '2025-05-26 02:27:36', '2025-05-26 06:50:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonados`
--
ALTER TABLE `abonados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abonados_ci_unique` (`ci`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cajas_distribucion`
--
ALTER TABLE `cajas_distribucion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cajas_distribucion_nodo_id_foreign` (`nodo_id`);

--
-- Indices de la tabla `cobros`
--
ALTER TABLE `cobros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cobros_abonado_id_foreign` (`abonado_id`);

--
-- Indices de la tabla `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_tecnicos`
--
ALTER TABLE `datos_tecnicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datos_tecnicos_abonado_id_foreign` (`abonado_id`);

--
-- Indices de la tabla `defectos`
--
ALTER TABLE `defectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `fallas`
--
ALTER TABLE `fallas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fallas_abonado_id_foreign` (`abonado_id`);

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nodos`
--
ALTER TABLE `nodos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonados`
--
ALTER TABLE `abonados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cajas_distribucion`
--
ALTER TABLE `cajas_distribucion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cobros`
--
ALTER TABLE `cobros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `datos_tecnicos`
--
ALTER TABLE `datos_tecnicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `defectos`
--
ALTER TABLE `defectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fallas`
--
ALTER TABLE `fallas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `nodos`
--
ALTER TABLE `nodos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajas_distribucion`
--
ALTER TABLE `cajas_distribucion`
  ADD CONSTRAINT `cajas_distribucion_nodo_id_foreign` FOREIGN KEY (`nodo_id`) REFERENCES `nodos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cobros`
--
ALTER TABLE `cobros`
  ADD CONSTRAINT `cobros_abonado_id_foreign` FOREIGN KEY (`abonado_id`) REFERENCES `abonados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `datos_tecnicos`
--
ALTER TABLE `datos_tecnicos`
  ADD CONSTRAINT `datos_tecnicos_abonado_id_foreign` FOREIGN KEY (`abonado_id`) REFERENCES `abonados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `fallas`
--
ALTER TABLE `fallas`
  ADD CONSTRAINT `fallas_abonado_id_foreign` FOREIGN KEY (`abonado_id`) REFERENCES `abonados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
