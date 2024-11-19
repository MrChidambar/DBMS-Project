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

// Query to fetch all suppliers
$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);

// Check if there are any suppliers
if ($result->num_rows > 0) {
    // Output table header
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Contact Person</th><th>Email</th><th>Phone</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["contact_person"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
