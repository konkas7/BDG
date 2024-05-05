<?php
// Funzione per ottenere il numero di elementi per una determinata categoria
function numero_elementi($categoria) {
    // Include il file di connessione al database
    include 'db_connection.php';

    // Inizializza la variabile di conteggio
    $count = 0;

    // Query per contare il numero di elementi per la categoria specificata
    $sql = "SELECT COUNT(*) AS count FROM prodotti p INNER JOIN categorie c ON p.categoria_id = c.id WHERE c.nome_categoria = '$categoria'";
    $result = $conn->query($sql);

    // Controlla se la query ha restituito risultati
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
    }

    // Chiudi la connessione al database
    $conn->close();

    // Restituisci il numero di elementi
    return $count;
}
?>
