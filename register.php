<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "swarnaprashna_db");

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    print_r($_POST);  // Debug: Show form data
    echo "</pre>";

    $father_name = isset($_POST["father_name"]) ? $_POST["father_name"] : '';
    $mother_name = isset($_POST["mother_name"]) ? $_POST["mother_name"] : '';
    $child_name = isset($_POST["child_name"]) ? $_POST["child_name"] : '';
    $child_age = isset($_POST["child_age"]) ? (int)$_POST["child_age"] : 0;
    $dose_count = isset($_POST["dose_count"]) ? (int)$_POST["dose_count"] : 0;
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $aadhar = isset($_POST["aadhar"]) ? $_POST["aadhar"] : '';

    // Check if data is received
    if (empty($father_name) || empty($mother_name) || empty($child_name) || empty($email) || empty($aadhar)) {
        die("Error: All fields are required.");
    }

    echo "All fields received. Proceeding to insert.<br>";

    // Insert data
    $sql = "INSERT INTO registrations (father_name, mother_name, child_name, child_age, dose_count, email, aadhar) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Error preparing query: " . $conn->error);
    }

    $stmt->bind_param("sssiiis", $father_name, $mother_name, $child_name, $child_age, $dose_count, $email, $aadhar);

    if ($stmt->execute()) {
        echo "Registration Successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
