<?php
class Product extends Controller
{
    private $Product;
    public function __construct()
    {
        session_start();
        $this->Product = $this->model("ProductModel");
    }
    public function index($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->view("Product", $this->Product->getProductById($id));
        } else {
            $this->Product->addProductToCart($id, $_SESSION["user_id"], $_POST["qte"], $_POST["price"]);
            header("Location: /Cart");
        }
    }
}
