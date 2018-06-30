-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2018 a las 23:42:58
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e.a`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopciones`
--

CREATE TABLE `adopciones` (
  `idAdopcion` int(11) NOT NULL,
  `nombreAdopcion` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `imagenAdopcion` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `descripcionAdopcion` varchar(250) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `estatusAdopcion` int(11) DEFAULT NULL,
  `usuariosNormal_idUsuarioNormal` int(11) NOT NULL,
  `especies_idEspecie` int(11) NOT NULL,
  `generos_idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `adopciones`
--

INSERT INTO `adopciones` (`idAdopcion`, `nombreAdopcion`, `imagenAdopcion`, `descripcionAdopcion`, `estatusAdopcion`, `usuariosNormal_idUsuarioNormal`, `especies_idEspecie`, `generos_idGenero`) VALUES
(1, 'Cody', 'img/adopciones/cody.jpg', 'Juguetón, cariñoso y sociable con las personas y con otros perritos ', 1, 1, 1, 1),
(2, 'Manchas', 'img/adopciones/manchas.jpg', 'Juguetona, alegre, cariñosa con las personas y sociable con otros perritos.', 1, 1, 1, 2),
(3, 'Güero', 'img/wero.jpg', 'Este pequeño busca un hogar donde le den el amor que merece es muy cariñoso y noble', 1, 0, 1, 1),
(4, 'Frijolito', 'img/adopciones/frijol.jpg', 'Es un perrito muy juguetón y bastante cariñoso con las personas', 1, 0, 1, 1),
(5, 'Queen', 'img/adopciones/queen.jpg', 'Es una compañera noble y muy cariñosa.', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `idContacto` int(11) NOT NULL,
  `telefonoContacto` varchar(45) DEFAULT NULL,
  `emailContacto` varchar(45) DEFAULT NULL,
  `imagenContacto` varchar(250) DEFAULT NULL,
  `usuariosAdmin_idUsuarioAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`idContacto`, `telefonoContacto`, `emailContacto`, `imagenContacto`, `usuariosAdmin_idUsuarioAdmin`) VALUES
(1, '4171048555', 'esperanza@animal.gmail.com', 'img/team/img-2.jpg', 1),
(2, '4171151593', 'conejo@esperanza.com', 'img/team/img-1.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `idDonacion` int(11) NOT NULL,
  `fechaDonacion` date DEFAULT NULL,
  `usuariosNormal_idUsuarioNormal` int(11) DEFAULT NULL,
  `cantidadDonacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `idEspecie` int(11) NOT NULL,
  `nombreEspecie` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`idEspecie`, `nombreEspecie`) VALUES
(1, 'Perro'),
(2, 'Gato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idEventos` int(11) NOT NULL,
  `imagenEvento` varchar(250) NOT NULL,
  `nombreEvento` varchar(45) DEFAULT NULL,
  `lugarEvento` varchar(45) DEFAULT NULL,
  `fechaEvento` date DEFAULT NULL,
  `descripcionEvento` varchar(250) DEFAULT NULL,
  `usuariosAdmin_idUsuarioAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEventos`, `imagenEvento`, `nombreEvento`, `lugarEvento`, `fechaEvento`, `descripcionEvento`, `usuariosAdmin_idUsuarioAdmin`) VALUES
