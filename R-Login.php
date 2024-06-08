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
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Redirect to R-index3.php after successful login
        header("Location: R-index3.php?username=" . urlencode($username));
        exit();
    } else {
        header("Location: R-Login.php");
        echo '
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="alert alert-primary" role="alert">
        Invalid username or password. Try again.
      </div>';
    }
    $stmt->close();
}
$conn->close();
?>
