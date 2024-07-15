<?php require APPROOT . '/views/inc/header.php'; ?>

<h1><?php echo $data['headline']; ?></h1>
<p class="lead"><?php echo $data['description']; ?></p>
<p>version: <strong><?php echo APPVERSION; ?></strong></p>

<!-- go back to last page -->
<?php makeUIButton("Return", "btn-primary", "", "returnToLastPage", "autofocus"); ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>