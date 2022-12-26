<?php
class Dashboard extends Controller
{
    public function index()
    {
        $this->view("Dashboard");
    }

    public function addProduct()
    {
        $this->view("AddProduct");
    }

    public function editProduct($id = null)
    {
        $this->view("EditProduct");
    }
}
