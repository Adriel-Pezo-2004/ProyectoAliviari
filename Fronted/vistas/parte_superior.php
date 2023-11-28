<?php
include("../BD/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clínica Aliviari- Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos_homee.css">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-0">
          <img src="./img/imagencli.png" alt="Mi imagen" style="height: 140px">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="pacientes.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Pacientes</span></a>
      </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="triaje.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Registro De Triaje</span></a>
      </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="sangre.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Registro de Laboratorio de Sangre</span></a>
      </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item active">
        <a class="nav-link" href="../index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Cerrar sesion</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->


            <!-- Nav Item - Alerts -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user']; ?></span>
                <img class="img-profile rounded-circle" src="img/user.png">
              </a>
              <!-- Dropdown - User Information -->
    
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->