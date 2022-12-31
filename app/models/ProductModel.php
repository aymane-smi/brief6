<?php
class ProductModel
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

    public function getProductById($id)
    {
        $this->db->query("SELECT *, category.name FROM product JOIN category ON product.category_id = category.id WHERE product.id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function getProducts()
    {
        $this->db->query("SELECT *,category.name FROM product JOIN category ON category.id = product.category_id");
        return $this->db->resultSet();
    }

    public function addProductToCart($product_id, $costumer_id, $qte)
    {
        $this->db->query("INSERT INTO cart(costumer_id, product_id, qte) VALUES(:costumer_id, :product_id, :qte)");
        $this->db->bind(":costumer_id", $costumer_id);
        $this->db->bind(":product_id", $product_id);
        $this->db->bind(":qte", $qte);
        $this->db->execute();
    }

    public function getProductFromCart($costumer_id)
    {
        $this->db->query("SELECT qte, product.* FROM cart JOIN product ON product.id = cart.product_id WHERE costumer_id = :id ");
        $this->db->bind(":id", $costumer_id);
        return $this->db->resultSet();
    }

    public function deleteProductFRomCart($id)
    {
        $this->db->query("DELETE FROM cart WHERE product_id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    public function setProductInCart($id, $value)
    {
        $this->db->query("UPDATE cart SET qte = :value WHERE product_id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":value", $value);
        $this->db->execute();
    }
}
