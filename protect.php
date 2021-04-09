<?php
session_start();
if (! isset($_SESSION["logged_in"])) {
    # code...
   header("location:login.php");
}

//checking if the session does not exist , we take the user to the login page.