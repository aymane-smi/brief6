<?php
    require_once "./inc/header.php";
?>
<div class="bg-white w-full mt-8 p-10 flex justify-center items-start gap-[50px]">
    <div>
        <img src="http://localhost:9000/public/src/assets/wwdc2019DSC_4114.jpg" alt="default" class="w-[200px] h-[200px] rounded-md"/>
    </div>
    <div class="flex flex-col gap-4">
        <p class="font-800 text-[15px] text-gray-500 rounded-md p-1 bg-gray-200 text-center">Nom</p>
        <p class="font-bold text-[20px] text-black">12 MAD</p>
        <div class="flex justify-between items-center gap-5">
            Quantity:
            <span class="rounded-full border-[1px] p-1 border-gray-400">+</span>
            0
            <span class="rounded-full border-[1px] p-1 border-gray-400">-</span>
        </div>
        <a class="text-red-600 underline">supprimer</a>
    </div>
</div>
<?php
    require_once "./inc/footer.php";
?>