<?php
$page=basename($_SERVER['PHP_SELF'], ".php");
    // echo $page;
    include "config.php";
$select = "SELECT * FROM categories";
$query = mysqli_query($config,$select);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Blog</title>
  </head>
  <body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
  <div class="container">
    <a class="navbar-brand text-white" href="index.php">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  <?=($page=="index")?'text-dark':'text-white'; ?>" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <?php while($cats = mysqli_fetch_assoc($query)) { ?>
            <li><a class="dropdown-item" href="category.php?id=<?= $cats['cat_id'] ?>"><?= $cats['cate_name'] ?></a></li>
        	 <?php } ?>


          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($page == "login")?'text-dark':'text-white';?> " aria-current="page" href="login.php">Admin Login</a>
        </li>
        
        
      </ul>
      <form class="d-flex" action="search.php" method="GET">
          <?php
          if(isset($_GET['keyword'])){
              $keyword = $_GET['keyword'];
          }
          else{
              $keyword = "";
          }
          ?>
        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword" value = "<?=$keyword?>" autocomplete="off" maxlength="70" required>
        <button class="btn btn-outline-light" type="submit" >Search</button>
      </form>
    </div>
  </div>
</nav>
    
