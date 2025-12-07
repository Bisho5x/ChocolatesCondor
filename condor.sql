-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2025 a las 04:09:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `condor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`, `created_at`) VALUES
(1, 'Sucursales', NULL, '2024-10-29 02:33:39'),
(2, 'Productos', NULL, '2024-10-29 02:33:39'),
(3, 'Servicios', NULL, '2024-10-29 02:33:39'),
(4, 'Contactanos', NULL, '2024-10-29 02:33:39'),
(5, 'Nosotros', NULL, '2024-10-29 02:33:39'),
(9, 'Productos Carrusel', NULL, '2025-12-06 18:34:53'),
(10, 'Productos Desctacados', NULL, '2025-12-06 19:41:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `image_path`, `author_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'nueva publicacion1', 'algo de contenido22', 'uploads/japan-9074037_640.jpg', NULL, NULL, 'draft', '2024-11-05 03:37:24', '2024-11-05 05:37:34'),
(4, 'Sucursal Genaro San Jines', 'Primer Sucursal', 'uploads/1.jpg', NULL, 1, 'draft', '2025-11-24 21:08:38', '2025-12-07 02:25:23'),
(5, 'Sucursal Isaac Tamayo', 'Segunda Sucursal', 'uploads/2.jpg', NULL, 1, 'draft', '2025-11-24 21:09:02', '2025-12-07 02:26:04'),
(6, 'Sucursal Obrajes', 'Tercera Sucursal', 'uploads/3.jpg', NULL, 1, 'draft', '2025-11-24 21:09:19', '2025-12-07 02:26:24'),
(7, 'Sucursal Los Pinos', 'Cuarta Sucursal', 'uploads/4.jpg', NULL, 1, 'draft', '2025-11-24 21:09:36', '2025-12-07 02:26:39'),
(8, 'Cigarrillos de Chocolate con Leche', 'Precio a 17 Bs. Uni', 'uploads/1a.jpg', NULL, 2, 'draft', '2025-11-25 00:22:59', '2025-11-25 00:41:14'),
(9, 'Arroz', 'Precio a 15 Bs. Uni', 'uploads/2a.jpg', NULL, 2, 'draft', '2025-11-25 00:42:02', '2025-11-25 00:42:02'),
(10, 'Rosas', 'Precio a 17 Bs. Uni', 'uploads/3a.jpg', NULL, 2, 'draft', '2025-11-25 00:42:57', '2025-11-25 00:42:57'),
(11, 'Risoffiato Instantaneo Almendra,Risoffiato Instantaneo Almendra Cacao y Tableta Doble', 'Precio a 17 Bs. Uni', 'uploads/4a.jpg', NULL, 2, 'draft', '2025-11-25 00:45:53', '2025-11-25 00:45:53'),
(12, 'Mani', 'Precio a 17 Bs. Uni', 'uploads/5.jpg', NULL, 2, 'draft', '2025-11-25 00:48:32', '2025-11-25 00:48:32'),
(13, 'Oso Teddy', 'Precio 31 Bs. Uni', 'uploads/6.jpg', NULL, 2, 'draft', '2025-11-25 00:57:23', '2025-11-25 00:57:23'),
(14, 'Beso de Negro', 'Precio a 1 Bs. Uni', 'uploads/7.jpg', NULL, 2, 'draft', '2025-11-25 01:00:17', '2025-11-25 01:00:42'),
(15, 'Nacimiento de 11 piezas', 'Precio a 92 Bs. Uni', 'uploads/9.jpg', NULL, 2, 'draft', '2025-11-25 01:03:29', '2025-11-25 01:03:29'),
(16, 'Grajeas de Naranja', 'Precio a 17 Bs. Uni', 'uploads/10.jpg', NULL, 2, 'draft', '2025-11-25 01:04:07', '2025-11-25 01:04:07'),
(19, 'Chokoa', 'Exquisitos malvaviscos que se derriten en tu paladar. 40.00 Bs', 'uploads/12.jpg', NULL, 9, 'draft', '2025-12-06 18:54:53', '2025-12-06 19:29:19'),
(20, 'Grajeas', 'Deliciosas grajeas de chocolate que se derriten de calidad y sabor. 17.00 Bs', 'uploads/11.jpg', NULL, 9, 'draft', '2025-12-06 19:08:41', '2025-12-06 19:28:39'),
(21, 'Botitas Cowboy', 'Deliciosas bolitas de chocolate con un sabor misterioso. 10.00 Bs', 'uploads/14.jpg', NULL, 9, 'draft', '2025-12-06 19:31:14', '2025-12-06 19:31:14'),
(22, 'Bombon Caja Cubo Licor', 'Un sabor único a cada sorbo. 61.00 Bs', 'uploads/16.jpg', NULL, 9, 'draft', '2025-12-06 19:32:02', '2025-12-06 19:32:02'),
(23, 'Risoffiato sin gluten', 'Delicias en sus formas más saludables. 43.00 Bs', 'uploads/18.jpg', NULL, 9, 'draft', '2025-12-06 19:33:26', '2025-12-06 19:33:26'),
(24, 'Micro Bombita Chocolate', 'Que cada parada sea una explosión de sabor. 20.00 Bs', 'uploads/20.jpg', NULL, 9, 'draft', '2025-12-06 19:34:02', '2025-12-06 19:34:02'),
(25, 'Cigarros de Chocolate', 'Deliciosos Cigarrillos de Chocolate Ñam Ñam 20.00 Bs', 'uploads/Cigarros.jpg', NULL, 9, 'draft', '2025-12-06 19:34:29', '2025-12-06 19:38:37'),
(26, 'Paneton Beso de Negro', 'Sorpresas deliciosas en cada bocado. 40.00 Bs', 'uploads/23.jpg', NULL, 9, 'draft', '2025-12-06 19:35:08', '2025-12-06 19:37:01'),
(27, 'Bolitas de Chocolate', 'Una mezcla de sabores unica 20.00 Bs', 'uploads/5.jpg', NULL, 10, 'draft', '2025-12-06 19:47:37', '2025-12-06 19:47:37'),
(28, 'Huevo Concha', 'Un gigante huevo esperandote 91.00 Bs', 'uploads/29.jpg', NULL, 10, 'draft', '2025-12-06 19:51:16', '2025-12-06 19:51:16'),
(29, 'Alfajor Beso de Negro', 'Un rico beso de negro te espera 06.50 Bs', 'uploads/27.jpg', NULL, 10, 'draft', '2025-12-06 19:52:29', '2025-12-06 19:52:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Viewer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(5, 'PabloMayta', 'azucar@gmail.com', '$2y$10$EKG2YsY2zaKaHhYvqzOYMerdCOT5MTjmhama2W9a4xCqY2JljPubu', 1, '2025-11-10 19:36:31', '2025-11-24 21:29:56'),
(8, 'KenyaSoto', 'kenya@gmail.com', '$2y$10$oA1lIEuKjvZfJgKNykMrBOBJfcs1xrNNTdgmF5E0vE96sK6871PXC', 1, '2025-12-07 00:27:10', '2025-12-07 00:27:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
