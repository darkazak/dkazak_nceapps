<?php require APPROOT . '/helpers/qrcode_helper.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Trade Sheet</title>
    <style>
        body {
            width: 8.5in;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;

        }

        #header_table {
            width: 8in;
            margin-left: .25in;
            margin-right: .25in;
        }

        #header_table th {
            width: 2.6in;
            font: bold 12px/20px Ariel, sans-serif;
            text-transform: uppercase;
        }

        #header_table td {
            border-left: 1px solid black;
            border-collapse: collapse;
            vertical-align: top;
            padding-left: .25in;
            padding-right: .25in;
        }

        #header_table td:first-child {
            border: none;
        }

        #data_table {
            border-collapse: collapse;
            width: 8in;
            margin-left: .25in;
            margin-right: .25in;
        }

        #data_table th {
            border-bottom: 1px solid black;
            border-collapse: collapse;
            text-transform: uppercase;
            font: bold 12px/12px Ariel, sans-serif;
            padding-top: 10px;
            padding-bottom: 5px;
        }

        #data_table td {
            font: 14px/16px Ariel, sans-serif;
            border-bottom: 1px solid black;
            border-collapse: collapse;
        }

        #data_table td:nth-child(odd) {
            background-color: #EEEEEE;
        }

        .center {
            text-align: center;
        }

        .fill {
            width: 100%;
        }

        .sideways {
            writing-mode: vertical-rl;
            padding-left: 12px;
            padding-right: 12px;
        }

        .alert {
            text-transform: uppercase;
            font-weight: bold;
            font-family: Ariel, sans-serif;
            padding-top: 10px;
            padding-bottom: 5px;
        }

        .reverse {
            color: #fff;
            background-color: #000;
        }

        .hidden {
            /* visibility: hidden; */
            display: none;
        }

        .padded {
            padding-left: 5px;
            padding-top: 3px;
            padding-right: 5px;
            padding-bottom: 3px;
        }

        .text_sm {
            font: 10px/12px Ariel, sans-serif !important;
        }

        #title_head {
            text-align: center;
            font: bold 16px/30px Ariel, sans-serif;
            padding-top: 12px;
            padding-bottom: 6px;
        }

        #control_btns {
            text-align: right;
        }

        button {
            margin: .25in;
        }

        @media print {
            button {
                display: none;
            }

        }
    </style>
</head>

<?php

// echo "<br>";
// echo "session: ";
// echo "<br>";
// print_r($_SESSION);
// echo "<br>";
// echo "<br>";
// echo "Post: ";
// echo "<br>";
// print_r($_POST);
// echo "<br>";


switch ($_POST['transaction_flag']) {
    case "trade_transaction":
        $transaction_flag = "Trade";
        $price_display = "Trade Offer Total: ";
        $price_display .=  "<br>";
        $price_display .=  "$" . number_format($_POST['trade_total_calc'], 2, ".", ",");
        // $price_display .=  $_POST['trade_total_calc'];
        break;
    case "purchase_transaction":
        $transaction_flag = "Purchase";
        $price_display = "Purchase Offer Total: ";
        $price_display .=  "<br>";
        $price_display .= "$" . number_format($_POST['purchase_total_calc'], 2, ".", ",");
        break;
    default:
        $transaction_flag = "Quote";
        $price_display = "Trade Offer Total: ";
        $price_display .=  "<br>";
        $price_display .= "$" . number_format($_POST['trade_total_calc'], 2, ".", ",");
        $price_display .=  "<br>";
        $price_display .=  "<br>";
        $price_display .=  "Purchase Offer Total: ";
        $price_display .=  "<br>";
        $price_display .=  "$" . number_format($_POST['purchase_total_calc'], 2, ".", ",");
}

if ($_SESSION['date_switched']) {
    $today = $_SESSION['switched_date'];
    $date_display_class = "reverse padded";
} else {
    $today = $_SESSION['date'];
    $date_display_class = "";
}

$valid_date = date_create($today);
date_add($valid_date, date_interval_create_from_date_string("30 days"));

