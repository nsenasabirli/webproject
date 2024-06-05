<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Books</title>
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

            $sql = "SELECT coverImg, title, author, bookId FROM wowbooks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-3 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="'.$row["coverImg"].'" class="card-img-top" alt="'.$row["title"].'">
                            <div class="card-body">
                                <h5 class="card-title">'.$row["title"].'</h5>
                                <p class="card-text">Author: '.$row["author"].'</p>
                                <a href="#" class="btn btn-primary">Add to Favorites</a>
                                <a href="R-BookDetails.php?bookId='.$row["bookId"].'" class="btn btn-secondary">Show Details</a>
                                <button id="favouriteButton1" onclick="toggleFavourite(this)">&#9829;</button>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "<p>No results found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
