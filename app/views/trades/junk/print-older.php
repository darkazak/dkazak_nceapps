<?php
require(APPROOT . "/libraries/pdf/fpdf.php");
class PDF extends FPDF {

    // Page header
    function Header() {

        $title = "TRADE SHEET";
        $w = 100;
        $this->SetX((210 - $w) / 2);
        // Logo
        //$this->Image('logo.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Thickness of frame (1 mm)
        // Title
        $this->Cell($w, 12, 'National Camera Exchange', 0, 1, 'C', false);
        $this->SetX((210 - $w) / 2);
        $this->Cell($w, 12, $title, 0, 1, 'C', false);
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Simple table
    function BasicTable($header, $data) {
        // Header
        $this->SetFont('Arial', 'B', 12);
        foreach ($header as $col)
            $this->Cell(60, 7, $col, 0);
        $this->Ln();
        // Data
        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(60, 6, $col, 0);
            $this->Ln();
        }
    }

    // Simple table
    function ItemsTable($header, $data, $width_arr) {
        //$width = 19;
        // Header
        $this->SetFont('Arial', 'B', 9);

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($width_arr[$i], 12, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        // Data
        $this->SetFont('Times', '', 9);


        $d = count($data[0]);
        for ($j = 0; $j < $d; $j++) {
            for ($k = 0; $k < count($data); $k++) {
                if (DEBUG) {
                    echo "data: ";
                    print_r($data);
                    echo "</br>";
                }
                //$j = 0;
                //echo "<br>J: " . $j;
                // echo "<br>k: " . $k;
                $this->Cell($width_arr[$k], 30, $data[$k][$j], 1);
                // $test_y = $this->GetY();
                // $test_x = $this->GetX();
                // $test_page = $this->PageNo();
                // $these_coordinates = [$test_page, $test_x, $test_y];
                // array_push($qr_code_positions, $these_coordinates);
                // $pdf->Image($qr_code_url, 0, 0, 0, 0, 'GIF');
                // echo "<br>Page: " . $test_page;
                // echo "<br>X(across): " . $test_x;
                // echo "<br>Y(down): " . $test_y;
            }
            $this->Ln();
        }
    }
}




if (isset($data['customer_name'])) {
    $customer_name = $data['customer_name'];
} else {
    $customer_name =  "missing name";
}

if (isset($data['customer_address_1'])) {
    $customer_address_1 = $data['customer_address_1'];
} else {
    $customer_address_1 =  "missing address";
}
if (isset($data['customer_address_2'])) {
    $customer_address_2 = $data['customer_address_2'];
} else {
    $customer_address_2 =  "";
}

if (isset($data['customer_city'])) {
    $customer_city_state_zip .=  $data['customer_city'];
} else {
    $customer_city_state_zip .=  'missing city';
}
if (isset($data['customer_state'])) {
    $customer_city_state_zip .=  ', ' . $data['customer_state'];
} else {
    $customer_city_state_zip .=  ', missing state';
}
if (isset($data['customer_zip_code'])) {
    $customer_city_state_zip .=  '  ' . $data['customer_zip_code'];
} else {
    $customer_city_state_zip .=  '  missing zip code';
}
if (isset($data['customer_phone'])) {
    $customer_phone .=  $data['customer_phone'];
} else {
    $customer_phone .=  'missing phone number';
}
if (isset($data['customer_email'])) {
    $customer_email .=  $data['customer_email'];
} else {
    $customer_email .=   'missing email';
}

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();

////HEADER INFO
$header = array('Customer', 'Trade Type', 'Trade Data');

$customer_line_a = "";
$customer_line_b = $customer_name;
$customer_line_c = $customer_address_1;

if ($customer_address_2 == "") {
    $customer_line_d = $customer_city_state_zip;
    $customer_line_e = "";
    $customer_line_f = $customer_phone;
    $customer_line_g = $customer_email;
    $customer_line_h = "";
} else {
    $customer_line_d = $customer_address_2;
    $customer_line_e = $customer_city_state_zip;
    $customer_line_f = "";
    $customer_line_g = $customer_phone;
    $customer_line_h = $customer_email;
}

switch ($_POST['transaction_flag']) {
    case "trade_transaction":
        $transaction_flag = "Trade";
        $price_display_1 = "Trade Price: ";
        $price_display_2 =  $_POST['trade_total_calc'];
        $price_display_3 = "";
        $price_display_4 = "";
        $price_display_5 = "";
        break;
    case "sale_transaction":
        $transaction_flag = "Sale";
        $price_display_1 = "Sale Price: ";
        $price_display_2 = $_POST['sale_total_calc'];
        $price_display_3 = "";
        $price_display_4 = "";
        $price_display_5 = "";
        break;
    default:
        $transaction_flag = "Quote";
        $price_display_1 = "Trade Price: ";
        $price_display_2 =  $_POST['trade_total_calc'];
        $price_display_3 = "";
        $price_display_4 =  "Sale Price: ";
        $price_display_5 =  $_POST['sale_total_calc'];
}

$trade_line_a = "";
$trade_line_b = $transaction_flag;
$trade_line_c = "";
$trade_line_d = $price_display_1;
$trade_line_e = $price_display_2;
$trade_line_f = $price_display_3;
$trade_line_g = $price_display_4;
$trade_line_h = $price_display_5;

if ($_POST['print_type'] == 'customer') {
    $sheet_type = "customer";
    $data_line_1 = "Customer Copy";
} else {
    $sheet_type = "store";
    $data_line_1 = "FOR NCE USE ONLY";
}

$data_line_a = "";
$data_line_b = $data_line_1;
$data_line_c = "";
$data_line_d = "Trade ID: " . $data['trade_sheet_id'];
$data_line_e = "";
$data_line_f = "";
$data_line_g = "";
$data_line_h = "";

$cols_data = [];
$row_a = array($customer_line_a, $trade_line_a, $data_line_a);
$row_b = array($customer_line_b, $trade_line_b, $data_line_b);
$row_c = array($customer_line_c, $trade_line_c, $data_line_c);
$row_d = array($customer_line_d, $trade_line_d, $data_line_d);
$row_e = array($customer_line_e, $trade_line_e, $data_line_e);
$row_f = array($customer_line_f, $trade_line_f, $data_line_f);
$row_g = array($customer_line_g, $trade_line_g, $data_line_g);
$row_h = array($customer_line_h, $trade_line_h, $data_line_h);

array_push($cols_data, $row_a);
array_push($cols_data, $row_b);
array_push($cols_data, $row_c);
array_push($cols_data, $row_d);
array_push($cols_data, $row_e);
array_push($cols_data, $row_f);
array_push($cols_data, $row_g);
array_push($cols_data, $row_h);

$pdf->BasicTable($header, $cols_data);

$pdf->Ln(10);

$trade_rows = $_SESSION['trade_rows'];




/// TRADE ITEMS TABLE

$items_cols_ids = [];
$items_cols_names = [];
$items_cols_serials = [];
$items_cols_vsns = [];
$items_cols_minors = [];
$items_cols_vendors = [];
$items_cols_retails = [];
$items_cols_trades = [];
$items_cols_sales = [];
$items_cols_barcodes = [];


for ($i = 0; $i < count($trade_rows); $i++) {
    array_push($items_cols_ids, (int)$trade_rows[$i]->trade_item_id);
    array_push($items_cols_names, $trade_rows[$i]->item_title);
    array_push($items_cols_serials, $trade_rows[$i]->serial_num);
    array_push($items_cols_vsns, $trade_rows[$i]->vsn);
    array_push($items_cols_minors, $trade_rows[$i]->minor);
    array_push($items_cols_vendors, $trade_rows[$i]->vendor);
    array_push($items_cols_retails, $trade_rows[$i]->retail_price);
    array_push($items_cols_trades, $trade_rows[$i]->trade_price);
    array_push($items_cols_sales, $trade_rows[$i]->sale_price);

    //get the custom bar code here

    // $qr_code_url = 'https://www.bcgen.com/demo/IDAutomationStreamingDataMatrix.aspx?MODE=-1&D=~d013S~d0138000~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d0131USD~d0138000~d013~d013CANON%20EOS%20REBEL%20G~d013EX%20EX-O~d01339.99~d01310.00~d013~d013~d013~d0139876543~d013~d013~d013~d0131CAN~d02731601~d013INSPEC~d013&PFMT=0&PT=T&X=0.06&O=0&LM=0.2';

    // array_push($items_cols_barcodes, $qr_code_url);
}


if ($sheet_type == "customer") {
} else {
}
$items_header = array('id', 'name', 'serial', 'vsn', 'minor', 'vendor', 'retail', 'trade', 'sale', 'barcode');
$items_cols_widths = array('10', '40', '26', '14', '12', '15', '15', '15', '15', '30');
$items_cols_data = array($items_cols_ids, $items_cols_names, $items_cols_serials, $items_cols_vsns, $items_cols_minors, $items_cols_vendors, $items_cols_retails, $items_cols_trades, $items_cols_sales, $items_cols_barcodes);


print_r($items_cols_data);

$pdf->ItemsTable($items_header, $items_cols_data, $items_cols_widths);



$pdf->Output();
