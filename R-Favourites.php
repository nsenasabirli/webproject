<?php
$user = isset($_GET['username']) ? $_GET['username'] : 'defaultUser';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="../assets/js/color-modes.js"></script>
    <link rel="icon" href="C:/xampp/htdocs/Class/web/bootstrap-5.3.3-examples/heroes/wow.png" type="gif/x-icon" />
    <title>Favourites</title>
</head>
	<style>
        p{
            font-family: monospace;
            
        }
        body{
            padding-top: 70px;
        }
		.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 100px;
        }

        .search-container {
            margin-bottom: 20px;
        }

        #search-bar {
            width: 300px;
            padding: 10px;
            font-size: 16px;
        }
		button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        #results {
            margin-top: 20px;
        }
    </style>
	<link href="heroes.css" rel="stylesheet">
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>
<nav class="navbar navbar-expand-md fixed-top">
  <div class="container-fluid">
  	<img src ="wow.png" width="100px">
    <a class="navbar-brand" href="#"><b><i>WOW Books</b></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="R-index3.php?username=<?php echo urlencode($user); ?>">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="S-Books.php?username=<?php echo urlencode($user); ?>">Books</a>
          <li class="nav-item">
            <a class="nav-link" href="R-Electronics.php?username=<?php echo urlencode($user); ?>">Electronics</a>
        <li class="nav-item">
        <a class="nav-link" href="Games.php?username=<?php echo urlencode($user); ?>">Games</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link" href="Music.php?username=<?php echo urlencode($user); ?>">Music</a>
          <li class="nav-item">
          <a class="nav-link" href="R-Favourites.php?username=<?php echo urlencode($user); ?>">Favourites</a>
        </li>
      </ul>
      <div class="search-container">
    <form action="Search.php" method="get">
        <input type="text" name="query" id="search-bar" placeholder="Search...">
        <input type="hidden" name="username" value="<?php echo htmlspecialchars($_GET['username']); ?>">
        <button type="submit">Search</button>
    </form>
</div>
    </div>
  </div>
</nav>

