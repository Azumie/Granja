--
-- Estructura de tabla para la tabla `compraProductos`
--

CREATE TABLE `compraProductos` (
  `idInventario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idGranja` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosgallina`
--

CREATE TABLE `datosgallina` (
  `idDatoGallina` int(11) NOT NULL,
  `nombreDatoGallina` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despachos`
--

CREATE TABLE `despachos` (
  `idDespachos` int(11) NOT NULL,
  `documentoCliente` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `precinto` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledespachos`
--

CREATE TABLE `detalledespachos` (
  `idInventarioProduccion` int(11) NOT NULL,
  `idDespachos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallegenetica`
--

CREATE TABLE `detallegenetica` (
  `idDatoGallina` int(11) NOT NULL,
  `idLineaGenetica` int(11) NOT NULL,
  `valor` float NOT NULL,
  `semana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galponeros`
--

CREATE TABLE `galponeros` (
  `idGalpon` int(11) NOT NULL,
  `documentoGalponero` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galpones`
--

CREATE TABLE `galpones` (
  `idGalpon` int(11) NOT NULL,
  `idGranja` int(11) NOT NULL,
  `numeroGalpon` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fechaCreacionGalpon` date NOT NULL,
  `confinamiento` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `activoGalpon` tinyint(1) NOT NULL DEFAULT 1,
  `areaUtil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `granjas`
--

CREATE TABLE `granjas` (
  `idGranja` int(11) NOT NULL,
  `nombreGranja` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacionGranja` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL,
  `idTipoOperacion` int(11) NOT NULL,
  `fechaOperacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarioproduccion`
--

CREATE TABLE `inventarioproduccion` (
  `idInventarioProduccion` int(11) NOT NULL,
  `idTipoHuevo` int(11) NOT NULL,
  `idGalpon` int(11) NOT NULL,
  `fechaInventarioProduccion` date NOT NULL,
  `cantidadProduccion` int(11) NOT NULL,
  `entrada` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineagenetica`
--

CREATE TABLE `lineagenetica` (
  `idLineaGenetica` int(11) NOT NULL,
  `nombreLineaGenetica` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `idLote` int(11) NOT NULL,
  `idLineaGenetica` int(11) NOT NULL,
  `idGalpon` int(11) NOT NULL,
  `documentoProveedor` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `idInventario` int(11) NOT NULL,
  `catindadGallinas` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date DEFAULT NULL,
  `numeroLote` int(11) NOT NULL,
  `activoLote` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `documento` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `idTipoPersona` int(11) NOT NULL,
  `nombrePersona` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellidosPersona` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonoPersona` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `emailPersona` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activoPersona` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `proveedoresproductos` (
  `documento` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `idTipoProducto` int(11) NOT NULL,
  `nombreProducto` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposhuevo`
--

CREATE TABLE `tiposhuevo` (
  `idTipoHuevo` int(11) NOT NULL,
  `nombreTipoHuevo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposoperacion`
--

CREATE TABLE `tiposoperacion` (
  `idTipoOperacion` int(11) NOT NULL,
  `nombreTipoOperacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipospersona`
--

CREATE TABLE `tipospersona` (
  `idTipoPersona` int(11) NOT NULL,
  `nombreTipoPersona` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipospersona`
--

INSERT INTO `tipospersona` (`idTipoPersona`, `nombreTipoPersona`) VALUES
(1, 'Gerente de Producción'),
(2, 'Galponeros'),
(3, 'Clientes'),
(4, 'Proveedores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposproducto`
--

CREATE TABLE `tiposproducto` (
  `idTipoProducto` int(11) NOT NULL,
  `nombreTipoProducto` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `documento` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `idGranja` int(11) NOT NULL,
  `nombreUsuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `claveUsuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `activoUsuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compraProductos`
--
ALTER TABLE `compraProductos`
  ADD PRIMARY KEY (`idInventario`,`idProducto`),
  ADD KEY `fk_inventario_has_productos_productos1` (`idProducto`),
  ADD KEY `fk_compraProductos_granjas1` (`idGranja`);

--
-- Indices de la tabla `datosgallina`
--
ALTER TABLE `datosgallina`
  ADD PRIMARY KEY (`idDatoGallina`);

--
-- Indices de la tabla `despachos`
--
ALTER TABLE `despachos`
  ADD PRIMARY KEY (`idDespachos`),
  ADD KEY `fk_despachos_personas1` (`documentoCliente`);

--
-- Indices de la tabla `detalledespachos`
--
ALTER TABLE `detalledespachos`
  ADD PRIMARY KEY (`idInventarioProduccion`,`idDespachos`),
  ADD KEY `fk_inventarioproduccion_has_despachos_despachos1` (`idDespachos`);

--
-- Indices de la tabla `detallegenetica`
--
ALTER TABLE `detallegenetica`
  ADD PRIMARY KEY (`idDatoGallina`,`idLineaGenetica`),
  ADD KEY `fk_datosgallina_has_lineagenetica_lineagenetica1` (`idLineaGenetica`);

--
-- Indices de la tabla `galponeros`
--
ALTER TABLE `galponeros`
  ADD PRIMARY KEY (`idGalpon`,`documentoGalponero`),
  ADD KEY `fk_galpones_has_personas_personas1` (`documentoGalponero`);

--
-- Indices de la tabla `galpones`
--
ALTER TABLE `galpones`
  ADD PRIMARY KEY (`idGalpon`),
  ADD KEY `fk_galpones_granjas` (`idGranja`);

--
-- Indices de la tabla `granjas`
--
ALTER TABLE `granjas`
  ADD PRIMARY KEY (`idGranja`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `fk_inventario_TiposOperacion1` (`idTipoOperacion`);

--
-- Indices de la tabla `inventarioproduccion`
--
ALTER TABLE `inventarioproduccion`
  ADD PRIMARY KEY (`idInventarioProduccion`),
  ADD KEY `fk_inventarioproduccion_tiposhuevo1` (`idTipoHuevo`),
  ADD KEY `fk_inventarioproduccion_galpones1` (`idGalpon`);

--
-- Indices de la tabla `lineagenetica`
--
ALTER TABLE `lineagenetica`
  ADD PRIMARY KEY (`idLineaGenetica`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`idLote`),
  ADD KEY `fk_lotes_lineagenetica1` (`idLineaGenetica`),
  ADD KEY `fk_lotes_inventario1` (`idInventario`),
  ADD KEY `fk_lotes_personas1` (`documentoProveedor`),
  ADD KEY `fk_lotes_galpones1` (`idGalpon`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `fk_personas_tipopersona1` (`idTipoPersona`);

--
-- Indices de la tabla `productos`
--

ALTER TABLE `proveedoresproductos`
  ADD PRIMARY KEY (`idProducto`),
  ADD PRIMARY KEY (`documento`),
  ADD KEY `fk_proveedoresproductos_productos` (`idProducto`),
  ADD KEY `fk_proveedoresproductos_personas` (`documento`);
--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_productos_tiposproducto1` (`idTipoProducto`),
  ADD KEY `fk_productos_personas1` (`documentoProveedor`);

--
-- Indices de la tabla `tiposhuevo`
--
ALTER TABLE `tiposhuevo`
  ADD PRIMARY KEY (`idTipoHuevo`);

--
-- Indices de la tabla `tiposoperacion`
--
ALTER TABLE `tiposoperacion`
  ADD PRIMARY KEY (`idTipoOperacion`);

--
-- Indices de la tabla `tipospersona`
--
ALTER TABLE `tipospersona`
  ADD PRIMARY KEY (`idTipoPersona`);

--
-- Indices de la tabla `tiposproducto`
--
ALTER TABLE `tiposproducto`
  ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuarios_personas1` (`documento`),
  ADD KEY `fk_usuarios_granjas1` (`idGranja`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datosgallina`
--
ALTER TABLE `datosgallina`
  MODIFY `idDatoGallina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `despachos`
--
ALTER TABLE `despachos`
  MODIFY `idDespachos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalledespachos`
--
ALTER TABLE `detalledespachos`
  MODIFY `idInventarioProduccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallegenetica`
--
ALTER TABLE `detallegenetica`
  MODIFY `idDatoGallina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galpones`
--
ALTER TABLE `galpones`
  MODIFY `idGalpon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `granjas`
--
ALTER TABLE `granjas`
  MODIFY `idGranja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventarioproduccion`
--
ALTER TABLE `inventarioproduccion`
  MODIFY `idInventarioProduccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lineagenetica`
--
ALTER TABLE `lineagenetica`
  MODIFY `idLineaGenetica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `idLote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposhuevo`
--
ALTER TABLE `tiposhuevo`
  MODIFY `idTipoHuevo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposoperacion`
--
ALTER TABLE `tiposoperacion`
  MODIFY `idTipoOperacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipospersona`
--
ALTER TABLE `tipospersona`
  MODIFY `idTipoPersona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposproducto`
--
ALTER TABLE `tiposproducto`
  MODIFY `idTipoProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compraProductos`
--
ALTER TABLE `compraProductos`
  ADD CONSTRAINT `fk_compraProductos_granjas1` FOREIGN KEY (`idGranja`) REFERENCES `granjas` (`idGranja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventario_has_productos_inventario1` FOREIGN KEY (`idInventario`) REFERENCES `inventario` (`idInventario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventario_has_productos_productos1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `despachos`
--
ALTER TABLE `despachos`
  ADD CONSTRAINT `fk_despachos_personas1` FOREIGN KEY (`documentoCliente`) REFERENCES `personas` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalledespachos`
--
ALTER TABLE `detalledespachos`
  ADD CONSTRAINT `fk_inventarioproduccion_has_despachos_despachos1` FOREIGN KEY (`idDespachos`) REFERENCES `despachos` (`idDespachos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventarioproduccion_has_despachos_inventarioproduccion1` FOREIGN KEY (`idInventarioProduccion`) REFERENCES `inventarioproduccion` (`idInventarioProduccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallegenetica`
--
ALTER TABLE `detallegenetica`
  ADD CONSTRAINT `fk_datosgallina_has_lineagenetica_datosgallina1` FOREIGN KEY (`idDatoGallina`) REFERENCES `datosgallina` (`idDatoGallina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_datosgallina_has_lineagenetica_lineagenetica1` FOREIGN KEY (`idLineaGenetica`) REFERENCES `lineagenetica` (`idLineaGenetica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `galponeros`
--
ALTER TABLE `galponeros`
  ADD CONSTRAINT `fk_galpones_has_personas_galpones1` FOREIGN KEY (`idGalpon`) REFERENCES `galpones` (`idGalpon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_galpones_has_personas_personas1` FOREIGN KEY (`documentoGalponero`) REFERENCES `personas` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `galpones`
--
ALTER TABLE `galpones`
  ADD CONSTRAINT `fk_galpones_granjas` FOREIGN KEY (`idGranja`) REFERENCES `granjas` (`idGranja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_TiposOperacion1` FOREIGN KEY (`idTipoOperacion`) REFERENCES `tiposoperacion` (`idTipoOperacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventarioproduccion`
--
ALTER TABLE `inventarioproduccion`
  ADD CONSTRAINT `fk_inventarioproduccion_galpones1` FOREIGN KEY (`idGalpon`) REFERENCES `galpones` (`idGalpon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventarioproduccion_tiposhuevo1` FOREIGN KEY (`idTipoHuevo`) REFERENCES `tiposhuevo` (`idTipoHuevo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `fk_lotes_galpones1` FOREIGN KEY (`idGalpon`) REFERENCES `galpones` (`idGalpon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lotes_inventario1` FOREIGN KEY (`idInventario`) REFERENCES `inventario` (`idInventario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lotes_lineagenetica1` FOREIGN KEY (`idLineaGenetica`) REFERENCES `lineagenetica` (`idLineaGenetica`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lotes_personas1` FOREIGN KEY (`documentoProveedor`) REFERENCES `personas` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_personas_tipopersona1` FOREIGN KEY (`idTipoPersona`) REFERENCES `tipospersona` (`idTipoPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--

ALTER TABLE `proveedoresproductos`
  ADD CONSTRAINT `fk_proveedoresproductos_personas` FOREIGN KEY (`documento`) REFERENCES `personas` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proveedoresproductos_productos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_tiposproducto1` FOREIGN KEY (`idTipoProducto`) REFERENCES `tiposproducto` (`idTipoProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_granjas1` FOREIGN KEY (`idGranja`) REFERENCES `granjas` (`idGranja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`documento`) REFERENCES `personas` (`documento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


