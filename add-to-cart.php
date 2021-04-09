<?php
if (isset($_GET["id"])) {
    session_start();
    $_SESSION["products"][]=$_GET["id"];///creating an empty array

    # code...
}
header("location:sales.php");