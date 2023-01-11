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

    public function getCategoryById($id)
    {
        $this->db->query("SELECT * FROM category WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function editCategoryById($id, $name, $image = "", $description)
    {
        $this->db->query("UPDATE category SET name = :name, description = :description WHERE id = :id
            ");
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":id", $id);
        $this->db->execute();
        $this->db->debug();
        if ($image === "") {
            $this->db->query("UPDATE category image = :image WHERE id = :id");
            $this->db->bind(":image", $image);
            $this->db->bind(":id", $id);
            $this->db->execute();
        }
    }
}
