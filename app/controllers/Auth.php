<?php
class Auth extends Controller
{
    public function adminLogin()
    {
        $this->view("Login");
    }
    public function Login()
    {
        $this->view("ClientLogin");
    }
}
