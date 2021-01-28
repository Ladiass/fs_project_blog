<?php 
session_start();

    if(isset($_SESSION["user_details"])){?>
<section class="w-full h-full">
    <div class="container mx-auto h-full p-10">
        <h2 class="font-bold text-4xl border-b-2 border-gray-300 pb-2 pl-3">Change Password</h2>
        <div class="flex justify-center items-center h-full px-4">
            <form action="/methods.php" method="POST" class="p-3 gap-y-2">
                <input type="hidden" name="action" value="change_pass">
                <label for="pass" class="px-3 block">Old Password</label>
                <input type="password" name="pass" class=" text-xl px-3 py-2 rounded-full outline-none  border-2 shadow-inner focus:shadow-xl mb-4 mt-2" id="pass">
                <label for="pass2" class="px-3 block">New Password</label>
                <input type="password" name="pass2" class=" text-xl px-3 py-2 rounded-full outline-none  border-2 shadow-inner focus:shadow-xl mb-4 mt-2" id="pass2">
                <input type="submit" class="btn bg-green-400 shadow-inner  outline-none font-medium rounded-full py-2 px-6 active:bg-green-600 active:shadow block mx-auto my-4 cursor-pointer hover:bg-green-500" value="Change">
            </form>
        </div>
    </div>
</section>
<?php 
     
    }
?>