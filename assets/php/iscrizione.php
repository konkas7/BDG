<?php
header('Content-Type: application/json');

include 'db_connection.php';

// Controlla se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Controlla se l'email esiste già
    $sql = "SELECT * FROM news_letter WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['message' => 'Questa email è già stata iscritta alla newsletter.']);
    } else {
        // Prepara l'istruzione SQL per inserire l'email
        $sql = "INSERT INTO news_letter (email) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);

        // Esegui l'inserimento e controlla il risultato
        if ($stmt->execute()) {
            echo json_encode(['message' => 'Grazie per esserti iscritto alla nostra newsletter!']);
        } else {
            echo json_encode(['message' => 'Errore durante l\'iscrizione: ' . $conn->error]);
        }
    }

    // Chiudi lo statement e la connessione
    $stmt->close();
}

$conn->close();
?>
