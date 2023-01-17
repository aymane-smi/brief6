<?php
class Products extends Controller
{
    private $ProductModel;
    private $Category;

    public function __construct()
    {
        session_start();
        if (empty($_SESSION) || $_SESSION["ROLE"] === "admin")
            header("Location: /Auth/Login");
        $this->ProductModel = $this->model("ProductModel");
        $this->Category = $this->model("Category");
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            echo json_encode($this->ProductModel->getProducts());
        } else {
            $data = [
                "product" => $this->ProductModel->getProducts(),
                "category" => $this->Category->getCategories(),
            ];
            $this->view("Products", $data);
        }
    }

    public function catgories()
    {
        $categories = json_decode($_POST["categories"]);
        echo json_encode($this->ProductModel->getProductsByCategories($categories));
    }
}
