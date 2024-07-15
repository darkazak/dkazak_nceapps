<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
$cosmeticVisable = true;
$opticalVisable = true;
$mechanicalVisable = true;
?>

<h2>New Trade Item</h2>
<hr>
<h1 id="item-header"></h1>

<!-- set form  target to LUT item data controller function -->
<form action="<?php echo URLROOT; ?>/trades/trade_item_enter" method="post">
    <input type="hidden" id="trade_item_id" name="trade_item_id" value="">
    <input type="hidden" id="trade_sheet_id" name="trade_sheet_id" value="">

    <input type="hidden" id="vsn" name="vsn" value="">
    <input type="hidden" id="minor" name="minor" value="">
    <input type="hidden" id="family" name="family" value="">

    <!-- The condition dropdown menu selection -->
    <input type="hidden" id="cosmetic_condition_selected" name="cosmetic_condition_selected" value="unset">
    <input type="hidden" id="optical_condition_selected" name="optical_condition_selected" value="unset">
    <input type="hidden" id="mechanical_condition_selected" name="mechanical_condition_selected" value="unset">
    <!-- the calculted number for the matrix math -->
    <input type="hidden" id="cosmetic_condition_factor" name="cosmetic_condition_factor" value="1">
    <input type="hidden" id="optical_condition_factor" name="optical_condition_factor" value="1">
    <input type="hidden" id="mechanical_condition_factor" name="mechanical_condition_factor" value="1">
    <!-- the tuner number math -->
    <input type="hidden" id="cosmetic_condition_tuner" name="cosmetic_condition_tuner" value="0">
    <input type="hidden" id="optical_condition_tuner" name="optical_condition_tuner" value="0">
    <input type="hidden" id="mechanical_condition_tuner" name="mechanical_condition_tuner" value="0">

    <!-- the condition pricing factors matrix -->
    <input type="hidden" id="cosmetic_conditon_factor_mint" name="cosmetic_conditon_factor_mint" value="1.1">
    <input type="hidden" id="cosmetic_conditon_factor_nearmint" name="cosmetic_conditon_factor_nearmint" value="1.05">
    <input type="hidden" id="cosmetic_conditon_factor_excellent" name="cosmetic_conditon_factor_excellent" value="1">
    <input type="hidden" id="cosmetic_conditon_factor_verygood" name="cosmetic_conditon_factor_verygood" value=".95">
    <input type="hidden" id="cosmetic_conditon_factor_average" name="cosmetic_conditon_factor_average" value=".9">
    <input type="hidden" id="cosmetic_conditon_factor_fair" name="cosmetic_conditon_factor_fair" value=".85">
    <input type="hidden" id="cosmetic_conditon_factor_poor" name="cosmetic_conditon_factor_poor" value=".8">

    <input type="hidden" id="mechanical_conditon_factor_operational" name="mechanical_conditon_factor_operational" value="1">
    <input type="hidden" id="mechanical_conditon_factor_minordefect" name="mechanical_conditon_factor_minordefect" value=".8">
    <input type="hidden" id="mechanical_conditon_factor_majordefect" name="mechanical_conditon_factor_majordefect" value=".6">
    <input type="hidden" id="mechanical_conditon_factor_parts" name="mechanical_conditon_factor_parts" value=".4">

    <input type="hidden" id="optical_conditon_factor_mint" name="optical_conditon_factor_mint" value="1.1">
    <input type="hidden" id="optical_conditon_factor_nearmint" name="optical_conditon_factor_nearmint" value="1.05">
    <input type="hidden" id="optical_conditon_factor_excellent" name="optical_conditon_factor_excellent" value="1">
    <input type="hidden" id="optical_conditon_factor_verygood" name="optical_conditon_factor_verygood" value=".95">
    <input type="hidden" id="optical_conditon_factor_average" name="optical_conditon_factor_average" value=".9">
    <input type="hidden" id="optical_conditon_factor_fair" name="optical_conditon_factor_fair" value=".85">
    <input type="hidden" id="optical_conditon_factor_poor" name="optical_conditon_factor_poor" value=".8">


    <div class=" container">
        <div class="row">
            <!-- ****** (ENTER/CONFIRM ITEM TITLE) ******  -->
            <div class="col-3">
                <div class="form-outline mb-3 mt-3">
                    <input type="text" class="form-control form-control-lg" id="item_title" placeholder="" name="item_title" value="">
                    <label for="item_title" class="form-label">Item Title</label>
                </div>
            </div>
            <!-- ****** (ENTER/CONFIRM VSN) ******  -->
            <div class="col-2">
                <div class="form-outline mb-3 mt-3">
                    <input type="text" class="form-control form-control-lg" id="vsn" placeholder="" name="vsn" value="">
                    <label for="vsn" class="form-label">VSN</label>
                </div>
            </div>
            <!-- ****** (SERIAL NUMBER) ******  -->
            <div class="col-3">
                <div class="form-outline mb-3 mt-3">
                    <input type="text" class="form-control form-control-lg" id="serial_num" placeholder="" name="serial_num" value="">
                    <label for="serial_num" class="form-label" id="serial_num_label">Serial Number</label>

                </div>
            </div>
            <div class="col-2">
                <div class="form-check form-switch mb-3 mt-3">
                    <input class="form-check-input" onclick="setSerialNumToNone();" type="checkbox" role="switch" id="no_serial_num_switch" />
                    <label class="form-check-label" for="no_serial_num_switch">No Serial Number</label>
                </div>
            </div>


        </div>

        <div class="row">
            <!-- ****** (MINOR CODE PICKER) ******  -->
            <div class="col-3">
                <div class="mb-3 mt-3">
                    <label for="minor" class="form-label">GERS Minor Code:</label>

                    <select class="form-select" id="minor" name="minor" onchange="loadDefaultPricingMatrix(this.value);">
                        <?php include_once APPROOT . '/data/minorsList.php';  ?>
                        <?php foreach ($minorsList as $minor) : ?>
                            <?php if ($minor[0] == "label") : ?>
                                <optgroup label="<?php echo $minor[1]; ?>">
                                <?php else : ?>
                                    <option value="<?php echo $minor[0]; ?>">
                                        [<?php echo ($minor[0]); ?>]&nbsp;<?php echo ($minor[1]); ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- ****** (FAMILY CODE PICKER) ******  -->
            <div class="col-2">
                <div class="mb-3 mt-3">
                    <label for="family" class="form-label">Family Code:</label>
                    <select class="form-select" id="family" name="family">
                        <?php include_once APPROOT . '/data/familiesList.php';  ?>
                        <?php foreach ($familiesList as $family) : ?>
                            <?php if ($family[0] == "") : ?>
                                <option value="none">None</option>
                            <?php else : ?>
                                <option value="<?php echo $family[0]; ?>">
                                    <?php echo ($family[0]); ?>&nbsp;&nbsp;&nbsp;&OpenCurlyDoubleQuote;<?php echo ($family[1]); ?>&CloseCurlyDoubleQuote;
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- ****** (COLOR PICKER) ******  -->
            <div class="col-2">
                <div class="mb-3 mt-3">
                    <?php
                    $colorList = ["none", "black", "white", "silver", "gold", "red", "green", "blue", "purple", "yellow", "brown", "orange", "pink", "other"];
                    ?>
                    <label for="item-color" class="form-label">Color:</label>
                    <span id="color_selector_span">
                        <select class="form-select" id="item-color" onclick="checkColorEntry(this.value);">
                            <?php foreach ($colorList as $thisColor) : ?>
                                <option value="<?php echo $thisColor; ?>"><?php echo ucwords($thisColor); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </span>
                    <div id="manual-color-input" class="visually-hidden">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control border border-1 border-primary" id="color-manual" value="" placeholder="custom color" onblur="updateColor(this.value);">
                            </div>
                            <div class="col-3 v-align-middle">
                                <button type="button" class="btn btn-primary btn-sm" onclick="showColorList();">Back</button>


                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="color_selection" name="color_selection" value="none">
                </div>
            </div>

        </div>

        <div class="row mt-5 mb-3">
            <div class="col-2">
                <a class="btn btn-secondary" onclick="checkEbay(item_title.value)">Check Ebay</a>
            </div>
        </div>


        <h3 class="mt-5">Pricing Matrix</h3>

        <div class="row mb-3">
            <!-- ****** (BASE PRICE) ******  -->
            <div class="col-2 pe-4">
                <label for="base_price" class="form-label">Base Price</label>
                <div class="input-group mb-3">
                    <span class=" input-group-text">$</span>
                    <input type="text" id="base_price" name="base_price" class="form-control text-end" maxlength="10" onchange="calculateComplexPriceMatrix()" onkeyup="formatCurrencyClean(this.value);" value="" />
                    <span class="input-group-text">.00</span>
                </div>
            </div>

            <div class="col-3">
                <div class="row">
                    <!-- ****** (TRADE PERCENT) ******  -->
                    <div class="col">
                        <div class="text-center">
                            <label for="trade_percent" class="form-label">Trade &percnt;</label>
                            <div class="input-group col-10 mb-3 p-0 mx-auto">
                                <span class="input-group-text">%</span>
                                <input type="text" id="trade_percent" name="trade_percent" class="form-control text-end" maxlength="10" onblur="formatEntryFloat(this.id, this.value);" value="40.00" />
                                <span class="clickers percentClickers">
                                    <i id="trade_per_cent_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickPercentClicker(this.id);"></i>
                                    <i id="trade_per_cent_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickPercentClicker(this.id);"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- ****** (PURCAHSE PERCENT) ******  -->
                    <div class="col">
                        <div class="text-center">
                            <label for="purchase_percent" class="form-label">Purchase &percnt;</label>
                            <div class="input-group col-10 mb-3 p-0 mx-auto">
                                <span class="input-group-text">%</span>
                                <input type="text" id="purchase_percent" name="purchase_percent" class="form-control text-end" maxlength="8" onblur="formatEntryFloat(this.id, this.value);" value="30.00" />
                                <span class="clickers percentClickers">
                                    <i id="purchase_per_cent_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickPercentClicker(this.id);"></i>
                                    <i id="purchase_per_cent_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickPercentClicker(this.id);"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <!-- ****** (CONDITION DROPDOWNS) ******  -->
            <div class="col-3">
                <fieldset>
                    <legend>Condition</legend>
                    <br>
                    <!-- ****** (COSMETIC DROPDOWN SET) ******  -->

                    <div id="cosmetic_dropdown_set" class="<?php echo ($cosmeticVisable) ?  ("mb-4") : ("visually-hidden"); ?>">
                        <div class="form-floating mt-4">
                            <select id="cosmetic_condition_dropdown" name="cosmetic_condition_dropdown" class="form-select mb-1" onchange="selectCondition(this.id, this.value)">
                                <option value="unset" selected>Select One</option>
                                <option value="<?php echo $data['condition_cosmetic_mint']; ?>">Mint</option>
                                <option value="<?php echo $data['condition_cosmetic_nearmint']; ?>">Near Mint</option>
                                <option value="<?php echo $data['condition_cosmetic_excellent']; ?>">Excellent</option>
                                <option value="<?php echo $data['condition_cosmetic_verygood']; ?>">Very Good</option>
                                <option value="<?php echo $data['condition_cosmetic_average']; ?>">Average</option>
                                <option value="<?php echo $data['condition_cosmetic_fair']; ?>">Fair</option>
                                <option value="<?php echo $data['condition_cosmetic_poor']; ?>">Poor</option>
                            </select>
                            <label for="cosmetic_condition_dropdown">Cosmetic Condition</label>
                        </div>
                    </div>
                    <div id="cosmetic_condition_dropdown_switch_check" class="form-check <?php echo ($cosmeticVisable) ?  ("visually-hidden") : ("mb-3"); ?>">
                        <input class="form-check-input" onclick="toggleCondtionDropdown(this.id);" type="radio" id="cosmetic_condition_dropdown_switch" />
                        <label id="cosmetic_condition_dropdown_switch_label" class="form-check-label small" for="cosmetic_condition_dropdown_switch">Show Cosmetic Condition Selector</label>
                    </div>



                    <!-- ****** (MECHANICAL DROPDOWN SET) ******  -->

                    <div id="mechanical_dropdown_set" class="<?php echo ($mechanicalVisable) ?  ("mb-4") : ("visually-hidden"); ?>">
                        <div class="form-floating mt-4">
                            <select id="mechanical_condition_dropdown" name="mechanical_condition_dropdown" class="form-select mb-1" onchange="selectCondition(this.id, this.value)">
                                <option value="unset" selected>Select One</option>
                                <option value="<?php echo $data['condition_mechanical_operational']; ?>">Operational
                                </option>
                                <option value="<?php echo $data['condition_mechanical_minordefect']; ?>">Minor Defect
                                </option>
                                <option value="<?php echo $data['condition_mechanical_majordefect']; ?>">Major Defect
                                </option>
                                <option value="<?php echo $data['condition_mechanical_parts']; ?>">Parts Only</option>
                            </select>
                            <label for="mechanical_condition_dropdown">Mechanical Condition</label>
                        </div>
                    </div>
                    <div id="mechanical_condition_dropdown_switch_check" class="form-check <?php echo ($mechanicalVisable) ?  ("visually-hidden") : ("mb-3"); ?>">
                        <input class="form-check-input" onclick="toggleCondtionDropdown(this.id);" type="radio" id="mechanical_condition_dropdown_switch" />
                        <label id="mechanical_condition_dropdown_switch_label" class="form-check-label small" for="mechanical_condition_dropdown_switch">Show Mechanical Condition Selector</label>
                    </div>

                    <!-- ****** (OPTICAL DROPDOWN SET) ******  -->
                    <div id="optical_dropdown_set" class="<?php echo ($opticalVisable) ?  ("mb-4") : ("visually-hidden"); ?>">
                        <div class="form-floating mt-4">

                            <select id="optical_condition_dropdown" name="optical_condition_dropdown" class="form-select mb-1" onchange="selectCondition(this.id, this.value)">
                                <option value="unset" selected>Select One</option>
                                <option value="<?php echo $data['condition_optical_mint']; ?>">Mint</option>
                                <option value="<?php echo $data['condition_optical_nearmint']; ?>">Near Mint</option>
                                <option value="<?php echo $data['condition_optical_excellent']; ?>">Excellent</option>
                                <option value="<?php echo $data['condition_optical_verygood']; ?>">Very Good</option>
                                <option value="<?php echo $data['condition_optical_average']; ?>">Average</option>
                                <option value="<?php echo $data['condition_optical_fair']; ?>">Fair</option>
                                <option value="<?php echo $data['condition_optical_poor']; ?>">Poor</option>
                            </select>
                            <label for="optical_condition_dropdown">Optical Condition</label>
                        </div>
                    </div>
                    <div id="optical_condition_dropdown_switch_check" class="form-check <?php echo ($opticalVisable) ?  ("visually-hidden") : ("mb-3"); ?>">
                        <input class="form-check-input" onclick="toggleCondtionDropdown(this.id);" type="radio" id="optical_condition_dropdown_switch" />
                        <label id="optical_condition_dropdown_switch_label" class="form-check-label small" for="optical_condition_dropdown_switch">Show Optical Condition Selector</label>
                    </div>




                    <!-- ****** (REMINDER CHECKBOXES) ******  -->

                    <div class="container">
                        <div class="row mt-5 mb-3">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checked_battery">
                                    <label class="form-check-label" for="checked_battery">
                                        Battery Compartment
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checked_mechanics">
                                    <label class="form-check-label" for="checked_mechanics">
                                        Checked Mechanics
                                    </label>
                                </div>
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
            <!-- ****** (PRICING INFO) ******  -->
            <div class="col-3">
                <fieldset>
                    <legend>Pricing Information</legend>
                    <div class="container">

                        <div class="row">
                            <div class="col-6">
                                <p class="text-secondary">Calculated</p>
                                <fieldset id="calculations">
                                    <p class="m-0 p-0 text-secondary">Retail</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="retail_calc" class="form-control border-success bg-success bg-opacity-25" type="text" placeholder="" disabled>
                                        <label id="retail_calc_label" class="form-label text-success text-opacity-75" for="retail_calc">need data</label>
                                    </div>
                                    <p class="m-0 p-0 text-secondary">Trade</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="trade_calc" type="text" class="form-control border-warning bg-warning bg-opacity-25" placeholder="" disabled>
                                        <label id="trade_calc_label" class="form-label text-warning text-opacity-75" for="trade_calc">need data</label>
                                    </div>
                                    <p class="m-0 p-0 text-secondary">Purchase</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="purchase_calc" type="text" class="form-control border-primary bg-primary bg-opacity-25" placeholder="" disabled>
                                        <label id="purchase_calc_label" class="form-label text-primary text-opacity-75" for="purchase_calc">need data</label>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <p>Final</p>
                                <fieldset id="overrides">
                                    <p class="m-0 p-0">Retail</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="retail_price_override" name="retail_price_override" type="text" class="form-control border-success bg-success text-dark bg-opacity-10" onblur="formatToCurrency(this.id, this.value)">
                                    </div>
                                    <p class="m-0 p-0">Trade</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="trade_price_override" name="trade_price_override" type="text" class="form-control border-warning bg-warning text-dark bg-opacity-10" onblur="formatToCurrency(this.id, this.value)">
                                    </div>
                                    <p class="m-0 p-0">Purchase</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="purchase_price_override" name="purchase_price_override" type="text" class="form-control border-primary bg-primary text-dark bg-opacity-10" onblur="formatToCurrency(this.id, this.value)">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <!-- ****** (DESCRIPTIONS) ******  -->
            <div class="col-6">
                <fieldset>
                    <legend>Description</legend>
                    <div class="row mb-3">
                        <div class="col-10">
                            <div class="input">
                                <label class="form-label small" for="short_description">Short Description</label>
                                <textarea class="form-control" id="short_description" rows="1" maxlength="30" wrap="soft" onkeyup="characterCounter(this.id);"><?php echo $data['short_description']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-2 mt-4 mb-1">
                            <div id="short_description_char_count">
                                <p class="small">0 of 30</p>
                            </div>
                            <btn class="btn btn-secondary btn-sm mt-0 mb-3" onclick="fillMediumDescription();"><i class="fa-regular fa-arrow-down-to-square"></i> copy</btn>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-10">
                            <div class="input">
                                <label class="form-label small" for="medium_description">Medium Description</label>
                                <textarea class="form-control rounded" id="medium_description" rows="2" maxlength="80" wrap="soft" onkeyup="characterCounter(this.id);"><?php echo $data['medium_description']; ?></textarea>

                            </div>
                        </div>
                        <div class="col-2 mt-4 mb-1">
                            <div id="medium_description_char_count">
                                <p class="small">0 of 80</p>
                            </div>
                            <btn class="btn btn-secondary btn-sm mt-0 mb-3" onclick="fillLongDescription();"><i class="fa-regular fa-arrow-down-to-square"></i> copy</btn>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-10">
                            <div class="input">
                                <label class="form-label small" for="long_description">Long Description</label>
                                <textarea class="form-control rounded" id="long_description" rows="3" maxlength="255" wrap="soft" onkeyup="characterCounter(this.id);"><?php echo $data['long_description']; ?></textarea>

                            </div>
                        </div>
                        <div class="col-2 mt-4 mb-1" id="long_description_char_count">
                            <p class="small">0 of 255</p>
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>



    </div>
























    <div class="container">





        <div class="row mb-3">
            <div class="col-9">
                <label class="form-label" for="nce_note">Note &lpar;for internal NCE use only&rpar;</label>
                <textarea class="form-control border border border-1 border-primary" id="nce_note" name="nce_note" rows="3" maxlength="255" wrap="soft"></textarea>
            </div>
        </div>

        <button class="btn btn-primary my-4" type="submit">Enter New Item</button>

    </div>

</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>