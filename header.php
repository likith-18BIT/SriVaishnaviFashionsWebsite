<?php


  include('db_connect.php');
  $upload_dir = 'Admin/uploads/';
  session_start();
  
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sri Vaishnavi Fashions</title>

    <!-- <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet"> -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid">

        <div class="row min-vh-100">
            <div class="col-12">
                <header class="row">
                    <!-- Top Nav -->
                    <div class="col-12 bg-dark py-2 d-md-block d-none">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <ul class="top-nav">
                                    <li>
                                        <a href="9441958235"><i class="fa fa-phone-square me-2"></i>9441958235</a>
                                    </li>
                                    <li>
                                        <a href="Srivaishnavifashions1976@gmail.com"><i class="fa fa-envelope me-2"></i>Srivaishnavifashions1976@gmail.com</a>
                                    </li>
                                    <li>
                                        <a href="https://instagram.com/sri_vaishnavi_fashions?utm_medium=copy_link" target="_blank"><i class="fab fa-instagram me-2"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <ul class="top-nav">
                                <?php if(!empty($_SESSION))
                                { 
                                    if($_SESSION["name"]) {
?>
                                      <li>
                                        <a href="logout.php"><i class="fas fa-user-edit me-2"></i><?php echo $_SESSION["name"];  ?></a>
                                    </li>
                                    <?php }} else {?>
                                    <li>
                                        <a href="register.php"><i class="fas fa-user-edit me-2"></i>Register</a>
                                    </li>
                                    <li>
                                        <a href="login.php"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Nav -->

                    <!-- Header -->
                    <div class="col-12 bg-white pt-4">
                        <div class="row">
                            <div class="col-lg-auto">
                                <div class="site-logo text-center text-lg-left">
                                 <!-- <a href="index.php">
                                    <img src="logo.png" class="img-fluid">
                                      </a> -->
                                    <a href="index.php">Sri Vaishnavi Fashions<br>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" class="form-control border-dark" placeholder="Search..." required>
                                            <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-auto text-center text-lg-left header-item-holder">
                            <?php if(!empty($_SESSION))
                                { ?>
                                <a href="heart.php" class="header-item">
                                    <i class="fas fa-heart me-2"></i><span id="header-favorite">2</span>
                                </a>
                                <?php } else {?>
                                    <a href="heart.php" class="header-item">
                                    <i class="fas fa-heart me-2"></i><span id="header-favorite">2</span>
                                </a>
                                    <?php } ?>



                                    <?php if(!empty($_SESSION))
                                { ?>
                                    <a href="save.php" class="header-item">
                                    <i class="fas fa-save me-2"></i><span id="header-favorite">2</span>
                                    
                                </a>
                                <?php } else {?>
                                    <a href="save.php" class="header-item">
                                    <i class="fas fa-save me-2"></i><span id="header-favorite">2</span>
                                    
                                </a>
                                <?php } ?>

                                
                                <?php if(!empty($_SESSION))
                                { ?>
                                <a href="cart.php" class="header-item">
                                    <i class="fas fa-shopping-bag me-2"></i><span id="header-qty" class="me-3">2</span>
                                    <!-- <i class="fas fa-money-bill-wave me-2"></i><span id="header-price">₹4,000</span> -->
                                </a>
                                <?php } else {?>
                                    <a href="cart.php" class="header-item">
                                    <i class="fas fa-shopping-bag me-2"></i><span id="header-qty" class="me-3">2</span>
                                    <!-- <i class="fas fa-money-bill-wave me-2"></i><span id="header-price">₹4,000</span> -->
                                </a>
                                <?php } ?>
                                
                            </div>
                        </div>

                        <!-- Nav -->
                        <div class="row">
                            <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                                <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="mainNav">
                                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="electronics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Models</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <!-- <a class="dropdown-item" href="category.php">Maggam Works</a>
                                                <a class="dropdown-item" href="#">Machine Embroidery</a>
                                                <a class="dropdown-item" href="#">Computer Embroidery</a>
                                                <a class="dropdown-item" href="#">Aari Machine Work</a>
                                                <a class="dropdown-item" href="#">Blouses</a>
                                                <a class="dropdown-item" href="#">Sarees</a>
                                                <a class="dropdown-item" href="#">Long Frocks</a>
                                                <a class="dropdown-item" href="#">Short Frocks</a>
                                                <a class="dropdown-item" href="#">Lehangas</a>
                                                <a class="dropdown-item" href="#">Dresses</a>
                                                <a class="dropdown-item" href="#">Kurtis</a>
                                                <a class="dropdown-item" href="#">Waist Belts</a>
                                                <a class="dropdown-item" href="#">Bridal Wear</a>
                                                <a class="dropdown-item" href="#">Kids Wear</a>
                                                <a class="dropdown-item" href="#">Sharwani</a> -->
                                                <?php
                            $sql = "select * from models";
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                           <a class="dropdown-item" href="category.php?id=<?php echo $row['id'] ?>"><?php  echo $row['categoryname']; ?></a>
                              <?php
                              }
                            }
                          ?>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="fashion" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sale Products</a>
                                            <div class="dropdown-menu" aria-labelledby="fashion">
                                                <!-- <a class="dropdown-item" href="saleproducts.php">Sarees</a>
                                                <a class="dropdown-item" href="#">Materials</a>
                                                <a class="dropdown-item" href="#">Maggam Works</a>
                                                <a class="dropdown-item" href="#">Computer Embroidery</a>
                                                <a class="dropdown-item" href="#">Blouses</a>
                                                <a class="dropdown-item" href="#">Long Frocks</a>
                                                <a class="dropdown-item" href="#">Short Frocks</a>
                                                <a class="dropdown-item" href="#">Lehangas</a>
                                                <a class="dropdown-item" href="#">Dresses</a>
                                                <a class="dropdown-item" href="#">Kurtis</a>
                                                <a class="dropdown-item" href="#">Waist Belts</a>
                                                <a class="dropdown-item" href="#">Kids Wear</a>
                                                <a class="dropdown-item" href="#">Sharwani</a> -->
                                                <?php
                            $sql = "select * from sales";
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                           <a class="dropdown-item" href="saleproducts.php?id=<?php echo $row['id'] ?>"><?php  echo $row['model_name']; ?></a>
                              <?php
                              }
                            }
                          ?>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="about.php">AboutUs</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" href="contact.php">Contact Us</a>
                                          </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Nav -->

                    </div>
                    <!-- Header -->

                </header>
            </div>
