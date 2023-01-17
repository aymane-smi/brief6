<?php
class Account extends Controller
{
    private $User;
    public function __construct()
    {
        session_start();
        if (empty($_SESSION) || $_SESSION["ROLE"] === "admin")
            header("Location: /Auth/Login");
        $this->User = $this->model("User");
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->view("Account");
        } else {
            if (isset($_POST["password"])) {
                $this->User->updateClientWithPwd($_POST["email"], $_POST["username"], $_POST["password"], $_POST["full_name"], $_POST["phone"], $_POST["address"], $_POST["city"], $_POST["id"]);
            } else {
                $this->User->updateClientWithoutPwd($_POST["email"], $_POST["username"], $_POST["full_name"], $_POST["phone"], $_POST["address"], $_POST["city"], $_POST["id"]);
            }
            header("Location: /");
        }
    }
}
