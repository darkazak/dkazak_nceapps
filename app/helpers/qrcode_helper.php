<?php


/////testing/////

// $load_data = [
//     'item_name' => str_replace(' ', '%20', "NIKON D300"),
//     "trade_item_id" => '0123456',
//     'serial_num' => "123456",
//     'minor_code' => "8007",
//     'family_code' => "1NIK",
//     'vsn' => "1234567",
//     'condition_codes' =>  "EX%20EX-O",
//     'retail_price' => "124.99",
//     'offer_price' => "25.00",
//     'comments01' => "This is my albatross",
//     'comments02' => "please send help",
//     'venue_code' => '01'
// ];


function getQrCode($load_data)
{

    $item_name = strtolower($load_data['item_name']);
    $trade_item_id = $load_data['trade_item_id'];
    $serial_num = $load_data['serial_num'];
    $minor_code = $load_data['minor_code'];
    $family_code = $load_data['family_code'];
    $vsn = $load_data['vsn'];
    $venue_code = $load_data['venue_code'];
    $condition_code = strtolower($load_data['condition_codes']);
    $retail_price = $load_data['retail_price'];
    $offer_price = $load_data['offer_price'];
    $comments01 = strtolower($load_data['comments01']);
    $comments02 = strtolower($load_data['comments02']);
    $return_char = '~d013';
    $space_char = '%20';
    $escape_char = '%1B';
    $other_control = '~d027[31~d126';
    $field_01 = 'S';
    $vendor_code = '1USD';
    $location = 'INSPEC';


    $bar_code_data = '';
    /// STRING IT TOGETHER
    $bar_code_data .= $return_char;
    $bar_code_data .= $field_01;
    $bar_code_data .= $return_char;
    $bar_code_data .= $minor_code;
    $bar_code_data .= repeatReturnQR(25);
    //$bar_code_data .= $return_char;
    $bar_code_data .= $vendor_code;
    $bar_code_data .= $return_char;
    $bar_code_data .= $minor_code;
    $bar_code_data .= repeatReturnQR(2);
    $bar_code_data .= $item_name;
    $bar_code_data .= $return_char;
    $bar_code_data .= $condition_code;
    $bar_code_data .= $return_char;
    $bar_code_data .= $retail_price;
    $bar_code_data .= $return_char;
    $bar_code_data .= $offer_price;
    $bar_code_data .= repeatReturnQR(3);
    $bar_code_data .= $trade_item_id;
    $bar_code_data .= $return_char;
    $bar_code_data .= $serial_num;
    $bar_code_data .= $return_char;
    $bar_code_data .= $comments01;
    $bar_code_data .= $return_char;
    $bar_code_data .= $comments02;
    $bar_code_data .= repeatReturnQR(2);
    $bar_code_data .= $family_code;
    $bar_code_data .= $other_control;
    $bar_code_data .= $venue_code;
    $bar_code_data .= $return_char;
    $bar_code_data .= $location;
    $bar_code_data .= $return_char;
    $bar_code_data .= $offer_price;

    return '<img src="https://www.bcgen.com/demo/IDAutomationStreamingDataMatrix.aspx?MODE=-1&D=' . $bar_code_data . '&PFMT=0&PT=T&X=0.06&O=0&LM=0.2">';
}


function repeatReturnQR($count)
{
    $x = 1;
    $repeated_return = '~d013';
    for ($x = 1; $x < $count; $x++) {
        $repeated_return .= '~d013';
    }
    return $repeated_return;
}
