<?php
require_once "inc/header.php";
?>
<div class="mt-10 w-full rounded-[10px] flex flex-col justify-center items-center font-si">
    <span class="text-[25px] font-semibold">Bienvenu chez ElectroMaroc</span>
    <span class="text-[20px] font-medium">le 1er distributer des composants éléctroniques dans la royaum</span>
    <a class="text-white bg-black p-5 mt-10 rounded-tl-[15px] rounded-br-[15px] font-semibold">explore notre produits</a>
</div>
</div>
<div class="bg-black w-screen p-8">
    <p class="text-white text-[20px] font-bold">Choissiais votre catégorie
    <p>
    <p class="text-white text-[17px] font-medium mt-5">vous trouvrez tous les catégories qui concerne le gaming, électro-ménagé et autres...</p>
    <div class="flex flex-wrap justify-center items-center gap-[50px] mt-10">
        <?php
        foreach ($data["category"] as $category) {
        ?>
            <div class="text-white w-[250px]">
                <img class="h-[300px]" src="http://localhost:9000/public/src/assets/category/<?php echo $category->image; ?>" alt="<?php echo $category->name; ?>" />
                <p class="p-4 bg-white text-black font-semibold flex justify-center items-center"><?php echo $category->name; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<div class="p-[40px] bg-white w-full">
    <p class="text-[23px] font-bold pb-7 border-b-[1px] border-gray-400 mb-10">Notre Produit</p>
    <div class="flex flex-wrap justify-center items-center mb-10 gap-20">
        <?php
        foreach ($data["product"] as $product) {
        ?>
            <div>
                <div class="overflow-hidden rounded-md w-fit border-[1px] border-[#5C5C5C]">
                    <img class="w-[200px] h-[200px]" src="http://localhost:9000/public/src/assets/product/<?php echo $product->image; ?>" alt="<?php echo $category->reference; ?>" />
                </div>
                <p class="mt-3 flex justify-between items-center">
                    <span class="font-800 text-[15px] text-gray-500"><?php echo $product->reference; ?></span>
                    <span class="font-800 text-[11px] text-gray-500 rounded-sm p-1 bg-gray-200"><?php echo $product->name; ?></span>
                </p>
                <p class="mt-3 font-semibold text-[15px] text-gray-500"><?php echo $product->label; ?></p>
                <p class="mt-3 flex justify-between items-center">
                    <span class="mt-3 font-semibold text-[18px]"><?php echo $product->final_price; ?> MAD</span>
                    <a class="p-1 text-gray-500 border-[1px] border-gray-200 rounded-md hover:border-black hover:bg-black hover:text-white" href="/Product/<?php echo $product->id; ?>">Détaille</a>
                </p>
            </div>
        <?php
        }
        ?>
    </div>
    <a class="p-4 bg-black text-white rounded-tl-[15px] rounded-br-[15px] font-semibold mx-auto my-0 block w-fit">Voir tous les produits</a>
    <?php
    require_once "inc/footer.php";
    ?>