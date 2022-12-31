<?php
class Products extends Controller
{
    private $ProductModel;
    private $Category;
    public function __construct()
    {
        $this->ProductModel = $this->model("ProductModel");
        $this->Category = $this->model("Category");
    }
    public function index()
    {
        $data = [
            "product" => $this->ProductModel->getProducts(),
            "category" => $this->Category->getCategories(),
        ];
        $this->view("Products", $data);
    }
}
