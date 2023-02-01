<?php
class Settings extends Controller
{

    private $client;

    public function __construct()
    {
        session_start();
        if (empty($_SESSION)) {
            header("Location: /Auth/Login");
        }
        $this->client = $this->model("User");
    }
    public function index()
    {
        $data = [
            "client" => $this->client->getClientById($_SESSION["user_id"]),
        ];
        $this->view("Settings", $data);
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["password"]))
                $this->client->updateClientWithPwd($_POST["email"], $_POST["username"], $_POST["password"], $_POST["full_name"], $_POST["phone"], $_POST["address"], $_POST["city"], $_SESSION["user_id"]);
            else
                $this->client->updateClientWithoutPwd($_POST["email"], $_POST["username"], $_POST["full_name"], $_POST["phone"], $_POST["address"], $_POST["city"], $_SESSION["user_id"]);
            header("Location: /Auth/Login");
        }
    }
}
