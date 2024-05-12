<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica se i campi email e password sono vuoti
    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Inserire sia email che password.";
        header("location: login.php");
        exit; // Termina lo script dopo il reindirizzamento
    }

    $sql = "SELECT id, nome, cognome, email FROM dati_utente WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_nome'] = $row['nome'];
        $_SESSION['user_cognome'] = $row['cognome'];
        $_SESSION['user_email'] = $row['email'];
        header("location: ../../index.php");
    } else {
        // Imposta il messaggio di errore nella variabile di sessione
        $_SESSION['error_message'] = "Email o password errate.";
        header("location: login.php");
    }
}

$conn->close();


include 'carrello.php';
?>
