<?php
session_start();


function isLoggedIn()
{
    if (isset($_SESSION['emp_num'])) {
        return true;
    } else {
        return false;
    }
}

function isAdmin()
{
    if ($_SESSION['admin'] == 1) {
        return true;
    } else {
        return false;
    }
}

function isSessionSecure()
{
    if ($_SESSION['session_secure']) {
        return true;
    } else {
        return false;
    }
}

function varIsNotEmpty($test_var)
{
    if ($test_var == ''  || !isset($test_var)) {
        return false;
    } else {
        return true;
    }
}

function sessionLogout()
{
    unset($_SESSION['session_secure']);
    unset($_SESSION['showSessionResetButton']);

    unset($_SESSION['user_id']);
    unset($_SESSION['emp_num']);
    unset($_SESSION['emp_name']);

    unset($_SESSION['date']);
    unset($_SESSION['venue_id']);
    // unset($_SESSION['location']);
    unset($_SESSION['switched_date']);
    unset($_SESSION['switched_venue_id']);
    //unset($_SESSION['switched_location']);
    //unset($_SESSION['location_switched']);
    unset($_SESSION['venue_set']);

    unset($_SESSION['target_page']);

    unset($_SESSION['customer_id']);
    unset($_SESSION['customer_name']);
    unset($_SESSION['customer_phone']);
    unset($_SESSION['customer_email']);
    unset($_SESSION['customer_address_1']);
    unset($_SESSION['customer_address_2']);
    unset($_SESSION['customer_city']);
    unset($_SESSION['customer_state']);
    unset($_SESSION['customer_zip_code']);

    unset($_SESSION['trade_items']);
    unset($_SESSION['trade_sheet_id']);
    unset($_SESSION['tradeInProcess']);
    unset($_SESSION['tradeInProcess']);
    unset($_SESSION['error_list']);
    unset($_SESSION['alert_message']);
}

function dropAllTradeData()
{
    unset($_SESSION['trade_items']);
    unset($_SESSION['trade_sheet_id']);
    unset($_SESSION['trade_rows']);
    unset($_SESSION['trade_item_id']);
    unset($_SESSION['trade_sheet_id']);
    unset($_SESSION['item_title']);
    unset($_SESSION['medium_description']);
    unset($_SESSION['long_description']);
    unset($_SESSION['comments']);
    unset($_SESSION['nce_note']);
    unset($_SESSION['categories']);
    unset($_SESSION['attributes']);
    unset($_SESSION['vsn']);
    unset($_SESSION['minor']);
    unset($_SESSION['vendor']);
    unset($_SESSION['cosmetic_condition']);
    unset($_SESSION['optical_condition']);
    unset($_SESSION['mechanical_condition']);
    unset($_SESSION['retail_price']);
    unset($_SESSION['trade_price']);
    unset($_SESSION['purchase_price']);
    unset($_SESSION['venue_id']);
    //unset($_SESSION['location']);
    unset($_SESSION['has_cosmetics']);
    unset($_SESSION['has_opticals']);
    unset($_SESSION['has_mechanicals']);
    unset($_SESSION['serial_num']);
    unset($_SESSION['lut_id']);
    unset($_SESSION['error_list']);
    unset($_SESSION['alert_message']);
}

