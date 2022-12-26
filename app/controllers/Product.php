<?php
    class Product extends Controller{
        public function __construct(){}
        public function index(){
            $this->view("Product");
        }
    }
?>