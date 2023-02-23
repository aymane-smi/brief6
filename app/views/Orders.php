<?php
require_once "inc/dash-header.php";
?>
<div class="w-screen h-screen absolute bg-black/20 justify-center items-center hidden" id="model">
    <div class="bg-white p-10 rounded-[10px]">
        <p class="font-bold">client:</p>
        <div class="grid grid-cols-3 gap-3 mt-5">
            <p class="rounded-[10px] bg-blue-500 p-3 flex justify-center text-white font-bold">Product</p>
            <p class="rounded-[10px] bg-blue-500 p-3 flex justify-center text-white font-bold">qte</p>
            <p class="rounded-[10px] bg-blue-500 p-3 flex justify-center text-white font-bold">price</p>
        </div>
        <div class="grid grid-cols-3 gap-3 mt-5 module-details">
            <p class="rounded-[10px] p-3 flex justify-center font-bold">Mac</p>
            <p class="rounded-[10px] p-3 flex justify-center font-bold">1</p>
            <p class="rounded-[10px] p-3 flex justify-center font-bold">1200$</p>
        </div>
        <div class="p-2 rounded-[10px] text-white bg-red-600 w-fit mt-3 close-model cursor-pointer">close</div>
    </div>
</div>
<p class="text-[28px] font-semibold">Liste des commandes</p>
<div class="mt-5 p-8 bg-white rounded-md">
    <div class="grid gap-5 grid-cols-3">
        <div class="flex flex-col gap-5" ondragover="drop(event)" ondrop="dragdrop(event)" id="created">
            <div class="p-5 rounded-md bg-blue-400 w-full flex justify-center items-center text-[20px] font-semibold text-white">créer</div>
            <?php
            foreach ($data["created"] as $created) {
            ?>
                <div class="w-full rounded-xl overflow-hidden flex justify-start" id="cmd_<?php echo $created->id; ?>" ondragstart="dragstart(event)" draggable="true">
                    <div class="text-[30px] font-semibold p-5 bg-blue-300" style="writing-mode:vertical-rl; transform: rotate(180deg)">cmd°<?php echo $created->id; ?></div>
                    <div class="border w-full p-3 flex flex-col justify-between">
                        <p class="font-semibold full-name"><?php echo $created->full_name; ?></p>
                        <p class="mt-3">
                            <i class="fa-regular fa-location-dot"></i>
                            <?php echo $created->address; ?>
                        </p>
                        <div class="flex gap-3">
                            <p class="p-1 text-[13px] rounded-md border-blue-500 border w-fit status">créer</p>
                            <p class="p-1 text-[13px] rounded-md border-gray-500 border w-fit activate_model" id="info-<?php echo $created->id; ?>">more</p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="flex flex-col gap-5" ondragover="drop(event)" ondrop="dragdrop(event)" id="shipped">
            <div class="p-5 rounded-md bg-orange-400 w-full flex justify-center items-center text-[20px] font-semibold text-white">envoyer</div>
            <?php
            foreach ($data["shipped"] as $shipped) {
            ?>
                <div class="w-full rounded-xl overflow-hidden flex justify-start" id="cmd_<?php echo $shipped->id; ?>" ondragstart="dragstart(event)" draggable="true">
                    <div class="text-[30px] font-semibold p-5 bg-orange-300" style="writing-mode:vertical-rl; transform: rotate(180deg)">cmd°<?php echo $shipped->id; ?></div>
                    <div class="border w-full p-3 flex flex-col justify-between">
                        <p class="font-semibold full-name"><?php echo $shipped->full_name; ?></p>
                        <p class="mt-3">
                            <i class="fa-regular fa-location-dot"></i>
                            <?php echo $shipped->address; ?>
                        </p>
                        <div class="flex gap-3">
                            <p class="p-1 text-[13px] rounded-md border-orange-500 border w-fit status">envoyer</p>
                            <p class="p-1 text-[13px] rounded-md border-gray-500 border w-fit activate_model" id="info-<?php echo $created->id; ?>">more</p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="flex flex-col gap-5" ondragover="drop(event)" ondrop="dragdrop(event)" id="delivred">
            <div class="p-5 rounded-md bg-green-400 w-full flex justify-center items-center text-[20px] font-semibold text-white">reçu</div>
            <?php
            foreach ($data["delivred"] as $delivred) {
            ?>
                <div class="w-full rounded-xl overflow-hidden flex justify-start" id="cmd_<?php echo $delivred->id; ?>" ondragstart="dragstart(event)" draggable="true">
                    <div class="text-[30px] font-semibold p-5 bg-green-300" style="writing-mode:vertical-rl; transform: rotate(180deg)">cmd°<?php echo $delivred->id; ?></div>
                    <div class="border w-full p-3 flex flex-col justify-between">
                        <p class="font-semibold full-name"><?php echo $delivred->full_name; ?></p>
                        <p class="mt-3">
                            <i class="fa-regular fa-location-dot"></i>
                            <?php echo $delivred->address; ?>
                        </p>
                        <div class="flex gap-3">
                            <p class="p-1 text-[13px] rounded-md border-green-500 border w-fit status">reçu</p>
                            <p class="p-1 text-[13px] rounded-md border-gray-500 border w-fit activate_model" id="info-<?php echo $created->id; ?>">more</p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
require_once "inc/dash-footer.php";
?>