<?php session_start();?>
<?php

 define("include",true); 
 if(isset($_SESSION['kullanici'] , $_SESSION['parola']))
 { 
    echo '<script language="javascript">location.href="anasayfa.php";</script>';
 }
include("assets/config.php"); ?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/material-kit.css" rel="stylesheet" />
    <link href="assets/css/arayuz.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/pictures/favicon.ico" />
    <title>NaviSIT</title>
</head>
<style>
    body{
        background-color: #00bcd4;

    }
</style>
<body id="loginbg">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                   <div class="col-md-6 mx-auto text-center">
                    <span  style="
                    
                    text-shadow: 10px 8px 6px #272727;font-size: 91px; color: rgb(255, 255, 255);  border-radius: 17%; text-align: center;">NaviSIT</span> 
                       
                        <div class="card rounded mt-5">
                            <div class="card-header card-header-info rounded">
                                <h3 class="mb-0">Panel Giriş</h3>
                            </div>
                            <div class="card-body">
                           <?php 
                           //Giriş işlemleri modülü
                           include("assets/pages/giris.php");
                           ?>
                                <form class="form" role="form" autocomplete="off" id="formLogin" method="POST">
                                    <div class="form-group">
                                        <label for="kullanici"><i class="fas fa-user mr-3"> </i>Kullanıcı Adı</label>
                                        <input type="text" class="form-control form-control-lg rounded" name="kullanici"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="parola"><i class="fas fa-key mr-3"></i>Parola</label>
                                        <input type="password" class="form-control form-control-lg rounded" name="parola"  required>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-lg float-right" id="btnLogin" name="login" >Giriş</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/all.js" type="text/javascript"></script>
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="assets/js/material-kit.js" type="text/javascript"></script>
</body>
</html>