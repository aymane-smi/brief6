<?php
class Home extends Controller
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
            "product" => $this->Product->getProductByLimit(4),
            "category" => $this->Category->getCategories()
        ];
        $this->view("Landing", $data);
    }
}
