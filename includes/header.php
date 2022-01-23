<?php
	require_once 'config/config.php';
  session_start();
  if(isset($_SESSION['status']))	{
      echo "<div class='text-light text-center' style='background-color: #572100;'>"."Welcome ". $_SESSION['email']."</div>";
    }
    else {	
      echo '';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo FULL_NAME ?></title>
  <link href="<?php echo MULTIPATH ?>css/style.css" rel="stylesheet">
  <link rel="icon" href="<?php echo MULTIPATH ?>imgs/icon/books.png">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body data-spy="scroll" data-target=".nav" data-offset="80">
    <header class="bg-dark text-white mb-0">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <a href="" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-light text-decoration-none">
            <h2>ECBS</h2>
          </a>
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
          <ul class="nav col-12 col-md-auto mb-0 justify-content-center mb-md-0">
            <li><a href="<?php echo SITEURL ?>index.php" class="nav-link px-2 link-light">Home</a></li>
            <li><a href="catalog.php" class="nav-link px-2 link-light">Book List</a></li>
            <li><a href="about.php" class="nav-link px-2 link-light">About Us</a></li>
            <?php 
              if(isset($_SESSION['status'])){
                echo '<li><a href="cart.php" class="nav-link px-2 link-light">View Cart</a></li>';
              }
              ?>
            <li><a href="faq.php" class="nav-link px-2 link-light">FAQs</a></li>
          </ul>

          <div class="col-md-3 text-end">
          <?php 
					if(isset($_SESSION['status'])){
						
						echo '<button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#signIn">
            <a href="logout.php">Logout</a>
            </button>';
					}
					else {
						echo '
            <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#signIn">Login</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUp">Sign-up</button>
              ';
					}
			    ?>
            
          </div>
        </div>
      </div>
    </header>