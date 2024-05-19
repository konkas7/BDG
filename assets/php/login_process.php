<?php
session_start();
include 'db_connection.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $response['message'] = "Inserire sia email che password.";
        } else {
            $sql = "SELECT id, nome, email, password FROM dati_utente WHERE email = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_nome'] = $row['nome'];
                        $_SESSION['user_email'] = $row['email'];
                        $response['success'] = true;
                        $response['user_id'] = $row['id'];
                    } else {
                        $response['message'] = "Email o password errate.";
                    }
                } else {
                    $response['message'] = "Email o password errate.";
                }
                $stmt->close();
            } else {
                $response['message'] = "Errore nella preparazione della query.";
            }
        }
    } else {
        $response['message'] = "Inserire sia email che password.";
    }
}

$conn->close();
echo json_encode($response);
?>
