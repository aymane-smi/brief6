<?php
require_once "inc/dash-header.php";
?>
<main class="my-[20vh] w-full flex flex-col justify-center items-center">
    <form action="#" method="POST" class="rounded-sm border-[1.8px] border-gray-500 w-1/4 p-8 py-20 flex flex-col justify-center items-center">
        <p class="text-[20px] fotn-semibold"> Accéder a votre compte!</p>
        <div class="mt-3 text-gray-400 w-full">
            <label for="email">Email</label>
            <input type="email" name="email" class="mt-1 rounded-sm w-full border-[1px] border-gray-400 bg-transparent p-2 text-gray-400" id="email" placeHolder="Adresse email" />
        </div>
        <div class="mt-3 text-gray-400 w-full">
            <label for="password">Mot de passe</label>
            <input placeholder="Mot de pass" type="password" name="password" class="mt-1 rounded-sm w-full border-[1px] border-gray-400 bg-transparent p-2 text-gray-400" id="password" />
        </div>
        <button class="p-3 rounded-sm bg-[#231f20] mt-5 w-full text-white font-semibold text-[18px]">Accéder</button>
    </form>
</main>
<script>
    document.querySelector("body").style.backgroundColor = "#f4f4f4";
</script>
<?php
require_once "inc/dash-footer.php";
?>