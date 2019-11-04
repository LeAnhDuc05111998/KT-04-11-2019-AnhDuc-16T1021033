<?php

session_start();

$ignore = false;

if(isset($_SESSION['user'])){
  // header('Location: index.php');
}else{
  header('Location: login.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiemtra";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if($_SERVER["REQUEST_METHOD"] == "POST"){



  // add
  if(isset($_POST['submit-add'])){

    // echo "insert";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // echo "INSERT INTO infos (namee, phone, email) VALUES ('".$name."', '".$phone."', '".$email."')";

    $sql = "INSERT INTO infos (namee, phone, email) VALUES ('".$name."', '".$phone."', '".$email."')";


    $conn->query($sql);

  }

  // delete
  if(isset($_POST['submit-delete'])){


    // $name = $_POST['name'];
    // $phone = $_POST['phone'];
    // $email = $_POST['email'];


    $sql = "DELETE FROM infos WHERE id=".$_POST['id'];

    $conn->query($sql);

  }

  // edit
  if(isset($_POST['submit-edit'])){

    // echo "edit";

    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // echo "INSERT INTO infos (namee, phone, email) VALUES ('".$name."', '".$phone."', '".$email."')";

    $sql = "UPDATE infos SET namee='".$name."' WHERE id=".$id;
    $conn->query($sql);

    $sql = "UPDATE infos SET phone='".$phone."' WHERE id=".$id;
    $conn->query($sql);

    $sql = "UPDATE infos SET email='".$email."' WHERE id=".$id;
    $conn->query($sql);



  }

}

if($_SERVER["REQUEST_METHOD"] == "GET"){

  // tim kiem
  if(isset($_GET['q'])){

    $q = $_GET['q'];

    $sql = "SELECT * FROM infos WHERE namee LIKE '". $q ."%' ORDER BY namee";
    $result = $conn->query($sql);

    $ignore = true;

  }

}

if(isset($ignore)){
  if($ignore == true){

  }else{
    $sql = "SELECT * FROM infos ORDER BY namee";
    $result = $conn->query($sql);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>