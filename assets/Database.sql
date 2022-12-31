-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-10-2022 a las 17:29:33
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


-- Base de datos: `bd_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

DROP TABLE IF EXISTS `accesos`;
CREATE TABLE IF NOT EXISTS `accesos` (
  `ID_ACCESOS` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ACCESOS` varchar(80) NOT NULL,
  `CREACION_ACCESO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ESTADO_ACCESO` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_ACCESOS`)
) ENGINE=InnoDB  ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `ID_ALMACEN` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ALMACEN` varchar(80) NOT NULL,
  `CREACION_ALMACEN` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ESTADO_ALMACEN` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_ALMACEN`)
) ENGINE=InnoDB ;


--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA` varchar(80) NOT NULL,
  `CREACION_CATEGORIA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ESTADO_CATEGORIA` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIA`)
) ENGINE=InnoDB ;

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSONA` int(11) NOT NULL,
  `CORREO_CLIENTE` varchar(50) NOT NULL,
  `DIRECCION_CLIENTE` varchar(250) NOT NULL,
  `ESTADO_CLIENTE` varchar(10) NOT NULL,
  `CREACION_CLIENTE` datetime NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`),
  KEY `FK_ID_PERSONA_CL` (`ID_PERSONA`)
) ENGINE=InnoDB  ;


--
-- Estructura de tabla para la tabla `cliente_producto`
--

DROP TABLE IF EXISTS `cliente_producto`;
CREATE TABLE IF NOT EXISTS `cliente_producto` (
  `ID_CLIENTE_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_TIPO_PAGO` int(11) NOT NULL,
  `CANTIDAD_CP` int(11) NOT NULL,
  `TOTAL_CP` int(11) NOT NULL,
  `ESTADO_CP` varchar(10) NOT NULL,
  `CREACION_CP` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CLIENTE_PRODUCTO`),
  KEY `FK_ID_CLIENTE_CP` (`ID_CLIENTE`),
  KEY `FK_ID_PRODUCTO_CP` (`ID_PRODUCTO`),
  KEY `FK_ID_TIPO_PAGO` (`ID_TIPO_PAGO`)
) ENGINE=InnoDB ;


--
-- Estructura de tabla para la tabla `contrasenia`
--

DROP TABLE IF EXISTS `contrasenia`;
CREATE TABLE IF NOT EXISTS `contrasenia` (
  `ID_CONTRASENIA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE_CONTRASENIA` varchar(255) NOT NULL,
  `ESTADO_CONTRASENIA` varchar(10) NOT NULL,
  `MODIFICACION_CONTRASENIA` datetime,
  `CREATE_CONTRASENIA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CONTRASENIA`),
  KEY `FK_ID_USUARIO_C` (`ID_USUARIO`)
) ENGINE=InnoDB ;

--

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PERSONA` varchar(30) NOT NULL,
  `PATERNO_PERSONA` varchar(30) NOT NULL,
  `MATERNO_PERSONA` varchar(30) NOT NULL,
  `TELEFONO_PERSONA` varchar(12) NOT NULL,
  `NAC_PERSONA` date NOT NULL,
  `ESTADO_PERSONA` varchar(20) NOT NULL,
  `CREACION_PERSONA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_PERSONA`)
) ENGINE=InnoDB ;


--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(120) NOT NULL,
  `IMG_PRODUCTO` text NOT NULL,
  `MARCA_PRODUCTO` varchar(180),
  `INDUSTRIA_PRODUCTO` varchar(180),
  `CODIGO_PRODUCTO` varchar(80) NOT NULL,
  `DESCRIPCION_PRODUCTO` text NOT NULL,
  `ESTADO_PRODUCTO` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `FK_ID_CATEGORIA` (`ID_CATEGORIA`)
) ENGINE=InnoDB ;


--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT,
  `EMPRESA_PROVEEDOR` varchar(80) NOT NULL,
  `CORREO_PROVEEDOR` varchar(50) NOT NULL,
  `ESTADO_PROVEEDOR` varchar(10) NOT NULL,
  `CREACION_PROVEEDOR` datetime NOT NULL,
  PRIMARY KEY (`ID_PROVEEDOR`)
) ENGINE=InnoDB  ;


--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `ID_ROLES` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ACCESOS` int(11) NOT NULL,
  `NOMBRE_ROLES` varchar(80) NOT NULL,
  `CREACION_ROLES` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ESTADO_ROLES` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_ROLES`),
  KEY `FK_ID_ACCESOS` (`ID_ACCESOS`)
) ENGINE=InnoDB  ;

--
-- Estructura de tabla para la tabla `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider`(
`ID_SLIDER` int(11) NOT NULL AUTO_INCREMENT,
`ID_PRODUCTO` int(11) NOT NULL,
`ID_USUARIO` int(11) NOT NULL,
`TITULO_SLIDER` varchar(180),
`TEXTO_SLIDER`  text NOT NULL,
`ESTADO_SLIDER` varchar(20)  NOT NULL,
`CREACION_SLIDER` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(`ID_SLIDER`),
KEY `FK_ID_PRODUCTO` (`ID_PRODUCTO`),
KEY `FK_ID_USUARIO` (`ID_USUARIO`)
) ENGINE = InnoDB;

--
-- Filtros para la tabla `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `FK_ID_PRODUCTO` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `FK_ID_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);



--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `ID_SUCURSAL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALMACEN` int(11) NOT NULL,
  `NOMBRE_SUCURSAL` varchar(80) NOT NULL,
  `DIRECCION_SUCURSAL` varchar(180) NOT NULL,
  `ESTADO_SUCURSAL` varchar(10) NOT NULL,
  `CREACION_SUCURSAL` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_SUCURSAL`),
  KEY `FK_ID_ALMACEN` (`ID_ALMACEN`)
) ENGINE=InnoDB ;


