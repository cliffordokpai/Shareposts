<?php

class Admin{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function findAdminByEmail($email){
        $this->db->query('SELECT * FROM admins WHERE email= :email');
        $this->db->bind(':email', $email);
        $this->db->single();

        if($this->db->rowCount() > 0)
            return true;
        else
            return false;

    }

    public function login($email, $password){
        $this->db->query('SELECT * FROM admins WHERE email= :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if($password == $row->password){
            return $row;
        }else{
            return false;
        }
    }

}