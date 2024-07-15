<?php require APPROOT . '/views/inc/header.php'; ?>
<?php

$full_name = $data['first_name'] . ' ' . $data['last_name'];

if ($data['phone_num'] == '') {
    $formatted_phone = 'no phone number provided';
} else {
    $formatted_phone = kbm_phone_num_format($data['phone_num']);
}
if ($data['email'] == '') {
    $checked_email = 'no email provided';
} else {
    $checked_email = $data['email'];
}
if ($data['address_1'] == '') {
    $address_stack = "no address provided";
} else {
    $address_stack = $data['address_1'];
    if ($data['address_2'] != '') {
        $address_stack .= '<br>';
        $address_stack .= $data['address_2'];
    }
    if ($data['city'] != '') {
        $address_stack .= '<br>';
        $address_stack .= $data['city'];
        if ($data['state'] != '') {
            $address_stack .= ', ';
            $address_stack .= $data['state'];
            if ($data['zip_code'] != '') {
                $address_stack .= '  ';
                $address_stack .= $data['zip_code'];
            } else {
                $address_stack .= "<br>no zip code provided";
            }
        } else {
            $address_stack .= "<br>no state provided";
        }
    } else {
        $address_stack .= "<br>no city info provided";
    }
}

?>
<div id="page-label">
    <p class="h2 mb-1 mt-3 text-secondary">Confirm Customer</p>
    <hr>
</div>
<p class="h3 text-primary">
    <?php echo $full_name;  ?>
</p>
<p>
    ID: <?php echo $data['Client_ID']; ?>
</p>
<p class="h5">
    <?php echo $formatted_phone; ?>
</p>
<p class="h5">
    <?php echo $checked_email; ?>
</p>
<p><?php echo $address_stack; ?></p>



<form id="trade_lut_item_find" class="mt-4" action="<?php echo URLROOT . "/" . $_SESSION['target_page']; ?>" method="get">

    <input type="submit" class="btn btn-primary" value="Confirm" autofocus>
    <span class="mx-3"></span>
    <input type="button" class="btn btn-success" value="Update Client Record" onclick="notYetAlert();">

</form>


<?php require APPROOT . '/views/inc/footer.php'; ?>