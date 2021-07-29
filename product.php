<?php include("header.php") ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if(!isset($_GET['tag'])){
        //  echo "tag no";
        $sql = "select * from model_products where id=".$id;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $id1 = $row["model_id"];
          $sql1 = "SELECT 
          model_products.product_name,model_products.cost,model_products.product_name,model_products.image,model_products.description, model_products.status,model_products.id,models.categoryname
      FROM 
          model_products
      INNER JOIN 
          models
      ON
          model_products.model_id= models.id WHERE model_products.model_id='" . $id1 . "' AND model_products.id !='".$id."' ";;
          $result1 = mysqli_query($conn, $sql1);
        }else {
          $errorMsg = 'Could not Find Any Record';
        }
    }
    else{
        //   echo "tag yes";
        if( !empty($_SESSION)){
      
                $tag = $_GET['tag'];
                $userid = $_SESSION['id'];
                $productid = $_GET['id'];
                if($tag == 'save'){
                $sql3 = "SELECT * FROM `savelist` WHERE product_id=$productid AND user_id=$userid";
                $result3 = mysqli_query($conn, $sql3);
               
                if(mysqli_num_rows($result3) == 0){
                       
                
                    $sql4 = "INSERT INTO `savelist`(`user_id`, `product_id`) VALUES ('".$userid."','".$productid."')";
                    $result4 = mysqli_query($conn, $sql4);
                    if ($result4) {
                    }
                 }

                 $sql = "select * from model_products where id=".$id;
                 $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                   $row = mysqli_fetch_assoc($result);
                   $id1 = $row["model_id"];
                   $sql1 = "SELECT 
                   model_products.product_name,model_products.cost,model_products.product_name,model_products.image,model_products.description, model_products.status,model_products.id,models.categoryname
               FROM 
                   model_products
               INNER JOIN 
                   models
               ON
                   model_products.model_id= models.id WHERE model_products.model_id='" . $id1 . "' AND model_products.id !='".$id."' ";;
                   $result1 = mysqli_query($conn, $sql1);
                }
              
         
        }}
            else{
                echo '<script>alert("Please Login To Add the Models To SaveLists")</script>';
                $sql = "select * from model_products where id=".$id;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $id1 = $row["model_id"];
                  $sql1 = "SELECT 
                  model_products.product_name,model_products.cost,model_products.product_name,model_products.image,model_products.description, model_products.status,model_products.id,models.categoryname
              FROM 
                  model_products
              INNER JOIN 
                  models
              ON
                  model_products.model_id= models.id WHERE model_products.model_id='" . $id1 . "' AND model_products.id !='".$id."' ";;
                  $result1 = mysqli_query($conn, $sql1);
            }
    }
 
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
                                <?php echo $row['product_name']; ?>
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
                                            <button class="btn btn-outline-dark" type="button"><i class="fas fa-save me-2"></i> <a href="product.php?id=<?php echo $row['id'] ?>&tag=save">Add to Save</a></button>
                                        </div>
                                        <!-- <div class="col-12 mt-3">
                                            <button class="btn btn-outline-secondary btn-sm" type="button"><i class="fas fa-heart me-2"></i>Add to wishlist</button>
                                        </div> -->
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
                                                    <a href="product.php?id=<?php echo $row1['id'] ?>">
                                                        <img src="<?php echo $upload_dir.$row1['image'] ?>" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="product.php?id=<?php echo $row1['id'] ?>" class="product-name"><?php echo $row1['product_name'] ?></a>
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