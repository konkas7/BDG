<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titolo Pagina</title>
    <script type="text/javascript">
        function showPopup(message) {
            var style = "top=50%, left=50%, width=300, height=200, status=no, menubar=no, toolbar=no, scrollbars=no";
            var popup = window.open("", "", style);
            popup.document.write("<html><head><title>Popup</title></head><body><h3>" + message + "</h3><button onclick='window.close()'>Chiudi</button></body></html>");
        }

        <?php
        if (isset($_SESSION['login_error'])) {
            echo "window.onload = function() { showPopup('" . $_SESSION['login_error'] . "'); }";
            unset($_SESSION['login_error']);
        }

        if (isset($_SESSION['register_error'])) {
            echo "window.onload = function() { showPopup('" . $_SESSION['register_error'] . "'); }";
            unset($_SESSION['register_error']);
        }

        if (isset($_SESSION['register_success'])) {
            echo "window.onload = function() { showPopup('" . $_SESSION['register_success'] . "'); }";
            unset($_SESSION['register_success']);
        }
        ?>
    </script>
</head>
<body>
<!-- Form di login o registrazione -->
<!-- Inserisci qui il codice del form -->
</body>
</html>