//$valid_date = 
if ($_POST['print_type'] == 'customer') {
    $sheet_type = "customer";
    $customer_page = true;
    $sheet_type_data = 'Trade ID: ' . $_SESSION['trade_sheet_id'];
    $sheet_type_data .= '<br><br><span class="' . $date_display_class . '">Date: ' . date_format(date_create($today), "m/d/Y") . "</span>";
    $sheet_type_data .= '<br><br><span class="' . $date_display_class . '">Valid Until: ' . date_format($valid_date, "M j, Y") . "</span>";
    $sheet_type_title = 'Customer Copy';
} else {
    $sheet_type = "store";
    $customer_page = false;
    $sheet_type_data = 'Trade ID: ' . $_SESSION['trade_sheet_id'];
    $sheet_type_data .= '<br><br>Retail Total: ' .  "$" . number_format($_POST['retail_total_calc'], 2, ".", ",");
    $sheet_type_data .= '<br><br>Employee: ' . $_SESSION['emp_name'];
    $sheet_type_data .= '<br><br><span class="' . $date_display_class . '">Date: ' . date_format(date_create($today), "m/d/Y") . "</span>";
    $sheet_type_title = 'Store Use Only';
}

$heading_label = '';
if ($customer_page) {
    $heading_label = 'for Customer';
} else {
    $heading_label = 'for Store Use Only';
}
?>

