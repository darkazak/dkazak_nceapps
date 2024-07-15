<!DOCTYPE html>
<html lang="en">
<!-- PAGE LOAD FLASH MESSAGE -->
<?php
$show_flash = false;
if (isset($_SESSION['flash_message'])) {
    $show_flash = true;
    $flash_msg = $_SESSION['flash_message']['msg'];
    $flash_type = $_SESSION['flash_message']['type'];
    switch ($flash_type) {
        case 'error':
            $flash_style = 'alert-danger';
            break;
        case 'info':
            $flash_style = 'alert-success';
            break;
        default:
            $flash_style = 'alert-primary';
    }
    unset($_SESSION['flash_message']);
    echo "<br>";
    echo "<br>";
    echo "FLASH STYLE: " . $flash_style;
    echo "<br>";
    echo "FLASH MESSAGE: " . $flash_msg;
    echo "<br>";
    echo "<br>";
}
?>
<!-- END PAGE LOAD FLASH MESSAGE -->

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
    <!-- App Settings JavaScript -->
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/settp3WVLqLXpqTrAPc48DSzaR5sA7O4ZIu3AyTj.js"></script>
    <!-- App Custom JavaScript -->
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/main.js"></script>

    <script type="text/javascript">
        window.onload = function() {
            pageLoaded(this);
            //fire flash on load
            <?php if ($show_flash) : ?>
                showFlashMessage("<?php echo $flash_msg; ?>", style = "<?php echo $flash_style; ?>", pause = 3500);
            <?php endif; ?>
            //fire alert modal on load
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
    require APPROOT . '/views/inc/navbar.php';
    ?>

    <!-- FLASH MESSAGE -->
    <div id="flash-holder" class="flash-box container">
        <div id="msg-flash" name="msg-flash" class="alert flash-message visually-hidden">
        </div>
    </div>
    <!-- END OF FLASH MESSAGE -->



    <!-- THE MODAL WINDOW -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div id="banner_header_bg" class="modal-header">
                <!-- <span class="ms-0 close">&times;</span> -->
                <span id="banner_header_copy" class="m-auto display-6"></span>
            </div>
            <div class="modal-body m-auto">
                <div id="modal-message" class="my-5">
                    Alert Message Error
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" id="modal-yes-button" class="btn btn-primary" value="yyy">
                <input type="button" id="modal-no-button" class="btn btn-dark" value="nnn">
            </div>
        </div>
    </div>
    <!-- END OF  MODAL WINDOW -->

    <div id="page_container" class="container">