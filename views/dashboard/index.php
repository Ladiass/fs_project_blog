<?php 
session_start() ;
    if(!isset($_SESSION["user_details"])){
        header("Location: /");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ling's Blog | Dashboard</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    
    <!-- Jquery 3.5.1 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Font Awesome JavaScript -->
    <script src="https://kit.fontawesome.com/511217841c.js" crossorigin="anonymous"></script>

    <!-- Montserrat font -->
    <link rel="preconnect" href = "https: //fonts.gstatic.com" >
    <link href = "https: //fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;700&display=swap" rel = "stylesheet " > 
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <script src="/assets/js/dashboard.js" defer></script>
</head>
<body>
    <div class="container-fluid">
    <nav class="bg-gray-800 fixed w-screen text-xs px-16 font-bold">
        <a href="/" class="px-4 hover:text-gray-400 transition-colors duration-150"><i class="fas fa-home mr-1"></i>See the Website</a>
    </nav>
        <div class="row h-screen ">
            <nav class="md:w-2/12 w-20 bg-gray-800 h-full py-20 text-center flex items-center">
                <ul class="w-full md:relative">
                    
                        <div class="flex justify-between items-center px-6 cursor-pointer hover:bg-gray-400 transition duration-150 text-xl md:text-base md:py-2 py-4" data-dropbtn="posts">
                            <div class="v-hidden"></div>
                            <li class="flex">
                            <i class="fas fa-sticky-note mr-1 fa-1x"></i>
                            <p class="hidden md:contents">Posts</p>
                            </li>
                            <i class="fas fa-caret-right"></i>
                        </div>

                        <div class="absolute md:min-w-max  md:left-full bg-gray-700 ml-0.5 md:-top-1/2 top-top w-screen h-screen transform hidden " data-dropmenu="posts">
                            <div class="flex justify-center items-center h-screen overflow-hidden md:block md:h-auto md:overflow-auto">
                                <ul class="w-screen md:w-auto">
                                    <li class="w-full hover:bg-gray-400 py-2 px-4 cursor-pointer transition-all duration-150" id="posts_add">
                                    <i class="fas fa-plus mr-1"></i>
                                    Add Post
                                    </li>
                                    <li class="w-full hover:bg-gray-400 py-2 px-4 cursor-pointer transition-all duration-150" id="posts_all">
                                    <i class="fas fa-tasks mr-1"></i>
                                    All Posts
                                    </li>
                                    <li class="w-full hover:bg-gray-400 py-2 px-4 cursor-pointer transition-all duration-150 md:hidden nav_close">
                                        <i class="fas fa-times"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="flex justify-between items-center px-6 cursor-pointer hover:bg-gray-400 transition duration-150 text-xl md:text-base md:py-2 py-4" data-dropbtn="account">
                            <div class="v-hidden"></div>
                            <li class="flex">
                                <i class="fas fa-user-alt mr-1 fa-1x"></i>
                                <p class="hidden md:contents">Account</p>
                            </li>
                            <i class="fas fa-caret-right"></i>
                        </div>
                        <a href="/methods.php?action=Logout" class="flex justify-center items-center px-6 cursor-pointer hover:bg-gray-400 transition duration-150 text-xl md:text-base md:py-2 py-4 " data-dropbtn="account">
                            <li class="flex">
                                <i class="fas fa-sign-out-alt mr-1"></i>
                                <p class="hidden md:contents">Logout</p>
                            </li>
                        </a>

                        <div class=" absolute md:min-w-max  md:left-full bg-gray-700 ml-0.5 md:top-1/2 top-0 w-screen h-screen transform  hidden" data-dropmenu="account">
                            <div class="flex justify-center items-center h-screen overflow-hidden md:block md:h-auto md:overflow-auto">
                                <ul class="w-screen md:w-auto">
                                    <!-- <li class=" hover:bg-gray-400 py-2 cursor-pointer transition-all duration-150 px-4" id="profile">
                                    <i class="fas fa-id-card mr-1"></i>
                                    Profile
                                    </li> -->
                                    <li class=" hover:bg-gray-400 py-2 cursor-pointer transition-all duration-150 px-4" id="change_pass">
                                    <i class="fas fa-key mr-1"></i>
                                    Change Password
                                    </li>
                                    <li class=" hover:bg-gray-400 py-2 cursor-pointer transition-all duration-150 px-4" id="add_user">
                                    <i class="fas fa-user-plus mr-1" ></i>
                                    Add User
                                    </li>
                                    <li class="w-full hover:bg-gray-400 py-2 px-4 cursor-pointer transition-all duration-150 md:hidden nav_close">
                                        <i class="fas fa-times"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    
                </ul>
            </nav>
            <main class="bg-gray-50 md:w-10/12 pt-4 h-screen overflow-y-hidden">

            </main>
        </div>
    </div>
    
</body>
</html>
