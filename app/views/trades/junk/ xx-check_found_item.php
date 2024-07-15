<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="mb-3 h1">Trade Worksheet</h1>
<h4> for <?php echo $_SESSION['customer_name']; ?> -- <?php echo $_SESSION['customer_phone']; ?></h4>
<h2 class="mb-3 h1">Confirm Item</h2>
<hr>
<form>
    <h2>
        <?php echo $data['item_title']; ?>
    </h2>
    <p>
        <span>
            LU-ID: <em><?php echo $data['trade_lu_id']; ?></em>
        </span>&nbsp;&nbsp;
        <span>
            VSN: <em><?php echo $data['vsn']; ?></em>
        </span>&nbsp;&nbsp;
        <span>
            MINOR: <em><?php echo $data['minor']; ?></em>
        </span>&nbsp;&nbsp;
        <span>
            FAMILY: <em><?php echo $data['family']; ?></em>
        </span>&nbsp;&nbsp;

    </p>

    <div class="container">
        <div class="row">
            <div class="col-3">
                <fieldset>
                    <input type="hidden" id="factor_cosmetic_condition" name="factor_cosmetic_condition" value="<?php echo $data['factor_cosmetic_condition']; ?>">
                    <input type="hidden" id="factor_optical_condition" name="factor_optical_condition" value="<?php echo $data['factor_optical_condition']; ?>">
                    <input type="hidden" id="factor_mechanical_condition" name="factor_mechanical_condition" value="<?php echo $data['factor_mechanical_condition']; ?>">

                    <legend>Condition</legend>
                    <div class="form-floating">
                        <select id="cosmetic-condition-index" class="form-select mb-3" onchange="selectCondition()">
                            <option value="unset" selected>Cosmetic Condition</option>
                            <option value="<?php echo $data['condition_cosmetic_mint']; ?>">Mint</option>
                            <option value="<?php echo $data['condition_cosmetic_near_mint']; ?>">Near Mint</option>
                            <option value="<?php echo $data['condition_cosmetic_excellent']; ?>">Excellent</option>
                            <option value="<?php echo $data['condition_cosmetic_very_good']; ?>">Very Good</option>
                            <option value="<?php echo $data['condition_cosmetic_average']; ?>">Average</option>
                            <option value="<?php echo $data['condition_cosmetic_fair']; ?>">Fair</option>
                            <option value="<?php echo $data['condition_cosmetic_poor']; ?>">Poor</option>
                        </select>
                        <label for="cosmetic-condition-index">Select</label>
                    </div>

                    <?php if ($data['factor_optical_condition'] != 0) : ?>
                        <div class="form-floating">
                            <select id="optical-condition-index" class="form-select mb-3" onchange="selectCondition()">
                                <option value="unset" selected>Optical Condition</option>
                                <option value="<?php echo $data['condition_optical_mint']; ?>">Mint</option>
                                <option value="<?php echo $data['condition_optical_near_mint']; ?>">Near Mint</option>
                                <option value="<?php echo $data['condition_optical_excellent']; ?>">Excellent</option>
                                <option value="<?php echo $data['condition_optical_very_good']; ?>">Very Good</option>
                                <option value="<?php echo $data['condition_optical_average']; ?>">Average</option>
                                <option value="<?php echo $data['condition_optical_fair']; ?>">Fair</option>
                                <option value="<?php echo $data['condition_optical_poor']; ?>">Poor</option>
                            </select>
                            <label for="optical-condition-index">Select</label>
                        </div>
                    <?php else : ?>
                        <input type="hidden" id="optical-condition-index" name="optical-condition-index" value="null">
                    <?php endif; ?>

                    <?php if ($data['factor_mechanical_condition'] != 0) : ?>
                        <div class="form-floating">
                            <select id="mechanical-condition-index" class="form-select mb-3" onchange="selectCondition()">
                                <option value="unset" selected>Mechanical Condition</option>
                                <option value="<?php echo $data['condition_mechanical_operational']; ?>">Operational</option>
                                <option value="<?php echo $data['condition_mechanical_minor_defect']; ?>">Minor Defect</option>
                                <option value="<?php echo $data['condition_mechanical_major_defect']; ?>">Major Defect</option>
                                <option value="<?php echo $data['condition_mechanical_parts']; ?>">Parts Only</option>
                            </select>
                            <label for="mechanical-condition-index">Select</label>
                        </div>
                    <?php else : ?>
                        <input type="hidden" id="mechanical-condition-index" name="mechanical-condition-index" value="null">
                    <?php endif; ?>


                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checked_battery">
                                    <label class="form-check-label" for="checked_battery">
                                        Battery Compartment
                                    </label>
                                </div>
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checked_bendt">
                                    <label class="form-check-label" for="checked_bendt">
                                        Checked for Bent Parts
                                    </label>
                                </div> -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checked_scratches">
                                    <label class="form-check-label" for="checked_scratches">
                                        Scratches/Dents/Mold/Fungus
                                    </label>
                                </div>
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checked_operation">
                                    <label class="form-check-label" for="checked_operation">
                                        Operational Check
                                    </label>
                                </div> -->





                            </div>
                        </div>
                    </div>

                </fieldset>



            </div>
            <div class="col-4">
                <fieldset>
                    <legend>Pricing Information</legend>
                    <div class="container">

                        <div class="row">
                            <div class="col-4">
                                <p>Base Price</p>
                                <div class="form-outline">
                                    <input id="base_price" class="form-control" type="text" placeholder="" disabled />
                                    <label id="base_price_label" class="form-label text-dark text-opacity-50" for="base_price"><?php echo $data['base_price']; ?></label>
                                </div>
                            </div>
                            <div class="col-4">
                                <p>Calculated</p>
                                <fieldset id="calculations">
                                    <p>Retail</p>
                                    <div class="form-outline">
                                        <input id="retail_price" class="form-control border-success bg-success bg-opacity-25" type="text" placeholder="Retail Calc" disabled>
                                        <label id="retail_price_label" class="form-label text-success text-opacity-75" for="retail_price">TEST</label>
                                    </div>
                                    <label for="trade_price">Trade</label>
                                    <input id="trade_price" type="text" class="form-control border-warning bg-warning bg-opacity-25" placeholder="" disabled>
                                    <label for="sale_price">Sale</label>
                                    <input id="sale_price" type="text" class="form-control border-primary bg-primary bg-opacity-25" placeholder="" disabled>
                                </fieldset>
                            </div>
                            <div class="col-4">
                                <label for="overrides">Final</label>
                                <fieldset id="overrides">
                                    <label for="retail_price_override">Retail</label>
                                    <input id="retail_price_override" type="text" class="form-control border-success bg-success text-dark bg-opacity-10">
                                    <label for="trade_price_override">Trade</label>
                                    <input id="trade_price_override" type="text" class="form-control border-warning bg-warning text-dark bg-opacity-10">
                                    <label for="sale_price_override">Sale</label>
                                    <input id="sale_price_override" type="text" class="form-control border-primary bg-primary text-dark bg-opacity-10">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-5">
                <fieldset>
                    <legend>Item</legend>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="serial_num" placeholder="">
                                <label id="serial_num_label" for="serial_num">Serial Number</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-check form-switch">
                                <input class="form-check-input" onclick="setSerialNumToNone();" type="checkbox" role="switch" id="no_serial_num_switch" />
                                <label class="form-check-label" for="no_serial_num_switch">No Serial Number</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-11">
                            <div class="form-outline">
                                <textarea class="form-control" id="short_description_display" rows="1" maxlength="30" wrap="soft" disabled><?php echo $data['short_description']; ?></textarea>
                                <label class="form-label" for="short_description_display">Short Description</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-11">
                            <div class="form-outline">
                                <textarea class="form-control" id="medium_description_display" rows="2" maxlength="80" wrap="soft" disabled><?php echo $data['medium_description']; ?></textarea>
                                <label class="form-label" for="meduim_description_display">Medium Description</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-11">
                            <div class="form-outline">
                                <textarea class="form-control" id="long_description_display" rows="3" maxlength="255" wrap="soft" disabled><?php echo $data['long_description']; ?></textarea>
                                <label class="form-label" for="long_description_display">Long Description</label>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>
    </div>









</form>




<a href="#" class="btn btn-primary m-3">Add to Trade</a><a href="<?php echo URLROOT; ?>/trades/lut_item_edit/<?php echo $data['trade_lu_id']; ?>" class="btn btn-warning m-3">Edit Trade Lookup Item</a>
<?php require APPROOT . '/views/inc/footer.php'; ?>