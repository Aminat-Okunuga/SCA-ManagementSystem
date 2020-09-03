<?php
include_once '../autoload.php';
include_once './process_login.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SCA Management System | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <?php include_once 'components/header.php';?>
    <div class="container">
        <div class="pt-5" style="padding:20px; margin:250px; margin-top: 0px; margin-bottom: 0px;">
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Login</h3>
                <form action="login.php" method="POST" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="username">Username *</label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Password *</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <input type="submit" value="Login" name="login" class="btn btn-primary btn-md text-white" style="margin-left:300px;">
                    </div>
                </form>
            </div>
        </div>
    </div>

 <?php include_once 'components/footer.php';?>