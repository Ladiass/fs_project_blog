<?php 
    if(isset($_SESSION["user_details"])){ 
?>
    <nav class="lg:px-20 md:px-10 px-5 py-1 bg-gray-800 rounded-b-xl shadow-inner">
        <div class="container mx-auto relative">
            <div class="row justify-between items-center text-xs font-bold">
                <a href="/views/dashboard/" class="hover:text-gray-400 transition duration-150 "><i class="fas fa-tools pr-1"></i>Dashboard</a>

                <div href="/"  id="drop-btn" data-dropdown="#dropmenu" class="hover:text-gray-400 transition duration-150 cursor-pointer" 
                onclick="
                    $('#dropmenu').css('display','block');
                    $('#drop-btn i').css('transform','rotateX(180deg)');
                "
                
                ><?php isset($_SESSION["user_details"]) ? print($_SESSION["user_details"]["name"]):print("Login"); ?> <i class="fas fa-caret-down" ></i></div>

                <div id="dropmenu" class="absolute h-full right-0 top-5 z-50"
                >
                    <ul class="bg-gray-700 text-right">
                        <li><a href="/methods.php?action=Logout">Logout<i class="fas fa-sign-out-alt pl-1"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<?php } ?>
<script>
    $("#dropmenu").mouseleave(()=>{
        var time = setTimeout(() => {
            $("#dropmenu").css("display","none");
            $('#drop-btn i').css('transform','rotateX(0deg)');
        }, 500);
    });
</script>

<nav class="nav w-full py-5 px-20 text-white bg-transparent absolute">
    <div class="row justify-around align-middle">
        <div>
            <ul class="flex gap-6">
                <li><a href="/">Home</a></li>
                <li><a href="/views/forms/about.php">About</a></li>
            </ul>
        </div>
        <a href="/" class="text-2xl font-mono hidden md:contents logo">Ling's Blog</a>
        <a href="mailto: limxinze@gmail.com" class="btn bg-pinker hover:bg-pinker py-1.5 rounded-lg hidden md:block">Contact me</a>
    </div>
</nav>