<?php include("header.php") ; ?>

        <div class="col-12">
            <!-- Main Content -->
            <main class="row">

                <!-- Category Products -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 py-3">
                            <div class="row">
                                <div class="col-12 text-center text-uppercase">
                                    <h2>Maggam Works</h2>
                                </div>
                            </div>
                            <div class="row">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                            $sql = "SELECT 
                            model_products.product_name,model_products.cost,model_products.product_name,model_products.image,model_products.description, model_products.status,model_products.id,models.categoryname
                        FROM 
                            model_products
                        INNER JOIN 
                            models
                        ON
                            model_products.model_id= models.id WHERE model_products.model_id='" . $id . "'";;
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                                <!-- Product -->
                                <div class="col-xl-2 col-lg-3 col-sm-6 my-3">
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
                                                    <span class="product-price-old">
                                                        ₹<?php echo $row['cost'] ?>
                                                    </span>
                                                <br>
                                                <span class="product-price">
                                                        ₹<?php echo $row['cost'] ?>
                                                    </span>
                                            </div>
                                            <!-- <div class="col-12 mb-3 align-self-end">
                                               <button class="btn btn-outline-dark" type="button"><i class="fas fa-save me-2"></i>Save</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Product -->


                               
                                <?php
                              }
                            }
                        }
                          ?>

                      

                        

                             

                             
                              
                               

                          

                           

                             

                               


                        

                           

                        


                           

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Category Products -->

                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-long-arrow-alt-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </main>
            <!-- Main Content -->
        </div>

<?php include("footer.php"); ?>