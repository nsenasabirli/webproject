<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WOW";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT coverImg, title, author FROM wowbooks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . "<img src='".$row["coverImg"]."'>" . "</td><td>" . $row["title"]. " " . $row["author"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>