<?php
$_SESSION['tradeInProcess'] = false;
$_SESSION['showSessionResetButton'] = false;
?>
<?php require APPROOT . '/views/inc/header.php'; ?>



<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col p-5 text-center bg-secondary bg-opacity-25">
            <h1 class="mb-3 display-2"><?php echo $data['title']; ?></h1>
            <h4 class="mb-3 display-6 text-muted"><?php echo $data['description']; ?></h4>
        </div>
        <div class="row m-4">
            <!-- *********** LEFT COLUMN *********** -->
            <div class="col-4">
                <div class="row">
                    <div class="col-10 my-3 p-0 ps-5">
                        <?php makeUIButton("Find Trade Item", "btn-primary", "/trades/start", "", ""); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 my-3 p-0 ps-5">
                        <?php makeUIButton("Find Trade Sheet", "btn-primary", "/trades/start", "", ""); ?>
                    </div>
                </div>
                <div class="col-10 my-4"></div>
                <div class="row">
                    <div class="col-10 my-3 p-0 ps-5">
                        <?php makeUIButton("Manage Customer List", "btn-success", "/trades/start", "", ""); ?>
                    </div>
                </div>
                <div class="col-10 my-4"></div>
                <div class="row">
                    <div class="col-10 my-3 p-0 ps-5">
                        <?php makeUIButton("Manage Employee List", "btn-warning", "/trades/start", "", ""); ?>
                    </div>
                </div>

            </div>
            <!-- *********** MIDDLE COLUMN *********** -->
            <div class="col-4">

                <div class="row">
                    <div class="col my-3 p-0 ps-5 ms-5">
                        <?php makeUIButton("Find LUT Item", "btn-primary", "/trades/start", "", ""); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col my-3 p-0 ps-5 ms-5">
                        <?php makeUIButton("New LUT Item", "btn-primary", "/trades/start", "", ""); ?>
                    </div>
                </div>
                <div class="row border border-primary">
                    <div class="col-10 my-1 p-0">
                        <form action="<?php echo URLROOT; ?>/trades/lut_item_edit" method="post">
                            <div class="input-group my-3 p-0 ps-3">
                                <label for="lut_item_id" class="form-label mx-3">Item ID</label>
                                <input type="text" id="lut_item_id" name="lut_item_id" class="form-control" maxlength="11" value="" />
                            </div>
                            <div class="col  ps-5 ms-5">
                                <?php makeUIButton("EDIT LUT Item", "btn-primary", "", "editTradeLutItemBtn", ""); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- *********** RIGHT COLUMN *********** -->
            <div class="col-4">
                <div class="row">
                    <div class="col ms-5">
                        <h4>Edit Session Data</h4>
                        <form action="<?php echo URLROOT; ?>/pages/update_session_data" method="POST">
                            <label for="session_location" class="form-label">Location</label>
                            <input type="text" id="session_location" name="session_location" class="form-control" value="<?php echo $_SESSION['location'] ?>" onclick="selectText(this.id)" />
                            <label for="session_date" class="form-label">Date</label>
                            <input type="date" id="session_date" name="session_date" class="form-control" value="<?php echo $_SESSION['date'] ?>" />
                            <div class="my-4 d-flex justify-content-end">
                                <input type="submit" class="btn btn-primary" value="Update Session Data">
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>






<?php require APPROOT . '/views/inc/footer.php'; ?>