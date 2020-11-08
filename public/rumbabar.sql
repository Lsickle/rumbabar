CREATE DATABASE IF NOT EXISTS `rumbabar` DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE `rumbabar`;


DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `ClienteId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ClienteNombre` varchar(255) NOT NULL,
  `ClienteDocumento` varchar(255) NOT NULL,
  PRIMARY KEY (`ClienteId`)
);

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `CompraId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CompraSaldo` double(8,2) NOT NULL,
  `CompraTotal` double(8,2) NOT NULL,
  `fk_user` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`CompraId`)
);

DROP TABLE IF EXISTS `compra_producto`;
CREATE TABLE `compra_producto` (
  `compraCantidad` double(8,2) NOT NULL,
  `fk_producto` bigint(20) UNSIGNED NOT NULL,
  `fk_compra` bigint(20) UNSIGNED NOT NULL
);

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE `mesas` (
  `MesaId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MesaPuestos` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`MesaId`)
);

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `PermisoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PermisoNombre` varchar(255) NOT NULL,
  PRIMARY KEY (`PermisoId`)
);

DROP TABLE IF EXISTS `permiso_rol`;
CREATE TABLE `permiso_rol` (
  `fk_permiso` bigint(20) UNSIGNED NOT NULL,
  `fk_rol` bigint(20) UNSIGNED NOT NULL
);

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `ProductoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductoNombre` varchar(255) NOT NULL,
  `ProductoDescripcion` longtext NOT NULL,
  `ProductoPrecio` double(8,2) NOT NULL,
  `ProductoCantidad` int(11) NOT NULL,
  `fk_proveedor` bigint(20) UNSIGNED NOT NUll,
  PRIMARY KEY (`ProductoId`)
);

DROP TABLE IF EXISTS `producto_venta`;
CREATE TABLE `producto_venta` (
  `ventaCantidad` double(8,2) NOT NULL,
  `fk_producto` bigint(20) UNSIGNED NOT NULL,
  `fk_venta` bigint(20) UNSIGNED NOT NULL
);

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `ProveedorID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProveedorNombre` varchar(255) NOT NULL,
  `ProveedorNit` varchar(255) NOT NULL,
  PRIMARY KEY (`ProveedorID`)
);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `RolId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `RolNombre` varchar(255) NOT NULL,
  PRIMARY KEY (`RolId`)
);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `UsuarioId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `UsuarioName` varchar(255) NOT NULL,
  `UsuarioEmail` varchar(255) NOT NULL,
  `UsuarioPassword` varchar(255) NOT NULL,
  `fk_rol` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`UsuarioId`)
);

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `VentaId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `VentaSaldo` double(8,2) NOT NULL,
  `VentaTotal` double(8,2) NOT NULL,
  `fk_user` bigint(20) UNSIGNED NOT NULL,
  `fk_mesa` bigint(20) UNSIGNED NOT NULL,
  `fk_cliente` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`VentaId`)
);


ALTER TABLE `compras`
  ADD KEY `compras_fk_user_foreign` (`fk_user`);

ALTER TABLE `compra_producto`
  ADD KEY `compra_producto_fk_producto_foreign` (`fk_producto`),
  ADD KEY `compra_producto_fk_compra_foreign` (`fk_compra`);

ALTER TABLE `permiso_rol`
  ADD KEY `permiso_rol_fk_permiso_foreign` (`fk_permiso`),
  ADD KEY `permiso_rol_fk_rol_foreign` (`fk_rol`);

ALTER TABLE `productos`
  ADD KEY `productos_fk_proveedor_foreign` (`fk_proveedor`);

ALTER TABLE `producto_venta`
  ADD KEY `producto_venta_fk_producto_foreign` (`fk_producto`),
  ADD KEY `producto_venta_fk_venta_foreign` (`fk_venta`);

ALTER TABLE `usuarios`
  ADD KEY `usuarios_fk_rol_foreign` (`fk_rol`);

ALTER TABLE `ventas`
  ADD KEY `ventas_fk_user_foreign` (`fk_user`),
  ADD KEY `ventas_fk_mesa_foreign` (`fk_mesa`),
  ADD KEY `ventas_fk_cliente_foreign` (`fk_cliente`);


ALTER TABLE `compras`
  ADD CONSTRAINT `compras_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `usuarios` (`UsuarioId`);

ALTER TABLE `compra_producto`
  ADD CONSTRAINT `compra_producto_fk_compra_foreign` FOREIGN KEY (`fk_compra`) REFERENCES `compras` (`CompraId`),
  ADD CONSTRAINT `compra_producto_fk_producto_foreign` FOREIGN KEY (`fk_producto`) REFERENCES `productos` (`ProductoId`);

ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `permiso_rol_fk_permiso_foreign` FOREIGN KEY (`fk_permiso`) REFERENCES `permisos` (`PermisoId`),
  ADD CONSTRAINT `permiso_rol_fk_rol_foreign` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`RolId`);

