<?php
    class Products extends Controller{
        public function __construct(){}
        public function index(){
            $this->view("Products");
        }
    }
?>