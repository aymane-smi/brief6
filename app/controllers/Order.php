<?php
class Order extends Controller
{
    private $Product;
    private $Costumer;
    private $OrderModel;
    public function __construct()
    {
        session_start();
        if (empty($_SESSION) || $_SESSION["ROLE"] === "admin")
            header("Location: /Auth/Login");
        $this->Product = $this->model("ProductModel");
        $this->Costumer = $this->model("User");
        $this->OrderModel = $this->model("OrderModel");
    }
    public function index()
    {
        $data = [
            "products" => $this->Product->getProductFromCart($_SESSION["user_id"]),
            "client_info" => $this->Costumer->getClientById($_SESSION["user_id"]),
        ];
        $this->view("Order", $data);
    }

    public function payment()
    {
        $this->OrderModel->createOrder();
        $rows = $this->Product->getProductFromCart(1);
        foreach ($rows as $row) {
            $this->OrderModel->createOrderItems($row->costumer_id, $row->product_id, $row->qte);
        }
        $this->Product->emptyCart();
    }

    public function changeStatus()
    {
        $this->OrderModel->changeOrderStatus($_POST["id"], $_POST["status"]);
    }
}
