<?php
include 'protect.php';


require 'connect.php';
$sql = "SELECT * FROM products";
$result = mysqli_query($con, $sql) or die( mysqli_error($con) );// executing the query
$rows = mysqli_fetch_all($result, 1);//assoc array
mysqli_close($con);//close the connection

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>
<?php include 'nav.php'?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
            <?php
//                $movie_count = count($_SESSION["products"]);
if (isset($_SESSION["products"])) 
    

                  $movie_count = count( array_unique($_SESSION["products"]) );
            ?>
                  <div class="row border mt-2 mb-2">
                  <div class="col-6 m-auto text-center">
                  You have  <?=$movie_count ?? 0 ?> movies in the cart</div>
                  <div class="col-6 text-center">
                  <a href="checkout.php" class="btn btn-success  btn-sm">Checkout</a>
                  </div>
                  </div>
                <table id="example" class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Poster</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($rows as $movie): ?>
                             <tr>
                             <td> <?= $movie["title"] ?> </td>
                             <td> <?= $movie["genre"] ?> </td>
                             <td> <?= $movie["description"] ?> </td>
                                <td><img src="<?=$movie['poster']?>" width="60px" height="60" alt=""></td> 
                                 <td><a class="btn btn-primary btn-sm" href="add-to-cart.php?id=<?= $movie["id"] ?>">Add To Cart</a>
                             </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

</body>
</html>