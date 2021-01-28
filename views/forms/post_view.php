<?php 
    include "../../controllers/conn.php";
    $title = "";
    function hero_content() {};
    function get_content(){
        global $conn;
        $sql = "SELECT * FROM `posts` WHERE `posts`.`pid` = ? ";
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql)){
            echo "Something Wrong";
            die();
        }
        $stmt->bind_param("i",$_GET["id"]);
        $stmt->execute();
        $post = $stmt->get_result()->fetch_assoc();
        if(!$post){
            echo "Posts Missing!";
            die();
        }

        $file_post = json_decode(file_get_contents("../../".$post["file_local"]));

        $sql2 = "SELECT * FROM `comment` WHERE `comment`.`pid` = ? ";
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql2)){
            echo "Something Wrong";
            die();
        }
        $stmt->bind_param("i",$post["pid"]);
        $stmt->execute();
        $comments = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $GLOBALS["image"] = $post["image"];
        
?>

    <section>
        <div class="container pt-10 px-40 ">
            <div class="row gap-y-5 break-all w-full mb-5 ">
                <h1 class="text-5xl border-b-2 border-gray-800 pb-5 w-full px-4 "><?php echo $post["title"] ?></h1>
                <p class="text-base mx-10 min-h-1/2"><?php echo $file_post->description ?></p>
            </div>
            
        </div>
        <div class="container-fluid px-40 bg-gray-600 ">
            <div class=" px-4 row justify-between items-center py-10">
                <!-- <img src="<?php  ?>" alt=""> -->
                <p>Author : <?php echo $file_post->author ?></p>
                <p>Post time : <?php echo $post["upload_time"] ?></p>
            </div>
        </div>
        <div class="container px-40 py-14">
            <form action="/methods.php" method="POST">
                <input type="hidden" name="action" value="comment">
                <input type="hidden" name="pid" value="<?php echo $post["pid"] ?>">
                <label for="cmm" class="font-bold text-lg">Comment :</label>
                <div class="px-5 pt-4">
                    <textarea name="content" id="cmm"  class="w-full h-56 rounded-xl shadow border-2 outline-none focus:border-red-500 focus:shadow-inner text-black p-3"></textarea>
                </div>
                <input type="submit" value="Comment" class="btn py-3 mt-3 px-6 bg-pinker active:bg-pinker outline-none rounded-full block ml-auto mr-6">
            </form>



            <div class="mt-7 px-4 border-t-2 border-gray-800 py-7 ">
                <?php 
                    $index = 1 ;
                foreach($comments as $comment){ ?>
                    <div class="w-full row bg-gray-600 py-7 px-4 hover:bg-gray-500 shadow-xl my-3 justify-between items-center">
                        <div class="w-1/12 border-gray-500 flex justify-center items-center ">
                            <p># <?php echo $index++ ?></p>
                        </div>
                        <div class="w-9/12 ">
                            <p class="text-gray-400 border-b-2 border-gray-400 max-w-max">User: <?php echo $comment["username"] ?></p>
                            <p class="pt-7 pl-4"><?php echo $comment["content"] ?></p>
                        </div>
                        <div class="w-2/12 flex flex-wrap gap-x-2">
                            <div class="w-full">
                                <p class="text-xs text-gray-400">Posted: <?php echo $comment["upload_time"] ?></p>
                            </div>
                            <div class="w-full">
                                <!-- <p class="text-xs text-gray-400">Like: </p> -->
                            </div>
                            <a href="javascript:;" class="reply_btn text-sm text-blue-500 hover:text-blue-600">Reply
                                <input type="hidden" name="comment_id" value="<?php echo $comment["comment_id"] ?>">
                                <input type="hidden" name="reply_user" value="<?php echo $comment["username"] ?>">
                                <input type="hidden" name="pid" value="<?php echo $post["pid"] ?>">
                                </a>
                            <!-- <a href="#" class="text-sm text-blue-500 hover:text-blue-600">Like</a> -->
                        </div>

                        <!-- reply -->
                        <?php 
                            $reply_sql = "SELECT * FROM `reply` WHERE `reply`.`pid` = ? and `comment_id` = ? ";
                            $stmt = $conn->stmt_init();
                            if(!$stmt->prepare($reply_sql)){
                                echo "Something Wrong";
                                die();
                            }
                            $stmt->bind_param("ii",$post["pid"],$comment["comment_id"]);
                            $stmt->execute();
                            $replys = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                            foreach($replys as $reply){
                        ?>
                            <div class="w-full row bg-gray-600 py-7 px-4 shadow-2xl  my-3 justify-between items-center mx-10">
                                <div class="w-9/12 ">
                                    <p class="text-gray-400 border-b-2 border-gray-400 max-w-max">User: <?php echo $reply["username"] ?>     <span class="text-pink-500"><br>Reply</span>    <?php echo $reply["reply_username"] ?></p>
                                    <p class="pt-7 pl-4"><?php echo $reply["content"] ?></p>
                                </div>
                                <div class="w-2/12 flex  flex-wrap">
                                    <div class="w-full">
                                        <p class="text-xs text-gray-400">Posted: <?php echo $reply["posted_time"] ?></p>
                                    </div>
                                    <a href="javascript:;" class="reply_btn text-sm text-blue-500 hover:text-blue-600">Reply
                                    <input type="hidden" name="comment_id" value="<?php echo $reply["comment_id"] ?>">
                                    <input type="hidden" name="reply_user" value="<?php echo $reply["username"] ?>">
                                    <input type="hidden" name="pid" value="<?php echo $post["pid"] ?>">
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="reply-box ">
                            
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <script src="/assets/js/reply.js" defer></script>
<?php 
    }
    include "../partials/layout.php";
?>