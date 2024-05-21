<?php
include 'db_connection.php';

// Query per contare i prodotti
$sql = "SELECT COUNT(*) AS total FROM prodotti";
$result = $conn->query($sql);

// Verifica se ci sono risultati
if ($result->num_rows > 0) {
    // Ottieni il conteggio
    $row = $result->fetch_assoc();
    $totalProducts = $row['total'];
} else {
    $totalProducts = 0; // Nessun prodotto trovato
}

// Chiudi la connessione
$conn->close();

// Salva il dato nella sessione
$_SESSION['totalProducts'] = $totalProducts;
?>
