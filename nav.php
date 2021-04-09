<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Dan Movies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
    <?php if (isset($_SESSION["logged_in"])):  ?>
      # code...
    
      <li class="nav-item">
        <a class="nav-link" href="add_user.php">Add User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_product.php">Add product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_customer.php">Add customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sales.php">Sales</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="#">Reports</a>
      </li>  
     
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?=$_SESSION["names"] ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="logout.php">Sign Out</a>
        
        
      </div>
    </li>

      <?php endif; ?>

      <?php if ( !isset($_SESSION["logged_in"])):  ?>
      <li class="nav-item">
      <a class="nav-link" href="#">Login</a>
    </li>
    <?php endif; ?>
    </ul>
  </div>  
</nav>






