<?php
class App
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findUserByEmpNum($emp_num)
    {
        $this->db->query('SELECT * FROM NCE_EMPLOYEES.users WHERE emp_num = :emp_num');
        //Bind Value
        $this->db->bind(':emp_num', $emp_num);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM NCE_EMPLOYEES.users WHERE email = :email');
        //Bind Value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByEmpNum($emp_num)
    {
        $this->db->query('SELECT * FROM NCE_EMPLOYEES.users WHERE emp_num LIKE :emp_num');
        $this->db->bind(':emp_num', $emp_num);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            //echo "query worked";
            return $row;
        } else {
            //echo "query failed";
            return false;
        }
    }

    public function getUserByGersNum($gers_entry)
    {
        $this->db->query('SELECT * FROM NCE_EMPLOYEES.users WHERE gers_num = :gers_num');
        $this->db->bind(':ges_num', $gers_entry);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM NCE_EMPLOYEES.users WHERE id = :id');
        //Bind Value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getDefaultVenueIdByEmpNum($emp_num)
    {
        $this->db->query('SELECT `default_venue_id` FROM NCE_EMPLOYEES.users WHERE emp_num = :emp_num');
        //Bind Value
        $this->db->bind(':emp_num', $emp_num);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row->default_venue_id;
        } else {
            return false;
        }
    }

    public function getUserNameByEmpNum($emp_num)
    {
        $this->db->query('SELECT `name` FROM NCE_EMPLOYEES.users WHERE emp_num = :emp_num');
        //Bind Value
        $this->db->bind(':emp_num', $emp_num);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row->name;
        } else {
            return false;
        }
    }

    public function getUserIdByEmpNum($emp_num)
    {
        $this->db->query('SELECT `id` FROM NCE_EMPLOYEES.users WHERE emp_num = :emp_num');
        //Bind Value
        $this->db->bind(':emp_num', $emp_num);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row->id;
        } else {
            return false;
        }
    }

    public function checkUserPassword($entered_pw, $entered_num)
    {
        $this->db->query('SELECT * FROM NCE_EMPLOYEES.users WHERE emp_num = :emp_num');
        //Bind Value
        $this->db->bind(':emp_num', $entered_num);
        $row = $this->db->single();
        //Chec;k row
        if ($this->db->rowCount() > 0) {
            if ($row->password == $entered_pw) {
                // echo "It's a match!";
                return true;
            } else {
                //  echo "No match";
                return false;
            }
        } else {
            //echo "user not found";
            return false;
        }
    }
}
