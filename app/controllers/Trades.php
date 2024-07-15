<?php
class Trades extends Controller
{
    private $tradeModel;
    //private $userModel;

    // private $error_flag;

    public function __construct()
    {
        $this->tradeModel = $this->model('Trade');
        //$this->userModel = $this->model('User');
    }
    //PAGES

    public function start()
    {
        //logoutKeepLocation();
        startNewTrade();
        $_SESSION['target_page'] = 'trades/start';
        if (DEBUG) {
            echo "TRADE START <br>";
            echo "SESSION: ";
            print_r($_SESSION);
        }

        //die("Debug KILLED at checking login.");

        if (!isLoggedIn()) {
            //redirect('users/login');
            $this->view('users/login');
        } else {
            //flash('message', $_SESSION['emp_name'] . ' logged in. For date: ' . kbm_date_format_micro($_SESSION['date']) . '.');
            $this->view('trades/start');
        }
    }

    public function continue()
    {
        if (DEBUG) {
            echo "<br>";
            echo "SESSION: ";
            echo "<br>";
            print_r($_SESSION);
            echo "</br>";
            echo "POST: ";
            echo "<br>";
            print_r($_POST);
        }

        $this->view('trades/lut_item_find');
    }

    public function new_lut_search()
    {
        if (DEBUG) {
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }
        $this->view('trades/lut_item_find');
    }

    public function quick()
    {
        $data = [
            'page_title' => 'Quick Trade',
            'page_subtitle' => 'Look up Item'
        ];

        $_SESSION['showSessionResetButton'] = true;
        $_SESSION['tradeInProcess'] = 1;
        $this->view('trades/lut_item_find', $data);
    }
    // public function quick_look()
    // {

    //     $_SESSION['target_page'] = thisUrl();
    //     //$this->target_Url 


    //     //Start Trade Worksheet
    //     // $trades = $this->tradeModel->getPosts();

    //     //$data = ['posts' => $trades];

    //     $this->view('trades/lut_item_find');
    // }

    public function lut_item_find()
    {
        $data = [
            'page_title' => 'Trade Worksheet',
            'page_subtitle' => 'Look up Item'
        ];

        $_SESSION['showSessionResetButton'] = true;
        //$this->target_Url 
        $_SESSION['target_page'] = 'trades/lut_item_find';
        if (DEBUG) {
            echo "SESSION: ";
            echo "<br>";
            print_r($_SESSION);
            echo "<br>";
            echo "POST: ";
            print_r($_SESSION);
        }
        $_SESSION['tradeInProcess'] = 1;
        if (!isLoggedIn()) {
            redirect('users/login');
        } else {
            if (!customerConfirmed()) {
                redirect('customers/search');
            }
        }
        $this->view('trades/lut_item_find', $data);
    }

    public function trade_item_new()
    {
        $this->view('trades/trade_item_new');
    }

    public function lut_item_new()
    {
        //$_SESSION['target_page'] = thisUrl();
        //$this->target_Url 

        // if (!isLoggedIn()) {
        //     //echo $this->target_Url;
        //     //die("<br>here we are");
        //     redirect('users/login');
        // }

        // if (!customerConfirmed()) {
        //     //echo $this->target_Url;
        //     //die("<br>here we are");
        //     redirect('customers/index');
        // }






        //Start Trade Worksheet
        // $trades = $this->tradeModel->getPosts();
        //$data = ['posts' => $trades];

        $this->view('trades/lut_item_new');
    }

    public function lut_item_enter()
    {
        $data = [];
        foreach ($_POST as $key => $value) {
            if ($value != '') {
                $entry = array($key => $value);
                $data = array_merge($data, $entry);
            }
        }
        $new_id = $this->tradeModel->enterNewTradeLutItem($data);
        if ($new_id) {
            //echo "new LUT Item ID: " . $new_id;
            //$this->view('trades/lut_item_check', $itemData);
        } else {
            die('<br><br>Something went wrong.<br><br>');
        }
    }

