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
    </style>
</head>
<body>
    <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fa fa-long-arrow-left"></i>
                        <span class="ml-2">Continue Shopping</span>
                    </div>
                    <hr>
                    <h6 class="mb-0">Shopping cart</h6>
                    <div class="d-flex justify-content-between">
                        <span>You have 4 items in your cart</span>
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
                        // Connessione al database
                        session_start();
                        include 'db_connection.php';

                        if (isset($_SESSION['user_id'])) {
                            $userId = $_SESSION['user_id'];
                        } else {
                            $userId = "999"; // o qualsiasi valore di default per gli utenti non autenticati
                        }

                        $sql = "SELECT p.nome, p.prezzo, p.url_foto, cat.nome_categoria, COUNT(*) as quantita, SUM(p.prezzo) as prezzo_totale
                                FROM carrello car
                                INNER JOIN prodotti p ON car.prodotto_id = p.id
                                INNER JOIN dati_utente u ON car.utente_id = u.id
                                INNER JOIN categorie cat ON p.categoria_id = cat.id
                                WHERE u.id = '$userId'
                                GROUP BY p.id, p.nome, p.prezzo, p.url_foto, cat.nome_categoria";

                        // Esegui la query SQL
                        $result = $conn->query($sql);

                        // Controllo degli errori SQL
                        if (!$result) {
                            die("Errore nella query: " . $conn->error);
                        }

                        $totalPrice = 0; // Inizializza il totale
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $imageURL = "Categorie/" . urlencode($row['nome_categoria']) . "/Prodotti/" . urlencode($row['nome']) . ".jpg";
                                $totalPrice += $row["prezzo_totale"]; // Aggiungi al totale

                                echo '<div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">';
                                echo '<div class="d-flex flex-row"><img class="rounded" src="' . $imageURL . '" alt="' . $row['nome'] . '" width="40">';
                                echo '<div class="ml-2"><span class="font-weight-bold d-block">' . $row["nome"] . '</span>';
                                echo '<span class="spec">Quantità: ' . $row["quantita"] . '</span></div></div>';
                                echo '<div class="d-flex flex-row align-items-center"><span class="d-block">' . $row["quantita"] . '</span>';
                                echo '<span class="d-block ml-5 font-weight-bold">$' . $row["prezzo_totale"] . '</span>';
                                echo '<i class="fa fa-trash-o ml-3 text-black-50"></i></div></div>';
                            }
                        } else {
                            echo "<p>Nessun prodotto nel carrello</p>";
                        }

                        // Calcolo delle tasse (3%)
                        $tax = $totalPrice * 0.03;
                        $totalWithTax = $totalPrice + $tax;

                        // Chiudi la connessione al database
                        $conn->close();
                    ?>
                    <!-- Fine del codice PHP per recuperare i prodotti dal carrello -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="payment-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Card details</span>
                        <img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30">
                    </div>
                    <span class="type d-block mt-3 mb-1">Card type</span>
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
                        <label class="credit-card-label">Name on card</label>
                        <input type="text" class="form-control credit-inputs" placeholder="Name">
                    </div>
                    <div>
                        <label class="credit-card-label">Card number</label>
                        <input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="credit-card-label">Date</label>
                            <input type="text" class="form-control credit-inputs" placeholder="12/24">
                        </div>
                        <div class="col-md-6">
                            <label class="credit-card-label">CVV</label>
                            <input type="text" class="form-control credit-inputs" placeholder="342">
                        </div>
                    </div>
                    <hr class="line">
                    <div class="d-flex justify-content-between information">
                        <span>Subtotal</span>
                        <span>$<?php echo number_format($totalPrice, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between information">
                        <span>Shipping (3%)</span>
                        <span>$<?php echo number_format($tax, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between information">
                        <span>Total (Incl. taxes)</span>
                        <span>$<?php echo number_format($totalWithTax, 2); ?></span>
                    </div>
                    <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button">
                        <span>$<?php echo number_format($totalWithTax, 2); ?></span>
                        <span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
