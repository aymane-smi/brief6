<?php
class User
{

    private $db;

    public function __construct()
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
        $this->db->query("UPDATE costumer SET email = :email, username = :username, full_name = :full_name, phone = :phone, address = :address, city = :city WHERE id = :id");
        $this->db->bind(":email", $email);
        $this->db->bind(":username", $username);
        $this->db->bind(":full_name", $fullName);
        $this->db->bind(":phone", $phone);
        $this->db->bind(":address", $address);
        $this->db->bind(":city", $city);
        $this->db->bind(":id", $id);
        return $this->db->execute();
    }

    public function updateAdminWithoutPwd($email, $username, $id)
    {
        $this->db->query("UPDATE admin SET email = :email, username = :username WHERE id = :id");
        $this->db->bind(":email", $email);
        $this->db->bind(":username", $username);
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
        $this->db->query("UPDATE admin SET password = :password WHERE id = :id");
        $this->db->bind(":password", $password);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }


    public function updateAdminWithPwd($email, $username, $password, $id)
    {
        $this->updateAdminWithoutPwd($email, $username, $id);
        $option = [
            "cost" => 12,
        ];

        $password = password_hash($password, PASSWORD_BCRYPT, $option);
        $this->db->query("UPDATE costumer SET password = :password WHERE id = :id");
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
        $this->db->query("INSERT INTO costumer(email, username, password, full_name, phone, address, city) VALUES(:email, :username, :password, :full_name, :phone, :address, :city)");
        $this->db->bind(":email", $email);
        $this->db->bind(":username", $username);
        $this->db->bind(":password", $password);
        $this->db->bind(":full_name", $fullName);
        $this->db->bind(":phone", $phone);
        $this->db->bind(":address", $address);
        $this->db->bind(":city", $city);
        return $this->db->execute();
    }


    public function getClientById($id)
    {
        $this->db->query("SELECT * FROM costumer WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function getAdminById($id)
    {
        $this->db->query("SELECT * FROM admin WHERE id = :id");
        $this->db->bind(":id", intval($id));
        return $this->db->single();
    }

    public function nbrClients()
    {
        $this->db->query("SELECT count(*) as nbr FROM costumer");
        return $this->db->single();
    }

    public function getAllCostumer(){
        $this->db->query("SELECT * from costumer");
        return $this->db->resultSet();
    }
}
