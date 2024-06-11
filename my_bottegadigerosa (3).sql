-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2024 at 08:44 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_bottegadigerosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrello`
--

CREATE TABLE `carrello` (
  `prodotto_id` int(11) NOT NULL,
  `carrello_id` int(11) NOT NULL,
  `utente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrello`
--

INSERT INTO `carrello` (`prodotto_id`, `carrello_id`, `utente_id`) VALUES
(41, 106, 23),
(46, 107, 23);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nome_categoria`) VALUES
(1, 'Frutta'),
(2, 'Verdura'),
(3, 'Salumi'),
(4, 'Formaggi'),
(5, 'Carne'),
(6, 'Pesce'),
(7, 'Pane_e_Prodotti_da_forno'),
(8, 'Pasta'),
(9, 'Riso_e_Cereali'),
(10, 'Legumi'),
(11, 'Olio_e_Condimenti'),
(12, 'Bevande_Analcoliche'),
(13, 'Bevande_Alcoliche'),
(14, 'Dolci_e_Snack'),
(15, 'Prodotti_Lattiero_Caseari'),
(16, 'Prodotti_da_Forno'),
(17, 'Prodotti_da_Colazione'),
(18, 'Detersivi_per_la_Casa'),
(19, 'Prodotti_per_la_Pulizia_Personale'),
(20, 'Accessori_per_la_Cucina'),
(21, 'Pasticceria'),
(22, 'Prodotti per la casa'),
(23, 'Igiene personale'),
(24, 'Frutta_Secca');

-- --------------------------------------------------------

--
-- Table structure for table `dati_utente`
--

CREATE TABLE `dati_utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dati_utente`
--

