-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-12-2023 a las 16:13:42
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ucs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedidos`
--

CREATE TABLE `detalles_pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(255) NOT NULL,
  `id_producto` int(255) NOT NULL,
  `cantidad` int(255) NOT NULL,
  `fecha_prod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles_pedidos`
--

INSERT INTO `detalles_pedidos` (`id`, `id_pedido`, `id_producto`, `cantidad`, `fecha_prod`) VALUES
(358, 264, 20, 1, '2023-12-07 11:05:13'),
(359, 264, 28, 1, '2023-12-07 11:05:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_pedidos`
--

CREATE TABLE `estados_pedidos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados_pedidos`
--

INSERT INTO `estados_pedidos` (`id`, `descripcion`) VALUES
(1, 'borrador'),
(2, 'solicitado'),
(3, 'despachado'),
(4, 'cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `num_pedido` varchar(50) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `fecha_borrador` datetime NOT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `fecha_despachado` datetime NOT NULL,
  `Guia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_cliente`, `num_pedido`, `id_estado`, `fecha_borrador`, `fecha_solicitud`, `fecha_despachado`, `Guia`) VALUES
(264, 2, '2023', 2, '2023-12-07 10:54:30', '2023-12-07 11:05:20', '0000-00-00 00:00:00', ''),
(265, 2, '0', 1, '2023-12-07 11:06:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `tipo_productos` varchar(255) NOT NULL,
  `Descripción` varchar(255) NOT NULL,
  `Marca` varchar(255) NOT NULL,
  `Modelo` varchar(255) NOT NULL,
  `Caracteristicas` varchar(255) NOT NULL,
  `Capacidad` varchar(255) NOT NULL,
  `Dispositivo` varchar(255) NOT NULL,
  `Medidas` varchar(255) NOT NULL,
  `Producto` varchar(255) NOT NULL,
  `Stock` int(255) NOT NULL,
  `id_ubicacion` int(255) NOT NULL,
  `precio_publico` int(255) NOT NULL,
  `Precio_distribuidor` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `tipo_productos`, `Descripción`, `Marca`, `Modelo`, `Caracteristicas`, `Capacidad`, `Dispositivo`, `Medidas`, `Producto`, `Stock`, `id_ubicacion`, `precio_publico`, `Precio_distribuidor`) VALUES
(1, 'RAM', 'Memoria RAM', 'Skyd', '1333 NB', 'Son solo Para equipos de escritorio no son para todo en uno', 'DDR3 4GB', 'PC', 'N/A', 'Nuevo', 6, 1, 42000, 0),
(2, 'RAM', 'Memoria RAM', 'Skyd', '1600 Pc', 'Son compatibles con 1333Mhz / 1600Mhz Son solo para portátiles y para todo en uno.', 'DDR3 4GB', 'Portatil', 'N/A', 'Nuevo', 6, 1, 42000, 0),
(3, 'RAM', 'Memoria RAM', 'Skyd', 'CT8G4SFS8266', 'Si eres fanático de los juegos en línea o lo usas para trabajar con programas o aplicaciones pesadas esta memoria es para ti. Gracias a su velocidad de 2666 MHz podrás disfrutar de un alto rendimiento y hacer tus trabajos de manera rápida y efectiva.', 'DDR4 8GB', 'PC', 'N/A', 'Nuevo', 6, 1, 81000, 0),
(4, 'RAM', 'Memoria RAM', 'Crucial', 'CT8G4SFS8266', 'Con su tecnología DDR4 mejorará el desempeño de tu equipo ya que opera en 3 y 4 canales generando mayor fluidez y velocidad en la transferencia de datos. Optimiza al máximo el rendimiento de tu ordenador', 'DDR4 8GB', 'Portatil', 'N/A', 'Nuevo', 6, 1, 81000, 0),
(5, 'HDD', 'Disco Duro', 'Seagate', 'ST2000VM003', 'Más velocidad a tu alcance Este producto posee una interfaz SATA III que se encarga de transferir datos con la placa madre de tu computadora. Es de gran importancia y con su velocidad de envío de información mejora el rendimiento. Podrás cargar todo tipo ', '1TB', 'PC', 'N/A', 'Nuevo', 6, 1, 120000, 0),
(6, 'SSD', 'Disco solido', 'Samsung', 'MZ-77E4T0BW', 'Samsung ofrece un rendimiento mejorado de lectura escritura resistencia y eficiencia de administración de energía. Con múltiples factores de forma el 860 EVO es ideal para PC y portátiles convencionales.', '2TB', 'Portatil', 'N/A', 'Nuevo', 6, 1, 537000, 0),
(7, 'SSD', 'Disco solido', 'Kingston', 'A400', 'Arranques cargas y transferencias de archivos todos con mayor rapidez Más fiable y duradera que las unidades de disco duro Varias capacidades para almacenar las aplicaciones o sustituir del todo unidades de disco duro.', '240 GB', 'Portatil', 'N/A', 'Nuevo', 6, 1, 81000, 0),
(8, 'SSD', 'Disco solido', 'Neutron', 'N/A', 'Está diseñado para proporcionar un rendimiento rápido y confiable con una interfaz SATA III tecnología NAND de alta calidad y un controlador eficiente.', '128 GB', 'Portatil', 'N/A', 'Nuevo', 6, 1, 81000, 0),
(9, 'SSD', 'Disco solido', 'PNY', 'SSD7CS900', 'Resguarda todo tipo de información sensible a través de su sistema de seguridad incorporado. Su defensa es inquebrantable. Más velocidad a tu alcance Este producto posee una interfaz SATA III que se encarga de transferir datos con la placa madre de tu com', '480 GB', 'Portatil', 'N/A', 'Nuevo', 6, 1, 102000, 0),
(10, 'SSD', 'Disco solido', 'Patriot', 'P210S1TB25', 'Con la unidad en estado sólido Patriot incrementarás la capacidad de respuesta de tu equipo. Gracias a esta tecnología podrás invertir en velocidad y eficiencia para el inicio la carga y la transferencia de datos.', '1TB', 'Portatil', 'N/A', 'Nuevo', 6, 1, 200000, 0),
(11, 'Chasis-Xtech', 'Gabinete', 'RXE', 'A03', 'ofreciendo no solo un aspecto atractivo sino también características funcionales que mejoran el rendimiento y la experiencia de juego. Estas características hacen que los gabinetes gamers sean una elección popular para aquellos que buscan construir una co', 'N/A', 'N/A', 'Altura x Ancho x Largo 378 mm x 190 mm x 447 mm', 'Nuevo', 1, 3, 209000, 0),
(12, 'Chasis-1908', 'Gabinete', 'Unitec', '1908', 'ofreciendo no solo un aspecto atractivo sino también características funcionales que mejoran el rendimiento y la experiencia de juego. Estas características hacen que los gabinetes gamers sean una elección popular para aquellos que buscan construir una co', 'N/A', 'N/A', 'alto 48cm Ancho 2cm Profundidad 35cm', 'Nuevo', 1, 3, 240000, 0),
(13, 'Fuente de Poder', 'Fuente de alimentacion', 'Unitec', 'ATX-750W', 'Voltaje 115V/230V', 'N/A', 'PC', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(14, 'Mouse', 'Mouse Vertical', 'Startec', 'ST-MO-81', 'Peso 75g interfaces USB', 'N/A', 'Pc y Portatil', 'N/A', 'Nuevo', 6, 1, 35000, 0),
(15, 'Mouse', 'Mouse Kaku', 'BLUELANS', '54903', 'Ratón óptico inalámbrico para juegos Mouse ergonómico portátil de 2.4 GHz rojo para Pc escritorio oficina entretenimiento Accesorios para ordenador portátil', 'N/A', 'PC y Portatil', 'Tamaño: 108 cm x 75 cm x 38 cm/425 x 295 x 150', 'Nuevo', 6, 1, 14000, 0),
(16, 'Mouse', 'Mouse Optico', 'Medellín Electrónica', 'B100', 'Botón tecla: mouse óptico Interfaz USB', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 15000, 0),
(17, 'Mouse', 'Mouse Gamer', 'AAA technology & accesorios', 'AAA-428', 'Mouse para juegos con retroiluminación', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 38000, 0),
(18, 'Mouse', 'Mouse Gamer optico', 'N/A', 'T79', 'Sensación suave y cómoda al tacto', 'N/A', '', 'N/A', 'Nuevo', 6, 1, 20000, 0),
(19, 'Mouse', 'Mouse Inalambrico', 'Unitec', 'V1', 'Mouse inalambrico ergonomico con apariencia corporativa con larga vida util. requiere pila AA', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 42000, 0),
(20, 'Fan cooler', 'Ventiladores prismatic', 'N/A', 'N/A', 'Velocidad de rotación 650 RPM Velocidad de rotación 2000 RPM', 'N/A', 'PC', 'Diámetro de ventilador: 12 cm ', 'Nuevo', 6, 1, 150000, 0),
(21, 'Audifonos', 'Auriculares ajustables', 'JEDEL', 'JD-808', 'Resistencia 32 ohmios dimension del microfono 6.0 x5.0 Frecuencia de respuesta: 20hz-20khz', 'N/A', 'PC y Portatil', 'Diámetro del auricular 40mm', 'Nuevo', 6, 1, 140000, 0),
(22, 'Audifonos', 'Auriculares Gmaer', 'Unitec', '29UTXBLAD5', 'El diseño over-ear genera una comodidad insuperable gracias a sus suaves almohadillas. Al mismo tiempo su sonido envolvente del más alto nivel se convierte en el protagonista de la escena.', 'N/A', 'PC y Portatil', 'Largo de cable 2m', 'Nuevo', 6, 1, 80000, 0),
(23, 'Audifonos', 'Auriculares Gamer', 'AAA', '601', 'Rango de frecuencia: 12 22000Hz Conector de audio y micrófono de plug 3.5mm Con control de volumen incorporado', 'N/A', 'PC y Portatil', 'Tamaño de bocina: 40mm Largo del cable aproximado 1.7 metros ', 'Nuevo', 6, 1, 70000, 0),
(24, 'Audifonos', 'Auriculares Gamer', 'AAA', '401', 'Impedancia: 32ohms Rango de frecuencia 12-22000Hz Conector de audio y micrófono de plug 3.5mm', 'N/A', 'PC y Portatil', 'Tamaño de bocina: 40mm Largo del cable aproximado 1.7 metros', 'Nuevo', 6, 1, 55000, 0),
(25, 'Audifonos', 'Auriculares Gamer', 'Redragon', 'Themis 2', 'USB para Luz Led 1 Conector USB Funciona para PC / PS3 / PS4 Iluminación Luz LED Aísla el sonido exterior', 'N/A', 'PC y Portatil', 'Largo del cable: 90 cm Tamaño del tweeter: 2 pulg', 'Nuevo', 6, 1, 75000, 0),
(26, 'Parlantes', 'Bocinas de Sonido', 'Unitec', 'U-P-430', 'Conexión USB 2.0 Cable 3.5 mm Sonido 3w x 2=6w Señal de sonido 70db Voltaje de entrada 0.8v Frecuencia de respuesta 90 hz-20 khz Switch on/off Control de volumen', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(27, 'Parlantes', 'Bocinas de Sonido', 'JEDEL', 'N/A', 'sonido natural con una gran claridad y precisión que se dispersa de manera uniforme. Un parlante que asegura potencia y calidad por igual en la reproducción de contenidos multimedia.', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 20000, 0),
(28, 'Parlantes', 'Barra de Sonido', 'MOXOM', 'SK02', 'Altavoz Bluetooth para cine en casa V5.0 altavoz de sonido envolvente MOXOM barra de sonido de 5 V CC para TV en casa', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(29, 'Parlantes', 'Bocinas de Sonido', 'Unitec', 'Super Bass', 'Tamaño del cable 110 cms Tamaño de los parlantes: alto 14.0 x ancho 9.0 x profundo 10.0 cms', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(30, 'Combo Gamer', 'Teclado y Mouse Gamer', 'Makrointel', '905', 'Combo Gamer Teclado Y Mouse Retroiluminado Rgb Alambrico para PC. Combo Iluminado multicolor con diseño ergonómico. Retroiluminado Mouse y teclado.', 'N/A', 'PC', 'N/A', 'Nuevo', 6, 1, 120000, 0),
(31, 'Microfono', 'Microfono ajustable', 'Trust', '21674', 'Su patrón polar omnidireccional ofrece una respuesta de sensibilidad constante gracias a su ángulo de cobertura de 360º. ¡Vas a poder percibir sonidos en todas las direcciones!', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 30000, 0),
(32, 'Multiconector', 'Multienchufes', 'Unitec', 'U-1200', 'mantendrás tus equipos electrónicos a salvo cuando ocurran variaciones en la línea eléctrica. Gracias a este aparato la protección contra daños o pérdida de información estará garantizada.', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(33, 'Base Refrigerante', 'Refrigeracion para portatil', 'ICECOOREL', 'A3', 'Siete niveles de ajuste de altura libremente sin cansarse Juego Largo siete niveles para ajustar la altura del soporte cambiar el ángulo de visión.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 120000, 0),
(34, 'Base Refrigerante', 'Refrigeracion para portatil', 'Cooling Pad', '638B', 'Se conecta al puerto USB de tu portatil y listo! Ventilador de Alto Rendimiento y Extraordinariamente Silencioso. Diseño delgado y elegante con sistema de inclinación.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 45000, 0),
(35, 'Base Refrigerante', 'Refrigeracion para portatil', 'Unitec', 'H9', '3 ángulos de inclinación. 6 ventiladores de alta velocidad / velocidad ajustable. Permite conexión USB de aparatos electrónicos. 2 puertos USB 20. Luces LED Azules Ultra silencioso', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 95000, 0),
(36, 'Base Refrigerante', 'Refrigeracion para portatil', 'unitec', 'N10', 'Con su diseño compacto y silencioso este ventilador se ajusta perfectamente a la base de su portátil y lo mantiene a una temperatura óptima durante largas sesiones de juego o trabajo. Su sistema de dos ventiladores de alta calidad evita el sobrecalentamie', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 140000, 0),
(37, 'MousePad', 'Base para arrastrar Mouse', 'Generica', 'Gaming', 'Diseño Plano Ancho 80cm Largo 30cm Grosor  3mm Tipo Speed', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 60000, 0),
(38, 'Fundas', 'Para guardar Portatil', 'MV MARCAS', 'Fundas Portátil', 'Fácil uso protege tu equipo un estilo fresco y elegante. Medidas 12" 23x31cm Medidas 13" 26x33cm Medidas 14" 27x35cm Medidas 15.6" 29x38cm', 'N/A', 'N/A', '12 pulgadas', 'Nuevo', 6, 1, 25000, 0),
(39, 'Fundas', 'Para guardar Portatil', 'MV MARCAS', 'Fundas Portátil', 'Fácil uso protege tu equipo un estilo fresco y elegante. Medidas 12" 23x31cm Medidas 13" 26x33cm Medidas 14" 27x35cm Medidas 15.6"  29x38cm', 'N/A', 'N/A', '14 pulgadas', 'Nuevo', 6, 1, 35000, 0),
(40, 'UPS', 'Almacenador de energia', 'Unitec', 'UN-I 1500VA', 'Ups Unitec Interactiva 1500va / 900w 6 Tomas Regulador Voltaje Supresor', 'N/A', 'PC', 'N/A', 'Nuevo', 6, 1, 290000, 0),
(41, 'UPS', 'Almacenador de energia', 'Unitec', 'UN-i 850', 'UPS Interactiva Unitec UN-I850 Nueva presentación Diseño interactivo ahorradora de energía Cuenta con auto reinicio cuando regresa la energía Protege su equipo de alti-bajos de energía y contra cortos circuitos Microprocesador con 2 etapas de impulso y 1 ', 'N/A', 'PC', 'N/A', 'Nuevo', 6, 1, 285000, 0),
(42, 'CONSOLA', 'Juego Portátil', 'generica', 'Portatil', 'Soporta 5 formatos de Juegos con 900 juegos precargados Nuevo Diseño de Joystick mejorado para una experiencia más destacada Se puede conectar a la TV para una pantalla más grande y una Mejor experiencia Compacto y liviano con cuerpo delgado llévelo con u', 'N/A', 'PC', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(43, 'Convertidor HD', 'Adaptador de video HD', 'WD', 'Chr-03', 'Con este convertidor podrá conectar dispositivos con salida HDMI como consolas cámaras DVD etc a sus aparatos con entrada análoga RCA como TV antiguos o proyectores', 'N/A', 'PC', 'N/A', 'Nuevo', 6, 1, 35000, 0),
(44, 'Cargador', 'Cargador de portatil', 'Unitec', 'AC', 'voltaje de salida: 19v amperaje 237 A voltaje de entrada: 100v-240v 50/60hz ongitud cable DC 1.2M material incombustible para pcchip inteligente para duplicar la vida útilplaca pcb de fibra de vidrio con una vida util mas larga', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 48900, 0),
(45, 'Cargador', 'Cargador de portatil', 'Diamond', 'N/A', 'Experimenta la calidad y el rendimiento inigualables del Cargador para Portátil Diamond. ¡Hazlo tuyo hoy mismo y lleva tu experiencia de carga al siguiente nivel!', 'N/A', '', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(46, 'Cargador', 'Cargador de portatil', 'Neotek', '', 'Ya sea que estés en la oficina en el campus universitario o de viaje el Cargador para Portátil Neotek te ofrece la confiabilidad y la potencia que necesitas para mantenerte conectado y productivo.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 65000, 0),
(47, 'CABLE', 'Cable HDMI', 'SKY', '2022', 'CABLE HDMI 15 METROS BLINDADO V 1.4 SOPORTE 3D 4K Nuevo modelo forrado en fibra con blindaje electro magnético y puntas reforzadas. Cable Ultra HD (4k) HDMI 1.4a / compatible con HDMI 2.0 con Ethernet conexión de componentes AV con ARC Audio Return Channe', 'N/A', 'PC', 'N/A', 'Nuevo', 6, 1, 40000, 0),
(48, 'CABLE', 'Cable de RED', 'Generico', 'Cat5', 'cables Ethernet o los cables de red se utilizan muy a menudo para conectar switches Ethernetro tu ters y computadores en redes de área local.', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 7900, 0),
(49, 'Convertidor HDMI', 'Cable Convertidor HDMI a VGA', 'Unitec', 'hdmi-vga', 'Convierta el puerto de salida HDMI a una entrada VGA. Admite resoluciones de hasta 1920x1080 1080p Full HD incluidas 720p y 1600x1200 para monitores o proyectores HD de 60Hz.', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 38000, 0),
(50, 'Adaptador', 'Convertidor Display', 'Seisa', 'SM--C7824', 'Este adaptador puede proporcionar señal de audio y vídeo digital de alta definición a la pantalla en formato de datos de paquete. Permite actualizaciones selectivas del área de la pantalla y proporciona las funciones de ahorro de energía necesarias para l', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 38000, 0),
(51, 'Tarjeta de Red USB', 'USB adaptador', '‎FASJ', 'FASJ0fDvH', 'Antena USB 2.0 Inalámbrico 802.IIN 900 Mbps. Ideal para navegar por internet y juegos en línea proporciona dos modos de trabajo infraestructura y Ad-Hoc tecnología CCA mejora la estabilidad de su señal automáticamente evitando conflictos de canal cifrado ', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 35000, 0),
(52, 'Memoria USB', 'Memoria USB', 'Kingston', 'DTXM/32GB', 'Más seguro y práctico Con este dispositivo podrás mantener tus archivos siempre protegidos. Además su uso es muy práctico: solo debes conectarlo al aparato y arrastrar los archivos hasta la unidad.', '32GB', 'Cualquier Dispositivo', 'N/A', 'Nuevo', 6, 1, 32000, 0),
(53, 'Lector de memoria', 'Lector de memoria interno', 'N/A', 'Vcom', 'Lector de tarjetas interno ultra delgado fácil de llevar sin necesidad de conexión de poder que cuenta con un puerto USB 1.1 y 2.0 para que conectes todos los accesorios periféricos que necesites además te permite pasar información a tu PC a una alta velo', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 20000, 0),
(54, 'Bluetooth', 'USB Bluetooth', 'USB DONGLE', '5.0', 'Adaptador USB Bluetooth Micro 5.0 Simplemente conecte el Adaptador Bluetooth USB 4.0 al puerto USB de su ordenador y ya está listo para conectarse de forma inalámbrica con un teclado Bluetooth mouse bluetooth impresora celular audífonos joystick parlante ', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 30000, 0),
(55, 'Hub USB', 'Multiplicador USB', 'Generica', 'HUBUSB1A4', 'Multiplicador de puertos USB 3.0 que permite conectar hasta 4 dispositivos USB con velocidades de transmisión de hasta 5Gbps. Plug and play (no requiere instalación de drivers/controladores). puerto USB.', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 43000, 0),
(56, 'Tarjeta de Red USB', 'Convertidor USB', 'Shanrya', 'USB 3.0 ETHERNET ADAPTE', 'Admite capacidad de auto detección de 10/100/1000 Mbps Interfaz USB 3.0 Compatible con versiones anteriores de USB 2.0 Admite Auto MDIX autodetección de cable de red directa y cruzada Admite modos USB completos y de alta velocidad con capacidad de aliment', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 40000, 0),
(57, 'Cargador', 'Cargador de portatil Acer', 'Generico calidad Elite', 'A11-065N1A', 'garantizan la mejor relación precio beneficio del Mercado. Sin duda es la mejor elección para tener un cargador de la mejor calidad a un precio accequible', 'N/A', 'Portatil', 'N/a', 'Nuevo', 6, 1, 65000, 0),
(58, 'Cargador', 'Cargador de portatil HP', 'Tudson', '240-g2', 'permite cargar la batería de tu portátil más rápido que los cargadores convencionales. Es muy útil en situaciones de emergencia o cuando se necesita cargar la batería de manera eficiente.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(59, 'Cargador ', 'Cargador de Portatil Asus vivobook', 'Generico', 'ADP-65GD', 'Los cargadores ASUS VivoBook son hechos para cargar laptops de esta serie, con un voltaje y amperaje específicos, conectores adaptados y protecciones de seguridad.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(60, 'Cargador ', 'Cargador para Portatil Lenovo', 'Lenovo', 'ADLX65CCGU2A', 'diseñados para cargar las computadoras portátiles de la marca Lenovo. Cuentan con un voltaje y amperaje específicos, así como un conector adaptado para los puertos de carga de estos dispositivos.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(61, 'Cargador', 'Cargador para Portatil Toshiba', 'Generica', 'N/A', ' Estos cargadores tienen especificaciones eléctricas y un conector diseñado específicamente para los modelos de Toshiba, lo que garantiza una carga segura y eficiente. ', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 65000, 0),
(62, 'Cargador', 'Cargador para Portatil Hp mini', 'Generico', 'N/A', 'Estos cargadores tienen voltajes y amperajes específicos, así como conectores diseñados para los puertos de carga de los modelos HP Mini, lo que asegura una carga segura y eficiente. ', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(63, 'Cargador', 'Cargador para Portatil Dell', 'Tudson', 'Inspiron N4050\r\n', 'Estos cargadores tienen especificaciones eléctricas y un conector diseñado específicamente para los modelos de Dell, lo que garantiza una carga segura y eficiente.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(64, 'Cargador', 'Cargador para Portatil Dell aguja', 'Generica', 'VARIOS\n', '\r\nCargadores Dell con punta de aguja diseñados para portátiles Dell que emplean puertos con esta clavija especial. Estos cargadores son compatibles con modelos específicos que utilizan este tipo de conector.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 65000, 0),
(65, 'Cargador', 'Cargador para Portatil HP aguja', 'HPJL\r\n', 'Dv4 Dv5 Dv6 Compaqcq40/50/60\r\n', 'Estos cargadores son específicos para los modelos de HP que utilizan este tipo de conector, y se deben usar para garantizar una carga segura y eficiente en dichos dispositivos. ', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 65000, 0),
(66, 'Cargador', 'Cargador para Portatil HP punta amarilla', 'EXA', '5457\r\n', 'Los cargadores HP con punta amarilla son diseñados para modelos de HP que usan este tipo de conector. Debes usar el cargador original o uno compatible de HP para una carga segura y eficiente.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(67, 'Cargador', 'Cargador para Portatil Lenovo punta usb', 'Jtech', '11252', 'Cargador Lenovo para laptops con punta USB gamer de 20V, diseñado para modelos específicos de Lenovo. Utiliza el cargador recomendado para un rendimiento óptimo.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 150000, 0),
(68, 'Cargador', 'Cargador para Portatil Lenovo punta usb', 'Digital MTX\r\n', '2051', ' diseñado para cargar laptops Lenovo que utilizan un conector de tipo USB. Estos cargadores son compatibles con los modelos de Lenovo que requieren esta conexión específica.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(69, 'Cargador', 'Cargador de portatil Universal targus', 'N/A', 'N/A', ' son diseñados para cargar una variedad de dispositivos, como laptops y otros equipos electrónicos, utilizando una gama de conectores intercambiables. Estos cargadores son versátiles y ajustables para adaptarse a diferentes marcas y modelos.', 'N/A', 'Varios', 'N/A', 'Nuevo', 6, 1, 95000, 0),
(70, 'Cargador', 'Cargador para Portatil Toshiba 15v', 'Toshiba', 'L45-SP2066\r\n', 'El "cargador Toshiba de 15V a 4A" está hecho para dispositivos Toshiba que necesitan 15 voltios y 4 amperios de potencia. Utiliza el cargador recomendado para un rendimiento adecuado.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 65000, 0),
(71, 'Cargador', 'Cargador para Portatil macbook tipo C', 'Apple', 'USB-C 29W - 61W', 'MacBook con conexión USB tipo C es la capacidad de suministrar energía y transferir datos mediante un solo cable. ', 'N/A', 'N/A', 'N/A', 'Nuevo', 6, 1, 195000, 0),
(72, 'Cargador', 'Cargador para Portatil Lenovo tipo C', 'Genérico Calidad Elite', 'N/A', 'cargador diseñado para cargar laptops Lenovo que utilizan puertos USB-C. Estos cargadores son compatibles con una variedad de modelos de Lenovo y aprovechan la tecnología de carga y transferencia de datos a través de puertos USB-C.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 125000, 0),
(73, 'Cargador', 'Cargador para Portatil Mcbook safe 1', 'Tecno\r\n', 'CARGADOR PARA MAC 60W MAGSAFE1\r\n', 'MacBook genuino incluyen su certificación de Apple, suministro de energía preciso, carga eficiente, protecciones de seguridad y un diseño compacto y seguro. Estas características garantizan un rendimiento óptimo y seguro para tu MacBook.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 185000, 0),
(74, 'Cargador', 'Cargador para Portatil Mcbook safe 2', 'Hepa\r\n', 'MacBook\r\n', 'MacBook genuino incluyen su certificación de Apple, suministro de energía preciso, carga eficiente, protecciones de seguridad y un diseño compacto y seguro. Estas características garantizan un rendimiento óptimo y seguro para tu MacBook.	', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 195000, 0),
(75, 'Cargador', 'Cargador de Portatil HP Spectre', 'Homologado Calidad Premium\r\n', 'HP Spectre x360 Convertible Tipo C\r\n', 'El cargador HP Spectre es diseñado para cargar portátiles HP Spectre de manera segura y eficiente, con un conector específico y protecciones de seguridad. Se recomienda usar un cargador genuino o recomendado por HP para un funcionamiento óptimo.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(76, 'Cargador', 'Cargador de Portatil Acer Nitro', 'Acer\r\n', 'PA-1131-05 o PA-1131-16\r\n', 'El cargador Acer Nitro es diseñado para cargar laptops Acer de la serie Nitro de manera segura y eficiente, con un conector específico. Se recomienda usar uno genuino o recomendado por Acer para un rendimiento y seguridad óptimos.', 'N/A', 'Portatil', 'N/A', 'Nuevo', 6, 1, 150000, 0),
(77, 'Router', 'Router de Wifi', 'N/A', 'LV-WR07', 'Un router inalámbrico Wireless-N es una elección destacada para quienes buscan conectividad superior con características avanzadas que garantizan velocidad, confiabilidad y cobertura amplia en múltiples dispositivos.', 'N/A', 'Varios', 'N/A', 'Nuevo', 6, 1, 75000, 0),
(78, 'Usb-Adapta-Wifi', 'Adaptador Usb Wifi', 'N/A', 'N/A', 'Los adaptadores Wi-Fi Alfa son una elección confiable para fortalecer la conexión inalámbrica. Gracias a su potente señal, amplia compatibilidad y facilidad de uso, son ideales para mejorar la conectividad en diversas situaciones.', 'N/A', 'PC/Portatil', 'N/A', 'Nuevo', 6, 1, 45000, 0),
(79, 'Puntero-Usb', 'Puntero Laser Presentador Dm Pp-1000 Negro', 'DM', 'PP1000', 'El Puntero Láser Presentador DM PP-1000 Negro es imprescindible para presentadores. Ofrece control preciso y comodidad con su función de control remoto, accesorios útiles y compatibilidad versátil. Un aliado confiable para presentaciones exitosas.', 'N/A', 'PC y Portatil', 'N/A', 'Nuevo', 6, 1, 85000, 0),
(81, 'Chasis-Iceberg', 'Gabinete', 'N/A', 'N/A', 'Este chasis destaca por su excelente diseño, destacando especialmente su eficiente flujo de aire y la facilidad que ofrece para organizar el cableado.', 'N/A', 'N/A', 'Altura x Ancho x Largo 477 mm x 216 mm x 403 mm', 'Nuevo', 1, 3, 214500, 0),
(82, 'Chasis Atx', 'Gabinete', 'Unitec', '11147', 'Este chasis ATX Gamer de la línea RGB Vidrio Unitec combina un diseño atractivo con un rendimiento excepcional. Con paneles de vidrio templado y una iluminación RGB personalizable, ofrece una experiencia visual impactante.', 'N/A', 'N/A', 'N/A', 'Nuevo', 1, 3, 199000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id`, `descripcion`) VALUES
(1, 'Comuneros primer piso'),
(2, 'Comuneros segundo piso'),
(3, 'Las américas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Ciudad` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Empresa` text NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `rol` int(255) NOT NULL,
  `Nit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombre`, `Ciudad`, `Correo`, `Empresa`, `Direccion`, `Telefono`, `Pass`, `rol`, `Nit`) VALUES
(1, 'Harold', 'Colombia', 'pedidosucs@gmail.com', 'UCS', '', '', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(2, 'Farid Danilo', 'Colombia', 'fdgrijalbac@gmail.com', 'UCS', 'Calle 27 a #51 bis 12', '311 5699427', '62bf43e2db266caa78d4f0bd18fb5f7e', 2, 1117930623),
(3, 'Diego Grijalba', 'Colombia', 'Grijalbacorp@gmail.com', 'Medilaser', 'Calle 27 a #51 bis 12', '311 8088023', '078c007bd92ddec308ae2f5115c1775d', 2, 7721419);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `estados_pedidos`
--
ALTER TABLE `estados_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `num_pedido` (`num_pedido`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_productos` (`tipo_productos`),
  ADD KEY `Ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;
--
-- AUTO_INCREMENT de la tabla `estados_pedidos`
--
ALTER TABLE `estados_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD CONSTRAINT `detalles_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_pedidos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estados_pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
