<?php
require APPROOT . '/views/inc/header.php';
include_once APPROOT . '/data/venuesList.php';

$this_date = date_create($_SESSION['date']);
$formatted_date = kbm_date_format_medium($_SESSION['date']);
$this_venue_id = $_SESSION['venue_id'];

$this_venue_display = getVenueCopy($venues_array, $this_venue_id);

?>

<div class="container justify-content-center align-items-center">
    <div class="row">
        <!-- SPECIAL HEADER -->
        <div class="col p-5 text-center bg-secondary bg-opacity-25">
            <h1 class="mb-3 display-2"><?php echo $data['title']; ?></h1>
            <h4 class="mb-3 lead-2 text-muted"><?php echo $data['description']; ?></h4>
            <div class="container">
                <div class="row border border-info border-2 my-5 py-4">
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                    <div class="col-4 justify-content-center align-items-center">
                        <form action="<?php echo URLROOT ?>/pages/edit_session_data">
                            <p class="h5 text-muted">Session Data</p>

                            <p class="h6 text-dark mt-4">
                                <span class="text-info">Venue:</span>&nbsp;
                                <?php echo $this_venue_display; ?>
                            </p>

                            <!-- <p class="h6 text-dark"><span class="text-info">Location:</span>&nbsp;TEST LOCATION</p> -->
                            <!-- <p class="h6 text-dark"><span
                                    class="text-info">Location:</span>&nbsp;<?php echo $display_location; ?>
                            </p> -->
                            <p class="h6 text-dark"><span class="text-info">Date:</span>&nbsp;<?php echo $formatted_date; ?></p>
                            <input type="Submit" class="btn btn-info" value="Change Session Data" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="d-flex justify-content-around">
                    <?php makeUIButton("Start a Trade", "btn-primary", "/trades/start", "", "autofocus"); ?>
                    <?php makeUIButton("Quick Trade Lookup", "btn-secondary  disabled", "/trades/quick_look", "", "tabIndex='-1'"); ?>
                    <?php makeUIButton("Start Inspection", "btn-secondary  disabled", "/inspection/index", "", "tabIndex='-1'"); ?>
                    <?php makeUIButton("Administration", "btn-primary", "/pages/admin", "", "tabIndex='0'"); ?>
                </div>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>