INSERT INTO `dati_utente` (`id`, `nome`, `email`, `password`, `telefono`, `admin`) VALUES
(23, 'Thomas Vita', 'thomasvitacell@gmail.com', '$2y$10$45DV/Y5sUna0rUvO5eVbKuL7P82KEndV5VhLnI0FkmWDSirLUpCTi', '3460705905', 0),
(24, 'd', 'd@d', '$2y$10$JYO3Zqpo4b8EolaD64yqlubqtLBNxsBlTOwtqv4Dg.0x0A75b7aH2', 'd', 0),
(25, 'pippo baudo', 'pippoforo@tiscali.it', '$2y$10$bpR8eWj95bd7mWTf.l9OheJ4o1DN8FIGQammlmgbTOP0zAam3fGj2', '2828282828', 0),
(26, 'Laura Pesenti Bolò', 'laurapesentib@gmail.com', '$2y$10$FBw6GPsgSkXMzrz.IRDS3ejRQfwdUQCM9Db4c1kPAx5r9O.AuU3l2', '3467214151', 0),
(27, 'luigia francesconi', 'wlagabriella@gmail.com', '$2y$10$p8ZNVr9LxsAusvhmEUjypuH3AHTUsY9Ekt2Gy.DE4mCCCSGAGcBMC', '2749036718', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dipendenti`
--

CREATE TABLE `dipendenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `data_di_nascita` date DEFAULT NULL,
  `ruolo` varchar(255) DEFAULT NULL,
  `url_foto` varchar(255) DEFAULT NULL,
  `descrizione` text,
  `tema` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dipendenti`
--

INSERT INTO `dipendenti` (`id`, `nome`, `cognome`, `data_di_nascita`, `ruolo`, `url_foto`, `descrizione`, `tema`) VALUES
(1, 'Barbara', 'Pesenti Bolò', '1980-12-18', 'Responsabile', 'assets/images/Dipendenti/Barbara.jpg', 'Le nuove generazioni', 'Degna erede commerciale dei genitori, ha portato avanti l\'attività nonostante le grosse problematiche del periodo e con non pochi sacrifici per non lasciare senza un piccolo appoggio alimentare le persone anziane o impossibilitate a muoversi in auto che abitano nel paese di Gerosa.'),
(2, 'Rita', 'Pesenti Rossi', '1945-11-28', 'Dipendente Capo', 'assets/images/Dipendenti/Rita.jpg', 'La Gabriella del villaggio', 'Conosciuta da tutti come "Gabri", seconda moglie di Alfredo dapprima ha aiutato il marito nell\'attività, poi ha continuato sola con tanta passione e spirito di sacrificio.'),
(3, 'Alfredo', 'Pesenti Bolò', '1924-06-17', 'Fondatore', 'assets/images/Dipendenti/Alfredo.jpg', 'La causa prima di ogni cosa', 'Capostipite della famiglia, Cavaliere della Repubblica e Croce al merito di guerra. Dal 1960 insieme alla prima moglie Elsa Arnoldi apre l\'attività commerciale che comprende sia il negozio di generi alimentari, frutta, verdura, salumi, formaggi e utili per la casa, ma anche il commercio di prodotti locali tipici della zona. Uomo di grande abilità commerciale e importante carisma personale.'),
(4, 'Anna', 'Verdi', '1975-08-10', 'Cassiera', 'assets/images/Dipendenti/Anna.jpg', 'La passione per il cibo e per il cliente', 'Specialista in gastronomia e mixology, porta un tocco personale ai prodotti del nostro negozio.'),
(5, 'Mario', 'Bianchi', '1988-03-25', 'Addetto alle vendite', 'assets/images/Dipendenti/Mario.jpg', 'Dedicato e affidabile', 'Esperto nella selezione di prodotti per l’home decor e l’arredamento.'),
(6, 'Sara', 'Rossi', '1990-11-15', 'Responsabile Magazzino', 'assets/images/Dipendenti/Sara.jpg', 'L’organizzazione è la sua forza', 'Si occupa della logistica e del magazzino, garantendo la qualità dei prodotti e la soddisfazione dei clienti.');

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`id`, `email`) VALUES
(1, 'thomasvitacell@gmail.com'),
(3, 'nocela3487@aramask.com'),
(4, 'collana524@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orari`
--

CREATE TABLE `orari` (
  `giorno` varchar(20) NOT NULL,
  `orario_mattino` varchar(200) DEFAULT NULL,
  `orario_pomeriggio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orari`
--

INSERT INTO `orari` (`giorno`, `orario_mattino`, `orario_pomeriggio`) VALUES
('Domenica', 'Chiuso', 'Chiuso'),
('Giovedì', '08:00 - 12:30', '15:30 - 19:00'),
('Lunedì', '08:00 - 12:30', 'Chiuso'),
('Martedì', '08:00 - 12:30', '15:30 - 19:00'),
('Mercoledì', '08:00 - 12:30', '15:30 - 19:00'),
('Sabato', '08:00 - 12:30', '15:30 - 19:00'),
('Venerdì', '08:00 - 12:30', '15:30 - 19:00');

-- --------------------------------------------------------

--
-- Table structure for table `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `prezzo` decimal(10,2) DEFAULT NULL,
  `origine` varchar(255) DEFAULT NULL,
  `fornitore` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `categoria_id`, `prezzo`, `origine`, `fornitore`) VALUES
(1, 'Taleggio D. O. P.', 4, '12.50', 'Val Taleggio', 'X'),
(2, 'Stracchino di Vedeseta', 4, '16.00', 'Vedeseta', 'X'),
(3, 'Branzi 2 mesi', 4, '14.00', 'Branzi', 'X'),
(4, 'Branzi 6 mesi', 4, '18.50', 'Branzi', 'X'),
(5, 'Rosetta', 4, '12.00', 'Branzi', 'X'),
(6, 'Alben stagionato', 4, '16.50', 'Vedeseta', 'X'),
(7, 'Strachitunt D. O. P.', 4, '22.00', 'Vedeseta', 'X'),
(8, 'Formaggella Nostrana', 4, '16.00', 'Vedeseta', 'X'),
(9, 'Roccolo ValTaleggio', 4, '17.00', 'Val Taleggio', 'X'),
(10, 'Gorgonzola', 4, '16.00', 'Lombardia', 'X'),
(11, 'Stracchino DiCapra', 4, '18.00', 'Val Brembilla', 'X'),
(12, 'Piramide di Capra', 4, '19.00', 'Val Brembilla', 'X'),
(13, 'Emmenthaler', 4, '17.00', 'Svizzera', 'X'),
(14, 'Gruyer', 4, '26.50', 'Svizzera', 'X'),
(15, 'Pratolina', 4, '14.00', 'Val Taleggio', 'X'),
(16, 'Salva Cremasco D. O. P.', 4, '14.00', 'Lombardia', 'X'),
(17, 'Pecorino Toscano', 4, '21.00', 'Toscana', 'X'),
(18, 'Fontal', 4, '24.00', 'Italia', 'X'),
(19, 'Grana Padano 18/20 mesi', 4, '17.00', 'Pianura Padana', 'X'),
(20, 'Grana Padano Grattuggiato', 4, '18.00', 'Pianura Padana', 'X'),
(21, 'Prosciutto cotto', 3, '20.00', 'X', 'X'),
(22, 'Prosciutto crudo di Parma', 3, '32.00', 'X', 'X'),
(23, 'Pancetta nostrana rasmo', 3, '18.00', 'Val Brembilla', 'X'),
(24, 'Porchetta', 3, '19.00', 'X', 'X'),
(25, 'Lardo alle erbe', 3, '20.00', 'X', 'X'),
(26, 'Salame nostrano', 3, '22.00', 'X', 'X'),
(27, 'Salame nostrano - intero', 3, '21.00', 'X', 'X'),
(28, 'Mortadella con pistacchi', 3, '19.00', 'X', 'X'),
(29, 'Bresaola', 3, '34.00', 'X', 'X'),
(30, 'Speck', 3, '19.00', 'X', 'X'),
(31, 'Coppa', 3, '25.00', 'X', 'X'),
(32, 'Roast-beef', 3, '30.00', 'X', 'X'),
(33, 'Arrosto di tacchino', 3, '20.00', 'X', 'X'),
(34, 'Cotechini gamba', 3, '11.00', 'X', 'X'),
(35, 'Salsiccia gamba', 3, '12.00', 'X', 'X'),
(36, 'Cacciatori rasmo', 3, '16.00', 'Val Brembilla', 'X'),
(37, 'Lonza di maiale', 3, '15.00', 'X', 'X'),
(38, 'Fesa di tacchino', 3, '17.00', 'X', 'X'),
(39, 'Hamburgher di manzo', 5, '16.00', 'X', 'X'),
(40, 'Mele renette', 1, '2.90', 'Italia', 'X'),
(41, 'Kiwi', 1, '4.60', 'Italia', 'X'),
(42, 'Peperoni gialli', 2, '4.60', 'Italia', 'X'),
(43, 'Pomodori ramati', 2, '2.90', 'Olanda', 'X'),
(44, 'Noci chandler', 24, '6.00', 'Stati Uniti', 'X'),
(45, 'Arachidi', 24, '2.00', 'Italia', 'X'),
(46, 'Limoni', 1, '3.20', 'Spagna', 'X'),
(47, 'Banane', 1, '2.40', 'Costa Rica', 'X'),
(48, 'Finocchi', 2, '3.50', 'Italia', 'X'),
(49, 'Zucchine', 2, '3.20', 'Italia', 'X'),
(50, 'Insalata gentile', 2, '2.80', 'Italia', 'X'),
(51, 'Carote', 2, '1.80', 'Italia', 'X'),
(52, 'Aglio rosa', 2, '13.00', 'Francia', 'X'),
(53, 'Cipolle dorate', 2, '1.90', 'Italia', 'X'),
(54, 'Patate 2kg', 2, '3.50', 'Italia', 'X'),
(55, 'Ciabattine', 7, '4.90', 'X', 'X'),
(56, 'Soffiato', 7, '4.90', 'X', 'X'),
(57, 'Lavorato, pasta dura', 7, '4.90', 'X', 'X'),
(58, 'Pane alle olive', 7, '5.30', 'X', 'X'),
(59, 'Pugliese', 7, '5.60', 'X', 'X'),
(60, 'Rex', 7, '8.90', 'X', 'X'),
(61, 'Bucheron', 7, '8.90', 'X', 'X'),
(62, 'Focaccia tonda', 7, '13.00', 'X', 'X'),
(63, 'Focaccia trancio', 7, '13.00', 'X', 'X'),
(64, 'Brioches', 7, '1.30', 'X', 'X'),
(65, 'Pane alle noci', 7, '12.50', 'X', 'X'),
(66, 'Pane raffermo', 7, '1.40', 'X', 'X'),
(67, 'Pan grattato', 16, '5.00', 'X', 'X'),
(68, 'Latte fresco 1L', 15, '2.40', NULL, 'X'),
(69, 'Latte fresco 500ml', 15, '1.30', NULL, 'X'),
(70, 'Latte microfiltrato 1L', 15, '2.40', NULL, 'X'),
(71, 'Latte UHT 500ml', 15, '1.30', NULL, 'Lactis'),
(72, 'Latte UHT 1L', 15, '1.80', NULL, 'Lactis'),
(73, 'Zymil fresco 1L', 15, '2.80', NULL, 'Zymil'),
(74, 'Zymil UHT 1L', 15, '2.10', NULL, 'Zymil'),
(75, 'Latte Parmalat UHT 1L', 15, '1.80', NULL, 'Parmalat'),
(76, 'Panna fresca 200ml', 15, '2.80', NULL, 'X'),
(77, 'Panna UHT 200ml', 15, '1.80', NULL, 'X'),
(78, 'Panna Chef no latt. 230ml', 15, '2.80', NULL, 'Chef'),
(79, 'Besciamella UHT 200ml', 15, '1.60', NULL, 'X'),
(80, 'Besciamella UHT 500ml', 15, '2.90', NULL, 'X'),
(81, 'Burro 250g', 15, '4.70', NULL, 'X'),
(82, 'Yogurt frutta', 15, '1.50', NULL, 'X'),
(83, 'Yogurt magro', 15, '1.50', NULL, 'X'),
(84, 'Latte soia 500ml', 15, '2.40', NULL, 'X'),
(85, 'Mozzarella', 15, '2.00', NULL, 'X'),
(86, 'Ricotta 250g', 15, '2.70', NULL, 'X'),
(87, 'Coppa Malù', 15, '2.40', NULL, 'X'),
(88, 'Mascarpone 250g', 15, '4.10', NULL, 'X'),
(89, 'Mozzarella Seriate', 15, '3.10', NULL, 'X'),
(90, 'Burro Cooperativa 250g', 15, '2.80', NULL, 'Cooperativa'),
(91, 'Burro Ant. Cremeria 250g', 15, '3.70', NULL, 'X'),
(92, 'Succhi Santal 1L', 12, '1.80', NULL, 'Santal'),
(93, 'Succhi Santal 1X3', 12, '1.90', NULL, 'Santal'),
(94, 'Insalate', 2, '1.30', NULL, 'X'),
(95, 'Piadina', 7, '1.90', NULL, 'X');

-- --------------------------------------------------------

--
-- Table structure for table `recensioni`
--

CREATE TABLE `recensioni` (
  `id` int(11) NOT NULL,
  `chi` varchar(100) DEFAULT NULL,
  `cosa` varchar(255) DEFAULT NULL,
  `voto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recensioni`
--

INSERT INTO `recensioni` (`id`, `chi`, `cosa`, `voto`) VALUES
(1, 'Cliente1', 'Mela di ottima qualità, molto gustosa!', 5),
(2, 'Cliente2', 'Prosciutto crudo delizioso, consigliatissimo!', 4),
(3, 'Cliente3', 'Mela buonissima, fresca e croccante!', 5),
(4, 'Cliente4', 'Prosciutto crudo di ottima qualità, gustoso!', 5),
(5, 'Cliente5', 'Servizio impeccabile, personale gentile e disponibile.', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`carrello_id`),
  ADD KEY `utente_id` (`utente_id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dati_utente`
--
ALTER TABLE `dati_utente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dipendenti`
--
ALTER TABLE `dipendenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orari`
--
ALTER TABLE `orari`
  ADD PRIMARY KEY (`giorno`);

--
-- Indexes for table `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrello`
--
ALTER TABLE `carrello`
  MODIFY `carrello_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `dati_utente`
--
ALTER TABLE `dati_utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `dipendenti`
--
ALTER TABLE `dipendenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `recensioni`
--
ALTER TABLE `recensioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`utente_id`) REFERENCES `dati_utente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
