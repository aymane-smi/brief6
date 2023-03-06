<?php
class Product extends Controller
{
    private $Product;
    public function __construct()
    {
        session_start();
        $this->Product = $this->model("ProductModel");
    }
    public function index($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->view("Product", $this->Product->getProductById($id));
        } else {
            if(!$this->Product->existInCart($id, $_SESSION["user_id"])){
                $this->Product->setProductInCart($id, $_SESSION["user_id"], $_POST["qte"], $_POST["price"]);
            }else{
                $qte = $this->Product->getQteOfProduct($id);
                $this->Product->changeProductQteInCart($id, $qte + $_POST["qte"]);
            }
            header("Location: /Cart");
        }
    }
}
