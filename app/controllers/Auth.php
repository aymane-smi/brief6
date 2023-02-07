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
            //print_r($result);
            if ($result != false) {
                session_start();
                $_SESSION["ROLE"] = "admin";
                $_SESSION["user_id"] = $result->id;
                header("Location: /Dashboard");
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
                header("Location: /");
            }
        } else {
            session_start();
            $_SESSION["err_msg"] = "mot de passe/email invalide!";
            header("Location: /Auth/Login");
        }
    }

    public function signup()
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
            if (empty($_POST["email"])) {
                $redirect_key = true;
                $data["email"] = "adresse email néçaissaire";
            } else if (empty($_POST["username"])) {
                $redirect_key = true;
                $data["username"] = "nom d'utilisateur néçaissaire";
            } else if (empty($_POST["password"])) {
                $redirect_key = true;
                $data["password"] = "mot de passe néçaissaire";
            } else if (empty($_POST["phone"])) {
                $redirect_key = true;
                $data["phone"] = "numéro téléphone néçaissaire";
            } else if (empty($_POST["address"])) {
                $redirect_key = true;
                $data["address"] = "address néçaissaire";
            } else if (empty($_POST["full_name"])) {
                $redirect_key = true;
                $data["full_name"] = "nom complet néçaissaire";
            } else if (empty($_POST["city"])) {
                $redirect_key = true;
                $data["city"] = "vile néçaissaire";
            }

            //checking key for redirection

            if ($redirect_key) {
                $this->view("Signup", $data);
            } else {
                $this->User->signup($_POST["email"], $_POST["username"], $_POST["password"], $_POST["full_name"], $_POST["phone"], $_POST["address"], $_POST["city"]);
                header("Location: http://localtion:9000/Auth/Login");
            }
        } else {
            $this->view("Signup");
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /");
    }
}
