<?php
require_once "inc/header.php";
?>
<div class="w-full flex justify-center items-center">
    <div class="bg-white p-4 mt-4 w-1/2 rounded-md">
        <form class="w-full " method="POST" action="http://localhost:9000/Settings/edit">
            <div class="flex flex-col items-start mt-2">
                <label for="email">email:</label>
                <input type="email" name="email" id="email" class="w-[90%] rounded-md border p-3" value="<?php echo $data["client"]->email; ?>" />
            </div>
            <div class="flex flex-col items-start mt-2">
                <label for="username">username:</label>
                <input type="text" name="username" id="username" class="w-[90%] rounded-md border p-3" value="<?php echo $data["client"]->username; ?>" />
            </div>
            <div class="flex flex-col items-start mt-2">
                <label for="password">password:</label>
                <input type="password" name="password" id="password" class="w-[90%] rounded-md border p-3" />
            </div>
            <div class="flex flex-col items-start mt-2">
                <label for="full_name">full name:</label>
                <input type="text" name="full_name" id="full_name" class="w-[90%] rounded-md border p-3" value="<?php echo $data["client"]->full_name; ?>" />
            </div>
            <div class="flex flex-col items-start mt-2">
                <label for="phone">phone:</label>
                <input type="text" name="phone" id="phone" class="w-[90%] rounded-md border p-3" value="<?php echo $data["client"]->phone; ?>" />
            </div>
            <div class="flex flex-col items-start mt-2">
                <label for="address">address:</label>
                <input type="text" name="address" id="address" class="w-[90%] rounded-md border p-3" value="<?php echo $data["client"]->address; ?>" />
            </div>
            <div class="flex flex-col items-start mt-2">
                <label for="city">city:</label>
                <input type="text" name="city" id="city" class="w-[90%] rounded-md border p-3" value="<?php echo $data["client"]->city; ?>" />
            </div>
            <button class="p-3 bg-orange-400 rounded-md text-white mt-3">change</button>
        </form>
    </div>
</div>
<?php
require_once "inc/footer.php";
?>