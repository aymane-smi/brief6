<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <title>ElectroMaroc - e-com</title>
    <link rel="stylesheet" href="http:///localhost:9000/public/src/css/all.min.css" />
    <!-- <link rel="stylesheet" href="http://localhost:9000/public/src/css/output.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#faeadd]">
    <div class="p-[40px]">
        <nav class="flex justify-between items-center">
            <p class="font-[500] text-[20px]"><span class="text-[#87ff54]">e</span>lectro<span class="font-[600]"><span class="text-[#87ff54]">M</span>aroc</span>
            </p>
            <div class="flex justify-center items-center gap-[30px] text-[#5C5C5C]">
                <?php
                if (isset($_SESSION["ROLE"]) && $_SESSION["role"] === "client") {
                ?>
                    <a href="/settings">
                        <i class="fa-light fa-user text-[20px]"></i>
                    </a>
                    <a href="/cart">
                        <i class="fa-light fa-cart-shopping text-[20px]"></i>
                    </a>
                <?php
                }
                ?>
                <i class="fa-light fa-bars text-[20px] open-nav"></i>
            </div>
            <div class="fixed right-0 top-0 w-screen h-screen z-10 bg-black/60 navbar-class hidden">
                <ul class="float-right bg-white h-screen w-[40vh] flex pt-10 flex-col justify-start items-center text-[25px] font-bold">
                    <li class="mt-5">
                        <a href="/">
                            <i class="fa-regular fa-house"></i>
                            <span class="ml-2">Accueil</span>
                        </a>
                    </li>
                    <li class="mt-5">
                        <a href="/Products">
                            <i class="fa-solid fa-laptop"></i>
                            <span class="ml-2">Produits</span>
                        </a>
                    </li>
                    <li class="mt-5">
                        <?php
                        if (isset($_SESSION["ROLE"]) && $_SESSION["role"] === "client") {
                        ?>
                            <a href="/Auth/logout">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="ml-2">Logout</span>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a href="/Auth/Login">
                                <i class="fa-regular fa-user"></i>
                                <span class="ml-2">Compte</span>
                            </a>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
                <i class="fa-sharp fa-solid fa-xmark float-right mr-3 text-[25px] text-white close-icon"></i>
            </div>
        </nav>