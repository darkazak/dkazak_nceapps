<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="row">
    <div class="col-4">
        <h1 class="mb-3 h1">Add New Venue</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="<?php echo URLROOT; ?>/pages/update_venue_list" method="post">

                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="new_venue_name" name="new_venue_name" class="form-control" value="" autofocus />
                                <label class="form-label" for="new_venue_name">New Venue Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio1" name="sub_venue" value="10" checked>
                                    <label class="form-check-label" for="radio1">Offsite</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio2" name="sub_venue" value="03">
                                    <label class="form-check-label" for="radio2">Special</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="radio3" name="sub_venue" value="09">
                                    <label class="form-check-label" for="radio3">Alternate</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div class="row">
                        <div class="col-3">
                            <input type="submit" class="btn btn-primary btn-block px-4" value="Save">
                        </div>
                    </div>

                    <!-- <input type="hidden" id="dup_found" name="dup_found" value="no"> -->
                </form>
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>