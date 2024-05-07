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
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 90%; /* Width set to 90% */
            max-width: 800px; /* Maximum width increased for larger popup */
            position: relative;
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
        .products-container {
            display: flex;
            flex-wrap: wrap;
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
            flex-grow: 1; /* Make the product grow to fill the space */
            max-width: calc(20% - 20px); /* Maximum width for each product */
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

        /* Product Info */
        .product-info {
            text-align: center;
        }

        /* Clearfix to prevent container collapse */
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

    </style>

</head>
<body>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="products-container clearfix"> <!-- Product Container -->
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
                    WHERE (c.nome_categoria = '$categoria' OR '$categoria' = '') 
                    AND (LOWER(p.nome) LIKE LOWER('%$nome%') OR '$nome' = '')";

            $result = $conn->query($sql);

            // Check if any products are found
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Compose image URL using category name and product name
                    $imageURL = "Categorie/" . urlencode($row['nome_categoria']) . "/Prodotti/" . urlencode($row['nome']) . ".jpg";

                    // Display product information
                    echo "<div class='product'>"; // Added 'product' class for each product
                    echo "<img src='" . $imageURL . "' alt='" . $row['nome'] . "' width='150'>";
                    echo "<div class='product-info'>"; // Added product-info div
                    echo "<h2>" . $row['nome'] . "</h2>";
                    echo "<p>Prezzo: €" . $row['prezzo'] . "</p>";
                    echo "<p>Origine: " . $row['origine'] . "</p>";
                    echo "<p>Fornitore: " . $row['fornitore'] . "</p>";
                    echo "</div>"; // Closed product-info div
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
// Function to open the modal
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

// Run the openModal function when the page loads
window.onload = function() {
    openModal();
};
</script>

</body>
</html>
