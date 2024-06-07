<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WOW";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get the username from the URL
$username = isset($_GET['username']) ? $_GET['username'] : 'Guest';

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/color-modes.js"></script>
    <link rel="icon" href="C:\xampp\htdocs\Class\web\bootstrap-5.3.3-examples\heroes\wow.png" type="gif/x-icon" />
    <title>WOW Books</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/heroes/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
            padding: 110px;
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
       /* SLİDER */       
        * {box-sizing: border-box;}
        body {font-family: Verdana, sans-serif;}
        .mySlides {display: none;}
        img {vertical-align: middle;}

      .slideshow-container {
        max-width: 800px;
        position: relative;
        margin: auto;
		}

      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 70%;
        text-align: center;
		}

      /* Number text (1/5 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 10px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

      .dot {
         height: 15px;
         width: 15px;
         margin: 0 2px;
         background-color: #bbb;
         border-radius: 50%;
         display: inline-block;
         transition: background-color 0.6s ease;
		 }

      .active {
        background-color: #717171;
		}

      .fade {
         animation-name: fade;
        animation-duration: 1.5s;
		}

	  @keyframes fade {
	  from {opacity: .4} 
      to {opacity: 1}
	  }

	  /* On smaller screens, decrease text size */
	  @media only screen and (max-width: 300px) {
      .text {font-size: 11px}
	  } 
    </style>
    <!-- Custom styles for this template -->
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
          <a class="nav-link active" aria-current="page" href="R-index3.php?username=<?php echo urlencode($username); ?>">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="S-Books.php?username=<?php echo urlencode($username); ?>">Books</a>
          <li class="nav-item">
            <a class="nav-link" href="R-Electronics.php?username=<?php echo urlencode($username); ?>">Electronics</a>
        <li class="nav-item">
          <a class="nav-link" href="Games.php?username=<?php echo urlencode($username); ?>">Games</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link" href="Music.php?username=<?php echo urlencode($username); ?>">Music</a>
          <li class="nav-item">
          <a class="nav-link" href="R-Favourites.php?username=<?php echo urlencode($username); ?>">Favourites</a>
        </li>
      </ul>
      <div class="search-container">
        <input type="text" id="search-bar" placeholder="Search...">
        <button onclick="search()">Search</button>
    </div>
    <div id="results"></div>
    </div>
  </div>
</nav>
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
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
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
<div >
<main>
  <h1 class="visually-hidden">Books</h1>
  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 5</div>
      <img src="img1.jpg" style="width:100%; height:500px">
      <div class="text"></div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">2 / 5</div>
      <img src="img2.jpg" style="width:100%; height:500px">
      <div class="text"></div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">3 / 5</div>
      <img src="img3.jpg" style="width:100%; height:500px">
      <div class="text"></div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">4 / 5</div>
      <img src="img4.jpg" style="width:100%; height:500px">
      <div class="text"></div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">5 / 5</div>
      <img src="img5.jpg" style="width:100%; height:500px">
      <div class="text"></div>
    </div>
    
    </div>
</div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>
	
  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold text-body-emphasis"><b>New Releases</b></h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">One of the significant trends in new releases is the rising prominence of local authors gaining international acclaim, bringing unique stories to a global audience.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <a href="R-BookDetails.php?username=<?php echo $username; echo "&bookId=2657.To_Kill_a_Mockingbird";?>">
        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">To Kill a Mockingbird</button></a>

        <a href="R-BookDetails.php?username=<?php echo $username; echo "&bookId=370493.The_Giving_Tree";?>">
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">The Giving Tree</button></a>
      </div>
    </div>
  </div>

  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold text-body-emphasis">Bestseller</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">This season's bestsellers encompass a wide range of genres, from gripping thrillers and heartwarming romances to thought-provoking non-fiction and enlightening self-help guides. </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <a href="R-BookDetails.php?username=<?php echo $username; echo "&bookId=5129.Brave_New_World";?>">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" >Brave New World</button></a>

        <a href="R-BookDetails.php?username=<?php echo $username; echo "&bookId=2.Harry_Potter_and_the_Order_of_the_Phoenix";?>">
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Harry Potter and the Order of the Phoenix</button></a>
      </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
      </div>
    </div>
  </div>

  <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
      </div>
      <div class="col-lg-6">
    <div class="col-lg-6">
    <div class="col-lg-6">
    <div class="col-lg-6">
    <div class="col-lg-6">
    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><i>Highlighted Authors</i></h1>
    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
        <div style="display: flex; align-items: flex-start; margin-right: 20px; flex: 1;">
            <img src="https://icdn.ensonhaber.com/crop/703x0/resimler/diger/kok/2024/04/27/662ca599e5451782__w1200xh1303.jpg" alt="Aldous Huxley" style="width: 330px; height: auto; margin-right: 20px; border: 5px solid white;">
            <div style="width: 150px; height: 360px; display: flex; align-items: center; justify-content: center; border: 2px solid white; padding: 10px; box-sizing: border-box;">
                <p class="lead" style="text-align: center; font-family: Arial;">Aldous Huxley was an English writer and philosopher best known for his dystopian novel "Brave New World"...</p>
            </div>
        </div>
        <div style="display: flex; align-items: flex-start; flex: 1;">
            <img src="https://m.media-amazon.com/images/M/MV5BMTQyODc5Nzc2MF5BMl5BanBnXkFtZTcwNDAwODgxOA@@._V1_.jpg" style="width: 310px; height: auto; margin-right: 20px; border: 5px solid white;">
            <div style="width: 150px; height: 360px; display: flex; align-items: center; justify-content: center; border: 2px solid white; padding: 10px; box-sizing: border-box;">
                <p class="lead" style="text-align: center; font-family: Arial;">Suzanne Collins is an American author best known for her dystopian young adult series "The Hunger Games".</p>
            </div>
        </div>
    </div>
