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
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 80%;
            max-width: 600px; /* Limit modal width */
            position: relative; /* Position relative for absolute positioning inside */
        }

        /* Close Button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #555;
        }

        /* Product Card */
        .product {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: calc(33.33% - 20px); /* Responsive width for 3 products in a row */
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: translateY(-5px); /* Lift up on hover */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        /* Product Info */
        .product-info {
            text-align: center;
        }

    </style>
</head>
<body>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="products-container"> <!-- Contenitore dei prodotti -->
            <?php
            // Include database connection
            include 'db_connection.php';

            // Retrieve category selections from the form
            $categoria1 = $_POST['categoria1'];
            $categoria2 = $_POST['categoria2'];

            // Query to fetch all products
            $sql = "SELECT p.*, c.nome_categoria 
                    FROM prodotti p
                    INNER JOIN categorie c ON p.categoria_id = c.id
                    WHERE c.nome_categoria IN ('$categoria1', '$categoria2')";



            $result = $conn->query($sql);

            // Check if any products are found
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Compose image URL using category name and product name
                    $imageURL = "Categorie/" . urlencode($row['nome_categoria']) . "/Prodotti/" . urlencode($row['nome']) . ".jpg";

                    // Display product information
                    echo "<div class='product'>";
                    echo "<h2>" . $row['nome'] . "</h2>";
                    echo "<p>Prezzo: €" . $row['prezzo'] . "</p>";
                    echo "<p>Origine: " . $row['origine'] . "</p>";
                    echo "<p>Fornitore: " . $row['fornitore'] . "</p>";
                    echo "<img src='" . $imageURL . "' alt='" . $row['nome'] . "' width='150'>";
                    echo "</div>";
                }
            } else {
                echo "Nessun prodotto trovato.";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </div>

</div>

<script>

// Definisci la funzione openModal
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
}

// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
function closeModal() {
  modal.style.display = "none";
  window.location.href = "/bdg/index.php";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    closeModal();
  }
}

// Esegui la funzione openModal al caricamento della pagina
window.onload = function() {
    openModal();
};

</script>

</body>
</html>
