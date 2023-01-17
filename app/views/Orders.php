<?php
require_once "inc/dash-header.php";
?>
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
                        <p class="p-1 text-[13px] rounded-md border-blue-500 border w-fit status">créer</p>
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
                        <p class="p-1 text-[13px] rounded-md border-blue-500 border w-fit status">créer</p>
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
                        <p class="p-1 text-[13px] rounded-md border-blue-500 border w-fit status">créer</p>
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