    public function lut_item_edit($id)
    {

        if (!isAdmin()) {
            array_push($_SESSION['error_list'], 'not_admin');
            $this->view('users/login');
        }

        $rawItemData = $this->tradeModel->fetchLutItemById($id);
        if (DEBUG) {
            echo "POST: ";
            print_r($_POST);
            echo "<br>rawItemData: ";
            print_r($rawItemData);
        }


        $itemData = [
            'trade_lu_id' => $id,
            'item_title' => $rawItemData->item_title,
            'medium_description' => $rawItemData->medium_description,
            'long_description' => $rawItemData->long_description,
            'nce_note' => $rawItemData->nce_note,
            'comments' => $rawItemData->comments,
            'categories' => $rawItemData->categories,
            'attributes' => $rawItemData->attributes,
            'vsn' => $rawItemData->vsn,
            'minor' => $rawItemData->minor,
            'family' => $rawItemData->family,
            'ebay_search' => $rawItemData->ebay_search,
            'ref_mint' => $rawItemData->ref_mint,
            'ref_nearmint' => $rawItemData->ref_nearmint,
            'ref_excellent' => $rawItemData->ref_excellent,
            'ref_verygood' => $rawItemData->ref_verygood,
            'ref_average' => $rawItemData->ref_average,
            'ref_fair' => $rawItemData->ref_fair,
            'ref_poor' => $rawItemData->ref_poor,
            'base_price' => $rawItemData->base_price,
            'trade_percent' => $rawItemData->trade_percent,
            'purchase_percent' => $rawItemData->purchase_percent,
            'has_cosmetics' => $rawItemData->has_cosmetics,
            'cosmetic_condition_tuner' => $rawItemData->cosmetic_condition_tuner,
            'condition_cosmetic_mint' => $rawItemData->condition_cosmetic_mint,
            'condition_cosmetic_nearmint' => $rawItemData->condition_cosmetic_nearmint,
            'condition_cosmetic_excellent' => $rawItemData->condition_cosmetic_excellent,
            'condition_cosmetic_verygood' => $rawItemData->condition_cosmetic_verygood,
            'condition_cosmetic_average' => $rawItemData->condition_cosmetic_average,
            'condition_cosmetic_fair' => $rawItemData->condition_cosmetic_fair,
            'condition_cosmetic_poor' => $rawItemData->condition_cosmetic_poor,
            'has_opticals' => $rawItemData->has_opticals,
            'optical_condition_tuner' => $rawItemData->optical_condition_tuner,
            'condition_optical_mint' => $rawItemData->condition_optical_mint,
            'condition_optical_nearmint' => $rawItemData->condition_optical_nearmint,
            'condition_optical_excellent' => $rawItemData->condition_optical_excellent,
            'condition_optical_verygood' => $rawItemData->condition_optical_verygood,
            'condition_optical_average' => $rawItemData->condition_optical_average,
            'condition_optical_fair' => $rawItemData->condition_optical_fair,
            'condition_optical_poor' => $rawItemData->condition_optical_poor,
            'has_mechanicals' => $rawItemData->has_mechanicals,
            'mechanical_condition_tuner' => $rawItemData->mechanical_condition_tuner,
            'condition_mechanical_operational' =>  $rawItemData->condition_mechanical_operational,
            'condition_mechanical_minordefect' =>  $rawItemData->condition_mechanical_minordefect,
            'condition_mechanical_majordefect' => $rawItemData->condition_mechanical_majordefect,
            'condition_mechanical_parts' => $rawItemData->condition_mechanical_parts
        ];
        //$custData = $this->parseCustomerById($id);
        $this->view('trades/lut_item_edit', $itemData);
    }

