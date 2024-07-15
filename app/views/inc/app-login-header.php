<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Font-ROBOTO -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap">
    <!-- Google Font-ROBOTO_SLAB -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap">
    <!-- Google Font-Red MONTSERRAT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;1,100&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/mdb.min.css">
    <!-- NCE App Stylesheet -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/main.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo URLROOT; ?>/public/img/favicon.ico">
    <script type="text/javascript">
        window.onload = function() {
            pageLoaded(this);
        }
    </script>

    <title><?php echo SITENAME; ?></title>

</head>

<body>
    <!-- <body onload="pageLoaded(this);"> -->
    <?php
    if (DEBUG) {
        //echo "full path: " . dirname(__FILE__);
        echo "<br>URLROOT: " . URLROOT;
        echo "<br>APPROOT: " . APPROOT;
        echo "<br>SESSION: ";
        print_r($_SESSION);
    }
    ?>

    <?php
    require APPROOT . '/views/inc/app-login-navbar.php';
    ?>
    <div id="msg-flash" name="msg-flash" class="visually-hidden">0</div>

    <!-- THE MODAL WINDOW -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div id="banner_header_bg" class="">
                <!-- <span class="ms-0 close">&times;</span> -->
                <span id="banner_header_copy" class="m-auto display-6"></span>
            </div>
            <div class="modal-body m-auto">
                <div id="modal-message" class="my-5">
                    Alert Message Error
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" id="modal-yes-button" class="btn btn-primary px-5" value="yyy">
                <span class="mx-3"></span>
                <input type="button" id="modal-no-button" class="btn btn-dark px-5" value="nnn">
            </div>
        </div>
    </div>
    <!-- END OF  MODAL WINDOW -->
    <div id="page_container" class="container">