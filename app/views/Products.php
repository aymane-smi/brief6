<?php
require_once "inc/header.php";
?>
<div class="p-8 mt-4 bg-white flex gap-20">
    <div class="w-fit">
        <p class="text-[21px] font-semibold pb-4 border-b-[2px] border-gray-200 w-full">Catégories</p>
        <form class="mt-5">
            <div class="flex flex-row-reverse justify-between items-center">
                <label for="categorie">Catégorie</label>
                <input type="checkbox" name="category" id="categorie" />
            </div>
        </form>
    </div>
    <div class="flex flex-wrap justify-start items-center mb-10 gap-20">
        <div>
            <div class="overflow-hidden rounded-md w-fit border-[1px] border-[#5C5C5C]">
                <img class="w-[200px] h-[200px]" src="http://localhost:9000/public/src/assets/wwdc2019DSC_4114.jpg" alt="default" />
            </div>
            <p class="mt-3 flex justify-between items-center">
                <span class="font-800 text-[15px] text-gray-500">nom</span>
                <span class="font-800 text-[11px] text-gray-500 rounded-sm p-1 bg-gray-200">catégorie</span>
            </p>
            <p class="mt-3 font-semibold text-[15px] text-gray-500">titre</p>
            <p class="mt-3 flex justify-between items-center">
                <span class="mt-3 font-semibold text-[18px]">120 MAD</span>
                <a class="p-1 text-gray-500 border-[1px] border-gray-200 rounded-md hover:border-black hover:bg-black hover:text-white" href="#">Détaille</a>
            </p>
        </div>
    </div>
</div>
<?php
require_once "inc/footer.php";
?>