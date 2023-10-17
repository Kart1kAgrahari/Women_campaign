<?php
// Database connection parameters
$dbHost = "your_database_host";
$dbUser = "your_database_user";
$dbPass = "your_database_password";
$dbName = "campaign_management"; // Name of your database

// Establish a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the submitted form
$title = $_POST['campaign-title'];
$description = $_POST['campaign-description'];
$date = $_POST['campaign-date'];

// Prepare and execute an SQL statement to insert data into the database
$sql = "INSERT INTO campaigns (title, description, date) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $title, $description, $date);

if ($stmt->execute()) {
    echo "Campaign data saved successfully!";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
