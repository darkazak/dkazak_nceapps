<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
$refPricesVisible = (($data['ref_mint'] != 0) || ($data['ref_nearmint'] != 0) || ($data['ref_excellent'] != 0) || ($data['ref_verygood'] != 0)) ? true : false;
$attributes_object = json_decode($data['attributes']);

if ($_SESSION['customer_email']) {
    $email_display = " - " . $_SESSION['customer_email'];
} else {
    $email_display = '';
}

display_workflow_page_label("Trade Worksheet", "Confirm Trade Item")
?>

<form id="confirm_trade_item_form" action="<?php echo URLROOT; ?>/trades/send_item_to_trade_sheet" method="post">
    <!-- <div style="font-size: 10pt;"><kbd>form start code</kbd></div> -->
    <div id="hidden data fields">
        <input type="hidden" id="item_title" name="item_title" value="<?php echo $data['item_title']; ?>">
        <input type="hidden" id="trade_lu_id" name="lut_id" value="<?php echo $data['trade_lu_id']; ?>">
        <input type="hidden" id="vsn" name="vsn" value="<?php echo $data['vsn']; ?>">
        <input type="hidden" id="minor" name="minor" value="<?php echo $data['minor']; ?>">
        <input type="hidden" id="family" name="family" value="<?php echo $data['family']; ?>">
        <input type="hidden" id="ebay_search" name="ebay_search" value="<?php echo $data['ebay_search']; ?>">


        <!-- array data sets -->
        <input type="hidden" id="categories" name="categories" value="<?php echo $data['categories']; ?>">
        <input type="hidden" id="attributes" name="attributes" value='<?php echo $data['attributes']; ?>'>
        <input type="hidden" id="serial_number" name="serial_number" value=''>
        <!-- The Notes -->
        <input type="hidden" id="medium_description" name="medium_description" value="<?php echo $data['medium_description']; ?>">
        <input type="hidden" id="comments" name="comments" value="<?php echo $data['comments']; ?>">
        <input type="hidden" id="long_description" name="long_description" value="<?php echo $data['long_description']; ?>">
        <input type="hidden" id="nce_note" name="nce_note" value="<?php echo $data['nce_note']; ?>">

        <!-- The Price holders -->
        <input type="hidden" id="base_price" name="base_price" value="<?php echo $data['base_price']; ?>">
        <input type="hidden" id="trade_percent" name="trade_percent" value="<?php echo $data['trade_percent']; ?>">
        <input type="hidden" id="purchase_percent" name="purchase_percent" value="<?php echo $data['purchase_percent']; ?>">

        <!-- Which conditions to show -->
        <input type="hidden" id="has_cosmetics" name="has_cosmetics" value="<?php echo $data['has_cosmetics']; ?>">
        <input type="hidden" id="has_opticals" name="has_opticals" value="<?php echo $data['has_opticals']; ?>">
        <input type="hidden" id="has_mechanicals" name="has_mechanicals" value="<?php echo $data['has_mechanicals']; ?>">

        <!-- the selected condition dropdown text -->
        <input type="hidden" id="cosmetic_condition_selected_text" name="cosmetic_condition_selected_text" value="<?php echo $data['cosmetic_condition_selected_text']; ?>">
        <input type="hidden" id="optical_condition_selected_text" name="optical_condition_selected_text" value="<?php echo $data['optical_condition_selected_text']; ?>">
        <input type="hidden" id="mechanical_condition_selected_text" name="mechanical_condition_selected_text" value="<?php echo $data['mechanical_condition_selected_text']; ?>">

        <!-- The selected  condition dropdown  values -->
        <input type="hidden" id="cosmetic_condition_selected_value" name="cosmetic_condition_selected_value" value="<?php echo $data['cosmetic_condition_selected_value']; ?>">
        <input type="hidden" id="optical_condition_selected_value" name="optical_condition_selected_value" value="<?php echo $data['optical_condition_selected_value']; ?>">
        <input type="hidden" id="mechanical_condition_selected_value" name="mechanical_condition_selected_value" value="<?php echo $data['mechanical_condition_selected_value']; ?>">

        <!-- the selected condition tuner/tweaker numbers -->
        <input type="hidden" id="cosmetic_condition_selected_value_tuner" name="cosmetic_condition_selected_value_tuner" value="<?php echo $data['cosmetic_condition_selected_value_tuner']; ?>">
        <input type="hidden" id="optical_condition_selected_value_tuner" name="optical_condition_selected_value_tuner" value="<?php echo $data['optical_condition_selected_value_tuner']; ?>">
        <input type="hidden" id="mechanical_condition_selected_value_tuner" name="mechanical_condition_selected_value_tuner" value="<?php echo $data['mechanical_condition_selected_value_tuner']; ?>">

        <!-- the condition dropdown selection/value matrix -->
        <input type="hidden" id="condition_mechanical_operational" name="condition_mechanical_operational" name="condition_mechanical_operational" value="<?php echo $data['condition_mechanical_operational']; ?>">
        <input type="hidden" id="condition_mechanical_minordefect" name="condition_mechanical_minordefect" value="<?php echo $data['condition_mechanical_minordefect']; ?>">
        <input type="hidden" id="condition_mechanical_majordefect" name="condition_mechanical_majordefect" value="<?php echo $data['condition_mechanical_majordefect']; ?>">
        <input type="hidden" id="condition_mechanical_parts" name="condition_mechanical_parts" value="<?php echo $data['condition_mechanical_parts']; ?>">

        <input type="hidden" id="condition_cosmetic_mint" name="condition_cosmetic_mint" value="<?php echo $data['condition_cosmetic_mint']; ?>">
        <input type="hidden" id="condition_cosmetic_nearmint" name="condition_cosmetic_nearmint" value="<?php echo $data['condition_cosmetic_nearmint']; ?>">
        <input type="hidden" id="condition_cosmetic_excellent" name="condition_cosmetic_excellent" value="<?php echo $data['condition_cosmetic_excellent']; ?>">
        <input type="hidden" id="condition_cosmetic_verygood" name="condition_cosmetic_verygood" value="<?php echo $data['condition_cosmetic_verygood']; ?>">
        <input type="hidden" id="condition_cosmetic_average" name="condition_cosmetic_average" value="<?php echo $data['condition_cosmetic_average']; ?>">
        <input type="hidden" id="condition_cosmetic_fair" name="condition_cosmetic_fair" value="<?php echo $data['condition_cosmetic_fair']; ?>">
        <input type="hidden" id="condition_cosmetic_poor" name="condition_cosmetic_poor" value="<?php echo $data['condition_cosmetic_poor']; ?>">

        <input type="hidden" id="condition_optical_mint" name="condition_optical_mint" value="<?php echo $data['condition_optical_mint']; ?>">
        <input type="hidden" id="condition_optical_nearmint" name="condition_optical_nearmint" value="<?php echo $data['condition_optical_nearmint']; ?>">
        <input type="hidden" id="condition_optical_excellent" name="condition_optical_excellent" value="<?php echo $data['condition_optical_excellent']; ?>">
        <input type="hidden" id="condition_optical_verygood" name="condition_optical_verygood" value="<?php echo $data['condition_optical_verygood']; ?>">
        <input type="hidden" id="condition_optical_average" name="condition_optical_average" value="<?php echo $data['condition_optical_average']; ?>">
        <input type="hidden" id="condition_optical_fair" name="condition_optical_fair" value="<?php echo $data['condition_optical_fair']; ?>">
        <input type="hidden" id="condition_optical_poor" name="condition_optical_poor" value="<?php echo $data['condition_optical_poor']; ?>">


        <!-- reference values -->
        <input type="hidden" name="ref_mint" value="<?php echo $data['ref_mint']; ?>">
        <input type="hidden" name="ref_nearmint" value="<?php echo $data['ref_nearmint']; ?>">
        <input type="hidden" name="ref_excellent" value="<?php echo $data['ref_excellent']; ?>">
        <input type="hidden" name="ref_verygood" value="<?php echo $data['ref_verygood']; ?>">
        <input type="hidden" name="ref_average" value="<?php echo $data['ref_average']; ?>">
        <input type="hidden" name="ref_fair" value="<?php echo $data['ref_fair']; ?>">
        <input type="hidden" name="ref_poor" value="<?php echo $data['ref_poor']; ?>">


    </div>
    <div class="h3">
        <span class="text-success"><?php echo $data['medium_description']; ?> </span>
        <span class="small"><?php echo $data['comments']; ?></span>
    </div>
    <!-- INFORMATION AND ATTRIBUTES HEADING-->
    <div id="data_list">
        <p class="m-0 p-0">
            <!-- ROW 1 -->
            <span id="missing_data_warning" class="text-danger me-3 visually-hidden">
                <span class="bold m-0 p-0 me-1">&rtrif;</span>
                <span class="small text-uppercase emphatic">missing data</span>
            </span>
            <span class="me-3">
                <span class="m-0 p-0 me-1 text-info">&rtrif;</span>
                LU-ID: <span class="small text-muted"><?php echo $data['trade_lu_id']; ?></span>
            </span>
            <span class="me-3">
                <span class="m-0 p-0 me-1 text-info">&rtrif;</span>
                GERS TITLE: <span class="small text-muted"><?php echo $data['item_title']; ?></span>
            </span>
            <span class="me-3">
                <span class="m-0 p-0 me-1 text-info">&rtrif;</span>
                VSN: <span class="small text-muted"><?php echo $data['vsn']; ?></span>
            </span>
            <span class="me-3">
                <span class="m-0 p-0 me-1 text-info">&rtrif;</span>
                MINOR: <span class="small text-muted"><?php echo $data['minor']; ?></span>
            </span>
            <span class="me-3">
                <span class="m-0 p-0 me-1 text-info">&rtrif;</span>
                FAMILY: <span class="small text-muted"><?php echo $data['family']; ?></span>
            </span>
        </p>
        <hr class="m-1 p-0" />
        <p class="m-0 p-0">
            <!-- ROW 2+ -->
            <?php
            foreach ($attributes_object as $key => $value) {
                echo '<span class="me-3 no-line-break">';
                echo '<span class="m-0 p-0 me-1 text-info">&rtrif;</span>';
                if (is_array($value)) {
                    echo $key . ": ";
                    for ($x = 0; $x < count($value); $x++) {
                        echo '<span class="small text-muted">';
                        echo $value[$x];
                        if ($x < count($value) - 1) {
                            echo ", ";
                        }
                        echo '</span>';
                    }
                } else {
                    echo $key . ": ";
                    echo '<span class="small text-muted">';
                    echo $value;
                    echo '</span>';
                }
                echo  '</span>';
            }
            ?>
        </p>

    </div>


    <div class="container mt-3">

        <div class="row">
            <!-- CONDITION COLUMN -->
            <div class="col-3 mx-0 px-0">
                <fieldset>
                    <div class="container-fluid mx-0 px-0">
                        <div class="row  px-0 mx-0">
                            <div class="col px-0 mx-0">
                                <legend>Condition</legend>
                                <div class="row px-0 my-3 mx-0">
                                    <div class="col-6 px-0 mx-0">
                                        <?php if ($data['has_opticals'] == 1) : ?>
                                            <!-- <a id="optical_condition_false_btn" href="#" class="btn btn-sm btn-secondary visually-hidden med-btn-width" onmouseup="switchOpticalConditionSelector(true)">Add&nbsp;Optical</a>
                                            <a id="optical_condition_true_btn" href="#" class="btn btn-sm btn-warning med-btn-width" onmouseup="switchOpticalConditionSelector(false)">Remove&nbsp;Optical</a> -->
                                            <a id="optical_condition_false_btn" href="javascript:switchOpticalConditionSelector(true);" class="btn btn-very-small btn-secondary visually-hidden">Add&nbsp;Optical</a>
                                            <a id="optical_condition_true_btn" href="javascript:switchOpticalConditionSelector(false);" class="btn btn-very-small btn-warning">Remove&nbsp;Optical</a>
                                        <?php else : ?>
                                            <!-- <input type="button" id="optical_condition_true_btn" class="btn btn-sm btn-warning visually-hidden px-2" value="Remove&nbsp;Optical" onmouseup="switchOpticalConditionSelector(false)">
                                            <input type="button" id="optical_condition_false_btn" class="btn btn-sm btn-secondary px-2" value="Add&nbsp;Optical" onmouseup="switchOpticalConditionSelector(true)"> -->

                                            <a id="optical_condition_false_btn" href="javascript:switchOpticalConditionSelector(true);" class="btn btn-very-small btn-secondary">Add&nbsp;Optical</a>
                                            <a id="optical_condition_true_btn" href="javascript:switchOpticalConditionSelector(false);" class="btn btn-very-small btn-warning visually-hidden">Remove&nbsp;Optical</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 px-0 mx-0">
                                        <?php if ($data['has_mechanicals'] == 1) : ?>
                                            <a id="mechanical_condition_true_btn" href="javascript:switchMechanicalConditionSelector(false);" class="btn btn-very-small btn-warning">Remove&nbsp;Mechanical</a>
                                            <a id="mechanical_condition_false_btn" href="javascript:switchMechanicalConditionSelector(true);" class="btn btn-very-small btn-secondary visually-hidden">Add&nbsp;Mechanical</a>
                                        <?php else : ?>
                                            <a id="mechanical_condition_true_btn" href="javascript:switchMechanicalConditionSelector(false);" class="btn btn-very-small btn-warning visually-hidden">Remove&nbsp;Mechanical</a>
                                            <a id="mechanical_condition_false_btn" href="javascript:switchMechanicalConditionSelector(true);" class="btn btn-very-small btn-secondary">Add&nbsp;Mechanical</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row px-0 mx-0">
                                    <div id="cosmetic_condition_dropdown_set" class="form-floating mx-0">
                                        <select id="cosmetic_condition_dropdown" name="cosmetic_condition_dropdown" class="form-select mb-3" onchange="selectConditionDropdown(this.id)" tabIndex="1" autofocus>
                                            <option value="unset" <?php if ($data['cosmetic_condition_selected_text'] == "Select One") : ?> selected <?php endif; ?>>Select One</option>
                                            <option value="<?php echo $data['condition_cosmetic_mint']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Mint") : ?> selected <?php endif; ?>>Mint</option>
                                            <option value="<?php echo $data['condition_cosmetic_nearmint']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Near Mint") : ?> selected <?php endif; ?>>Near Mint</option>
                                            <option value="<?php echo $data['condition_cosmetic_excellent']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Excellent") : ?> selected <?php endif; ?>>Excellent</option>
                                            <option value="<?php echo $data['condition_cosmetic_verygood']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Very Good") : ?> selected <?php endif; ?>>Very Good</option>
                                            <option value="<?php echo $data['condition_cosmetic_average']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Average") : ?> selected <?php endif; ?>>Average</option>
                                            <option value="<?php echo $data['condition_cosmetic_fair']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Fair") : ?> selected <?php endif; ?>>Fair</option>
                                            <option value="<?php echo $data['condition_cosmetic_poor']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Poor") : ?> selected <?php endif; ?>>Poor</option>
                                        </select>
                                        <label class="dropdown_labels" for="cosmetic_condition_dropdown">Cosmetic
                                            Condition</label>
                                    </div>
                                    <div id="optical_condition_dropdown_set" class="form-floating mx-0<?php if ($data['has_opticals'] != 1) : ?> visually-hidden <?php endif; ?>">
                                        <select id="optical_condition_dropdown" <?php if ($data['has_opticals'] != 1) : ?>tabindex="-1" <?php endif; ?> name="optical_condition_dropdown" class="form-select  mb-3" onchange="selectConditionDropdown(this.id)" tabIndex="2">
                                            <option value="unset" <?php if ($data['optical_condition_selected_text'] == "Select One") : ?> selected <?php endif; ?>>Select One</option>
                                            <option value="<?php echo $data['condition_optical_mint']; ?>" <?php if ($data['optical_condition_selected_text'] == "Mint") : ?> selected <?php endif; ?>>Mint</option>
                                            <option value="<?php echo $data['condition_optical_nearmint']; ?>" <?php if ($data['optical_condition_selected_text'] == "Near Mint") : ?> selected <?php endif; ?>>Near Mint</option>
                                            <option value="<?php echo $data['condition_optical_excellent']; ?>" <?php if ($data['optical_condition_selected_text'] == "Excellent") : ?> selected <?php endif; ?>>Excellent</option>
                                            <option value="<?php echo $data['condition_optical_verygood']; ?>" <?php if ($data['optical_condition_selected_text'] == "Very Good") : ?> selected <?php endif; ?>>Very Good</option>
                                            <option value="<?php echo $data['condition_optical_average']; ?>" <?php if ($data['optical_condition_selected_text'] == "Average") : ?> selected <?php endif; ?>>Average</option>
                                            <option value="<?php echo $data['condition_optical_fair']; ?>" <?php if ($data['optical_condition_selected_text'] == "Fair") : ?> selected <?php endif; ?>>Fair</option>
                                            <option value="<?php echo $data['condition_optical_poor']; ?>" <?php if ($data['optical_condition_selected_text'] == "Poor") : ?> selected <?php endif; ?>>Poor</option>
                                        </select>
                                        <label class="dropdown_labels" for="optical_condition_dropdown">Optical
                                            Condition</label>
                                    </div>
                                    <div id="mechanical_condition_dropdown_set" class="form-floating mx-0 <?php if ($data['has_mechanicals'] != 1) : ?> visually-hidden <?php endif; ?>">
                                        <select id="mechanical_condition_dropdown" <?php if ($data['has_mechanicals'] != 1) : ?>tabindex="-1" <?php endif; ?> name="mechanical_condition_dropdown" class="form-select mb-3" onchange="selectConditionDropdown(this.id)" tabIndex="3">
                                            <option value="unset" id="unset" <?php if ($data['mechanical_condition_selected_text'] == "Select One") : ?> selected <?php endif; ?>>Select One</option>
                                            <option value="<?php echo $data['condition_mechanical_operational']; ?>" id="operational" <?php if ($data['mechanical_condition_selected_text'] == "Operational") : ?> selected <?php endif; ?>>Operational</option>
                                            <option value="<?php echo $data['condition_mechanical_minordefect']; ?>" id="minor_defect" <?php if ($data['mechanical_condition_selected_text'] == "Minor") : ?> selected <?php endif; ?>>Minor Defect</option>
                                            <option value="<?php echo $data['condition_mechanical_majordefect']; ?>" id="major_defect" <?php if ($data['mechanical_condition_selected_text'] == "Major") : ?> selected <?php endif; ?>>Major Defect</option>
                                            <option value="<?php echo $data['condition_mechanical_parts']; ?>" id="parts_only" <?php if ($data['mechanical_condition_selected_text'] == "Parts Only") : ?> selected <?php endif; ?>>Parts Only</option>
                                        </select>
                                        <label class="dropdown_labels" for="mechanical_condition_dropdown">Mechanical
                                            Condition</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- CHECKLIST ITEMS -->
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checked_battery" tabIndex="-1">
                                <label class="form-check-label" for="checked_battery">
                                    Battery Compartment
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checked_mechanics" tabIndex="-1">
                                <label class="form-check-label" for="checked_mechanics">
                                    Checked Mechanics
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checked_scratches" tabIndex="-1">
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
            </div>
            <!-- PRICING COLUMN -->
            <div class="col-5">
                <fieldset>
                    <legend>Pricing Information</legend>
                    <div class="container">

                        <div class="row">
                            <div class="col-4">
                                <p>&nbsp;</p>
                                <fieldset id="base_listing">
                                    <div class="mb-3">
                                        <p class="m-0 p-0">Base Price</p>
                                        <?php if ($data['base_price'] == 0) : ?>
                                            <input id="base_price_field" class="form-control" type="text" placeholder="" value="" onblur="processManualBaseTradePurchaseEntry()" tabindex="4" />
                                        <?php else : ?>
                                            <input id="base_price_field" class="form-control" type="text" placeholder="" tabIndex="-1" disabled value="$<?php echo number_format($data['base_price'], 2, ".", ","); ?>" onblur="processManualBaseEntry()" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3">
                                        <p class="m-0 p-0">Trade &percnt;</p>
                                        <?php if ($data['trade_percent'] == 0) : ?>
                                            <input id="trade_percent_field" class="form-control" type="text" placeholder="" value="" onblur="processManualBaseTradePurchaseEntry()" />
                                        <?php else : ?>
                                            <input id="trade_percent_field" class="form-control" type="text" placeholder="" tabIndex="-1" disabled value="<?php echo $data['trade_percent']; ?>" onblur="processManualTradeEntry()" />
                                        <?php endif; ?>

                                    </div>
                                    <div>
                                        <p class="m-0 p-0">Purchase &percnt;</p>
                                        <?php if ($data['purchase_percent'] == 0) : ?>
                                            <input id="purchase_percent_field" class="form-control" type="text" placeholder="" value="" onblur="processManualBaseTradePurchaseEntry()" />
                                        <?php else : ?>
                                            <input id="purchase_percent_field" class="form-control" type="text" placeholder="" tabIndex="-1" disabled value="<?php echo $data['purchase_percent']; ?>" onblur="processManualPurchaseEntry()" />
                                        <?php endif; ?>
                                    </div>
                                </fieldset>
                            </div>
                            <div class=" col-4">
                                <p class="text-secondary">Calculated</p>
                                <fieldset id="calculations">
                                    <p class="m-0 p-0 text-secondary">Retail</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="retail_calc" class="form-control border-success bg-success bg-opacity-25" type="text" placeholder="" disabled tabIndex="-1">
                                        <label id="retail_calc_label" class="form-label text-success text-opacity-75" for="retail_calc">need data</label>
                                    </div>
                                    <p class="m-0 p-0 text-secondary">Trade</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="trade_calc" type="text" class="form-control border-warning bg-warning bg-opacity-25" placeholder="" disabled tabIndex="-1">
                                        <label id="trade_calc_label" class="form-label text-warning text-opacity-75" for="trade_calc">need data</label>
                                    </div>
                                    <p class="m-0 p-0 text-secondary">Purchase</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="purchase_calc" type="text" class="form-control border-primary bg-primary bg-opacity-25" placeholder="" disabled tabIndex="-1">
                                        <label id="purchase_calc_label" class="form-label text-primary text-opacity-75" for="purchase_calc">need data</label>
                                    </div>

                                </fieldset>
                            </div>
                            <div class="col-4">
                                <p>Final</p>
                                <fieldset id="overrides">
                                    <div class="<?php
                                                echo (in_array("missing_retail_price", $_SESSION['error_list'])) ? ("border border-3 border-danger px-2 mb-1") : ("");
                                                ?>">
                                        <p class="m-0 p-0">Retail</p>
                                        <div class="form-outline m-0 p-0 mb-3">
                                            <input id="retail_price_override" name="retail_price_override" type="text" value="<?php echo (in_array("missing_retail_price", $_SESSION['error_list'])) ?  ('') : ($_POST['retail_price_override']); ?>" class="form-control p-0 number-overflow border border-1 <?php echo (in_array("missing_retail_price", $_SESSION['error_list'])) ?  ("border-danger bg-danger") : ("border-success bg-success"); ?> bg-opacity-10 text-dark" onblur="formatTradePricesToCurrencyPrice(this.id, this.value)" onchange="clearTradePriceWarnings(this.id, this.value)" tabindex="6">
                                        </div>
                                    </div>
                                    <div class="<?php
                                                echo (in_array("missing_trade_price", $_SESSION['error_list'])) ? ("border border-3 border-danger px-2 mb-1") : ("");
                                                ?>">
                                        <p class="m-0 p-0">Trade</p>
                                        <div class="form-outline m-0 p-0 mb-3">
                                            <input id="trade_price_override" name="trade_price_override" type="text" value="<?php echo (in_array("missing_trade_price", $_SESSION['error_list'])) ?  ('') : ($_POST['trade_price_override']); ?>" class="form-control p-0 number-overflow border border-1 <?php echo (in_array("missing_trade_price", $_SESSION['error_list'])) ?  ("border-danger bg-danger") : ("border-warning bg-warning"); ?>  bg-opacity-10 text-dark" onblur="formatTradePricesToCurrencyPlain(this.id, this.value)" onchange="clearTradePriceWarnings(this.id, this.value)" tabindex="7">
                                        </div>
                                    </div>
                                    <div class="<?php
                                                echo (in_array("missing_purchase_price", $_SESSION['error_list'])) ? ("border border-3 border-danger px-2 mb-1") : ("");
                                                ?>">
                                        <p class="m-0 p-0">Purchase</p>
                                        <div class="form-outline m-0 p-0 mb-3">
                                            <input id="purchase_price_override" name="purchase_price_override" type="text" value="<?php echo (in_array("missing_purchase_price", $_SESSION['error_list'])) ?  ('') : ($_POST['purchase_price_override']); ?>" class="form-control p-0 number-overflow border border-1 <?php echo (in_array("missing_purchase_price", $_SESSION['error_list'])) ?  ("border-danger bg-danger") : ("border-primary bg-primary"); ?>  bg-opacity-10 text-dark" onblur="formatTradePricesToCurrencyPlain(this.id, this.value)" onchange="clearTradePriceWarnings(this.id, this.value)" tabindex="8">
                                        </div>
                                    </div>

                                </fieldset>
                                <div class="my-5">
                                    <?php
                                    if ($data['ebay_search'] == '') {
                                        $search_phrase = $data['item_title'];
                                    } else {
                                        $search_phrase = $data['ebay_search'];
                                    }
                                    ?>
                                    <input type="button" class="btn btn-info" value="Check Ebay" onclick="checkEbay('<?php echo $search_phrase; ?>')" id="check_ebay" tabindex="5">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <!-- ITEM COLUMN -->
            <div class="col-4">
                <fieldset>
                    <legend>Item</legend>
                    <!-- ****** (SERIAL NUM) ******  -->
                    <!-- <div class="row border border-3 border-danger pt-3"> -->
                    <?php
                    // if (in_array("missing_serial_number", $_SESSION['error_list'])) {
                    //     echo '<div class="row border border-3 border-danger pt-3">';
                    // } else {
                    //     echo '<div class="row">';
                    // }
                    ?>
                    <div id="serial_num_container" class="row pt-3">
                        <!-- ****** (SERIAL NUM) ******  -->
                        <div class="col-7">
                            <div class="mb-3">
                                <label id="serial_num_entry_label" class="form-label" for="serial_num_entry">Serial
                                    Number</label>
                                <input type="text" class="form-control" id="serial_num_entry" name="serial_num_entry" onblur="captureSerialNum(this.value);" tabindex="9">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-check form-switch">
                                <input class="form-check-input" onmouseup="setSerialNumToNone();" type="checkbox" role="switch" id="no_serial_num_switch" tabIndex="-1" />
                                <label class="form-check-label small" for="no_serial_num_switch">No Serial
                                    Number</label>
                            </div>
                        </div>
                        <!-- ****** (CLOSE SERIAL NUM) ******  -->
                    </div>
                    <div class="row mb-3">
                        <!-- ****** (DESCRIPTION) ******  -->
                        <div class="col-12">
                            <div class="">
                                <label class="form-label" for="long_description_display">Description</label>
                                <textarea class="form-control" id="long_description_display" rows="3" maxlength="255" wrap="soft" tabindex="10" onblur="updateLongDescription(this)"><?php echo $data['long_description']; ?></textarea>

                            </div>
                        </div>
                        <!-- ****** (CLOSE DESCRIPTION) ******  -->
                    </div>

                    <div class="row mt-4 p-0">
                        <!-- ****** (REFERENCE PRICES) ******  -->
                        <div class="col-12 text-center">
                            <div class="row text-secondary">
                                <div class="col-12">
                                    Reference Prices
                                </div>
                            </div>

                            <?php if ($refPricesVisible) : ?>
                                <div class="row text-secondary p-0">
                                    <div class="col-12">
                                        <div class="no-line-break small me-1 pe-1 border-end">
                                            M<br /><?php echo "$" . $data['ref_mint']; ?></div>
                                        <div class="no-line-break small me-1 pe-1 border-end">
                                            NM<br /><?php echo "$" . $data['ref_nearmint']; ?></div>
                                        <div class="no-line-break small me-1 pe-1 border-end">
                                            EX<br /><?php echo "$" . $data['ref_excellent']; ?></div>
                                        <div class="no-line-break small me-1 pe-1 border-end">
                                            VG<br /><?php echo "$" . $data['ref_verygood']; ?></div>
                                        <div class="no-line-break small me-1 pe-1 border-end">
                                            AV<br /><?php echo "$" . $data['ref_average']; ?></div>
                                        <div class="no-line-break small me-1 pe-1 border-end">
                                            F<br /><?php echo "$" . $data['ref_fair']; ?></div>
                                        <div class="no-line-break small ">P<br /><?php echo "$" . $data['ref_poor']; ?>
                                        </div>
                                    </div>
                                </div>

                            <?php else : ?>
                                <div class="row text-secondary text-start">
                                    <div class="col">
                                        <p>no reference prices at this time</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- ****** (CLOSE REFERENCE PRICES) ******  -->
                    </div>
                </fieldset>
            </div>
        </div>


        <div class="form-outline">
            <textarea class="form-control" id="nce_note" name="nce_note" rows="1" maxlength="255" wrap="soft" tabindex="11"><?php echo $data['nce_note']; ?></textarea>
            <label class="form-label" for="nce_note">NCE Note</label>
        </div>
    </div>
    <!-- <button type="submit" id="enter_button" class="btn btn-primary m-3" autofocus>Add to Trade</button> -->
    <!-- makeUIButton($this_name, $this_class, $this_target = '', $this_function = '', $this_state = '', $this_id = '') -->
    <?php //makeUIButton("Add to Trade", " btn-primary m-3", ""), "", ; 
    ?>
    <div class="my-3"></div>
    <span class="mx-2"></span>
    <input type="button" class="btn btn-success" value="Add to Trade" onclick="confirmTradeItem();" id="submit_to_trade_sheet_btn" tabindex="12">
    <span class="mx-5"></span>
    <input type="button" class="btn btn-primary" value="Reset Search" onclick="pageload(<?php echo URLROOT . '/trades/new_lut_search' ?>);" id="submit_to_trade_sheet_btn" tabindex="-1">

    <?php //makeUIButton("Search Again", " btn-primary", "/trades/new_lut_search", "", "", ""); 
    ?>
    <?php //makeUIButton("Create New Trade Item", "btn btn-success m-3 ms-5", "/trades/trade_item_new", "", "", ""); 
    ?>



