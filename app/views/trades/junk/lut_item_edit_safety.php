<?php require APPROOT . '/views/inc/header.php'; ?>


<?php
//$cosmeticVisable = true;
// echo ("<br>");
// echo ($data['cosmetic_condition_tuner']);
// echo ($data['has_cosmetics']) ?  ("cosmetics TRUE") : ("cosmetics FALSE");
// echo "<br>";
// echo ($data['has_opticals']) ?  ("optics TRUE") : ("optics FALSE");
//$opticalVisable = (($data['factor_optical_condition'] != 0) && ($data['condition_optical_excellent'] != 0)) ? true : false;
//$opticalVisable =  true;
//$mechanicalVisable = (($data['factor_mechanical_condition'] != 0) || ($data['condition_mechanical_operational'] != 0)) ? true : false;
//$mechanicalVisable = true;
$refPricesVisable = true;
//$refPricesVisable = (($data['ref_price_1'] != 0) || ($data['ref_price_2'] != 0) || ($data['ref_price_3'] != 0) || ($data['ref_price_4'] != 0)) ? true : false;
include_once APPROOT . '/data/name_translation_data_table.php';
include_once APPROOT . '/data/attributes_table.php';
?>

<h2>Edit Trade Lookup Table Item</h2>

<p id="item_header" class="h1 text-muted"><?php echo $data['medium_description']; ?>
    <?php echo ($data['comments'] == "") ?  ("") : ("<span class='small'>(" . $data['comments'] . ")</span>"); ?></p>
