<?php
require_once "inc/header.php";
?>
<div class="bg-white w-full mt-8 p-10 flex justify-center items-center gap-[50px]">
    <?php
    if (!count($data))
        echo "votre cart est vide!";
    foreach ($data as $product) {
    ?>
        <div>
            <img src="http://localhost:9000/public/src/assets/product/<?php echo $product->image; ?>" alt="<?php echo $product->reference; ?>" class="w-[200px] h-[200px] rounded-md" />
        </div>
        <div class="flex flex-col gap-4">
            <p class="font-800 text-[15px] text-gray-500 rounded-md p-1 bg-gray-200 text-center"><?php echo $product->reference; ?></p>
            <p class="font-bold text-[20px] text-black"><?php echo $product->Cartprice * $product->qte; ?> MAD</p>
            <div class="flex justify-between items-center gap-5">
                Quantity:
                <span class="rounded-[50%]  h-[20px] text-center leading-[20px] w-[20px] border-[1px] border-gray-400 up-counter-cart" data-id="<?php echo $product->id; ?>">+</span>
                <span class="counter" data-price="<?php echo $product->Cartprice;?>">
                    <?php echo $product->qte; ?>
                </span>
                <span class="rounded-[50%] h-[20px] w-[20px] text-center leading-[20px] border-[1px] border-gray-400 down-counter-cart" data-id="<?php echo $product->id; ?>">-</span>
            </div>
            <form action="http://localhost:9000/Cart/Delete/<?php echo $product->id; ?>" method="POST">
                <input type="hidden" name="qte" value="0" class="qte-input" />
                <button class="text-red-600 underline">supprimer</button>
            </form>
        </div>
    <?php
    }
    ?>
</div>
<p class="text-center mt-3 font-bold blockw-full">total: <span class="price-cart">0</span> dh</p>
<a href="/Order" class=" mt-3 p-4 bg-black text-white rounded-tl-[15px] rounded-br-[15px] font-semibold mx-auto my-0 block w-fit">valider votre commande</a>
<?php
require_once "inc/footer-cart.php";
?>