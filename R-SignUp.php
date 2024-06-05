<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WOW";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the username and password are set
if (isset($_GET["username"]) && isset($_GET["pass"])) {
    $username = $_GET["username"];
    $password = $_GET["pass"];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM wowusers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Username is not taken, insert new user
        $stmt = $conn->prepare("INSERT INTO wowusers (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            // Redirect to R-index3.php after successful registration
            header("Location: R-index3.php");
            
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Username is taken by another user, please enter another one.";
    }
    $stmt->close();
}
$conn->close();
?>
