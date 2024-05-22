<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connessione al database
    session_start();
    include 'db_connection.php';

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    } else {
        $userId = "999"; // Valore di default per utenti non autenticati
    }

    // Recupera il nome utente
    $sql_user = "SELECT nome FROM dati_utente WHERE id = '$userId'";
    $result_user = $conn->query($sql_user);
    $userName = $result_user->fetch_assoc()['nome'];

    // Recupera i prodotti dal carrello
    $sql_cart = "SELECT p.nome, p.prezzo, p.origine, cat.nome_categoria, COUNT(*) as quantita, SUM(p.prezzo) as prezzo_totale
                 FROM carrello car
                 INNER JOIN prodotti p ON car.prodotto_id = p.id
                 INNER JOIN categorie cat ON p.categoria_id = cat.id
                 WHERE car.utente_id = '$userId'
                 GROUP BY p.id, p.nome, p.prezzo, cat.nome_categoria";
    $result_cart = $conn->query($sql_cart);

    $products = [];
    while ($row = $result_cart->fetch_assoc()) {
        $products[] = $row;
    }

    // Chiudi la connessione al database
    $conn->close();

    // Converti i dati in JSON per passarli allo script Python
    $data = json_encode([
        'userName' => $userName,
        'products' => $products
    ]);

    // Salva i dati in un file temporaneo
    $tempFile = tempnam(sys_get_temp_dir(), 'data');
    file_put_contents($tempFile, $data);

    // Esegui lo script Python e passa il percorso del file temporaneo come argomento
    $command = escapeshellcmd("python3 ../py/email_sender.py " . $tempFile);
    $output = shell_exec($command);

    // Rimuovi il file temporaneo
    unlink($tempFile);

    echo $output; // Output del comando Python
}
?>
