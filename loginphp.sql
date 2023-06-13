

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: `loginphp`
-- --------------------------------------------------------
-- Estructura de tabla para la tabla `log`
CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `navegador` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `sistema_operativo` varchar(200) NOT NULL,
  `intentos` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Volcado de datos para la tabla `log`
INSERT INTO `log` (`id`, `usuario`, `ip`, `navegador`, `fecha`, `sistema_operativo`, `intentos`) VALUES
(1, '18730156', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', '2023-05-18 23:29:10', 'Windows 10', '0'),
(2, '18730156', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', '2023-05-18 23:46:27', 'Windows 10', 'exitoso'),
(3, 'ESAU123', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', '2023-05-18 23:56:55', 'Windows 10', 'fallido');
-- --------------------------------------------------------
-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `privilegio` int(2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- Volcado de datos para la tabla `usuarios`
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `password`, `privilegio`, `fecha_registro`) VALUES
(1, 'Oscar Aleman', 'furroman', 'oscar_furro@gmail.com', 'furroman1', 1, '2023-06-01 02:42:33'),
(2, 'jesus', 'banner', 'jesus@pinotepa.mx', 'banner1', 2, '2023-06-03 02:51:06'),
(3, 'Uliesser', 'uliesser', 'jesus@pinotepa.mx', 'uliesser1', 1, '2023-06-07 07:00:44');
-- Índices para tablas volcadas
--
-- Indices de la tabla `log`
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);
-- Indices de la tabla `usuarios`
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
-- AUTO_INCREMENT de las tablas volcadas
--
-- AUTO_INCREMENT de la tabla `log`
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
-- AUTO_INCREMENT de la tabla `usuarios`
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
