<?php
// Database configuration
$servername = "localhost";
$username = "bottegadigerosa";
$password = "bottegadigerosa";
$dbname = "my_bottegadigerosa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch categories
$sql = "SELECT nome_categoria FROM categorie";
$result = $conn->query($sql);

// Array to store categories
$categories = array();

// Fetch categories from the database
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categories[] = $row["nome_categoria"];
    }
}

// Close database connection
$conn->close();
?>

<select id="categoria" name="categoria" style="width: 300px;">
    <?php foreach($categories as $category): ?>
        <?php $category_display = str_replace('_', ' ', utf8_encode($category)); ?>
        <option value="<?php echo $category; ?>"><?php echo $category_display; ?></option>
    <?php endforeach; ?>
</select>