    public function lut_item_update()
    {
        //remove currency from refence prices
        $ref_mint = kbm_launder_currency($_POST['ref_mint']);
        $ref_nearmint = kbm_launder_currency($_POST['ref_nearmint']);
        $ref_excellent = kbm_launder_currency($_POST['ref_excellent']);
        $ref_verygood = kbm_launder_currency($_POST['ref_verygood']);
        $ref_average = kbm_launder_currency($_POST['ref_average']);
        $ref_fair = kbm_launder_currency($_POST['ref_fair']);
        $ref_poor = kbm_launder_currency($_POST['ref_poor']);
        $_POST['ref_mint'] = $ref_mint;
        $_POST['ref_nearmint'] = $ref_nearmint;
        $_POST['ref_excellent'] = $ref_excellent;
        $_POST['ref_verygood'] = $ref_verygood;
        $_POST['ref_average'] = $ref_average;
        $_POST['ref_fair'] = $ref_fair;
        $_POST['ref_poor'] = $ref_poor;


        if (DEBUG) {
            // echo "POST: ";
            // print_r($_POST);
        }


        if ($this->tradeModel->updateTradeLutItem()) {
            //echo "<br><br>LUT Item Updated<br><br>";
            //flash('message', 'Record for ' . $_POST['medium_description'] . ' updated');
            redirect('pages/admin');
        } else {
            die('<br><br>Something went wrong.<br><br>');
        }
    }

    //*****
    // 2024 02 New confirm Trade tem old name: confirmAddLutItemToTradeSheet
    //*****

    public function list_trade_sheets()
    {
        //echo "not yet";
    }

    public function confirm_lut_item_for_trade_sheet($id)
    {
        $rawItemData = $this->tradeModel->fetchLutItemById($id);
        if (DEBUG) {
            //echo "data: ";
            //print_r($data);
            //echo "</br>";
            //echo "NO POST";
            // print_r($_POST);
            echo "</br>";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
            echo "</br>";
            echo "RAW DATA DUMP: ";
            print_r($rawItemData);
            echo "</br>";
        }

        $itemData = [
            'trade_lu_id' => $id,
            'item_title' => $rawItemData->item_title,
            'medium_description' => $rawItemData->medium_description,
            'long_description' => $rawItemData->long_description,
            'nce_note' => $rawItemData->nce_note,
            'comments' => $rawItemData->comments,
            'categories' => $rawItemData->categories,
            'attributes' => $rawItemData->attributes,
            'vsn' => $rawItemData->vsn,
            'minor' => $rawItemData->minor,
            'family' => $rawItemData->family,
            'ebay_search' => $rawItemData->ebay_search,
            'ref_mint' => $rawItemData->ref_mint,
            'ref_nearmint' => $rawItemData->ref_nearmint,
            'ref_excellent' => $rawItemData->ref_excellent,
            'ref_verygood' => $rawItemData->ref_verygood,
            'ref_average' => $rawItemData->ref_average,
            'ref_fair' => $rawItemData->ref_fair,
            'ref_poor' => $rawItemData->ref_poor,
            'base_price' => $rawItemData->base_price,
            'trade_percent' => $rawItemData->trade_percent,
            'purchase_percent' => $rawItemData->purchase_percent,
            'has_cosmetics' => $rawItemData->has_cosmetics,
            'cosmetic_condition_selected_text' => "Select One",
            'cosmetic_condition_selected_value' => "unset",
            'cosmetic_condition_selected_value_tuner' => $rawItemData->cosmetic_condition_tuner,
            'condition_cosmetic_mint' => $rawItemData->condition_cosmetic_mint,
            'condition_cosmetic_nearmint' => $rawItemData->condition_cosmetic_nearmint,
            'condition_cosmetic_excellent' => $rawItemData->condition_cosmetic_excellent,
            'condition_cosmetic_verygood' => $rawItemData->condition_cosmetic_verygood,
            'condition_cosmetic_average' => $rawItemData->condition_cosmetic_average,
            'condition_cosmetic_fair' => $rawItemData->condition_cosmetic_fair,
            'condition_cosmetic_poor' => $rawItemData->condition_cosmetic_poor,
            'has_opticals' => $rawItemData->has_opticals,
            'optical_condition_selected_text' => "Select One",
            'optical_condition_selected_value' => "unset",
            'optical_condition_selected_value_tuner' => $rawItemData->optical_condition_tuner,
            'condition_optical_mint' => $rawItemData->condition_optical_mint,
            'condition_optical_nearmint' => $rawItemData->condition_optical_nearmint,
            'condition_optical_excellent' => $rawItemData->condition_optical_excellent,
            'condition_optical_verygood' => $rawItemData->condition_optical_verygood,
            'condition_optical_average' => $rawItemData->condition_optical_average,
            'condition_optical_fair' => $rawItemData->condition_optical_fair,
            'condition_optical_poor' => $rawItemData->condition_optical_poor,
            'has_mechanicals' => $rawItemData->has_mechanicals,
            'mechanical_condition_selected_text' => "Select One",
            'mechanical_condition_selected_value' => "unset",
            'mechanical_condition_selected_value_tuner' => $rawItemData->mechanical_condition_tuner,
            'condition_mechanical_operational' =>  $rawItemData->condition_mechanical_operational,
            'condition_mechanical_minordefect' =>  $rawItemData->condition_mechanical_minordefect,
            'condition_mechanical_majordefect' => $rawItemData->condition_mechanical_majordefect,
            'condition_mechanical_parts' => $rawItemData->condition_mechanical_parts
        ];

        if (DEBUG) {
            echo "</br>";
            echo "</br>";
            echo "itemData: ";
            print_r($itemData);
            echo "</br>";
        }

        $_SESSION['target_page'] = 'trades/view_trade_sheet';
        $this->view('trades/confirm_trade_item_for_sheet', $itemData);
    }

