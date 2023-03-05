<?php
class Cart extends Controller
{
    private $Product;

    public function __construct()
    {
        session_start();
        if (empty($_SESSION) || $_SESSION["ROLE"] === "admin")
            header("Location: /Auth/Login");
        $this->Product = $this->model("ProductModel");
    }

    public function index()
    {
        $this->view("Cart", $this->Product->getProductFromCart($_SESSION["user_id"]));
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
        if(!$this->Product->existInCart($_POST["id"], $_SESSION["user_id"]))
            $this->Product->setProductInCart($_POST["id"], $_POST["value"]);
        else
            $this->Product->changeProductQteInCart($_POST["id"], $_POST["value"]);
    }
}
