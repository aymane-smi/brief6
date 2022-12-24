<?php
require_once "./inc/dash-header.php";
?>
        <div class="w-full p-8 font-medium text-[25px]">
            <p>Dashboard</p>
            <p class="text-gray-400 text-[16px] mt-2">Ravi de te revoir! username</p>
        </div>
        <div class="flex justify-center items-center w-full gap-4">
            <div class="bg-[#fe6976] w-fit p-5 rounded-md font-semibold text-white flex justify-between gap-5 items-center">
                <i class="fa-regular fa-chart-line-up text-[25px]"></i>
                <div class="flex flex-col">
                    <span class="font-normal">nbr de commandes</span>
                    <span>0</span>
                </div>
            </div>
            <div class="bg-[#19a2fb] w-fit p-5 rounded-md font-semibold text-white flex justify-between gap-5 items-center">
                <i class="fa-solid fa-person text-[25px]"></i>
                <div class="flex flex-col">
                    <span class="font-normal">nbr de clients</span>
                    <span>0</span>
                </div>
            </div>
            <div class="bg-[#74cdff] w-fit p-5 rounded-md font-semibold text-white flex justify-between gap-5 items-center">
                <i class="fa-solid fa-paper-plane-top text-[25px]"></i>
                <div class="flex flex-col">
                    <span class="font-normal">nbr de commandes envoyées</span>
                    <span>0</span>
                </div>
            </div>
            <div class="bg-[#83b3c0] w-fit p-5 rounded-md font-semibold text-white flex justify-between gap-5 items-center">
                <i class="fa-sharp fa-solid fa-badge-check text-[25px]"></i>
                <div class="flex flex-col">
                    <span class="font-normal">nbr de commandes envoyées</span>
                    <span>0</span>
                </div>
            </div>
        </div>
        <div class="mt-4 bg-white w-full rounded-md p-4">
            <div class="flex justify-between items-center w-full">
                <p class="text-[22px] font-medium">Produit</p>
                <a class="bg-[#19a2fb] p-2 text-white rounded-md font-thin text-[13px]" href="#">
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
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-[1.5px] border-gray-200">
                        <td class="p-3 font-normal rounded-l-md">0</td>
                        <td class="p-3 font-normal">
                            <img src="http://localhost:9000/public/src/assets/wwdc2019DSC_4114.jpg" alt="product" class="rounded-full w-[40px] h-[40px]"/>
                        </td>
                        <td class="p-3 font-normal">abcd</td>
                        <td class="p-3 font-normal">abcd</td>
                        <td class="p-3 font-normal">12345</td>
                        <td class="p-3 font-normal">PC</td>
                        <td class="p-3 font-normal">0 MAD</td>
                        <td class="p-3 font-normal">0 MAD</td>
                        <td class="p-3 font-normal rounded-tr-md rounded-br-md">0 MAD</td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php
require_once "./inc/dash-footer.php";
?>