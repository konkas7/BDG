<?php
session_start();
include 'db_connection.php';

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

// Scrivi i dati in un file temporaneo
file_put_contents('order_details.txt', $userName . "\n\n" . $orderDetails);

// Esegui lo script Python
exec("python3 send_email.py", $output, $resultCode);

// Controlla se lo script Python ha avuto successo
if ($resultCode === 0) {
    echo "Email inviata con successo!";
} else {
    echo "Errore nell'invio dell'email.";
}

// Chiudi la connessione al database
$conn->close();
?>
