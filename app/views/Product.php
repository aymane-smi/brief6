<?php
require_once "inc/header.php";
$key = false;
session_start();
if (empty($_SESSION) || $_SESSION["ROLE"] === "admin")
    $key = true;
?>
<div class="bg-white w-full mt-8 p-10 flex justify-center items-start gap-[50px]">
    <div>
        <img src="http://localhost:9000/public/src/assets/product/<?php echo $data->image; ?>" alt="default" class="w-[350px] h-[400px] rounded-md" />
        <div class="pb-3 border-b-[2px] border-gray-300 mt-3">
            <span class="border-b-[3px] border-gray-800 pb-3">détaille</span>
        </div>
        <p class="mt-4"><?php echo $data->reference . '-' . $data->label; ?></p>
    </div>
    <div class="flex flex-col gap-8">
        <p class="font-800 text-[15px] text-gray-500 rounded-md p-1 bg-gray-200 text-center"><?php echo $data->name; ?></p>
        <p class="font-bold text-[20px] text-black">
            <span class="init-price">
                <?php echo $data->final_price; ?>
            </span> MAD
        </p>
        <div class="flex justify-between items-center gap-5">
            Quantity:
            <span class="rounded-full border-[1px] p-1 border-gray-400 up-counter">+</span>
            <span class="counter">0</span>
            <span class="rounded-full border-[1px] p-1 border-gray-400 down-counter">-</span>
        </div>
        <?php if ($key) echo "true"; ?>
        <form action="http://localhost:9000/Product/<?php echo $data->id; ?>" method="POST">
            <input type="hidden" name="qte" value="0" class="qte-input" />
            <input type="hidden" name="price" value="<?php echo $data->final_price;?>"/>
            <button class="text-white bg-black p-5 mt-10 rounded-tl-[15px] rounded-br-[15px] font-semibold" <?php if ($key) echo "disabled"; ?>>ajouter au panier</button>
        </form>
    </div>
</div>
<?php
require_once "inc/footer.php";
?>