<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
$cosmeticVisable = true;
//$opticalVisable = (($data['factor_optical_condition'] != 0) && ($data['condition_optical_excellent'] != 0)) ? true : false;
//$mechanicalVisable = (($data['factor_mechanical_condition'] != 0) || ($data['condition_mechanical_operational'] != 0)) ? true : false;
$opticalVisable = true;
$mechanicalVisable = true;
$refPricesVisable = (($data['ref_price_1'] != 0) || ($data['ref_price_2'] != 0) || ($data['ref_price_3'] != 0) || ($data['ref_price_4'] != 0)) ? true : false;
?>


<h2>New Look Up Table Item</h2>
<hr>
<h1 id="item-header"></h1>

<!-- set form  target to LUT item data controller function -->
<form action="<?php echo URLROOT; ?>/trades/lut_item_enter" method="post">
    <input type="hidden" id="trade_lu_id" name="trade_lu_id" value="">

    <input type="hidden" id="cosmetic_condition_label" value="excellent">
    <input type="hidden" id="optical_condition_label" value="excellent">
    <input type="hidden" id="mechanical_condition_label" value="operational">

    <input type="hidden" id="cosmetic_condition_factor" value="1">
    <input type="hidden" id="optical_condition_factor" value="1">
    <input type="hidden" id="mechanical_condition_factor" value="1">


    <div class="container">
        <p>
            <span>
                New Item
            </span>
        <p>
        <div class="row">
            <!-- ****** (ENTER/CONFIRM ITEM TITLE) ******  -->
            <div class="col-3">
                <div class="mb-3 mt-3">
                    <label for="item_title" class="form-label">Item Title:</label>
                    <input type="text" class="form-control border border-1 border-primary" id="item_title" placeholder="" name="item_title" value="">
                </div>
            </div>
            <!-- ****** (ENTER/CONFIRM VSN) ******  -->
            <div class="col-2">
                <div class="mb-3 mt-3">
                    <label for="vsn" class="form-label">Vendor Stock Number:</label>
                    <input type="text" class="form-control border border-1 border-primary" id="vsn" placeholder="" name="vsn" value="">
                </div>
            </div>
            <!-- ****** (MINOR CODE PICKER) ******  -->
            <div class="col-3">
                <div class="mb-3 mt-3">
                    <label for="minor" class="form-label">GERS Minor Code:</label>

                    <select class="form-select border border-2 border-primary" id="minor" name="minor" onchange="setDefaultPricingMatrix(this.value);">
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
                    <select class="form-select border border-2 border-primary" id="family" name="family">
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
                        <select class="form-select border border-2 border-primary" id="item-color" onclick="checkColorEntry(this.value);">
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

        <!-- ****** (SHORT MEDIUM LONG DESCRIPTIONS) ******  -->
        <h3>Descriptions</h3>
        <div class="row mb-3">
            <div class="col-5">
                <label class="form-label" for="short_description">Short Description</label>
                <textarea class="form-control border border-1 border-primary" id="short_description" name="short_description" rows="1" maxlength="30" wrap="soft" placeholder="" onkeyup="descriptionUpdate(this.id);" onblur="distrubteEntry(this.id, this.value);"></textarea>
            </div>
            <div class="col-3 v-align-bottom">
                <div id="short_description_char_count">
                    <p class="text-secondary"></p>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-7">
                <label class="form-label" for="medium_description">Medium Description</label>
                <textarea class="form-control border border-1 border-primary" id="medium_description" name="medium_description" rows="1" maxlength="80" wrap="soft" placeholder="" onkeyup="descriptionUpdate(this.id);" onblur="distrubteEntry(this.id, this.value);"></textarea>
            </div>
            <div class="col-3 v-align-bottom">
                <div id="medium_description_char_count">
                    <p class="text-secondary"></p>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-9">
                <label class="form-label" for="long_description">Long Description</label>
                <textarea class="form-control border border border-1 border-primary" id="long_description" name="long_description" rows="3" maxlength="255" wrap="soft" placeholder="" onkeyup="descriptionUpdate(this.id);"></textarea>
            </div>
            <div class="col-3 v-align-bottom">
                <div id="long_description_char_count">
                    <p class="text-secondary"></p>
                </div>
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
                                <input type="text" id="trade_percent" name="trade_percent" class="form-control text-end" maxlength="10" onblur="formatEntryFloat(this.id, this.value);" value="" />
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
                                <input type="text" id="purchase_percent" name="purchase_percent" class="form-control text-end" maxlength="8" onblur="formatEntryFloat(this.id, this.value);" value="" />
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

        <div class="row">
            <!-- ****** (REFEENCE PRICES) ******  -->
            <div class="col-7">
            </div>
            <!-- ****** (PRICE CALCULATIONS DISPLAY) ******  -->
            <div class="col-5">
                <div class="row">
                    <!-- ****** (RETAIL PRICE CALCULATION DISPLAY) ******  -->
                    <div class="col-4 text-center">
                        <label for="retail_calc" class="form-label text-success">Retail</label>
                        <div class="input-group mb-3 p-0 mx-auto">
                            <input type="text" id="retail_calc" class="form-control text-center text-success bg-success bg-opacity-25 border border-success" disabled maxlength="11" value="" />
                        </div>
                    </div>
                    <!-- ****** (TRADE PRICE CALCULATION DISPLAY) ******  -->
                    <div class="col-4 text-center">
                        <label for="trade_calc" class="form-label text-warning">Trade</label>
                        <div class="input-group mb-3 p-0 mx-auto">
                            <input type="text" id="trade_calc" class="form-control text-center text-warning bg-warning bg-opacity-25 border border-warning" disabled maxlength="11" value="" />
                        </div>
                    </div>
                    <!-- ****** (PURCHASE PRICE CALCULATION DISPLAY) ******  -->
                    <div class="col-4 text-center">
                        <label for="purchase_calc" class="form-label text-primary">Purchase</label>
                        <div class="input-group mb-3 p-0 mx-auto">
                            <input type="text" id="purchase_calc" class="form-control text-center text-primary bg-primary bg-opacity-25 border border-primary" disabled maxlength="11" value="" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ****** (CONDITION OPTIONS DROP DOWNS) ******  -->

        <div class="row">
            <div class="col-7 text-secondary">
                <span class="h3" id="item-header-sub"></span>
            </div>
            <div class="col-5">

                <div class="row m-0 p-0">
                    <div id="cosmetic_condition_dropdown_set" class="col-4 text-center">
                        <label for="cosmetic_condition_dropdown" class="form-label text-secondary">Cosmetic</label>
                        <select class="form-select text-secondary" id="cosmetic_condition_dropdown" onchange="updateConditionDropDown(this.value);">
                            <option value="condition_cosmetic_mint">Mint</option>
                            <option value="condition_cosmetic_nearmint">Near Mint</option>
                            <option value="condition_cosmetic_excellent" selected>Excellent</option>
                            <option value="condition_cosmetic_verygood">Very Good</option>
                            <option value="condition_cosmetic_average">Average</option>
                            <option value="condition_cosmetic_fair">Fair</option>
                            <option value="condition_cosmetic_poor">Poor</option>
                        </select>
                    </div>

                    <div id="mechanical_condition_dropdown_set" class="col-4 text-center">
                        <?php if ($mechanicalVisable) : ?>
                            <label for="mechanical_condition_dropdown" class="form-label text-secondary">Mechanical</label>
                            <select class="form-select text-secondary" id="mechanical_condition_dropdown" onchange="updateConditionDropDown(this.value);">
                                <option value="condition_mechanical_operational" selected>Operational</option>
                                <option value="condition_mechanical_minordefect">Minor Defect</option>
                                <option value="condition_mechanical_majordefect">Major Defect</option>
                                <option value="condition_mechanical_parts">Parts Only</option>
                            </select>
                        <?php endif; ?>
                    </div>


                    <div id="optical_condition_dropdown_set" class="col-4 text-center">
                        <?php if ($opticalVisable) : ?>
                            <label for="optical_condition_dropdown" class="form-label text-secondary">Optical</label>
                            <select class="form-select text-secondary" id="optical_condition_dropdown" onchange="updateConditionDropDown(this.value);">
                                <option value="condition_optical_mint">Mint</option>
                                <option value="condition_optical_nearmint">Near Mint</option>
                                <option value="condition_optical_excellent" selected>Excellent</option>
                                <option value="condition_optical_verygood">Very Good</option>
                                <option value="condition_optical_average">Average</option>
                                <option value="condition_optical_fair">Fair</option>
                                <option value="condition_optical_poor">Poor</option>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** (END CONDITION OPTIONS DROP DOWNS) ******  -->


        <!-- ****** (COSMETIC PRICING SECTION) ******  -->
        <div id="cosmetic_pricing_set">
            <div class="row mt-3">
                <div class="col-12">
                    <p>Cosmetic Condition Factors</p>
                </div>
            </div>
            <div class="row">
                <div class="col-1 text-center">
                    <input type="text" id="condition_cosmetic_mint" name="condition_cosmetic_mint" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                    <span class="clickers"><i id="cond_cos_mint_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_cos_mint_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>

                    <label for="condition_cosmetic_mint" class="form-label">Mint</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_cosmetic_nearmint" name="condition_cosmetic_nearmint" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_cos_nearmint_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_cos_nearmint_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_cosmetic_nearmint" class="form-label">Near Mint</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_cosmetic_excellent" name="condition_cosmetic_excellent" class="form-control text-center border border-3 border-primary shadow-2-strong bg-primary bg-opacity-10" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <!-- <span class="clickers"><i id="cond_cos_excel_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    <i id="cond_cos_excel_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                </span> -->
                    <span class="clickers"><i id="cond_cos_excel_click_up" class="fa-solid fa-caret-up clicker-disabled"></i>
                        <i id="cond_cos_excel_click_down" class="fa-solid fa-caret-down clicker-disabled"></i>
                    </span>
                    <label for="condition_cosmetic_excellent" class="form-label">Excellent</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_cosmetic_verygood" name="condition_cosmetic_verygood" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_cos_verygood_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_cos_verygood_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_cosmetic_verygood" class="form-label">Very Good</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_cosmetic_average" name="condition_cosmetic_average" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_cos_aver_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_cos_aver_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_cosmetic_average" class="form-label">Average</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_cosmetic_fair" name="condition_cosmetic_fair" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_cos_fair_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_cos_fair_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_cosmetic_fair" class="form-label">Fair</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_cosmetic_poor" name="condition_cosmetic_poor" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_cos_poor_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_cos_poor_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_cosmetic_poor" class="form-label">Poor</label>
                </div>
                <!-- ****** (COSMETIC PRICING SLIDER) ******  -->
                <div class="col-5">
                    <label for="factor_cosmetic_condition_slide" class="form-label ms-3">Cosmetic Prices Fine
                        Tuner</label>
                    <div class="input-group mb-3">
                        <div class="col-9">
                            <input type="range" class="form-range" min="0" max=".5" step="0.01" id="factor_cosmetic_condition_slide" name="factor_cosmetic_condition" value="" oninput="updateSliderEntry(this.id, this.value);" />
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control text-center rounded" id="factor_cosmetic_condition_entry" maxlength="4" value="" onchange="updateSlider(this.id, this.value);" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** (END COSMETIC PRICING SECTION) ******  -->

        <!-- ****** (MECHANICAL PRICING SECTION) ******  -->
        <div id="mechanical_pricing_set">
            <div class=" row mt-3">
                <div class="col-12">
                    <p>Mechanical Condition Factors</p>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="row">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6 p-0">
                                            <input type="text" id="condition_mechanical_operational" name="condition_mechanical_operational" class="form-control text-center border border-3 border-primary shadow-2-strong bg-primary bg-opacity-10" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                                            <!-- <span class="clickers mechClickers">
                                            <i id="cond_mech_oper_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                                            <i id="cond_mech_oper_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                                        </span> -->
                                            <span class="clickers mechClickers">
                                                <i id="cond_mech_oper_click_up" class="fa-solid fa-caret-up clicker-disabled"></i>
                                                <i id="cond_mech_oper_click_down" class="fa-solid fa-caret-down clicker-disabled"></i>
                                            </span>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="condition_mechanical_operational" class="form-label">Operational</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6 p-0">
                                            <input type="text" id="condition_mechanical_minordefect" name="condition_mechanical_minordefect" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" /><span class="clickers mechClickers">
                                                <i id="cond_mech_minordefect_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                                                <i id="cond_mech_minordefect_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                                            </span>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="condition_mechanical_minordefect" class="form-label">Minor
                                                Defect</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6 p-0">
                                            <input type="text" id="condition_mechanical_majordefect" name="condition_mechanical_majordefect" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                                            <span class="clickers mechClickers">
                                                <i id="cond_mech_majordefect_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                                                <i id="cond_mech_majordefect_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                                            </span>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="condition_mechanical_majordefect" class="form-label">Major
                                                Defect</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6 p-0">
                                            <input type="text" id="condition_mechanical_parts" name="condition_mechanical_parts" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" /><span class="clickers mechClickers">
                                                <i id="cond_mech_parts_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                                                <i id="cond_mech_parts_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                                            </span>
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="condition_mechanical_parts" class="form-label">Parts
                                                Only</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ****** (MECHANICAL PRICING SLIDER) ******  -->
                <div class="col-5">
                    <label for="factor_mechanical_condition_slide" class="form-label ms-3">Mechanical Prices Fine
                        Tuner</label>
                    <div class="input-group mb-3">
                        <div class="col-9">
                            <input type="range" class="form-range" min="0" max=".5" step="0.01" id="factor_mechanical_condition_slide" name="factor_mechanical_condition" value="" oninput="slideUpdatePricingMatrix(this.id, this.value);" />
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control text-center rounded" id="factor_mechanical_condition_entry" maxlength="4" value="" onchange="normalizeSlider(this.id, this.value);" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** (END MECHANICAL PRICING SECTION) ******  -->

        <!-- ****** (OPTICAL PRICING SECTION) ******  -->

        <div id="optical_pricing_set">
            <div class="row mt-3">
                <div class="col-12">
                    <p>Optical Condition Factors</p>
                </div>
            </div>

            <div class="row">
                <div class="col-1 text-center">
                    <input type="text" id="condition_optical_mint" name="condition_optical_mint" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_opt_mint_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_opt_mint_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_optical_mint" class="form-label">Mint</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_optical_nearmint" name="condition_optical_nearmint" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_opt_nearmint_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_opt_nearmint_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_optical_nearmint" class="form-label">Near Mint</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_optical_excellent" name="condition_optical_excellent" class="form-control text-center border border-3 border-primary shadow-2-strong bg-primary bg-opacity-10" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <!-- <span class="clickers"><i id="cond_opt_excel_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    <i id="cond_opt_excel_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                </span> -->
                    <span class="clickers"><i id="cond_opt_excel_click_up" class="fa-solid fa-caret-up clicker-disabled"></i>
                        <i id="cond_opt_excel_click_down" class="fa-solid fa-caret-down clicker-disabled"></i>
                    </span>
                    <label for="condition_optical_excellent" class="form-label">Excellent</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_optical_verygood" name="condition_optical_verygood" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_opt_good_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_opt_good_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_optical_verygood" class="form-label">Very Good</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_optical_average" name="condition_optical_average" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_opt_averg_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_opt_averg_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_optical_average" class="form-label">Average</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_optical_fair" name="condition_optical_fair" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_opt_fair_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_opt_fair_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_optical_fair" class="form-label">Fair</label>
                </div>
                <div class="col-1 text-center">
                    <input type="text" id="condition_optical_poor" name="condition_optical_poor" class="form-control text-center" maxlength="5" value="" onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                    <span class="clickers"><i id="cond_opt_poor_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                        <i id="cond_opt_poor_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>
                    </span>
                    <label for="condition_optical_poor" class="form-label">Poor</label>
                </div>
                <!-- ****** (OPTICAL SLIDER) ******  -->
                <div class="col-5">
                    <label for="factor_optical_condition_slide" class="form-label ms-3">Optical Prices Fine
                        Tuner</label>
                    <div class="input-group mb-3">
                        <div class="col-9">
                            <input type="range" class="custom-range" min="0" max=".5" step="0.01" id="factor_optical_condition_slide" name="factor_optical_condition" value="" oninput="slideUpdatePricingMatrix(this.id, this.value);" />
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control text-center rounded" id="factor_optical_condition_entry" maxlength="4" value="" onchange="normalizeSlider(this.id, this.value);" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** (END OPTICAL PRICING SECTION) ******  -->

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