<?php
class Pages extends Controller
{
    private $appModel;
    
    public function __construct()
    {
        //session_start();
        //$_SESSION['session_secure'] = false;
        //$_SESSION['target_page'] = '';
        $this->appModel = $this->model('App');
    }

    //***************************/
    //***************************/
    public function index()
    {
        if (DEBUG) {
            echo "Session: ";
            print_r($_SESSION);
            echo "</br>";
        }
        // SET INITAL SESSION DATA (IF NOT ALREADY SET)
        if (!isset($_SESSION['session_secure'])) {
            $_SESSION['session_secure'] = false;
        }
        if (!isset($_SESSION['target_page'])) {
            $_SESSION['target_page'] = '';
        }
        // todo:  need to move this to the right place in the trade process
        if (!isset($_SESSION['tradeInProcess'])) {
            $_SESSION['tradeInProcess'] = false;
        }
        // todo:  need to move this to the right place in the trade process
        if (!isset($_SESSION['showSessionResetButton'])) {
            $_SESSION['showSessionResetButton'] = false;
        }
        // todo:  need to move this to the right place in the trade process
        if (!isset($_SESSION['venue_set'])) {
            $_SESSION['venue_set'] = false;
        }
        // todo:  need to move this to the right place in the trade process
        if (!isset($_SESSION['venue_switched'])) {
            $_SESSION['venue_switched'] = false;
        }
        // todo:  need to move this to the right place in the trade process
        if (!isset($_SESSION['venue_id'])) {
            $_SESSION['venue_id'] = '01';
        }
        // todo:  need to move this to the right place in the trade process
        if (!isset($_SESSION['date_switched'])) {
            $_SESSION['date_switched'] = false;
        }
        // todo:  need to move this to the right place in the trade process
        if (!isset($_SESSION['date'])) {
            $_SESSION['date'] = date('Y-m-d');
        }

        if (SECURITY) {
            if ($_SESSION['session_secure']) {
                $data = [
                    'title' => 'NCE APPS',
                    'description' => 'Session is Secure'
                ];

                $this->view('pages/index', $data);
            } else {
                $data = [
                    'title' => 'NCE APPS',
                    'description' => 'Enter the Application Key to Start'
                ];
                $this->view('pages/app_login', $data);
            }
        } else {
            $data = [
                'title' => 'NCE APPS',
                'description' => 'Session is Not Secure'
            ];
            $this->view('pages/index', $data);
        }
    }
    //***************************/
    //***************************/
   
