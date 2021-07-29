<?php include("header.php") ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from sale_products where id=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $id1 = $row["sale_id"];
      $sql1 = "SELECT 
      sale_products.productname,sale_products.cost,sale_products.description,sale_products.image,sale_products.image2,sale_products.image3,sale_products.image4,sale_products.image5,sale_products.quantity,sale_products.sizechart,sale_products.id,sales.model_name
   FROM 
      sale_products
   INNER JOIN 
      sales
   ON
      sale_products.sale_id= sales.id  WHERE sale_products.sale_id='" . $id1 . "'  AND sale_products.id !='".$id."' ";
   //     $sql = "SELECT 
      $result1 = mysqli_query($conn, $sql1);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  
if( !empty($_SESSION)){
    if (isset($_GET['id']) && isset($_GET['tag']) ) {
        $tag = $_GET['tag'];
        $userid = $_SESSION['id'];
        $productid = $_GET['id'];
        if($tag == 'wishlist'){
        $sql = "SELECT * FROM `wishlist` WHERE product_id=$productid AND user_id=$userid";
        $result = mysqli_query($conn, $sql);
        //echo "result&&&&".$result;
       // echo mysqli_num_rows($result);
        if(mysqli_num_rows($result) == 0){
               
        
            $sql2 = "INSERT INTO `wishlist`(`user_id`, `product_id`) VALUES ('".$userid."','".$productid."')";
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
?>
            <div class="col-12">
                <!-- Main Content -->
                <main class="row">
                    <div class="col-12 bg-white py-3 my-3">
                        <div class="row">

                            <!-- Product Images -->
                            <div class="col-lg-5 col-md-12 mb-3">
                                <div class="col-12 mb-3">
                                    <div class="img-large border" style="background-image: url(<?php echo $upload_dir.$row['image']; ?>)"></div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                    <div class="col-sm-2 col-3">
                                            <div class="img-small border" style="background-image: url(<?php echo $upload_dir.$row['image']; ?>)" data-src="<?php echo $upload_dir.$row['image2']; ?>"></div>
                                        </div>
                                    <?php if (!empty($row['image2'])) { ?>
                                        <div class="col-sm-2 col-3">
                                            <div class="img-small border" style="background-image: url(<?php echo $upload_dir.$row['image2']; ?>)" data-src="<?php echo $upload_dir.$row['image2']; ?>"></div>
                                        </div>
                                        <?php }?>

                                        <?php if (!empty($row['image3'])) { ?>
                                        <div class="col-sm-2 col-3">
                                            <div class="img-small border" style="background-image: url(<?php echo $upload_dir.$row['image3']; ?>)" data-src="<?php echo $upload_dir.$row['image3']; ?>"></div>
                                        </div>
                                        <?php }?>

                                        <?php if (!empty($row['image4'])) { ?>
                                        <div class="col-sm-2 col-3">
                                            <div class="img-small border" style="background-image: url(<?php echo $upload_dir.$row['image4']; ?>)" data-src="<?php echo $upload_dir.$row['image4']; ?>"></div>
                                        </div>
                                        <?php }?>

                                        <?php if (!empty($row['image5'])) { ?>
                                        <div class="col-sm-2 col-3">
                                            <div class="img-small border" style="background-image: url(<?php echo $upload_dir.$row['image5']; ?>)" data-src="<?php echo $upload_dir.$row['image5']; ?>"></div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Images -->

                            <!-- Product Info -->
                            <div class="col-lg-5 col-md-9">
                                <div class="col-12 product-name large">
                                <?php echo $row['productname']; ?>
                                    <!-- Area @@s51M Gaming Laptop Welcome to A New ERA with 9TH GEN Intel CORE I9-9900K NVIDIA GEFORCE RTX 2080 8GB GDDR6 17.3" FHD 144HZ AG G-SYNC TOBII EYETRACKING (1TB SSD RAID|32GB RAM|10 PRO) -->
                                    <!-- <small>By <a href="#">Dell</a></small> -->
                                </div>
                                <div class="col-12 px-0">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <ul>
                                        <li>  <?php echo $row['description']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product Info -->

                            <!-- Sidebar -->
                            <div class="col-lg-2 col-md-3 text-center">
                                <div class="col-12 border-left border-top sidebar h-100">
                                    <div class="row">
                                        <div class="col-12">
                                        <span class="detail-price">
                                            ₹<?php echo $row['cost']; ?>
                                        </span>
                                            <span class="detail-price-old">
                                            ₹<?php echo $row['cost']; ?>
                                        </span>
                                        </div>
                                        <div class="col-xl-5 col-md-9 col-sm-3 col-5 mx-auto mt-3">
                                            <!-- <div class="mb-3">
                                                <label for="qty">Quantity</label>
                                                <input type="number" id="qty" min="1" value="1" class="form-control" required>
                                            </div> -->
                                        </div>
                                        <div class="col-12 mt-3">
                                        <!-- <button class="btn btn-outline-dark" type="button"><i class="fas fa-save me-2"></i>  </button> -->
                                            <button class="btn btn-outline-dark" type="button"><i class="fas fa-save me-2"></i><a href="product1.php?id=<?php echo $row['id'] ?>&tag=cart">Add To Cart</a></button>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-outline-secondary btn-sm" type="button"><i class="fas fa-heart me-2"></i<a href="product1.php?id=<?php echo $row['id'] ?>&tag=wishlist">Add To Wishlist</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar -->

                        </div>
                    </div>

                    <!-- Similar Product -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="row">
                                    <div class="col-12 text-center text-uppercase">
                                        <?php 	if(mysqli_num_rows($result1)){?>
                                        <h2>Similar Products</h2>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                <?php
                       
                            
                    				if(mysqli_num_rows($result1)){
                    					while($row1 = mysqli_fetch_assoc($result1)){
                          ?>
                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <div class="col-12 bg-white text-center h-100 product-item">
                                            <div class="row h-100">
                                                <div class="col-12 p-0 mb-3">
                                                    <a href="product1.php?id=<?php echo $row1['id'] ?>">
                                                        <img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="product1.php?id=<?php echo $row1['id'] ?>" class="product-name"><?php echo $row1['productname'] ?></a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <span class="product-price-old">
                                                        ₹<?php echo $row1['cost'] ?>
                                                    </span>
                                                    <br>
                                                    <span class="product-price">
                                                        ₹<?php echo $row1['cost'] ?>
                                                    </span>
                                                </div>
                                                <!-- <div class="col-12 mb-3 align-self-end">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                                </div> -->
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
                    <!-- Similar Products -->

                </main>
                <!-- Main Content -->
            </div>

      <?php include("footer.php"); ?>