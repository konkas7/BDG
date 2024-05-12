<?php
// Includi il file di connessione al database
include 'db_connection.php';

// Verifica se è stata ricevuta una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se sono stati ricevuti l'ID del prodotto e l'ID dell'utente
    if (isset($_POST['productId']) && isset($_POST['userId'])) {
        $productId = intval($_POST['productId']);
        $userId = intval($_POST['userId']);

        // Query SQL per inserire il prodotto nel carrello
        $query = "INSERT INTO carrello (prodotto_id, utente_id) VALUES ($productId, $userId)";

        // Esegui la query
        if ($conn->query($query) === TRUE) {
            // Se l'operazione è stata completata con successo, restituisci un messaggio di conferma
            echo json_encode(array('message' => 'Prodotto aggiunto al carrello con successo.'));
        } else {
            // In caso di errore, restituisci un messaggio di errore
            echo json_encode(array('error' => 'Si è verificato un errore durante l\'aggiunta del prodotto al carrello: ' . $conn->error));
        }
    } else {
        // Se non sono stati ricevuti l'ID del prodotto o l'ID dell'utente, restituisci un messaggio di errore
        echo json_encode(array('error' => 'ID del prodotto o dell\'utente non ricevuti.'));
    }
} else {
    // Se la richiesta non è di tipo POST, restituisci un messaggio di errore
    echo json_encode(array('error' => 'Richiesta non valida.'));
}

// Chiudi la connessione al database
$conn->close();
?>
