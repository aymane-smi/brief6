<?php
class User
{

    private $db;

    public function construct()
    {
        $this->db = new DB();
    }


    public function adminLogin($email, $password)
    {
        $this->db->query("SELECT * FROM admin WHERE email = :email");
        $this->db->bind(":email", $email);
        $row = $this->db->single();
        if (password_verify($password, $row->password))
            return $row;
        else
            return false;
    }

    public function clientLogin($email, $password)
    {
        $this->db->query("SELECT * FROM costumer WHERE email = :email");
        $this->db->bind(":email", $email);
        $row = $this->db->single();
        if (password_verify($password, $row->password))
            return $row;
        else
            return false;
    }

    public function signup($email, $username, $password, $fullName, $phone, $address, $city)
    {
        $this->db->query("INSERT INTO costumer VALUE(email, username, password, full_name, phone, address, city) VALUES(:email, :username, :password, :full_name, :phone, :address, :city)");
        $this->db->bind(":email", $email);
        $this->db->bind(":username", $username);
        $this->db->bind(":password", $password);
        $this->db->bind(":full_name", $fullName);
        $this->db->bind(":phone", $phone);
        $this->db->bind(":address", $address);
        $this->db->bind(":city", $city);
        return $this->db->execute();
    }
}
