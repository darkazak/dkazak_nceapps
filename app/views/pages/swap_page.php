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
            //        document.getElementById('automatic_form').submit();
            // pageLoaded(this);
        }
    </script>
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php

    // print_r($_SESSION);

    // print_r($_POST);
    echo "<br>";
    echo "<br>";
    echo "DATA: " . $data['target_page'];
    echo "<br>";
    echo "<br>";

    ?>

    <form id="automatic_form" action="<?php echo URLROOT . "/" . $data['target_page']; ?>" target="_self">
        <input type="submit" class="btn btn-primary" value="Continue">
    </form>


    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/popper.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/mdb.min.js"></script>
    <!-- App Settings JavaScript -->
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/settp3WVLqLXpqTrAPc48DSzaR5sA7O4ZIu3AyTj.js"></script>
    <!-- App Custom JavaScript -->
    <script type=" text/javascript" src="<?php echo URLROOT; ?>/js/main.js"></script>
</body>

</html>