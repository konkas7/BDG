<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .payment-info {
            background: blue;
            padding: 10px;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
        }
        .product-details {
            padding: 10px;
        }
        body {
            background: url(../images/welcome-hero/banner.png) no-repeat;
            background-position: center;
            background-size: cover;
        }
        .cart {
            background: #fff;
        }
        .p-about {
            font-size: 12px;
        }
        .table-shadow {
            -webkit-box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
            box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
        }
        .type {
            font-weight: 400;
            font-size: 10px;
        }
        label.radio {
            cursor: pointer;
        }
        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }
        label.radio span {
            padding: 1px 12px;
            border: 2px solid #ada9a9;
            display: inline-block;
            color: #8f37aa;
            border-radius: 3px;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 300;
        }
        label.radio input:checked + span {
            border-color: #fff;
            background-color: blue;
            color: #fff;
        }
        .credit-inputs {
            background: rgb(102, 102, 221);
            color: #fff !important;
            border-color: rgb(102, 102, 221);
        }
        .credit-inputs::placeholder {
            color: #fff;
            font-size: 13px;
        }
        .credit-card-label {
            font-size: 9px;
            font-weight: 300;
        }
        .form-control.credit-inputs:focus {
            background: rgb(102, 102, 221);
            border: rgb(102, 102, 221);
        }
        .line {
            border-bottom: 1px solid rgb(102, 102, 221);
        }
        .information span {
            font-size: 12px;
            font-weight: 500;
        }
        .information {
            margin-bottom: 5px;
        }
        .items {
            -webkit-box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.25);
            box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08);
        }
        .spec {
            font-size: 11px;
        }

        #loading-spinner {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
    <script>
        function handlePaymentResponse(response) {
            const loadingSpinner = document.getElementById('loading-spinner');

            if (response.success) {
                alert(response.message);
                window.location.href = "../../index.php"; // Cambia questo al percorso della tua pagina principale
            } else {
                alert(response.error || "Errore sconosciuto");
            }

            // Nascondi la rotella di caricamento dopo che il popup è stato chiuso
            loadingSpinner.style.display = 'none';
        }


        function submitPaymentForm(event) {
            event.preventDefault();

            const formData = new FormData(document.getElementById('payment-form'));
            const paymentButton = document.getElementById('payment-button');
            const loadingSpinner = document.getElementById('loading-spinner');

            // Disabilita il pulsante di pagamento e mostra la rotella di caricamento
            paymentButton.disabled = true;
            loadingSpinner.style.display = 'block';

            fetch('process_payment.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                handlePaymentResponse(data);
                // Riabilita il pulsante di pagamento, ma non nascondere la rotella qui
                paymentButton.disabled = false;
            })
            .catch(error => {
                console.error('Errore:', error);
                // Riabilita il pulsante di pagamento e nascondi la rotella di caricamento in caso di errore
                paymentButton.disabled = false;
                loadingSpinner.style.display = 'none';
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('payment-form').addEventListener('submit', submitPaymentForm);
        });
    </script>
