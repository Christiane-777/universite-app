<?php
$BASE_PATH = 'http://localhost/universite-app';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Code conquest Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= $BASE_PATH ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= $BASE_PATH ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= $BASE_PATH ?>/assets/css/stylea.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email Us</h6>
                        <span>codeconquest@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-primary border-inner py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <a href="index.html" class="navbar-brand">
                        <h2 class="m-0 text-uppercase text-white"><img class="fa fa-birthday-cake fs-1 text-dark me-3" src="<?= $BASE_PATH ?>/assets/img/icon.png" width="50PX" height="70PX"></i>Code Conquest university</h2>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>+237 691 95 49 14</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>Code Conquest</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="<?= $BASE_PATH ?>/views/public/accueil.php" class="nav-item nav-link active">Home</a>
                <a href="<?= $BASE_PATH ?>/views/public/about.php" class="nav-item nav-link">About Us</a>
                <a href="<?= $BASE_PATH ?>/views/public/menu.php" class="nav-item nav-link">Our programs</a>
                <a href="<?= $BASE_PATH ?>/views/public/service.php" class="nav-item nav-link">Events</a>
                <a href="<?= $BASE_PATH ?>/views/public/team.php" class="nav-item nav-link">Team Members</a>
                
                <a href="<?= $BASE_PATH ?>/views/public/testimonial.php" class="nav-item nav-link">Student's Voice</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Student's Portal</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= $BASE_PATH ?>/views/public/login.php" class="dropdown-item">Login</a>
                        <a href="<?= $BASE_PATH ?>/views/public/register.php" class="dropdown-item">Register</a>
                    </div>
                </div>
                <a href="<?= $BASE_PATH ?>/views/public/contact.php" class="nav-item nav-link">Contact Us</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

