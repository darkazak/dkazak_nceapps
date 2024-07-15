<?php
include APPROOT . '/data/venuesList.php';
require APPROOT . '/views/inc/header.php';
?>

<div class="container justify-content-center align-items-center">
    <div class="row mb-3">
        <div class="col-12 p-5 text-center bg-secondary bg-opacity-25">
            <h1 class="mb-3 display-2"><?php echo $data['title']; ?></h1>
            <h4 class="mb-3 lead-2 text-muted"><?php echo $data['description']; ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 border">
            <div class="row justify-content-center align-items-center">
                <div class="col">
                    <form id="update_session_data_form" action="<?php echo URLROOT; ?>/pages/update_session_data" method="POST">
                        <input type="hidden" name="venue_switch" id="venue_switch" value="0">
                        <input type="hidden" name="date_switch" id="date_switch" value="0">
                        <!-- ****** (VENUES PICKER) ******  -->
                        <div class="row mb-3 mx-3 ms-0">
                            <div class="col-12">
                                <label for="session_venue" class="form-label mb-0">Venue</label>
                                <select class="form-select" id="session_venue_id" name="session_venue_id" onchange="setVenueSwitch()">
                                    <?php
                                    foreach ($venues_array as $id => $entry) {
                                        // echo "<br>entry id: " . $id . "<br>";
                                        // print_r($entry);
                                        // echo "<br>";
                                        // echo "the display for item: " . $id;
                                        echo '<option value="' . $id . '">';
                                        echo $entry[0] . ' ' . $entry[2];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- ****** (DATE PICKER) ******  -->
                        <div class="row mb-3 mx-3 ms-0">
                            <div class="col-12">
                                <label for="session_date" class="form-label mb-0">Date</label>
                                <input type="date" id="session_date" name="session_date" class="form-control" value="<?php echo date("Y-m-d"); ?>" onchange="setDateSwitch()">
                            </div>
                        </div>
                        <!-- <div class="row my-4 mt-5">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <input id="update_session_btn" type="submit" class="btn btn-primary" value="Update Session Data" autoselect>
                                </div>
                            </div>
                        </div> -->
                    </form>
                    <form id="add_new_venue_form" action="<?php echo URLROOT; ?>/pages/add_new_venue" method="POST">
                        <!-- <div class="row my-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <input id="add_venue_btn" type="submit" class="btn btn-warning px-5 text-light" tabIndex="2" value="Add New Venue">
                                </div>
                            </div>
                        </div> -->
                    </form>
                    <form id="reset_session_venue_form" action="<?php echo URLROOT; ?>/pages/reset_session_veune" method="POST">
                        <!-- <div class="row my-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <input id="cancel_btn" type="submit" class="btn btn-success px-5" tabIndex="2" value="Cancel">
                                </div>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <input type="button" class="btn btn-primary text-light" value="Update Session Data" onclick="document.getElementById('update_session_data_form').submit();">
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <input type="button" class="btn btn-warning text-light px-5" value="Add New Venue" onclick="document.getElementById('add_new_venue_form').submit();">
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <input type="button" class="btn btn-success text-light px-5" value="Cancel" onclick="document.getElementById('reset_session_venue_form').submit();">
                </div>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>
</div>
<!-- close container -->
<script>
    // function reset_tabs_a() {
    //     document.getElementById("session_venue").tabIndex = "3";
    //     document.getElementById("session_location").tabIndex = "4";
    //     document.getElementById("session_date").tabIndex = "5";
    //     document.getElementById("update_session_btn").tabIndex = "1";
    //     document.getElementById("cancel_btn").tabIndex = "2";
    // }

    // function reset_tabs() {
    //     document.getElementById("session_venue").tabIndex = "1";
    //     document.getElementById("session_location").tabIndex = "2";
    //     document.getElementById("session_date").tabIndex = "3";
    //     document.getElementById("update_session_btn").tabIndex = "4";
    //     document.getElementById("cancel_btn").tabIndex = "5";
    //     document.getElementById("session_venue").focus();
    // }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>