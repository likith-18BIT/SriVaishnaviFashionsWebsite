<?php include "header.php"; ?>

            <div class="col-12">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Login</h2>
                   
                    </div>
                    <?php if(isset($_GET['error'])){?>
             <p class="error" style="color:red"><?php echo $_GET['error']; ?> </p>
                      <?php  }  ?> 
                </div>

                <main class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                        <div class="row">
                            <div class="col-12">
                          
                                <form method="post" action="logincheck.php">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                    <!-- <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" id="remember" class="form-check-input">
                                            <label for="remember" class="form-check-label ml-2">Remember Me</label>
                                        </div>
                                    </div> -->
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-dark">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>

           

    </div>

   <?php include "footer.php" ?>