<?php
// Includi il codice per la connessione al database
include 'db_connection.php';

// Controlla se l'ID del prodotto è stato inviato correttamente
if (isset($_POST['productId'])) {
    // Esegui l'operazione di eliminazione del prodotto dal carrello
    $productId = $_POST['productId'];
    
    // Esegui la query per eliminare il prodotto dal carrello
    $deleteQuery = "DELETE FROM carrello WHERE prodotto_id = '$productId'";
    $deleteResult = $conn->query($deleteQuery);

    if ($deleteResult) {
        // Il prodotto è stato eliminato con successo
        $response = array('success' => true, 'message' => 'Prodotto eliminato dal carrello con successo');
        echo json_encode($response);
    } else {
        // Se si verifica un errore durante l'eliminazione del prodotto
        $response = array('success' => false, 'message' => 'Si è verificato un errore durante l\'eliminazione del prodotto dal carrello');
        echo json_encode($response);
    }
} else {
    // Se l'ID del prodotto non è stato inviato correttamente
    $response = array('success' => false, 'message' => 'ID del prodotto non valido');
    echo json_encode($response);
}

// Chiudi la connessione al database
$conn->close();
?>
