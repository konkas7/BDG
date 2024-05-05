<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Popup</title>
    <style>
        /* CSS for the modal popup */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 5% from the top, centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
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
            echo "<div>";
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
