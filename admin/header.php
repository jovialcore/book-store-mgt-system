<?php
    session_start();
    if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
      header("location:login.php");
      die("Sorry Your Session Has Expired, Please Visit The Login Page To Continue...");
    }
    echo "<div class='text-light text-center'>"."Welcome Back ". $_SESSION['email']."</div>";
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BOOK STORE MANAGEMENT SYSTEM ADMIN DASHBOARD</title>
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Admin Dashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="register">
          <a class="nav-link" href="register.php">
            <i class="fa fa-fw fa-pencil"></i>
            <span class="nav-link-text">Add Books</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="view">
          <a class="nav-link" href="view.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">View Books</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="edit">
          <a class="nav-link" href="students.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">View Students</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="delete">
          <a class="nav-link" href="purchase.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Purchase Record</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="delete">
          <a class="nav-link" href="add-admini.php">
            <i class="fa fa-fw fa-pencil"></i>
            <span class="nav-link-text">Add Admin</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="delete">
          <a class="nav-link" href="viewstaff.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">View Admin</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Logout">
          <a class="nav-link" href="logout.php">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Logout</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>