    //***************************/
    //***************************/
    public function start_new_trade()
    {
        if (DEBUG) {
            echo "processing start_new_trade function </br>";
            echo "SESSION: ";
            print_r($_SESSION);
        }
        //session helper:
        startNewTrade();
        $data = [
            'title' => 'Used Intake',
            'description' => 'Start a New Trade'
        ];

        $this->view('pages/index', $data);
    }
    //***************************/
    //***************************/
    public function about()
    {
        $data = [
            'title' => 'ABOUT',
            'headline' => 'About this Application',
            'description' => 'site to manage NCE Ecommerce transactions'
        ];
        $this->view('pages/about', $data);
    }
    //***************************/
    //***************************/
    public function admin()
    {
        $stop_me = false;
        $_SESSION['target_page'] = 'pages/admin';
        if (DEBUG) {
            echo "processing admin function </br>";
            echo "SESSION: ";
            print_r($_SESSION);
        }

        $data = [
            'title' => 'Administration',
            'description' => 'Manage Application Data'
        ];

        if (!isLoggedIn()) {
            $stop_me = true;
            $_SESSION['alert_message'] = 'You must log in.';
            //redirect('users/login');
            $this->view('users/login');
        }

        if (!isAdmin()) {
            $stop_me = true;
            $_SESSION['alert_message'] = 'You must be logged in as an administrator.';
            $this->view('users/login');
        }

        $message = $_SESSION['emp_name'] . ' logged in';
        if ($_SESSION['admin'] == 1) {
            $message .= ' as an Administrator.';
        } else {
            $message .= '.';
        }
        if (!$stop_me) {
            $this->view('pages/admin', $data);
        }
    }
    //***************************/
    //***************************/
    public function close_application()
    {
        //session helper:
        sessionLogout();


        //session_unset();
        //session_destroy();

        // $_SESSION['date'] = date('Y-m-d');
        // $_SESSION['venue'] = "Golden Valley";
        // $_SESSION['location'] = "01";
        // $_SESSION['session_secure'] = false;
        // $_SESSION['location_switched'] = false;
        // $_SESSION['location_set'] = false;
        // $_SESSION['showSessionResetButton'] = false;
        // $_SESSION['tradeInProcess'] = false;


        $data = [
            'title' => 'APP START',
            'description' => 'Enter the Apps Password to Start'
        ];

        redirect('pages/index');
        //$this->view('pages/app_login', $data);
    }
    //***************************/
    //***************************/
    public function log_off_keep_location()
    {

        logoutKeepLocation();

        if (!isset($_SESSION['venue_switched'])) {
            $_SESSION['venue_switched'] = false;
        }

        if ($_SESSION['venue_switched']) {
            $_SESSION['date'] = $_SESSION['switched_date'];
            $_SESSION['venue_id'] = $_SESSION['switched_venue_id'];
        } else {
            $_SESSION['venue_id'] = '01';
            $_SESSION['date'] = date('Y-m-d');
            $_SESSION['venue_set'] = false;
        }

        $data = [
            'title' => 'Trade Worksheet',
            'description' => 'User Logged Off'
        ];
        redirect('pages/index');
    }

    //***************************/
    //***************************/
    public function new_session()
    {
        if (DEBUG) {
            echo "pre logout Session: ";
            print_r($_SESSION);
            echo "</br>";
        }
        //logout();
        unset($_SESSION['admin']);
        unset($_SESSION['emp_num']);
        unset($_SESSION['emp_name']);
        unset($_SESSION['user_id']);
        unset($_SESSION['venue_set']);
        unset($_SESSION['target_page']);
        unset($_SESSION['tradeInProcess']);
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_phone']);
        unset($_SESSION['customer_email']);
        unset($_SESSION['customer_address_1']);
        unset($_SESSION['customer_address_2']);
        unset($_SESSION['customer_city']);
        unset($_SESSION['customer_state']);
        unset($_SESSION['customer_zip_code']);
        unset($_SESSION['message_class']);
        unset($_SESSION['message']);
        unset($_SESSION['trade_items']);
        unset($_SESSION['trade_sheet_id']);
        $_SESSION['session_secure'] = false;
        $_SESSION['date'] = date('Y-m-d');
        $_SESSION['venue_id'] = "01";
        $_SESSION['venue_switched'] = false;
        $_SESSION['venue_set'] = false;
        $_SESSION['showSessionResetButton'] = false;
        $_SESSION['tradeInProcess'] = false;

        $data = [
            'title' => 'Trade Worksheet',
            'description' => 'Session Cleared'
        ];



        if (DEBUG) {
            echo "post logout Session: ";
            print_r($_SESSION);
            echo "</br>";
        }
        $this->view('pages/index', $data);
    }
    //***************************/
    //***************************/
    public function edit_session_data()
    {
        if (DEBUG) {
            echo "edit_session_data Session: ";
            echo "</br>";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }

        $data = [
            'title' => 'Session Settings',
            'description' => 'Override the Defualt Venue and/or Date'
        ];
        // $this->view('pages/admin');
        $this->view('pages/session', $data);
    }

    //***************************/
    //***************************/
    public function reset_session_location()
    {
        if (DEBUG) {
            echo "<br> reset_session_location Session: ";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }

        $data = [
            'title' => 'Trade Worksheet',
            'description' => 'Location Data Saved'
        ];
        // $this->view('pages/admin');
        $this->view('pages/index', $data);
    }

