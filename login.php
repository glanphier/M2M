<?php 
require "./local/php/dbConnect.php";

   ob_start();
   session_start();

   if(isset($_SESSION['username']))
{
    header('Location: admin.php'); 
    exit; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouth2Muscle | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link href="./local/style/style.css" rel="stylesheet"/>
    <link href="./local/style/loginstyle.css" rel="stylesheet"/>
</head>
<?php    
            if (($_SERVER["REQUEST_METHOD"] == "POST")) {

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_id=1;";
                $stmt = $conn->prepare($sql);
                $stmt->execute(); 
                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                while($row = $stmt->fetch()){
                  if ($_POST['username'] == $row['event_user_name'] && 
                    $_POST['password'] == $row['event_user_password']) {
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = 'Admin';
                  
                  echo "Welcome back " . $_SESSION['username'];
                  header("Location: ./admin.php");
                }else {
                    echo 'Wrong username or password';
                }
              }
            }
         ?>
<body class="bg-light">
    <img src="./local/images/m2mlogowhitestroke.png" class="mx-auto d-block">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
            <form name="login-form" id="login-form" method="post" action="login.php">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <label for="username">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                  in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<html>