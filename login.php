<?php

if ( isset($_REQUEST["password"]) )
{
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
require 'connect.php';
//retrieve a record that matches that email
//checck the password hashed
$query= mysqli_prepare($con,"SELECT * FROM users WHERE email=?");
mysqli_stmt_bind_param($query,"s",$email);
mysqli_stmt_execute($query);
$result=mysqli_stmt_get_result($query);
if (mysqli_num_rows($result)==1) {
    $user=mysqli_fetch_assoc($result);
    // var_dump($user);
    // die();
    $hash=$user["password"];
    if (password_verify($password,$hash)) {
        //success
        session_start();
        $_SESSION["names"]=$user["names"];
        $_SESSION["id"]=$user["id"];
        $_SESSION["logged_in"]=true;
        header("location:add_product.php");
    } else {
        setcookie("error","Wrong username or password",time()+3);
        # code...
    }
    
    # code...
} else {
    setcookie("error","Wrong username or password",time()+3);
}

}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Form</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'nav.php';
?>


<div class="container">
<div class="row justify-content-center">
<div class="col-sm-5">
<h4>Sign In</h4>
<form action="login.php" method="post">

<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" name="password" required>
</div>

<button class="btn btn-success">Sign In</button>


</form>
</div>
</div>
</div>



</body>
</html>