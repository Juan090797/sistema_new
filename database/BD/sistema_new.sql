-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2020 a las 23:30:10
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_new`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre_area`, `estado_area`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Sistemas', 'Activo', '2020-08-05 23:16:06', '2020-08-05 23:16:06', 1, 1),
(2, 'Contabilidad', 'Activo', '2020-08-27 16:01:33', '2020-08-27 16:10:46', 1, 1),
(3, 'Recursos Humanos', 'Activo', '2020-08-27 16:07:03', '2020-08-27 16:07:03', 1, 1),
(4, 'Administracion', 'Activo', '2020-08-27 16:07:10', '2020-08-27 16:07:10', 1, 1),
(5, 'VPM', 'Activo', '2020-08-27 16:07:10', '2020-08-27 16:10:57', 1, 1),
(6, 'Gerencia', 'Activo', '2020-08-27 16:11:08', '2020-08-27 16:11:08', 1, 1),
(7, 'Finanzas', 'Activo', '2020-08-27 16:11:20', '2020-08-27 16:11:20', 1, 1),
(8, 'Ventas', 'Activo', '2020-08-27 16:37:22', '2020-08-27 21:29:35', 1, 1),
(9, 'Caja', 'Activo', '2020-08-27 21:29:50', '2020-08-27 21:29:50', 1, 1),
(10, 'SST', 'Activo', '2020-09-07 21:22:07', '2020-09-08 14:58:14', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_tk`
--

CREATE TABLE `categorias_tk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias_tk`
--

INSERT INTO `categorias_tk` (`id`, `nombre_cat`, `estado_cat`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Software', 'Activo', '2020-08-11 22:59:34', '2020-08-13 19:57:01', 1, 1),
(2, 'Hardware', 'Activo', '2020-08-12 00:05:19', '2020-08-14 18:24:15', 1, 1),
(3, 'Network', 'Activo', '2020-08-11 19:07:11', '2020-08-11 19:07:11', 1, 1),
(4, 'Others', 'Activo', '2020-08-13 16:24:10', '2020-08-13 21:36:57', 1, 1),
(6, 'Sistema Afectado', 'Activo', '2020-09-11 20:08:03', '2020-09-11 20:08:03', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_tk`
--

CREATE TABLE `comentarios_tk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios_tk`
--

INSERT INTO `comentarios_tk` (`id`, `descripcion`, `created_at`, `updated_at`, `ticket_id`, `user_id`, `created_by`, `updated_by`) VALUES
(1, 'Primer comentario', '2020-08-31 18:54:06', '2020-08-31 18:54:06', 5, 1, 1, 1),
(2, 'segundo comentario', '2020-08-31 18:56:09', '2020-08-31 18:56:09', 5, 1, 1, 1),
(3, 'tercer comentario', '2020-08-31 18:56:17', '2020-08-31 18:56:17', 5, 1, 1, 1),
(4, '4to comentario', '2020-08-31 19:26:36', '2020-08-31 19:26:36', 5, 1, 1, 1),
(5, '5to comentario', '2020-08-31 19:36:00', '2020-08-31 19:36:00', 5, 1, 1, 1),
(6, 'Se procedio con la configuracion de carpeta compartida', '2020-08-31 19:57:37', '2020-08-31 19:57:37', 4, 1, 1, 1),
(7, 'Se procedio a cambiar el teclado.', '2020-08-31 19:59:07', '2020-08-31 19:59:07', 5, 2, 2, 2),
(8, 'Gracias por el apoyo', '2020-09-01 20:30:50', '2020-09-01 20:30:50', 5, 1, 1, 1),
(9, 'primer comentario', '2020-09-03 21:57:33', '2020-09-03 21:57:33', 1, 1, 1, 1),
(10, 'segundo comen tarioadad', '2020-09-03 21:57:43', '2020-09-03 21:57:43', 1, 1, 1, 1),
(11, 'comentario', '2020-09-04 18:37:17', '2020-09-04 18:37:17', 5, 1, 1, 1),
(12, '1er comentario', '2020-09-05 17:25:45', '2020-09-05 17:25:45', 69, 1, 1, 1),
(13, '2do comentario', '2020-09-05 17:25:58', '2020-09-05 17:25:58', 69, 1, 1, 1),
(14, 'primer comentario', '2020-09-11 20:14:14', '2020-09-11 20:14:14', 76, 1, 1, 1),
(15, 'primer comentario', '2020-09-11 20:14:20', '2020-09-11 20:14:20', 76, 1, 1, 1),
(16, 'se solicito unos audífonos al proveedor', '2020-09-14 21:22:46', '2020-09-14 21:22:46', 80, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_empr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_empr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre_empr`, `estado_empr`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Repuestos Freddy', 'Activo', '2020-08-05 23:16:18', '2020-09-08 17:41:00', 1, 1),
(2, 'GC Importadores', 'Activo', '2020-08-27 16:39:26', '2020-08-27 16:39:26', 1, 1),
(3, 'Inrecasa', 'Activo', '2020-08-27 16:40:03', '2020-08-27 16:40:03', 1, 1),
(8, 'INDRA', 'Activo', '2020-09-08 15:23:55', '2020-09-08 15:32:53', 1, 1);

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
(1, '2012_08_05_172109_create_areas_table', 1),
(2, '2013_08_05_165654_create_empresas_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_08_05_165728_create_tipos_tk_table', 1),
(7, '2020_08_05_165748_create_categorias_tk_table', 1),
(8, '2020_08_05_165827_create_prioridades_tk_table', 1),
(9, '2020_08_05_165906_create_tickets_table', 1),
(10, '2020_08_05_165928_create_comentarios_tk_table', 1);

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
-- Estructura de tabla para la tabla `prioridades_tk`
--

CREATE TABLE `prioridades_tk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_pri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_pri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prioridades_tk`
--

INSERT INTO `prioridades_tk` (`id`, `nombre_pri`, `estado_pri`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Alta', 'Activo', '2020-08-14 15:41:51', '2020-08-24 21:03:40', 1, 1),
(2, 'Media', 'Activo', '2020-08-14 15:42:23', '2020-08-14 18:18:44', 1, 1),
(3, 'Baja', 'Activo', '2020-08-14 15:42:31', '2020-08-14 15:42:31', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo_tk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_tk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_tk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `prioridad_id` bigint(20) UNSIGNED NOT NULL,
  `requester_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `titulo_tk`, `descripcion_tk`, `estado_tk`, `created_at`, `updated_at`, `tipo_id`, `categoria_id`, `prioridad_id`, `requester_user_id`, `created_by`, `updated_by`) VALUES
(1, 'problema con mi pc', 'no prende la luz', 'Nuevo', '2020-08-28 17:32:28', '2020-09-14 21:15:07', 1, 2, 1, 1, 1, 1),
(2, 'no tengo internet', 'no puedo entrar al sistema flex', 'En espera', '2020-08-28 17:54:21', '2020-08-28 17:54:21', 1, 1, 1, 2, 2, 2),
(3, 'excel fallando', 'mi equipo esta muy lento', 'Resuelto', '2020-08-28 19:13:19', '2020-08-28 19:13:19', 1, 1, 1, 2, 2, 2),
(4, 'crear un carpeta compartida', 'para los usuarios de contabilidad', 'Abierto', '2020-08-28 20:50:56', '2020-08-28 20:50:56', 2, 3, 1, 1, 1, 1),
(5, 'Teclado malogrado', 'teclado no funciona los números', 'Resuelto', '2020-08-31 17:07:27', '2020-08-31 17:07:27', 1, 2, 1, 1, 1, 1),
(6, 'problema con mi pc', 'apapspasp', 'Nuevo', '2020-09-03 16:05:35', '2020-09-03 16:05:35', 1, 1, 1, 1, 1, 1),
(7, 'problema con mi pc', 'apapspasp', 'Nuevo', '2020-09-03 16:44:17', '2020-09-03 16:44:17', 1, 1, 1, 1, 1, 1),
(8, 'adadada', 'adadadada', 'Nuevo', '2020-09-03 16:44:35', '2020-09-03 16:44:35', 1, 1, 2, 1, 1, 1),
(9, 'fallas en celular', 'no deja tomar fotos.', 'Nuevo', '2020-09-03 19:49:43', '2020-09-03 19:49:43', 1, 2, 1, 1, 1, 1),
(10, 'fallas en celular', 'no deja tomar fotos.', 'Nuevo', '2020-09-03 19:58:10', '2020-09-03 19:58:10', 1, 2, 1, 1, 1, 1),
(11, 'fallas en celular', 'no deja tomar fotos.', 'Nuevo', '2020-09-03 20:02:46', '2020-09-03 20:02:46', 1, 2, 1, 1, 1, 1),
(12, 'aaaaa', 'aaaaa', 'Nuevo', '2020-09-03 20:02:58', '2020-09-03 20:02:58', 1, 1, 1, 1, 1, 1),
(13, 'wwwwww', 'wwwww', 'Nuevo', '2020-09-03 20:11:44', '2020-09-03 20:11:44', 1, 1, 1, 1, 1, 1),
(14, 'ssssssssssss', 'sssssssssssss', 'Nuevo', '2020-09-03 20:19:45', '2020-09-03 20:19:45', 1, 1, 1, 1, 1, 1),
(15, 'qqqqqqq', 'qqqqqqqqq', 'Nuevo', '2020-09-03 20:28:03', '2020-09-03 20:28:03', 2, 1, 1, 1, 1, 1),
(16, 'eeeeeeeeeee', 'eeeeeeeeeee', 'Nuevo', '2020-09-03 21:10:30', '2020-09-03 21:10:30', 1, 1, 1, 1, 1, 1),
(17, 'eeeeeeeeeee', 'eeeeeeeeeee', 'Nuevo', '2020-09-03 21:13:48', '2020-09-03 21:13:48', 1, 1, 1, 1, 1, 1),
(18, 'eeeeeeeeeee', 'eeeeeeeeeee', 'Nuevo', '2020-09-03 21:14:04', '2020-09-03 21:14:04', 1, 1, 1, 1, 1, 1),
(19, 'tttt', 'ttttt', 'Nuevo', '2020-09-03 21:14:35', '2020-09-03 21:14:35', 1, 1, 1, 1, 1, 1),
(20, 'rrrr', 'rrrr', 'Nuevo', '2020-09-03 21:19:20', '2020-09-03 21:19:20', 2, 1, 2, 1, 1, 1),
(21, 'rrrr', 'rrrr', 'Nuevo', '2020-09-03 21:19:36', '2020-09-03 21:19:36', 2, 1, 2, 1, 1, 1),
(22, 'Problema con mi excel', 'rrrr', 'Nuevo', '2020-09-03 21:20:16', '2020-09-03 21:20:16', 2, 1, 2, 1, 1, 1),
(23, 'Problema con el sistema Flex', 'hhhh', 'Nuevo', '2020-09-03 21:21:02', '2020-09-03 21:21:02', 1, 2, 2, 1, 1, 1),
(24, 'Problema de CPU', 'hhhh', 'Nuevo', '2020-09-03 21:22:20', '2020-09-03 21:22:20', 1, 2, 2, 1, 1, 1),
(25, 'Problemas de equipo', 'hhhh', 'Nuevo', '2020-09-03 21:22:59', '2020-09-03 21:22:59', 1, 2, 2, 1, 1, 1),
(26, 'hhhhh', 'hhhh', 'Nuevo', '2020-09-03 21:23:10', '2020-09-03 21:23:10', 1, 2, 2, 1, 1, 1),
(27, 'hhhhh', 'hhhh', 'Nuevo', '2020-09-03 21:23:21', '2020-09-03 21:23:21', 1, 2, 2, 1, 1, 1),
(28, 'hhhhh', 'hhhh', 'Nuevo', '2020-09-03 21:24:31', '2020-09-03 21:24:31', 1, 2, 2, 1, 1, 1),
(29, 'hhhhh', 'hhhh', 'Nuevo', '2020-09-03 21:24:41', '2020-09-03 21:24:41', 1, 2, 2, 1, 1, 1),
(30, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:31:49', '2020-09-03 21:31:49', 2, 1, 2, 1, 1, 1),
(31, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:38:45', '2020-09-03 21:38:45', 2, 1, 2, 1, 1, 1),
(32, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:38:57', '2020-09-03 21:38:57', 2, 1, 2, 1, 1, 1),
(33, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:39:06', '2020-09-03 21:39:06', 2, 1, 2, 1, 1, 1),
(34, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:41:28', '2020-09-03 21:41:28', 2, 1, 2, 1, 1, 1),
(35, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:41:36', '2020-09-03 21:41:36', 2, 1, 2, 1, 1, 1),
(36, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:41:53', '2020-09-03 21:41:53', 2, 1, 2, 1, 1, 1),
(37, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:44:49', '2020-09-03 21:44:49', 2, 1, 2, 1, 1, 1),
(38, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:45:00', '2020-09-03 21:45:00', 2, 1, 2, 1, 1, 1),
(39, 'rrrrr', 'rrrrrr', 'Nuevo', '2020-09-03 21:45:14', '2020-09-03 21:45:14', 2, 1, 2, 1, 1, 1),
(40, 'Problema con el sistema', 'ffff', 'Nuevo', '2020-09-03 21:46:24', '2020-09-03 21:46:24', 1, 1, 1, 1, 1, 1),
(41, 'crear un carpeta compartida', 'ffff', 'Nuevo', '2020-09-03 21:47:19', '2020-09-03 21:47:19', 1, 1, 1, 1, 1, 1),
(42, 'ggggg', 'gggg', 'Nuevo', '2020-09-03 21:48:53', '2020-09-03 21:48:53', 1, 1, 1, 1, 1, 1),
(43, 'problema con el icono de entrada', 'no funciona nada', 'Nuevo', '2020-09-03 21:54:23', '2020-09-03 21:54:23', 1, 1, 1, 1, 1, 1),
(44, 'qqqqqq', 'qqqqqqqqqq', 'Nuevo', '2020-09-03 21:56:29', '2020-09-03 21:56:29', 1, 2, 1, 1, 1, 1),
(45, 'asignar equipo', 'al nuevo vendedor', 'Nuevo', '2020-09-04 14:26:45', '2020-09-04 14:26:45', 2, 1, 2, 1, 1, 1),
(46, 'crear un carpeta compartida', 'adadadada', 'Nuevo', '2020-09-04 14:28:21', '2020-09-04 14:28:21', 2, 1, 1, 1, 1, 1),
(47, '77777777', '77777789', 'Nuevo', '2020-09-04 14:33:46', '2020-09-04 14:33:46', 2, 1, 1, 1, 1, 1),
(48, '66666', '66666', 'Nuevo', '2020-09-04 14:38:28', '2020-09-04 14:38:28', 2, 1, 1, 1, 1, 1),
(49, '66666', '66666', 'Nuevo', '2020-09-04 14:43:13', '2020-09-04 14:43:13', 2, 1, 1, 1, 1, 1),
(50, '11111', '11111', 'Nuevo', '2020-09-04 14:43:54', '2020-09-04 14:43:54', 1, 1, 1, 1, 1, 1),
(51, '11111', '11111', 'Nuevo', '2020-09-04 14:44:14', '2020-09-04 14:44:14', 1, 1, 1, 1, 1, 1),
(52, '22222', '22222', 'Nuevo', '2020-09-04 14:54:35', '2020-09-04 14:54:35', 1, 1, 1, 1, 1, 1),
(53, '333333', '33333333', 'Nuevo', '2020-09-04 16:46:40', '2020-09-04 16:46:40', 1, 1, 2, 1, 1, 1),
(54, '444', '4444', 'Nuevo', '2020-09-04 16:47:03', '2020-09-04 16:47:03', 2, 1, 1, 1, 1, 1),
(55, 'mi correo no funciona', 'no abre mi correo', 'Nuevo', '2020-09-04 16:51:30', '2020-09-04 16:51:30', 1, 1, 1, 1, 1, 1),
(56, 'sistema flex no funciona', 'no deja sacar reportes', 'Nuevo', '2020-09-04 17:10:03', '2020-09-04 17:10:03', 1, 1, 1, 1, 1, 1),
(57, '79999', '9999', 'Nuevo', '2020-09-04 17:26:22', '2020-09-04 17:26:22', 1, 1, 1, 1, 1, 1),
(58, 'gggggg', 'ggggg', 'Nuevo', '2020-09-04 17:27:49', '2020-09-04 17:27:49', 1, 1, 1, 1, 1, 1),
(59, 'zzzzz', 'sssss', 'Nuevo', '2020-09-04 17:48:50', '2020-09-04 17:48:50', 1, 1, 1, 1, 1, 1),
(60, 'zzzzz', 'sssss', 'Nuevo', '2020-09-04 17:50:05', '2020-09-04 17:50:05', 1, 1, 1, 1, 1, 1),
(61, 'problemas con mi pc', 'lentitud en el equipo', 'Nuevo', '2020-09-04 17:58:38', '2020-09-04 17:58:38', 1, 1, 1, 1, 1, 1),
(62, 'crear un carpeta compartida', 'para los usuario A, B Y C', 'Nuevo', '2020-09-04 18:04:00', '2020-09-04 18:04:00', 2, 3, 1, 1, 1, 1),
(63, 'crear un carpeta compartida', 'para los usuario A, B Y C', 'Nuevo', '2020-09-04 18:04:38', '2020-09-04 18:04:38', 2, 3, 1, 1, 1, 1),
(64, 'excel fallando', 'no funciona nada el excel se para colgando', 'Nuevo', '2020-09-04 18:09:17', '2020-09-04 18:09:17', 1, 1, 1, 1, 1, 1),
(65, 'Equipo no enciende', 'rrrr', 'Nuevo', '2020-09-04 18:59:06', '2020-09-04 18:59:06', 2, 1, 1, 1, 1, 1),
(66, 'Equipo malogrado', 'ffff', 'Nuevo', '2020-09-04 18:59:43', '2020-09-04 18:59:43', 3, 1, 1, 1, 1, 1),
(67, 'soporte al flex', 'necesito ayuda', 'Nuevo', '2020-09-04 19:40:06', '2020-09-04 19:40:06', 2, 1, 1, 4, 4, 4),
(68, 'adquisicion de nuevo equipo', 'Necesito audífonos modelo call para las reuniones vía zoom.', 'Nuevo', '2020-09-04 21:12:56', '2020-09-04 21:12:56', 2, 2, 1, 3, 3, 3),
(69, 'crear un carpeta compartida', 'Para los usuarios de sistemas', 'Nuevo', '2020-09-04 21:39:34', '2020-09-04 21:39:34', 2, 3, 1, 1, 1, 1),
(70, 'Problemas de equipos', 'El equipo no funciona, equipo malogrado.', 'Nuevo', '2020-09-07 16:14:12', '2020-09-07 16:14:12', 1, 1, 1, 1, 1, 1),
(71, 'cambio de contraseña flex', 'password', 'Nuevo', '2020-09-07 19:28:53', '2020-09-07 19:28:53', 1, 2, 1, 1, 1, 1),
(72, 'cambio de pc', 'se solicitado cambio de pc para el usuario pajuelo', 'Nuevo', '2020-09-07 20:14:11', '2020-09-07 20:14:11', 1, 1, 1, 1, 1, 1),
(73, 'Equipo malogrado', 'ticket 100', 'Nuevo', '2020-09-07 20:21:45', '2020-09-07 20:21:45', 1, 1, 1, 1, 1, 1),
(74, 'problema de mi pc', 'equipo malogrado', 'Nuevo', '2020-09-11 16:52:41', '2020-09-11 16:52:41', 1, 1, 1, 1, 1, 1),
(75, 'problema con mi pc 2', 'equipo fallando', 'Nuevo', '2020-09-11 16:56:16', '2020-09-11 16:56:16', 1, 1, 2, 1, 1, 1),
(76, 'problemas en el sistema flex', 'problemas con el modulo de ventas', 'Nuevo', '2020-09-11 20:11:37', '2020-09-11 20:11:37', 1, 1, 1, 4, 4, 4),
(77, 'equipo nuevo', 'nesecito un equipo nuevo para poder realizar los trabajos remoto.', 'Nuevo', '2020-09-11 21:20:00', '2020-09-11 21:20:00', 2, 2, 1, 4, 4, 4),
(78, 'excel fallando 159', 'excel fallando 159', 'Nuevo', '2020-09-11 21:41:15', '2020-09-11 21:41:15', 2, 1, 1, 4, 4, 4),
(79, 'excel fallando 9887', 'excel fallando 9887', 'Nuevo', '2020-09-11 21:43:15', '2020-09-11 21:43:15', 1, 2, 1, 4, 4, 4),
(80, 'Necesito unos audifonos callcenter', 'para hoy', 'Nuevo', '2020-09-14 21:19:25', '2020-09-14 21:19:25', 1, 1, 2, 5, 5, 5),
(81, 'cambio de mouse', 'cambio de mouse', 'Nuevo', '2020-09-14 21:23:53', '2020-09-14 21:23:53', 2, 2, 1, 5, 5, 5),
(82, 'se necesita apoyo', 'no prende mi pc', 'Nuevo', '2020-09-14 21:44:12', '2020-09-14 21:44:38', 1, 2, 2, 5, 1, 1),
(83, 'no prende pc', 'no funciona nada', 'Nuevo', '2020-09-14 21:46:50', '2020-09-14 21:46:50', 1, 1, 1, 5, 5, 5),
(84, 'crear un carpeta compartidaaa', 'dddd', 'Nuevo', '2020-09-14 21:48:25', '2020-09-14 21:48:25', 1, 1, 1, 5, 5, 5),
(85, 'adadawww', 'wwwwww', 'Nuevo', '2020-09-14 21:51:45', '2020-09-14 21:51:45', 2, 2, 1, 5, 5, 5),
(86, 'qqqeqeqeqe', 'qeqeqeqe', 'Nuevo', '2020-09-14 21:55:48', '2020-09-14 21:55:48', 2, 1, 1, 1, 1, 1),
(87, 'qqeqwadadada', 'adadadada', 'Nuevo', '2020-09-14 21:56:58', '2020-09-14 21:56:58', 2, 1, 1, 1, 1, 1),
(88, 'el equipo esta fallando', 'se necesita su apoyo por favor!!!', 'Nuevo', '2020-09-15 18:52:42', '2020-09-15 18:52:42', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_tk`
--

CREATE TABLE `tipos_tk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_tip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_tip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_tk`
--

INSERT INTO `tipos_tk` (`id`, `nombre_tip`, `estado_tip`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Incidente', 'Activo', '2020-08-14 15:41:51', '2020-08-27 14:31:23', 1, 1),
(2, 'Requerimiento', 'Activo', '2020-08-27 14:24:56', '2020-08-27 14:24:56', 1, 1),
(3, 'Consulta', 'Activo', '2020-08-27 14:25:38', '2020-08-27 14:25:38', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image_path` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_profile.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empresa_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `email_verified_at`, `image_path`, `password`, `remember_token`, `created_at`, `updated_at`, `empresa_id`, `area_id`, `created_by`, `updated_by`) VALUES
(1, 'Juan Antonio', 'Marquina Ventura', 'juan.marquina@repuestosfreddy.com', 'jmarquinav', NULL, '1.jpg', '$2y$10$gHdqYr0VjACaepX2vbt7u.xQKKWyksQNX3M/WZS4Ge/7f8oNF6Zyu', NULL, '2020-08-05 23:16:28', '2020-09-04 14:23:33', 1, 1, 1, 1),
(2, 'Israel Rolando', 'Castro Saavedra', 'israel.castro@outlook.com', 'icastros', NULL, '2.png', '$2y$10$A6CFRGBOYGo/EhYJCbTQEOjZdZjJUirov8e5WVhfxQV2O3KeGRf3O', NULL, '2020-08-06 02:35:07', '2020-08-27 16:06:32', 1, 1, 1, 1),
(3, 'Estefania de los Angeles', 'Castillo Beltran', 'jefe.administrativo@repuestosfreddy.com', 'estefania.castillo', NULL, '3.png', '$2y$10$FAcECZIY5ohSEswsavdZ9uhPEm1MOZiiXVyzdD1RyYAByZl4GFeUe', NULL, '2020-09-04 19:00:58', '2020-09-04 19:04:57', 1, 4, 1, 1),
(4, 'Edwin', 'Armas Taipe', 'edwin.armas@repuestosfreddy.com', 'earmast', NULL, '4.png', '$2y$10$wR2RV/CjA5rkcVTdV1BASegydXe7fH7whIUIcoURK2Fmad1LVd1L6', NULL, '2020-09-04 19:39:15', '2020-09-04 19:39:30', 1, 1, 3, 3),
(5, 'Karen', 'Noriega', 'karen.noriega@gcimportadores.com.pe', 'karen.noriega', NULL, 'default_profile.png', '$2y$10$A4/xmBBYP6L1TOx4RyaS5utaXy1TdZVsqjrv6Y2Ss23gMHdbO.pVu', NULL, '2020-09-08 14:32:06', '2020-09-08 14:32:06', 1, 3, 1, 1),
(6, 'Betzy', 'Kaseng', 'betzy.kaseng@repuestosfreddy.com', 'betzy.kaseng', NULL, 'default_profile.png', '$2y$10$NjwKn.CSOnwVLYPd5kGkf.9QqWemSRdwISzoeLSKipYiAfSBpK.fG', NULL, '2020-09-08 14:36:15', '2020-09-08 14:36:15', 1, 10, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_tk`
--
ALTER TABLE `categorias_tk`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios_tk`
--
ALTER TABLE `comentarios_tk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_tk_ticket_id_foreign` (`ticket_id`),
  ADD KEY `comentarios_tk_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `prioridades_tk`
--
ALTER TABLE `prioridades_tk`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_tipo_id_foreign` (`tipo_id`),
  ADD KEY `tickets_categoria_id_foreign` (`categoria_id`),
  ADD KEY `tickets_prioridad_id_foreign` (`prioridad_id`),
  ADD KEY `tickets_requester_user_id_foreign` (`requester_user_id`);

--
-- Indices de la tabla `tipos_tk`
--
ALTER TABLE `tipos_tk`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_empresa_id_foreign` (`empresa_id`),
  ADD KEY `users_area_id_foreign` (`area_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categorias_tk`
--
ALTER TABLE `categorias_tk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comentarios_tk`
--
ALTER TABLE `comentarios_tk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `prioridades_tk`
--
ALTER TABLE `prioridades_tk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `tipos_tk`
--
ALTER TABLE `tipos_tk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios_tk`
--
ALTER TABLE `comentarios_tk`
  ADD CONSTRAINT `comentarios_tk_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_tk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_tk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_prioridad_id_foreign` FOREIGN KEY (`prioridad_id`) REFERENCES `prioridades_tk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_requester_user_id_foreign` FOREIGN KEY (`requester_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos_tk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
