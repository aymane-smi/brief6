<?php
require_once "inc/header.php";
?>
<div class="bg-white w-full mt-8 p-10 flex justify-center items-start gap-[50px]">
    <?php
    foreach ($data as $product) {
    ?>
        <div>
            <img src="http://localhost:9000/public/src/assets/product/<?php echo $product->image; ?>" alt="<?php echo $product->reference; ?>" class="w-[200px] h-[200px] rounded-md" />
        </div>
        <div class="flex flex-col gap-4">
            <p class="font-800 text-[15px] text-gray-500 rounded-md p-1 bg-gray-200 text-center"><?php echo $product->reference; ?></p>
            <p class="font-bold text-[20px] text-black"><?php echo $product->final_price * $product->qte; ?> MAD</p>
            <div class="flex justify-between items-center gap-5">
                Quantity:
                <span class="rounded-full border-[1px] p-1 border-gray-400 up-counter">+</span>
                <span class="counter">
                    <?php echo $product->qte; ?>
                </span>
                <span class="rounded-full border-[1px] p-1 border-gray-400 down-counter">-</span>
            </div>
            <form action="http://localhost:9000/Produt/<?php echo $data->id; ?>" method="POST">
                <input type="hidden" name="qte" value="0" class="qte-input" />
                <button class="text-red-600 underline">supprimer</button>
            </form>
        </div>
    <?php
    }
    ?>
</div>
<?php
require_once "inc/footer.php";
?>