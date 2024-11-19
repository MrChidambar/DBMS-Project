<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input fields
    $stock_id = $_POST['stock_id'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $sale_date = $_POST['sale_date'];

    // Validate quantity to ensure it's positive
    if ($quantity <= 0) {
        echo "Error: Quantity must be a positive number.";
        exit;
    }

    // Database connection
    $servername = "localhost"; // Corrected server name (remove http://)
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "stock_management_system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO sales (stock_id, quantity, amount, sale_date) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $stock_id, $quantity, $amount, $sale_date);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
