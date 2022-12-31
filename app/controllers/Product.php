<?php
class Product extends Controller
{
    private $Product;
    public function __construct()
    {
        $this->Product = $this->model("ProductModel");
    }
    public function index($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->view("Product", $this->Product->getProductById($id));
        } else {
            $this->Product->addProductToCart($id, 1, $_POST["qte"]);
            header("Location: /Cart");
        }
    }
}
