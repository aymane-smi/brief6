<?php
class Cart extends Controller
{
    private $Product;

    public function __construct()
    {
        $this->Product = $this->model("ProductModel");
    }

    public function index()
    {
        $this->view("Cart", $this->Product->getProductFromCart(1));
    }

    public function Delete($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->Product->deleteProductFromCart($id);
            header("Location: /Cart");
        }
    }

    public function plus()
    {
        $this->Product->setProductInCart($_POST["id"], $_POST["value"]);
    }
}
