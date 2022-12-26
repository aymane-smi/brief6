<?php
require_once "./inc/dash-header.php";
?>
<main class="w-full flex flex-col justify-start items-center my-[20vh]">
    <p class="text-[25px] mb-7">
        <span class="text-[#87ff54]">e</span>lectro<span class="font-[600]"><span class="text-[#87ff54]">M</span>aroc</span>
    </p>
    <p class="text-[22px] text-gray-500">Page d'authentification</p>
    <form action="#" method="POST" class="w-full flex flex-col justify-start items-center">
        <div class="w-1/4 mt-4 drop-shadow-xl">
            <label for="email" class="text-gray-400 text-[20px]">
                <i class="fa-regular fa-envelope"></i>
                Email
            </label>
            <input type="email" name="email" class="w-full mt-1 text-[18px] p-2 border-[1.5px] text-gray-400 rounded-md" id="email" />
        </div>
        <div class="w-1/4 mt-6 drop-shadow-xl">
            <label for="password" class="text-gray-400 text-[20px]">
                <i class="fa-regular fa-lock"></i>
                Mot de passe
            </label>
            <input type="password" name="password" class="w-full mt-1 text-[18px] p-2 border-[1.5px] text-gray-400 rounded-md" id="password" />
        </div>
        <button class="drop-shadow-xl mt-3 p-4 bg-[#0099fb] text-white rounded-md">Connecter</button>
    </form>
</main>
<?php
require_once "./inc/dash-footer.php";
?>