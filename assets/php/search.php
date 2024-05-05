<?php
// Include il file di connessione al database
include 'assets/php/db_connection.php';

// Ottieni i valori inviati dal form di ricerca
$categoria = $_POST['categoria'];
$nome_prodotto = $_POST['nome_prodotto'];

// Costruisci la query SQL per la ricerca dei prodotti
$sql = "SELECT * FROM prodotti WHERE nome LIKE '%$nome_prodotto%'";

// Se è stata selezionata una categoria, aggiungi il filtro alla query
if ($categoria !== 'default') {
    $sql .= " AND categoria_id = (SELECT id FROM categorie WHERE nome_categoria = '$categoria')";
}

// Esegui la query
$result = $conn->query($sql);

// Mostra i risultati della ricerca
if ($result->num_rows > 0) {
    // Output dei risultati
    while ($row = $result->fetch_assoc()) {
        echo "Nome Prodotto: " . $row["nome"] . "<br>";
        // Aggiungi altri dettagli del prodotto se necessario
    }
} else {
    echo "Nessun risultato trovato.";
}

// Chiudi la connessione al database
$conn->close();
?>
