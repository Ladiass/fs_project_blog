<?php 
    session_start();
    if(isset($_SESSION["user_details"])){?>
<section class="w-full h-full">
    <div class="container mx-auto h-full p-10">
        <h2 class="font-bold text-4xl border-b-2 border-gray-300 pb-2 pl-3">Register</h2>
        <div class="flex justify-center items-center h-full px-4">
            <form action="/methods.php" method="POST" class="p-3 gap-y-2 ">

                <input type="hidden" name="action" value="register">

                    <div class=" w-full mb-3">
                        <label for="image" id="img_show" class="mx-auto w-40 h-40 block rounded-full shadow-xl bg-gray-200 cursor-pointer"><div class="w-full h-full flex justify-center items-center text-6xl">+</div></label>
                        <input type="file" name="image" class="hidden" id="image">
                        <input type="hidden" name="image_path"  value="">
                    </div>

                    <label for="name" class="w-full px-3">Name</label>
                    <div class=" w-full">
                        <input type="text" id="name" name="name" class="text-xl px-3 py-2 rounded-full outline-none  border-2 shadow-inner focus:shadow-xl mb-4 mt-2">
                    </div>

                    <label for="username" class="w-full px-3">Username</label>
                    <div class="w-full">
                        <input type="text" name="username" id="username" class="text-xl px-3 py-2 rounded-full outline-none  border-2 shadow-inner focus:shadow-xl mb-4 mt-2">
                    </div>
                    
                    <label for="email" class="w-full px-3">Email</label>
                    <div class="w-full">
                        <input type="email" name="email" id="email" class="text-xl px-3 py-2 rounded-full outline-none  border-2 shadow-inner focus:shadow-xl mb-4 mt-2">
                    </div>

                <input type="submit" class="btn bg-green-400 shadow-inner  outline-none font-medium rounded-full py-2 px-6 active:bg-green-600 active:shadow block mx-auto my-4 cursor-pointer hover:bg-green-500" value="Register">
            </form>
        </div>
    </div>
</section>

<script defer>

    $("#image").change((e)=>{
        let img = new FormData();
        let files = $("#image")[0].files[0];
        img.append('image',files);
        img.append('action',"image");

        $.ajax({
            url: '/methods.php',
            type: 'post',
            data: img,
            contentType: false,
            processData:false,
            success:function(resp){
              
                if(resp != 0){
                    $("#img_show").html(' ');
                    $("#img_show").css({
                        background: `linear-gradient(to top , rgba(0,0,0,.5),rgba(0,0,0,.1)),url("${resp}")`,
                        "background-position" : "center",
                        "background-size":"cover"
                    })
                    $("#img_path").attr('src',resp);
                    $("[name='image_path']").attr("value",resp);
                }else{
                    alert("Please upload the Img filess");
                }
            }
        })
    })
</script>
<?php
    }
?>