<?php
require_once "inc/dash-header.php";
?>
<div class="w-full p-8 font-medium text-[25px] flex justify-between">
    <div>
    <p>Dashboard</p>
    <p class="text-gray-400 text-[16px] mt-2">Ravi de te revoir! <?php echo $data["user"]->username; ?></p>
    </div>
    <a href="/Auth/logout" class="text-[15px]">logout</a>
</div>
<div class="flex justify-center items-center w-full gap-4">
    <div class="bg-[#fe6976] w-fit p-5 rounded-md font-semibold text-white flex justify-between gap-5 items-center">
        <i class="fa-regular fa-chart-line-up text-[25px]"></i>
        <div class="flex flex-col">
            <span class="font-normal">nbr de commandes</span>
            <span><?php echo $data["order"]; ?></span>
        </div>
    </div>
    <div class="bg-[#19a2fb] w-fit p-5 rounded-md font-semibold text-white flex justify-between gap-5 items-center">
        <i class="fa-solid fa-person text-[25px]"></i>
        <div class="flex flex-col">
            <span class="font-normal">nbr de clients</span>
            <span><?php echo $data["clients"] ?></span>
        </div>
    </div>
    <div class="bg-[#74cdff] w-fit p-5 rounded-md font-semibold text-white flex justify-between gap-5 items-center">
        <i class="fa-solid fa-paper-plane-top text-[25px]"></i>
        <div class="flex flex-col">
            <span class="font-normal">nbr de commandes envoyées</span>
            <span><?php echo $data["shipped"]; ?></span>
        </div>
    </div>
    <div class="bg-[#83b3c0] w-fit p-5 rounded-md font-semibold text-white flex justify-between gap-5 items-center">
        <i class="fa-sharp fa-solid fa-badge-check text-[25px]"></i>
        <div class="flex flex-col">
            <span class="font-normal">nbr de commandes reçu</span>
            <span><?php echo $data["delivred"]; ?></span>
        </div>
    </div>
