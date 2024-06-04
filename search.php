<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "WOW";

$conn = new mysqli($servername, $username, $password, $dbname);


$search_query = isset($_GET['query']) ? $_GET['query'] : '';
$sql = "SELECT title FROM wowbooks WHERE title LIKE ?";
$stmt = $conn->prepare($sql);
$search_query = "%" . $search_query . "%";
$stmt->bind_param("s", $search_query);
$stmt->execute();
$result = $stmt->get_result();

$results = [];
while ($row = $result->fetch_assoc()) {
    $results[] = $row['title'];
}

$stmt->close();
$conn->close();

echo json_encode($results);
?>

