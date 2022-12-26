<?php
    require_once __DIR__."/libraries/Controller.php";
    require_once __DIR__."/libraries/Core.php";
    require_once __DIR__."/libraries/DB.php";
    // echo "bootstrap";
    spl_autoload_register(function($classname){
        require_once ("libraries/".$classname.".php");
    });
?>