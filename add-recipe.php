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
    <title>Add Recipe</title>

    <Style>
    </Style>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uploadDir = './local/images/';
        $recipeName = $_POST['nameInput'];
        $recipeDesc = $_POST['descriptionInput'];
        $recipeMeal = $_POST['mealInput'];
        $recipeThumbnailName = $_POST['thumbnailInput'];
        
        if ($recipeName != null && $recipeDesc != null && $recipeMeal != null) {
    
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO m2m_recipes (recipe_name, recipe_description, recipe_meal) VALUES (:nameInput, :descriptionInput, :mealInput);";
    
            $stmt = $conn->prepare($sql);
    
            $stmt->bindParam(':nameInput', $recipeName);
            $stmt->bindParam(':descriptionInput', $recipeDesc);		
            $stmt->bindParam(':mealInput', $recipeMeal);		
                    
    
            $stmt->execute(); 

            echo "
            <div class='bg-success shadow-sm' id='confirmation'>
            <p style='text-align:center; color:white'>Meal successfully entered into database!</p>
            </div>'
            
            ";
    
        } else {
            echo "
            <div style='background-color: red' class='shadow-sm' id='confirmation'>
            <p style='text-align:center'>Error inputting meal, please try again!</p>
            </div>'
            
            ";
        }
    
    }
    ?>
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
        <h2 class="m2m-center">Add Recipe</h2>
        <br>
        <form name="add-recipe-form" id="add-recipe-form" method="post" action="add-recipe.php">
        <div class="row">
          <div class="col-8">
            <div class="row">
                <div class="col-4">
                    <label for="heightInput">Name*</label>
                    <input type="text" class="form-control" id="nameInput" name="nameInput" placeholder="Name">
                </div>
                <div class="col-4">
                    <label for="mealInput">Meal*</label>
                    <select class="form-control" name="mealInput">
                        <option>Breakfast</option>
                        <option>Lunch</option>
                        <option>Dinner</option>
                        <option>Snack</option>
                    </select>
                </div>
            </div>
            <div class="col-8">
                <br>
                <label for="descriptionInput">Description*</label>
                <textarea id="descriptionInput" class="form-control" name="descriptionInput" rows="4"> </textarea>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
        <div class="col-4">
            <p>Add a new recipe to the database</p>
          </div>
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