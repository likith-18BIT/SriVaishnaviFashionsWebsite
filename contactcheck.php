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
  
  $name = validate($_POST['name']);
  $email = validate($_POST['email']);
$subject = validate($_POST['subject']);
$message = validate($_POST['message']);
  //$user_data = 'name='. $name.'&email='.$email.'&password='.$pass.'&conformpassword='.$re_pass.'&terms='.$terms;
  
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

	

	// if($pass !== $re_pass){
    //     header("Location: register.php?error=The confirmation password  does not match&$user_data");
	//     exit();
	// }

  
//     else if(empty($terms) ){
//         header("Location: register.php?error=Level is required&$user_data");
// 	    exit();
// 	}
   

	// else{

		// hashing the password
        //$pass = md5($pass);

	    // $sql = "SELECT * FROM users WHERE Email='$email' ";
		// $result = mysqli_query($conn, $sql);

		// if (mysqli_num_rows($result) > 0) {
		// 	header("Location: register.php?error=The Email is taken try another&$user_data");
	    //     exit();
		// }else {
           $sql2 = "INSERT INTO `contactus`( `status`, `name`, `Email`, `subject`, `yourmessage`) VALUES ('active','$name','$email','$subject','$message')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
        
            // header("Location:index.php");
           // alert("")
          // echo '<script>alert("Your account has been created successfully")</script>';
           header("Location: contact.php?success=Your account has been created successfully");
	        exit();
           }else {
              // echo "sfjhsdkjfhkdsjf"
	           	header("Location: contact.php?error=unknown error occurred");
		       exit();
           }
		//}
	// }
	
// }
// else{
// 	header("Location: register.php?error=kjjg");
// 	exit();
// }
?>
