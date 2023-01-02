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

    public function updateClientWithoutPwd($email, $username, $fullName, $phone, $address, $city, $id)
    {
        $this->db->query("UPDATE costumer email = :email, username = :username, full_name = :full_name, phone = :phone, address = :address, city = :city WHERE id = :id");
        $this->db->bind(":email", $email);
        $this->db->bind(":username", $username);
        $this->db->bind(":full_name", $fullName);
        $this->db->bind(":phone", $phone);
        $this->db->bind(":address", $address);
        $this->db->bind(":city", $city);
        $this->db->bind(":id", $id);
        return $this->db->execute();
    }

    public function updateClientWithPwd($email, $username, $password, $fullName, $phone, $address, $city, $id)
    {
        $this->updateClientWithoutPwd($email, $username, $fullName, $phone, $address, $city, $id);
        $option = [
            "cost" => 12,
        ];

        $password = password_hash($password, PASSWORD_BCRYPT, $option);
        $this->db->query("UPDATE costumer password = :password WHERE id = :id");
        $this->db->bind(":password", $password);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    public function signup($email, $username, $password, $fullName, $phone, $address, $city)
    {
        $option = [
            "cost" => 12,
        ];

        $password = password_hash($password, PASSWORD_BCRYPT, $option);
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
