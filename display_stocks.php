<?php
// Connect to your database
$servername = "localhost";
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "stock_management_system"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all stocks
$sql = "SELECT * FROM stocks";
$result = $conn->query($sql);

// Check if there are any stocks
if ($result->num_rows > 0) {
    // Output table header
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Price</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["price"]. "</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
