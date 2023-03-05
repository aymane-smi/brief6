<?php
require_once "inc/header.php";
?>
<form class="bg-white mt-4 p-4 rounded-sm flex justify-center items-start gap-5 max-[1000px]:flex-col form-payment" >
    <div class="max-[1000px]:w-[90%] w-1/2 flex flex-col gap-5">
        <p class="my-3 text-[25px] font-bold">Information de votre carte bancaire</p>
        <div class="my-3 flex flex-col" id="bank_info"></div>
        <!-- <p class="my-3 text-[25px] font-bold">Information de votre carte bancaire</p>
        <div class="flex flex-col gap-2 w-1/2 max-[1000px]:w-[90%]">
            <label for="card-owner" class="font-semibold">Card owner</label>
            <input type="text" name="card-owner" id="card-owner" class="border-[2px] border-gray-200 bg-gray-100 p-3 rounded-md text-[20px]" />
        </div>
        <div class="flex flex-col gap-2 w-1/2 max-[1000px]:w-[90%]">
            <label for="card-number" class="font-semibold">Card number</label>
            <input type="text" name="card-number" id="card-number" class="border-[2px] border-gray-200 bg-gray-100 p-3 rounded-md text-[20px]" />
        </div>
        <div class="flex justify-start gap-5 items-start w-1/2 max-[1000px]:w-[90%] max-[500px]:flex-col">
            <div class="flex flex-col gap-2">
                <label for="expire-date" class="font-semibold">Expire date</label>
                <input type="text" name="expire-date" class="w-[100px] border-[2px] border-gray-200 bg-gray-100 p-3 rounded-md text-[20px]" id="expire-date" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="cvv" class="font-semibold">cvv</label>
                <input type="text" name="cvv" class="w-[100px] border-[2px] border-gray-200 bg-gray-100 p-3 rounded-md text-[20px]" id="cvv" />
            </div>
        </div> -->
        <div class="mt-4 border bg-gray-100 p-4 w-full rounded-sm pl-8">
            <div class="w-full flex justify-between items-center mt-3">
                <p class="text-[20px]">
                    <?php
                    echo $data["client_info"]->full_name;
                    ?>
                </p>
                <a href="#" alt="edit user info" class="text-red-500 underline">modifier</a>
            </div>
            <p class="mt-3">
                <i class="fa-regular fa-phone"></i>
                <?php
                echo $data["client_info"]->phone;
                ?>
            </p>
            <p class="mt-3">
                <i class="fa-regular fa-location-dot"></i>
                <?php
                echo $data["client_info"]->address;
                ?>
            </p>
        </div>
    </div>
    <div class="w-1/2 max-[1000px]:w-[90%]">
        <p class="text-[20px] pb-3 w-fit border-b-[2px] border-black mb-3">Vous produits</p>
        <p class="text-[15px] font-semibold my-4"><?php echo count($data["products"]); ?> produit</p>
        <?php
        $total = 0;
        foreach ($data["products"] as $product) {
            $total += $product->qte * $product->final_price;
        ?>
            <div class="flex gap-4 items-start">
                <div clas="flex flex-col justify-center items-center">
                    <img src="http://localhost:9000/public/src/assets/product/<?php echo $product->image; ?>" alt="<?php echo $product->reference; ?>" class=" w-[100px] h-[100px] rounded-md" />
                    <button class="text-gray-500 text-[13px] underline">remove</button>
                </div>
                <div>
                    <p class="text-[28px] font-semibold"><?php echo $product->reference; ?></p>
                    <p>Quantity: <?php echo $product->qte; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
        <p class="w-full border-t-[3px] flex justify-between items-center p-2">
            <span class="font-medium text-[18px]">Total</span>
            <span class="font-semibold text-[20px]"><?php echo $total; ?> MAD</span>
        </p>
        <button class="w-1/2 mx-auto block p-3  rounded-md text-white bg-black">acheter</button>
    </div>
</form>
<?php
require_once "inc/footer.php";
?>