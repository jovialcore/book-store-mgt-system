<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<section class="section login py-5" data-bg="login">
<div class="container">
    <div class="row py-5 text-light">
      <div class="col-md-4 offset-md-4 border pt-2 border-primary" style="background: #28282D; box-shadow: 0px 0px 20px #000;">
        <h3 class="px-4 text-center py-3">ECBS</h3>
        <form class="px-4" id="adminLoginForm" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" name="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password" name="password" aria-describedby="emailHelp" require>
          </div>
          <div class="text-center py-3">
            <button type="submit" class="btn btn-primary w-50">Login</button>
          </div>
          <div class="text-center py-3">
            <span class="sign__text"><a href="../index.php">Back to Home?</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
	</section>
	<!-- end page title -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="../server/js/request.js"></script>
</body>
</html>