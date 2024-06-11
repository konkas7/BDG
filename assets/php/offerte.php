
<?php
// Inizia la sessione
session_start();

// Controlla se l'utente è loggato e se è un amministratore
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_admin']) || $_SESSION['user_admin'] != 1) {
    // Reindirizza l'utente alla pagina di accesso se non è loggato o non è un amministratore
    header("Location: modern_login_page.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invia Offerte</title>
</head>
<body>
    <h2>Invia Offerte</h2>
    <form id="offerteForm">
        <label for="titolo">Titolo:</label><br>
        <input type="text" id="titolo" name="titolo" required><br>
        <label for="testo">Testo:</label><br>
        <textarea id="testo" name="testo" required></textarea><br>
        <button type="submit" id="inviaBtn">Invia</button>
        <div id="loader" style="display:none;">Attendere...</div>
    </form>

    <!-- Div per il popup -->
    <div id="popup" class="popup" style="display: none;">
        <span id="popupMessage"></span>
        <button onclick="closePopup()">OK</button>
    </div>

    <script>
        document.getElementById('offerteForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Previene il comportamento predefinito del form

            // Disabilita il pulsante di invio e mostra la rotella di caricamento
            document.getElementById('inviaBtn').disabled = true;
            document.getElementById('loader').style.display = 'block';

            var titolo = document.getElementById('titolo').value;
            var testo = document.getElementById('testo').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'offerte_process.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    // Riabilita il pulsante di invio e nasconde la rotella di caricamento
                    document.getElementById('inviaBtn').disabled = false;
                    document.getElementById('loader').style.display = 'none';

                    if (xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('popupMessage').textContent = response.message;
                        document.getElementById('popup').style.display = 'block';
                        document.getElementById('titolo').value = ''; //casella vuota
                        document.getElementById('testo').value = ''; //casella vuota
                    } else {
                        alert('Si è verificato un errore durante l\'invio delle offerte.');
                    }
                }
            };

            xhr.send('titolo=' + encodeURIComponent(titolo) + '&testo=' + encodeURIComponent(testo));
        });

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>