    //*****
    // 2024 02 New Send Trade item to Sheet old name: addTradeItemToCurrentTradeSheet
    //*****
    public function send_item_to_trade_sheet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(strip_tags(INPUT_POST));
            if (DEBUG) {
                echo "</br>";
                echo "</br>";
                echo "POST: ";
                print_r($_POST);
                echo "</br>";
                echo "</br>";
                echo "SESSION: ";
                print_r($_SESSION);
                echo "</br>";
            }

            //GET TRADE SHEET ID OR CREATE NEW TRADE SHEET
            if (isset($_SESSION['trade_sheet_id'])) {
                $trade_sheet_id = $_SESSION['trade_sheet_id'];
            } else {
                //CREATE NEW TRADE SHEET AND RETURN ID
                $new_sheet_data = [
                    'client_id' => $_SESSION['customer_id'],
                    'employee_id' => $_SESSION['user_id'],
                    'trade_venue_id' => $_SESSION['venue_id'],
                    'trade_date' => $_SESSION['date']
                ];
                $trade_sheet_id = $this->tradeModel->createNewTradeSheet($new_sheet_data);
                $_SESSION['trade_sheet_id'] = $trade_sheet_id;
            }

            $retail_price = $_POST['retail_price_override'];
            $trade_price = $_POST['trade_price_override'];
            $purchase_price = $_POST['purchase_price_override'];
            $retail_price_clean = str_replace(",", "", ltrim($retail_price, "$"));
            $trade_price_clean = str_replace(",", "", ltrim($trade_price, "$"));
            $purchase_price_clean = str_replace(",", "", ltrim($purchase_price, "$"));

