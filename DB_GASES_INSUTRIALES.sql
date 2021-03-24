-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2021 a las 02:28:33
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_gases`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados_produccion`
--

CREATE TABLE `certificados_produccion` (
  `Id_certificado` int(11) NOT NULL,
  `Id_produccion` int(11) NOT NULL,
  `Id_empleado` bigint(11) NOT NULL,
  `Capacidad` varchar(40) NOT NULL,
  `Pureza` int(20) NOT NULL,
  `Presion` int(20) NOT NULL,
  `Observaciones` varchar(90) NOT NULL,
  `Estado_certificado` varchar(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado_envase`
--

CREATE TABLE `certificado_envase` (
  `Id` int(11) NOT NULL,
  `Id_certificado` int(11) NOT NULL,
  `Id_envase` varchar(20) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `Cantidad` varchar(20) NOT NULL,
  `Estado` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id_cliente` varchar(20) NOT NULL,
  `Nom_cliente` varchar(60) NOT NULL,
  `Dir_cliente` varchar(60) DEFAULT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Tel_cliente` varchar(15) DEFAULT NULL,
  `Cor_cliente` varchar(40) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id_cliente`, `Nom_cliente`, `Dir_cliente`, `Ciudad`, `Tel_cliente`, `Cor_cliente`, `deleted_at`) VALUES
('1065845256', 'Rociosilla', 'dfdf', '', '222', 'rocio', '2020-12-11 03:00:50'),
('106589525', 'PRUEBA', 'CALLE 3RA', 'Aguachica', '32562', 'corroe@gmail.com', NULL),
('1065901418-1', 'Drogueria lupita', 'cra 21 No. 4-66 apto 203', 'Aguachica-Cesar', '0180002356525', 'lupitacari@gmail.com', NULL),
('13222224', 'Yilber jose toro', 'calle 3ra nº2323', '', '362', '2as', '2020-11-27 23:30:37'),
('900598474', 'soluciones', 'cra 21 No. 4-66', '', '5655739', 'sac022013@', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Id_empleado` bigint(11) NOT NULL,
  `Nom_empleado` varchar(60) NOT NULL,
  `Cargo_empleado` varchar(20) NOT NULL,
  `Dir_empleado` varchar(60) DEFAULT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Tel_empleado` varchar(12) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Id_empleado`, `Nom_empleado`, `Cargo_empleado`, `Dir_empleado`, `Ciudad`, `Tel_empleado`, `deleted_at`) VALUES
(325624, 'lukiasa', 'ewwe', 'ssddsd', 'sdfs', '4343', '2020-12-29 05:39:18'),
(3256240, 'lukiasaa', 'ewwew', 'ssddsddsss', 'sdfsaa', '4343', NULL),
(3256245, 'lukiasa3', 'ewwe3', 'ssdds2', 'sdfsa', '43443', '2020-12-29 07:45:27'),
(32562411, 'lukiasa', 'ewwe', 'ssddsd', 'sdfs', '4343', NULL),
(32562415, 'lukiasa', 'ewwe', 'calle 3 N 37-45', 'asd', '4343', '2020-12-29 05:39:12'),
(32562477, 'lukiasa', 'ewwe', 'calle 3 N 37-45', 'asd', '4343', NULL),
(32567112, 'lukiasa', 'ewwe', 'calle 3 N 37-45', 'asd', '4343', NULL),
(65232245, 'johannnammma', 'casll', 'dasd', 'cas', '232222222222', NULL),
(65822222, 'asdsa', 'aa', 'ss', 'ss', '3155555555', NULL),
(325624112, 'lukiasa', 'ewwe', 'calle 3 N 37-45', 'asd', '4343', NULL),
(325624162, 'lukiasa', 'ewwe', 'calle 3 N 37-45', 'asd', '4343', NULL),
(652322444, 'johannnammma', 'casll', 'dasd', 'cas', '232222222222', NULL),
(652322566, 'johannnammma', 'casll', 'dasd', 'cas', '232222222222', NULL),
(1065856589, 'Rocio43', 'Na777', 'calle 3 Nº 37-45', '0', '325652356', '0000-00-00 00:00:00'),
(1065880167, 'astrid quiñones', 'contadora', 'cll 9 norte 36-40', '0', '3105263038', NULL),
(1066895223, 'Yilber toro', 'Supervisor', 'sfdsf', 'Aguachica', '4334', NULL),
(10658962325, 'Prueba', 'prueb', 'prueba', 'prueba', '235222222222', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envases`
--

CREATE TABLE `envases` (
  `Id_envase` varchar(20) NOT NULL,
  `Id_propietario` varchar(15) NOT NULL,
  `Id_proveedor` varchar(15) DEFAULT NULL,
  `N_int_envase` varchar(20) NOT NULL,
  `Estado_envase` varchar(10) NOT NULL,
  `Material` varchar(12) NOT NULL,
  `U_medida` varchar(15) NOT NULL,
  `Capacidad` varchar(12) NOT NULL,
  `Clas_producto` varchar(20) NOT NULL,
  `Presion` varchar(12) NOT NULL,
  `Alt_c_valvula` varchar(12) NOT NULL,
  `P_c_valvula` varchar(12) NOT NULL,
  `Valvula` varchar(12) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `N_int_fabricacion` varchar(25) NOT NULL,
  `Tapa` varchar(12) NOT NULL,
  `Fecha_compra` date DEFAULT NULL,
  `Garantia` date DEFAULT NULL,
  `Fecha_fabricacion` date DEFAULT NULL,
  `Prueba_hidrostatica` date DEFAULT NULL,
  `Estado_actual` varchar(12) NOT NULL,
  `Inventario` varchar(2) DEFAULT NULL,
  `Observaciones` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envase_remision`
--

CREATE TABLE `envase_remision` (
  `Id` int(11) NOT NULL,
  `Id_envase` varchar(20) NOT NULL,
  `Id_remision` int(11) NOT NULL,
  `Producto` varchar(11) NOT NULL,
  `Cantidad` varchar(11) NOT NULL,
  `Fecha_ingreso` datetime DEFAULT NULL,
  `Estado` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `Id_kardex` int(11) NOT NULL,
  `id_remision` int(11) NOT NULL,
  `Id_envase` varchar(20) NOT NULL,
  `Fecha_entrada` datetime NOT NULL,
  `Ciudad` varchar(12) NOT NULL,
  `N_dto_entrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_07_145639_add_deleted_to_empleados', 1),
(5, '2020_11_07_200142_add_deleted_to_clientes', 1),
(6, '2020_11_07_200934_add_deleted_to_proveedores', 1),
(7, '2020_11_07_201036_add_deleted_to_propietarios', 1),
(8, '2020_11_08_191316_create_roles_table', 2),
(9, '2020_11_08_191820_create_permissions_table', 2),
(10, '2020_11_08_192149_create_users_roles_table', 2),
(11, '2020_11_08_193313_create_users_permissions_table', 2),
(12, '2020_11_08_193756_create_role_permissions_table', 2),
(13, '2020_11_22_202825_create_certi_produccion_table', 3),
(14, '2020_11_23_025414_create_idenvases_table', 4),
(15, '2020_12_04_212643_create_remisiones_table', 5),
(16, '2020_12_09_211935_create_envaseremision_table', 6),
(17, '2020_12_16_153020_create_envases_table', 7),
(18, '2020_12_16_154321_add_deleted_to_envases', 8),
(19, '2020_12_29_220256_create_orden_produccion_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_produccion`
--

CREATE TABLE `orden_produccion` (
  `Id_produccion` int(11) NOT NULL,
  `Fecha_solicitud` date NOT NULL,
  `N_lote` varchar(12) NOT NULL,
  `N_envases` varchar(12) NOT NULL,
  `Cantidad_m3` varchar(12) NOT NULL,
  `Turno` varchar(12) NOT NULL,
  `Fecha_vencimiento` datetime DEFAULT NULL,
  `Estado` varchar(2) DEFAULT NULL,
  `certi_estado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden_produccion`
--

INSERT INTO `orden_produccion` (`Id_produccion`, `Fecha_solicitud`, `N_lote`, `N_envases`, `Cantidad_m3`, `Turno`, `Fecha_vencimiento`, `Estado`, `certi_estado`, `created_at`, `updated_at`) VALUES
(22222, '2021-01-04', '2', '2', '2', '2', '2021-01-04 00:00:00', '1', 1, '2021-01-05 03:40:34', '2021-01-05 03:41:03'),
(123458, '2021-01-04', '33', '5', '12', '1', '2021-01-04 00:00:00', '1', 1, '2021-01-05 03:27:31', '2021-01-05 03:28:01'),
(444444, '2021-01-04', '4', '4', '4', '4', '2021-01-04 00:00:00', '1', 1, '2021-01-05 03:29:56', '2021-01-05 03:30:17'),
(12345678, '2020-12-02', '5689', '5', '5', '2', '2020-12-30 00:00:00', '1', 1, NULL, NULL),
(34243266, '2020-12-16', '5', '5', '5', '3', '2020-12-16 00:00:00', '1', 1, NULL, NULL),
(45254444, '2020-12-16', '98', '5', '32', '2', '2020-12-16 00:00:00', '1', 1, NULL, NULL),
(65825444, '2020-12-20', '34', '6', '6', '4', '2020-12-20 00:00:00', '1', 1, NULL, NULL),
(77777775, '2020-12-29', '44', '65', '56', '5', '2020-12-29 00:00:00', NULL, 0, NULL, NULL),
(88888880, '2020-12-29', '6', '6', '6', '5', '2020-12-29 00:00:00', NULL, 0, NULL, NULL),
(88888883, '2020-12-29', '6', '6', '6', '5', '2020-12-29 00:00:00', NULL, 0, NULL, NULL),
(88888884, '2020-12-29', '6', '6', '6', '5', '2020-12-29 00:00:00', '1', 0, '2020-12-29 01:32:37', '2020-12-30 03:44:25'),
(88888888, '2020-12-29', '6', '6', '6', '5', '2020-12-29 00:00:00', NULL, 0, NULL, NULL),
(88888889, '2020-12-29', '6', '6', '6', '5', '2020-12-29 00:00:00', NULL, 0, NULL, NULL),
(95232553, '2020-12-29', '1225', '63', '233', '12', '2020-12-29 00:00:00', '1', 0, NULL, NULL),
(99999999, '2020-12-22', '22', '2', '2', '22', '2020-12-22 00:00:00', '1', 1, NULL, NULL),
(265221255, '2020-12-16', '5689', '5', '5', '6', '2020-12-16 00:00:00', '1', 1, NULL, NULL),
(433333443, '2020-12-29', '3', '5', '5', '5', '2020-12-29 00:00:00', '1', 0, '2020-12-30 04:36:39', '2020-12-30 04:36:59'),
(652332212, '2020-12-28', '36', '2', '36', '23', '2020-12-28 00:00:00', '1', 1, NULL, NULL),
(666666666, '2020-12-29', '4', '5', '4', '4', '2020-12-29 00:00:00', '1', 0, NULL, '2020-12-30 03:16:57'),
(1065901418, '2020-12-22', '5', '3', '1', '3', '2020-12-22 00:00:00', '1', 1, NULL, NULL),
(1111111111, '2020-10-10', '15', '10', '22222', '2', '2022-12-09 00:00:00', '1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(56, 'Create', 'create', '2020-11-28 01:50:23', '2020-11-28 01:50:23'),
(57, 'Edit', 'edit', '2020-11-28 01:50:23', '2020-11-28 01:50:23'),
(58, 'Update', 'update', '2020-11-28 01:50:23', '2020-11-28 01:50:23'),
(59, 'Delete', 'delete', '2020-11-28 01:50:23', '2020-11-28 01:50:23'),
(60, 'All', 'all', '2020-11-28 01:50:23', '2020-11-28 01:50:23'),
(61, 'Remision', 'remision', '2020-11-28 01:50:41', '2020-11-28 01:50:41'),
(62, 'Ordenes', 'ordenes', '2020-11-28 01:51:02', '2020-11-28 01:51:02'),
(63, 'Certificados', 'certificados', '2020-11-28 01:51:02', '2020-11-28 01:51:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_producto` int(11) NOT NULL,
  `Nom_producto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `Nom_producto`) VALUES
(1, 'Oxigeno'),
(2, 'Nitrogeno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `Id_propietario` varchar(15) NOT NULL,
  `Nom_propietario` varchar(60) NOT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Dir_propietario` varchar(60) NOT NULL,
  `Tel_propietario` varchar(12) DEFAULT NULL,
  `Cor_propietario` varchar(40) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`Id_propietario`, `Nom_propietario`, `Ciudad`, `Dir_propietario`, `Tel_propietario`, `Cor_propietario`, `deleted_at`) VALUES
('106589524', 'PRUEBA', 'Aguachica', 'CALLE 3RA', '32562', 'corroe@gmail.com', NULL),
('10658962542-4', 'Lupita de cañizares', 'Aguachica-Cesar', 'cra 21 no 4-66', '3215628569', 'gisaguachica@hotmail.com', '2020-12-12 03:02:02'),
('1065901410', 'LEidy johanna', 'Aguachica', 'calle de lupita', '12', 'asdsa', '2020-11-27 22:26:34'),
('1065901412', 'LEidy johanna', 'Aguachica', 'calle de lupita', '4545', 'dfdfdsf', '2020-11-27 22:55:40'),
('1065901415', 'LEidy johanna', 'Aguachica', 'calle de lupita', '45', 'dfdfdsf', '2020-11-27 22:55:45'),
('1065901418', 'LEidy johanna', 'Aguachica', 'calle de lupita', '3115236525', 'asd', '2020-11-25 08:46:16'),
('1065906663-1', 'Yilber jose', 'Aguachica-Cesar', 'calle de lupita', '3256985658', 'johannosita@gmail.com', NULL),
('1065982659', 'Leidy johann', 'Aguachica-Cesars', 'cra 21 no 4-66', '32562596983', 'gisaguachicaaj@hotmail.com', NULL),
('123333230', 'asdasd', 'asdasd', 'asdas', '343', 'asdsa', '2020-11-27 22:24:18'),
('123333232', 'asdasd', 'asdasd', 'asdas', '343', 'asdsa', '2020-11-27 22:26:25'),
('123333267', 'asdasd', 'asdasd', 'asdas', '343', 'asdsa', '2020-11-27 22:26:30'),
('22222227', 'saaaaa', 'saaaaaa', 'assssss', '4444', 'sadsad', '2020-11-27 22:01:55'),
('23423423', 'sadsad', '444', 'asdas', '34', 'as', '2020-11-27 22:02:23'),
('32423423', 'sdfsdf', 'Aguachica', 'calle de lupita', '32', '23', '2020-11-27 21:59:42'),
('44444444', 'asdasd', 'Aguachica', 'calle de lupita', '43', 'sd', '2020-11-27 22:02:30'),
('5', 'lupi', 'asd', 'asdad', '142', 'hgfh', '2020-11-27 22:57:48'),
('65565555', '45', 'dfg', 'dfg', '453', 'df', '2020-12-11 03:07:38'),
('66666661', 'LEidy j', 'Aguachica', '32', '23', 'johannosi', '2020-12-11 03:07:42'),
('66666662', 'LEidy johanna', 'Aguachica', '32', '23', 'johannosi', '2020-11-27 22:15:39'),
('66666663', 'LEidy johanna', 'Aguachica', '32', '23', 'johannosi', '2020-12-11 03:08:03'),
('66666667', 'LEidy johanna', 'Aguachica', '32', '23', 'johannosi', '2020-11-27 22:05:17'),
('66666669', 'LEidy johanna', 'Aguachica', '32', '23', 'johannosi', '2020-11-27 22:05:24'),
('76576540', 'dfg', 'dfg', 'dfgdfg', '5454', 'fdffdf', '2020-11-27 22:10:14'),
('76576542', 'dfg', 'dfg', 'dfgdfg', '5454', 'fdffdf', '2020-11-27 22:10:36'),
('76576544', 'dfg', 'dfg', 'dfg', '54', 'fdf', '2020-11-27 22:13:15'),
('76576549', 'dfg', 'dfg', 'dfg', '54', 'fdf', '2020-11-27 23:29:54'),
('807004688', 'gases industriales', 'Aguachica', 'cra 21 no 4-66', NULL, 'gisaguachica', '2020-12-12 02:58:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Id_proveedor` varchar(15) NOT NULL,
  `Nom_proveedor` varchar(60) DEFAULT NULL,
  `Dir_proveedor` varchar(60) DEFAULT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Tel_proveedor` varchar(12) DEFAULT NULL,
  `Cor_proveedor` varchar(40) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Id_proveedor`, `Nom_proveedor`, `Dir_proveedor`, `Ciudad`, `Tel_proveedor`, `Cor_proveedor`, `deleted_at`) VALUES
('1', 'Yilbe32', 'Pro243', '', '123532', 'ccass', '2020-12-11 03:04:04'),
('1065265423-3', 'Leidy johanna mejia chogo', 'calle 3ra nº 37-74', 'Aguachica-Cesar', '32158965235', 'leidyjohann@gmail.com', NULL),
('106589529', 'PRUEBA2', 'CALLE 3RA', 'Aguachica', '32562', 'corroe@gmail.com', NULL),
('111111111', 'qqqqqqq', 'qqqq', '', '232222', 'aaaaa', '2020-12-11 03:04:14'),
('111111115', 'qqqqqqq', 'qqqqqqqq', '', '232222232222', 'aaaaaaaaaa', '2020-12-11 03:04:17'),
('2', 'danny', 'sadas33', '', '566', 'acc', '2020-11-27 23:37:46'),
('33366666', '5454', 'dfsfsdf67', '', '326', 'dfdfdf', '2020-11-27 23:33:21'),
('34434343', 'Yilber_toro', 'fghfgh', 'Aguachica', '32', 'aaaaa', NULL),
('555249625', 'Representaciones diaz quintero limitada', 'ocaña', '', '5613206', 'adsfasdklf@gmail.com', '2020-12-12 02:40:54'),
('67867567', 'tghjg', 'ghjgh', '', '6767', 'ghj', '2020-11-27 23:32:09'),
('87655555', 'fhg', 'fghfgh3', '', '54', 'fg', '2020-11-27 23:38:58'),
('88888884', 'qqqq', 'dfsfsdfdf', '', '5656565', '6666', '2020-12-11 03:04:07'),
('88888885', 'qqqq', 'dfsfsdf', '', '56', '6', '2020-12-11 03:04:11'),
('88888887', 'qqqqqqq', 'dfsfsdfdfsfsdfdfsfsdfdfsfsdf', '', '56565656', '6666', '2020-11-27 23:38:44'),
('88888889', 'qqqqqqq', 'dfsfsdfdfsfsdf', '', '5656', '66', '2020-11-27 23:48:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remisiones`
--

CREATE TABLE `remisiones` (
  `Id_remision` int(11) NOT NULL,
  `Fecha_remision` datetime NOT NULL,
  `Id_cliente` varchar(20) NOT NULL,
  `Id_empleado` bigint(11) NOT NULL,
  `Estado_remision` varchar(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(18, 'Admin', 'admin', '2020-11-28 01:50:23', '2020-11-28 01:50:23'),
(19, 'Ventas', 'ventas', '2020-11-28 01:50:41', '2020-11-28 01:50:41'),
(20, 'Produccion', 'produccion', '2020-11-28 01:51:02', '2020-11-28 01:51:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(18, 56),
(18, 57),
(18, 58),
(18, 59),
(18, 60),
(19, 61),
(20, 62),
(20, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(43, 'Admin', 'admin@gmail.com', NULL, '$2y$10$N7/CteVlPHUJW9LBxiqqgOkmWPpnVDmCSrEmlb8ax12pk9f6GxeQm', NULL, '2020-11-28 01:51:31', '2020-12-03 01:24:27'),
(44, 'Ventas', 'ventas@gmail.com', NULL, '$2y$10$XRjjWE8Puyz7eku6SMjBHu61Tbdw6OZhoxXTHCqJuGECSyDjoJFjO', NULL, '2020-11-28 01:53:16', '2020-12-03 01:24:45'),
(45, 'Produccion', 'produccion@gmail.com', NULL, '$2y$10$U4VliQTPE8ZfyvS6kBstjehOcP5ICXPtT.yfGRHP7PlVlFqlDh5wq', NULL, '2020-11-28 01:53:42', '2020-12-03 01:25:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`) VALUES
(43, 56),
(43, 57),
(43, 58),
(43, 59),
(43, 60),
(44, 61),
(45, 62),
(45, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(43, 18),
(44, 19),
(45, 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `certificados_produccion`
--
ALTER TABLE `certificados_produccion`
  ADD PRIMARY KEY (`Id_certificado`),
  ADD KEY `Id_produccion` (`Id_produccion`),
  ADD KEY `Id_empleado` (`Id_empleado`);

--
-- Indices de la tabla `certificado_envase`
--
ALTER TABLE `certificado_envase`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_producto` (`Id_producto`),
  ADD KEY `Id_certificado` (`Id_certificado`),
  ADD KEY `Id_envase_ibfk_3` (`Id_envase`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id_empleado`);

--
-- Indices de la tabla `envases`
--
ALTER TABLE `envases`
  ADD PRIMARY KEY (`Id_envase`),
  ADD KEY `Id_proveedor` (`Id_proveedor`),
  ADD KEY `Id_propietario` (`Id_propietario`);

--
-- Indices de la tabla `envase_remision`
--
ALTER TABLE `envase_remision`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_envase` (`Id_envase`),
  ADD KEY `Id_remision` (`Id_remision`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`Id_kardex`),
  ADD KEY `Id_envase2` (`Id_envase`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_produccion`
--
ALTER TABLE `orden_produccion`
  ADD PRIMARY KEY (`Id_produccion`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`Id_propietario`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id_proveedor`);

--
-- Indices de la tabla `remisiones`
--
ALTER TABLE `remisiones`
  ADD PRIMARY KEY (`Id_remision`),
  ADD KEY `Id_empleado_idx` (`Id_empleado`),
  ADD KEY `Id_cliente_idx` (`Id_cliente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Indices de la tabla `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certificados_produccion`
--
ALTER TABLE `certificados_produccion`
  MODIFY `Id_certificado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `certificado_envase`
--
ALTER TABLE `certificado_envase`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envase_remision`
--
ALTER TABLE `envase_remision`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `Id_kardex` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `certificados_produccion`
--
ALTER TABLE `certificados_produccion`
  ADD CONSTRAINT `Id_empleado` FOREIGN KEY (`Id_empleado`) REFERENCES `empleados` (`Id_empleado`),
  ADD CONSTRAINT `Id_produccion_fk` FOREIGN KEY (`Id_produccion`) REFERENCES `orden_produccion` (`Id_produccion`);

--
-- Filtros para la tabla `certificado_envase`
--
ALTER TABLE `certificado_envase`
  ADD CONSTRAINT `Id_envase_ibfk_3` FOREIGN KEY (`Id_envase`) REFERENCES `envases` (`Id_envase`),
  ADD CONSTRAINT `Id_producto` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`Id_producto`),
  ADD CONSTRAINT `id_certificado` FOREIGN KEY (`Id_certificado`) REFERENCES `certificados_produccion` (`Id_certificado`);

--
-- Filtros para la tabla `envases`
--
ALTER TABLE `envases`
  ADD CONSTRAINT `Id_propietario` FOREIGN KEY (`Id_propietario`) REFERENCES `propietarios` (`Id_propietario`),
  ADD CONSTRAINT `id_proveedor` FOREIGN KEY (`Id_proveedor`) REFERENCES `proveedores` (`Id_proveedor`);

--
-- Filtros para la tabla `envase_remision`
--
ALTER TABLE `envase_remision`
  ADD CONSTRAINT `Id_envase` FOREIGN KEY (`Id_envase`) REFERENCES `envases` (`Id_envase`),
  ADD CONSTRAINT `Id_remision` FOREIGN KEY (`Id_remision`) REFERENCES `remisiones` (`Id_remision`);

--
-- Filtros para la tabla `remisiones`
--
ALTER TABLE `remisiones`
  ADD CONSTRAINT `Id_cliente_idx` FOREIGN KEY (`Id_cliente`) REFERENCES `clientes` (`Id_cliente`),
  ADD CONSTRAINT `Id_empleado_idx` FOREIGN KEY (`Id_empleado`) REFERENCES `empleados` (`Id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
