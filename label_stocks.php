<?php
// Include your database connection file
$servername = "localhost";
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "stock_management_system"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch stock names
$sql = "SELECT id, name FROM stocks";

// Perform the query
$result = mysqli_query($conn, $sql);

// Check if there are any stocks
if (mysqli_num_rows($result) > 0) {
    // Output select options
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
    }
} else {
    echo "<option value=''>No stocks available</option>";
}

// Close the database connection
$conn->close();
?>
