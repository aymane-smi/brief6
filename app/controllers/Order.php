<?php
class Order extends Controller
{
    private $Product;
    private $Costumer;
    private $OrderModel;
    public function __construct()
    {
        // session_start();
        // if (empty($_SESSION))
        //     header("Location: /");
        $this->Product = $this->model("ProductModel");
        $this->Costumer = $this->model("User");
        $this->OrderModel = $this->model("OrderModel");
    }
    public function index()
    {
        session_start();
        if (empty($_SESSION) || $_SESSION["ROLE"] === "admin")
            header("Location: /Auth/Login");
        $data = [
            "products" => $this->Product->getProductFromCart($_SESSION["user_id"]),
            "client_info" => $this->Costumer->getClientById($_SESSION["user_id"]),
        ];
        $this->view("Order", $data);
    }

    public function payment()
    {
        session_start();
        if (empty($_SESSION) && $_SESSION["ROLE"] === "admin")
            header("Location: /Auth/Login");
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $id = $this->OrderModel->createOrder($_SESSION["user_id"]);
            $rows = $this->Product->getProductFromCart($_SESSION['user_id']);
            foreach ($rows as $row) {
                $this->OrderModel->createOrderItems($id, $row->id, $row->qte);
            }
            $this->Product->emptyCart($_SESSION['user_id']);
        }
    }

    public function changeStatus()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            echo json_encode(["id" => $_POST["id"], "status" => $_POST["status"]]);
            $this->OrderModel->changeOrderStatus($_POST["id"], $_POST["status"]);
        } else {
            echo "status change";
        }
    }

    public function commandInfo()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            echo json_encode($this->OrderModel->getUserAndInfo($_POST["id"]));
        }
    }
}