</head>
<body>
    <div id="loading-spinner" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Caricamento...</span>
        </div>
    </div>

    <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fa fa-long-arrow-left" id="back-arrow"></i>
                        <span class="ml-2">Continua a fare shopping</span>
                    </div>
                    <hr>
                    <h6 class="mb-0">Carrello</h6>
                    <div class="d-flex justify-content-between">
                        <span id="cart-count"></span>
                        <div class="d-flex flex-row align-items-center">
                            <span class="text-black-50">Sort by:</span>
                            <div class="price ml-2">
                                <span class="mr-1">price</span>
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Codice PHP per recuperare i prodotti dal carrello -->
                    <?php
                        include 'db_connection.php';

                        if (isset($_SESSION['user_id'])) {
                            $userId = $_SESSION['user_id'];
                        } else {
                            $userId = "999"; // o qualsiasi valore di default per gli utenti non autenticati
                        }

                        $sql = "SELECT p.nome, p.prezzo, p.origine, cat.nome_categoria, COUNT(*) as quantita, SUM(p.prezzo) as prezzo_totale
                                FROM carrello car
                                INNER JOIN prodotti p ON car.prodotto_id = p.id
                                INNER JOIN dati_utente u ON car.utente_id = u.id
                                INNER JOIN categorie cat ON p.categoria_id = cat.id
                                WHERE u.id = '$userId'
                                GROUP BY p.id, p.nome, p.prezzo, cat.nome_categoria";

                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Errore nella query: " . $conn->error);
                        }

                        $totalPrice = 0;
                        $totalItems = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $imageURL = "Categorie/" . urlencode($row['nome_categoria']) . "/Prodotti/" . urlencode($row['nome']) . ".jpg";
                                $totalPrice += $row["prezzo_totale"];
                                $totalItems += $row["quantita"];

                                echo '<div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">';
                                echo '<div class="d-flex flex-row"><img class="rounded" src="' . $imageURL . '" alt="' . $row['nome'] . '" width="40">';
                                echo '<div class="ml-2"><span class="font-weight-bold d-block">' . $row["nome"] . '</span>';
                                echo '<span class="spec">' . $row["origine"] . '</span></div></div>';
                                echo '<div class="d-flex flex-row align-items-center"><span class="d-block">' . $row["quantita"] . '</span>';
                                echo '<span class="d-block ml-5 font-weight-bold">€' . $row["prezzo_totale"] . '</span>';
                                echo '<i class="fa fa-trash-o ml-3 text-black-50"></i></div></div>';
                            }
                        } else {
                            echo "<p>Nessun prodotto nel carrello</p>";
                        }

                        $tax = $totalPrice * 0.03;
                        $totalWithTax = $totalPrice + $tax;

                        $conn->close();
                    ?>

                    <?php if ($totalItems > 0): ?>
                        <script>
                            document.getElementById("cart-count").innerText = "Hai <?php echo $totalItems; ?> elementi nel tuo carrello";
                        </script>
                    <?php endif; ?>
                    <script>document.getElementById("back-arrow").addEventListener("click", function() {window.history.back();}); </script>
                </div>
            </div>
            <div class="col-md-4">
                <?php if ($totalItems > 0): ?>
                <div class="payment-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Informazioni carta</span>
                        <img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30">
                    </div>
                    <span class="type d-block mt-3 mb-1">Tipologia Carta</span>
                    <label class="radio">
                        <input type="radio" name="card" value="payment" checked>
                        <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="card" value="payment">
                        <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png"/></span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="card" value="payment">
                        <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span>
                    </label>
                    <label class="radio">
                        <input type="radio" name="card" value="payment">
                        <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png"/></span>
                    </label>
                    <div>
                        <label class="credit-card-label">Nome sulla carta</label>
                        <input type="text" name="card_name" class="form-control credit-inputs" placeholder="Nome">
                    </div>
                    <div>
                        <label class="credit-card-label">Numero di carta</label>
                        <input type="text" name="card_number" class="form-control credit-inputs" placeholder="0000 0000 0000 0000">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="credit-card-label">Data di scadenza</label>
                            <input type="text" name="card_expiry" class="form-control credit-inputs" placeholder="12/24">
                        </div>
                        <div class="col-md-6">
                            <label class="credit-card-label">CVV</label>
                            <input type="text" name="card_cvv" class="form-control credit-inputs" placeholder="342">
                        </div>
                    </div>
                    <hr class="line">
                    <div class="d-flex justify-content-between information">
                        <span>Subtotale</span>
                        <span>€<?php echo number_format($totalPrice, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between information">
                        <span>Consegna (3%)</span>
                        <span>€<?php echo number_format($tax, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between information">
                        <span>Totale (Incl. spedizione)</span>
                        <span>€<?php echo number_format($totalWithTax, 2); ?></span>
                    </div>
                    <div>
                        <label class="credit-card-label">Paese di consegna</label>
                        <select name="country" class="form-control credit-inputs">
                            <option value="Gerosa">Gerosa</option>
                            <option value="Foppetta">Foppetta</option>
                            <option value="Bura">Bura</option>
                            <option value="Zigogna">Zigogna</option>
                            <!-- Aggiungi altre opzioni di paese qui -->
                        </select>
                    </div>
                    <div>
                        <label class="credit-card-label">Indirizzo di consegna</label>
                        <input type="text" name="address" class="form-control credit-inputs" placeholder="Indirizzo">
                    </div>
                    <form id="payment-form" method="post" action="process_payment.php">
                        <button id="payment-button" class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="submit">
                            <span>€<?php echo number_format($totalWithTax, 2); ?></span>
                            <span>Paga<i class="fa fa-long-arrow-right ml-1"></i></span>
                        </button>
                    </form>
                </div>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        Il tuo carrello è vuoto. Aggiungi prodotti al carrello per procedere con il pagamento.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
?>