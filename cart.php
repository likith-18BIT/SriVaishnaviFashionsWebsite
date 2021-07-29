<?php include("header.php"); 
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "select * from cart where id = ".$id;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        // $image = $row['image'];
        // unlink($upload_dir.$image);
        $sql = "delete from cart where id=".$id;
        if(mysqli_query($conn, $sql)){
        //	header('location:models.php');
        }
    }
}

?>

            <div class="col-12">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>

                <main class="row">
                    <div class="col-12 bg-white py-3 mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto table-responsive">
                                <form class="row">
                                    <div class="col-12">
                                        <table class="table table-striped table-hover table-sm">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
if(!empty($_SESSION)){ 
    $user_id = $_SESSION['id'];
    $sql = "SELECT s.id,s.user_id,s.product_id,m.productname,s.quantity,m.cost,m.description,m.image,m.image4,m.image2,m.image3,m.image5 FROM cart s
    LEFT JOIN sale_products m
    ON m.id=s.product_id
    LEFT JOIN users u
    ON u.id = s.user_id WHERE u.id= $user_id";
    $result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-fluid">
                                                    <?php echo $row['productname'] ?>
                                                </td>
                                                <td>
                                                    ₹ <?php echo $row['cost'] ?>
                                                </td>
                                                <td>
                                                <?php echo $row['quantity']; ?>
                                                    <!-- <input type="number" min="1" value=" <?php echo $row['quantity']; ?>"> -->
                                                </td>
                                                <td>
                                                    ₹ <?php echo $row['cost'] ?>
                                                </td>
                                                <td>
                                                    <!-- <button class="btn btn-link text-danger"><i class="fas fa-times"></i></button> -->
                                                    <a href="cart.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php } } }?>  
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="col-12 text-right">
                                        <!-- <button class="btn btn-outline-secondary me-3" type="submit">Update</button> -->
                                        <a href="#" class="btn btn-outline-success">Place Order</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>

     <?php include("footer.php"); ?>