<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all necessary POST fields are set
    if(isset($_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['telefono'], $_POST['password'])) {
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $password = $_POST['password'];

        if (empty($nome) || empty($cognome) || empty($email) || empty($password) || empty($telefono)) {
            $_SESSION['error_message'] = "Compilare tutti i campi.";
            header("location: register.php");
            exit; // Termina lo script dopo il reindirizzamento
        }
        

        $check_query = "SELECT * FROM dati_utente WHERE email='$email' OR telefono='$telefono'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            $_SESSION['error_message'] = "Email o numero già esistenti.";
            header("location: register.php");
            exit; // Termina lo script dopo il reindirizzamento
        } else {
            $insert_query = "INSERT INTO dati_utente (nome, cognome, email, telefono, password) 
                            VALUES ('$nome', '$cognome', '$email', '$telefono', '$password')";

            if ($conn->query($insert_query) === TRUE) {
                $_SESSION['register_success'] = "Registrazione completata con successo. Effettua il login.";
                header("location: login.php");
                exit(); // Stop script execution after header redirect
            } else {
                // Handle database insertion error
            }
        }
    } else {
        
        $_SESSION['error_message'] = "Compilare tutti i campi.";
        header("location: register.php");
        exit; // Termina lo script dopo il reindirizzamento
        
    }
}

$conn->close();
?>
