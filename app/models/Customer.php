<?php
class Customer
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function fetchCustomers($input)
    {
        //
        $this->db->query(
            "SELECT `FName`,`LName`, `phone`, `email`, `Client_ID` FROM NCE_CUSTOMERS.customers WHERE LName LIKE '" . $input . "%'"
            //"SELECT * FROM NCE_EMPLOYEES.users"
            //"SELECT * FROM x_clients"
            //"SELECT * FROM NCE_CUSTOMERS.customers"
        );
        $results = $this->db->resultSet();
        return $results;
    }

    // ENTER NEW CUSTOMER
    public function enterNewCustomer($data)
    {
        //Build Query
        $this->db->query('INSERT INTO NCE_CUSTOMERS.customers (FName, LName, phone, email, address_1, address_2, city, state, zip_code) VALUES (:FName, :LName, :phone, :email, :address_1, :address_2, :city, :state, :zip_code)');
        // Bind Values
        $this->db->bind(':FName', $data['first_name']);
        $this->db->bind(':LName', $data['last_name']);
        $this->db->bind(':phone', $data['phone_num']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':address_1', $data['address_1']);
        $this->db->bind(':address_2', $data['address_2']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':zip_code', $data['zip_code']);

        // Execute       
        if ($this->db->execute()) {
            $new_id = $this->db->lastInsertId();
            return $new_id;
        } else {
            return false;
        }
    }

    public function updateCustomer($data)
    {

        echo "<br>";
        echo "Update Customer Model Function: ";
        echo "<br>";
        echo "<br>";
        echo "DATA: ";
        echo "<br>";
        print_r($data);
        echo "<br>";
        echo "<br>";



        //Build Query
        $builtQuery = 'UPDATE `NCE_CUSTOMERS`.`customers` SET ';
        $builtQuery .= '`FName` = :FName';
        $builtQuery .= ', `LName` = :LName';
        $builtQuery .= ', `phone` = :phone';
        $builtQuery .= ', `email` = :email';
        $builtQuery .= ', `address_1` = :address_1';
        $builtQuery .= ', `address_2` = :address_2';
        $builtQuery .= ', `city` = :city';
        $builtQuery .= ', `state` = :state';
        $builtQuery .= ', `zip_code` = :zip_code';
        $builtQuery .= ', `client_note` = :client_note';
        $builtQuery .= ' WHERE ';
        $builtQuery .= '`NCE_CUSTOMERS`.`customers`.`Client_ID` = :Client_ID';

        $this->db->query($builtQuery);

        echo "<br>";
        echo "QUERY: ";
        echo "<br>";
        echo $builtQuery;
        echo "<br>";


        //Bind Data
        $this->db->bind(':Client_ID', $data['Client_ID']);
        $this->db->bind(':FName', $data['first_name']);
        $this->db->bind(':LName', $data['last_name']);
        $this->db->bind(':phone', $data['phone_num']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':address_1', $data['address_1']);
        $this->db->bind(':address_2', $data['address_2']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':zip_code', $data['zip_code']);
        $this->db->bind(':client_note', $data['client_note']);

        // Execute       
        if ($this->db->execute()) {
            echo "<br>";
            echo "Execute Returned TRUE";
            echo "<br>";
            return true;
        } else {
            echo "<br>";
            echo "Execute Returned FALSE";
            echo "<br>";
            return false;
        }
    }


    public function getCustomerById($id)
    {
        //Buold Query
        $this->db->query('SELECT * FROM NCE_CUSTOMERS.customers WHERE Client_ID = :id');
        //Bind Value
        $this->db->bind(':id', $id);
        // Execute  
        $row = $this->db->single();
        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getCustomerByPhone($phone_num)
    {
        //Build Query
        $this->db->query('SELECT * FROM NCE_CUSTOMERS.customers WHERE phone = :phone_num');
        //Bind Value
        $this->db->bind(':phone_num', $phone_num);
        //Check Return
        $results = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $results;
        } else {
            return false;
        }
    }

    public function getCustomerByEmail($email)
    {
        //Build Query
        $this->db->query('SELECT * FROM NCE_CUSTOMERS.customers WHERE email = :email');
        //Bind Value
        $this->db->bind(':email', $email);
        //Check Return
        $results = $this->db->resultSet();
        if ($this->db->rowCount() > 0) {
            return $results;
        } else {
            return false;
        }
    }
}
