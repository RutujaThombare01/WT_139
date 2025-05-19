<?php
$servername = "localhost"; // Change if using a different host
$username = "root"; // Change if using a different MySQL user
$password = ""; // Change if your database has a password
$database = "registration_db"; // Change to your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $mobile = preg_replace("/[^0-9]/", "", trim($_POST['mobile'])); // Allows only numbers
    

    // Validate username (only letters and spaces allowed)
    if (!preg_match("/^[A-Za-z\s]+$/", $username)) {
        die("Invalid username. Only letters and spaces are allowed.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Validate mobile number (10 digits)
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        die("Invalid mobile number. Please enter a 10-digit number.");
    }

    // Check if email or mobile already exists
    $checkQuery = "SELECT * FROM users WHERE email = ? OR mobile = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $email, $mobile);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        die("Error: Email or mobile number already exists.");
    }

    // Prepare the SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO users (username, email, mobile) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $mobile);

    // Execute and check success
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
