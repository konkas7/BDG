<?php
// Credenziali di accesso al database
$servername = "localhost";
$username = "bottegadigerosa"; // Inserisci il nome utente del database
$password = "bottegadigerosa"; // Inserisci la password del database
$dbname = "my_bottegadigerosa";

// Connessione al database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
