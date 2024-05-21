-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2024 at 06:47 PM
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
(1, 24, 23),
(2, 25, 23);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(255) DEFAULT NULL,
  `url_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nome_categoria`, `url_foto`) VALUES
(1, 'Frutta', 'assets/images/Categorie/Frutta/Frutta.jpg'),
(2, 'Verdura', 'assets/images/Categorie/Verdura/Verdura.jpg'),
(3, 'Salumi', 'assets/images/Categorie/Salumi/Salumi.jpg'),
(4, 'Formaggi', 'assets/images/Categorie/Formaggi/Formaggi.jpg'),
(5, 'Carne', 'assets/images/Categorie/Carne/Carne.jpg'),
(6, 'Pesce', 'assets/images/Categorie/Pesce/Pesce.jpg'),
(7, 'Pane_e_Prodotti_da_forno', 'assets/images/Categorie/Pane_e_Prodotti_da_forno/Pane_e_Prodotti_da_forno.jpg'),
(8, 'Pasta', 'assets/images/Categorie/Pasta/Pasta.jpg'),
(9, 'Riso_e_Cereali', 'assets/images/Categorie/Riso_e_Cereali/Riso_e_Cereali.jpg'),
(10, 'Legumi', 'assets/images/Categorie/Legumi/Legumi.jpg'),
(11, 'Olio_e_Condimenti', 'assets/images/Categorie/Olio_e_Condimenti/Olio_e_Condimenti.jpg'),
(12, 'Bevande_Analcoliche', 'assets/images/Categorie/Bevande_Analcoliche/Bevande_Analcoliche.jpg'),
(13, 'Bevande_Alcoliche', 'assets/images/Categorie/Bevande_Alcoliche/Bevande_Alcoliche.jpg'),
(14, 'Dolci_e_Snack', 'assets/images/Categorie/Dolci_e_Snack/Dolci_e_Snack.jpg'),
(15, 'Prodotti_Lattiero_Caseari', 'assets/images/Categorie/Prodotti_Lattiero-Caseari/Prodotti_Lattiero-Caseari.jpg'),
(16, 'Prodotti_da_Forno', 'assets/images/Categorie/Prodotti_da_Forno/Prodotti_da_Forno.jpg'),
(17, 'Prodotti_da_Colazione', 'assets/images/Categorie/Prodotti_da_Colazione/Prodotti_da_Colazione.jpg'),
(18, 'Detersivi_per_la_Casa', 'assets/images/Categorie/Detersivi_per_la_Casa/Detersivi_per_la_Casa.jpg'),
(19, 'Prodotti_per_la_Pulizia_Personale', 'assets/images/Categorie/Prodotti_per_la_Pulizia_Personale/Prodotti_per_la_Pulizia_Personale.jpg'),
(20, 'Accessori_per_la_Cucina', 'assets/images/Categorie/Accessori_per_la_Cucina/Accessori_per_la_Cucina.jpg'),
(21, 'Pasticceria', 'assets/images/Categorie/Pasticceria/Pasticceria.jpg'),
(22, 'Prodotti per la casa', 'assets/images/Categorie/Prodotti_per_la_casa/Prodotti_per_la_casa.jpg'),
(23, 'Igiene personale', 'assets/images/Categorie/Igiene_personale/Igiene_personale.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dati_utente`
--

CREATE TABLE `dati_utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dati_utente`
--

INSERT INTO `dati_utente` (`id`, `nome`, `email`, `password`, `telefono`) VALUES
(23, 'Thomas Vita', 'thomasvitacell@gmail.com', '$2y$10$45DV/Y5sUna0rUvO5eVbKuL7P82KEndV5VhLnI0FkmWDSirLUpCTi', '3460705905'),
(24, 'd', 'd@d', '$2y$10$JYO3Zqpo4b8EolaD64yqlubqtLBNxsBlTOwtqv4Dg.0x0A75b7aH2', 'd'),
(25, 'pippo baudo', 'pippoforo@tiscali.it', '$2y$10$bpR8eWj95bd7mWTf.l9OheJ4o1DN8FIGQammlmgbTOP0zAam3fGj2', '2828282828');

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
(2, 'lalli03@tiscali.it'),
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
-- Table structure for table `ordine`
--

CREATE TABLE `ordine` (
  `id` int(11) NOT NULL,
  `carrello_id` int(11) NOT NULL,
  `prodotto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `fornitore` varchar(255) DEFAULT NULL,
  `url_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `categoria_id`, `prezzo`, `origine`, `fornitore`, `url_foto`) VALUES
(1, 'Mela', 1, '1.50', 'Italia', 'Fornitore A', '/Categorie/Frutta/mela.jpg'),
(2, 'Banana', 1, '1.20', 'Costa Rica', 'Fornitore B', 'assets/images/categorie/Frutta/Prodotti/banana.jpg'),
(3, 'Insalata', 2, '0.80', 'Italia', 'Fornitore C', 'assets/images/categorie/Verdura/Prodotti/insalata.jpg'),
(4, 'Prosciutto Crudo', 3, '15.50', 'Italia', 'Fornitore D', 'assets/images/categorie/Salumi/Prodotti/prosciutto.jpg'),
(5, 'Gorgonzola', 4, '10.90', 'Italia', 'Fornitore E', 'assets/images/categorie/Formaggi/Prodotti/gorgonzola.jpg'),
(6, 'Bistecca di Manzo', 5, '20.00', 'Argentina', 'Fornitore F', 'assets/images/categorie/Carne/Prodotti/bistecca.jpg'),
(7, 'Salmone', 6, '18.50', 'Norvegia', 'Fornitore G', 'assets/images/categorie/Pesce/Prodotti/salmone.jpg'),
(8, 'Pane integrale', 7, '3.00', 'Italia', 'Fornitore H', 'assets/images/categorie/Pane_e_Prodotti_da_forno/Prodotti/pane.jpg'),
(9, 'Spaghetti', 8, '1.20', 'Italia', 'Fornitore I', 'assets/images/categorie/Pasta/Prodotti/spaghetti.jpg'),
(10, 'Riso Basmati', 9, '2.50', 'India', 'Fornitore J', 'assets/images/categorie/Riso_e_Cereali/Prodotti/riso.jpg'),
(11, 'Lenticchie', 10, '1.00', 'Italia', 'Fornitore K', 'assets/images/categorie/Legumi/Prodotti/lenticchie.jpg'),
(12, 'Olio Extra Vergine di Oliva', 11, '8.50', 'Italia', 'Fornitore L', 'assets/images/categorie/Olio_e_Condimenti/Prodotti/olio.jpg'),
(13, 'Acqua Minerale', 12, '0.50', 'Italia', 'Fornitore M', 'assets/images/categorie/Bevande_Analcoliche/Prodotti/acqua.jpg'),
(14, 'Vino Rosso Chianti', 13, '12.00', 'Italia', 'Fornitore N', 'assets/images/categorie/Bevande_Alcoliche/Prodotti/vino.jpg'),
(16, 'Ciambella', 21, '5.99', 'Italia', 'Fornitore X', 'assets/images/Categorie/Pasticceria/ciambella.jpg'),
(17, 'Detersivo Lavatrice', 22, '8.49', 'Italia', 'Fornitore Y', 'assets/images/Categorie/Prodotti_per_la_casa/detersivo.jpg'),
(18, 'Shampoo', 23, '4.29', 'Italia', 'Fornitore Z', 'assets/images/Categorie/Igiene_personale/shampoo.jpg');

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
-- Indexes for table `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrello_id` (`carrello_id`),
  ADD KEY `prodotto_id` (`prodotto_id`);

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
  MODIFY `carrello_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `dati_utente`
--
ALTER TABLE `dati_utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
-- AUTO_INCREMENT for table `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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

--
-- Constraints for table `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`carrello_id`) REFERENCES `carrello` (`carrello_id`),
  ADD CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`prodotto_id`) REFERENCES `prodotti` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
