<?php
require_once "inc/dash-header.php";
?>
<div class="p-4 rounded-md bg-white">
    <p class="text-[24px] font-medium">
        Ajouter un produit
    </p>
    <form action="http://localhost:9000/Dashboard/addCategory" enctype="multipart/form-data" method="POST" class="flex gap-5 mt-4">
        <div class="border-[1.5px] border-gray-200 rounded-sm p-3 grow">
            <p class="text-[14px]">Ajouter une image</p>
            <label for="image">
                <div class="upload-container bg-[#f4f6ff] border-dashed rounded-md mt-3 border-[3px] border-[#bee5ff] p-4 py-8 flex flex-col gap-5 justify-center items-center">
                    <i class="fa-thin fa-camera text-[60px]"></i>
                    <p>
                        <i class="fa-light fa-up-to-line text-[#bee5ff]"></i>
                        glisser votre fichier ici ou
                        <span class="text-[#bee5ff]">cliquer</span>
                    </p>
                </div>
            </label>
            <input type="file" name="image" hidden class="img-input" id="image" />
            <div class="p-3 border-gray-200 border-[1.5px] rounded-md mt-3 flex justify-between items-center display-container hidden">
                <div class="flex justify-center items-center gap-5">
                    <img src="http://localhost:9000/public/src/assets/wwdc2019DSC_4114.jpg" alt="default" class="img-display rounded-sm w-[40px] h-[40px]" />
                    <div class="flex flex-col">
                        <p class="img-name">title</p>
                        <p class="img-size">size</p>
                    </div>
                </div>
                <i class="fa-regular fa-trash text-[22px] hover:text-red-500 reset-image"></i>
            </div>
        </div>
        <div class="grow border-[1.5px] border-gray-200 rounded-sm p-3">
            <div class="w-full mb-2">
                <label for="name" class="text-[14px]">Nom</label>
                <input type="text" name="name" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="name" />
            </div>
            <div class="w-full mb-2">
                <label for="description" class="text-[14px]">Déscription</label>
                <textarea type="text" name="description" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="description"></textarea>
            </div>
            <button class="bg-[#19a2fb] p-2 text-white rounded-md font-thin text-[13px] mt-2" href="#">
                <i class="fa-solid fa-arrow-down-to-arc"></i>
                <span>ajouter la catégorie</span>
            </button>
        </div>
    </form>
</div>
<?php
require_once "inc/dash-footer.php";
?>