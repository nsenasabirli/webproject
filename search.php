<?php
$servername = "localhost";
$username = "root";  // XAMPP'in varsayılan kullanıcı adı
$password = "";  // XAMPP'in varsayılan şifresi (boş)
$dbname = "arama_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$search_query = isset($_GET['query']) ? $_GET['query'] : '';
$sql = "SELECT konu FROM arama_verileri WHERE konu LIKE ?";
$stmt = $conn->prepare($sql);
$search_query = "%" . $search_query . "%";
$stmt->bind_param("s", $search_query);
$stmt->execute();
$result = $stmt->get_result();

$results = [];
while ($row = $result->fetch_assoc()) {
    $results[] = $row['konu'];
}

$stmt->close();
$conn->close();

echo json_encode($results);
?>