    //***************************/
    //***************************/
    public function update_session_data()
    {
        if (DEBUG) {
            echo "</br>processing update_session_data function </br>";
            echo "update_session_data POST: ";
            echo "POST: ";
            print_r($_POST);
            echo "</br>";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }

        if ($_POST['venue_switch']) {
            echo "<br>";
            echo "<br>";
            echo "venue_switch is on";
            echo "<br>";
            echo "<br>";
            $_SESSION['venue_switched'] = true;
            $_SESSION['venue_id'] = $_POST['session_venue_id'];
            $_SESSION['switched_venue_id'] = $_POST['session_venue_id'];
        } else {
            $_SESSION['venue_switched'] = false;
            unset($_SESSION['switched_venue_id']);
            $_SESSION['venue_id'] = '01';
        }

        if ($_POST['date_switch']) {
            echo "<br>";
            echo "<br>";
            echo "date_switch is on";
            echo "<br>";
            echo "<br>";
            $_SESSION['date_switched'] = true;
            $_SESSION['date'] = $_POST['session_date'];
            $_SESSION['switched_date'] = $_POST['session_date'];
        } else {
            $_SESSION['date_switched'] = false;
            unset($_SESSION['switched_date']);
            $_SESSION['date'] = date('Y-m-d');
        }
        // logoutKeepSession();

        // if (!isset($_SESSION['date'])) {
        //     $_SESSION['date'] = date('Y-m-d');
        // }
        // if (!isset($_SESSION['venue'])) {
        //     $_SESSION['venue'] = "Golden Valley";
        // }
        // if (!isset($_SESSION['location'])) {
        //     $_SESSION['location'] = "01";
        // }
        // if (!isset($_SESSION['location_switched'])) {
        //     $_SESSION['location_switched'] = false;
        // }
        // if (!isset($_SESSION['location_set'])) {
        //     $_SESSION['location_set'] = false;
        // }


        if (DEBUG) {
            echo "After Procesing SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }

        $data = [
            'title' => 'Trade Worksheet',
            'description' => 'Session Updated',
        ];

        /////////redirect('pages/index');
        $this->view('pages/index', $data);
    }

    public function add_new_venue()
    {
        $this->view('pages/add_new_venue');
    }

    public function update_venue_list()
    {
        include_once APPROOT . '/data/venuesList.php';
        //get this from database
        

        $new_venue_name = htmlentities($_POST['new_venue_name']);

        $text = "<?php\n";
        $text .= "\$venues_array = array(\n";
        foreach ($venues_array as $key => $data_set) {
            //echo "<br>";
            $text .= "'" . $key . "' => ['" . $data_set[0] . "','" . $data_set[1] . "','" . $data_set[2] . "']";
            $text .= ",\n";
            $last_key_num = $key;
        }

        $new_key_num = $last_key_num + 1;

        $text .= "'" . $new_key_num . "' => ['" . $new_venue_name . "','" . $_POST['sub_venue'] . "','" . $sub_venues_array[$_POST['sub_venue']] . "']";
        $text .= "\n";
        $text .= ");";
        $text .= "\n";
        $text .= "\n";
        $text .= "\n";
        $text .= "\$sub_venues_array = array(\n";
        $text .= "'10' => 'Off Site',";
        $text .= "\n";
        $text .= "'03' => 'Special',";
        $text .= "\n";
        $text .= "'09' => 'Alternate'";
        $text .= "\n";
        $text .= ");";
        $text .= "\n";

        $myfile = fopen(APPROOT . '/data/venuesList.php', 'w') or die('Unable to open file!');
        fwrite($myfile, $text);
        fclose($myfile);


        $this->edit_session_data();
    }

    public function goToPage()
    {
        $data = [
            'page_target' => $_POST['page_target']
        ];
        $this->view('pages/swap_page', $data);
    }

    public function edit_lut_quick()
    {
        echo ("Made it to the pages function");
        $rawItemData = $this->tradeModel->getLutItemsForAdminByTitle("nikon");
        echo "<br>";
        echo $rawItemData;
    }
}
