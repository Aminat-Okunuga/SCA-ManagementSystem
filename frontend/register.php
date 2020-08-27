<?php
include_once '../autoload.php';
include_once './process.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SCA Management System</title>
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
                <h3 class="mb-5">Register</h3>
                <form action="register.php" method="POST" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="username">Username *</label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="fname">First Name *</label>
                                    <input type="text" name="fname" class="form-control" id="fname">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Last Name *</label>
                                <input type="text" name="lname" class="form-control" id="lname">
                            </div>
                        </div>
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role">Role *</label>
                                <select name="type" name="role" id="type" class="form-control">
                                    <option value="">Select Role</option>    
                                    <option value="mentor">Mentor</option>
                                    <option value="mentee">Mentee</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="bio">Bio *</label>
                                    <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="picture">Picture *</label>
                                   <input type="file" name="picture" class="form-control" id="picture">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <input type="submit" value="Register" name="register" class="btn btn-primary btn-md text-white" style="margin-left:300px;">
                    </div>
                </form>
            </div>
        </div>
    </div>

 <?php include_once 'components/footer.php';?>