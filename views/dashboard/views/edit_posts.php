<?php 
session_start();

    if(isset($_SESSION["user_details"])){?>
<?php 
    include_once "../../../controllers/conn.php";
    $id = htmlentities($_POST["pid"]);
    $sql = "SELECT * FROM posts WHERE `posts`.`pid`= ?";
    $stmt = $conn->stmt_init();
    if(!$stmt->prepare($sql)){
        echo "Something got wrong 0x00321444b";
        die();
    }
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $file_data = json_decode(file_get_contents("../../../".$data["file_local"]));
?>
<?php if(strlen($data["image"])>= 3){?>

    <style>
        #img_show{
                background:linear-gradient(to top , rgba(0,0,0,.5),rgba(0,0,0,.1)),url("<?php print($data["image"]) ?>");
            background-position:center;
            background-size:cover;
        }
    </style>
<?php }?>


<section class="w-full h-full">
    <div class="container mx-auto h-full p-10">
        <h2 class="font-bold text-4xl border-b-2 border-gray-300 pb-2 pl-3">Edit Post</h2>
        <div class="flex justify-center items-center h-full px-4">
            <form action="/methods.php" method="POST" class=" w-full p-3  gap-y-2">

                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="pid" value="<?php echo $data["pid"] ?>">
                <div class="w-full post_inf ">
                    <label for="title" class="px-3">Title</label>
                    <input type="text" name="title" class="w-full text-xl px-3 py-2 rounded-full outline-none focus:border-black border-2 shadow-inner focus:shadow-xl mb-4 mt-2" id="title" value="<?php echo $data["title"] ?>">

                    <label for="desc" class="px-3">Description</label>
                    <textarea name="description" id="desc" class="w-full text-xl px-3 py-2 break-words md:h-80  rounded-xl outline-none focus:border-black border-2 mt-2 shadow-inner focus:shadow-xl"><?php echo $file_data->description ?></textarea>
                    
                    <div class="row justify-center items-center mx-auto gap-x-2">
                        <a href="/views/dashboard/" class="btn bg-yellow-400 shadow-inner  outline-none font-medium rounded-full py-2 px-6 active:bg-yellow-600 active:shadow my-4">Cancel</a>
                        <input type="button" id="nxpv" class="nxpv btn bg-green-400 shadow-inner  outline-none font-medium rounded-full py-2 px-6 active:bg-green-600 active:shadow my-4" value="Next">
                    </div>
                </div>


                <div class="w-full post_inf hidden px-40">
                    <div>
                        <input type="file" name="image" id="image" class="hidden">
                        <input type="hidden" name="image_path" value="<?php echo $data["image"] ?>">
                        
                        <label for="image" id="img_show" class=" flex justify-center items-center w-full h-80 border-2 border-gray-400 rounded-lg cursor-pointer hover:bg-gray-200 shadow-inner hover:shadow-xl transition duration-150 overflow-hidden relative"
                        > 
                        <?php if(strlen($data["image"]) <= 3){?>
                            <span class="text-5xl "><i class="fas fa-plus text-gray-300"></i></span>
                        <?php }?>
                    </label>
                        <div class="border-2 rounded-md border-gray-300 h-full row w-full mt-2 ">
                            <div class="w-full border-b-2 py-2 border-gray-500 animate-pulse">
                                <div class=" w-40 bg-gray-400 rounded-full h-4"></div>
                            </div>
                            <div class="flex space-x-2  w-full py-2 px-3 animate-pulse">
                                <div class="w-4/12 bg-gray-400 rounded-full h-4"></div>
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                            </div>
                            <div class="flex space-x-2  w-full py-2 px-3 animate-pulse">
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                                <div class="w-4/12 bg-gray-400 rounded-full h-4"></div>
                            </div>
                            <div class="flex space-x-2  w-full py-2 px-3 animate-pulse">
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                                <div class="w-4/12 bg-gray-400 rounded-full h-4"></div>
                            </div>
                            <div class="flex space-x-2  w-full py-2 px-3 animate-pulse">
                                <div class="w-4/12 bg-gray-400 rounded-full h-4"></div>
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                            </div>
                            <div class="flex space-x-2  w-full py-2 px-3 animate-pulse">
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                                <div class="w-8/12 bg-gray-400 rounded-full h-4"></div>
                            </div>
                        </div>
                        <div class="flex w-full justify-center items-center gap-4">
                            <a href="/views/dashboard/" class="btn bg-yellow-400 shadow-inner  outline-none font-medium rounded-full py-2 px-6 active:bg-yellow-600 active:shadow my-4">Cancel</a>
                            <input type="button" id="nxpv" class="nxpv btn bg-blue-400 shadow-inner  outline-none font-medium rounded-full py-2 px-10 active:bg-blue-600 active:shadow block  my-4 cursor-pointer" value="Prev">
                            <input type="submit"  class="btn bg-green-400 shadow-inner  outline-none font-medium rounded-full py-2 px-10 active:bg-green-600 active:shadow block  my-4 cursor-pointer" value="Post">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script defer>
    let next = $(".nxpv");
    let boxs = $(".post_inf");
    next.click(()=>{
        boxs.toggle();
    })

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
                console.log(resp);
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