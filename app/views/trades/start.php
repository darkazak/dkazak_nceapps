<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="container">
    <!-- <div class="row mb-5">
        <div class="col-12">
            <p class="h1">Trade Worksheet</p>
        </div>
    </div> -->
    <?php makePageTitle("Trade Worksheet"); ?>

    <div class="row">
        <div class="col-2 d-flex justify-content-center align-items-center">
            <form action="<?php echo URLROOT; ?>/trades/lut_item_find" method="post" target="_self">
                <input type="submit" class="btn btn-primary" value="Start New Trade">
            </form>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
            <form action="<?php echo URLROOT; ?>/trades/quick" method="post" target="_self">
                <input type="submit" class="btn btn-primary" value="Quick Trade">
            </form>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
            <?php //makeUIButton("View a Trade", "btn-primary", "/trades/view"); 
            ?>
            <?php makeUIButton("View a Trade", "btn-primary", '', "notYetAlert", "tabIndex=-0", "view_trade_btn"); ?>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
            <?php //makeUIButton("Edit a Trade", "btn-primary", "/trades/edit"); 
            ?>
            <?php makeUIButton("Edit a Trade", "btn-primary", '', "notYetAlert", "tabIndex=-0", "view_trade_btn"); ?>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
            <?php //makeUIButton("Add New LUT Item", "btn-primary disabled", "/stock/add_new", '', "tabIndex=-1"); 
            ?>
            <?php makeUIButton("Add New LUT Item", "btn-primary disabled", '', "notYetAlert", "tabIndex=-1", "view_trade_btn"); ?>
        </div>

    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>