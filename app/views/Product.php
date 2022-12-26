<?php
require_once "inc/header.php";
?>
<div class="bg-white w-full mt-8 p-10 flex justify-center items-start gap-[50px]">
    <div>
        <img src="http://localhost:9000/public/src/assets/wwdc2019DSC_4114.jpg" alt="default" class="w-[350px] h-[400px] rounded-md" />
        <div class="pb-3 border-b-[2px] border-gray-300 mt-3">
            <span class="border-b-[3px] border-gray-800 pb-3">détaille</span>
        </div>
        <p class="mt-4">description</p>
    </div>
    <div class="flex flex-col gap-8">
        <p class="font-800 text-[15px] text-gray-500 rounded-md p-1 bg-gray-200 text-center">Catégorie</p>
        <p class="font-bold text-[20px] text-black">12 MAD</p>
        <div class="flex justify-between items-center gap-5">
            Quantity:
            <span class="rounded-full border-[1px] p-1 border-gray-400">+</span>
            0
            <span class="rounded-full border-[1px] p-1 border-gray-400">-</span>
        </div>
        <a class="text-white bg-black p-5 mt-10 rounded-tl-[15px] rounded-br-[15px] font-semibold">ajouter au panier</a>
    </div>
</div>
<?php
require_once "inc/footer.php";
?>