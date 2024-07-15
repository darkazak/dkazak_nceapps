<?php
class Customers extends Controller
{
    // private $tradeModel;
    //private $userModel;
    private $customerModel;
    // private $error_flag;

    public function __construct()
    {
        $this->customerModel = $this->model('Customer');
        //$this->tradeModel =  $this->model('Trade');
        //$this->userModel = $this->model('User');
    }

    ////// PAGES ///////////


    public function index()
    {
        if (DEBUG) {
            echo "Session: ";
            print_r($_SESSION);
            echo "</br>";
        }
        $this->view('customers/search');
    }

    public function search()
    {
        if (DEBUG) {
            echo "POST: ";
            print_r($_POST);
            echo "</br>";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }
        $this->view('customers/search');
    }

    public function new()
    {

        $error_flag = false;
        // $dupe_msg_1 = "";
        // $dupe_msg_2 = "";
        $dupe_last_name = "";
        // $error_msg = "";

        // if (DEBUG) {
        // echo "Session: ";
        // print_r($_SESSION);
        echo "</br>";
        echo "</br>";
        echo "Post: ";
        print_r($_POST);
        echo "</br>";
        // }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(strip_tags(INPUT_POST));
            // init data
            $data = [
                'last_name' => trim($_POST['last_name']),
                'first_name' => trim($_POST['first_name']),
                'email' => trim($_POST['email']),
                'phone_num' => trim($_POST['phone_num']),
                'address_1' => trim($_POST['address_1']),
                'address_2' => trim($_POST['address_2']),
                'city' => trim($_POST['city']),
                'state' => trim($_POST['state']),
                'zip_code' => trim($_POST['zip_code']),
                'client_note' =>  trim($_POST['client_note']),
                'last_name_error' => trim($_POST['last_name_error']),
                'first_name_error' => trim($_POST['first_name_error']),
                'email_error' => trim($_POST['email_error']),
                'phone_num_error' => trim($_POST['phone_num_error']),
                'dup_found' => trim($_POST['dup_found']),
                'email_dup_override' => trim($_POST['email_dup_override']),
                'phone_num_dup_override' => trim($_POST['phone_num_dup_override']),
                'dupe_last_name' => trim($_POST['dupe_last_name'])
            ];

            //Validate lname
            if (empty($data['last_name'])) {
                $data['last_name_error'] = 'Last Name cannnot be empty.';
                $error_flag = true;
                // $error_level = "warning";
                // $error_msg_3 = "Please enter a full address.";
            }
            //Validate fname
            // if (empty($data['first_name'])) {
            //     $data['first_name_error'] = 'First Name shouldn&apos;t be empty.';
            //     $error_flag = true;
            // }

            //Validate email
            $emailTestCustomer = $this->customerModel->getCustomerByEmail($data['email']);
            if ($emailTestCustomer) {
                if ($data['email_dup_override'] != 'on') {
                    $data['email_error'] = $emailTestCustomer->FName . ' ' .  $emailTestCustomer->LName . ' already has a record with this email.';
                    //$data['dupe_last_name'] = $emailTestCustomer->LName;
                    $error_flag = true;
                    $data['dup_found'] = "yes";
                }
            }
            // }

            //Validate phone_num
            $phoneTestCustomer = $this->customerModel->getCustomerByPhone($data['phone_num']);
            if ($phoneTestCustomer) {
                if ($data['phone_num_dup_override'] != 'on') {
                    $data['phone_num_error'] =  $phoneTestCustomer->FName . ' ' .  $phoneTestCustomer->LName . ' already has a record with this phone number.';
                    //$data['dupe_last_name'] = $phoneTestCustomer->LName;
                    $error_flag = true;
                    //$error_level = "danger";
                    $data['dup_found'] = "yes";
                }
            }

            //Validate address 1
            // if (empty($data['address_1'])) {
            //     $data['address_1_error'] = 'Please enter an address.';
            //     //$error_flag = true;
            //     // $error_level = "warning";
            //     // $error_msg_3 = "Please enter a full address.";
            // }

            // //Validate city
            // if (empty($data['city'])) {
            //     $data['city_error'] = 'Please enter a City.';
            //     //$error_flag = true;
            //     // $error_level = "warning";
            //     // $error_msg_3 = "Please enter a full address.";
            // }

            // //Validate state
            // if (empty($data['state'])) {
            //     $data['state_error'] = 'Please';
            //     //$error_flag = true;
            //     // $error_level = "warning";
            //     // $error_msg_3 = "Please enter a full address.";
            // }

            // //Validate zip code
            // if (empty($data['zip_code'])) {
            //     $data['zip_code_error'] = 'Pretty Please';
            //     //$error_flag = true;
            //     // $error_level = "warning";
            //     // $error_msg_3 = "Please enter a full address.";
            // }

            if ($error_flag) {
                $this->view('customers/form', $data);
            } else {  // NO ERROR FLAGS
                $new_id = $this->customerModel->enterNewCustomer($data);

                // echo "Session: ";
                // print_r($_SESSION);
                // echo "</br>";
                // echo "</br>";
                // echo "Post: ";
                // print_r($_POST);
                // echo "</br>";
                // echo "</br>";
                // echo "URLROOT: " . URLROOT;
                // echo "</br>";
                // echo "</br>";
                // echo "new_id: " . $new_id;
                $_SESSION['customer_id'] = $new_id;
                $_SESSION['customer_name'] = $_POST['first_name'] . ' ' . $_POST['last_name'];
                $_SESSION['customer_phone'] = $_POST['phone_num'];
                $_SESSION['customer_email'] = $_POST['email'];
                $_SESSION['customer_address_1'] = $_POST['address_1'];
                $_SESSION['customer_address_2'] = $_POST['address_2'];
                $_SESSION['customer_city'] = $_POST['city'];
                $_SESSION['customer_state'] = $_POST['state'];
                $_SESSION['customer_zip_code'] = $_POST['zip_code'];

                redirect('trades/lut_item_find');
            }
        } else {
            //die('not a post request.');
            $this->view('customers/new');
        }
    }

    public function edit($id)
    {

        echo "</br>";
        echo "GET request";
        echo "</br>";

        $cust_record = $this->customerModel->getCustomerById($id);
        $cust_data = [
            'Client_ID' => $cust_record->Client_ID,
            'last_name' => $cust_record->LName,
            'first_name' => $cust_record->FName,
            'email' => $cust_record->email,
            'phone_num' => $cust_record->phone,
            'address_1' => $cust_record->address_1,
            'address_2' => $cust_record->address_2,
            'city' => $cust_record->city,
            'state' => $cust_record->state,
            'zip_code' => $cust_record->zip_code,
            'client_note' => $cust_record->client_note
        ];


        $_SESSION['customer_id'] = $cust_record->Client_ID;
        $_SESSION['customer_name'] = $cust_record->FName . ' ' . $cust_record->LName;
        $_SESSION['customer_phone'] = $cust_record->phone;
        $_SESSION['customer_email'] = $cust_record->email;
        $_SESSION['customer_address_1'] = $cust_record->address_1;
        $_SESSION['customer_address_2'] = $cust_record->address_2;
        $_SESSION['customer_city'] = $cust_record->city;
        $_SESSION['customer_state'] = $cust_record->state;
        $_SESSION['customer_zip_code'] = $cust_record->zip_code;

        $this->view('customers/edit', $cust_data);
    }

    public function update()
    {
        echo "<br>";
        echo "UPDATE PROCESSING";
        echo "<br>";
        echo "<br>";
        echo "POST: ";
        echo "<br>";
        print_r($_POST);
        echo "<br>";
        echo "<br>";

        $data = [
            'Client_ID' =>  $_SESSION['customer_id'],
            'last_name' => $_POST['last_name'],
            'first_name' => $_POST['first_name'],
            'email' => $_POST['email'],
            'phone_num' => $_POST['phone_num'],
            'address_1' => $_POST['address_1'],
            'address_2' => $_POST['address_2'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'zip_code' => $_POST['zip_code'],
            'client_note' => $_POST['client_note']
        ];

        if ($this->customerModel->updateCustomer($data)) {
            //$_SESSION['customer_id'] = $new_id;
            $_SESSION['customer_name'] = $_POST['first_name'] . ' ' . $_POST['last_name'];
            $_SESSION['customer_phone'] = $_POST['phone_num'];
            $_SESSION['customer_email'] = $_POST['email'];
            $_SESSION['customer_address_1'] = $_POST['address_1'];
            $_SESSION['customer_address_2'] = $_POST['address_2'];
            $_SESSION['customer_city'] = $_POST['city'];
            $_SESSION['customer_state'] = $_POST['state'];
            $_SESSION['customer_zip_code'] = $_POST['zip_code'];
            $_SESSION['client_note'] = $_POST['client_note'];
            redirect($_SESSION['target_page']);
            //}
        } else {
            $_SESSION['flash_message'] = [
                'type' => "error",
                'msg' => "Error updating Client Data."
            ];
            $this->view('trades/start');
        }
    }

    ///////  FUNCTIONS ///////////

    public function livesearch($input)
    {
        $items = $this->customerModel->fetchCustomers($input);
        $dataJSON = json_encode($items);
        print_r($dataJSON);
    }

    public function check_found_customer($id)
    {

        //$_SESSION['target_page'] = 'trades/lut_item_find';


        if (DEBUG) {
            echo "POST: ";
            print_r($_POST);
            echo "</br>";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
            echo "ID Data: ";
            print_r($id);
            echo "<br>";
            echo "<br>";
        }


        $cust_record = $this->customerModel->getCustomerById($id);




        // $phoneNum =  kbm_phone_num_format($customer->phone);
        // $email =  strtoupper($customer->email);
        // if ($email == '') {
        //     $email = '<em>no email</em>';
        // }
        // $fmName = ucwords(strtolower($customer->LName)) . ', ' . ucwords(strtolower($customer->FName));
        // $data = [
        //     'client_Id' => $id,
        //     'fmName' => $fmName,
        //     'phoneNum' => $phoneNum,
        //     'email' => $email
        // ];

        // $custData = $this->parseCustomerById($id);



        $custDataObj = [
            'Client_ID' => $cust_record->Client_ID,
            'last_name' => $cust_record->LName,
            'first_name' => $cust_record->FName,
            'email' => $cust_record->email,
            'phone_num' => $cust_record->phone,
            'address_1' => $cust_record->address_1,
            'address_2' => $cust_record->address_2,
            'city' => $cust_record->city,
            'state' => $cust_record->state,
            'zip_code' => $cust_record->zip_code
        ];

        $_SESSION['customer_id'] = $cust_record->Client_ID;
        $_SESSION['customer_name'] = $cust_record->FName . ' ' . $cust_record->LName;
        $_SESSION['customer_phone'] = $cust_record->phone;
        $_SESSION['customer_email'] = $cust_record->email;
        $_SESSION['customer_address_1'] = $cust_record->address_1;
        $_SESSION['customer_address_2'] = $cust_record->address_2;
        $_SESSION['customer_city'] = $cust_record->city;
        $_SESSION['customer_state'] = $cust_record->state;
        $_SESSION['customer_zip_code'] = $cust_record->zip_code;

        if (DEBUG) {
            echo "</br>";
            echo "custDataObj: ";
            echo "<br>";
            print_r($custDataObj);
            echo "<br>";
        }
        $this->view('customers/check_found_customer', $custDataObj);
    }

    public function add_customer_to_session($id)
    {
        //  last_name] => sfg [first_name] => sgsdg [email] => kjbfkjebf@h.hom [phone_num] => 12398976540 [address_1] => [address_2] => [city] => [state] => [zip_code]

        // $custData = $this->parseCustomerById($id);
        $_SESSION['customer_id'] = $id;
        $_SESSION['customer_name'] = $_POST['first_name'] . ' ' . $_POST['last_name'];
        $_SESSION['customer_phone'] = $_POST['phone_num'];
        $_SESSION['customer_email'] = $_POST['email'];
        $_SESSION['customer_address_1'] = $_POST['address_1'];
        $_SESSION['customer_address_2'] = $_POST['address_2'];
        $_SESSION['customer_city'] = $_POST['city'];
        $_SESSION['customer_state'] = $_POST['state'];
        $_SESSION['customer_zip_code'] = $_POST['zip_code'];

        redirect($_SESSION['target_page']);
    }

    public function removeSesssionCustomer()
    {

        unset($_SESSION['customer_id']);
        // $_SESSION['customer_name'] = $user->emp_num;
        // $_SESSION['customer_phone'] = $user->name;
        // $_SESSION['customer_email'] = $user->name;

    }

    // public function parseCustomerById($id)
    // {
    //     $customer = $this->customerModel->getCustomerById($id);
    //     $phoneNum =  kbm_phone_num_format($customer->phone);
    //     $email =  strtoupper($customer->email);
    //     if ($email == '') {
    //         $email = '<em>no email</em>';
    //     }
    //     $fmName = ucwords(strtolower($customer->LName)) . ', ' . ucwords(strtolower($customer->FName));
    //     $custData = [
    //         'client_Id' => $id,
    //         'fmName' => $fmName,
    //         'phoneNum' => $phoneNum,
    //         'email' => $email,
    //         'address_1' => $customer->address_1,
    //         'address_2' => $customer->address_2,
    //         'city' => $customer->city,
    //         'state' => $customer->state,
    //         'zip_code' => $customer->zip_code
    //     ];

    //     return $custData;
    // }




    // public function edit($id)
    // {
    //     $error_flag = false;

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         //Sanitize the post
    //          $_POST = filter_input_array(strip_tags(INPUT_POST));
    //         $data = [
    //             'id' => $id,
    //             'title' => trim($_POST['title']),
    //             'body' => trim($_POST['body']),
    //             'user_id' => $_SESSION['user_id'],
    //             'title_error' => '',
    //             'body_error' => ''
    //         ];

    //         // Validate data
    //         if (empty($data['title'])) {
    //             $data['title_error'] = 'Please enter a title';
    //             $error_flag = true;
    //         }
    //         if (empty($data['body'])) {
    //             $data['body_error'] = 'Please enter some copy for your post';
    //             $error_flag = true;
    //         }

    //         if (!$error_flag) {
    //             // Validated
    //             if ($this->postModel->updatePost($data)) {
    //                 flash('post_message', 'Post Updated');
    //                 redirect('posts/show/' . $id);
    //             } else {
    //                 die('Something went wrong');
    //             }
    //         } else {
    //             // load view with errors
    //             flash('post_message', 'Entry Errors', 'alert alert-danger');
    //             $this->view('posts/edit', $data);
    //         }
    //     } else {
    //         // Get existing post from model
    //         $post = $this->postModel->getPostById($id);

    //         // Check if current user is owner
    //         if ($post->user_id != $_SESSION['user_id']) {
    //             flash('post_message', 'You can not edit another user&apos;s post.', 'alert alert-danger');
    //             redirect('posts');
    //         }

    //         $data = [
    //             'id' => $id,
    //             'title' => $post->title,
    //             'body' => $post->body
    //         ];

    //         $this->view('posts/edit', $data);
    //     }
    // }

}
