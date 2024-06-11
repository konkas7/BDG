<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titolo = isset($_POST['titolo']) ? $_POST['titolo'] : '';
    $testo = isset($_POST['testo']) ? $_POST['testo'] : '';

    // Check if the titolo and testo are not empty
    if (!empty($titolo) && !empty($testo)) {
        // Clear the content of the file
        $file = 'offerte.txt';
        file_put_contents($file, '');

        // Append new data to the file
        $currentData = $titolo . "\n" . $testo . "\n\n";
        file_put_contents($file, $currentData, LOCK_EX);

        // Call Python script to send emails
        $output = [];
        exec("python send_offers.py", $output, $return_var);

        // Check the return status of the Python script
        if ($return_var == 0) {
            // Response
            $response = array('message' => 'Offerta inviata con successo!');
        } else {
            // Response
            $response = array('message' => 'Si è verificato un errore durante l\'invio delle email.');
        }
    } else {
        // Response
        $response = array('message' => 'Per favore, compila tutti i campi.');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Response
    $response = array('message' => 'Richiesta non valida.');
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
