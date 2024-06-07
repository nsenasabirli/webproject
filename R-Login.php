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
    $stmt = $conn->prepare("SELECT * FROM wowusers WHERE username = ? AND password = ?");
        $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Username is not taken, insert new user
        $stmt = $conn->prepare("INSERT INTO wowusers (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            // Redirect to R-index3.php after successful registration
            header("Location: R-index3.php?username=" . urlencode($username));
            
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        header("Location: R-Login.php");
        echo '
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="alert alert-primary" role="alert">
        Username registered before, please Login.
      </div>';
    }
    $stmt->close();
}
$conn->close();
?>