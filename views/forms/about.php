
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ling's Blog | Login Page</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    
    <!-- Jquery 3.5.1 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Font Awesome JavaScript -->
    <script src="https://kit.fontawesome.com/511217841c.js" crossorigin="anonymous"></script>

    <!-- Montserrat font -->
    <link rel="preconnect" href = "https: //fonts.gstatic.com" >
    <link href = "https: //fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;700&display=swap" rel = "stylesheet " > 
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/about.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js" defer></script>
    <style>
        body{
            background: linear-gradient(to top , rgba(0,0,0,.5),rgba(0,0,0,.1)),url(<?php  print("\"/assets/img/Hero/Hero Image-".mt_rand(1,4).".png\""); ?>) ;
            background-position: center;
            background-size: cover;
        }
        footer{
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .footer-icon a i{
            cursor:pointer;
            -webkit-text-fill-color: rgb(55, 65, 81); /* Will override color (regardless of order) */
            -webkit-text-stroke-width: .8px;
            -webkit-text-stroke-color: rgb(219, 39, 119);
        }
        .footer-icon a:hover i{
            -webkit-text-fill-color: rgb(219, 39, 119); /* Will override color (regardless of order) */
            -webkit-text-stroke-width: 0;
        }
        input{
            /* color: black!important; */
            padding-left: .3rem;
        }
        form *{
            color: black;
        }
    </style>
</head>
<body class="bg-gray-700">
    <main>
        <div class="mx-auto container">
            <div class="flex justify-center items-center h-screen">
                <div class=" shadow-inner flex justify-center items-center relative">
                    <div class="form absolute px-10 w-screen py-20 cursor-default break-words text-center rounded-2xl" data-tilt>
                        <h1 class="text-4xl border-b-2 border-gray-400 animate-bounce py-4">About</h1>
                        <p>
                            Hi i'm Ling , I'm a fullstack developer.<br>
                            For this website is let me posts something funny and some of my very useful experience.
                            Of course u also can contact me , if you hv any jobs for me. This will let me very happy.
                            lastly Hope u enjoy 
                        </p>
                        <div class="pt-10">
                            <a href="mailto: limxinze@gmail.com" class="btn bg-pinker hover:bg-pinker py-2.5 px-6 rounded-lg">Contact me</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <div class="logo absolute bottom-0 z-50 py-5 left-1/2">
    </div>


    <footer class="bg-gray-800 row md:justify-between px-20 items-center py-4 text-center">

        <small class="lg:w-4/12 w-11/12 mb-1"><i class="fas fa-copyright fa-1x order-2 md:order-1"></i>Copyright 2021~2022 . All rights reserved.</small>

        
        <a href="/" class="text-2xl font-mono my-2 w-11/12 lg:w-4/12 ">Ling's Blog</a>


        <div class="row justify-center items-center gap-3 lg:w-4/12 w-11/12 footer-icon md:order-2 order-1">
            <a href="/"  class="p-2 rounded-full bg-gray-700 hover:bg-gray-600 transition duration-200 shadow-inner w-9 flex justify-center items-center h-9 "><i class="fab fa-facebook-f text-xl cursor-pointer text-pink-600 "></i></a>
            <a href="/" class="p-2 rounded-full bg-gray-700 hover:bg-gray-600 transition duration-200 shadow-inner w-9 flex justify-center items-center h-9 "><i class="fab fa-instagram  text-xl cursor-pointer text-pink-600"></i></a>
            <a href="/" class="p-2 rounded-full bg-gray-700 hover:bg-gray-600 transition duration-200 shadow-inner w-9 flex justify-center items-center h-9 "><i class="fab fa-youtube  text-xl cursor-pointer text-pink-600"></i></a>
        </div>

    </footer>
</body>
</html>
