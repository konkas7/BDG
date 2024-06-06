<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Popup</title>
    <style>
        /* CSS for the modal popup */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 90%;
            max-width: 800px;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #555;
        }

        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            transition: transform 0.3s ease;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            max-width: calc(25% - 20px);
            position: relative;
        }

        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-info {
            text-align: center;
            flex-grow: 1;
            margin-bottom: 30px;
        }

        .add-to-cart {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: 10px;
        }

        .button-89 {
            --b: 3px;
            --s: .45em;
            --color: #373B44;

            padding: calc(.5em + var(--s)) calc(.9em + var(--s));
            color: var(--color);
            --_p: var(--s);
            background:
                conic-gradient(from 90deg at var(--b) var(--b),#0000 90deg,var(--color) 0)
                var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
            transition: .3s linear, color 0s, background-color 0s;
            outline: var(--b) solid #0000;
            outline-offset: .6em;
            font-size: 16px;

            border: 0;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-89:hover,
        .button-89:focus-visible {
            --_p: 0px;
            outline-color: var(--color);
            outline-offset: .05em;
        }

        .button-89:active {
            background: var(--color);
            color: #fff;
        }

        body {
            background-image: url('../images/welcome-hero/banner.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        @import url('https://fonts.googleapis.com/css?family=Quicksand&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h3 {
            font-family: Quicksand;
        }

        .alert {
            width: 30%;
            margin: 20px auto;
            padding: 30px;
            position: relative;
            border-radius: 5px;
            box-shadow: 0 0 15px 5px #ccc;
            display: none;
        }

        .close_avviso {
            position: absolute;
            width: 30px;
            height: 30px;
            opacity: 0.5;
            border-width: 1px;
            border-style: solid;
            border-radius: 50%;
            right: 15px;
            top: 25px;
            text-align: center;
            font-size: 1.6em;
            cursor: pointer;
        }

        .simple-alert {
            background-color: #ebebeb;
            border-left: 5px solid darken(#ebebeb, 50%);
        }

        .simple-alert .close {
            border-color: darken(#ebebeb, 50%);
            color: darken(#ebebeb, 50%);
        }

        .success-alert {
            background-color: #a8f0c6;
            border-left: 5px solid darken(#a8f0c6, 50%);
        }

        .success-alert .close_avviso {
            border-color: darken(#a8f0c6, 50%);
            color: darken(#a8f0c6, 50%);
        }

        .danger-alert {
            background-color: #f7a7a3;
            border-left: 5px solid darken(#f7a7a3, 50%);
        }

        .danger-alert .close_avviso {
            border-color: darken(#f7a7a3, 50%);
            color: darken(#f7a7a3, 50%);
        }

        .warning-alert {
            background-color: #ffd48a;
            border-left: 5px solid darken(#ffd48a, 50%);
        }

        .warning-alert .close_avviso {
            border-color: darken(#ffd48a, 50%);
            color: darken(#ffd48a, 50%);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Alert Boxes -->
    <div class="alert simple-alert">
        <h3>Simple Alert Message</h3>
        <a class="close_avviso">&times;</a>
    </div>
    <div class="alert success-alert">
        <h3>Success Alert Message</h3>
        <a class="close_avviso">&times;</a>
    </div>
    <div class="alert danger-alert">
        <h3>Danger Alert Message</h3>
        <a class="close_avviso">&times;</a>
    </div>
    <div class="alert warning-alert">
        <h3>Warning Alert Message</h3>
        <a class="close_avviso">&times;</a>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="products-container clearfix">
                <?php
                // Include database connection
                include 'db_connection.php';

                // Retrieve category and name selections from the form
                $categoria = $_POST['categoria'];
                $nome = $_POST['nome'];

                // Query to fetch products based on category and name selections
                $sql = "SELECT p.*, c.nome_categoria 
                        FROM prodotti p
                        INNER JOIN categorie c ON p.categoria_id = c.id
                        WHERE ('$nome' != '' AND (LOWER(p.nome) LIKE LOWER('%$nome%') OR SOUNDEX(p.nome) = SOUNDEX('$nome')))
                        OR ('$nome' = '' AND (c.nome_categoria = '$categoria' OR '$categoria' = ''))";

                $result = $conn->query($sql);

                // Check if any products are found
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $imageURL = "Categorie/" . urlencode($row['nome_categoria']) . "/Prodotti/" . urlencode($row['nome']) . ".jpg";

                        echo "<div class='product'>";
                        echo "<img src='" . $imageURL . "' alt='" . $row['nome'] . "' width='150'>";
                        echo "<div class='product-info'>";
                        echo "<h2>" . $row['nome'] . "</h2>";
                        echo "<p>Prezzo: €" . $row['prezzo'] . "</p>";
                        echo "<p>Origine: " . $row['origine'] . "</p>";
                        echo "<p>Fornitore: " . $row['fornitore'] . "</p>";
                        echo "</div>";
                        if (isset($_SESSION['user_id'])) {
                            echo "<button class='button-89' role='button' onclick='addToCart(" . $row['id'] . ", " . $_SESSION['user_id'] . ")'>Carrello</button>";
                        }
                        echo "</div>";
                    }
                } else {
                    echo "Nessun prodotto trovato.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
            window.location.href = "/bdg/index.php";
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById("myModal")) {
                closeModal();
            }
        }

        $(".close_avviso").click(function() {
            $(this).parent(".alert").fadeOut();
        });

        function showAlert(type, message) {
            var alertClass = '';
            switch (type) {
                case 'success':
                    alertClass = 'success-alert';
                    break;
                case 'danger':
                    alertClass = 'danger-alert';
                    break;
                case 'warning':
                    alertClass = 'warning-alert';
                    break;
                default:
                    alertClass = 'simple-alert';
            }
            var alertBox = $('.' + alertClass);
            alertBox.find('h3').text(message);
            alertBox.fadeIn().delay(3000).fadeOut();
        }

        function addToCart(productId, userId) {
            if (!userId) {
                showAlert('danger', 'Utente non valido. Si prega di effettuare il login.');
                return;
            }

            var xhr = new XMLHttpRequest();
            var url = "../php/aggiungi_al_carrello.php";
            var params = "productId=" + productId + "&userId=" + userId;

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.error) {
                        showAlert('danger', response.error);
                    } else {
                        showAlert('success', 'Prodotto aggiunto al carrello con successo!');
                    }
                }
            }

            xhr.send(params);
        }

        window.onload = function() {
            openModal();
        };
    </script>
</body>
</html>