(1, 'img/eventos/e2.jpg', 'Día del niño', 'Jardín de Acámbaro', '2018-06-17', 'El evento próximo será con la finalidad de recaudar fondos para medicamentos y alimento de los peritos en resguardo ', 1),
(2, 'img/eventos/e4.jpg', 'Desfile de la primavera', 'Iglesia de la Soledad', '2018-06-22', 'Desfile en de animalitos en busca de hogar ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `idFormato` int(11) NOT NULL,
  `calleFor` varchar(50) NOT NULL,
  `coloniaFor` varchar(50) NOT NULL,
  `municipioFor` varchar(50) NOT NULL,
  `ciudadFor` varchar(50) NOT NULL,
  `adopciones_idAdopcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `idGenero` int(11) NOT NULL,
  `nombreGenero` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`idGenero`, `nombreGenero`) VALUES
(1, 'Macho'),
(2, 'Hembra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `idHistoria` int(11) NOT NULL,
  `nombreHistoria` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `descripcionHistoria` varchar(250) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `imagenInicio` varchar(250) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `imagenFin` varchar(250) COLLATE utf8_general_mysql500_ci NOT NULL,
  `usuariosAdmin_idUsuarioAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `historias`
--

INSERT INTO `historias` (`idHistoria`, `nombreHistoria`, `descripcionHistoria`, `imagenInicio`, `imagenFin`, `usuariosAdmin_idUsuarioAdmin`) VALUES
(1, 'Lucky', 'Este pequeño vivía debajo de un árbol y comiendo de las bolsas de basura, ahora es muy feliz en su hogar donde lo aman mucho', 'img/historias/img2.jpg', 'img/historias/img2.jpg', 1),
(2, 'Pelusa', 'Este hermoso gatito fue rescatado de las calles desde muy pequeño, ahora es feliz con su nueva familia. ', 'img/historias/img1.jpg', 'img/historias/img1.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `apellidosUsuario` varchar(70) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `telefonoUsuario` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `emailUsuario` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `contraseñaUsuario` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `apellidosUsuario`, `telefonoUsuario`, `emailUsuario`, `contraseñaUsuario`) VALUES
(1, 'Joiz', 'Guerrero Campos', '4171151593', 'joanna@gmail.com', 'joizpesch'),
(2, 'Juan', 'Vargas Conejo', '4171048588', 'conejo.jmv@gmail.com', 'juanfran'),
(3, 'Juan Manuel', 'Vargas Conejo', '1727079', 'conejo.@gmail.com', '4d186321c1a7f0f354b297e8914ab240'),
(4, 'Rogger', 'Herrejon', '4171101011', 'dokidoku@gmail.com', '931681a971adb816a5ee55a32e5e5e32'),
(5, 'Manuel', 'Velazquez', '41711001010', 'mane@gmail.com', '09610961ba9b9d19fdf34ce1d9bb0ea3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosadmin`
--

CREATE TABLE `usuariosadmin` (
  `idUsuarioAdmin` int(11) NOT NULL,
  `estatusUsuarioAdmin` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `usuarios_idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `usuariosadmin`
--

INSERT INTO `usuariosadmin` (`idUsuarioAdmin`, `estatusUsuarioAdmin`, `usuarios_idUsuario`) VALUES
(1, '1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosnormal`
--

CREATE TABLE `usuariosnormal` (
  `idUsuarioNormal` int(11) NOT NULL,
  `estatusUsuarioNormal` int(11) DEFAULT NULL,
  `usuarios_idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `usuariosnormal`
--

INSERT INTO `usuariosnormal` (`idUsuarioNormal`, `estatusUsuarioNormal`, `usuarios_idUsuario`) VALUES
(1, 3, 1),
(2, 3, 3),
(3, 3, 4),
(4, 3, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD PRIMARY KEY (`idAdopcion`),
  ADD KEY `usuariosNormal_idUsuarioNormal` (`usuariosNormal_idUsuarioNormal`),
  ADD KEY `especies_idEspecie` (`especies_idEspecie`),
  ADD KEY `generos_idGenero` (`generos_idGenero`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`idContacto`),
  ADD KEY `idUsuarioAdmin_idx` (`usuariosAdmin_idUsuarioAdmin`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`idDonacion`),
  ADD KEY `idUsuarioNormal_idx` (`usuariosNormal_idUsuarioNormal`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`idEspecie`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEventos`),
  ADD KEY `idUsuarioAdmin_idx` (`usuariosAdmin_idUsuarioAdmin`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`idFormato`),
  ADD KEY `adopciones_idAdopcion` (`adopciones_idAdopcion`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`idHistoria`),
  ADD KEY `idUsuarioAdmin_idx` (`usuariosAdmin_idUsuarioAdmin`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuariosadmin`
--
ALTER TABLE `usuariosadmin`
  ADD PRIMARY KEY (`idUsuarioAdmin`),
  ADD KEY `idUsuario_idx` (`usuarios_idUsuario`);

--
-- Indices de la tabla `usuariosnormal`
--
ALTER TABLE `usuariosnormal`
  ADD PRIMARY KEY (`idUsuarioNormal`),
  ADD KEY `idUsuario_idx` (`usuarios_idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  MODIFY `idAdopcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `idDonacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `idEspecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `idFormato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `idHistoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuariosadmin`
--
ALTER TABLE `usuariosadmin`
  MODIFY `idUsuarioAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuariosnormal`
--
ALTER TABLE `usuariosnormal`
  MODIFY `idUsuarioNormal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `idUsuarioNormal` FOREIGN KEY (`usuariosNormal_idUsuarioNormal`) REFERENCES `usuariosnormal` (`idUsuarioNormal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuariosnormal`
--
ALTER TABLE `usuariosnormal`
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
