<?php
class Dashboard extends Controller
{
    private $Category;
    private $ProductModel;
    private $Order;
    private $User;

    public function __construct()
    {
        session_start();
        if (empty($_SESSION) || $_SESSION["ROLE"] === "client") {
            header("Location: /Auth/adminLogin");
        }
        $this->Category = $this->model("Category");
        $this->ProductModel = $this->model("ProductModel");
        $this->Order = $this->model("OrderModel");
        $this->User = $this->model("User");
    }
    public function index()
    {
        $data = [
            "product" => $this->ProductModel->getProducts(),
            "category" => $this->Category->getCategories(),
            "clients" => $this->User->nbrClients()->nbr,
            "order" => $this->Order->nbrOrder()->nbr,
            "shipped" => $this->Order->nbrShipped()->nbr,
            "delivred" => $this->Order->nbrDelivred()->nbr,
            "user" => $this->User->getAdminById($_SESSION["user_id"]),
        ];
        $this->view("Dashboard", $data);
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
                $this->ProductModel->addProduct($_POST["reference"], $_POST["label"], $_POST["barcode"], $_FILES["image"]["name"], $_POST["purchase_price"], $_POST["offre_price"], $_POST["final_price"], $_POST["category"]);
                move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/public/src/assets/product/" . $_FILES['image']['name']);
                header("Location: http://localhost:9000/Dashboard");
            }
        }
    }

    public function Product($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $data = [
                "product" => $this->ProductModel->getProductById($id),
                "categories" => $this->Category->getCategories(),
            ];
            $this->view("editProduct", $data);
        } else {
            if (isset($_FILES)) {
                $this->ProductModel->editProduct($id, $_POST["reference"], $_POST["label"], $_POST["barcode"], $_FILES["image"]["name"], $_POST["purchase_price"], $_POST["offre_price"], $_POST["final_price"], $_POST["category"]);
                move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/public/src/assets/product/" . $_FILES['image']['name']);
            } else {
                $this->ProductModel->editProduct($id, $_POST["reference"], $_POST["label"], $_POST["barcode"], $_FILES["image"]["name"], $_POST["purchase_price"], $_POST["offre_price"], $_POST["final_price"], $_POST["category"]);
            }
            header("Location: http://localhost:9000/Dashboard");
        }
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
                move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/public/src/assets/category/" . $_FILES['image']['name']);
                header("Location: http://localhost:9000/Dashboard");
            }
        } else {
            $this->view("AddCategory");
        }
    }

    public function Category($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $data = [
                "category" => $this->Category->getCategoryById($id),
            ];

            $this->view("editCategory", $data);
        } else {
            if (isset($_FILES)) {
                $this->Category->editCategoryById($id, $_POST["name"], "", $_POST["description"]);
            } else
                $this->Category->editCategoryById($id, $_POST["name"], $_FILES["image"]["name"], $_POST["description"]);
            header("Location: /Dashboard");
        }
    }


    public function deleteProduct($id)
    {
        $row = $this->ProductModel->getProductById($id);
        unlink("/var/www/html/public/src/assets/product/" . $row->image);
        $this->ProductModel->deleteProductById($id);
        header("Location: /Dashboard");
    }

    public function deleteCategory($id)
    {
        $row = $this->Category->getCategoryById($id);
        unlink("/var/www/html/public/src/assets/category/" . $row->image);
        $this->Category->deleteCategoryById($id);
        header("Location: /Dashboard");
    }

    public function Orders()
    {
        $data = [
            "created" => $this->Order->getCreatedOrder(),
            "shipped" => $this->Order->getShippedOrder(),
            "delivred" => $this->Order->getDelivredOrder(),
        ];

        $this->view("Orders", $data);
    }

    public function settings()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!empty($_POST["password"]))
                $this->User->updateAdminWithPwd($_POST["email"], $_POST["username"], $_POST["password"], $_SESSION["user_id"]);
            else
                $this->User->updateAdminWithoutPwd($_POST["email"], $_POST["username"], $_SESSION["user_id"]);
            header("Location: /Dashboard");
        } else {
            $data = [
                "admin" => $this->User->getAdminById($_SESSION["user_id"]),
            ];
            $this->view("admSettings", $data);
        }
    }
}
