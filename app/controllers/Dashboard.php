<?php
class Dashboard extends Controller
{
    private $Category;
    private $Product;

    public function __construct()
    {
        $this->Category = $this->model("Category");
        $this->Product = $this->model("Product");
    }
    public function index()
    {
        $this->view("Dashboard");
    }

    public function addProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->view("AddProduct", $this->Category->getCategories());
        } else {
            $redirection_key = false;
            $data = [
                "reference" => "",
                "label" => "",
                "barcode" => "",
                "purchase_price" => "",
                "offre_price" => "",
                "final_price" => "",
                "image" => "",
            ];
            if (empty($_POST["reference"])) {
                $redirection_key = true;
                $data["reference"] = "référence necessaire";
            } else if (empty($_POST["label"])) {
                $redirection_key = true;
                $data["label"] = "libelle necessaire";
            } else if (empty($_POST["barcode"])) {
                $redirection_key = true;
                $data["barcode"] = "codebar necessaire";
            } else if (!isset($_FILES["image"])) {
                $redirection_key = true;
                $data["image"] = "image necessaire";
            } else if (empty($_POST["purchase_price"])) {
                $redirection_key = true;
                $data["purchase_price"] = "prix d'achat necessaire";
            } else if (empty($_POST["offre_price"])) {
                $redirection_key = true;
                $data["offre_price"] = "prix d'offre necessaire";
            } else if (empty($_POST["final_price"])) {
                $redirection_key = true;
                $data["final_price"] = "prix d'finale necessaire";
            }
            if ($redirection_key) {
                $this->view("AddCategory", $data);
            } else {
                $this->Product->addProduct($_POST["reference"], $_POST["label"], $_POST["barcode"], $_FILES["image"]["name"], $_POST["purchase_price"], $_POST["offre_price"], $_POST["final_price"], $_POST["category"]);
                move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/public/assets/product" . $_FILES['image']['name']);
                header("Location: http://localhost:9000/Dashboard");
            }
        }
    }

    public function editProduct($id = null)
    {
        $this->view("EditProduct");
    }

    public function addCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $redirection_key = false;
            $data = [
                "image" => "",
                "description" => "",
                "name" => "",
            ];
            if (empty($_POST["name"])) {
                echo "name";
                $redirection_key = true;
                $data["name"] = "nom necessaire";
            } else if (empty($_POST["description"])) {
                echo "desc";
                $redirection_key = true;
                $data["description"] = "déscritpion necessaire";
            } else if (!isset($_FILES["image"])) {
                echo "image";
                var_dump($_POST);
                $redirection_key = true;
                $data["image"] = "image necessaire";
            }
            if ($redirection_key) {
                $this->view("AddCategory", $data);
            } else {
                $this->Category->addCategory($_POST["name"], $_FILES["image"]["name"], $_POST["description"]);
                move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/public/assets/category" . $_FILES['image']['name']);
                header("Location: http://localhost:9000/Dashboard");
            }
        } else {
            $this->view("AddCategory");
        }
    }
}
