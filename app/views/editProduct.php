<?php
require_once "inc/dash-header.php";
var_dump($data["product"]);
?>
<div class="p-4 rounded-md bg-white">
    <p class="text-[24px] font-medium">
        Modifier le produit
    </p>
    <form action="http://localhost:9000/Dashboard/Product/<?php echo $data["product"]->id; ?>" enctype="multipart/form-data" method="POST" class="flex gap-5 mt-4 max-[900px]:flex-col">
        <div class="border-[1.5px] border-gray-200 rounded-sm p-3 grow">
            <p class="text-[14px]">Ajouter une image</p>
            <label name="image">
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
                    <img src="http://localhost:9000/public/src/assets/product/<?php echo $data["product"]->image?>" alt="default" class="img-display rounded-sm w-[40px] h-[40px]" />
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
                <label for="reference" class="text-[14px]">Ref??rence</label>
                <input value="<?php echo $data["product"]->reference; ?>" type="text" name="reference" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="reference" />
            </div>
            <div class="w-full mb-2">
                <label for="label" class="text-[14px]">libelle</label>
                <input value="<?php echo $data["product"]->label; ?>" type="text" name="label" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="label" />
            </div>
            <div class="w-full mb-2">
                <label for="barcode" class="text-[14px]">code bar</label>
                <input value="<?php echo $data["product"]->codeBar; ?>" type="text" name="barcode" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="barcode" />
            </div>
            <div class="w-full mb-2">
                <label for="purchase_price" class="text-[14px]">Prix d'achat</label>
                <input value="<?php echo $data["product"]->purchase_price; ?>" type="number" name="purchase_price" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="purchase_price" />
            </div>
            <div class="w-full mb-2">
                <label for="offre_price" class="text-[14px]">Prix offre</label>
                <input value="<?php echo $data["product"]->offre_price; ?>" type="number" name="offre_price" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="offre_price" />
            </div>
            <div class="w-full mb-2">
                <label for="final_price" class="text-[14px]">final offre</label>
                <input value="<?php echo $data["product"]->final_price; ?>" type="number" name="final_price" class="p-2 w-full font-semibold mt-1 rounded-md border-gray-200 border-[1.5px]" id="final_price" />
            </div>

            <div class="w-full mb-2">
                <select name="category" class="w-1/4 p-2 rounded-md border-gray-200 border-[1.5px] bg-white">
                    <option value="not-accepted">--------Cat??gorie--------</option>
                    <?php
                    foreach ($data["categories"] as $category) {
                    ?>
                        <option value="<?php echo $category->id; ?>" <?php if ($category->id === $data["product"]->category_id) echo "selected"; ?>>
                            <?php echo $category->name; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <a href="/Dashboard/addCategory" class="ml-3 text-[12px] font-thin text-[#19a2fb]">ajouter une cat??gorie?</a>
            </div>
            <button class="bg-[#19a2fb] p-2 text-white rounded-md font-thin text-[13px] mt-2" href="#">
                <i class="fa-solid fa-arrow-down-to-arc"></i>
                <span>ajouter le produit</span>
            </button>
            <a href="/Dashboard/deleteProduct/<?php echo $data["product"]->id; ?>" class="bg-red-500 p-2 text-white rounded-md font-thin text-[13px] mt-2">supprimer</a>
        </div>
    </form>
</div>
<?php
require_once "inc/dash-footer.php";
?>