<?php
// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";         // Change to your MySQL username
$password = "";             // Change to your MySQL password
$database = "emp_portal";  // Change to your database name
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    echo "Connected successfully!";
}

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $department = $_POST["department"];
    $project = $_POST["project"];

    // Insert data into the database
    $sql = "INSERT INTO registeration (name, username, gender, department, project) VALUES ('$name', '$username', '$gender', '$department', '$project')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Employee added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error adding employee: " . $conn->error]);
    }
}

// Close the database connection
$conn->close();
?>
