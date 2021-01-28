<?php 
    include_once "conn.php";
    include_once "other.inc.php";

    class Posts{

        public static function add($data){
            global $conn;
            $title = htmlentities($data["title"]);
            $desc = htmlentities($data["description"]);
            // $json_local = "data/posts/".$title.".json";
            $file_path = File::create($title,"json");
            $image = $data["image_path"];

            $post = new stdClass();
            $post->title = $title;
            $post->description = $desc;
            $post->author = $_SESSION["user_details"]["name"];

            if(strlen($title) <= 4){
                return "title must more then 4 words!";
                die();
            }
            // if(strlen($desc) <= 10){
            //     return "title must more then 4 words!";
            //     die();
            // }

            file_put_contents($file_path,json_encode($post,JSON_PRETTY_PRINT));

            $sql = "INSERT INTO `posts` (`title`,`file_local`,`author_id`,`image`) VALUES(?,?,?,?)";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "some thing got the error 0x123456";
                die();
            }
            $stmt->bind_param("ssss",$title,$file_path,$_SESSION["user_details"]["uid"],$image);
            $stmt->execute();
        }

        public static function get_all(){
            global $conn;
            $sql = "SELECT * FROM `posts`";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "some thing got the error 0x123456";
                die();
            }
            $stmt->execute();
            $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $data;
        }

        public static function get_all_active(){
            global $conn;
            $sql = "SELECT * FROM `posts` WHERE `isActive` = 1 ";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "some thing got the error 0x123456";
                die();
            }
            $stmt->execute();
            $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $data;
        }

        public static function get_one($pid){
            global $conn;
            $sql = "SELECT * FROM `posts` WHERE `pid` = ? ";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "some thing got the error 0x123456";
                die();
            }
            $stmt->bind_param("i",$pid);
            $stmt->execute();
            $data = $stmt->get_result()->fetch_assoc();
            return $data;
        }

        public static function delete($pid){
            global $conn;
            $data = Posts::get_one($pid);
            $sql = "DELETE FROM `posts` WHERE `posts`.`pid` = ?";
            $stmt= $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "Something erro 0x00000a";
                die();
            }
            unlink($data["file_local"]);
            $stmt->bind_param("i",$pid);
            $stmt->execute();
        }
        public static function edit($data){
            global $conn;
            $pid = htmlentities($data["pid"]);
            $title = htmlentities($data["title"]);
            $desc = htmlentities($data["description"]);
            $image = htmlentities($data["image_path"]);

            $value = Posts::get_one($pid);
            $old_data = json_decode(file_get_contents($value["file_local"]));

            $old_data->title =$title;
            $old_data->description = $desc;

            file_put_contents($value["file_local"],json_encode($old_data,JSON_PRETTY_PRINT));

            $sql = "UPDATE `posts`SET `image` = ? WHERE `posts`.`pid` = ?";
            $stmt =$conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "Image upload fail";
                die();
            }
            $stmt->bind_param("si",$image,$pid);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
    }

    class Comment{
        public static function add($data){
            global $conn;
            $name = "USER".mt_rand(10000,99999);
            if(isset($_SESSION["user_details"])){
                $name = $_SESSION["user_details"]["name"];
            }
            $content = htmlentities($data["content"]);
            $pid = htmlentities($data["pid"]);
            
            if(strlen($content) <= 4){
                return "Content must more then 4 words!";
                die();
            }

            $sql = "INSERT INTO `comment` (`username`,`content`,`pid`) VALUES (?,?,?)";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "Something Error!";
                die();
            }
            $stmt->bind_param("ssi",$name,$content,$pid);
            $stmt->execute();
        }

        public static function reply($data){
            global $conn;
            $name = "USER".mt_rand(10000,99999);
            if(isset($_SESSION["user_details"])){
                $name = $_SESSION["user_details"]["name"];
            }
            $content = htmlentities($data["content"]);
            $pid = htmlentities($data["pid"]);
            $comment_id = htmlentities($data["comment_id"]);
            $reply_name = htmlentities($data["reply_user"]);
            
            if(strlen($content) <= 4){
                return "Content must more then 4 words!";
                die();
            }

            $sql = "INSERT INTO `reply` (`comment_id`,`pid`,`username`,`content`,`reply_username`) VALUES (?,?,?,?,?)";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "Something Error!";
                die();
            }
            $stmt->bind_param("iisss",$comment_id,$pid,$name,$content,$reply_name);
            $stmt->execute();
        }
    }