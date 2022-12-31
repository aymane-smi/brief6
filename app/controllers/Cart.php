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
}
