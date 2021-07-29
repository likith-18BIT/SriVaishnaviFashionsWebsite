<?php
session_start(); 
include "db_connect.php";
// if( isset($_POST['email']) && isset($_POST['password']) ){
    $email = $_POST['email'];
     $pass = $_POST['password'];

    // if(empty($email)){
    //     header("Location:register.php?error=email is required");
    //     exit();
    //  }
    //  else if(empty($pass)){
    //     header("Location:register.php?error=password is required");
    //     exit();
    //  }else{
         $sql = "SELECT  * FROM users WHERE Email='$email' AND password='$pass'";
         $result = mysqli_query($conn,$sql);
         if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $row['Name'];
            $_SESSION['id'] = $row['id'];
            // echo $_SESSION['name'];
             header("Location:index.php");
             exit();
         }else{
             header("Location:login.php?error=incorrect user email or password");
             exit();
         }
    // }

 