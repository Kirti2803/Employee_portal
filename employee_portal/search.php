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

// Handling the search
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $searchType = $_GET["searchType"];
    $query = $_GET["query"];

    // Perform the search based on searchType
    $sql = "SELECT * FROM employees WHERE $searchType LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $searchResults = [];
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
        echo json_encode(["success" => true, "results" => $searchResults]);
    } else {
        echo json_encode(["success" => false, "message" => "No results found"]);
    }
}

// Close the database connection
$conn->close();
?> 