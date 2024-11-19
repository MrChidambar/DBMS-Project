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

// Query to fetch all sales
$sql = "SELECT * FROM sales";
$result = $conn->query($sql);

// Check if there are any sales
if ($result->num_rows > 0) {
    // Output table header
    echo "<table>";
    echo "<tr><th>ID</th><th>Stock ID</th><th>Quantity</th><th>Amount</th><th>Sale Date</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["stock_id"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["amount"]. "</td><td>" . $row["sale_date"]. "</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
