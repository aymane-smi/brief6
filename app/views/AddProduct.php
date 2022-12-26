<?php
require_once "inc/dash-header.php";
?>
<div class="p-4 rounded-md bg-white">
    <p class="text-[24px] font-medium">
        Ajouter un produit
    </p>
    <div class="flex gap-5 mt-4">
        <div class="border-[1.5px] border-gray-200 rounded-sm p-3 grow">
            <p class="text-[14px]">Ajouter une image</p>
            <div class="bg-[#f4f6ff] border-dashed rounded-md mt-3 border-[3px] border-[#bee5ff] p-4 py-8 flex flex-col gap-5 justify-center items-center">
                <i class="fa-thin fa-camera text-[60px]"></i>
                <p>
                    <i class="fa-light fa-up-to-line text-[#bee5ff]"></i>
                    glisser votre fichier ici ou
                    <span class="text-[#bee5ff]">cliquer</span>
                </p>
            </div>
            <div class="p-3 border-gray-200 border-[1.5px] rounded-md mt-3 flex justify-between items-center">
                <div class="flex justify-center items-center gap-5">
                    <img src="http://localhost:9000/public/src/assets/wwdc2019DSC_4114.jpg" alt="default" class="rounded-sm w-[40px] h-[40px]" />
                    <div class="flex flex-col">
                        <p>title</p>
                        <p>size</p>
                    </div>
                </div>
                <i class="fa-regular fa-trash text-[22px] hover:text-red-500"></i>
            </div>
        </div>
        <div class="grow border-[1.5px] border-gray-200 rounded-sm p-3">
            <div class="w-full mb-2">
                <label for="reference" class="text-[14px]">Reférence</label>
                <input type="text" name="reference" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="reference" />
            </div>
            <div class="w-full mb-2">
                <label for="label" class="text-[14px]">libelle</label>
                <input type="text" name="label" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="label" />
            </div>
            <div class="w-full mb-2">
                <label for="barcode" class="text-[14px]">code bar</label>
                <input type="text" name="barcode" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="barcode" />
            </div>
            <div class="w-full mb-2">
                <label for="purchase_price" class="text-[14px]">Prix d'achat</label>
                <input type="number" name="purchase_price" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="purchase_price" />
            </div>
            <div class="w-full mb-2">
                <label for="offre_price" class="text-[14px]">Prix offre</label>
                <input type="number" name="offre_price" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="offre_price" />
            </div>
            <div class="w-full mb-2">
                <label for="final_price" class="text-[14px]">final offre</label>
                <input type="number" name="final_price" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="final_price" />
            </div>
            <div class="w-full mb-2">
                <select name="categorie w-full p-2 block rounded-md">
                    <option selected>--------Catégorie--------</option>
                    <option class="add-categorie">
                        ajouter une nouvelle catégorie
                    </option>
                </select>
            </div>
            <button class="bg-[#19a2fb] p-2 text-white rounded-md font-thin text-[13px] mt-2" href="#">
                <i class="fa-solid fa-arrow-down-to-arc"></i>
                <span>ajouter le produit</span>
            </button>
        </div>
    </div>
</div>
<?php
require_once "inc/dash-footer.php";
?>