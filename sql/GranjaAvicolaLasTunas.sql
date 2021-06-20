
-- -----------------------------------------------------
-- Table `granjas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `granjas` (
  `idGranja` INT NOT NULL AUTO_INCREMENT,
  `nombreGranja` VARCHAR(45) NOT NULL,
  `ubicacionGranja` TEXT NOT NULL,
  PRIMARY KEY (`idGranja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galpones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `galpones` (
  `idGalpon` INT NOT NULL AUTO_INCREMENT,
  `idGranja` INT NOT NULL,
  `numeroGalpon` INT NOT NULL,
  `fechaCreacionGalpon` DATE NOT NULL,
  `confinameiento` CHAR NOT NULL,
  `activoGalpon` TINYINT(1) NOT NULL DEFAULT 1,
  `areaUtil` FLOAT NOT NULL,
  PRIMARY KEY (`idGalpon`),
  INDEX `fk_galpones_granjas_idx` (`idGranja`),
  UNIQUE INDEX `numeroGalpon_UNIQUE` (`numeroGalpon`),
  CONSTRAINT `fk_galpones_granjas`
    FOREIGN KEY (`idGranja`)
    REFERENCES `granjas` (`idGranja`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario` (
  `idInventario` INT NOT NULL AUTO_INCREMENT,
  `fechaOperacion` VARCHAR(45) NOT NULL,
  `entrada` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idInventario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lineagenetica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lineagenetica` (
  `idLineaGenetica` INT NOT NULL AUTO_INCREMENT,
  `nombreLineaGenetica` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idLineaGenetica`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lotes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lotes` (
  `idLote` INT NOT NULL AUTO_INCREMENT,
  `idLineaGenetica` INT NOT NULL,
  `idInventario` INT NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL,
  `numeroLote` INT NOT NULL,
  `activoLote` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idLote`),
  INDEX `fk_lotes_lineagenetica1_idx` (`idLineaGenetica`),
  INDEX `fk_lotes_inventario1_idx` (`idInventario`),
  CONSTRAINT `fk_lotes_lineagenetica1`
    FOREIGN KEY (`idLineaGenetica`)
    REFERENCES `lineagenetica` (`idLineaGenetica`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_lotes_inventario1`
    FOREIGN KEY (`idInventario`)
    REFERENCES `inventario` (`idInventario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tiposproducto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tiposproducto` (
  `idTipoProducto` INT NOT NULL AUTO_INCREMENT,
  `nombreTipoProducto` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idTipoProducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` INT NOT NULL AUTO_INCREMENT,
  `idTipoProducto` INT NOT NULL,
  `nombreProducto` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idProducto`),
  INDEX `fk_productos_tiposproducto1_idx` (`idTipoProducto`),
  UNIQUE INDEX `nombreProducto_UNIQUE` (`nombreProducto`),
  CONSTRAINT `fk_productos_tiposproducto1`
    FOREIGN KEY (`idTipoProducto`)
    REFERENCES `tiposproducto` (`idTipoProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tipopersona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tipopersona` (
  `idTipoPersona` INT NOT NULL AUTO_INCREMENT,
  `nombreTipoPersona` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idTipoPersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `personas` (
  `documento` VARCHAR(11) NOT NULL,
  `idTipoPersona` INT NOT NULL,
  `nombrePersona` VARCHAR(45) NOT NULL,
  `apellidosPersona` VARCHAR(45) NULL,
  `telefonoPersona` VARCHAR(11) NOT NULL,
  `emailPersona` VARCHAR(45) NULL,
  `activoPersona` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`documento`),
  INDEX `fk_personas_tipopersona1_idx` (`idTipoPersona`),
  CONSTRAINT `fk_personas_tipopersona1`
    FOREIGN KEY (`idTipoPersona`)
    REFERENCES `tipopersona` (`idTipoPersona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galponeros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `galponeros` (
  `idGalpon` INT NOT NULL,
  `documentoGalponero` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`idGalpon`, `documentoGalponero`),
  INDEX `fk_galpones_has_personas_personas1_idx` (`documentoGalponero`),
  INDEX `fk_galpones_has_personas_galpones1_idx` (`idGalpon`),
  CONSTRAINT `fk_galpones_has_personas_galpones1`
    FOREIGN KEY (`idGalpon`)
    REFERENCES `galpones` (`idGalpon`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_galpones_has_personas_personas1`
    FOREIGN KEY (`documentoGalponero`)
    REFERENCES `personas` (`documento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `documento` VARCHAR(11) NOT NULL,
  `idGranja` INT NOT NULL,
  `nombreUsuario` VARCHAR(20) NOT NULL,
  `claveUsuario` VARCHAR(45) NOT NULL,
  `activoUsuario` TINYINT(1) NOT NULL DEFAULT 1,
  `pregunta` VARCHAR(45) NOT NULL,
  `respuesta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_usuarios_personas1_idx` (`documento`),
  INDEX `fk_usuarios_granjas1_idx` (`idGranja`),
  UNIQUE INDEX `nombreUsuario_UNIQUE` (`nombreUsuario`),
  CONSTRAINT `fk_usuarios_personas1`
    FOREIGN KEY (`documento`)
    REFERENCES `personas` (`documento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarios_granjas1`
    FOREIGN KEY (`idGranja`)
    REFERENCES `granjas` (`idGranja`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tiposhuevo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tiposhuevo` (
  `idTipoHuevo` INT NOT NULL AUTO_INCREMENT,
  `nombreTipoHuevo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoHuevo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galponeslotes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `galponeslotes` (
  `idGalpon` INT NOT NULL,
  `idLote` INT NOT NULL,
  `cantidadGallinas` INT NOT NULL,
  PRIMARY KEY (`idGalpon`, `idLote`),
  INDEX `fk_galponeslotes_galpones1_idx` (`idGalpon`),
  INDEX `fk_galponeslotes_lotes1_idx` (`idLote`),
  CONSTRAINT `fk_galponeslotes_galpones1`
    FOREIGN KEY (`idGalpon`)
    REFERENCES `galpones` (`idGalpon`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_galponeslotes_lotes1`
    FOREIGN KEY (`idLote`)
    REFERENCES `lotes` (`idLote`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventarioproduccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventarioproduccion` (
  `idInventarioProduccion` INT NOT NULL AUTO_INCREMENT,
  `idLote` INT NOT NULL,
  `idGalpon` INT NOT NULL,
  `idTipoHuevo` INT NOT NULL,
  `fechaInventarioProduccion` DATE NOT NULL,
  `cantidadProduccion` INT NOT NULL,
  `entrada` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idInventarioProduccion`),
  INDEX `fk_inventarioproduccion_tiposhuevo1_idx` (`idTipoHuevo`),
  INDEX `fk_inventarioproduccion_galponeslotes1_idx` (`idGalpon` ASC, `idLote`),
  CONSTRAINT `fk_inventarioproduccion_tiposhuevo1`
    FOREIGN KEY (`idTipoHuevo`)
    REFERENCES `tiposhuevo` (`idTipoHuevo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inventarioproduccion_galponeslotes1`
    FOREIGN KEY (`idGalpon` , `idLote`)
    REFERENCES `galponeslotes` (`idGalpon` , `idLote`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `despachos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `despachos` (
  `idDespachos` INT NOT NULL AUTO_INCREMENT,
  `documentoCliente` VARCHAR(11) NOT NULL,
  `precinto` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idDespachos`),
  INDEX `fk_despachos_personas1_idx` (`documentoCliente`),
  CONSTRAINT `fk_despachos_personas1`
    FOREIGN KEY (`documentoCliente`)
    REFERENCES `personas` (`documento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detalledespachos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalledespachos` (
  `idInventarioProduccion` INT NOT NULL AUTO_INCREMENT,
  `idDespachos` INT NOT NULL,
  PRIMARY KEY (`idInventarioProduccion`, `idDespachos`),
  INDEX `fk_inventarioproduccion_has_despachos_despachos1_idx` (`idDespachos`),
  INDEX `fk_inventarioproduccion_has_despachos_inventarioproduccion1_idx` (`idInventarioProduccion`),
  CONSTRAINT `fk_inventarioproduccion_has_despachos_inventarioproduccion1`
    FOREIGN KEY (`idInventarioProduccion`)
    REFERENCES `inventarioproduccion` (`idInventarioProduccion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inventarioproduccion_has_despachos_despachos1`
    FOREIGN KEY (`idDespachos`)
    REFERENCES `despachos` (`idDespachos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
INSERT INTO `tipopersona` (`idTipoPersona`, `nombreTipoPersona`) VALUES (NULL, 'Galponero')
,(NULL, 'Cliente'), (NULL, 'Proveedor');
INSERT INTO `tiposproducto` (`idTipoProducto`, `nombreTipoProducto`) VALUES (NULL, 'Alimento'), (NULL, 'Consumible');



-- -----------------------------------------------------
-- Table `proveedoresproducto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proveedoresproducto` (
  `idProducto` INT NOT NULL,
  `documentoProveedor` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`idProducto`, `documentoProveedor`),
  INDEX `fk_productos_has_personas_personas1_idx` (`documentoProveedor`),
  INDEX `fk_productos_has_personas_productos1_idx` (`idProducto`),
  CONSTRAINT `fk_productos_has_personas_productos1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `productos` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_has_personas_personas1`
    FOREIGN KEY (`documentoProveedor`)
    REFERENCES `personas` (`documento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `operaciongalpon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `operaciongalpon` (
  `idInventario` INT NOT NULL,
  `idGalpon` INT NOT NULL,
  `precioProducto` FLOAT NULL,
  `cantidadProducto` INT NOT NULL,
  `idProducto` INT NOT NULL,
  `documentoProveedor` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`idInventario`, `idGalpon`),
  INDEX `fk_destinocompra_galpones1_idx` (`idGalpon`),
  INDEX `fk_operaciongalpon_inventario1_idx` (`idInventario`),
  INDEX `fk_operaciongalpon_proveedoresproducto1_idx` (`idProducto` ASC, `documentoProveedor`),
  CONSTRAINT `fk_destinocompra_galpones1`
    FOREIGN KEY (`idGalpon`)
    REFERENCES `galpones` (`idGalpon`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_operaciongalpon_inventario1`
    FOREIGN KEY (`idInventario`)
    REFERENCES `inventario` (`idInventario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_operaciongalpon_proveedoresproducto1`
    FOREIGN KEY (`idProducto` , `documentoProveedor`)
    REFERENCES `proveedoresproducto` (`idProducto` , `documentoProveedor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `compragranja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `compragranja` (
  `idGranja` INT NOT NULL,
  `idInventario` INT NOT NULL,
  `precioProducto` FLOAT NULL,
  `CantidadProducto` FLOAT NOT NULL,
  `idProducto` INT NOT NULL,
  `documentoPo` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`idGranja`, `idInventario`),
  INDEX `fk_compragranja_granjas1_idx` (`idGranja`),
  INDEX `fk_operaciongranja_inventario1_idx` (`idInventario`),
  INDEX `fk_compragranja_proveedoresproducto1_idx` (`idProducto` ASC, `documentoPo`),
  CONSTRAINT `fk_compragranja_granjas1`
    FOREIGN KEY (`idGranja`)
    REFERENCES `granjas` (`idGranja`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_operaciongranja_inventario1`
    FOREIGN KEY (`idInventario`)
    REFERENCES `inventario` (`idInventario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_compragranja_proveedoresproducto1`
    FOREIGN KEY (`idProducto` , `documentoPo`)
    REFERENCES `proveedoresproducto` (`idProducto` , `documentoProveedor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
