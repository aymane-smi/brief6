<?php
require_once "inc/header.php";
?>
<div class="w-full flex justify-center items-center">
    <div class="bg-white p-4 mt-4 w-1/2 rounded-md">
        <form class="w-full " method="POST" action="http://localhost:9000/Dashboard/settings">
            <div class="flex flex-col items-start mt-2">
                <label for="email">email:</label>
                <input type="email" name="email" id="email" class="w-[90%] rounded-md border p-3" value="<?php echo $data["admin"]->email; ?>" />
            </div>
            <div class="flex flex-col items-start mt-2">
                <label for="username">username:</label>
                <input type="text" name="username" id="username" class="w-[90%] rounded-md border p-3" value="<?php echo $data["admin"]->username; ?>" />
            </div>
            <div class="flex flex-col items-start mt-2">
                <label for="password">password:</label>
                <input type="password" name="password" id="password" class="w-[90%] rounded-md border p-3" />
            </div>
            <button class="p-3 bg-orange-400 rounded-md text-white mt-3">change</button>
        </form>
    </div>
</div>
<?php
require_once "inc/footer.php";
?>