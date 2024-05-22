<?php
session_start();
include 'db_connection.php'; // Aggiorna il percorso se necessario

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = "999"; // o qualsiasi valore di default per gli utenti non autenticati
}

// Recupera i dati del carrello dal database
$sql = "SELECT p.nome, p.prezzo, p.origine, cat.nome_categoria, COUNT(*) as quantita, SUM(p.prezzo) as prezzo_totale
        FROM carrello car
        INNER JOIN prodotti p ON car.prodotto_id = p.id
        INNER JOIN dati_utente u ON car.utente_id = u.id
        INNER JOIN categorie cat ON p.categoria_id = cat.id
        WHERE u.id = '$userId'
        GROUP BY p.id, p.nome, p.prezzo, cat.nome_categoria";

$result = $conn->query($sql);

if (!$result) {
    die("Errore nella query: " . $conn->error);
}

// Prepara i dati per l'email
$orderDetails = "";
while ($row = $result->fetch_assoc()) {
    $orderDetails .= $row['nome'] . " - Quantità: " . $row['quantita'] . " - Prezzo: €" . $row['prezzo_totale'] . "\n";
}

// Recupera il nome dell'utente
$userName = "Cliente";
$sqlUser = "SELECT nome FROM dati_utente WHERE id = '$userId'";
$resultUser = $conn->query($sqlUser);
if ($resultUser && $resultUser->num_rows > 0) {
    $rowUser = $resultUser->fetch_assoc();
    $userName = $rowUser['nome'];
}

// Scrivi i dati in un file temporaneo nella directory Python
$orderDetailsPath = dirname(__FILE__) . '/../py/order_details.txt';
file_put_contents($orderDetailsPath, $userName . "\n\n" . $orderDetails, LOCK_EX);

// Cambia la directory corrente
chdir(dirname(__FILE__) . '/../py');

// Esegui lo script Python con percorso assoluto
exec("python3 email_sender.py 2>&1", $output, $resultCode);

// Aggiungi debug per l'output e il codice di ritorno
echo "Output script Python: " . implode("\n", $output) . "<br>";
echo "Codice di ritorno: " . $resultCode . "<br>";

// Controlla se lo script Python ha avuto successo
if ($resultCode === 0) {
    echo "Email inviata con successo!";
    
    // Elimina i prodotti dal carrello dopo che l'email è stata inviata
    $deleteSql = "DELETE FROM carrello WHERE utente_id = '$userId'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Prodotti rimossi dal carrello con successo.";
    } else {
        echo "Errore nella rimozione dei prodotti dal carrello: " . $conn->error;
    }
} else {
    echo "Errore nell'invio dell'email.";
}

// Chiudi la connessione al database
$conn->close();
?>
