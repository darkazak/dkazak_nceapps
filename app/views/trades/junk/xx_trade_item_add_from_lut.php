<?php require APPROOT . '/views/inc/header.php'; ?>

<?php


$refPricesVisible = (($data['ref_mint'] != 0) || ($data['ref_nearmint'] != 0) || ($data['ref_excellent'] != 0) || ($data['ref_verygood'] != 0)) ? true : false;

$attributes_object = json_decode($data['attributes']);
?>

<p class="h2 mb-1 text-secondary">Trade Worksheet</p>
<p class="h5 mb-3 text-secondary"> for
    <?php echo $_SESSION['customer_name'] . " - " . $_SESSION['customer_phone'] . " - " . $_SESSION['customer_email']; ?>
</p>

<hr>
<div class="h2 mb-3">Add Trade Item From Loook Up Table</div>

<form id="confirm_trade_item" action="<?php echo URLROOT; ?>/trades/addTradeItemToSheet" method="post">
    <div style="font-size: 10pt;"><kbd>form start code</kbd></div>
    <div id="hidden data fields">
        <input type="hidden" id="item_title" name="item_title" value="<?php echo $data['item_title']; ?>">
        <input type="hidden" id="trade_lu_id" name="lut_id" value="<?php echo $data['trade_lu_id']; ?>">
        <input type="hidden" id="vsn" name="vsn" value="<?php echo $data['vsn']; ?>">
        <input type="hidden" id="minor" name="minor" value="<?php echo $data['minor']; ?>">
        <input type="hidden" id="family" name="family" value="<?php echo $data['family']; ?>">
        <input type="hidden" id="trade_sheet_id" name="trade_sheet_id" value="<?php echo $data['trade_sheet_id']; ?>">

        <!-- array data sets -->
        <input type="hidden" name="categories" value="<?php echo $data['categories']; ?>">
        <input type="hidden" name="attributes" value="<?php echo $data['attributes']; ?>">

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

        <!-- the condition dropdown selection texts -->
        <input type="hidden" id="cosmetic_condition_selected_text" name="cosmetic_condition_selected_text" value="<?php echo $data['cosmetic_condition_selected_text']; ?>">
        <input type="hidden" id="optical_condition_selected_text" name="optical_condition_selected_text" value="<?php echo $data['optical_condition_selected_text']; ?>">
        <input type="hidden" id="mechanical_condition_selected_text" name="mechanical_condition_selected_text" value="<?php echo $data['mechanical_condition_selected_text']; ?>">
        <!-- The condition dropdown menu selection values -->
        <input type="hidden" id="cosmetic_condition_selected_value" name="cosmetic_condition_selected_value" value="<?php echo $data['cosmetic_condition_selected_value']; ?>">
        <input type="hidden" id="optical_condition_selected_value" name="optical_condition_selected_value" value="<?php echo $data['optical_condition_selected_value']; ?>">
        <input type="hidden" id="mechanical_condition_selected_value" name="mechanical_condition_selected_value" value="<?php echo $data['mechanical_condition_selected_value']; ?>">
        <!-- the condition tuner/tweaker numbers -->
        <!-- <input type="hidden" id="cosmetic_tune_val" name="cosmetic_tune_val" value="<?php //echo $data['cosmetic_condition_tuner']; 
                                                                                            ?>">
        <input type="hidden" id="optical_tune_val" name="optical_tune_val" value="<?php //echo $data['optical_condition_tuner']; 
                                                                                    ?>">
        <input type="hidden" id="mechanical_tune_val" name="mechanical_tune_val" value="<?php //echo $data['mechanical_condition_tuner']; 
                                                                                        ?>"> -->
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





        const cosmetic_condition = getFormFieldValue("cosmetic_condition");
        const optical_condition = getFormFieldValue("optical_condition");
        const mechanical_condition = getFormFieldValue("mechanical_condition");
        const retail_price = getFormFieldValue("retail_price");
        const trade_price = getFormFieldValue("trade_price");
        const purchase_price = getFormFieldValue("purchase_price");



    </div>
    <div class="h3">
        <span class="text-primary"><?php echo $data['medium_description']; ?> </span>
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
                                            <a id="optical_condition_false_btn" href="#" class="btn btn-sm btn-secondary visually-hidden med-btn-width" onclick="switchOpticalConditionSelector(true)">Add&nbsp;Optical</a>
                                            <a id="optical_condition_true_btn" href="#" class="btn btn-sm btn-warning med-btn-width" onclick="switchOpticalConditionSelector(false)">Remove&nbsp;Optical</a>
                                        <?php else : ?>
                                            <a id="optical_condition_false_btn" href="#" class="btn btn-sm btn-secondary med-btn-width" onclick="switchOpticalConditionSelector(true)">Add&nbsp;Optical</a>
                                            <a id="optical_condition_true_btn" href="#" class="btn btn-sm btn-warning visually-hidden med-btn-width" onclick="switchOpticalConditionSelector(false)">Remove&nbsp;Optical</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 px-0 mx-0">
                                        <?php if ($data['has_mechanicals'] == 1) : ?>
                                            <a id="mechanical_condition_true_btn" href="#" class="btn btn-sm btn-warning med-btn-width" onclick="switchMechanicalConditionSelector(false)">Remove&nbsp;Mechanical</a>
                                            <a id="mechanical_condition_false_btn" href="#" class="btn btn-sm btn-secondary visually-hidden med-btn-width" onclick="switchMechanicalConditionSelector(true)">Add&nbsp;Mechanical</a>
                                        <?php else : ?>
                                            <a id="mechanical_condition_true_btn" href="#" class="btn btn-sm btn-warning visually-hidden med-btn-width" onclick="switchMechanicalConditionSelector(false)">Remove&nbsp;Mechanical</a>
                                            <a id="mechanical_condition_false_btn" href="#" class="btn btn-sm btn-secondary med-btn-width" onclick="switchMechanicalConditionSelector(true)">Add&nbsp;Mechanical</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row  px-0 mx-0">
                                    <div id="cosmetic_condition_dropdown_set" class="form-floating">
                                        <select id="cosmetic_condition_dropdown" name="cosmetic_condition_dropdown" class="<?php echo (in_array("missing_cosmetic_condition", $_SESSION['error_list'])) ?  ("form-select mb-3 border border-danger bg-danger bg-opacity-10") : ("form-select mb-3"); ?>" onchange="selectCondition(this.id)" tabindex="0">
                                            <option value="unset" <?php if ($data['cosmetic_condition_selected_text'] == "Select One") : ?> selected <?php endif; ?>>Select One</option>
                                            <option value="<?php echo $data['condition_cosmetic_mint']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Mint") : ?> selected <?php endif; ?>>Mint</option>
                                            <option value="<?php echo $data['condition_cosmetic_nearmint']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Near Mint") : ?> selected <?php endif; ?>>Near Mint</option>
                                            <option value="<?php echo $data['condition_cosmetic_excellent']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Excellent") : ?> selected <?php endif; ?>>Excellent</option>
                                            <option value="<?php echo $data['condition_cosmetic_verygood']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Very Good") : ?> selected <?php endif; ?>>Very Good</option>
                                            <option value="<?php echo $data['condition_cosmetic_average']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Average") : ?> selected <?php endif; ?>>Average</option>
                                            <option value="<?php echo $data['condition_cosmetic_fair']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Fair") : ?> selected <?php endif; ?>>Fair</option>
                                            <option value="<?php echo $data['condition_cosmetic_poor']; ?>" <?php if ($data['cosmetic_condition_selected_text'] == "Poor") : ?> selected <?php endif; ?>>Poor</option>
                                        </select>
                                        <label for="cosmetic_condition_dropdown">Cosmetic Condition</label>
                                    </div>
                                    <div id="optical_condition_dropdown_set" class="form-floating ">
                                        <select id="optical_condition_dropdown" name="optical_condition_dropdown" class="form-select mb-3" onchange="selectCondition(this.id)" tabindex="0">
                                            <option value="unset" <?php if ($data['optical_condition_selected_text'] == "Select One") : ?> selected <?php endif; ?>>Select One</option>
                                            <option value="<?php echo $data['condition_optical_mint']; ?>" <?php if ($data['optical_condition_selected_text'] == "Mint") : ?> selected <?php endif; ?>>Mint</option>
                                            <option value="<?php echo $data['condition_optical_nearmint']; ?>" <?php if ($data['optical_condition_selected_text'] == "Near Mint") : ?> selected <?php endif; ?>>Near Mint</option>
                                            <option value="<?php echo $data['condition_optical_excellent']; ?>" <?php if ($data['optical_condition_selected_text'] == "Excellent") : ?> selected <?php endif; ?>>Excellent</option>
                                            <option value="<?php echo $data['condition_optical_verygood']; ?>" <?php if ($data['optical_condition_selected_text'] == "Very Good") : ?> selected <?php endif; ?>>Very Good</option>
                                            <option value="<?php echo $data['condition_optical_average']; ?>" <?php if ($data['optical_condition_selected_text'] == "Average") : ?> selected <?php endif; ?>>Average</option>
                                            <option value="<?php echo $data['condition_optical_fair']; ?>" <?php if ($data['optical_condition_selected_text'] == "Fair") : ?> selected <?php endif; ?>>Fair</option>
                                            <option value="<?php echo $data['condition_optical_poor']; ?>" <?php if ($data['optical_condition_selected_text'] == "Poor") : ?> selected <?php endif; ?>>Poor</option>
                                        </select>
                                        <label for="optical_condition_dropdown">Optical Condition</label>
                                    </div>
                                    <div id="mechanical_condition_dropdown_set" class="form-floating">
                                        <select id="mechanical_condition_dropdown" name="mechanical_condition_dropdown" class="form-select mb-3" onchange="selectCondition(this.id)" tabindex="0">
                                            <option value="unset" id="unset" <?php if ($data['mechanical_condition_selected_text'] == "Select One") : ?> selected <?php endif; ?>>Select One</option>
                                            <option value="<?php echo $data['condition_mechanical_operational']; ?>" id="operational" <?php if ($data['mechanical_condition_selected_text'] == "Operational") : ?> selected <?php endif; ?>>Operational</option>
                                            <option value="<?php echo $data['condition_mechanical_minordefect']; ?>" id="minor_defect" <?php if ($data['mechanical_condition_selected_text'] == "Minor") : ?> selected <?php endif; ?>>Minor Defect</option>
                                            <option value="<?php echo $data['condition_mechanical_majordefect']; ?>" id="major_defect" <?php if ($data['mechanical_condition_selected_text'] == "Major") : ?> selected <?php endif; ?>>Major Defect</option>
                                            <option value="<?php echo $data['condition_mechanical_parts']; ?>" id="parts_only" <?php if ($data['mechanical_condition_selected_text'] == "Parts Only") : ?> selected <?php endif; ?>>Parts Only</option>
                                        </select>
                                        <label for="mechanical_condition_dropdown">Mechanical Condition</label>
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
                                <input class="form-check-input" type="checkbox" value="" id="checked_battery" tabindex="-1">
                                <label class="form-check-label" for="checked_battery">
                                    Battery Compartment
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checked_mechanics" tabindex="-1">
                                <label class="form-check-label" for="checked_mechanics">
                                    Checked Mechanics
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checked_scratches" tabindex="-1">
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
                                            <input id="base_price_field" class="form-control" type="text" placeholder="" value="" onblur="processManualBaseTradePurchaseEntry()" />
                                        <?php else : ?>
                                            <input id="base_price_field" class="form-control" type="text" placeholder="" tabindex="-1" disabled value="<?php echo $data['base_price']; ?>" onblur="processManualBaseEntry()" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3">
                                        <p class="m-0 p-0">Trade Percent</p>
                                        <?php if ($data['trade_percent'] == 0) : ?>
                                            <input id="trade_percent_field" class="form-control" type="text" placeholder="" value="" onblur="processManualBaseTradePurchaseEntry()" />
                                        <?php else : ?>
                                            <input id="trade_percent_field" class="form-control" type="text" placeholder="" tabindex="-1" disabled value="<?php echo $data['trade_percent']; ?>" onblur="processManualTradeEntry()" />
                                        <?php endif; ?>

                                    </div>
                                    <div>
                                        <p class="m-0 p-0">Purchase Percent</p>
                                        <?php if ($data['purchase_percent'] == 0) : ?>
                                            <input id="purchase_percent_field" class="form-control" type="text" placeholder="" value="" onblur="processManualBaseTradePurchaseEntry()" />
                                        <?php else : ?>
                                            <input id="purchase_percent_field" class="form-control" type="text" placeholder="" tabindex="-1" disabled value="<?php echo $data['purchase_percent']; ?>" onblur="processManualPurchaseEntry()" />
                                        <?php endif; ?>
                                    </div>
                                </fieldset>
                            </div>
                            <div class=" col-4">
                                <p class="text-secondary">Calculated</p>
                                <fieldset id="calculations">
                                    <p class="m-0 p-0 text-secondary">Retail</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="retail_calc" class="form-control border-success bg-success bg-opacity-25" type="text" placeholder="" disabled tabindex="-1">
                                        <label id="retail_calc_label" class="form-label text-success text-opacity-75" for="retail_calc">need data</label>
                                    </div>
                                    <p class="m-0 p-0 text-secondary">Trade</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="trade_calc" type="text" class="form-control border-warning bg-warning bg-opacity-25" placeholder="" disabled tabindex="-1">
                                        <label id="trade_calc_label" class="form-label text-warning text-opacity-75" for="trade_calc">need data</label>
                                    </div>
                                    <p class="m-0 p-0 text-secondary">Purchase</p>
                                    <div class="form-outline m-0 p-0 mb-3">
                                        <input id="purchase_calc" type="text" class="form-control border-primary bg-primary bg-opacity-25" placeholder="" disabled tabindex="-1">
                                        <label id="purchase_calc_label" class="form-label text-primary text-opacity-75" for="purchase_calc">need data</label>
                                    </div>

                                </fieldset>
                            </div>
                            <div class="col-4">
                                <p>Final</p>
                                <fieldset id="overrides">

                                    <!-- 'retail_price' => kbm_launder_currency($_POST['retail_price_override']),
                                    'trade_price' => kbm_launder_currency($_POST['trade_price_override']),
                                    'purchase_price' => kbm_launder_currency($_POST['purchase_price_override']), -->


                                    <div class="<?php
                                                echo (in_array("missing_retail_price", $_SESSION['error_list'])) ? ("border border-3 border-danger px-2 mb-1") : ("");
                                                ?>">
                                        <p class="m-0 p-0">Retail</p>
                                        <div class="form-outline m-0 p-0 mb-3">
                                            <input id="retail_price_override" name="retail_price_override" type="text" value="<?php echo (in_array("missing_retail_price", $_SESSION['error_list'])) ?  ('') : ($_POST['retail_price_override']); ?>" class="form-control <?php echo (in_array("missing_retail_price", $_SESSION['error_list'])) ?  ("border-danger bg-danger") : ("border-success bg-success"); ?> bg-opacity-10 text-dark" onblur="formatTradePricesToCurrency(this.id, this.value)">
                                        </div>
                                    </div>
                                    <div class="<?php
                                                echo (in_array("missing_trade_price", $_SESSION['error_list'])) ? ("border border-3 border-danger px-2 mb-1") : ("");
                                                ?>">
                                        <p class="m-0 p-0">Trade</p>
                                        <div class="form-outline m-0 p-0 mb-3">
                                            <input id="trade_price_override" name="trade_price_override" type="text" value="<?php echo (in_array("missing_trade_price", $_SESSION['error_list'])) ?  ('') : ($_POST['trade_price_override']); ?>" class="form-control  <?php echo (in_array("missing_trade_price", $_SESSION['error_list'])) ?  ("border-danger bg-danger") : ("border-warning bg-warning"); ?>  bg-opacity-10 text-dark" onblur="formatTradePricesToCurrency(this.id, this.value)">
                                        </div>
                                    </div>
                                    <div class="<?php
                                                echo (in_array("missing_purchase_price", $_SESSION['error_list'])) ? ("border border-3 border-danger px-2 mb-1") : ("");
                                                ?>">
                                        <p class="m-0 p-0">Purchase</p>
                                        <div class="form-outline m-0 p-0 mb-3">
                                            <input id="purchase_price_override" name="purchase_price_override" type="text" value="<?php echo (in_array("missing_purchase_price", $_SESSION['error_list'])) ?  ('') : ($_POST['purchase_price_override']); ?>" class="form-control  <?php echo (in_array("missing_purchase_price", $_SESSION['error_list'])) ?  ("border-danger bg-danger") : ("border-primary bg-primary"); ?>  bg-opacity-10 text-dark" onblur="formatTradePricesToCurrency(this.id, this.value)">
                                        </div>
                                    </div>

                                </fieldset>
                                <div class="my-5">
                                    <?php $item_title = $data['item_title'] ?>
                                    <input type="button" class="btn btn-info" value="Check Ebay" onclick="checkEbay('<?php echo $item_title; ?>')" id="check_ebay">
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
                    if (in_array("missing_serial_number", $_SESSION['error_list'])) {
                        echo '<div class="row border border-3 border-danger pt-3">';
                    } else {
                        echo '<div class="row">';
                    }
                    ?>
                    <!-- ****** (SERIAL NUM) ******  -->
                    <div class="col-7">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="serial_num" name="serial_num" placeholder="">
                            <label id="serial_num_label" for="serial_num">Serial Number</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-check form-switch">
                            <input class="form-check-input" onclick="setSerialNumToNone();" type="checkbox" role="switch" id="no_serial_num_switch" tabindex="-1" />
                            <label class="form-check-label small" for="no_serial_num_switch">No Serial Number</label>
                        </div>
                    </div>
                    <!-- ****** (CLOSE SERIAL NUM) ******  -->
            </div>
            <div class="row mb-3">
                <!-- ****** (DESCRIPTION) ******  -->
                <div class="col-12">
                    <div class="">
                        <label class="form-label" for="long_description_display">Description</label>
                        <textarea class="form-control" id="long_description_display" rows="3" maxlength="255" wrap="soft" onblur="updateLongDescription(this.text);"><?php echo $data['long_description']; ?></textarea>

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
                                <div class="no-line-break small ">P<br /><?php echo "$" . $data['ref_poor']; ?></div>
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
        <textarea class="form-control" id="nce_note" name="nce_note" rows="3" maxlength="255" wrap="soft"><?php echo $data['nce_note']; ?></textarea>
        <label class="form-label" for="nce_note">NCE Note</label>
    </div>
    </div>
    <!-- <button type="submit" id="enter_button" class="btn btn-primary m-3" autofocus>Add to Trade</button> -->
    <!-- makeUIButton($this_name, $this_class, $this_target = '', $this_function = '', $this_state = '', $this_id = '') -->
    <?php //makeUIButton("Add to Trade", " btn-primary m-3", ""), "", ; 
    ?>

    <input type="button" class="btn btn-primary m-3" value="Add to Trade" onclick="confirmTradeItem();" id="submit_to_trade_sheet_btn">

    <?php makeUIButton("Search Again", " btn-info m-3 ms-5", "/trades/new_lut_search", "", "", ""); ?>
    <?php //makeUIButton("Create New Trade Item", "btn btn-success m-3 ms-5", "/trades/trade_item_new", "", "", ""); 
    ?>



</form>


<!-- ****** (CURRENT STOCK LOOKUP) ******  -->
<?php //include APPROOT . '/views/inc/stock_table_lu.php'; 
?>


<?php require APPROOT . '/views/inc/footer.php'; ?>