</form>


<!-- ****** (CURRENT STOCK LOOKUP) ******  -->
<?php //include APPROOT . '/views/inc/stock_table_lu.php'; 
?>



<script>
    const input01 = document.getElementById("cosmetic_condition_dropdown");
    input01.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("optical_condition_dropdown").focus();
        }
    });

    const input02 = document.getElementById("optical_condition_dropdown");
    input02.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("mechanical_condition_dropdown").focus();
        }
    });

    const input03 = document.getElementById("mechanical_condition_dropdown");
    input03.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            if (document.getElementById("base_price_field").disabled) {
                document.getElementById("retail_price_override").focus();
            } else {
                document.getElementById("check_ebay").focus();
            }
        }
    });

    const input04 = document.getElementById("check_ebay");
    input04.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            if (document.getElementById("base_price_field").disabled) {
                document.getElementById("retail_price_override").focus();
            } else {
                document.getElementById("base_price_field").focus();
            }
        }
    });

    const input05 = document.getElementById("base_price_field");
    input05.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("retail_price_override").focus();
        }
    });

    const input06 = document.getElementById("retail_price_override");
    input06.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("trade_price_override").focus();
        }
    });

    const input07 = document.getElementById("trade_price_override");
    input07.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("purchase_price_override").focus();
        }
    });

    const input08 = document.getElementById("purchase_price_override");
    input08.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("serial_num_entry").focus();
        }
    });

    const input09 = document.getElementById("serial_num_entry");
    input09.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("long_description_display").focus();
        }
    });

    // const input10 = document.getElementById("long_description_display");
    // input10.addEventListener("keypress", function(event) {
    //     if (event.key === "Enter") {
    //         event.preventDefault();
    //         document.getElementById("nce_note").focus();
    //     }
    // });

    // const input11 = document.getElementById("nce_note");
    // input11.addEventListener("keypress", function(event) {
    //     if (event.key === "Enter") {
    //         event.preventDefault();
    //         document.getElementById("submit_to_trade_sheet_btn").focus();
    //     }
    // });
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>