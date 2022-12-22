<?php
    require_once "./inc/header.php";
?>
<div class="bg-white mt-4 p-4 rounded-sm flex justify-center items-start gap-5">
    <div class="w-1/2 flex flex-col gap-5">
        <p class="my-3 text-[25px] font-bold">Information de votre carte bancaire</p>
        <div class="flex flex-col gap-2 w-1/2">
            <label for="card-owner" class="font-semibold">Card owner</label>
            <input type="text" name="card-owner" id="card-owner" class="border-[2px] border-gray-200 bg-gray-100 p-3 rounded-md text-[20px]"/>
        </div>
        <div class="flex flex-col gap-2 w-1/2">
            <label for="card-number" class="font-semibold">Card number</label>
            <input type="text" name="card-number" id="card-number" class="border-[2px] border-gray-200 bg-gray-100 p-3 rounded-md text-[20px]"/>
        </div>
        <div class="flex justify-between items-start w-1/2">
            <div class="flex flex-col gap-2">
                <label for="expire-date" class="font-semibold">Expire date</label>
                <input type="text" name="expire-date" class="w-1/2 border-[2px] border-gray-200 bg-gray-100 p-3 rounded-md text-[20px]" id="expire-date" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="cvv" class="font-semibold">cvv</label>
                <input type="text" name="cvv" class="w-1/2 border-[2px] border-gray-200 bg-gray-100 p-3 rounded-md text-[20px]" id="cvv"/>
            </div>
        </div>
        <div class="mt-4 border bg-gray-100 p-4 w-full rounded-sm pl-8">
            <div class="w-full flex justify-between items-center mt-3">
               <p class="text-[20px]">Nom prenom</p>
               <a href="#" alt="edit user info" class="text-red-500 underline">modifier</a> 
            </div>
            <p class="mt-3">
                <i class="fa-regular fa-phone"></i>
                123456789
            </p>
            <p class="mt-3">
                <i class="fa-regular fa-location-dot"></i>
                adresse
            </p>
        </div>
    </div>
    <div class="w-1/2">
        <p class="text-[20px] pb-3 w-fit border-b-[2px] border-black mb-3">Vous produits</p>
        <p class="text-[15px] font-semibold my-4">1 produit</p>
        <div class="flex gap-4 items-start">
            <div clas="flex flex-col justify-center items-center">
                <img src="http://localhost:9000/public/src/assets/wwdc2019DSC_4114.jpg" alt="default" class=" w-[100px] h-[100px] rounded-md"/>
                <button class="text-gray-500 text-[13px] underline">remove</button>
            </div>
            <div>
                <p class="text-[28px] font-semibold">nom produit</p>
                <p>Quantity: 0</p>
            </div>
        </div>
        <p class="w-full border-t-[3px] flex justify-between items-center p-2">
            <span class="font-medium text-[18px]">Total</span>
            <span class="font-semibold text-[20px]">0 MAD</span>
        </p>
        <button class="w-1/2 mx-auto block p-3  rounded-md text-white bg-black">acheter</button>
    </div>
</div>
<?php
    require_once "./inc/footer.php";
?>