            $item_data = [
                'trade_sheet_id' => $trade_sheet_id,
                'employee_id' => $_SESSION['user_id'],
                'item_title' => $_POST['item_title'],
                'medium_description' => $_POST['medium_description'],
                'long_description' => $_POST['long_description'],
                'comments' => $_POST['comments'],
                'nce_note' => $_POST['nce_note'],
                'categories' => $_POST['categories'],
                'attributes' => $_POST['attributes'],
                'vsn' => $_POST['vsn'],
                'minor' => $_POST['minor'],
                'vendor' => $_POST['family'],
                'cosmetic_condition' => $_POST['cosmetic_condition_selected_text'],
                'optical_condition' => $_POST['optical_condition_selected_text'],
                'mechanical_condition' => $_POST['mechanical_condition_selected_text'],
                'retail_price' => $retail_price_clean,
                'trade_price' => $trade_price_clean,
                'purchase_price' => $purchase_price_clean,
                'serial_num' => $_POST['serial_num_entry'],
                'venue_id' => $_SESSION['venue_id'],
                'has_cosmetics' => $_POST['has_cosmetics'],
                'has_opticals' => $_POST['has_opticals'],
                'has_mechanicals' => $_POST['has_mechanicals'],
                'lut_id' => $_POST['lut_id'],
                'serial_num' => $_POST['serial_num_entry']
            ];

            $trade_item_id = $this->tradeModel->addTradeItemToSheet($item_data);

            if (isset($_SESSION['trade_items'])) {
                addTradeItemToSession($trade_item_id);
            } else {
                $_SESSION['trade_items'] = [$trade_item_id];
            }

