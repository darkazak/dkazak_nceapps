<?php
class Pages extends Controller
{
    private $systoolModel;

    public function __construct()
    {
        $this->systoolModel = $this->model('User');
    }

    public function register()
    {
        $error_flag = false;

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form

            // Sanatize post data
            $_POST = filter_input_array(strip_tags(INPUT_POST));

            // init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Validate email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter email.';
                $error_flag = true;
            } else {
                // check email
                if ($this->systoolModel->findUserByEmail($data['email'])) {
                    $data['email_error'] = 'Email already in use.';
                    $error_flag = true;
                }
            }

            //Validate name
            if (empty($data['name'])) {
                $data['name_error'] = 'Please enter name.';
                $error_flag = true;
            }

            //Validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter password.';
                $error_flag = true;
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'Password must be at least 6 characters.';
                $error_flag = true;
            }

            //Validate confirm_password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Please confirm the password.';
                $error_flag = true;
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_error'] = 'Password mismatch.';
                    $error_flag = true;
                }
            }

            // Make sure errors are empty
            if (!$error_flag) {

                //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->systoolModel->register($data)) {
                    //flash('register_success', $data['name'] . ' is registered and can now log in.');
                    redirect('users/login');
                } else {
                    die('Something whent wrong.');
                }
            } else {
                // load view with errors
                //die('errors');
                $this->view('users/register', $data);
            }
        } else {
            // init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'comfirm_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'comfirm_password_error' => ''
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //die("loggin page here");
        $error_flag = false;
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanatize post data
            $_POST = filter_input_array(strip_tags(INPUT_POST));

            $found_employee_data = $this->systoolModel->getUserByEmpNum($_POST['emp_num_entry']);

            if ($_SESSION['venue_switched']) {
                $venue_id = $_SESSION['switched_venue_id'];
                // $location_entry = $_SESSION['switched_location'];
                //$date_entry =  $_SESSION['switched_date'];
            } else {
                include_once APPROOT . '/data/venuesList.php';

                // echo "<br>";
                // echo "<br>";
                // echo "venues_array";
                // echo "<br>";
                // print_r($venues_array);
                // echo "<br>";
                // echo "<br>";


                $venue_entry_id = $found_employee_data->default_venue_id;
                //$venue_entry =  getVenueCopy($venues_array, $venue_entry_id);
                // echo "<br>";
                // echo "Login Venues Array: ";
                // echo "<br>";
                // print_r($venues_array);
                // echo "<br>";

                //$location_entry = $found_employee_data->default_location;
                // $date_entry = date('Y-m-d');
            }

            if ($_SESSION['date_switched']) {
                $date_entry = $_SESSION['switched_date'];
            } else {
                //$date_entry = $_SESSION['date'];
                $date_entry = date('Y-m-d');
            }

            $data = [
                'emp_num' => trim($_POST['emp_num_entry']),
                'password' => trim($_POST['password']),
                'emp_default_venue_id' => $venue_id
            ];

            $_SESSION['user_id'] = $found_employee_data->id;
            $_SESSION['emp_num'] = $found_employee_data->emp_num;
            $_SESSION['emp_name'] = $found_employee_data->name;
            $_SESSION['venue_id'] = $venue_id;
            $_SESSION['date'] = $date_entry;

            //Process password for Admin status
            if (empty($data['password'])) {
                $_SESSION['admin'] = 0;
            } else {
                if ($this->systoolModel->checkUserPassword($data['password'], $data['emp_num'])) {
                    $_SESSION['admin'] = 1;
                } else {
                    $_SESSION['admin'] = 0;
                }
            }


            if (DEBUG) {
                // echo "</br>";
                // echo "SESSION: ";
                // print_r($_SESSION);
                // echo "</br>";
                // echo "Request Method: " . $_SERVER['REQUEST_METHOD'];
                // echo "</br>";
            }


            if ($error_flag) {
                //               $this->view('users/login', $data);
            } else { // NO ERRORS
                $this->confirm_user_session_data();
            }
        }
    }

    public function confirm_user_session_data()
    {

        include_once APPROOT . '/data/venuesList.php';

        if (DEBUG) {
            echo "<br>";
            echo "CONFIRM confirm_user_session_data<br>";
            echo "POST: ";
            print_r($_POST);
            echo "</br>";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }


        if ($_SESSION['venue_switched']) {
            $default_venue_id = $_SESSION['venue_id'];
        } else {
            $emp_num = $_SESSION['emp_num'];
            $default_venue_id = $this->systoolModel->getDefaultVenueIdByEmpNum($emp_num);
        }

        $data = [
            'default_venue_id' => $default_venue_id
        ];


        $_SESSION['tradeInProcess'] = false;

        if (DEBUG) {
            echo "UPDATED SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }

        //Load view
        $this->view('users/confirm_user_session', $data);
    }

    public function update_user_session()
    {
        $this_user = $this->systoolModel->getUserByEmpNum($_SESSION['emp_num']);
        //$this_user_id = $this->userModel->getUserIdByEmpNum($_SESSION['emp_num']);

        //$_SESSION['user_id'] = $this_user->id;
        //$_SESSION['emp_name'] = $this_user->name;
        $_SESSION['venue_set'] = true;
        $_SESSION['showSessionResetButton'] = true;
        //$_SESSION['location_switched'] = false;

        $_SESSION['venue_id'] = $_POST['session_venue_id'];
        //$_SESSION['location'] = $_POST['session_location'];


        if ($_SESSION['venue_switched']) {
            if ($_POST['session_venue'] != $_SESSION['switched_venue_id']) {
                $_SESSION['date'] = date('Y-m-d');
            }
        }

        if (DEBUG) {
            echo "</br>";
            echo "POST: ";
            print_r($_POST);
            echo "</br>";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }

        //Load view

        redirect($_SESSION['target_page']);
    }

    public function login_pw()
    {
        //echo "Made it to the login page<br>Target Url once loged in: ";
        //echo $_SESSION['target_page'];
        //   echo $this->target_Url;
        // die("loggin page here");
        $error_flag = false;
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form
            // Sanatize post data
            $_POST = filter_input_array(strip_tags(INPUT_POST));

            // init data
            $data = [
                'emp_num' => trim($_POST['emp_num']),
                'emp_num_error' => ''
            ];

            //Validate emp_num
            if (empty($data['emp_num'])) {
                $data['emp_num_error'] = 'Please enter your employee number.';
                $error_flag = true;
            }

            //Check for user/emp_num
            if (!$this->systoolModel->findUserByEmpNum($data['emp_num'])) {
                //No User Found
                $data['email_error'] = 'no user found.';
                $error_flag = true;
            }

            // Make sure errors are empty
            if (!$error_flag) {
                //Validated
                // check and set logged in user
                $loggedInUser = $this->systoolModel->login($data['emp_num']);

                if ($loggedInUser) {
                    //  Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $error_flag = true;
                    $this->view('users/login_pw', $data);
                }
            } else {
                // load view with errors
                //die('errors');
                $this->view('users/login_pw', $data);
            }
        } else {
            // init data
            $data = [
                'emp_num' => '',
                'emp_num_error' => ''
            ];

            //Load view
            $this->view('users/login_pw', $data);
        }
    }

    public function createUserSession($user)
    {
        //$_SESSION['user_id'] = $user->id;
        $_SESSION['user_emp_num'] = $user->emp_num;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_default_venue'] = $user->default_venue;
        $_SESSION['user_default_location'] = $user->default_location;
    }

    public function logout()
    {
        redirect('pages/start_new_trade');
    }

    public function log_off_with_session()
    {
        logoutKeepLocation();
        redirect('pages/index');
        //$this->view('pages/index');
    }

 public function secure_session()
    {
        echo "<br>";
        echo "pages - secure_session function";
        echo "<br>";
        $_SESSION['target_page'] = $_POST['target_page'];
        $_SESSION['session_secure'] = true;
        $_SESSION['error_list'] = [];
        $_SESSION['alert_message'] = '';
        //$this->view($_SESSION['target_page']);
        //redirect($_SESSION['target_page']);
       
        echo "<br>";
        $this->systoolModel->check_security();

        // echo "**********************";
        // echo "<br>";
        // echo "Secure Session - POST:";
        // echo "<br>";
        // print_r($_SESSION);
        // echo "<br>";
        // echo "**********************";

        // echo "**********************";
        // echo "<br>";
        // echo "Secure Session - SESSION:";
        // echo "<br>";
        // print_r($_SESSION);
        // echo "<br>";
        // echo "**********************";
    }

}