<div class="container">
    <hr>
    <p> <span> LU-ID: <em><?php echo $data['trade_lu_id']; ?></em> </span>

        <!-- set form  target to LUT item data controller function -->
    <form id="update_lut_item" action="<?php echo URLROOT; ?>/trades/lut_item_update" method="post">
        <fieldset id="hidden_fields">
            <input type="hidden" id="trade_lu_id" name="lut_id" value="<?php echo $data['trade_lu_id']; ?>">
            <input type="hidden" id="medium_description" name="medium_description"
                value="<?php echo $data['medium_description']; ?>">
            <input type="hidden" id="comments" name="comments" value="<?php echo $data['comments']; ?>">
            <input type="hidden" id="attributes_array" name="attributes_array"
                value="<?php echo htmlentities($data['attributes']); ?>">

            <input type="hidden" id="vsn" name="vsn" value="<?php echo $data['vsn']; ?>">
            <input type="hidden" id="minor" name="minor" value="<?php echo $data['minor']; ?>">
            <input type="hidden" id="family" name="family" value="<?php echo $data['family']; ?>">
            <input type="hidden" id="cosmetic_condition" name="cosmetic_condition" value="">
            <input type="hidden" id="optical_condition" name="optical_condition" value="">
            <input type="hidden" id="mechanical_condition" name="mechanical_condition" value="">
            <input type="hidden" id="base_price_value" name="base_price_value"
                value="<?php echo $data['base_price']; ?>">
            <input type="hidden" id="trade_percent_value" name="trade_percent_value"
                value="<?php echo $data['trade_percent']; ?>">
            <input type="hidden" id="purchase_percent_value" name="purchase_percent_value"
                value="<?php echo $data['purchase_percent']; ?>">

            <input type="hidden" id="cosmetic_condition_selection" name="cosmetic_condition_selection" value="unset">
            <!-- The dropdown menu selection -->
            <input type="hidden" id="optical_condition_selection" name="optical_condition_selection" value="unset">
            <!-- The dropdown menu selection -->
            <input type="hidden" id="mechanical_condition_selection" name="mechanical_condition_selection"
                value="unset"><!-- The dropdown menu selection -->
            <input type="hidden" id="cosmetic_condition_tuner_value" name="cosmetic_condition_tuner_value"
                value="<?php echo $data['cosmetic_condition_tuner']; ?>"> <!-- the tuner number -->
            <input type="hidden" id="optical_condition_tuner_value" name="optical_condition_tuner_value"
                value="<?php echo $data['optical_condition_tuner']; ?>"> <!-- the tuner number -->
            <input type="hidden" id="mechanical_condition_tuner_value" name="mechanical_condition_tuner_value"
                value="<?php echo $data['mechanical_condition_tuner']; ?>"> <!-- the tuner number -->

            <input type="hidden" id="has_cosmetics" value="<?php echo $data['has_cosmetics']; ?>">
            <input type="hidden" id="condition_cosmetic_mint_value"
                value="<?php echo $data['condition_cosmetic_mint']; ?>">
            <input type="hidden" id="condition_cosmetic_nearmint_value"
                value="<?php echo $data['condition_cosmetic_nearmint']; ?>">
            <input type="hidden" id="condition_cosmetic_excellent_value"
                value="<?php echo $data['condition_cosmetic_excellent']; ?>">
            <input type="hidden" id="condition_cosmetic_verygood_value"
                value="<?php echo $data['condition_cosmetic_verygood']; ?>">
            <input type="hidden" id="condition_cosmetic_average_value"
                value="<?php echo $data['condition_cosmetic_average']; ?>">
            <input type="hidden" id="condition_cosmetic_fair_value"
                value="<?php echo $data['condition_cosmetic_fair']; ?>">
            <input type="hidden" id="condition_cosmetic_poor_value"
                value="<?php echo $data['condition_cosmetic_poor']; ?>">

            <input type="hidden" id="has_mechanicals" value="<?php echo $data['has_mechanicals']; ?>">
            <input type="hidden" id="condition_mechanical_operational_value"
                value="<?php echo $data['condition_mechanical_operational']; ?>">
            <input type="hidden" id="condition_mechanical_minordefect_value"
                value="<?php echo $data['condition_mechanical_minordefect']; ?>">
            <input type="hidden" id="condition_mechanical_majordefect_value"
                value="<?php echo $data['condition_mechanical_majordefect']; ?>">
            <input type="hidden" id="condition_mechanical_parts_value"
                value="<?php echo $data['condition_mechanical_parts']; ?>">

            <input type="hidden" id="has_opticals" value="<?php echo $data['has_opticals']; ?>">
            <input type="hidden" id="condition_optical_mint_value"
                value="<?php echo $data['condition_optical_mint']; ?>">
            <input type="hidden" id="condition_optical_nearmint_value"
                value="<?php echo $data['condition_optical_nearmint']; ?>">
            <input type="hidden" id="condition_optical_excellent_value"
                value="<?php echo $data['condition_optical_excellent']; ?>">
            <input type="hidden" id="condition_optical_verygood_value"
                value="<?php echo $data['condition_optical_verygood']; ?>">
            <input type="hidden" id="condition_optical_average_value"
                value="<?php echo $data['condition_optical_average']; ?>">
            <input type="hidden" id="condition_optical_fair_value"
                value="<?php echo $data['condition_optical_fair']; ?>">
            <input type="hidden" id="condition_optical_poor_value"
                value="<?php echo $data['condition_optical_poor']; ?>">

            <input type="hidden" id="name_data_translation_array" value="<?php echo $nameDataTranslationArrayText; ?>">
            <?php
            $attributes_array = json_decode($data['attributes']);
            ?>
            <input type="hidden" id="attribute_type_value" value="<?php echo $attributes_array->TYPE ?>">
            <input type="hidden" id="attribute_brand_value" value="<?php echo $attributes_array->BRAND ?>">
            <input type="hidden" id="attribute_color_value" value="<?php echo $attributes_array->COLOR ?>">
            <input type="hidden" id="attribute_batteryList_value"
                value="<?php echo implode(",", $attributes_array->BATTERY); ?>">
            <input type="hidden" id="attribute_charterList_value"
                value="<?php echo implode(",", $attributes_array->CHARGER); ?>">
        </fieldset>
        <!-- ****** (NAME AND DATA SECTION) ******  -->
        <fieldset>
            <!-- ****** (EDIT NAME SECTION) ******  -->
            <div class="row v-align-top">
                <div class="col-5">
                    <div class="my-3">
                        <label for="medium_description_entry" class="form-label m-0 p-0">Item Name:</label>
                        <input type="text" class="form-control border text-uppercase border-1 border-primary"
                            id="medium_description_entry" name="medium_description_entry"
                            onkeyup="liveUpdateMediumDescription(event.key);"
                            value="<?php echo $data['medium_description']; ?>">
                        <select name="medium_description_livesearch" id="medium_description_livesearch"
                            class="form-select-small mt-0 text-light bg-secondary text-uppercase position-absolute visually-hidden"></select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="my-3">
                        <div class="m-0 p-0">
                            &nbsp;
                        </div>
                        <input type="button" id="udate_item_title_btn" class="btn btn-primary"
                            onmouseup="updateGersTitle();" value="Update GERS Name &rightarrow;">
                    </div>
                </div>
                <div class="col-4">
                    <div class="my-3">
                        <label for="item_title" class="form-label m-0 p-0">GERS Name:</label>
                        <input type="text" class="form-control" id="item_title" placeholder="" name="item_title"
                            onkeyup="liveUpdateGersTitle(event.key);" disabled
                            value="<?php echo $data['item_title']; ?>">
                    </div>
                </div>
                <div class="col-1 m-0 p-0">
                    <div class="m-0 p-0">
                        &nbsp;
                    </div>
                    <div class="mx-0 my-3">
                        <span id="item_title-character_count" class="text-secondary align-middle"></span>
                    </div>
                </div>
            </div>

            <!-- ****** (COMMENTS - VSN - MINOR - FAMILY CODE) ******  -->
            <div class="row">
                <div class="col-5">
                    <div class="mb-3 mt-3"> <label for="comments_entry" class="form-label">Comment:</label> <input
                            type="text" class="form-control border border-1 border-primary" id="comments_entry"
                            placeholder="" value="<?php echo $data['comments']; ?>" name="comments_entry"
                            onblur="makeValueUpperCase(this);liveUpdateItemHeaderComment(this.value);"> </div>
                </div> <!-- ****** (ENTER/CONFIRM VSN) ******  -->
                <div class="col-2">
                    <div class="mb-3 mt-3"> <label for="vsn" class="form-label">Vendor Stock Number:</label> <input
                            type="text" class="form-control border border-1 border-primary" id="vsn" placeholder=""
                            value="<?php echo $data['vsn']; ?>" name="vsn"> </div>
                </div> <!-- ****** (MINOR CODE PICKER) ******  -->
                <div class="col-3">
                    <div class="mb-3 mt-3"> <label for="minor" class="form-label">Minor Code:</label>
                        <select class="form-select border border-2 border-primary" id="minor" name="minor">
                            <?php include_once APPROOT . '/data/minorsList.php';  ?>
                            <?php foreach ($minorsList as $minor) : ?> <?php if ($minor[0] == "label") : ?> <optgroup
                                label="<?php echo $minor[1]; ?>"> <?php else : ?> <option
                                    value=" <?php echo $minor[0]; ?>"
                                    <?php if ($data['minor'] == $minor[0]) : ?>selected<?php endif; ?>>
                                    [<?php echo ($minor[0]); ?>] <?php echo ($minor[1]); ?></option> <?php endif; ?>
                                <?php endforeach; ?> </select>
                    </div>
                </div> <!-- ****** (FAMILY CODE PICKER) ******  -->
                <div class="col-2">
                    <div class="mb-3 mt-3"> <label for="family" class="form-label">Family Code:</label> <select
                            class="form-select border border-2 border-primary" id="family" name="family">
                            <?php include_once APPROOT . '/data/familiesList.php';  ?>
                            <?php foreach ($familiesList as $family) : ?> <?php if ($family[0] == "") : ?> <option
                                value="">None</option> <?php else : ?> <option value="<?php echo $family[0]; ?>"
                                <?php if ($data['family'] == $family[0]) : ?>selected<?php endif; ?>>
                                <?php echo ($family[0]); ?>&nbsp;&nbsp;&nbsp;&OpenCurlyDoubleQuote;<?php echo ($family[1]); ?>&CloseCurlyDoubleQuote;
                            </option> <?php endif; ?> <?php endforeach; ?> </select> </div>
                </div>
            </div>

            <!-- ****** (NCE NOTE) ******  -->
            <div class="row mb-3">
                <div class="col-9"> <label class="form-label" for="nce_note">Note &lpar;for internal NCE use
                        only&rpar;</label> <textarea class="form-control border border border-1 border-primary"
                        id="nce_note" name="nce_note" rows="1" maxlength="255"
                        wrap="soft"><?php echo $data['nce_note']; ?></textarea> </div>
            </div>

        </fieldset>
        <!-- ****** (ATTRIBUTES SECTION) ******  -->
        <fieldset>
            <!-- ****** (EDIT ATTRIBUTES) ******  -->
            <hr>
            <h2>Attributes</h2>
            <div class="row">
                <!-- TOP ROW -->
                <!-- TYPE -->
                <div class="col-4">
                    <input type="checkbox" class="form-check-input ms-1" id="show_attribute_type"
                        name="show_attribute_type"
                        onclick="toggleAttributeEntry(this,'select'); resetTypeAttributePicker();"
                        <?php echo (empty($attributes_array->TYPE)) ?  ("") : ("checked"); ?>>
                    <label class="form-label" for="show_attrribute_type">Type</label>
                    <select id="attribute_type_select" name="attribute_type_select"
                        class="form-select border border-2 border-primary"
                        onblur="updateAttributeValue('attribute_type_value', this.value)">
                        <?php foreach ($attributesTypeList as $thisType) {
                            echo ($thisType == $attributes_array->TYPE) ?  ("<option selected='selected'>") : ("<option>");
                            echo $thisType . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- BRAND -->
                <div class="col-3">
                    <input type="checkbox" class="form-check-input ms-1" id="show_attribute_brand"
                        name="show_attribute_brand"
                        onclick="toggleAttributeEntry(this,'input'); resetBrandAttributePicker();"
                        <?php echo (empty($attributes_array->BRAND)) ?  ("") : ("checked"); ?>>
                    <label class="form-label" for="show_attribute_brand">Brand</label>
                    <input type="text" class="form-control border border-1 border-primary text-uppercase"
                        id="attribute_brand_input" value="<?php echo $attributes_array->BRAND; ?>"
                        name="attribute_brand_input" onblur="updateAttributeValue('attribute_brand_value', this.value)">
                </div>

                <!-- ****** (COLOR PICKER) ******  -->
                <div class="col-2">
                    <input type="checkbox" class="form-check-input ms-1" id="show_attribute_color"
                        name="show_attribute_color" onclick="toggleAttributeEntry(this,'both'); resetColorPicker()"
                        <?php echo (empty($attributes_array->COLOR)) ?  ("") : ("checked"); ?>>
                    <label class="form-label" for="show_attribute_brand">Color</label>
                    <select id="attribute_color_select" name="attribute_color_select"
                        class="form-select border border-2 border-primary"
                        onblur="updateAttributeValue('attribute_color_value', this.value)">
                        <?php
                        foreach ($attributesColorList as $thisColor) {
                            echo ($thisColor == $attributes_array->COLOR) ?  ("<option selected='selected'") : ("<option");
                            echo " onclick='checkColorEntry(this.value);'";
                            echo ">";
                            echo $thisColor . "</option>";
                        }
                        ?>
                    </select>
                    <input type="text"
                        class="form-control border border-1 border-primary text-uppercase visually-hidden"
                        id="attribute_color_input" placeholder="Custom Color" value="" name="attribute_color_input"
                        onblur="updateAttributeValue('attribute_color_value', this.value)">

                    <?php
                    //$existing_color = $data['color_selection'];
                    //$custom_color = 1;
                    // if ($data['color_selection'] != "") {
                    //     foreach ($colorList as $thisColor) {
                    //         if (ucwords($data['color_selection']) == ucwords($thisColor)) {
                    //             $custom_color = 0;
                    //             break;
                    //         }
                    //     }
                    // }
                    ?>
                </div>


            </div>
            <div class="row mt-5">
                <!-- SECOND ROW -->
                <fieldset id="lens_attributes">

                </fieldset>
            </div>
            <div class="row mt-5">
                <!-- THIRD ROW -->
                <!-- BATTERY -->
                <div class="col-5">
                    <input type="checkbox" class="form-check-input ms-1" id="show_attribute_battery"
                        name="show_attribute_battery"
                        onclick="toggleAttributeEntry(this,'input'); resetBrandAttributePicker();"
                        <?php echo (empty($attributes_array->BATTERY)) ?  ("") : ("checked"); ?>>
                    <label class="form-label" for="show_attribute_battery">Battery</label>
                    <?php //print_r($attributes_array->BATTERY); 
                    ?>
                    <div class="row">
                        <div id="battery_rows_container" class="col-9">
                            <?php
                            $i = 0;
                            foreach ($attributes_array->BATTERY as $battery) {
                            ?>
                            <div id="attribute_battery_row_<?php echo $i; ?>" class="row">
                                <div class="col-11">
                                    <input type="text"
                                        class="form-control border border-1 border-primary text-uppercase"
                                        id="attribute_battery_input_<?php echo $i; ?>" value="<?php echo $battery; ?>"
                                        name="attribute_battery_input<?php echo $i; ?>" onblur="updateBatteryList();">
                                </div>
                                <div class="col-1 m-0 p-0 mt-1"><span class="text-primary cursor-pointer" href="#"
                                        onmouseup="removeBattery(<?php echo $i; ?>)">&Otimes;</span></div>
                            </div>
                            <?php $i++;
                            } ?>
                        </div>
                        <div id="add_battery_btn_div" class="col-3 visually-hidden">
                            <input type="button" class="btn btn-primary btn-sm" value="add &blacktriangledown;"
                                onmouseup="addBatteryEntry();">
                        </div>
                    </div>
                </div>
                <!-- CHARGER -->
                <div class="col-5">
                    <input type="checkbox" class="form-check-input ms-1" id="show_attribute_charger"
                        name="show_attribute_charger"
                        onclick="toggleAttributeEntry(this,'input'); resetBrandAttributePicker();"
                        <?php echo (empty($attributes_array->BRAND)) ?  ("") : ("checked"); ?>>
                    <label class="form-label" for="show_attribute_charger">Charger</label>
                    <input type="text" class="form-control border border-1 border-primary text-uppercase"
                        id="attribute_charger_input" value="<?php echo $attributes_array->CHARGER; ?>"
                        name="attribute_charger_input"
                        onblur="updateAttributeValue('attribute_charger_value', this.value)">
                </div>

            </div>
            <!-- ****** (END EDIT ATTRIBUTES) ******  -->
        </fieldset>
        <hr>
        <!-- ****** (PRICING SECTION) ******  -->
        <fieldset>
            <!-- ****** (PRICING MATRIX) ******  -->
            <h2>Pricing Matrix</h2>

            <div class="row m-0 p-0">
                <div class="row m-0 p-0 align-items-end">
                    <!-- ****** (REFERENCE PRICES DISPLAY) ******  -->
                    <div class="col-6">
                        <label class="form-label text-secondary" for="refence_price_list">Reference Prices</label>
                        <div class="refence_price_list">
                            <div class="row">
                                <?php if ($refPricesVisable) : ?>
                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            m
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            <?php echo "$" . $data['ref_mint']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            nm
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            <?php echo "$" . $data['ref_near_mint']; ?></div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            ex
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            <?php echo "$" . $data['ref_excellent']; ?></div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            vg
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            <?php echo "$" . $data['ref_very_good']; ?></div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            av
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            <?php echo "$" . $data['ref_average']; ?></div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            f
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            <?php echo "$" . $data['ref_fair']; ?></div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            p
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center text-uppercase text-secondary">
                                            <?php echo "$" . $data['ref_poor']; ?></div>
                                    </div>
                                </div>

                                <?php else : ?>
                                <div class="row">
                                    <div class="col text-start text-secondary">
                                        <p>No reference prices at this time.</p>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- ****** (CONDITION EXAMPLES DISPLAY DROP DOWNS) ******  -->
                    <div class="col-6">
                        <div class="row">
                            <div id="condition_cosmetic_dropdown_example"
                                class="col-4 text-center<?php echo ($data['has_cosmetics']) ?  ("") : (" visually-hidden"); ?>">
                                <label for="menu_cosmetic" class="form-label text-secondary">Example Cosmetic</label>
                                <select class="form-select text-secondary" id="menu_cosmetic"
                                    onchange="updateConditionDropDown(this.id, this.value);">
                                    <option value="condition_cosmetic_mint">Mint</option>
                                    <option value="condition_cosmetic_nearmint">Near Mint</option>
                                    <option value="condition_cosmetic_excellent" selected>Excellent</option>
                                    <option value="condition_cosmetic_verygood">Very Good</option>
                                    <option value="condition_cosmetic_average">Average</option>
                                    <option value="condition_cosmetic_fair">Fair</option>
                                    <option value="condition_cosmetic_poor">Poor</option>
                                </select>
                            </div>
                            <div id="condition_mechanical_dropdown_example"
                                class="col-4 text-center<?php echo ($data['has_mechanicals']) ?  ("") : (" visually-hidden"); ?>">
                                <label for="menu_mechanical" class="form-label text-secondary">Example
                                    Mechanical</label>
                                <select class="form-select text-secondary" id="menu_mechanical"
                                    onchange="updateConditionDropDown(this.id, this.value);">
                                    <option value="condition_mechanical_operational" selected>Operational</option>
                                    <option value="condition_mechanical_minordefect">Minor Defect</option>
                                    <option value="condition_mechanical_majordefect">Major Defect</option>
                                    <option value="condition_mechanical_parts">Parts Only</option>
                                </select>
                            </div>
                            <div id="condition_optical_dropdown_example"
                                class="col-4 text-center<?php echo ($data['has_opticals']) ?  ("") : (" visually-hidden"); ?>">
                                <label for="menu_optical" class="form-label text-secondary">Example Optical</label>
                                <select class="form-select text-secondary" id="menu_optical"
                                    onchange="updateConditionDropDown(this.id, this.value);">
                                    <option value="condition_optical_mint">Mint</option>
                                    <option value="condition_optical_nearmint">Near Mint</option>
                                    <option value="condition_optical_excellent" selected>Excellent</option>
                                    <option value="condition_optical_verygood">Very Good</option>
                                    <option value="condition_optical_average">Average</option>
                                    <option value="condition_optical_fair">Fair</option>
                                    <option value="condition_optical_poor">Poor</option>
                                </select>
                            </div>
                            <!-- ****** (END CONDITION OPTIONS DROP DOWNS) ******  -->
                        </div>
                    </div>
                </div>
                <hr class="m-0 p-0 mt-3">
                <!-- ****** (BASE AND PERCENTS AND EXAMPLES) ******  -->
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="row">
                            <!-- ****** (BASE PRICE) ******  -->
                            <div class="col-4">
                                <label for="base_price_entry" class="form-label">Base Price</label>
                                <div class="input-group mb-3">
                                    <span class=" input-group-text">$</span>
                                    <input type="text" id="base_price_entry" name="base_price_entry"
                                        class="form-control text-end" maxlength="10"
                                        onblur=" updateMatrixValue(this.value,'base_price_value'); calculateEntirePriceMatrix()"
                                        onkeyup="formatCurrencyClean(this.value);"
                                        value="<?php echo round($data['base_price']); ?>" />
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <!-- ****** (TRADE PERCENT) ******  -->
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="trade_percent" class="form-label">Trade &percnt;</label>
                                    <div class="input-group col-10 mb-3 p-0 mx-auto">
                                        <span class="input-group-text">%</span>
                                        <input type="text" id="trade_percent" name="trade_percent"
                                            class="form-control text-end" maxlength="10"
                                            onblur="updatePercentage(this.id, this.value);"
                                            value="<?php echo $data['trade_percent']; ?>" />
                                        <span class="clickers percentClickers">
                                            <div class="clicker-caret clicker-caret-up"></div>
                                            <div class="clicker-caret clicker-caret-down"></div>
                                            <!-- <i id="trade_per_cent_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickPercentClicker(this.id);"></i>
                                            <i id="trade_per_cent_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickPercentClicker(this.id);"></i> -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- ****** (PURCHASE PERCENT) ******  -->
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="purchase_percent" class="form-label">Purchase &percnt;</label>
                                    <div class="input-group col-10 mb-3 p-0 mx-auto"> <span
                                            class="input-group-text">%</span>
                                        <input type="text" id="purchase_percent" name="purchase_percent"
                                            class="form-control text-end" maxlength="8"
                                            onblur="updatePercentage(this.id, this.value);"
                                            value="<?php echo $data['purchase_percent']; ?>" />
                                        <span class="clickers percentClickers">
                                            <div class="clicker-caret clicker-caret-up"></div>
                                            <div class="clicker-caret clicker-caret-down"></div>
                                            <!-- <i id="purchase_per_cent_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickPercentClicker(this.id);"></i>
                                            <i id="purchase_per_cent_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickPercentClicker(this.id);"></i> -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <!-- ****** (PRICE CALCULATIONS DISPLAY) ******  -->
                        <div class="row">
                            <!-- ****** (RETAIL PRICE CALCULATION DISPLAY) ******  -->
                            <div class="col text-center"> <label for="retail_calc"
                                    class="form-label text-secondary">Retail</label>
                                <div class="input-group mb-3 p-0 mx-auto">
                                    <input type="text" id="retail_calc"
                                        class="form-control text-center text-success bg-success bg-opacity-10 border border-secondary"
                                        disabled value="" />
                                </div>
                            </div>
                            <!-- ****** (TRADE PRICE CALCULATION DISPLAY) ******  -->
                            <div class="col text-center"> <label for="trade_calc"
                                    class="form-label text-secondary">Trade</label>
                                <div class="input-group mb-3 p-0 mx-auto">
                                    <input type="text" id="trade_calc"
                                        class="form-control text-center text-warning bg-warning bg-opacity-10 border border-secondary"
                                        disabled value="" />
                                </div>
                            </div>
                            <!-- ****** (PURCHASE PRICE CALCULATION DISPLAY) ******  -->
                            <div class="col text-center"> <label for="purchase_calc"
                                    class="form-label text-secondary">Purchase</label>
                                <div class="input-group mb-3 p-0 mx-auto">
                                    <input type="text" id="purchase_calc"
                                        class="form-control text-center text-primary bg-primary bg-opacity-10 border border-secondary"
                                        disabled value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ****** (COSMETIC PRICING SECTION) ******  -->
            <fieldset>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-check">
                            <label
                                class="form-label <?php echo ($data['has_cosmetics']) ?  (' text-primary') : (' text-dark'); ?>"
                                id="lut_cosmetic_pricing_matrix_section_label"
                                for="lut_cosmetic_pricing_matrix_section">Cosmetic Condition Factors</label>
                            <input type="checkbox" class="form-check-input"
                                <?php echo ($data['has_cosmetics']) ?  ('checked="checked" ') : (' '); ?>
                                id="lut_cosmetic_pricing_matrix_section" name="lut_cosmetic_pricing_matrix_section"
                                onclick="toggleLutEditPricingSection(this);">
                        </div>
                    </div>
                </div>
                <div id="cosmetic_condition_factors_div"
                    class="row <?php echo ($data['has_cosmetics']) ?  ('') : (' visually-hidden'); ?>">
                    <div class="col-1 text-center">
                        <input type="text" id="condition_cosmetic_mint_entry" name="condition_cosmetic_mint_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_cosmetic_mint']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i id="cond_cos_mint_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> 
                        <i id="cond_cos_mint_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>  -->
                        </span>
                        <label for="condition_cosmetic_mint_entry" class="form-label">Mint</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_cosmetic_nearmint_entry"
                            name="condition_cosmetic_nearmint_entry" class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_cosmetic_nearmint']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i id="cond_cos_nearmint_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_cos_nearmint_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>  -->
                        </span>
                        <label for="condition_cosmetic_nearmint_entry" class="form-label">Near Mint</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_cosmetic_excellent_entry"
                            name="condition_cosmetic_excellent_entry"
                            class="form-control text-center border border-3 border-primary shadow-2-strong bg-primary bg-opacity-10"
                            maxlength="5" value="<?php echo $data['condition_cosmetic_excellent']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                        <span class="clickers">
                            <div class="clicker-caret-disabled clicker-caret-up"></div>
                            <div class="clicker-caret-disabled clicker-caret-down"></div>
                            <!-- <i id="cond_cos_excel_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>                <i id="cond_cos_excel_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->
                        </span>
                        <label for="condition_cosmetic_excellent_entry" class="form-label">Excellent</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_cosmetic_verygood_entry"
                            name="condition_cosmetic_verygood_entry" class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_cosmetic_verygood']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i id="cond_cos_verygood_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_cos_verygood_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>  -->
                        </span>
                        <label for="condition_cosmetic_verygood_entry" class="form-label">Very Good</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_cosmetic_average_entry" name="condition_cosmetic_average_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_cosmetic_average']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i i d="cond_cos_aver_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_cos_aver_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->
                        </span>
                        <label for="condition_cosmetic_average_entry" class="form-label">Average</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_cosmetic_fair_entry" name="condition_cosmetic_fair_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_cosmetic_fair']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i i d="cond_cos_fair_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_cos_fair_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->
                        </span>
                        <label for="condition_cosmetic_fair_entry" class="form-label">Fair</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_cosmetic_poor_entry" name="condition_cosmetic_poor_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_cosmetic_poor']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i id="cond_cos_poor_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_cos_poor_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->
                        </span>
                        <label for="condition_cosmetic_poor_entry" class="form-label">Poor</label>
                    </div>
                    <!-- ****** (COSMETIC PRICING TUNER SLIDER) ******  -->
                    <div class="col-5"> <label for="cosmetic_condition_tuner_entry" class="form-label ms-3">Cosmetic
                            Prices Fine Tuner</label>
                        <div class="input-group mb-3">
                            <div class="col-10"> <input type="range" class="form-range" min="0" max=".5" step="0.01"
                                    id="cosmetic_condition_tuner_slider" name="cosmetic_condition_tuner_slider"
                                    value="<?php echo $data['cosmetic_condition_tuner']; ?>"
                                    oninput="updateSlider(this.id, this.value);" /> </div>

                            <div class="col-2 p-2"> <input type="text"
                                    class="form-control text-center rounded bg-secondary bg-opacity-25"
                                    id="cosmetic_condition_tuner_entry" name="cosmetic_condition_tuner_entry"
                                    maxlength="4" value="<?php echo $data['cosmetic_condition_tuner']; ?>" /> </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <!-- ****** (END COSMETIC PRICING SECTION) ******  -->

            <!-- ****** (MECHANICAL PRICING SECTION) ******  -->
            <fieldset>
                <div class=" row mt-3">
                    <div class="col-12">
                        <div class="form-check">
                            <label
                                class="form-label  <?php echo ($data['has_mechanicals']) ?  (' text-primary') : (' text-dark'); ?>"
                                id="lut_mechanical_pricing_matrix_section_label"
                                for="lut_mechanical_pricing_matrix_section">Mechanical Condition Factors</label>
                            <input type="checkbox" class="form-check-input"
                                <?php echo ($data['has_mechanicals']) ?  ('checked="checked" ') : (' '); ?>
                                id="lut_mechanical_pricing_matrix_section" name="lut_mechanical_pricing_matrix_section"
                                onclick="toggleLutEditPricingSection(this);">
                        </div>
                    </div>
                </div>
                <div id="mechanical_condition_factors_div"
                    class="row <?php echo ($data['has_mechanicals']) ?  ('') : (' visually-hidden'); ?>">
                    <div class="col-7">
                        <div class="row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-6 p-0">
                                                <input type="text" id="condition_mechanical_operational_entry"
                                                    name="condition_mechanical_operational_entry"
                                                    class="form-control text-center border border-3 border-primary shadow-2-strong bg-primary bg-opacity-10"
                                                    maxlength="5"
                                                    value="<?php echo $data['condition_mechanical_operational']; ?>"
                                                    onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                                                <!-- <span class="clickers mechClickers">                                        <i id="cond_mech_oper_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>                                        <i id="cond_mech_oper_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>                                    </span> -->
                                                <!-- <span class="clickers mechClickers">
                                                <i id="cond_mech_oper_click_up" class="fa-solid fa-caret-up clicker-disabled"></i> <i id="cond_mech_oper_click_down" class="fa-solid fa-caret-down clicker-disabled"></i>
                                            </span> -->

                                                <span class="clickers mech-clickers">
                                                    <div class="clicker-caret-disabled clicker-caret-up"></div>
                                                    <div class="clicker-caret-disabled clicker-caret-down"></div>
                                                </span>

                                            </div>
                                            <div class="col-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"> <label for="condition_mechanical_operational_entry"
                                                    class="form-label">Operational</label> </div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-6 p-0"> <input type="text"
                                                    id="condition_mechanical_minordefect_entry"
                                                    name="condition_mechanical_minordefect_entry"
                                                    class="form-control text-center" maxlength="5"
                                                    value="<?php echo $data['condition_mechanical_minordefect']; ?>"
                                                    onchange="updateConditionMatrixEntryField(this.id, this.value);" />



                                                <!-- <i id="cond_mech_minordefect_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_mech_minordefect_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->
                                                <span class="clickers mech-clickers">
                                                    <div class="clicker-caret clicker-caret-up"></div>
                                                    <div class="clicker-caret clicker-caret-down"></div>
                                                </span>
                                            </div>
                                            <div class="col-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"> <label for="condition_mechanical_minordefect_entry"
                                                    class="form-label">Minor Defect</label> </div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-6 p-0"> <input type="text"
                                                    id="condition_mechanical_majordefect_entry"
                                                    name="condition_mechanical_majordefect_entry"
                                                    class="form-control text-center" maxlength="5"
                                                    value="<?php echo $data['condition_mechanical_majordefect']; ?>"
                                                    onchange="updateConditionMatrixEntryField(this.id, this.value);" />


                                                <!-- <span class="clickers mechClickers"> <i id="cond_mech_majordefect_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_mech_majordefect_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> </span>  -->
                                                <span class="clickers mech-clickers">
                                                    <div class="clicker-caret clicker-caret-up"></div>
                                                    <div class="clicker-caret clicker-caret-down"></div>
                                                </span>

                                            </div>
                                            <div class="col-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"> <label for="condition_mechanical_majordefect_entry"
                                                    class="form-label">Major Defect</label> </div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-6 p-0"> <input type="text"
                                                    id="condition_mechanical_parts_entry"
                                                    name="condition_mechanical_parts_entry"
                                                    class="form-control text-center" maxlength="5"
                                                    value="<?php echo $data['condition_mechanical_parts']; ?>"
                                                    onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                                                <!-- <span class="clickers mechClickers"> <i id="cond_mech_parts_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_mech_parts_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> </span>  -->

                                                <span class="clickers mech-clickers">
                                                    <div class="clicker-caret clicker-caret-up"></div>
                                                    <div class="clicker-caret clicker-caret-down"></div>
                                                </span>

                                            </div>
                                            <div class="col-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"> <label for="condition_mechanical_parts_entry"
                                                    class="form-label">Parts Only</label> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ****** (MECHANICAL PRICING TUNER SLIDER) ******  -->
                    <div class="col-5"> <label for="mechanical_condition_tuner_entry" class="form-label ms-3">Mechanical
                            Prices Fine Tuner</label>
                        <div class="input-group mb-3">
                            <div class="col-10"> <input type="range" class="form-range" min="0" max=".5" step="0.01"
                                    id="mechanical_condition_tuner_slider" name="mechanical_condition_tuner_slider"
                                    value="<?php echo $data['mechanical_condition_tuner']; ?>"
                                    oninput="updateSlider(this.id, this.value);" /> </div>
                            <div class="col-2 p-2"> <input type="text"
                                    class="form-control text-center rounded bg-secondary bg-opacity-25"
                                    id="mechanical_condition_tuner_entry" name="mechanical_condition_tuner_entry"
                                    maxlength="4" value="<?php echo $data['mechanical_condition_tuner']; ?>" /> </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <!-- ****** (END MECHANICAL PRICING SECTION) ******  -->

            <!-- ****** (OPTICAL PRICING SECTION) ******  -->
            <fieldset>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-check">
                            <label
                                class="form-label  <?php echo ($data['has_opticals']) ?  (' text-primary') : (' text-dark'); ?>"
                                id="lut_optical_pricing_matrix_section_label"
                                for="lut_optical_pricing_matrix_section">Optical Condition Factors</label>
                            <input type="checkbox" class="form-check-input"
                                <?php echo ($data['has_opticals']) ?  ('checked="checked" ') : (' '); ?>
                                id="lut_optical_pricing_matrix_section" name="lut_optical_pricing_matrix_section"
                                onclick="toggleLutEditPricingSection(this);">
                        </div>
                    </div>
                </div>
                <div id="optical_condition_factors_div"
                    class="row <?php echo ($data['has_opticals']) ?  ('') : (' visually-hidden'); ?>">
                    <div class="col-1 text-center">
                        <input type="text" id="condition_optical_mint_entry" name="condition_optical_mint_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_optical_mint']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <!-- <i i d="cond_opt_mint_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_opt_mint_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                        </span>
                        <label for="condition_optical_mint_entry" class="form-label">Mint</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_optical_nearmint_entry" name="condition_optical_nearmint_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_optical_nearmint']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">

                            <!-- <i id="cond_opt_nearmint_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_opt_nearmint_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->

                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>

                        </span>
                        <label for="condition_optical_nearmint_entry" class="form-label">Near Mint</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_optical_excellent_entry"
                            name="condition_optical_excellent_entry"
                            class="form-control text-center border border-3 border-primary shadow-2-strong bg-primary bg-opacity-10"
                            maxlength="5" value="<?php echo $data['condition_optical_excellent']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                        <!-- 
                        
                    <span class="clickers"><i id="cond_opt_excel_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>                <i id="cond_opt_excel_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i>            </span> -->

                        <span class="clickers">
                            <div class="clicker-caret-disabled clicker-caret-up"></div>
                            <div class="clicker-caret-disabled clicker-caret-down"></div>

                            <!-- <i id="cond_opt_excel_click_up" class="fa-solid fa-caret-up clicker-disabled"></i> 
                        <i id="cond_opt_excel_click_down" class="fa-solid fa-caret-down clicker-disabled"></i> -->
                        </span>
                        <label for="condition_optical_excellent_entry" class="form-label">Excellent</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_optical_verygood_entry" name="condition_optical_verygood_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_optical_verygood']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i i d="cond_opt_good_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_opt_good_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->
                        </span>
                        <label for="condition_optical_verygood_entry" class="form-label">Very Good</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_optical_average_entry" name="condition_optical_average_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_optical_average']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i i d="cond_opt_averg_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_opt_averg_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->

                        </span>
                        <label for="condition_optical_average_entry" class="form-label">Average</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_optical_fair_entry" name="condition_optical_fair_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_optical_fair']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />

                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i i d="cond_opt_fair_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_opt_fair_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->

                        </span>
                        <label for="condition_optical_fair_entry" class="form-label">Fair</label>
                    </div>
                    <div class="col-1 text-center">
                        <input type="text" id="condition_optical_poor_entry" name="condition_optical_poor_entry"
                            class="form-control text-center" maxlength="5"
                            value="<?php echo $data['condition_optical_poor']; ?>"
                            onchange="updateConditionMatrixEntryField(this.id, this.value);" />
                        <span class="clickers">
                            <div class="clicker-caret clicker-caret-up"></div>
                            <div class="clicker-caret clicker-caret-down"></div>
                            <!-- <i id="cond_opt_poor_click_up" class="fa-solid fa-caret-up" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> <i id="cond_opt_poor_click_down" class="fa-solid fa-caret-down" onmouseover="clickerHover(this.id);" onmouseout="clickAway(this.id);" onmousedown="clickerDown(this.id);" onmouseup="clickClicker(this.id);"></i> -->

                        </span>
                        <label for="condition_optical_poor_entry" class="form-label">Poor</label>
                    </div>
                    <!-- ****** (OPTICAL PRICING TUNER SLIDER) ******  -->
                    <div class="col-5"> <label for="optical_condition_tuner_entry" class="form-label ms-3">Optical
                            Prices Fine Tuner</label>
                        <div class="input-group mb-3">
                            <div class="col-10"> <input type="range" class="custom-range" min="0" max=".5" step="0.01"
                                    id="optical_condition_tuner_slider" name="optical_condition_tuner_slider"
                                    value="<?php echo $data['optical_condition_tuner']; ?>"
                                    oninput="updateSlider(this.id, this.value);" /> </div>
                            <div class="col-2 p-2"> <input type="text"
                                    class="form-control text-center rounded bg-secondary bg-opacity-25"
                                    id="optical_condition_tuner_entry" name="optical_condition_tuner_entry"
                                    maxlength="4" value="<?php echo $data['optical_condition_tuner']; ?>" /> </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <!-- ****** (END OPTICAL PRICING SECTION) ******  -->

            <!-- ****** (LONG DESCRIPTION) ******  -->
            <div class="row mb-3">
                <div class="col-9"> <label class="form-label" for="long_description">Long Description</label> <textarea
                        class="form-control border border border-1 border-primary" id="long_description"
                        name="long_description" rows="3" maxlength="255" wrap="soft"
                        placeholder=""><?php echo $data['long_description']; ?></textarea> </div>
                <div class="col-3 v-align-bottom">
                    <div id="long_description_char_count">
                        <p class="text-secondary"></p>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary my-4" type="submit">UPDATE DATA</button>
    </form>
</div>
<!-- ****** (CURRENT STOCK LOOKUP) ******  -->
<?php //include APPROOT . '/views/inc/stock_table_lu.php'; 
?>



<?php require APPROOT . '/views/inc/footer.php'; ?>