            if (DEBUG) {
                // echo "<br>";
                // echo "**********************";
                // echo "<br>";
                // echo "clean retail_price: " . str_replace(",", "", ltrim($retail_price, "$"));
                // echo "<br>";
                // echo "clean trade_price: " . str_replace(",", "", ltrim($trade_price, "$"));
                // echo "<br>";
                // echo "clean purchase_price: " . str_replace(",", "", ltrim($purchase_price, "$"));
                // echo "<br>";
                // echo "<br>";
                // echo "retail_price: " . $retail_price;
                // echo "<br>";
                // echo "trade_price: " . $trade_price;
                // echo "<br>";
                // echo "purchase_price: " . $purchase_price;
                // echo "<br>";
                // echo "<br>";
                // echo "Session: ";
                // echo "<br>";
                // print_r($_SESSION);
                // echo "<br>";
                // echo "<br>";
                // echo "Post: ";
                // echo "<br>";
                // print_r($_POST);
                // echo "<br>";
                // echo "<br>";
                // echo "**********************";
            }
            $_SESSION['target_page'] = 'trades/view_trade_sheet';
            $this->view_trade_sheet($trade_sheet_id);
        } else { // NOT A POST REQEUST
            die("not a post request");
        }
    }
    ///add_new_item_to_trade_sheet
    public function addNewItemToTradeSheet()
    {

        if (DEBUG) {
            // echo "data: ";
            // print_r($data);
            // echo "</br>";
            echo "ADD NEW ITEM TO TRADE SHEET";
            echo "</br>";
            echo "POST: ";
            print_r($_POST);
            echo "</br>";
            echo "</br>";
            echo "SESSION: ";
            print_r($_SESSION);
            echo "</br>";
        }
        // mostly the same as adding lut item

        // once all processed then add item to LUT with new flag set

    }

    public function view_trade_sheet()
    {
        if (isset($_SESSION["trade_sheet_id"])) {
            $trade_sheet_items = $this->tradeModel->fetchTradeSheetItems($_SESSION["trade_sheet_id"]);
            $retail_price_total = 0;
            $trade_price_total = 0;
            $purchase_price_total = 0;
            for ($i = 0; $i < count($trade_sheet_items); $i++) {
                $retail_price_total += $trade_sheet_items[$i]->retail_price;
                $trade_price_total += $trade_sheet_items[$i]->trade_price;
                $purchase_price_total += $trade_sheet_items[$i]->purchase_price;
            }
            $data = [
                'trade_sheet_items' => $trade_sheet_items,
                'retail_price_total' => $retail_price_total,
                'trade_price_total' => $trade_price_total,
                'purchase_price_total' => $purchase_price_total
            ];
            $this->view('trades/trade_sheet_view', $data);
        } else {
            $_SESSION["error_list"] = "Session does not contain Trade Sheet ID";
            $this->view('trades/trade_start');
        }
    }

    public function print()
    {
        $items_array = $_SESSION['trade_items'];
        $item_rows = [];

        for ($i = 0; $i < count($items_array); $i++) {
            $this_row_item = $this->tradeModel->fetchTradeItemById($items_array[$i]);
            array_push($item_rows, $this_row_item);
        }
        // echo "<br>";
        // echo "SESSION:";
        // echo "<br>";
        // print_r($_SESSION);
        // echo "<br>";
        // echo "POST:";
        // print_r($_POST);
        // echo "<br>";
        // echo "<br>";
        $_SESSION['trade_rows'] = $item_rows;
        // $this->view('trades/print', $_SESSION);
        $this->view('trades/print', $item_rows);
    }

    //HELPER FUNCTIONS

    // public function hunt_btn_data()
    // {
    //     $this->view('trades/hunt_btn_data');
    // }

    public function minor_codes_default_price_matrix_data()
    {
        $this->view('trades/minor_codes_default_price_matrix_data');
    }

    public function liveSearchLoose($input)
    {
        // search for [] signs in search
        //echo "input: " . $input;
        //change it to a space
        $input = str_replace("[]", " ", $input);
        $items = $this->tradeModel->fetchLooseTradeLut($input);
        $dataJSON = json_encode($items);
        renderJSON($dataJSON);
    }

    public function liveSearchStrict($input)
    {
        // echo "input: " . $input;
        // echo "<br>";
        // search for [] signs in search
        //change it to a space
        $input = str_replace("[]", " ", $input);
        // echo "new input: " . $input;
        // echo "<br><br>";

        $items = $this->tradeModel->fetchStrictTradeLut($input);
        $dataJSON = json_encode($items);
        renderJSON($dataJSON);
    }

    // public function liveSearchHunt($input)
    // {

    //     $items = $this->tradeModel->fetchHuntItems($input);


    //     $dataJSON = json_encode($items);
    //     renderJSON($dataJSON);
    // }

    public function fetchStockTable($itemName, $minorCode)
    {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, 'http://172.30.212.131/used/old_used.php?STORE=01&NOCOLOR=t'); //wrong ip
        curl_setopt($ch, CURLOPT_URL, 'http://172.30.202.131/used/old_used.php?&NOCOLOR=t'); //correct ip
        // set the timeoput for the connection
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        // Set the HTTP method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        // Return the response instead of printing it out
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Send the request and store the result in $response
        $response = curl_exec($ch);
        $responseStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
        //$responseHTML = 'HTTP Status Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
        if ($responseStatus == 0) {
            $matched = "offline";
        } else {
            $responseStream  =  $response . PHP_EOL;

            // Close cURL resource to free up system resources
            curl_close($ch);

            $pattern = [
                '/(<html>.*Minor Code<\/TD>\s*<\/TR>)/imus',
                '/(<\/tbody>.*<html>)/imus',
                '/( align="left" class=".*")/i',
                // '/\s*/',
                '/(<TR>)/i',
                '/(<TD>)/i'
            ];

            $tableResponse = preg_replace($pattern, "", $responseStream);

            $tableResponse = str_ireplace('<TD ', '', $tableResponse);
            $rawResponseArray = explode("</TR>", $tableResponse);
            array_pop($rawResponseArray);


            $responseArray = [];
            foreach ($rawResponseArray as $instance) {
                $tempArray = explode("</TD>", $instance);
                array_pop($tempArray);
                array_push($responseArray, $tempArray);
            }
            // ************  DOES THIS STOCK ITEM MATCH THE FOUND ITEM ************//
            $matched = [];
            foreach ($responseArray as $items) {
                similar_text($items[1], $itemName, $percent);
                if (($percent > 70) && $items[5] == $minorCode) {

                    array_push($matched, $items);
                }
            }
        }
        // print_r($responseArray[1]);
        return $matched;
    }
}
