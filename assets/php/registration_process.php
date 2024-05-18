<?php
session_start();
include 'db_connection.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome'], $_POST['email'], $_POST['telefono'], $_POST['password'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Crittografa la password

        if (empty($nome) || empty($email) || empty($password) || empty($telefono)) {
            $response['message'] = "Compilare tutti i campi.";
        } else {
            $check_query = "SELECT * FROM dati_utente WHERE email=? OR telefono=?";
            $stmt = $conn->prepare($check_query);
            $stmt->bind_param('ss', $email, $telefono);
            $stmt->execute();
            $check_result = $stmt->get_result();

            if ($check_result->num_rows > 0) {
                $response['message'] = "Email o numero già esistenti.";
            } else {
                $insert_query = "INSERT INTO dati_utente (nome, email, telefono, password) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($insert_query);
                $stmt->bind_param('ssss', $nome, $email, $telefono, $password);

                if ($stmt->execute()) {
                    $response['success'] = true;
                    $response['message'] = "Registrazione completata con successo. Effettua il login.";
                } else {
                    $response['message'] = "Errore durante la registrazione. Riprova più tardi.";
                }
            }
            $stmt->close();
        }
    } else {
        $response['message'] = "Compilare tutti i campi.";
    }
}

$conn->close();
echo json_encode($response);
?>
