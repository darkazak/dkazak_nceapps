<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="container">
    <!-- <div class="row mb-5">
        <div class="col-12">
            <p class="h1">Trade Worksheet</p>
        </div>
    </div> -->
    <?php makePageTitle("Trade Administration Page"); ?>

    <div class="row">
        <div class="col-3 d-flex justify-content-center align-items-center">
            <?php makeUIButton("Start New Trade", "btn-primary", "/trades/lut_item_find", '', "autofocus"); ?>
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center">
            <?php makeUIButton("View a Trade", "btn-primary", "/trades/view"); ?>
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center">
            <?php makeUIButton("Edit a Trade", "btn-primary", "/trades/edit"); ?>
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center">
            <?php makeUIButton("Add New LUT Item", "btn-primary disabled", "/stock/add_new", '', "tabIndex=-1"); ?>
        </div>

    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>