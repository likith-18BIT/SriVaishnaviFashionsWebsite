<?php 
session_start(); 
include "db_connect.php";

// if (isset($_POST['name']) && isset($_POST['email'])
//     && isset($_POST['password']) && isset($_POST['conformpassword']) && isset($_POST['terms']) ) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
  $pass = validate($_POST['password']);
  $re_pass = validate($_POST['conformpassword']);
  $name = validate($_POST['name']);
  $email = validate($_POST['email']);
  $terms = validate($_POST['terms']);
  $user_data = 'name='. $name.'&email='.$email.'&password='.$pass.'&conformpassword='.$re_pass.'&terms='.$terms;
  
//   if (empty($name)) {
//     header("Location:register.php?error=First Name is required&$user_data");
//     exit();
// }

//     else if(empty($email)){
//         header("Location: register.php?error=Email is required&$user_data");
// 	    exit();
// 	}
   
 
//     else if(empty($pass)){
//         header("Location: register.php?error=Password is required&$user_data");
// 	    exit();
// 	}
//     else if(strlen($pass) < 8){
//         header("Location: register.php?error=Password Should Contain Minimum 8 Characters&$user_data");
// 	    exit();
// 	}
// 	else if(empty($re_pass)){
//         header("Location: register.php?error=Re Password is required&$user_data");
// 	    exit();
// 	}

	

	if($pass !== $re_pass){
        header("Location: register.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

  
//     else if(empty($terms) ){
//         header("Location: register.php?error=Level is required&$user_data");
// 	    exit();
// 	}
   

	else{

		// hashing the password
        //$pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE Email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=The Email is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO `users`( `status`, `Name`, `Email`, `password`) VALUES ('active','$name','$email','$pass')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: register.php?success=Your account has been created successfully");
             header("Location:login.php");
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
// }
// else{
// 	header("Location: register.php?error=kjjg");
// 	exit();
// }
?>
