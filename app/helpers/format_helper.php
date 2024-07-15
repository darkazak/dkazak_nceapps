<?php

function kbm_date_format_long($sqlReturnedDate)
{
    // formats a MSQL returned date field 
    //into a long date format:
    //ex: Monnday, January 1st, 2000 @ 12:00 pm
    $date = date_create($sqlReturnedDate);
    $lngFmtDate =  date_format($date, "l, M jS, Y") . " @ " . date_format($date, "g:i a");
    return $lngFmtDate;
}

function kbm_date_time_format_long($rawDate)
{
    // formats a MSQL returned date field 
    //into a long date format:
    //ex: Monnday, January 1st, 2023 @ 12:00 pm
    $date = date_create($rawDate);
    $fmtDate =  date_format($date, "l, F jS, Y") . " @ " . date_format($date, "g:i a");
    return $fmtDate;
}

function kbm_date_format_medium($rawDate)
{
    //ex: January 1st, 2023
    $date = date_create($rawDate);
    $fmtDate = date_format($date, "M jS, Y");
    //$fmtDate = date_format($date, "F jS, Y");
    return $fmtDate;
}

function kbm_date_format_short($rawDate)
{
    //ex: Jan 01, 2023
    $date = date_create($rawDate);
    $fmtDate = date_format($date, "M d, Y");
    return $fmtDate;
}

function kbm_date_format_micro($rawDate)
{
    //ex: 01/01/23
    $date = date_create($rawDate);
    $fmtDate = date_format($date, "m/d/y");
    return $fmtDate;
}

function kbm_date_format_micro_special($rawDate)
{
    //ex: 2023-01-15
    $date = date_create($rawDate);
    $fmtDate = date_format($date, "Y-m-d");
    return $fmtDate;
}

function kbm_phone_num_format($str)
{

    if (strlen($str) == 10) {
        if (preg_match('/^(\d{3})(\d{3})(\d{4})$/', $str,  $matches)) {
            $result = '(' . $matches[1] . ') ' . $matches[2] . '-' . $matches[3];
            return $result;
        } else {
            return $str;
        }
    } elseif (strlen($str) == 11) {
        if (preg_match('/^([1])(\d{3})(\d{3})(\d{4})$/', $str,  $matches)) {
            $result = '1 + (' . $matches[2] . ') ' . $matches[3] . '-' . $matches[4];
            return $result;
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}

function kbm_normalize_name($str)
{
    $name_arr = explode(", ", $str);
    return $name_arr[1] . ' ' .  $name_arr[0];
}

function kbm_launder_currency($str)
{
    return str_replace("$", "", $str);
}

function kbm_launder_currency_to_float($str)
{
    $trim = number_format(ltrim($str, "$"), 2, '.', '');
    $num = (float) $trim;
    // echo "<br>";
    // echo "<br>";
    // echo "VAR DUMP:";
    // echo "<br>";
    // echo "%%%%%%%%%%%%%%%%%%%";
    // echo "<br>";
    // var_dump($trim);
    // echo "<br>";
    // echo "%%%%%%%%%%%%%%%%%%%";
    // echo "<br>";
    // echo "<br>";
    return $num;
}

// function kbm_round_integer($str) {
//     echo round($str);
// }

function display_location($num_str)
{
    include APPROOT . '/data/locationsList.php';
    // echo "path to data: " . APPROOT . '/data/locationsList.php';
    // echo "locations array: ";
    // print_r($locationsArray);
    $location_id_name = "no answer";
    for ($x = 0; $x <= count($locationsArray); $x++) {
        if ($locationsArray[$x][0] == $num_str) {
            $location_id_name = $locationsArray[$x][1];
            break;
        }
    }
    //die('location_id_name: ' . $location_id_name);
    return $location_id_name;
}


function display_workflow_page_label($title, $subtitle)
{
    echo '<div id="workflow-page-label">';
    echo '<p class="h2 mb-1 mt-3 text-primary">' . $title . '</p>';
    if (varIsNotEmpty($_SESSION['customer_name'])) {
        echo '<p class="h5 mb-2 text-primary"> for ' . $_SESSION['customer_name'];
    }
    if (varIsNotEmpty($_SESSION['customer_phone'])) {
        echo " - " . kbm_phone_num_format($_SESSION['customer_phone']);
    }
    if (varIsNotEmpty($_SESSION['customer_email'])) {
        echo " - " . $_SESSION['customer_email'];
    }
    echo '</p><p class="h3 mb-0">' . $subtitle . '</p><hr></div>';
}
