<?php require APPROOT . '/views/inc/header.php'; ?>
<?php
// if (DEBUG) {
//     echo "<br>";
//     echo "POST: ";
//     echo "<br>";
//     print_r($_POST);
//     echo "<br>";
// }

$has_cosmetic = false;
$has_optical = false;
$has_mechanical = false;

//has_cosmetics] => 1 [has_opticals] => 1 [has_mechanicals

if ($_POST['has_cosmetics'] == '1') {
    $has_cosmetic = true;
}
if ($_POST['has_opticals'] == '1') {
    $has_optical = true;
}
if ($_POST['has_mechanicals'] == '1') {
    $has_mechanical = true;
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-12 ms-0">
            <h2>Trade Sheet</h2>
            <p>trade sheet id: <?php echo $_SESSION['trade_sheet_id'] . ", item count: " . count($data); ?> </p>

            <div class="row mb-5">
                <div class="col-4">
                    <div class="row">
                        <div id="customer_data" name="customer_data" class="col d-flex align-self-end">
                            <p class="mb-0">for:<br>
                                <?php

                                echo $_SESSION['customer_name'] . "<br>";

                                if ($_SESSION['customer_phone'] != '') {
                                    echo kbm_phone_num_format($_SESSION['customer_phone']) . "<br>";
                                } else {
                                    echo 'missing phone number<br>';
                                }
                                if ($_SESSION['customer_email'] != '') {
                                    echo $_SESSION['customer_email'] . "<br>";
                                } else {
                                    echo 'missing email<br>';
                                }
                                if ($_SESSION['customer_address_1'] != '') {
                                    echo $_SESSION['customer_address_1'] . "<br>";
                                } else {
                                    echo "missing address<br>";
                                }
                                if ($_SESSION['customer_address_2'] != '') {
                                    echo $_SESSION['customer_address_2'] . "<br>";
                                }
                                if ($_SESSION['customer_city'] != '') {
                                    echo $_SESSION['customer_city'] . ", ";
                                }
                                if ($_SESSION['customer_state'] != '') {
                                    echo $_SESSION['customer_state'] . "  ";
                                }
                                if ($_SESSION['customer_zip_code'] != '') {
                                    echo $_SESSION['customer_zip_code'];
                                }

                                ?>
                            </p>
                        </div>
                        <div class="col d-flex align-self-end">
                            <form id="edit_customer_form" action="<?php echo URLROOT . '/customers/edit/' . $_SESSION['customer_id'] ?>" method="post" target="_blank">
                                <input type="submit" class="btn btn-very-small btn-success text-light" value="Edit Customer Data">
                            </form>
                        </div>
                    </div>

                </div> <!-- col -->
                <div class="col-4">
                    <div class="mb-5">
                        <!-- <p id="transaction_calulation_label" class="mb-0 visually-hidden">Calculated Transaction</p> -->
                        <p id="transaction_total_display_field"></p>
                    </div>
                </div> <!-- col -->
                <div class="col-4">
                    <form>
                        <p>Transaction Type</p>
                        <div>
                            <span class="mx-2">
                                <input type="radio" class="btn-check" onclick="updateTradeTotalDisplay(this.id);" name="transaction_type" id="quote_transaction" autocomplete="off" />
                                <label id="quote_transaction_label" class="btn bg-secondary bg-opacity-25 text-secondary border border-1 border-secondary" for="quote_transaction">Quote</label>
                            </span class="mx-2">
                            <span class="mx-2">
                                <input type="radio" class="btn-check" onclick="updateTradeTotalDisplay(this.id);" name="transaction_type" id="trade_transaction" autocomplete="off" />
                                <label id="trade_transaction_label" class="btn bg-warning bg-opacity-25 text-warning border border-1 border-warning" for="trade_transaction">Trade</label>
                            </span class="mx-2">
                            <span class="mx-2">
                                <input type="radio" class="btn-check" onclick="updateTradeTotalDisplay(this.id);" name="transaction_type" id="purchase_transaction" autocomplete="off" />
                                <label id="purchase_transaction_label" class="btn bg-success bg-opacity-25 text-success border border-1 border-success" for="purchase_transaction">Purchase</label>
                            </span class="mx-2">
                        </div>
                    </form>
                </div> <!-- col -->
            </div> <!-- row -->
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row d-flex">
        <div class="col flex-grow-1">
            <table class="table table-striped table-sm trade-sheet-table">
                <thead>
                    <tr>
                        <th class="border-start"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="border border-bottom-0 align-bottom pb-0" colspan=3 style="text-align: center;">
                            Condition</th>
                        <th class="border border-bottom-0 align-bottom pb-0">Retail</th>
                        <th class="border border-bottom-0 align-bottom pb-0">Trade</th>
                        <th class="border border-bottom-0 align-bottom pb-0">Purchase</th>
                        <th class="border border-bottom-0 border-end-0"></th>
                        <th class="border border-bottom-0 border-start-0"></th>
                    </tr>
                    <tr>
                        <th class="border">ID</th>
                        <th class="border">Name</th>
                        <th class="border">Serial</th>
                        <th class="border">VSN</th>
                        <th class="border-top-0 border-start">Cosmetic</th>
                        <th class="border-top-0">Optical</th>
                        <th class="border-top-0 border-end">Mechanical</th>
                        <th class="border border-top-0">Price</th>
                        <th class="border border-top-0" id="trade-line-label">Offer</th>
                        <th class="border border-top-0" id="purchase-line-label">Offer</th>
                        <th class="border border-top-0 border-end-0"></th>
                        <th class="border border-top-0 border-start-0"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $line) : ?>
                        <tr class="table-bordered">
                            <td>
                                <?php echo str_pad((int)$line->trade_item_id, strlen((int)$line->trade_item_id) + 1, "0", STR_PAD_LEFT); ?>
                            </td>
                            <td><?php echo $line->item_title; ?></td>
                            <td><?php echo $line->serial_num; ?></td>
                            <td><?php echo $line->vsn; ?></td>
                            <td style="text-align: center;">
                                <?php
                                if ($line->has_cosmetics == 1) {
                                    echo $line->cosmetic_condition;
                                } else {
                                    echo "n/a";
                                } ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                if ($line->has_opticals == 1) {
                                    echo $line->optical_condition;
                                } else {
                                    echo "n/a";
                                } ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                if ($line->has_mechanicals == 1) {
                                    echo $line->mechanical_condition;
                                } else {
                                    echo "n/a";
                                } ?>
                            </td>

                            <td class="retail-line-item text-end pe-3">
                                <?php echo  "$" . number_format($line->retail_price, 2, ".", ","); ?>
                            </td>

                            <td class="trade-line-item text-end pe-3">
                                <?php echo  "$" . number_format($line->trade_price, 2, ".", ","); ?>
                            </td>

                            <td class="purchase-line-item text-end pe-3">
                                <?php echo  "$" . number_format($line->purchase_price, 2, ".", ","); ?>
                            </td>

                            <td><a class="btn btn-very-small btn-info text-light" onclick="notYetAlert()">Edit&nbsp;Item</a>
                            </td>
                            <td><a class="btn btn-very-small btn-danger text-light" onclick="notYetAlert()">Remove&nbsp;Item</a>
                            </td>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
                <tfoot class="totals-row border-top border-bottom border-secondary border-2">
                    <tr>
                        <!-- <th>Totals</th> -->
                        <!-- <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th> -->
                        <th colspan="10" class="totals-entry">
                            <span class="totals-label me-4">Totals</span>
                            <span id="retail_total_set" class="bg-primary bg-opacity-25 px-3 py-2 me-4">
                                <span class="me-1">Retail:</span>
                                <span class="me-1" id="retail_total" name="retail_total">0</span>
                            </span>
                            <span id="trade_total_set" class="bg-warning bg-opacity-25 px-3 py-2 me-4">
                                <span class="me-1">Trade:</span>
                                <span class="me-1" id="trade_total" name="trade_total">0</span>
                            </span>
                            <span id="purchase_total_set" class="bg-success bg-opacity-25 px-3 py-2 me-0">
                                <span class="me-1">Purchase:</span>
                                <span class="me-1" id="purchase_total" name="purchase_total">0</span>
                            </span>
                        </th>
                        <th colspan="2"></th>
                        <!-- <th class="retail-line-label">Retail:</th>
                        <th class="retail-line-entry" id="retail_total">0</th>
                        <th class="trade-line-label">Trade:</th>
                        <th class="trade-line-entry" id="trade_total">0</th>
                        <th class="purchase-line-label">Purchase:</th>
                        <th class="purchase-line-entry" id="purchase_total">0</th> -->
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <form id="print_data" action="<?php echo URLROOT; ?>/trades/print" method="post" target="_blank">
        <input type="hidden" id="print_type" name="print_type" value="">
        <input type="hidden" id="transaction_flag" name="transaction_flag" value="">
        <input type="hidden" id="retail_total_calc" name="retail_total_calc" value="">
        <input type="hidden" id="trade_total_calc" name="trade_total_calc" value="">
        <input type="hidden" id="purchase_total_calc" name="purchase_total_calc" value="">
        <input type="hidden" id="transaction_total_calc" name="transaction_total_calc" value="">
    </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 ms-0">
            <input type="button" class="btn btn-primary text-light" value="Add Another Item" onclick="document.getElementById('add_another_trade_item').submit();">
            <!-- <a class="btn btn-primary text-light" onclick="addTradeItemBtn();" tabindex="0">Add Another Item</a> -->
            <span class="mx-2"></span>
            <input type="button" class="btn btn-warning text-light" value="Save Trade" onclick="document.getElementById('save_trade_sheet').submit();">
            <?php //makeUIButton("Save Trade", "btn-warning text-light", "/trades/start", "", ""); 
            ?>
            <span class="mx-2"></span>
            <!-- <a class="btn btn-warning text-light ms-3" onclick="startNewTradeSheet();">Save Trade</a> -->

            <span class="mx-5"></span>
            <input type="button" class="btn btn-success text-light" value="Print for Customer" onclick="printTradeForCustomer();">
            <!-- <a class="btn btn-success text-light" onclick="printTradeForCustomer();">Print for Customer</a> -->

            <span class="mx-2"></span>
            <input type="button" class="btn btn-success text-light" value="Print for Store Use" onclick="printTradeForStore();">
            <!-- <a class="btn btn-success text-light" onclick="printTradeForStore();">Print for Store Use</a> -->
        </div>
        <div id="qr_code"></div>
    </div>
</div>
<form id="save_trade_sheet" action="<?php echo URLROOT; ?>/trades/start" method="post" target="_self"></form>
<form id="add_another_trade_item" action="<?php echo URLROOT; ?>/trades/continue" method="post" target="_self"></form>
<form id="start_new_trade_sheet" action="<?php echo URLROOT; ?>/trades/continue" method="post" target="_self"></form>
<form id="view_trade_sheets_list" action="<?php echo URLROOT; ?>/trades/list_trade_sheets" method="post" target="_self">
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>