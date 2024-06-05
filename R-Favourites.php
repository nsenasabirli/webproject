<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Favourites</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
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

            // Get username and bookId from URL
            $username = $_GET['username'];
            $bookId = isset($_GET['bookId']) ? $_GET['bookId'] : null;

            if ($bookId) {
                // Get userId from wowusers table
                $sql = "SELECT userId FROM wowusers WHERE username = '$username'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $userId = $row['userId'];

                    // Insert into favourites table
                    $sql = "INSERT INTO favourites (userId, bookId) VALUES ('$userId', '$bookId')";
                    if ($conn->query($sql) === TRUE) {
                        echo "";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "No user found with username '$username'";
                }
            }

            // Get favourite books for the user
            $sql = "SELECT wowbooks.coverImg, wowbooks.title, wowbooks.author FROM favourites 
                    JOIN wowbooks ON favourites.bookId = wowbooks.bookId 
                    JOIN wowusers ON favourites.userId = wowusers.userId 
                    WHERE wowusers.username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-3 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="'.$row["coverImg"].'" class="card-img-top" alt="'.$row["title"].'">
                            <div class="card-body">
                                <h5 class="card-title">'.$row["title"].'</h5>
                                <p class="card-text">Author: '.$row["author"].'</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "<p>No favourites found for user '$username'.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
