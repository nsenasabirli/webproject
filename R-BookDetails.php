<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Book Details</title>

    <style>
        p{
            font-family: monospace;
            
        }
    </style>
</head>
<body>
    <div class="container mt-5">
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

        if (isset($_GET['bookId'])) {
            $bookId = $_GET['bookId'];

            // Assuming username is passed in URL
            $user = isset($_GET['username']) ? $_GET['username'] : 'defaultUser';

            $sql = "SELECT * FROM wowbooks WHERE bookId = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $bookId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '
                <div style="background-color: beige;" class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="'.$row["coverImg"].'" class="img-fluid rounded-start" alt="'.$row["title"].'">                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 style="font-family: cursive" class="card-title">'.$row["title"].'</h3>
                                <p class="card-text"><strong>Series:</strong> '.$row["series"].'</p>
                                <p class="card-text"><strong>Author:</strong> '.$row["author"].'</p>
                                <p class="card-text"><strong>Rating:</strong> '.$row["rating"].'</p>
                                <p class="card-text"><strong>Description:</strong> '.$row["description"].'</p>
                                <p class="card-text"><strong>Language:</strong> '.$row["language"].'</p>
                                <p class="card-text"><strong>ISBN:</strong> '.$row["isbn"].'</p>
                                <p class="card-text"><strong>Genres:</strong> '.$row["genres"].'</p>
                                <p class="card-text"><strong>Pages:</strong> '.$row["pages"].'</p>
                                <p class="card-text"><strong>Characters:</strong> '.$row["characters"].'</p>
                                <p class="card-text"><strong>Format:</strong> '.$row["bookFormat"].'</p>
                                <p class="card-text"><strong>Edition:</strong> '.$row["edition"].'</p>
                                <p class="card-text"><strong>Publisher:</strong> '.$row["publisher"].'</p>
                                <p class="card-text"><strong>Publish Date:</strong> '.$row["publishDate"].'</p>
                                <p class="card-text"><strong>First Publish Date:</strong> '.$row["firstPublishDate"].'</p>
                                <p class="card-text"><strong>Awards:</strong> '.$row["awards"].'</p>
                                <p class="card-text"><strong>Number of Ratings:</strong> '.$row["numRatings"].'</p>
                                <p class="card-text"><strong>Likes Percent:</strong> '.$row["likesPercent"].'</p>
                                <p class="card-text"><strong>Setting:</strong> '.$row["setting"].'</p>
                                <p class="card-text"><strong>BBE Score:</strong> '.$row["bbeScore"].'</p>
                                <p class="card-text"><strong>BBE Votes:</strong> '.$row["bbeVotes"].'</p>
                                <p class="card-text"><strong>Price:</strong> '.$row["price"].'</p>
                            </div>
                        </div>
                    </div>
                </div>';
            } else {
                echo "<p>Book details not found.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>No book ID provided.</p>";
        }

        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
