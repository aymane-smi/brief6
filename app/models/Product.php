<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function addProduct($reference, $label, $barcode, $image, $purchase_price, $offre_price, $final_price, $category)
    {
        $this->db->query("INSERT INTO product(reference, label, codeBar, image, purchase_price, offre_price, final_price, category_id 	
        ) VALUES(:reference, :label, :barcode, :image, :purchase_price, :offre_price, :final_price, :category)");
        $this->db->bind(":reference", $reference);
        $this->db->bind(":label", $label);
        $this->db->bind(":barcode", $barcode);
        $this->db->bind(":image", $image);
        $this->db->bind(":purchase_price", $purchase_price);
        $this->db->bind(":offre_price", $offre_price);
        $this->db->bind(":final_price", $final_price);
        $this->db->bind(":category", $category);
        return $this->db->execute();
    }


    public function getProductByLimit($n)
    {
        $this->db->query("SELECT *, category.name FROM product JOIN category ON category.id = product.category_id LIMIT :n");
        $this->db->bind(":n", $n);
        return $this->db->resultSet();
    }

    public function getProducts()
    {
        $this->db->query("SELECT *,category.name FROM product JOIN category ON category.id = product.category_id");
        return $this->db->resultSet();
    }
}