--
-- Estructura de tabla para la tabla `tipo_pago`
--

DROP TABLE IF EXISTS `tipo_pago`;
CREATE TABLE IF NOT EXISTS `tipo_pago` (
  `ID_TIPO_PAGO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_TIPO_PAGO` varchar(30) NOT NULL,
  `CREACION_TIPO_PAGO` datetime NOT NULL,
  `ESTADO_TIPO_PAGO` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_TIPO_PAGO`)
) ENGINE=InnoDB ;


--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSONA` int(11) NOT NULL,
  `ID_ROLES` int(11) NOT NULL,
  `NOMBRE_USUARIO` varchar(30) NOT NULL,
  `PROFILE_USUARIO` varchar(250),
  `ESTADO_USUARIO` varchar(10) NOT NULL,
  `CREACION_USUARIO` datetime NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_ID_PERSONA` (`ID_PERSONA`),
  KEY `FK_ID_ROLES` (`ID_ROLES`)
) ENGINE=InnoDB ;

--------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_producto`
--

DROP TABLE IF EXISTS `almacen_producto`;
CREATE TABLE IF NOT EXISTS `almacen_producto` (
  `ID_AP` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO_AP` int(11) NOT NULL,
  `ID_PRODUCTO_AP` int(11) NOT NULL,
  `ID_PROVEEDOR_AP` int(11) NOT NULL,
  `ID_ALMACEN_AP` int(11) NOT NULL,
  `PVENTA_AP` int(11) NOT NULL,
  `PCOMPRA_AP` int(11) NOT NULL,
  `LOTE_AP` varchar(12),
  `CANTIDAD_AP` int(12) NOT NULL,
  `INGRESO_AP` datetime NOT NULL,
  `ESTADO_AP` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_AP`),
  KEY `FK_ID_USUARIO_AP` (`ID_USUARIO_AP`),
  KEY `FK_ID_PRODUCTO_AP` (`ID_PRODUCTO_AP`),
  KEY `FK_ID_PROVEEDOR_AP` (`ID_PROVEEDOR_AP`),
  KEY `FK_ID_ALMACEN_AP` (`ID_ALMACEN_AP`)
) ENGINE=InnoDB ;

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `ID_VENTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE_PRODUCTO` int(11) NOT NULL,
  `FECHA_VENTA` datetime NOT NULL,
  `TOTAL_VENTA` int(12) NOT NULL,
  `ESTADO_VENTA` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_VENTA`),
  KEY `FK_ID_CLIENTE_PRODUCTO` (`ID_CLIENTE_PRODUCTO`)
) ENGINE=InnoDB  ;


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `FK_ID_PERSONA_CL` FOREIGN KEY (`ID_PERSONA`) REFERENCES `persona` (`ID_PERSONA`);

--
-- Filtros para la tabla `cliente_producto`
--
ALTER TABLE `cliente_producto`
  ADD CONSTRAINT `FK_ID_PRODUCTO_CP` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `FK_ID_TIPO_PAGO` FOREIGN KEY (`ID_TIPO_PAGO`) REFERENCES `tipo_pago` (`ID_TIPO_PAGO`);

--
-- Filtros para la tabla `contrasenia`
--
ALTER TABLE `contrasenia`
  ADD CONSTRAINT `FK_ID_USUARIO_C` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_ID_CATEGORIA` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `FK_ID_ACCESOS` FOREIGN KEY (`ID_ACCESOS`) REFERENCES `accesos` (`ID_ACCESOS`);

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `FK_ID_ALMACEN` FOREIGN KEY (`ID_ALMACEN`) REFERENCES `almacen` (`ID_ALMACEN`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_ID_PERSONA` FOREIGN KEY (`ID_PERSONA`) REFERENCES `persona` (`ID_PERSONA`),
  ADD CONSTRAINT `FK_ID_ROLES` FOREIGN KEY (`ID_ROLES`) REFERENCES `roles` (`ID_ROLES`);

--
-- Filtros para la tabla `usuario_producto_proveedor`
--
ALTER TABLE `almacen_producto`
  ADD CONSTRAINT `FK_ID_ALMACEN_AP` FOREIGN KEY (`ID_ALMACEN_AP`) REFERENCES `almacen` (`ID_ALMACEN`),
  ADD CONSTRAINT `FK_ID_PRODUCTO_AP` FOREIGN KEY (`ID_PRODUCTO_AP`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `FK_ID_PROVEEDOR_AP` FOREIGN KEY (`ID_PROVEEDOR_AP`) REFERENCES `proveedor` (`ID_PROVEEDOR`),
  ADD CONSTRAINT `FK_ID_USUARIO_AP` FOREIGN KEY (`ID_USUARIO_AP`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `FK_ID_CLIENTE_PRODUCTO` FOREIGN KEY (`ID_CLIENTE_PRODUCTO`) REFERENCES `cliente_producto` (`ID_CLIENTE_PRODUCTO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;