</div>
<div class="mt-4 bg-white w-full rounded-md p-4">
    <div class="flex justify-between items-center w-full">
        <p class="text-[22px] font-medium">Produits</p>
        <a class="bg-[#19a2fb] p-2 text-white rounded-md font-thin text-[13px]" href="/Dashboard/addProduct">
            <i class="fa-light fa-circle-plus"></i>
            <span>ajouter un produit</span>
        </a>
    </div>
    <table class="w-full mt-3">
        <thead class="bg-[#0099fb] text-white">
            <tr>
                <th class="p-3 font-normal" align="left">Id</th>
                <th class="p-3 font-normal" align="left">Image</th>
                <th class="p-3 font-normal" align="left">Référence</th>
                <th class="p-3 font-normal" align="left">Libelle</th>
                <th class="p-3 font-normal" align="left">Code bar</th>
                <th class="p-3 font-normal" align="left">Catégorie</th>
                <th class="p-3 font-normal" align="left">Prix d'achat</th>
                <th class="p-3 font-normal" align="left">Prix final</th>
                <th class="p-3 font-normal" align="left">Prix offre</th>
                <th class="p-3 font-normal" align="left">modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data["product"] as $product) {
            ?>
                <tr class="border-[1.5px] border-gray-200">
                    <td class="p-3 font-normal rounded-l-md"><?php echo $product->id; ?></td>
                    <td class="p-3 font-normal">
                        <img src="http://localhost:9000/public/src/assets/product/<?php echo $product->image; ?>" alt="<?php echo $product->reference; ?>" class="rounded-full w-[40px] h-[40px]" />
                    </td>
                    <td class="p-3 font-normal"><?php echo $product->reference; ?></td>
                    <td class="p-3 font-normal"><?php echo $product->label; ?></td>
                    <td class="p-3 font-normal"><?php echo $product->codeBar; ?></td>
                    <td class="p-3 font-normal"><?php echo $product->name; ?></td>
                    <td class="p-3 font-normal"><?php echo $product->purchase_price; ?> MAD</td>
                    <td class="p-3 font-normal"><?php echo $product->final_price; ?> MAD</td>
                    <td class="p-3 font-normal rounded-tr-md rounded-br-md"><?php echo $product->offre_price; ?> MAD</td>
                    <td class="p-3 font-normal">
                        <a href="http://localhost:9000/Dashboard/Product/<?php echo $product->id; ?>">Modifier</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="mt-4 bg-white w-full rounded-md p-4">
    <div class="flex justify-between items-center w-full">
        <p class="text-[22px] font-medium">Catégories</p>
        <a class="bg-[#19a2fb] p-2 text-white rounded-md font-thin text-[13px]" href="/Dashboard/addCategory">
            <i class="fa-light fa-circle-plus"></i>
            <span>ajouter une catégorie</span>
        </a>
    </div>
    <table class="w-full mt-3">
        <thead class="bg-[#0099fb] text-white">
            <tr>
                <th class="p-3 font-normal" align="left">Id</th>
                <th class="p-3 font-normal" align="left">Image</th>
                <th class="p-3 font-normal" align="left">Nom</th>
                <th class="p-3 font-normal" align="left">Déscription</th>
                <th class="p-3 font-normal" align="left">Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data["category"] as $category) {
            ?>
                <tr class="border-[1.5px] border-gray-200">
                    <td class="p-3 font-normal rounded-l-md"><?php echo $category->id; ?></td>
                    <td class="p-3 font-normal">
                        <img src="http://localhost:9000/public/src/assets/category/<?php echo $category->image; ?>" alt="<?php echo $category->name; ?>" class="rounded-full w-[40px] h-[40px]" />
                    </td>
                    <td class="p-3 font-normal"><?php echo $category->name; ?></td>
                    <td class="p-3 font-normal"><?php echo $category->description; ?></td>
                    <td class="p-3 font-normal">
                        <a href="http://localhost:9000/Dashboard/Category/<?php echo $category->id; ?>">Modifier</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="mt-4 bg-white w-full rounded-md p-4">
    <div class="flex justify-between items-center w-full">
        <p class="text-[22px] font-medium">Clients</p>
    </div>
    <table class="w-full mt-3">
        <thead class="bg-[#0099fb] text-white">
            <tr>
                <th class="p-3 font-normal" align="left">Id</th>
                <th class="p-3 font-normal" align="left">Email</th>
                <th class="p-3 font-normal" align="left">Nom d'utilisateur</th>
                <th class="p-3 font-normal" align="left">Nom complet</th>
                <th class="p-3 font-normal" align="left">Téléphone</th>
                <th class="p-3 font-normal" align="left">adresse</th>
                <th class="p-3 font-normal" align="left">Ville</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data["client"] as $client) {
            ?>
                <tr class="border-[1.5px] border-gray-200">
                    <td class="p-3 font-normal rounded-l-md"><?php echo $client->id; ?></td>
                    <td class="p-3 font-normal"><?php echo $client->email; ?></td>
                    <td class="p-3 font-normal"><?php echo $client->username; ?></td>
                    <td class="p-3 font-normal"><?php echo $client->full_name; ?></td>
                    <td class="p-3 font-normal"><?php echo $client->phone; ?></td>
                    <td class="p-3 font-normal"><?php echo $client->address; ?></td>
                    <td class="p-3 font-normal"><?php echo $client->city; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div class="flex gap-5 mt-5 max-[800px]:flex-col max-[800px]:justify-center max-[800px]:items-center">
    <div id="chart" class="w-full"></div>
    <div class="w-1/2 p-5 bg-white rounded-md h-fit flex flex-col gap-7 justify-center items-center max-[900px]:w-full">
        <a href="/Dashboard/Orders" class="p-4 rounded-md bg-blue-500 text-white">gérer les commandes</a>
        <a href="/Dashboard/settings" class="p-4 rounded-md bg-blue-500 text-white">modifier les paramètres</a>
    </div>
</div>
<?php
require_once "inc/dash-footer.php";
?>