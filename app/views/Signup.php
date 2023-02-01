<?php
require_once "inc/dash-header.php";
?>
<main class="w-full flex flex-col justify-start items-center my-[20vh]">
    <p class="text-[25px] mb-7">
        <span class="text-[#87ff54]">e</span>lectro<span class="font-[600]"><span class="text-[#87ff54]">M</span>aroc</span>
    </p>
    <p class="text-[22px] text-gray-500">Page d'enregistrement</p>
    <form action="http://localhost:9000/Auth/signup" method="POST" class="w-full flex flex-col justify-start items-center">
        <div class="w-1/4 mt-4 drop-shadow-xl">
            <label for="email" class="text-gray-400 text-[20px]">
                Email
            </label>
            <input type="email" name="email" class="w-full mt-1 text-[18px] p-2 border-[1.5px] text-gray-400 rounded-md" id="email" />
        </div>
        <div class="w-1/4 mt-6 drop-shadow-xl">
            <label for="password" class="text-gray-400 text-[20px]">
                Mot de passe
            </label>
            <input type="password" name="password" class="w-full mt-1 text-[18px] p-2 border-[1.5px] text-gray-400 rounded-md" id="password" />
        </div>
        <div class="w-1/4 mt-6 drop-shadow-xl">
            <label for="full_name" class="text-gray-400 text-[20px]">
                Full name
            </label>
            <input type="text" name="full_name" class="w-full mt-1 text-[18px] p-2 border-[1.5px] text-gray-400 rounded-md" id="full_name" />
        </div>
        <div class="w-1/4 mt-6 drop-shadow-xl">
            <label for="phone" class="text-gray-400 text-[20px]">
                Phone
            </label>
            <input type="text" name="phone" class="w-full mt-1 text-[18px] p-2 border-[1.5px] text-gray-400 rounded-md" id="phone" />
        </div>
        <div class="w-1/4 mt-6 drop-shadow-xl">
            <label for="address" class="text-gray-400 text-[20px]">
                address
            </label>
            <input type="text" name="address" class="w-full mt-1 text-[18px] p-2 border-[1.5px] text-gray-400 rounded-md" id="address" />
        </div>
        <div class="w-1/4 mt-6 drop-shadow-xl">
            <label for="city" class="text-gray-400 text-[20px]">
                City
            </label>
            <input type="text" name="city" class="w-full mt-1 text-[18px] p-2 border-[1.5px] text-gray-400 rounded-md" id="city" />
        </div>
        <button class="drop-shadow-xl mt-3 p-4 bg-[#0099fb] text-white rounded-md">Register</button>
    </form>
</main>
<?php
require_once "inc/dash-footer.php";
?>