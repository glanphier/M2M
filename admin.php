<?php 
require './local/php/dbConnect.php';

session_start();

if(!isset($_SESSION['username']))
{
    header('Location: login.php'); 
    exit; 
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link href="./local/style/style.css" rel="stylesheet"/>
    <title>Mouth2Muscle | Admin</title>

    <Style>
    </Style>
</head>
<body style="background-color: rgb(255, 139, 158);">
  <a href="./index.php">
    <img src="./local/images/m2mlogowhitestroke.png" class="mx-auto d-block">
  </a>
  <nav class="navbar sticky-top navbar-expand-lg bg-white shadow-sm">
    <div class="container">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <a class="navbar-brand" href="./index.php">
            <img src="./local/images/m2mlogoshort.png" style="max-height: 40px;">
          </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./bmi.php">BMI</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Recipes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./breakfast.php">Breakfast</a></li>
                <li><a class="dropdown-item" href="./lunch.php">Lunch</a></li>
                <li><a class="dropdown-item" href="./dinner.php">Dinner</a></li>
                <li><a class="dropdown-item" href="./snack.php">Snack</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Login</a>
</li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="bg-light">
    <div class="container bg-white rounded shadow-sm">
      <div class="container-fluid">
        <br>
        <h2 style="text-align: center;">Admin</h2>
        <br>
        <a href="./add-recipe.php" title="Add Recipe">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-square float-end" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
        </a>
        <h2 style=
        <div class='row row-cols-1 row-cols-md-4 g-4'>
        <?php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM m2m_recipes;";
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        
        while($row = $stmt->fetch()){
            $recipeID = $row['recipe_id'];

            $tablePrint = "<div class='col'>";
            $tablePrint .= "<div class='card h-100'>";
            $tablePrint .= "<img src='./local/images/product-placeholder.jpg' class='card-img-top'>";
            $tablePrint .= "<div class='card-body'>";
            $tablePrint .= "<h5 class='card-title'>". $row['recipe_name'] . "</h5>";
            $tablePrint .= "<h6 class='card-text' style='text-decoration: italic'>". $row['recipe_meal'] . "</h6>";
            $tablePrint .= "<h7 style='font-size: 15px'>" . $row['recipe_description'] . "</h7>";
            $tablePrint .= "<br><br>";
            $tablePrint .= "</div>";
            $tablePrint .= "</div>";
            $tablePrint .= "</div>";

            echo($tablePrint);
        }
        ?>
        </div>
        <br>
  
        
      
        
      </div>
    </div>
  </div>
  <div class="container">
    <br>
    <p style="color:white">Copyright &#169; <?php echo date("Y")?> Mouth2Muscle. All rights reserved.</p>
  </div>
</body>
</html>