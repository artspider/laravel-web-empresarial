use restaurante;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Frutas', 'Frutos comestibles obtenidos de plantas cultivadas o silvestres que, por su sabor generalmente dulce-acidulado, su aroma intenso y agradable y sus propiedades nutritivas, suelen consumirse mayormente en su estado fresco, como jugo o como postre', 'fruta', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(3, 'Legumbres', 'Las principales legumbres consumidas por los humanos son: alfalfa, chícharo, fríjol, alubia, garbanzo, habas, ejote, lentejas, cacahuate, y soya, son altamente nutricionales pues contienen: proteínas, minerales y vitaminas.', 'legumbres', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(4, 'Hierbas y raices', 'Es una planta que no presenta órganos leñosos permanentes.', 'hierbas-y-raices', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(5, 'Especias', 'Condimentos, son una serie de aromas de origen vegetal que se usan para preservar o dar sabor a los alimentos.', 'especias', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(6, 'Carne, pescado o huevo', 'La carne y el pescado aportan proteínas de alto valor biológico.', 'carne-pescado-o-huevo', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(7, 'Lácteos', 'El grupo de los lácteos incluye alimentos como la leche y sus derivados procesados. ', 'lacteos', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(8, 'Aseo', 'Detergentes, lejías, productos para lavar platos y otros', 'aseo', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(9, 'Desechables', 'Un plástico que proteja con éxito los alimentos sin añadir productos químicos o perjudicar la salud del consumidor será la mejor opción', 'desechables', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(10, 'Bebidas', 'Refrescos, jugos o agua', 'bebidas', '2021-06-10 05:00:00', '2021-06-10 05:00:00'),
(11, 'Pan', 'Pan', 'pan', '2021-06-10 05:00:00', '2021-06-10 05:00:00'),
(12, 'Guarnicion', 'Guarnición', 'guarnicion', '2021-06-10 05:00:00', '2021-06-10 05:00:00');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `units`
--

