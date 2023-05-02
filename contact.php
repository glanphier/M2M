<?php 
require './local/php/dbConnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['middle'] == null) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $msg = "Thank you $name for the submission regarding: ";
  $msg .= $message;
  $msg .= "We will get back to you as soon as possible.";
  $headers = "From: submission@glanphier.com" . "\r\n" .
"CC: info@glanphier.com";

  mail($email, "M2M Submission Recieved", $msg, $headers);
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
    <title>Mouth2Muscle | Contact Us</title>

    <Style>
        .contact-middle {
            display: none;
        }
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
        <h2 style="text-align: center;">Contact Us</h2>
        <br>

        <div class="container" id="form-container">
            <div class="row">
            <div class="col-6">
            <form name="form1" id="form-1" method="post" action="contact.php">
                <div class="row">
                    <div class="col s12 m5">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                <label for="fname">Name*</label>
                                <br>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
                                <span id="name_error"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="text" class="contact-middle" id="contact-middle" name="middle" />
                                <div class="form-group">
                                <label for="email">Email*</label> 
                                <br>
                                <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" />
                                <span id="email_error"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fdescription">Message*</label>
                                    <br>
                                    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Add a message here..."></textarea>
                                    <span id="message_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4" style="align-items: right">
                        <button type="reset" class="btn btn-outline-secondary" onclick="resetConfirmation()">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
                <br>
            </form>  
            <br>
            </div>
            <div class="col-6">
                <p style='text-align:center'>Fill out the form and click submit to enter!</p>
            </div>
            </div>
        </div> 
    </div>
        
      
        
      </div>
    </div>
  </div>
  <div class="container">
    <br>
    <p style="color:white">Copyright &#169; <?php echo date("Y")?> Mouth2Muscle. All rights reserved.</p>
  </div>
</body>
</html>