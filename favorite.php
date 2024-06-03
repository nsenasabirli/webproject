<?php
$servername = "localhost";
$username = "root";  // XAMPP's default username
$password = "";  // XAMPP's default password (empty)
$dbname = "WOW";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume $favorite_item is the item you want to add to or remove from favorites
$favorite_item = isset($_GET['item']) ? $_GET['item'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'add') {
    $sql = "INSERT INTO favorites (item) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $favorite_item);
    $stmt->execute();

    if ($stmt->affected_rows === 0) {
        echo "No favorite item was added.";
    } else {
        echo "Favorite item was added successfully.";
    }
} elseif ($action == 'remove') {
    $sql = "DELETE FROM favorites WHERE item = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $favorite_item);
    $stmt->execute();

    if ($stmt->affected_rows === 0) {
        echo "No favorite item was removed.";
    } else {
        echo "Favorite item was removed successfully.";
    }
}

$stmt->close();
$conn->close();
?>
