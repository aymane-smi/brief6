<?php
require_once "inc/header.php";
?>
<div class="p-8 mt-4 bg-white flex gap-20">
    <div class="w-fit">
        <p class="text-[21px] font-semibold pb-4 border-b-[2px] border-gray-200 w-full">Catégories</p>
        <form class="mt-5">
            <?php
            foreach ($data{
                "category"} as $category) {
            ?>
                <div class="flex flex-row-reverse justify-between items-center">
                    <label for="categorie"><?php echo $category->name; ?></label>
                    <input type="checkbox" name="category[]" id="categorie" value="<?php echo $category->id; ?>" />
                </div>
            <?php
            }
            ?>
        </form>
    </div>
    <div class="flex flex-wrap justify-start items-center mb-10 gap-20 products-container">
        <?php
        foreach ($data{
            "product"} as $product) {
        ?>
            <div>
                <div class="overflow-hidden rounded-md w-fit border-[1px] border-[#5C5C5C]">
                    <img class="w-[200px] h-[200px]" src="http://localhost:9000/public/src/assets/product/<?php echo $product->image; ?>" alt="<?php echo $product->reference; ?>" />
                </div>
                <p class="mt-3 flex justify-between items-center">
                    <span class="font-800 text-[15px] text-gray-500"><?php echo $product->reference; ?></span>
                    <span class="font-800 text-[11px] text-gray-500 rounded-sm p-1 bg-gray-200"><?php echo $product->name; ?></span>
                </p>
                <p class="mt-3 font-semibold text-[15px] text-gray-500"><?php echo $product->libelle; ?></p>
                <p class="mt-3 flex justify-between items-center">
                    <span class="mt-3 font-semibold text-[18px]"><?php echo $product->final_price; ?> MAD</span>
                    <a class="p-1 text-gray-500 border-[1px] border-gray-200 rounded-md hover:border-black hover:bg-black hover:text-white" href="/Product/<?php echo $product->id; ?>">Détaille</a>
                </p>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
require_once "inc/footer.php";
?>