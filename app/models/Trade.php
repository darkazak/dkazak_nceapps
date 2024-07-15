<?php
class Trade
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function updateTradeLutItem()
    {
        $builtQuery = 'UPDATE `trade-lookup` SET ';
        $builtQuery .= '`edited_flag` = :edited_flag';
        $builtQuery .= ', `new_flag` = :new_flag';
        $builtQuery .= ', `review_flag` = :review_flag';
        $builtQuery .= ', `medium_description` = :medium_description ';
        $builtQuery .= ', `comments` = :comments';
        $builtQuery .= ', `vsn` = :vsn';
        $builtQuery .= ', `minor` = :minor';
        $builtQuery .= ', `family` = :family';
        $builtQuery .= ', `item_title` = :item_title';
        $builtQuery .= ', `base_price` = :base_price';
        $builtQuery .= ', `trade_percent` = :trade_percent';
        $builtQuery .= ', `purchase_percent` = :purchase_percent';
        $builtQuery .= ', `cosmetic_condition_tuner` = :cosmetic_condition_tuner';
        $builtQuery .= ', `optical_condition_tuner` = :optical_condition_tuner';
        $builtQuery .= ', `mechanical_condition_tuner` = :mechanical_condition_tuner';
        $builtQuery .= ', `has_cosmetics` = :has_cosmetics';
        $builtQuery .= ', `has_mechanicals` = :has_mechanicals';
        $builtQuery .= ', `has_opticals` = :has_opticals';
        $builtQuery .= ', `condition_cosmetic_mint` = :condition_cosmetic_mint';
        $builtQuery .= ', `condition_cosmetic_nearmint` = :condition_cosmetic_nearmint';
        $builtQuery .= ', `condition_cosmetic_excellent` = :condition_cosmetic_excellent';
        $builtQuery .= ', `condition_cosmetic_verygood` = :condition_cosmetic_verygood';
        $builtQuery .= ', `condition_cosmetic_average` = :condition_cosmetic_average';
        $builtQuery .= ', `condition_cosmetic_fair` = :condition_cosmetic_fair';
        $builtQuery .= ', `condition_cosmetic_poor` = :condition_cosmetic_poor';
        $builtQuery .= ', `condition_mechanical_operational` = :condition_mechanical_operational';
        $builtQuery .= ', `condition_mechanical_majordefect` = :condition_mechanical_majordefect';
        $builtQuery .= ', `condition_mechanical_parts` = :condition_mechanical_parts';
        $builtQuery .= ', `condition_optical_mint` = :condition_optical_mint';
        $builtQuery .= ', `condition_optical_nearmint` = :condition_optical_nearmint';
        $builtQuery .= ', `condition_optical_excellent` = :condition_optical_excellent';
        $builtQuery .= ', `condition_optical_verygood` = :condition_optical_verygood';
        $builtQuery .= ', `condition_optical_average` = :condition_optical_average';
        $builtQuery .= ', `condition_optical_fair` = :condition_optical_fair';
        $builtQuery .= ', `condition_optical_poor` = :condition_optical_poor';
        $builtQuery .= ', `categories` = :categories';
        $builtQuery .= ', `attributes` = :attributes';
        $builtQuery .= ', `nce_note` = :nce_note';
        $builtQuery .= ', `ref_mint` = :ref_mint';
        $builtQuery .= ', `ref_nearmint` = :ref_nearmint';
        $builtQuery .= ', `ref_excellent` = :ref_excellent';
        $builtQuery .= ', `ref_verygood` = :ref_verygood';
        $builtQuery .= ', `ref_average` = :ref_average';
        $builtQuery .= ', `ref_fair` = :ref_fair';
        $builtQuery .= ', `ref_poor` = :ref_poor';
        $builtQuery .= ', `ebay_search` = :ebay_search';
        $builtQuery .= ', `long_description` = :long_description';
        $builtQuery .= ' WHERE ';
        $builtQuery .= '`trade-lookup`.`trade_lu_id` = :trade_lu_id';


        $this->db->query($builtQuery);

        $this->db->bind(':trade_lu_id', $_POST['trade_lu_id']);
        $this->db->bind(':edited_flag', '0');
        $this->db->bind(':new_flag', '0');
        $this->db->bind(':review_flag', '0');
        $this->db->bind(':medium_description', $_POST['medium_description']);
        $this->db->bind(':comments', $_POST['comments']);
        $this->db->bind(':vsn', $_POST['vsn']);
        $this->db->bind(':minor', $_POST['minor']);
        $this->db->bind(':family', $_POST['family']);
        $this->db->bind(':item_title', $_POST['item_title']);
        $this->db->bind(':base_price', $_POST['base_price']);
        $this->db->bind(':trade_percent', $_POST['trade_percent']);
        $this->db->bind(':purchase_percent', $_POST['purchase_percent']);
        $this->db->bind(':cosmetic_condition_tuner', $_POST['cosmetic_condition_tuner']);
        $this->db->bind(':optical_condition_tuner', $_POST['optical_condition_tuner']);
        $this->db->bind(':mechanical_condition_tuner', $_POST['mechanical_condition_tuner']);
        $this->db->bind(':has_cosmetics', $_POST['has_cosmetics']);
        $this->db->bind(':has_mechanicals', $_POST['has_mechanicals']);
        $this->db->bind(':has_opticals', $_POST['has_opticals']);
        $this->db->bind(':condition_cosmetic_mint', $_POST['condition_cosmetic_mint']);
        $this->db->bind(':condition_cosmetic_nearmint', $_POST['condition_cosmetic_nearmint']);
        $this->db->bind(':condition_cosmetic_excellent', $_POST['condition_cosmetic_excellent']);
        $this->db->bind(':condition_cosmetic_verygood', $_POST['condition_cosmetic_verygood']);
        $this->db->bind(':condition_cosmetic_average', $_POST['condition_cosmetic_average']);
        $this->db->bind(':condition_cosmetic_fair', $_POST['condition_cosmetic_fair']);
        $this->db->bind(':condition_cosmetic_poor', $_POST['condition_cosmetic_poor']);
        $this->db->bind(':condition_mechanical_operational', $_POST['condition_mechanical_operational']);
        $this->db->bind(':condition_mechanical_majordefect', $_POST['condition_mechanical_majordefect']);
        $this->db->bind(':condition_mechanical_parts', $_POST['condition_mechanical_parts']);
        $this->db->bind(':condition_optical_mint', $_POST['condition_optical_mint']);
        $this->db->bind(':condition_optical_nearmint', $_POST['condition_optical_nearmint']);
        $this->db->bind(':condition_optical_excellent', $_POST['condition_optical_excellent']);
        $this->db->bind(':condition_optical_verygood', $_POST['condition_optical_verygood']);
        $this->db->bind(':condition_optical_average', $_POST['condition_optical_average']);
        $this->db->bind(':condition_optical_fair', $_POST['condition_optical_fair']);
        $this->db->bind(':condition_optical_poor', $_POST['condition_optical_poor']);
        $this->db->bind(':categories', $_POST['categories']);
        $this->db->bind(':attributes', $_POST['attributes']);
        $this->db->bind(':nce_note', $_POST['nce_note']);
        $this->db->bind(':ref_mint', $_POST['ref_mint']);
        $this->db->bind(':ref_nearmint', $_POST['ref_nearmint']);
        $this->db->bind(':ref_excellent', $_POST['ref_excellent']);
        $this->db->bind(':ref_verygood', $_POST['ref_verygood']);
        $this->db->bind(':ref_average', $_POST['ref_average']);
        $this->db->bind(':ref_fair', $_POST['ref_fair']);
        $this->db->bind(':ref_poor', $_POST['ref_poor']);
        $this->db->bind(':ebay_search', $_POST['ebay_search']);
        $this->db->bind(':long_description', $_POST['long_description']);

        //echo "<br><br>Query:<br>" . $builtQuery;


        // Execute
        if ($this->db->execute()) {
            // echo "<br><br>";
            // echo 'db executed successfully';
            // echo '<br>';
            // echo 'TRADE ITEM LUT ID: ' . $_POST['trade_lu_id'];
            return true;
        } else {
            // echo "<br><br>";
            // echo 'db failed';
            return false;
        }
    }

    public function enterNewTradeLutItem($data)
    {
        // build the query for each data item that has a value
        $query = 'INSERT INTO `NCE_TRADE`.`trade-lookup`(';
        foreach ($data as $key => $value) {
            $query .= '`' . $key . '`, ';
        }
        $query .= '`edited_flag`, ';
        $query .= '`new_flag`';
        $query .= ') VALUES (';
        foreach ($data as $key => $value) {
            $query .= "'" . $value . "', ";
        }
        $query .= 'false, ';
        $query .= 'true';
        $query .= ')';

        // NO BINDING NECESSARY
        // built query with values post data
        $this->db->query($query);

        // Execute       
        if ($this->db->execute()) {
            //echo '<br> db->executed successfully';
            $new_id = $this->db->lastInsertId();
            return $new_id;
        } else {
            //echo '<br> db->not so much';
            return false;
        }
    }

    public function fetchStrictTradeLut($input)
    {

        $this->db->query(
            "SELECT `trade_lu_id`, `item_title`, `medium_description`, `comments`,`attributes`,`vsn`,`minor`,`family` FROM `trade-lookup` WHERE `item_title` LIKE '" . $input . "%' "
        );


        $results = $this->db->resultSet();
        return $results;
    }

    public function fetchLooseTradeLut($input)
    {
        $this_query = "SELECT `trade_lu_id`, `item_title`,`medium_description`,`comments`,`attributes`,`vsn`,`minor`,`family` FROM `trade-lookup` ";
        $searchArr = explode("-|-", $input);
        $this_entry = str_replace("@@", "%", $searchArr[0]);
        $this_query .= "WHERE `medium_description` LIKE '%" . $this_entry . "%' ";
        for ($x = 1; $x < count($searchArr); $x++) {
            $this_entry = str_replace("@@", "%", $searchArr[$x]);
            $this_query .= "AND `medium_description` LIKE '%" .  $this_entry . "%' ";
        }
        //$results = $this_query;
        $this->db->query(
            $this_query
        );
        $results = $this->db->resultSet();
        return $results;
    }

    public function getLutItemsForAdminByTitle($title)
    {
        echo "<br>";
        echo "made it to the DB call";
        $this->db->query(
            "SELECT `trade_lu_id`, `item_title`, `comments`,`vsn`,`minor`,`family`, `base_price`, trade_percent`, `purchase_percent`, `has_opticals`, `has_mechanicals` FROM `NCE_TRADE`.`trade-lookup` WHERE `medium_description` LIKE '%" . $title . "%' AND `review_flag` = '1' "
        );
        $results = $this->db->resultSet();
        echo "<br> RESULTS <br>";
        print_r($results);
        //return $results;
    }

    public function fetchLutItemById($id)
    {
        $this->db->query(
            "SELECT * FROM `trade-lookup` WHERE `trade_lu_id` = " . $id
        );
        $result = $this->db->single();
        return $result;
    }

    public function fetchTradeItemById($id)
    {
        $this->db->query(
            "SELECT * FROM `NCE_INVENTORY`.`trade-items` WHERE `trade_item_id` = " . $id
        );
        $result = $this->db->single();
        return $result;
    }


    public function createNewTradeSheet($data)
    {

        if (DEBUG) {
            echo "********************************";
            echo "<br>";
            echo "CREATING A NEW TRADE SHEET";
            echo "<br>";
            echo "Data:";
            echo "<br>";
            print_r($data);
        }

        $this->db->query("INSERT INTO `NCE_TRADE`.`trade-sheets`(`client_id`, `employee_id`, `venue_id`, `trade_date`) VALUES (:client_id,:employee_id,:venue_id,:trade_date)");
        $this->db->bind(':client_id', $data['client_id']);
        $this->db->bind(':employee_id', $data['employee_id']);
        $this->db->bind(':venue_id', $data['trade_venue_id']);
        $this->db->bind(':trade_date', $data['trade_date']);

        if ($this->db->execute()) {
            $new_id = $this->db->lastInsertId();
            return $new_id;
        } else {
            return false;
        }
    }

    public function addTradeItemToSheet($data)
    {
        if (DEBUG) {
            echo "<br>";
            echo "<br>";
            echo "********************************";
            echo "<br>";
            echo "INSERTING INTO TRADE ITEMS TABLE";
            echo "<br>";
            echo "Data:";
            echo "<br>";
            print_r($data);
            echo "<br>";
            echo "********************************";
        }


        //$query = "INSERT INTO `NCE_INVENTORY`.`trade-items`(`trade_sheet_id`,`item_title`,`medium_description`,`long_description`,`comments`,`nce_note`,`categories`,`attributes`,`vsn`,`minor`,`vendor`,`cosmetic_condition`,`optical_condition`,`mechanical_condition`,`retail_price`,`trade_price`,`purchase_price`,`serial_num`,`venue`,`location`,`has_cosmetics`,`has_opticals`,`has_mechanicals`,`serial_num`,`lut_id`) VALUES (:trade_sheet_id,:item_title,:medium_description,:long_description,:comments,:nce_note,:categories,:attributes,:vsn,:minor,:vendor,:cosmetic_condition,:optical_condition,:mechanical_condition,:retail_price,:trade_price,:purchase_price,:serial_num,:venue,:location,:has_cosmetics,:has_opticals,:has_mechanicals,:serial_num`,:lut_id)";

        $query = "INSERT INTO `NCE_INVENTORY`.`trade-items`(`trade_sheet_id`,`employee_id`,`item_title`,`medium_description`,`long_description`,`comments`,`nce_note`,`categories`,`attributes`,`vsn`,`minor`,`vendor`,`cosmetic_condition`,`optical_condition`,`mechanical_condition`,`retail_price`,`trade_price`,`purchase_price`,`serial_num`,`venue_id`,`has_cosmetics`,`has_opticals`,`has_mechanicals`,`lut_id`) VALUES (:trade_sheet_id, :employee_id,:item_title,:medium_description,:long_description,:comments,:nce_note,:categories,:attributes,:vsn,:minor,:vendor,:cosmetic_condition,:optical_condition,:mechanical_condition,:retail_price,:trade_price,:purchase_price,:serial_num,:venue_id,:has_cosmetics,:has_opticals,:has_mechanicals,:lut_id)";


        $this->db->query($query);

        $this->db->bind(':trade_sheet_id',  $data['trade_sheet_id']);
        $this->db->bind(':employee_id',  $data['employee_id']);
        $this->db->bind(':item_title', $data['item_title']);
        $this->db->bind(':medium_description', $data['medium_description']);
        $this->db->bind(':long_description', $data['long_description']);
        $this->db->bind(':comments', $data['comments']);
        $this->db->bind(':nce_note', $data['nce_note']);
        $this->db->bind(':categories', $data['categories']);
        $this->db->bind(':attributes', $data['attributes']);
        $this->db->bind(':vsn', $data['vsn']);
        $this->db->bind(':minor', $data['minor']);
        $this->db->bind(':vendor', $data['vendor']);
        $this->db->bind(':cosmetic_condition', $data['cosmetic_condition']);
        $this->db->bind(':optical_condition', $data['optical_condition']);
        $this->db->bind(':mechanical_condition', $data['mechanical_condition']);
        $this->db->bind(':retail_price', $data['retail_price']);
        $this->db->bind(':trade_price', $data['trade_price']);
        $this->db->bind(':purchase_price', $data['purchase_price']);
        $this->db->bind(':serial_num', $data['serial_num']);
        $this->db->bind(':venue_id', $data['venue_id']);
        $this->db->bind(':has_cosmetics', $data['has_cosmetics']);
        $this->db->bind(':has_opticals', $data['has_opticals']);
        $this->db->bind(':has_mechanicals', $data['has_mechanicals']);
        $this->db->bind(':lut_id', $data['lut_id']);


        if ($this->db->execute()) {
            $new_id = $this->db->lastInsertId();
            // echo  "<br><br>LAST INSERT ID: ";
            // echo  $new_id;
            return $new_id;
            //     // } else {
            //     //     return false;
            //     // }
        } else {
            die("Database Error");
        }
        // echo "<br>";
        // echo "TEST - this far execute()";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "data test: " . $data['trade_sheet_id'];
        // echo "<br>";
        // echo "<br>";
    }

    public function fetchTradeSheetItems($sheet_id)
    {
        // $sheet_id = "5";
        $this->db->query(
            "SELECT * FROM `NCE_INVENTORY`.`trade-items` WHERE `trade_sheet_id` = " . $sheet_id
        );
        $results = $this->db->resultSet();
        return $results;
    }

    // public function checkSerialNumber($serial_num, $vendor) {

    //     //echo "<br><br>serial number check: " . $serial_num . "<br><br>";

    //     if ($serial_num == "no serial number") {
    //         return true;
    //     } else {
    //         $this->db->query('SELECT * FROM `NCE_INVENTORY`.`trade-items``trade-items` WHERE `serial_num` = :serial_num AND `vendor` = :vendor');
    //         //Bind Value
    //         $this->db->bind(':serial_num', $serial_num);
    //         $this->db->bind(':vendor', $vendor);
    //         $row = $this->db->single();
    //         //Check row

    //         echo "<br><br>rowcount: " . $this->db->rowCount() . "<br><br>";
    //         if ($this->db->rowCount() > 0) {
    //             return false;
    //         } else {
    //             return true;
    //         }
    //     }
    // }
}
