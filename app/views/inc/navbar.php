<?php
$this_page = thisPageID();
$venue_id = $_SESSION['venue_id'];
$this_date = $_SESSION['date'];

include APPROOT . '/data/venuesList.php';

?>
<!-- <nav class="navbar navbar-expand-sm bg-body-tertiary mb-3" data-bs-theme="dark"> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div id="navbar_logo" class="rounded-pill color-menu-logo mr-3 py-1 px-3" style="width:150px">
            <?php echo SITENAME; ?>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-0 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this_page == 'index') ? 'active' : 'text-info';  ?>" href="<?php echo URLROOT; ?>/pages/index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this_page == 'about') ? 'active' : '';  ?>" href="<?php echo URLROOT; ?>/pages/about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav me-0 mb-0 mb-lg-0">
                <?php if ($_SESSION['venue_set']) : ?>
                    <li class="nav-item">
                        <p class="nav-component ms-3 navbar-message">
                            <span class="<?php echo ($_SESSION['admin'] == 1) ?  (" text-success") : ("");
                                            ?>">
                                Logged in
                                <?php
                                if (isset($_SESSION['emp_name'])) {
                                    echo 'as <span class="navbar-message-alt">' . $_SESSION['emp_name'] . '</span>';
                                }
                                ?>
                            </span>
                            <?php
                            if ($_SESSION['venue_switched']) {
                                $venue_id_num = $venues_array[$_SESSION['switched_venue_id']][1];
                                $venue_building = $venues_array[$_SESSION['switched_venue_id']][0];
                                $venue_location = $venues_array[$_SESSION['switched_venue_id']][2];
                            } else {
                                $venue_id_num = $venues_array[$_SESSION['venue_id']][1];
                                $venue_building = $venues_array[$_SESSION['venue_id']][0];
                                $venue_location = $venues_array[$_SESSION['venue_id']][2];
                            }

                            if ($_SESSION['date_switched']) {
                                $this_date = $_SESSION['switched_date'];
                            } else {
                                $this_date = $_SESSION['date'];
                            }



                            echo ' ' . $venue_building . ' ' . $venue_location . ' - <span class="navbar-message-small">' . $this_date . '</span>';


                            ?>
                        </p>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['user_id']) : ?>
                    <li class="nav-item">
                        <form class="m-0 p-0 mt-3" action="<?php echo URLROOT; ?>/pages/log_off_keep_location">
                            <button type="submit" class="btn btn-info nav-component px-5" tabIndex="-1">Log Off</button>
                        </form>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['tradeInProcess']) : ?>
                    <li class="nav-item">
                        <form class="m-0 p-0 mt-3" action="<?php echo URLROOT; ?>/trades/start">

                            <button type="submit" class="btn btn-warning nav-component px-3" tabIndex="-1">Restart
                                Trade</button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>