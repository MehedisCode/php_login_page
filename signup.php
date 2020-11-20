<?php 
    $al = false;
    $err = false;
    $usr = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "partials/_dbconnect.php";
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $exist = false;
            $existSql = "SELECT * FROM `users` WHERE Username = '$username'";
            $result = mysqli_query($conn, $existSql);
            $existRow = mysqli_num_rows($result);

            if($existRow > 0){
                // echo "username already exists";
                $usr = true;
            }else{

            if(($password == $cpassword)){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`No`, `Username`, `Password`, `Time`) VALUES (NULL, '$username', '$hash', current_timestamp())";

                $result = mysqli_query($conn, $sql);
                if($result){
                    // echo "insert successful";
                    $al = true;
                }
            }else{
                // echo "Password dose not match";
                $err = true;
            }
        }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php require "partials/navbar.php"; 
    if($al){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
        </button>
        <strong>Success!</strong> Your account created successfully.
        </div>';
    }
    if($err){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
        </button>
        <strong>Error!</strong> Password dose not match.
        </div>';
    }
    if($usr){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
        </button>
        <strong>Error!</strong> Username already exist.
        </div>';
    }
 ?>
        
    <div class="container">

        <form class="d-flex flex-column align-items-center" action="/login/signup.php" method="POST">
        <h2 class="my-3">Create Accout</h2>
            <div class="form-group col-md-6">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" id="" aria-describedby="emailHelpId" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="" aria-describedby="emailHelpId" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="" aria-describedby="emailHelpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>