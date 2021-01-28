<?php 
session_start();
    if(isset($_SESSION["user_details"])){?><?php 
    include_once "../../../controllers/conn.php";
    $sql = "SELECT * FROM `posts`";
    $stmt = $conn->stmt_init();
    if(!$stmt->prepare($sql)){
        echo "Some thing missing";
        die();
    }
    $stmt->execute();
    $datas = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<section class="w-full h-full">
    <div class="container mx-auto h-full p-10">
        <h2 class="font-bold text-4xl border-b-2 border-gray-300 pb-2 pl-3">All Post</h2>
        <div class="flex justify-center items-center h-full px-4">
            <ul class="flex flex-wrap w-full gap-y-2">
                <?php foreach($datas as $data){ ?>
                <li class="w-full">
                    <div class="border-2 shadow-inner hover:shadow-lg w-full h-auto py-2 px-5 rounded-lg row justify-between items-center">
                        <div>
                            <div class="row items-center gap-x-2"><small>title :</small><p class="text-xl font-bold"><?php echo $data["title"] ?></p></div>
                            <div class="row items-center gap-x-2"><small>author :</small><p class="text-base"><?php 
                                $uid = $data["author_id"];
                                $sql2 = "SELECT `name` FROM `users` WHERE `users`.`uid` = $uid";
                                $author_name = $conn->query($sql2)->fetch_assoc();
                                echo $author_name["name"];
                            ?></p></div>
                        </div>
                        <div>
                            <div><small class="text-gray-400 text-xs font-bold">add Time : <?php echo $data["upload_time"]?></small></div>
                            <div class="flex justify-center items-center gap-x-2">
                                <a href="/views/forms/post_view.php?action=view&id=<?php echo $data["pid"] ?>" class=" text-blue-400 text-sm hover:text-blue-500">view</a>
                                <a href="javascript:;" id="edit" class="edit text-yellow-400 text-sm hover:text-yellow-500">Edit <input type="hidden" name="pid" value="<?php echo $data["pid"] ?>"></a>
                                <a href="/methods.php?action=delete&pid=<?php echo $data["pid"]?>" class="text-sm text-red-400 hover:text-red-500">Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <script defer>
        $(".edit").click((e)=>{
            let ev = e.target;
            let pid = ev.children[0].value;
            $("main").load("/views/dashboard/views/edit_posts.php",({
                "pid" : pid
            }))
        })
    </script>
</section>
<?php 
     
    }
?>