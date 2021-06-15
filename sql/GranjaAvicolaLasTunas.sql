
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
  `numeroGalpon` VARCHAR(45) NOT NULL,
  `fechaCreacionGalpon` DATE NOT NULL,
  `confinamiento` CHAR NOT NULL,
  `activoGalpon` TINYINT(1) NOT NULL DEFAULT 1,
  `areaUtil` FLOAT NOT NULL,
  PRIMARY KEY (`idGalpon`),
  CONSTRAINT `fk_galpones_granjas`
    FOREIGN KEY (`idGranja`)
    REFERENCES `granjas` (`idGranja`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiposOperacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tiposoperacion` (
  `idTipoOperacion` INT NOT NULL AUTO_INCREMENT,
  `nombreTipoOperacion` VARCHAR(45) NOT NULL,
  `operacion` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`idTipoOperacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario` (
  `idInventario` INT NOT NULL AUTO_INCREMENT,
  `idTipoOperacion` INT NOT NULL,
  `fechaOperacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idInventario`),
  CONSTRAINT `fk_inventario_TiposOperacion1`
    FOREIGN KEY (`idTipoOperacion`)
    REFERENCES `TiposOperacion` (`idTipoOperacion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
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
-- Table `tipopersona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tipospersona` (
  `idTipoPersona` INT NOT NULL AUTO_INCREMENT,
  `nombreTipoPersona` VARCHAR(25) NOT NULL,
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
  CONSTRAINT `fk_personas_tipopersona11`
    FOREIGN KEY (`idTipoPersona`)
    REFERENCES `tipospersona` (`idTipoPersona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lotes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lotes` (
  `idLote` INT NOT NULL AUTO_INCREMENT,
  `idLineaGenetica` INT NOT NULL,
  `idGalpon` INT NOT NULL,
  `documentoProveedor` VARCHAR(11) NOT NULL,
  `idInventario` INT NOT NULL,
  `catindadGallinas` VARCHAR(45) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NULL,
  `numeroLote` INT NOT NULL,
  `activoLote` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idLote`),
  CONSTRAINT `fk_lotes_lineagenetica1`
    FOREIGN KEY (`idLineaGenetica`)
    REFERENCES `lineagenetica` (`idLineaGenetica`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_lotes_inventario1`
    FOREIGN KEY (`idInventario`)
    REFERENCES `inventario` (`idInventario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_lotes_personas1`
    FOREIGN KEY (`documentoProveedor`)
    REFERENCES `personas` (`documento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_lotes_galpones1`
    FOREIGN KEY (`idGalpon`)
    REFERENCES `galpones` (`idGalpon`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `datosgallina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `datosgallina` (
  `idDatoGallina` INT NOT NULL AUTO_INCREMENT,
  `nombreDatoGallina` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDatoGallina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detallegenetica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detallegenetica` (
  `idDatoGallina` INT NOT NULL AUTO_INCREMENT,
  `idLineaGenetica` INT NOT NULL,
  `valor` FLOAT NOT NULL,
  `semana` INT NOT NULL,
  PRIMARY KEY (`idDatoGallina`, `idLineaGenetica`),
  CONSTRAINT `fk_datosgallina_has_lineagenetica_datosgallina1`
    FOREIGN KEY (`idDatoGallina`)
    REFERENCES `datosgallina` (`idDatoGallina`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_datosgallina_has_lineagenetica_lineagenetica1`
    FOREIGN KEY (`idLineaGenetica`)
    REFERENCES `lineagenetica` (`idLineaGenetica`)
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
  `documentoProveedor` VARCHAR(11) NOT NULL,
  `idTipoProducto` INT NOT NULL,
  `nombreProducto` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idProducto`),
  CONSTRAINT `fk_productos_tiposproducto1`
    FOREIGN KEY (`idTipoProducto`)
    REFERENCES `tiposproducto` (`idTipoProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_personas1`
    FOREIGN KEY (`documentoProveedor`)
    REFERENCES `personas` (`documento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `compraProductos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `compraProductos` (
  `idInventario` INT NOT NULL,
  `idProducto` INT NOT NULL,
  `idGranja` INT NOT NULL,
  `cantidad` INT NOT NULL,
  PRIMARY KEY (`idInventario`, `idProducto`),
  CONSTRAINT `fk_inventario_has_productos_inventario1`
    FOREIGN KEY (`idInventario`)
    REFERENCES `inventario` (`idInventario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inventario_has_productos_productos1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `productos` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_compraProductos_granjas1`
    FOREIGN KEY (`idGranja`)
    REFERENCES `granjas` (`idGranja`)
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
  PRIMARY KEY (`idUsuario`),
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
-- Table `inventarioproduccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventarioproduccion` (
  `idInventarioProduccion` INT NOT NULL AUTO_INCREMENT,
  `idTipoHuevo` INT NOT NULL,
  `idGalpon` INT NOT NULL,
  `fechaInventarioProduccion` DATE NOT NULL,
  `cantidadProduccion` INT NOT NULL,
  `entrada` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idInventarioProduccion`),
  CONSTRAINT `fk_inventarioproduccion_tiposhuevo1`
    FOREIGN KEY (`idTipoHuevo`)
    REFERENCES `tiposhuevo` (`idTipoHuevo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inventarioproduccion_galpones1`
    FOREIGN KEY (`idGalpon`)
    REFERENCES `galpones` (`idGalpon`)
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
  `cantidad` INT NOT NULL,
  PRIMARY KEY (`idInventarioProduccion`, `idDespachos`),
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
INSERT INTO `tipospersona` (`idTipoPersona`, `nombreTipoPersona`) VALUES (NULL, 'Galponero');