function startNewTrade()
{
    unset($_SESSION['target_page']);
    unset($_SESSION['showSessionResetButton']);
    unset($_SESSION['customer_id']);
    unset($_SESSION['customer_name']);
    unset($_SESSION['customer_phone']);
    unset($_SESSION['customer_email']);
    unset($_SESSION['customer_address_1']);
    unset($_SESSION['customer_address_2']);
    unset($_SESSION['customer_city']);
    unset($_SESSION['customer_state']);
    unset($_SESSION['customer_zip_code']);
    unset($_SESSION['tradeInProcess']);
    unset($_SESSION['trade_items']);
    unset($_SESSION['trade_sheet_id']);
    unset($_SESSION['trade_rows']);
    unset($_SESSION['trade_item_id']);
    unset($_SESSION['trade_sheet_id']);
    unset($_SESSION['item_title']);
    unset($_SESSION['medium_description']);
    unset($_SESSION['long_description']);
    unset($_SESSION['comments']);
    unset($_SESSION['nce_note']);
    unset($_SESSION['categories']);
    unset($_SESSION['attributes']);
    unset($_SESSION['vsn']);
    unset($_SESSION['minor']);
    unset($_SESSION['vendor']);
    unset($_SESSION['cosmetic_condition']);
    unset($_SESSION['optical_condition']);
    unset($_SESSION['mechanical_condition']);
    unset($_SESSION['retail_price']);
    unset($_SESSION['trade_price']);
    unset($_SESSION['purchase_price']);
    unset($_SESSION['has_cosmetics']);
    unset($_SESSION['has_opticals']);
    unset($_SESSION['has_mechanicals']);
    unset($_SESSION['serial_num']);
    unset($_SESSION['lut_id']);
    $_SESSION['error_list'] = [];
    unset($_SESSION['alert_message']);
}

function logoutKeepLocation()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['emp_num']);
    unset($_SESSION['emp_name']);

    unset($_SESSION['target_page']);

    unset($_SESSION['customer_id']);
    unset($_SESSION['customer_name']);
    unset($_SESSION['customer_phone']);
    unset($_SESSION['customer_email']);
    unset($_SESSION['customer_address_1']);
    unset($_SESSION['customer_address_2']);
    unset($_SESSION['customer_city']);
    unset($_SESSION['customer_state']);
    unset($_SESSION['customer_zip_code']);

    unset($_SESSION['trade_items']);
    unset($_SESSION['trade_sheet_id']);
    unset($_SESSION['tradeInProcess']);
    $_SESSION['error_list'] = [];
    unset($_SESSION['alert_message']);
}

function loginConfirmed()
{
    //unset($_SESSION['location_switched']);
    //unset($_SESSION['target_page']);
    unset($_SESSION['customer_id']);
    unset($_SESSION['customer_name']);
    unset($_SESSION['customer_phone']);
    unset($_SESSION['customer_email']);
    unset($_SESSION['customer_address_1']);
    unset($_SESSION['customer_address_2']);
    unset($_SESSION['customer_city']);
    unset($_SESSION['customer_state']);
    unset($_SESSION['customer_zip_code']);
    unset($_SESSION['trade_items']);
    unset($_SESSION['trade_sheet_id']);
}

// rename this function when caller is found
function customerConfirmed()
{
    if (isset($_SESSION['customer_id'])) {
        return true;
    } else {
        return false;
    }
}

function addTradeItemToSession($this_data)
{
    $is_new = true;
    foreach ($_SESSION['trade_items'] as $this_val) {
        if ($this_val == $this_data) {
            $is_new = false;
        }
    }
    if ($is_new) {
        array_push($_SESSION['trade_items'], $this_data);
    }
}

function removeArrayItem($this_value_item, $this_array)
{
    $new_array = [];
    if (is_numeric(array_search($this_value_item, $this_array))) {

        $key = array_search($this_value_item, $this_array);
        unset($this_array[$key]);
        $this_array = array_values($this_array);
    }

    $new_array = $this_array;
    return $new_array;
}

function getVenueCopy($venues_array, $index_id)
{

    //$venue_building = $venues_array['01'];
    //$venue_location = $venues_array['01'];

    // echo "<br>";
    // echo "id num: ";
    // echo "<br>";
    // echo $index_id;
    // echo "<br>";
    // echo "all venues array: ";
    // echo "<br>";
    // print_r($venues_array);
    // echo "<br>";

    // echo "my venues array: ";
    // echo "<br>";
    // print_r($venues_array[strval($index_id)]);
    // echo "<br>";


    return $venues_array[strval($index_id)][0] . ' ' . $venues_array[strval($index_id)][2];

    // echo "venue_location: " . $venue_location;
    // print_r($venue_location);
    // echo "<br>";


}