<body>
    <div id="title_head" class="<?php echo ($customer_page) ?  ('reverse') : (''); ?>">
        <h1>National Camera Exchange</h1>
        <h1>Trade Sheet <?php echo $heading_label; ?></h1>
    </div>
    <div id="control_btns">
        <?php if ($customer_page) : ?>
            <button onclick="copyToClip(document.getElementById('email_page').innerHTML)">Copy for Email</button>
        <?php endif; ?>
        <button onclick="window.print();">Print Sheet</button>
        <button onclick="window.close();">Close Sheet</button>
    </div>

    <table id='header_table'>
        <thead>
            <tr>
                <th>Customer</th>
                <th><?php echo $transaction_flag; ?></th>
                <th><?php echo $transaction_flag; ?>&nbsp;Data</th>
            </tr>
        </thead>
        <tr>
            <!-- CUSTOMER DATA -->
            <td>
                <?php
                if (varIsNotEmpty($_SESSION['customer_id'])) {
                    if (!$_SESSION['customer_name'] == '') {
                        $customer_name = $_SESSION['customer_name'];
                    } else {
                        $customer_name =  "missing name";
                    }
                    echo $customer_name;
                    echo '<br>';

                    if (isset($_SESSION['customer_phone'])) {
                        $customer_phone = kbm_phone_num_format($_SESSION['customer_phone']);
                    } else {
                        $customer_phone = "<i>missing phone number</i>";
                    }
                    echo $customer_phone;
                    echo '<br>';
                    if ($_SESSION['customer_email'] != '') {
                        $customer_email = strtolower($_SESSION['customer_email']);
                    } else {
                        $customer_email = "<i>missing email</i>";
                    }
                    echo $customer_email;
                    echo '<br>';

                    if ($_SESSION['customer_address_1'] != '') {
                        $customer_address_block = $_SESSION['customer_address_1'];
                    } else {
                        $customer_address_block = '<i>missing address</i>';
                    }
                    if ($_SESSION['customer_address_2'] != '') {
                        $customer_address_block .= "<br>" . $_SESSION['customer_address_2'];
                    }
                    if ($_SESSION['customer_city'] != '') {
                        $customer_address_block .= "<br>" . $_SESSION['customer_city'];
                    }
                    if ($_SESSION['customer_state'] != '') {
                        $customer_address_block .= "&comma;&nbsp;" . $_SESSION['customer_state'];
                    }
                    if ($_SESSION['customer_zip_code'] != '') {
                        $customer_address_block .= "&nbsp;&nbsp;" . $_SESSION['customer_zip_code'];
                    }
                    echo $customer_address_block;
                } else {
                    echo "anonymous customer";
                    echo '<br>';
                }
                ?>
            </td>
            <!-- PRICING DATA -->
            <td>
                <?php echo $price_display; ?>
            </td>
            <!-- TRADE DATA -->
            <td>
                <p><?php echo $sheet_type_data; ?></p>
            </td>
        </tr>
    </table>
    <br><br><br>
    <table id='data_table'>
        <thead>
            <tr>
                <th class="reverse">id</th>
                <th class="reverse">item</th>
                <th class="reverse">serial</th>

                <?php if (!$customer_page) : ?>
                    <th class="reverse">vsn</th>
                    <th class="reverse">minor</th>
                    <th class="reverse">vendor</th>
                <?php endif; ?>

                <!-- if Quote two lines - if not then one line-->
                <?php if ($transaction_flag == "Quote") : ?>
                    <!-- if quote -->
                    <th class="reverse">trade</th>
                    <th class="reverse">purchase</th>
                    <!-- if Customer one line - if store then two line  -->
                    <?php if ($customer_page) : ?>
                        <!-- quote if customer-->
                        <th class="reverse">condition</th>
                    <?php else : ?>
                        <!-- quote if store-->
                        <th class="reverse">retail</th>
                        <th class="reverse">conditon</th>
                    <?php endif; ?>
                    <!-- !quote -->
                <?php else : ?>
                    <!-- col lable is the type of transation -->
                    <th class="reverse"><?php echo $transaction_flag; ?></th>
                    <!-- !quote if customer-->
                    <?php if ($customer_page) : ?>
                        <th class="reverse">condition</th>
                        <!-- !quote if store-->
                    <?php else : ?>
                        <th class="reverse">retail</th>
                        <th class="reverse">conditon</th>
                        <th class="reverse"></th>
                    <?php endif; ?>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $line) : ?>
                <?php
                if ($customer_page) {
                    $item_field_display = $line->medium_description;
                } else {
                    $item_field_display =  $line->item_title;
                }
                // echo "<br>";
                // echo "<br>";
                // echo "Line: ";
                // echo "<br>";
                // print_r($line);
                // echo "<br>";
                // echo "<br>";

                //COSMETIC CODE
                switch ($line->cosmetic_condition) {
                    case "Mint":
                        $condition_code = "M";
                        break;
                    case "Near Mint":
                        $condition_code = "NM";
                        break;
                    case "Excellent":
                        $condition_code = "EX";
                        break;
                    case "Very Good":
                        $condition_code = "VG";
                        break;
                    case "Average":
                        $condition_code = "AVG";
                        break;
                    case "Fair":
                        $condition_code = "FAIR";
                        break;
                    case "Poor":
                        $condition_code = "POOR";
                        break;
                    default:
                        $condition_code = "";
                }
                //OPTICAL CODE
                switch ($line->optical_condition) {
                    case "Mint":
                        $condition_code .= "<br>M-O";
                        break;
                    case "Near Mint":
                        $condition_code .= "<br>NM-O";
                        break;
                    case "Excellent":
                        $condition_code .= "<br>EX-O";
                        break;
                    case "Very Good":
                        $condition_code .= "<br>VG-O";
                        break;
                    case "Average":
                        $condition_code .= "<br>AVG-O";
                        break;
                    case "Fair":
                        $condition_code .= "<br>FAIR-O";
                        break;
                    case "Poor":
                        $condition_code .= "<br>POOR-O";
                        break;
                    default:
                        $condition_code .= '';
                }
                // TRANSACTION TYPE
                switch ($transaction_flag) {
                    case "Purchase":
                        $line_item_amount = $line->purchase_price;
                        break;
                    case "Trade":
                        $line_item_amount = $line->trade_price;
                        break;
                    default:
                        $line_item_amount = '';
                }
                // Serial Number Format
                if ($line->serial_num == "no serial number") {
                    $this_serial_num = "none";
                } else {
                    $this_serial_num = $line->serial_num;
                }
                // QR CODE
                $qr_data = [
                    'minor_code' => $line->minor,
                    'item_name' => strtolower(str_replace(' ', '%20', $line->item_title)),
                    'condition_codes' =>  str_replace('<br>', '%20', $condition_code),
                    'retail_price' => $line->retail_price,
                    'offer_price' => $line_item_amount,
                    'trade_item_id' => $line->trade_item_id,
                    'serial_num' => $this_serial_num,
                    'comments01' => '',
                    'comments02' => '',
                    'family_code' => $line->vendor,
                    'venue_code' => $line->venue_id
                ];
                $thisQRCode = getQrCode($qr_data);
                ?>
                <tr>
                    <!-- id -->
                    <td class="center padded"><?php echo (int)$line->trade_item_id; ?></td>
                    <!-- item -->
                    <td class="center"><?php echo $item_field_display; ?></td>

                    <?php if (!$customer_page) : ?>

                        <?php if ($transaction_flag == "Quote") : ?>
                            <!-- serial -->
                            <td class="center"><?php echo $this_serial_num; ?></td>
                            <!-- vsn -->
                            <td class="center text_sm"><?php echo $line->vsn; ?></td>
                            <!-- minor -->
                            <td class="center text_sm"><?php echo $line->minor; ?></td>
                            <!-- vendor/family -->
                            <td class="center text_sm"><?php echo $line->vendor; ?></td>
                        <?php else : ?>
                            <!-- serial -->
                            <td class="center sideways"><?php echo $this_serial_num; ?></td>
                            <!-- vsn -->
                            <td class="center sideways"><?php echo $line->vsn; ?></td>
                            <!-- minor -->
                            <td class="center sideways"><?php echo $line->minor; ?></td>
                            <!-- vendor/family -->
                            <td class="center sideways"><?php echo $line->vendor; ?></td>
                        <?php endif; ?>

                    <?php else : ?>
                        <td class="center"><?php echo $this_serial_num; ?></td>

                    <?php endif; ?>
                    <?php if ($transaction_flag == "Quote") : ?>
                        <!-- if quote -->
                        <?php if ($customer_page) : ?>
                            <!-- quote if customer-->
                            <td class="center padded"><?php echo  "$" . number_format($line->trade_price, 2, ".", ","); ?></td>
                            <td class="center padded"><?php echo  "$" . number_format($line->purchase_price, 2, ".", ","); ?></td>
                            <td class="center text_sm"><?php echo $condition_code; ?></td>
                        <?php else : ?>
                            <!-- quote if store-->
                            <td class="center padded"><?php echo  "$" . number_format($line->trade_price, 2, ".", ","); ?></td>
                            <td class="center padded"><?php echo  "$" . number_format($line->purchase_price, 2, ".", ","); ?></td>
                            <td class="center padded"><?php echo  "$" . number_format($line->retail_price, 2, ".", ","); ?></td>
                            <td class="center text_sm"><?php echo $condition_code; ?></td>
                        <?php endif; ?>
                        <!-- if not quote -->
                    <?php else : ?>
                        <!-- not quote if customer-->
                        <?php if ($customer_page) : ?>
                            <!-- this col entry is the amount of the purchase or trade for this item -->
                            <td class="center padded"><?php echo "$" . number_format($line_item_amount, 2, ".", ","); ?></td>
                            <td class="center text_sm"><?php echo $condition_code; ?></td>
                            <!-- not quote if store-->
                        <?php else : ?>
                            <td class="center padded"><?php echo "$" . number_format($line_item_amount, 2, ".", ","); ?></td>
                            <td class="center padded"><?php echo "$" . number_format($line->retail_price, 2, ".", ","); ?></td>
                            <td class="center text_sm"><?php echo $condition_code; ?></td>
                            <td class="center"><?php echo $thisQRCode; ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    if ($transaction_flag == "Quote") {
        $transaction_display = "Provisional Quote";
        $email_total_disp = "Trade Offer Total: $" . number_format($_POST['trade_total_calc'], 2, ".", ",");
        $email_total_disp .= "<br>Purchase Offer Total: $" . number_format($_POST['purchase_total_calc'], 2, ".", ",");
    } else if ($transaction_flag == "Trade") {
        $transaction_display = "Provisional Trade Offer";
        $email_total_disp = "Trade Offer Total: $" . number_format($_POST['trade_total_calc'], 2, ".", ",");
    } else {
        $transaction_display = "Provisional Purchase Offer";
        $email_total_disp = "Purchase Offer Total: $" . number_format($_POST['purchase_total_calc'], 2, ".", ",");
    }
    ?>
    <div id="email_page" class="hidden">
        <h2>National Camera Exchange</h2>
        <h3><?php echo $transaction_display . "&nbsp;Email";
            if (varIsNotEmpty($_SESSION['customer_id'])) {
                echo "&nbsp;for&nbsp;" . $customer_name;
            } ?></h3>
        <p>Trade ID: <?php echo $_SESSION['trade_sheet_id']; ?></p>
        <h4><?php echo "Quote Date: " . date_format(date_create($today), "M j, Y"); ?> </h4>
        <h4><?php echo "Valid Until: " . date_format($valid_date, "M j, Y"); ?> </h4>
        <h4><?php echo $email_total_disp; ?></h4>
        <h3>Items List</h3>
        <?php foreach ($data as $line) : ?>
            <?php
            if ($line->optical_condition = "Select One") {
                $condition_line = "Cosmetic Cond: " . $line->cosmetic_condition;
            } else {
                $condition_line = "Cosmetic Cond: " . $line->cosmetic_condition . "<br>Optical Cond: " . $line->optical_condition;
            }
            ?>
            <!-- border-bottom: 1px solid; border-top: 1px solid -->
            <table width="75%" cellpadding="0" cellspacing="0" style="margin: 0; padding: 12px; padding-bottom: 0px; border-spacing: 0; overflow: hidden; border-bottom: 2px solid; background-color: #EEEEEE;">
                <tr>
                    <td width="40%" style="padding-bottom: 6px; border-bottom: 1px solid; padding-left: 6px; padding-right: 6px;"><b><?php echo $line->medium_description; ?></b></td>
                    <?php
                    if ($transaction_flag == "Quote") {
                        echo '<td width="30%" style="border-bottom: 1px solid; padding-bottom: 6px;">Trade Offer: $' .  number_format($line->trade_price, 2, ".", ",") . '</td>';
                        echo '<td width="30%" style="text-align:right; border-bottom: 1px solid; padding-bottom: 6px;">Purchase Offer: $' . number_format($line->purchase_price, 2, ".", ",") . '</td>';
                    } else if ($transaction_flag == "Trade") {
                        echo '<td width="30%" style="border-bottom: 1px solid; padding-bottom: 6px;">Trade Offer: $' .  number_format($line->trade_price, 2, ".", ",") . '</td>';
                        echo '<td width="30%" style="text-align:right; border-bottom: 1px solid; padding-bottom: 6px;"></td>';
                    } else {
                        echo '<td width="30%" style="border-bottom: 1px solid; padding-bottom: 6px;">Purchase Offer: $' . number_format($line->purchase_price, 2, ".", ",") . '</td>';
                        echo '<td width="30%" style="text-align:right; border-bottom: 1px solid; padding-bottom: 6px;"></td>';
                    }
                    ?>
                </tr>
                <tr>
                    <td style="padding-left: 16px; padding-top: 9px; padding-bottom: 6px;"><?php echo $condition_line; ?> </td>
                    <td style="text-align:left; padding-top: 9px; padding-bottom: 6px;">Serial #: <?php echo $this_serial_num; ?></td>
                    <td style="text-align:right; padding-top: 9px; padding-bottom: 6px;">Item ID: <?php echo (int)$line->trade_item_id; ?></td>
                </tr>
            </table>
            <br>&nbsp;<br>
        <?php endforeach; ?>
        <br>
        <br>
        <br>

    </div>
    <script>
        function copyToClip(str) {
            //console.log("raw string: " + str);
            function listener(e) {
                e.clipboardData.setData("text/html", str);
                e.clipboardData.setData("text/plain", str);
                e.preventDefault();
            }
            document.addEventListener("copy", listener);
            document.execCommand("copy");
            document.removeEventListener("copy", listener);
        };
    </script>
    <!-- <img src="https://www.bcgen.com/demo/IDAutomationStreamingDataMatrix.aspx?MODE=-1&D=~d013S~d0138000~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d0131USD~d0138000~d013~d013CANON%20EOS%20REBEL%20G~d013EX%20EX-O~d01339.99~d01310.00~d013~d013~d013~d0139876543~d013~d013~d013~d0131CAN~d02731601~d013INSPEC~d013&PFMT=0&PT=T&X=0.06&O=0&LM=0.2"> -->

</body>

</html>