ALTER TABLE `productos`
  ADD CONSTRAINT `productos_fk_proveedor_foreign` FOREIGN KEY (`fk_proveedor`) REFERENCES `proveedores` (`ProveedorID`);

ALTER TABLE `producto_venta`
  ADD CONSTRAINT `producto_venta_fk_producto_foreign` FOREIGN KEY (`fk_producto`) REFERENCES `productos` (`ProductoId`),
  ADD CONSTRAINT `producto_venta_fk_venta_foreign` FOREIGN KEY (`fk_venta`) REFERENCES `ventas` (`VentaId`);

ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_fk_rol_foreign` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`RolId`);

ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_fk_cliente_foreign` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`ClienteId`),
  ADD CONSTRAINT `ventas_fk_mesa_foreign` FOREIGN KEY (`fk_mesa`) REFERENCES `mesas` (`MesaId`),
  ADD CONSTRAINT `ventas_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `usuarios` (`UsuarioId`);



DROP TABLE IF EXISTS `auditoria_clientes`;
CREATE TABLE `auditoria_clientes` (
  `audi_clientes_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `audi_ClienteId` bigint(20),
  `audi_nuevo_ClienteNombre` varchar(255),
  `audi_nuevo_ClienteDocumento` varchar(255),
  `audi_anterior_ClienteNombre` varchar(255),
  `audi_anterior_ClienteDocumento` varchar(255),
  PRIMARY KEY (`audi_clientes_id`)
);

DROP TABLE IF EXISTS `auditoria_mesas`;
CREATE TABLE `auditoria_mesas` (
  `audi_mesas_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `audi_MesaId` bigint(20),
  `audi_nuevo_MesaPuestos` int(10),
  `audi_anterior_MesaPuestos` int(10),
  PRIMARY KEY (`audi_mesas_id`)
);

DROP TABLE IF EXISTS `auditoria_permisos`;
CREATE TABLE `auditoria_permisos` (
  `audi_permisos_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `audi_PermisoId` bigint(20),
  `audi_nuevo_PermisoNombre` varchar(255),
  `audi_anterior_PermisoNombre` varchar(255),
  PRIMARY KEY (`audi_permisos_id`)
);

DROP TABLE IF EXISTS `auditoria_productos`;
CREATE TABLE `auditoria_productos` (
  `audi_productos_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `audi_ProductoId` bigint(20),
  `audi_nuevo_ProductoNombre` varchar(255),
  `audi_nuevo_ProductoDescripcion` longtext,
  `audi_nuevo_ProductoPrecio` double(8,2),
  `audi_nuevo_ProductoCantidad` int(11),
  `audi_nuevo_fk_proveedor` bigint(20),
  `audi_anterior_ProductoNombre` varchar(255),
  `audi_anterior_ProductoDescripcion` longtext,
  `audi_anterior_ProductoPrecio` double(8,2),
  `audi_anterior_ProductoCantidad` int(11),
  `audi_anterior_fk_proveedor` bigint(20),
  PRIMARY KEY (`audi_productos_id`)
);

DROP TABLE IF EXISTS `auditoria_proveedores`;
CREATE TABLE `auditoria_proveedores` (
  `audi_proveedores_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `audi_ProveedorID` bigint(20),
  `audi_nuevo_ProveedorNombre` varchar(255),
  `audi_nuevo_ProveedorNit` varchar(255),
  `audi_anterior_ProveedorNombre` varchar(255),
  `audi_anterior_ProveedorNit` varchar(255),
  PRIMARY KEY (`audi_proveedores_id`)
);

DROP TABLE IF EXISTS `auditoria_roles`;
CREATE TABLE `auditoria_roles` (
  `audi_roles_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `audi_RolId` bigint(20),
  `audi_nuevo_RolNombre` varchar(255),
  `audi_anterior_RolNombre` varchar(255),
  PRIMARY KEY (`audi_roles_id`)
);

DROP TABLE IF EXISTS `auditoria_usuarios`;
CREATE TABLE `auditoria_usuarios` (
  `audi_usuarios_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `audi_UsuarioId` bigint(20),
  `audi_nuevo_UsuarioName` varchar(255),
  `audi_nuevo_UsuarioEmail` varchar(255),
  `audi_nuevo_UsuarioPassword` varchar(255),
  `audi_nuevo_fk_rol` bigint(20) UNSIGNED,
  `audi_anterior_UsuarioName` varchar(255),
  `audi_anterior_UsuarioEmail` varchar(255),
  `audi_anterior_UsuarioPassword` varchar(255),
  `audi_anterior_fk_rol` bigint(20) UNSIGNED,
  PRIMARY KEY (`audi_usuarios_id`)
);
