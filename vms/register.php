<?php
// Establish database connection
$host = 'localhost';
$database = 'db_vms';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$department = $_POST['department'];
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute the SQL query to insert the data
$stmt = $conn->prepare("INSERT INTO faculty (name, department, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $department, $email, $password);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
