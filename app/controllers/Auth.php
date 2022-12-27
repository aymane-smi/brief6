<?php
class Auth extends Controller
{
    private $User;

    public function __construct()
    {
        $this->User = $this->model("User");
    }

    public function adminLogin()
    {
        $this->view("Login");
    }

    public function Login()
    {
        $this->view("ClientLogin");
    }

    public function admin_auth()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->User->adminLogin($_POST["email"], $_POST["password"]);
            if ($result != false) {
                session_start();
                $_SESSION["ROLE"] = "admin";
                $_SESSION["user_id"] = $result->id;
            }
        } else {
            session_start();
            $_SESSION["err_msg"] = "mot de passe/email invalide!";
            header("Location: /Auth/adminLogin");
        }
    }

    public function client_auth()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = $this->User->clientLogin($_POST["email"], $_POST["password"]);
            if ($result != false) {
                session_start();
                $_SESSION["ROLE"] = "client";
                $_SESSION["user_id"] = $result->id;
            }
        } else {
            session_start();
            $_SESSION["err_msg"] = "mot de passe/email invalide!";
            header("Location: /Auth/Login");
        }
    }

    public function signup($email = "", $username = "", $password = "", $fullName = "", $phone = "", $address = "", $city = "")
    {
        $data = [
            "email" => "",
            "username" => "",
            "password" => "",
            "full_name" => "",
            "phone" => "",
            "address" => "",
            "city" => "",
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $redirect_key = false;
            if (empty($email)) {
                $redirect_key = true;
                $data["email"] = "adresse email néçaissaire";
            } else if (empty($username)) {
                $redirect_key = true;
                $data["username"] = "nom d'utilisateur néçaissaire";
            } else if (empty($password)) {
                $redirect_key = true;
                $data["password"] = "mot de passe néçaissaire";
            } else if (empty($phone)) {
                $redirect_key = true;
                $data["phone"] = "numéro téléphone néçaissaire";
            } else if (empty($address)) {
                $redirect_key = true;
                $data["address"] = "address néçaissaire";
            } else if (empty($fullName)) {
                $redirect_key = true;
                $data["fullName"] = "nom complet néçaissaire";
            } else if (empty($ville)) {
                $redirect_key = true;
                $data["ville"] = "vile néçaissaire";
            }

            //checking key for redirection

            if ($redirect_key) {
                $this->view("Signup", $data);
            } else {
                $this->User->signup($email, $username, $password, $fullName, $phone, $address, $city);
                header("Location: http://localtion:9000/Auth/Login");
            }
        } else {
            $this->view("Signup");
        }
    }
}
