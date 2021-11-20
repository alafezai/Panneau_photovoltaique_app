
<?php
// first thing is to start session 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Login_v1/assets/img/logo_CRTEN.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/mainn.css">
<!--===============================================================================================-->
<style>
	#attention{
  width: 25px;
}
#btnd{
  border-radius: 25px;
  background-image: linear-gradient(310deg, #141727 0%, #3A416F 100%);
}
</style>
</head>
<body>
	<?php
  include("connect.php"); 
  if($_POST){
	
	 $email = $_POST["email"];
	 $pass = $_POST["pass"];
	 $stmt = $conn->prepare ("SELECT * FROM users WHERE email = '$email' ");
	 $stmt -> execute();
	 $result = $stmt->fetch(PDO::FETCH_ASSOC);
	//  $erreur []= "";
	//  var_dump($result);
	 if($stmt->rowCount() >0){
		//  var_dump($result['email']);
	 if($result["email"] == $_POST["email"] && $result["activate"] == 1){

	 if($result["password"] == $pass ){
	$_SESSION["user"] = $result["username"];
	$_SESSION["id"] = $result["id"];
	 header("Location:pages/tables.php");
	 }else{
		 $erreur[] = "Vérifer Votre Password !!!";	
	 }	
	 }else{
	 $erreur[] = "Vérifer Votre email !!!";
	 }
	}else{
		$erreur[]="Informations Incorrect !!!";
	}
  }

	
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="logo_CRTEN.jpg" alt="IMG">
				</div>

				<form method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Centre De Recherches Et Des Technologies De L'énergie
					</span>

					<?php 
               if(isset($erreur)){
				   foreach($erreur as $er){
					?>
               <div class="alert alert-danger" role="alert" >
	                 <img src="images/ATT.PNG" id="attention" alt="">
					 <?php echo $er; ?>
						</div>
						<?php 
						}
                        }
					?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn" >
						<button type="submit" class="login100-form-btn" id="btnd">
						Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="pages/activer.php">
							Activate your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>