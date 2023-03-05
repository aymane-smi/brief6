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

    public function editProduct($id, $reference, $label, $barcode, $image = "", $purchase_price, $offre_price, $final_price, $category)
    {
        $this->db->query("UPDATE product SET 
            reference = :reference, 
            label = :label, 
            codeBar = :barcode,
            purchase_price = :purchase_price,
            offre_price = :offre_price,
            final_price = :final_price,
            category_id = :category
        WHERE id = :id");
        $this->db->bind(":reference", $reference);
        $this->db->bind(":label", $label);
        $this->db->bind(":barcode", $barcode);
        $this->db->bind(":id", $id);
        $this->db->bind(":purchase_price", ($purchase_price));
        $this->db->bind(":offre_price", ($offre_price));
        $this->db->bind(":final_price", ($final_price));
        $this->db->bind(":category", $category);
        $this->db->execute();
        if ($image !== "") {
            $this->db->query("UPDATE product image = :image WHERE id = :id");
            $this->db->bind(":id", $id);
            $this->db->bind(":image", $image);
            $this->db->execute();
        }
        $this->db->execute();
        //$this->db->debug();
    }


    public function getProductByLimit($n)
    {
        $this->db->query("SELECT product.*, category.name FROM product JOIN category ON category.id = product.category_id LIMIT :n");
        $this->db->bind(":n", $n);
        return $this->db->resultSet();
    }

    public function getProductById($id)
    {
        $this->db->query("SELECT product.*, category.name FROM product JOIN category ON product.category_id = category.id WHERE product.id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function getProducts()
    {
        $this->db->query("SELECT product.*,category.name FROM product JOIN category ON category.id = product.category_id");
        return $this->db->resultSet();
    }

    public function addProductToCart($product_id, $costumer_id, $qte, $price)
    {
        $this->db->query("INSERT INTO cart(costumer_id, product_id, qte, price) VALUES(:costumer_id, :product_id, :qte, :price)");
        $this->db->bind(":costumer_id", $costumer_id);
        $this->db->bind(":product_id", $product_id);
        $this->db->bind(":qte", $qte);
        $this->db->bind(":price", $price);
        $this->db->execute();
    }

    public function getProductFromCart($costumer_id)
    {
        $this->db->query("SELECT cart.qte, cart.price as Cartprice, product.* FROM cart JOIN product ON product.id = cart.product_id WHERE costumer_id = :id ");
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
        $this->db->query("UPDATE cart SET qte = :value WHERE product_id = :id AND costumer_id = :costumer_id");
        $this->db->bind(":id", $id);
        $this->db->bind(":value", $value);
        $this->db->bind(":costumer_id", $_SESSION["user_id"]);
        $this->db->execute();
    }

    public function getQteOfProduct($id){
        $this->db->query("SELECT qte FROM cart WHERE product_id = :product_id AND costumer_id = :costumer_id");
        $this->db->bind(":product_id", $id);
        $this->db->bind(":costumer_id", $_SESSION["user_id"]);
        $result = $this->db->single();
        return $result->qte;
    }

    public function changeProductQteInCart($id, $value){
        $this->db->query("UPDATE cart SET qte = :qte WHERE costumer_id = :costumer_id AND product_id = :product_id");
        $this->db->bind(":qte", $value);
        $this->db->bind(":product_id", $id);
        $this->db->bind(":costumer_id", $_SESSION["user_id"]);
        $this->db->execute();
    }

    public function getProductsByCategories($categories)
    {
        if (count($categories) == 1) {
            $this->db->query("SELECT product.*, category.name FROM product JOIN category ON category.id = product.category_id WHERE category_id = :id ");
            $this->db->bind(":id", $categories[0]);
            return $this->db->resultSet();
        } else {
            $categories = implode(",", $categories);
            //echo json_encode(["categories" => $categories]);
            $this->db->query("SELECT product.*, category.name FROM product JOIN category ON category.id = product.category_id WHERE category_id IN ($categories)");
            //$this->db->bind(":categories", $categories);
            return $this->db->resultSet();
        }
    }

    public function emptyCart($costumer_id)
    {
        $this->db->query("DELETE FROM cart WHERE costumer_id = :costumer_id");
        $this->db->bind(":costumer_id", $costumer_id);
        $this->db->execute();
    }

    public function deleteProductById($id)
    {
        $this->db->query("DELETE FROM product WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    public function existInCart($id, $costumer_id){
        $this->db->query("SELECT COUNT(product_id) as total FROM cart WHERE product_id = :id AND costumer_id = :costumer_id");
        $this->db->bind(":id", $id, PDO::PARAM_INT);
        $this->db->bind(":costumer_id", $costumer_id, PDO::PARAM_INT);
        if($this->db->single()->total)
            return true;
        else
            return false;
    }
}
