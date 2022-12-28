<?php
class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function addCategory($name, $image, $description)
    {
        $this->db->query("INSERT INTO category(name, description, image) VALUES(:name, :description, :image)");
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":image", $image);
        return  $this->db->execute();
    }

    public function getCategories()
    {
        $this->db->query("SELECT * FROM category");
        return $this->db->resultSet();
    }
}