</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>
      </div>
    </div>
  </div>
  
  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <!-- Left Column for Text -->
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Award-Winning Books</h1>
            <p class="col-lg-10 fs-4">"Award-Winning Books" showcases some of the finest literary works in the world. These include winners of prestigious awards such as the Pulitzer Prize, Man Booker Prize, Nobel Prize, and more.</p>
        </div>
        <!-- Right Column for Buttons -->
        <div class="col-lg-5">
            <div class="row">
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <a href="R-BookDetails.php?username=<?php echo $username; echo '&bookId=13079982-fahrenheit-451';?>">
                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
                            <img src="https://m.media-amazon.com/images/I/61z7RDG3OIL._AC_UF894,1000_QL80_.jpg" alt="Image" width="100" height="150" class="me-2">
                        </button>
                    </a>
                </div>
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <a href="R-BookDetails.php?username=<?php echo $username; echo '&bookId=3.Harry_Potter_and_the_Sorcerer_s_Stone';?>">
                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
                            <img src="https://m.media-amazon.com/images/I/71RVt35ZAbL._AC_UF1000,1000_QL80_.jpg" alt="Image" width="100" height="150" class="me-2">
                        </button>
                    </a>
                </div>
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <a href="R-BookDetails.php?username=<?php echo $username; echo '&bookId=231804.The_Outsiders';?>">
                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
                            <img src="https://m.media-amazon.com/images/I/61IvEGeD5bL._AC_UF1000,1000_QL80_.jpg" alt="Image" width="100" height="150" class="me-2">
                        </button>
                    </a>
                </div>
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <a href="R-BookDetails.php?username=<?php echo $username; echo '&bookId=38447.The_Handmaid_s_Tale';?>">
                        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
                            <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1578028274i/38447.jpg" alt="Image" width="100" height="150" class="me-2">
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>
  </div>

  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
    <h1 class="display-4 fw-bold lh-1 text-body-emphasis">User Reviews</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <div class="user-review">
            <p><strong>Mark Lawrence says about <i>Watership Down:</i></strong></p>
            <p>I read this book an age ago. Maybe 40 years ago the first time.</p>
            <p>Lots of authors have written animal stories but they tend to be cute little tales where the level of anthropomorphism is such that the rabbits or whatever are practically, or literally, wearing waistcoats and top hats. We only need to look to Wind in the Willows or Beatrix Potter for examples.</p><br>
			<p>“But people will do anything rather than admit that their lives have no meaning. No use, that is. No plot.”
<i>― Margaret Atwood, The Handmaid’s Tale</i></p>
<p>"Ponyboy? Who?
One thing that you can believe is, when your elders say that you don’t stay the same, they are correct." <i> ― S.E. Hinton, The Outsiders</i></p>
        </div>
    </div>
</div>
	<div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
        <div style="padding-top:73.146%;position:relative;"><iframe src="https://gifer.com/embed/jVo" width="100%" height="100%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div><p><a href="https://gifer.com"></a></p>
		<iframe src="https://gifer.com/embed/VMzK" width=480 height=240.960 frameBorder="0" allowFullScreen></iframe><p><a href="https://gifer.com"></a></p>
    </div>
    </div>
  </div>
<script>
	async function search() {
            const query = document.getElementById('search-bar').value;
            const resultsContainer = document.getElementById('results');
            resultsContainer.innerHTML = '';

            try {
                const response = await fetch(`search.php?query=${encodeURIComponent(query)}`);
                const results = await response.json();

                if (results.length > 0) {
                    results.forEach(result => {
                        const resultItem = document.createElement('div');
                        resultItem.textContent = result;
                        resultsContainer.appendChild(resultItem);
                    });
                } else {
                    resultsContainer.textContent = 'No results.';
                }
            } catch (error) {
                resultsContainer.textContent = 'Something went wrong.';
                console.error('Error fetching search results:', error);
            }
        }
  async function toggleFavourite(button) {
    // Use the button's own 'isFavourite' property to track its state
    button.isFavourite = !button.isFavourite;
    
    var item = button.id;  // Assume the button's id is the item to be added/removed
    var action = button.isFavourite ? 'add' : 'remove';
  
    try {
      const response = await fetch(`favorites.php?item=${encodeURIComponent(item)}&action=${encodeURIComponent(action)}`);
      const result = await response.text();
  
      console.log(result);
  
      if (button.isFavourite) {
        console.log('Favourited!')
        button.style.backgroundColor = 'red';
        button.style.color = 'white';
      } else {
        console.log('Unfavourited!')
        button.style.backgroundColor = 'white';
        button.style.color = 'black';
      }
    } catch (error) {
      console.error('Error updating favorites:', error);
    }
  }
    /* SLİDER */   
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
} /* SLİDER */ 

</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>