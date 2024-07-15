<?php
require APPROOT . '/views/inc/header.php';
include APPROOT . '/data/venuesList.php';

// $emp_default_venue_id = $data['default_venue_id'];
// echo "<br>";
// echo "<br>";
// echo "emp_default_venue_id: ";
// echo $emp_default_venue_id;
// echo "<br>";
// echo "<br>";
// echo "venues_array";
// echo "<br>";
// print_r($venues_array);
// echo "<br>";
// echo "<br>";


if ($_SESSION['venue_switched']) {
    $display_venue_id = $_SESSION['switched_venue_id'];
} else {
    $display_venue_id = $emp_default_venue_id;
}
if ($_SESSION['date_switched']) {
    $display_date = $_SESSION['switched_date'];
} else {
    $display_date = $_SESSION['date'];
}
foreach ($venues_array as $id => $entry) {
    if ($id === $display_venue_id) {
        $selected = "selected";
    } else {
        $selected = "";
    }
}
?>

<div class="container d-flex justify-content-center align-items-center">
    <div class="my-3">
        <h2 class="text-muted">Confirm Session for <?php echo $_SESSION['emp_name']; ?></h2>
        <form id="login_confirm" action="<?php echo URLROOT; ?>/users/update_user_session" method="post">
            <input type="hidden" id="user_session_date" name="user_session_date" value="<?php echo $display_date; ?>">
            <input type="hidden" id="user_session_venue_id" name="user_session_venue_id" value="<?php echo $display_venue_id; ?>">
            <!-- ****** (VENUES PICKER) ******  -->
            <div class="row mb-3 mx-3 ms-0">
                <div class="col-8">
                    <label for="session_venue" class="form-label mb-0">
                        <?php echo ($_SESSION['venue_switched']) ?  ('<span class="text-success">Venue <em>from Session</em></span>') : (' <span class="">Venue <em>Employee Default</em></span>'); ?>
                    </label>
                    <select class="form-select<?php echo ($_SESSION['venue_switched']) ?  (' border border-3 border-success') : (''); ?>" id="session_venue_id" name="session_venue_id" tabIndex="1" onchange="setUserSessionVenueId(this);">
                        <?php
                        foreach ($venues_array as $id => $entry) {
                            $selected = "";
                            if ($id == $display_venue_id) {
                                $selected = "selected";
                            }
                            echo '<option value="' . $id . '" ' . $selected . '>';
                            echo $entry[0] . ' ' . $entry[2];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- ****** (DATE DISPLAY) ******  -->

            <div class="row mb-3 mx-3 ms-0">
                <div class="col-5">
                    <label for="session_date" class="form-label mb-0">
                        <?php echo ($_SESSION['date_switched']) ?  ('<span class="text-success">Date <em>from Session</em></span>') : (' <span class="">Date <em>Today is Default</em></span>'); ?>
                    </label>
                    <input type="date" id="session_date" name="session_date" class="form-control<?php echo ($_SESSION['date_switched']) ?  (' border border-3 border-success') : (' '); ?>" value="<?php echo $display_date; ?>" disabled>
                </div>
            </div>


            <div class="row my-5 mx-3 ms-0">
                <div class="col-6">
                    <input autofocus id="enter_button" type="submit" value="Enter" class="btn btn-success px-5" tabIndex="1">
                </div>
                <div class="col-6">
                    <input id="reset_button" type="button" value="Back" class="btn btn-warning px-5" tabIndex="2" onclick="goBackToHome();">
                </div>
            </div>
        </form>



    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>