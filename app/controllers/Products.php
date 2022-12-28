<?php
class Products extends Controller
{
    private $Product;
    private $Category;
    public function __construct()
    {
        $this->Product = $this->model("Product");
        $this->Category = $this->model("Category");
    }
    public function index()
    {
        $data = [
            "product" => $this->Product->getProducts(),
            "category" => $this->Category->getCategories(),
        ];
        $this->view("Products", $data);
    }
}
