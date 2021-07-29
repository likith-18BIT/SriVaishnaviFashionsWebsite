<?php include "header.php" ?>
<?php include "db_connect.php" ?>

            <div class="col-12">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Register</h2>
                     
                    </div>
                    <?php if(isset($_GET['error'])){?>
             <p class="error" style="color:red"><?php echo $_GET['error']; ?> </p>
                      <?php  }  ?> 
                </div>
             

                <main class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                        <div class="row">
                            <div class="col-12">
                          
                                <form method="post"  action="registercheck.php">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"  required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required >
                                    </div>
                                    <div class="mb-3">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input type="password" name="conformpassword" id="password-confirm" class="form-control" required >
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" id="agree" name="terms" class="form-check-input" required >
                                            <label for="agree" class="form-check-label ml-2">I agree to Terms and Conditions</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-outline-dark">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>
<?php include "footer.php" ?>
     