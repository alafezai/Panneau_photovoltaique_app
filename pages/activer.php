<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../Login_v1/assets/img/logo_CRTEN.jpg"/>
  <title>
   Activate your account
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <style>
    #top{
      margin-top: 300px;
    }
    #bac{
      background:#dadce0;
      height: 1000px;
    }
    .alert-danger {
    background-image: initial;
    margin-right: 31px;
margin-left: 37px;
padding: 10px;
}

  </style>
</head>

<body class="g-sidenav-show  bg-gray-100" >
  <!-- Navbar -->
  <?php
  include("connect.php"); 
  if($_POST){
	
	 $name = $_POST["name"];
	 $email = $_POST["email"];
	 $pass = $_POST["password"];
	 $stmt = $conn->prepare ("SELECT * FROM users WHERE email = '$email' And password = '$pass' AND username ='$name' ");
	 $stmt -> execute();
	 $result = $stmt->fetch(PDO::FETCH_ASSOC);
	//  $erreur []= "";
	//  var_dump($result);
	 if($stmt->rowCount() >0){
    //  $lastname =$resultat['lastname'];
    //  $phone = $resultat['']; 
    $id = $result['id'];
    // var_dump($id);
    $stmt2 = $conn->prepare("UPDATE users SET activate = 1 WHERE id = $id");
    $stmt2 -> execute();
    $mes ="Your acount is activate successfully";
	}else{
		$erreur[]="Informations Incorrect !!!";
	}
  }

	
	?>
 
  <!-- End Navbar -->
 <div id="bac">
  <section class="min-vh-100 mb-8">
  
    <div class="container">
      <div class="row mt-lg-n10 md-n11 ">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto" id="top">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Activate your account</h5>
            
            </div>
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
            <div class="row px-xl-5 px-sm-4 px-3">
            </div>
            <div class="card-body">
              <form role="form text-left" method="POST">
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" aria-describedby="password-addon">
                </div>
                <div class="form-check form-check-info text-left">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" >Activate</button>
                </div>
                <p class="text-sm mt-3 mb-0">account is activate? <a href="../index.php" class="text-dark font-weight-bolder">Log in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!-- <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by Creative Tim.
          </p>
        </div>
      </div>
    </div>
  </footer> -->
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <?php 
       if(isset($mes)){
           
           ?>
            <script>
Swal.fire(
        '<?php
echo $mes;

  ?>',
'',
        'success'
        ) 
        </script>
           <?php
  
                }
  ?>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>