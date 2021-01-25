<?php 
    $title = "Home";
    function hero_content(){?>

        <p>Welcome to</p>
        <p class="sm:text-7xl mb-6 text-5xl">Ling's Blog</p>
        <a href="/" class=" btn bg-pinker hover:bg-pinker inline md:hidden active:bg-pinker py-2.5 rounded-lg">
        Contact me</a>
<?php 
    }

    function get_content(){
?>
    <script src="/assets/js/main.js" defer></script>
    <style>
        header{
            height: 85vh;
            background-position: bottom center;
        }
        
        i:hover{
            transition: all;
            transition-duration: 250ms;
        }
    </style>

    <div class=" container w-full mx-auto lg:px-20 px-4 pt-5 flex justify-end item-center ">
        <div class="float-right shadow-xl rounded-full py-1 px-3 flex gap-2">
            <i class="fas fa-square text-xl text-gray-400 order-1 hover:text-gray-500 cursor-pointer    " id="single"></i>
            <i class="fas fa-th-large text-xl text-gray-400 order-2 hover:text-gray-500 cursor-pointer  " id="multi"></i>
        </div>
    </div>

    <section>
        <div class="container py-5 lg:px-20 ">
            <div class="row lg:px-20 md:px-10 justify-between ">

            <div class="block lg:w-8/12 w-full mx-auto duration-300 rounded-lg card-main mb-4">
                <div class="mx-4 card shadow-xl">
                    <label for=""><img src="/assets/img/Hero/Hero Image-2.png" class="card-img-top object-fill object-center cursor-pointer""></label>
                    <div class="card-body text-black lg:text-justify text-center">
                        <h5 class="card-title text-black font-bold text-2xl">Card title</h5>
                        <p class="card-text text-black mb-6 clamp-3">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim, ullam sequi velit eveniet ad consequatur voluptate sed veritatis quis sit repudiandae quos quae asperiores nesciunt cumque placeat ratione quod dicta?</p>
                        <a href="#" id="" class="btn bg-blue-600 hover:bg-blue-500 py-2 px-8 rounded-full"><small>Read More</small></a>
                    </div>
                    <div class="card-footer flex justify-evenly">
                        <small class="text-gray-500 font-bold truncate">Author:</small>
                        <small class="text-gray-500 font-bold truncate">Reviews:</small>
                    </div>
                </div>
            </div>
                

            </div>
        </div>
    </section>
    
<?php
    }
    include "views/partials/layout.php";
?>