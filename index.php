<?php include "header.php"; 

if( !empty($_SESSION)){
if (isset($_GET['id']) ) {
    $tag = $_GET['tag'];
    $userid = $_SESSION['id'];
    $productid = $_GET['id'];
    if($tag == 'save'){
    $sql = "SELECT * FROM `savelist` WHERE product_id=$productid AND user_id=$userid";
    $result = mysqli_query($conn, $sql);
    //echo "result&&&&".$result;
   // echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0){
           
    
        $sql2 = "INSERT INTO `savelist`(`user_id`, `product_id`) VALUES ('".$userid."','".$productid."')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
        }
     }
    }
    else{
        $sql = "SELECT * FROM `cart` WHERE product_id=$productid AND user_id=$userid";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0){
           
            $sql2="INSERT INTO `cart`(`user_id`, `product_id`, `quantity`, `instructions`) VALUES ('".$userid."','".$productid."','1','')";
          //  $sql2 = "INSERT INTO `savelist`(`user_id`, `product_id`) VALUES ('".$userid."','".$productid."')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
            }
         }
         else{
            $row = mysqli_fetch_assoc($result);
            $quantity = $row['quantity'] + 1;
            $sql2="UPDATE `cart` SET `quantity`='".$quantity."' WHERE `user_id`=$userid AND `product_id`=$productid";
 //  $sql2="INSERT INTO `cart`(`user_id`, `product_id`, `quantity`, `instructions`) VALUES ('".$userid."','".$productid."','".$quantity."','')";
            //  $sql2 = "INSERT INTO `savelist`(`user_id`, `product_id`) VALUES ('".$userid."','".$productid."')";
              $result2 = mysqli_query($conn, $sql2);
              if ($result2) {
              }
         }
    }
}}
else{
    echo '<script>alert("Please Login To Add the Models To SaveLists")</script>';
}
// else{
//     header('location:login.php');
//     exit();
// }
?>
            <div class="col-12">
                <!-- Main Content -->
                <main class="row">

                    <!-- Slider -->
                    <div class="col-12 px-0">
                        <div id="slider" class="carousel slide w-100" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#slider" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#slider" data-bs-slide-to="1"></li>
                                <li data-bs-target="#slider" data-bs-slide-to="2"></li>
                                <li data-bs-target="#slider" data-bs-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                            <?php
                            $sql = "SELECT * FROM `slideshow`";
                            $count =0;
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                                            $count++;
                                            if($count == 1){?>
    <div class="carousel-item active">
                                    <img src="<?php echo $upload_dir.$row['image'] ?>" class="slider-img">
                                </div>
                                           <?php }
                                           else{?>
 <div class="carousel-item">
                                    <img src="<?php echo $upload_dir.$row['image'] ?>" class="slider-img">
                                </div>
                                       <?php    }
                                         
                         
                               
                             
                                 
                                 
                               
                              }
                            }
                          ?>
                                <!-- <div class="carousel-item">
                                    <img src="images/slider-2.jpg" class="slider-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/slider-3.jpg" class="slider-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/slider-1.jpg" class="slider-img">
                                </div> -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <!-- Slider -->

                    <!-- Featured Products -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 py-3">

                                <div class="row">
                                    <div class="col-12 text-center text-uppercase">
                                        <h2>Models</h2>
                                    </div>
                                </div>

                                <div class="row">

                                <?php
                            $sql = "SELECT 
                            model_products.product_name,model_products.cost,model_products.product_name,model_products.image,model_products.description, model_products.status,model_products.id,models.categoryname
                        FROM 
                            model_products
                        INNER JOIN 
                            models
                        ON
                            model_products.model_id= models.id
                         ";
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <div class="col-12 bg-white text-center h-100 product-item">
                                            <div class="row h-100">
                                                <div class="col-12 p-0 mb-3">
                                                    <a href="product.php?id=<?php echo $row['id'] ?>">
                                                        <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="product.php?id=<?php echo $row['id'] ?>" class="product-name"><?php echo $row['product_name'] ?></a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <span class="product-price">
                                                        ₹ <?php echo $row['cost'] ?>
                                                    </span>
                                                </div>
                                                <div class="col-12 mb-3 align-self-end">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-save me-2"></i>  <a href="index.php?id=<?php echo $row['id'] ?>&tag=save">Save</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product -->

                                
                                 <?php
                              }
                            }
                          ?>
                               
                                  
                             
                                
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Products -->

                    <div class="col-12">
                        <hr>
                    </div>

                    <!-- Latest Product -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="row">
                                    <div class="col-12 text-center text-uppercase">
                                        <h2>Latest Products</h2>
                                    </div>
                                </div>
                                <div class="row">
                                <?php
                            $sql = "SELECT 
                            sale_products.productname,sale_products.cost,sale_products.description,sale_products.image,sale_products.quantity,sale_products.sizechart,sale_products.id,sales.model_name
                        FROM 
                            sale_products
                        INNER JOIN 
                            sales
                        ON
                            sale_products.sale_id= sales.id
                         ";
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <div class="col-12 bg-white text-center h-100 product-item">
                                            <span class="new">New</span>
                                            <div class="row h-100">
                                                <div class="col-12 p-0 mb-3">
                                                    <a href="product1.php?id=<?php echo $row['id'] ?>">
                                                        <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="product1.php?id=<?php echo $row['id'] ?>" class="product-name"><?php echo $row['productname'] ?></a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <span class="product-price-old">
                                                        ₹<?php echo $row['cost'] ?>
                                                    </span>
                                                    <br>
                                                    <span class="product-price">
                                                        ₹<?php echo $row['cost'] ?>
                                                    </span>
                                                </div>
                                                <div class="col-12 mb-3 align-self-end">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i><a href="index.php?id=<?php echo $row['id'] ?>&tag=cart">Add to cart</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product -->

                                    <?php
                              }
                            }
                          ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Latest Products -->

                    <div class="col-12">
                        <hr>
                    </div>

            
                    <div class="col-12 py-3 bg-light d-sm-block d-none">
                        <div class="row">
                            <div class="col-lg-3 col ms-auto large-holder">
                                <div class="row">
                                    <div class="col-auto ms-auto large-icon">
                                        <i class="fas fa-money-bill"></i>
                                    </div>
                                    <div class="col-auto me-auto large-text">
                                        Best Price
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col large-holder">
                                <div class="row">
                                    <div class="col-auto ms-auto large-icon">
                                        <i class="fas fa-truck-moving"></i>
                                    </div>
                                    <div class="col-auto me-auto large-text">
                                        Fast Delivery
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col me-auto large-holder">
                                <div class="row">
                                    <div class="col-auto ms-auto large-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="col-auto me-auto large-text">
                                        Genuine Products
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Main Content -->
            </div>

<?php include "footer.php"; ?>