<?php 
session_start(); 
include "../login/db_conn.php";
include "../lib.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['re_password'])) {

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);

	$user_data = 'loginname='. $uname;


	if (empty($uname)) {
		header("Location: reg.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: reg.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: reg.php?error=Repeat Password is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: reg.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
			$uid = guidv4();
			$sql2 = "INSERT INTO users(uid, user_name, password) VALUES('$uid', '$uname', '$pass')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: ../index.php?success=Your account has been created successfully");
				exit();
			}else {
				header("Location: reg.php?error=unknown error occurred&$user_data");
				exit();
			}
		}
	}
	
}else{
	header("Location: reg.php");
	exit();
}