INSERT INTO `units` (`id`, `unit`, `type`, `equivalence`, `slug`, `created_at`, `updated_at`, `abbreviation`) VALUES
(1, 'Onza', 'weight', '28g', 'onza', '2021-06-08 05:00:00', '2021-06-08 05:00:00', 'oz'),
(2, 'Libra', 'weight', '16oz, 454g', 'libra', '2021-06-08 05:00:00', '2021-06-08 05:00:00', 'lb'),
(3, 'Gramo', 'weight', '0.035oz', 'gramo', '2021-06-08 05:00:00', '2021-06-08 05:00:00', 'gr'),
(4, 'Kilogramo', 'weight', '1000gr, 2.2lb', 'kilogramo', '2021-06-08 05:00:00', '2021-06-08 05:00:00', 'g'),
(7, 'Galón', 'volume', '3.8l', 'galon', '2021-06-08 05:00:00', '2021-06-08 05:00:00', 'gal'),
(8, 'Mililitro', 'volume', '0.033liq oz', 'mililitro', '2021-06-08 05:00:00', '2021-06-08 05:00:00', 'ml'),
(9, 'Litro', 'volume', '33.8liq oz', 'litro', '2021-06-08 05:00:00', '2021-06-08 05:00:00', 'l'),
(12, 'Pieza', 'solid', 'n/a', 'pieza', '2021-06-08 05:00:00', '2021-06-08 05:00:00', 'pza');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_name`, `contact_name`, `contact_title`, `address`, `suburb`, `city`, `state`, `zip`, `phone`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Sams Club', NULL, NULL, 'Periférico Sur S/N', 'El Capire', 'Iguala de la Independencia', 'Guerrero', 40070, '7333329770', 'www.sams.com.mx', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(2, 'Comercial Mexicana', NULL, NULL, 'Periférico Oriente 25', 'Río Balsas', 'Iguala de la Independencia', 'Guerrero', 40050, '7333328228', 'www.lacomer.com.mx', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(3, 'Soriana Mercado', NULL, NULL, 'Carretera Iguala Taxco km2 +120', 'San José', 'Iguala de la Independencia', 'Guerrero', 40050, '7331106698', 'www.soriana.com', '2021-06-08 05:00:00', '2021-06-08 05:00:00'),
(4, 'La Pastora', 'Pedro Delgado', 'Sr.', 'Central de Abastos, Nave 3, Local 2.', 'Insurgentes', 'Iguala', 'Gro.', 40030, '7333321765', 'www.lapastora.com.mx', '2021-06-29 01:39:37', '2021-06-29 02:18:55');

-- --------------------------------------------------------


--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `unit_id`, `price`, `stock`, `supplier_id`, `slug`, `presentation`, `brand`, `created_at`, `updated_at`, `other`, `photo`, `content`) VALUES
(1, 'Aceite vegetal', 5, 9, '32.00', '2.00', 2, 'aceite-vegetal-1-2-3-botella-de-plastico', 'Botella de plastico', '1-2-3', '2021-06-10 10:24:52', '2021-06-24 00:21:16', NULL, 'product-photos/toxviKNzGGaeogzfi3yo4QoSbCuGCvi6OFzGPPzI.jpg', '1.00'),
(2, 'Aceite de Oliva', 5, 9, '142.19', '1.99', 1, 'aceite-de-oliva', 'Botella de vidrio de un litro', 'Carbonell', '2021-06-11 00:50:43', '2021-08-24 18:09:25', 'Se ingresa primer stock del producto', 'product-photos/l1t1zyLFW4L7Y6tK9WsOfTymF9aUyUFWlZgwEOxx.png', '1.00'),
(3, 'Aceitunas', 5, 3, '74.77', '2.00', 1, 'aceitunas', 'Botella de vidrio', 'Members Mark', '2021-06-11 01:15:00', '2021-06-11 01:15:00', NULL, 'product-photos/UbjhR9WHhaLNwml7lTIfkgW4HbrhzQ2pLGiiBhIA.jpg', '880.00'),
(4, 'Agua', 10, 9, '32.00', '5.00', 1, 'agua-bonafont-botella-de-plastico', 'Botella de plástico', 'Bonafont', '2021-06-11 01:28:59', '2021-06-24 00:19:53', NULL, 'product-photos/k61SzJNprtQxZFm3yif0Rk5f40pdQ6dPHBMKuzir.jpg', '20.00'),
(5, 'Aguacate', 2, 4, '40.00', '4.00', 2, 'aguacate', 'Granel', 'Hass', '2021-06-11 01:36:59', '2021-06-11 01:36:59', NULL, 'product-photos/agY8PK1cVrnqvEi9Hd1RFek77Lypr5fwKXglcFPs.jpg', '1.00'),
(6, 'Ajo', 3, 4, '165.00', '1.00', 2, 'ajo', 'Granel', 'Sin marca', '2021-06-11 02:25:15', '2021-06-11 02:25:15', NULL, 'product-photos/Uy7ycIWBYSpJ9Qt2v2eZERVeoMv71mF1DblfN27r.jpg', '1.00'),
(7, 'Albaca', 4, 3, '16.90', '3.00', 2, 'albaca', 'Granel', 'Sin marca', '2021-06-11 02:36:27', '2021-06-11 02:36:27', NULL, 'product-photos/dxc8eWvU50xxP15GFmdrzH0sgBTr1gPsGhOykftm.jpg', '100.00'),
(9, 'Apio', 3, 4, '40.00', '1.00', 2, 'apio', 'Granel', 'Sin marca', '2021-06-11 22:12:24', '2021-06-11 22:12:24', NULL, 'product-photos/qT2mH8bASf8l1m7uE3yvLoJH1Qkq7B1u1xmbMose.jpg', '1.00'),
(10, 'Arrachera', 6, 4, '180.00', '0.95', 1, 'arrachera', 'Granel', 'Sin marca', '2021-06-11 22:16:00', '2021-08-18 12:02:44', NULL, 'product-photos/KqGP64v20yrgsAHwGKqQtLyoBEO5hqdeJ6wXnOlq.jpg', '1.00'),
(12, 'Arroz', 3, 4, '31.50', '1.00', 1, 'arroz', 'Bolsa de plástico', 'Del Valle', '2021-06-11 22:48:20', '2021-06-11 22:48:20', NULL, 'product-photos/cy22PRY3YuGWXVR6fsKGn5vGneu2sUkCiGulroVn.jpg', '1.00'),
(13, 'Atún', 6, 3, '22.00', '3.00', 1, 'atun', 'Lata', 'Dolores', '2021-06-11 22:55:20', '2021-06-11 22:55:20', NULL, 'product-photos/7nR0pKB49HGKtWM9qyriTEs4iqgIL3kIZW8Hic8T.jpg', '140.00'),
(14, 'Chipotle', 4, 3, '10.00', '1.00', 1, 'chipotle-la-costena-lata', 'Lata', 'La Costeña', '2021-07-01 07:17:34', '2021-08-12 02:38:21', 'Lata de chiles chipotles La Costeña', 'product-photos/upHwKtASLy32eYFLQJuHfp6DXAlXXxe4zvB3HrNR.jpg', '220.00'),
(15, 'Yogurt', 7, 9, '125.00', '0.94', 1, 'yogurt-yoplait-bote-de-plastico', 'Bote de plástico', 'Yoplait', '2021-07-01 07:20:52', '2021-08-11 23:28:31', 'Yogurt natural', 'product-photos/EwoMQlDqSxPoWhSxVnUE3QxyGdRLIcjxANXBSO00.jpg', '4.00'),
(16, 'Pollo (pechuga)', 6, 4, '110.00', '2.00', 3, 'pollo-pechuga-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 09:38:05', '2021-08-01 09:38:05', 'Pechuga de pollo a granel del mercado Soriana.', 'product-photos/cNl6CZGx1gtrKLT22WxiS6AbJNgJG3qqSqoHk9qh.jpg', '1.00'),
(17, 'Queso oaxaca', 7, 4, '90.00', '0.57', 1, 'queso-oaxaca-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 09:42:30', '2021-08-17 16:22:07', NULL, 'product-photos/RUvGrlda1lkR0ElIjiFpcbjkfb87AiovJYWLenh9.jpg', '1.00'),
(18, 'Paprika', 4, 3, '22.00', '2.00', 1, 'paprika-mccormick-botella-de-vidrio', 'Botella de vidrio', 'McCormick', '2021-08-01 09:46:00', '2021-08-11 19:18:58', '', 'product-photos/OTRbOk6JJQA8lu4W3DxamsLi9JtFStFSCwwsQif5.png', '100.00'),
(19, 'Sal', 5, 4, '10.00', '2.00', 4, 'sal-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 09:47:57', '2021-08-01 09:47:57', '', 'product-photos/3Wno9YjZ155wMijbnDMfgEZ9hq9P94Mm1umlwzDY.jpg', '1.00'),
(20, 'Lechuga china', 3, 4, '20.00', '2.00', 2, 'lechuga-china-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 10:13:30', '2021-08-04 07:19:14', NULL, 'product-photos/XMT7jV77yCdTbG2yT1GwdDYXiQdV8nvRpYClQAcV.jpg', '1.00'),
(21, 'Lechuga orejona', 3, 4, '20.00', '2.00', 2, 'lechuga-orejona-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 10:14:51', '2021-08-04 07:19:32', '', 'product-photos/9elKLhVKNCHRQt89bTkLUoQg6pq7mpT4v1NdcwFr.jpg', '1.00'),
(22, 'Lechuga sangría', 3, 4, '20.00', '2.00', 2, 'lechuga-sangria-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 10:16:13', '2021-08-04 07:19:50', '', 'product-photos/G6k06GzgFr20w8HNFsd9fg602HgbN27SFf2Vcqq6.jpg', '1.00'),
(23, 'Espinaca', 3, 4, '7.32', '2.00', 1, 'espinaca-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 10:27:35', '2021-08-04 07:10:30', NULL, 'product-photos/uBCElDbYxYlCr0PKVj4kDATj7BUSkIHU6RSlOxM8.jpg', '1.00'),
(24, 'Col', 3, 4, '28.00', '1.00', 2, 'col-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 21:37:17', '2021-08-01 21:37:17', NULL, 'product-photos/tcznN7jgPMQCVJbr851OC3U0JOjRqAiYm6X7tGpY.jpg', '1.00'),
(25, 'Pimienta negra', 5, 4, '150.00', '1.00', 1, 'pimienta-negra-mccormick-botella-de-plastico', 'Botella de plastico', 'McCormick', '2021-08-01 21:49:08', '2021-08-02 06:32:24', 'Pimienta molida fina.', 'product-photos/bEOjObxnGqr8qMavC9jubPnsJyPcc2uCPMQa7waS.jpg', '1.00'),
(26, 'Zanahoria', 3, 4, '15.00', '1.00', 2, 'zanahoria-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 21:50:30', '2021-08-01 21:50:30', '', 'product-photos/Px4SwP2HnVuoLWde83ywL1Ut8DncDh7Nm5sI8gvc.jpg', '1.00'),
(27, 'Cebolla morada', 3, 4, '35.00', '2.00', 2, 'cebolla-morada-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 21:57:19', '2021-08-01 21:57:19', NULL, 'product-photos/yAlfy8NTBi06lfRzlTKmeJsjWtvfiCYJEOlZylh3.jpg', '1.00'),
(28, 'Cilantro', 3, 3, '8.00', '1.00', 2, 'cilantro-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-01 21:59:01', '2021-08-11 08:15:19', '', 'product-photos/v8oDA7zYqVXDTNg303yKaZHd9cI6TlGqCflil8JL.jpg', '100.00'),
(29, 'Mostaza Dijon', 5, 3, '26.00', '2.00', 1, 'mostaza-dijon-members-mark-botella-de-vidrio', 'Botella de vidrio', 'Members Mark', '2021-08-01 22:01:30', '2021-08-11 19:23:17', '', 'product-photos/kLhA9gz08gGkrUnA1fEF1udLqUJAza9zAnrhfFg5.jpg', '250.00'),
(30, 'Pimientos', 3, 4, '150.00', '0.83', 2, 'pimientos-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-04 00:16:31', '2021-08-24 18:09:25', 'Por lo general se pueden utilizar para todo, pues su sabor se adapta bien a muchas clases de platillos. En España, lo usan para arroces, tortillas embutidos y para otros platos, como el pulpo a la gallega. En Estados Unidos lo emplean mucho en marinadas y salsas dulces. Los guisos y estofados también son ideales con este ingrediente, pues les da color, dulzor o picor según la variedad y, sobre todo, mucha diferencia.', 'product-photos/RaJpctCVJNDRQcRf4ypo4JYN5Dq5ADlfuMtQtj72.jpg', '1.00'),
(31, 'Bolillo', 11, 12, '2.50', '0.00', 2, 'bolillo-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-04 05:22:56', '2021-08-17 16:22:07', NULL, 'product-photos/sOYzvrDIZKqxMRom6Cvzq3yXhQQ9Tv5zsU0tIrfv.jpg', '1.00'),
(32, 'Limon', 2, 4, '30.00', '1.00', 2, 'limon-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-04 06:14:24', '2021-08-04 06:28:57', 'Limón agrio', 'product-photos/C294q3S43dDlBtfq5F7Ipu6TcpuDAPITamvRUyHg.jpg', '1.00'),
(33, 'Chile serrano', 3, 4, '8.00', '1.00', 2, 'chile-serrano-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-08 18:18:45', '2021-08-08 18:18:45', NULL, 'product-photos/qNSwt3Qlb19v2w2qXpXrDGFhUPwMxHw5LMdURy0r.png', '1.00'),
(34, 'Jitomate', 3, 4, '16.00', '1.00', 2, 'jitomate-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-08 18:21:18', '2021-08-08 18:21:18', NULL, 'product-photos/iHNidiDPkaAbUvV9R48Yu4ZE63psZCSgWMrmrzNf.jpg', '1.00'),
(35, 'Cebolla', 3, 4, '8.00', '1.00', 2, 'cebolla-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-08 18:23:24', '2021-08-08 18:23:24', NULL, 'product-photos/5yX5rkJdbWM4JejOLDecIVkS4S8pR5Ui5kwnPGLv.jpg', '1.00'),
(36, 'Vino tinto', 10, 9, '50.00', '1.00', 1, 'vino-tinto-chileno-botella-de-vidrio', 'Botella de vidrio', 'Chileno', '2021-08-08 18:25:21', '2021-08-08 18:25:21', '', 'product-photos/BAl0wHDmoF2BKT3pRSKHWALsQNnhGYMBqCCGLdvL.jpg', '1.00'),
(37, 'Laurel', 5, 3, '20.00', '1.00', 4, 'laurel-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-08 18:28:07', '2021-08-08 18:28:07', NULL, 'product-photos/qqnYplytyCM2pCaSFCOsw0eZS1xxRAko1v6r7rr8.jpg', '100.00'),
(38, 'Huevos', 6, 12, '2.03', '28.00', 4, 'huevos-sin-marca-en-tapa-de-de-30-huevos', 'En tapa de de 30 huevos', 'Sin marca', '2021-08-23 17:27:08', '2021-08-24 18:09:25', NULL, 'product-photos/2SHrH1LSMXtjWZV3TTlml5cYgWW9fkdqDPYEohAf.jpg', '1.00'),
(39, 'Tortillas', 3, 4, '18.00', '2.00', 4, 'tortillas-sin-marca-a-granel', 'A granel', 'Sin marca', '2021-08-23 17:30:17', '2021-08-23 17:30:17', NULL, 'product-photos/Qrk8gbzlDaaZ2ufhMRss1hmC9CWKemwWvbhJaNCP.jpg', '1.00'),
(40, 'Nopales', 3, 4, '40.00', '0.98', 3, 'nopales-sin-marca-a-granel', 'A granel', 'Sin marca', '2021-08-23 17:32:29', '2021-08-24 18:09:25', NULL, 'product-photos/imu8QMB7yYW0gYpetc5Z2CK1wx9Ma924AcgZ6WlW.jpg', '1.00'),
(41, 'Frijoles refritos', 3, 3, '15.50', '1.91', 1, 'frijoles-refritos-la-costena-lata', 'Lata', 'La costeña', '2021-08-23 17:36:55', '2021-08-24 18:09:25', NULL, 'product-photos/07hiU1RjlYimsZPJ4YV2iA4QPC6qNOzgbBisNgzM.jpg', '580.00'),
(42, 'Champiñones', 3, 4, '81.00', '0.98', 2, 'champinones-sin-marca-a-granel', 'a granel', 'Sin marca', '2021-08-24 16:34:30', '2021-08-24 18:09:25', NULL, 'product-photos/YUs9V8vsfQDccatvcftHsFeTPabje6ScFGyQrxql.jpg', '1.00'),
(43, 'Brocoli', 3, 4, '35.00', '0.98', 2, 'brocoli-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-24 16:36:09', '2021-08-24 18:09:25', '', 'product-photos/uscfTBSpfVr3cxnB0ch9Y7xwkasYrUzytJKvu4pS.jpg', '1.00'),
(44, 'Queso de cincho', 7, 4, '120.00', '0.99', 2, 'queso-de-cincho-de-la-casa-bolsa', 'Bolsa', 'De la casa', '2021-08-24 16:58:15', '2021-08-24 18:09:25', NULL, 'product-photos/Bu4zXi4T8MsiAjYZFTFughcixruKVFR5d2wzsqVl.png', '1.00'),
(45, 'Queso panela', 7, 4, '100.00', '1.00', 2, 'queso-panela-sin-marca-granel', 'Granel', 'sin marca', '2021-08-24 17:20:37', '2021-08-24 17:20:37', '', 'product-photos/jNWLuRT7UJIN5PFxb6QiA73pG3ceGIg9aEaNa1iQ.png', '1.00'),
(46, 'Leche', 7, 9, '23.00', '4.90', 1, 'leche-lala-caja-de-carton', 'Caja de carton', 'Lala', '2021-08-24 17:42:42', '2021-08-24 18:09:25', NULL, 'product-photos/LKX3trhIb5bikXdScFKrlpbZXahPVCwAyAoYOpdz.jpg', '1.00'),
(47, 'Linaza', 3, 4, '56.37', '1.99', 2, 'linaza-sin-marca-bolsa', 'Bolsa', 'sin marca', '2021-08-24 17:50:37', '2021-08-24 18:09:25', '', 'product-photos/nE4NtK2CttF1HaMxkVPc42ZImSjUXCmilUPuHqZ6.jpg', '1.00'),
(48, 'Papaya', 2, 4, '20.00', '1.94', 2, 'papaya-sin-marca-granel', 'Granel', 'sin marca', '2021-08-24 17:53:33', '2021-08-24 18:09:25', NULL, 'product-photos/oUznK1qxYS1xiLk4LdJC9xHgGvwrTTTJtwTO916B.jpg', '1.00'),
(49, 'Fresa', 2, 4, '108.00', '1.94', 2, 'fresa-sin-marca-granel', 'Granel', 'Sin marca', '2021-08-24 17:55:12', '2021-08-24 18:09:25', '', 'product-photos/fExnGPG6NXRsToWMREHpCllJw3H5WtWvCAVTyXya.jpg', '1.00'),
(50, 'Miel', 10, 9, '150.00', '0.99', 4, 'miel-sin-marca-botella-de-vidrio', 'Botella de vidrio', 'Sin marca', '2021-08-24 17:57:15', '2021-08-24 18:09:25', '', 'product-photos/B9Gj3xpTt92mRo1Qs9g5yXtQT6oH5K2lMVeesAM5.jpg', '1.00');

-- --------------------------------------------------------