<h1><br>My Favourites</h1>
<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button id = "light" type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button id = "dark" type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>
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
                    $sql = "INSERT INTO favourites (userId, bookId, electronicId) VALUES ('$userId', '$bookId', NULL)";
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

            $sql = "SELECT wowbooks.coverImg, wowbooks.title, wowbooks.author, wowbooks.bookId FROM favourites 
            JOIN wowbooks ON favourites.bookId = wowbooks.bookId 
            JOIN wowusers ON favourites.userId = wowusers.userId 
            WHERE wowusers.username = '$username'";
            $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<h3> Books <br><br> </h3>';

        while($row = $result->fetch_assoc()) {
            echo '
            <div style="background: oldlace" class="col-md-3 mb-4">
            <div class="card" style="width: 300px; height: 600px;">
            <img src="'.$row["coverImg"].'" class="card-img-top" alt="'.$row["title"].'" style="width: 100%; height: 70%;">
                    <div class="card-body">
                        <h5 class="card-title">'.$row["title"].'</h5>
                        <p class="card-text">Author: '.$row["author"].'</p>
                        <a href="R-BookDetails.php?username='.$username.'&bookId='.$row["bookId"].'" class="btn btn-primary">Show Details</a>
                    </div>
                </div>
            </div>';
        }
    } 




             // Get favourite electronic device for the user


            $electronicId = isset($_GET['electronicId']) ? $_GET['electronicId'] : null;

            if ($electronicId) {
                // Get userId from wowusers table
                $sql2 = "SELECT userId FROM wowusers WHERE username = '$username'";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    $row = $result2->fetch_assoc();
                    $userId = $row['userId'];

                    // Insert into favourites table
                    $sql2 = "INSERT INTO favourites (userId, bookId, electronicId) VALUES ('$userId', NULL, '$electronicId')";
                    if ($conn->query($sql2) === TRUE) {
                        echo "";
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }
                } 
            }

             $sql2 = "SELECT wowlaptops.img_link, wowlaptops.name, wowlaptops.storage, wowlaptops.electronicId FROM favourites 
             JOIN wowlaptops ON favourites.electronicId = wowlaptops.electronicId 
             JOIN wowusers ON favourites.userId = wowusers.userId 
             WHERE wowusers.username = '$username'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                echo '<h3> Electronics <br><br> </h3>';
                while($row = $result2->fetch_assoc()) {
                    echo '
                    <div class="col-md-3 mb-4">
                    <div class="card" style="width: 300px; height: 420px;">
                    <img src="'.$row["img_link"].'" class="card-img-top" alt="'.$row["name"].'" style="width: 100%; height: 50%;">
                        <div class="card-body">
                            <h5 class="card-title">'.$row["name"].'</h5>
                            <p class="card-text">Storage: '.$row["storage"].'</p>
                            <a href="R-ElectronicDetails.php?username='.$username.'&electronicId='.$row["electronicId"].'" class="btn btn-primary">Show Details</a>

                        </div>
                    </div>
                </div>';

                }
            } 


            $musicId = isset($_GET['musicId']) ? $_GET['musicId'] : null;

            if ($musicId) {
                // Get userId from wowusers table
                $sql3 = "SELECT userId FROM wowusers WHERE username = '$username'";
                $result3 = $conn->query($sql3);

                if ($result3->num_rows > 0) {
                    $row = $result3->fetch_assoc();
                    $userId = $row['userId'];

                    // Insert into favourites table
                    $sql3 = "INSERT INTO favourites (userId, bookId, electronicId, musicId) VALUES ('$userId', NULL, NULL, '$musicId')";
                    if ($conn->query($sql3) === TRUE) {
                        echo "";
                    } else {
                        echo "Error: " . $sql3 . "<br>" . $conn->error;
                    }
                } 
            }

             $sql3 = "SELECT wowmusic.release_date, wowmusic.track_name, wowmusic.artist_name, wowmusic.musicId FROM favourites 
             JOIN wowmusic ON favourites.musicId = wowmusic.musicId 
             JOIN wowusers ON favourites.userId = wowusers.userId 
             WHERE wowusers.username = '$username'";
            $result3 = $conn->query($sql3);

            if ($result3->num_rows > 0) {
                echo '<h3> Music <br><br> </h3>';
                while($row = $result3->fetch_assoc()) {
                    echo '
                    <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">'.$row["track_name"].'</h5>
                      <h6 class="card-subtitle mb-2 text-muted">'.$row["artist_name"].'</h6>
                      <p class="card-text"><strong>Release Date:</strong> '.$row["release_date"].'</p>
                      <div class="d-flex">
                      <a href="MusicDetails.php?username='.$username.'&musicId='.$row["musicId"].'" class="btn btn-secondary">Show Details</a>
                      </div>
                    </div>
                  </div>';

                }
            } 

            $game_id = isset($_GET['game_id']) ? $_GET['game_id'] : null;

            if ($game_id) {
                // Get userId from wowusers table
                $sql4 = "SELECT userId FROM wowusers WHERE username = '$username'";
                $result4 = $conn->query($sql4);

                if ($result4->num_rows > 0) {
                    $row = $result4->fetch_assoc();
                    $userId = $row['userId'];

                    // Insert into favourites table
                    $sql4 = "INSERT INTO favourites (userId, bookId, electronicId, musicId, game_id) VALUES ('$userId', NULL, NULL, NULL, '$game_id')";
                    if ($conn->query($sql4) === TRUE) {
                        echo "";
                    } else {
                        echo "Error: " . $sql4 . "<br>" . $conn->error;
                    }
                } 
            }

             $sql4 = "SELECT wowgames.image_url, wowgames.names, wowgames.age, wowgames.category, wowgames.game_id FROM favourites 
             JOIN wowgames ON favourites.game_id = wowgames.game_id 
             JOIN wowusers ON favourites.userId = wowusers.userId 
             WHERE wowusers.username = '$username'";
            $result4 = $conn->query($sql4);

            if ($result4->num_rows > 0) {
                echo '<h3> Games <br><br> </h3>';
                while($row = $result4->fetch_assoc()) {
                    echo '
                    <div class="col-md-3 mb-4">
                    <div class="card" style="width: 300px; height: 500px;" >
                    <img src="'.$row["image_url"].'" class="card-img-top" alt="'.$row["names"].'" style="width: 300px; height: 50%;">
                            
                            <div class="card-body">
                                <h5 class="card-title">'.$row["names"].'</h5>
                                <p class="card-text">Age: '.$row["age"].'</p>
                                <p class="card-text">Category: '.$row["category"].'</p>
                                <a href="GameDetails.php?username='.$username.'&game_id='.$row["game_id"].'" class="btn btn-secondary">Show Details</a>

                                <div class="d-flex">
                                </div>
                            </div>
                        </div>
                    </div>';

                }
            } 


            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>