<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
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
            background:url(../images/welcome-hero/banner.png)no-repeat;
            background-position:center;
            background-size:cover;
        }
        
        .cart {
            background: #fff;
        }
        
        .p-about {
            font-size: 12px;
        }
        
        .table-shadow {
            -webkit-box-shadow: 5px 5px 15px -2px rgba(0,0,0,0.42);
            box-shadow: 5px 5px 15px -2px rgba(0,0,0,0.42);
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
            background: rgb(102,102,221);
            color: #fff !important;
            border-color: rgb(102,102,221);
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
            background: rgb(102,102,221);
            border: rgb(102,102,221);
        }
        
        .line {
            border-bottom: 1px solid rgb(102,102,221);
        }
        
        .information span {
            font-size: 12px;
            font-weight: 500;
        }
        
        .information {
            margin-bottom: 5px;
        }
        
        .items {
            -webkit-box-shadow: 5px 5px 4px -1px rgba(0,0,0,0.25);
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
                    <?php
                    include 'db_connection.php';

                    if (!isset($_SESSION['user_id'])) {
                        header("location: login.php");
                        exit;
                    }

                    $user_id = $_SESSION['user_id'];

                    // Query per recuperare l'email dell'utente dal database
                    $sql_email = "SELECT email FROM dati_utente WHERE id = '$user_id'";
                    $result_email = $conn->query($sql_email);

                    if ($result_email->num_rows > 0) {
                        $row_email = $result_email->fetch_assoc();
                        $user_email = $row_email['email'];

                        // Query per recuperare i prodotti nel carrello dell'utente
                        $sql = "SELECT p.nome, p.prezzo, p.url_foto, cat.nome_categoria , COUNT(*) as quantita, SUM(p.prezzo) as prezzo_totale
                                FROM prodotti p
                                INNER JOIN ordine o ON p.id = o.prodotto_id
                                INNER JOIN carrello car ON o.carrello_id = car.id
                                INNER JOIN dati_utente u ON car.utente_id = u.id
                                INNER JOIN categorie cat ON p.categoria_id = cat.id
                                WHERE u.email = '$user_email'
                                GROUP BY p.id";

                        $result = $conn->query($sql);

                        $totale = 0;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Aggiungi il prezzo totale di ogni prodotto al totale complessivo
                                $totale += $row["prezzo_totale"];

                                // Visualizza i dettagli del prodotto nel carrello...
                                $imageURL = "Categorie/" . urlencode($row['nome_categoria']) . "/Prodotti/" . urlencode($row['nome']) . ".jpg";
                                echo '<div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">';
                                echo '<div class="d-flex flex-row"><img class="rounded" src="' . $imageURL . '" alt="' . $row['nome'] . '" width="40">';
                                echo '<div class="ml-2"><span class="font-weight-bold d-block">' . $row["nome"] . '</span>';
                                echo '<span class="spec">Quantità: ' . $row["quantita"] . '</span></div></div>';
                                echo '<div class="d-flex flex-row align-items-center"><span class="d-block">' . $row["quantita"] . '</span>';
                                echo '<span class="d-block ml-5 font-weight-bold">$' . $row["prezzo_totale"] . '</span>';
                                echo '<i class="fa fa-trash-o ml-3 text-black-50"></i></div></div>';
                            }

                            // Calcola le tasse come il 5% del totale
                            $tasse = $totale * 0.05;

                            // Calcola il totale complessivo aggiungendo le tasse
                            $totale_complessivo = $totale + $tasse;
                        } else {
                            echo "<p>Nessun prodotto nel carrello</p>";
                        }
                    } else {
                        echo "<p>Utente non trovato</p>";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="payment-info">
                    <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div><span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span> </label>

                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png"/></span> </label>

                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span> </label>


                    <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png"/></span> </label>
                    <div><label class="credit-card-label">Name on card</label><input type="text" class="form-control credit-inputs" placeholder="Name"></div>
                    <div><label class="credit-card-label">Card number</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
                    <div class="row">
                        <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text" class="form-control credit-inputs" placeholder="12/24"></div>
                        <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="342"></div>
                    </div>
                    <hr class="line">
                    <!-- Dettagli pagamento -->
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold d-block">Totale</span>
                        <span class="d-block ml-5 font-weight-bold">$<?php echo number_format($totale, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold d-block">Tasse (5%)</span>
                        <span class="d-block ml-5 font-weight-bold">$<?php echo number_format($tasse, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold d-block">Totale Complessivo</span>
                        <span class="d-block ml-5 font-weight-bold">$<?php echo number_format($totale_complessivo, 2); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>