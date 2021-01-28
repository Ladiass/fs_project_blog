<?php 
    include "conn.php";
    include "other.inc.php";
    // $random_num = generateRandomString();
    class User{
        public static function Login($data){
            global $conn;
            $username = htmlentities($data["username"]);
            $user = User::found_user($username);
            if(!$user){
                echo "User not found!";
                die();
            }
            if(password_verify($data["password"],$user["upassword"])){
                $_SESSION["user_details"] = $user;
                echo "Successful Login";
            }
        }

        public static function found_user($data){
            global $conn;
            $sql = "SELECT * FROM `users` WHERE `email` = ? or `uname` = ?";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "We got Connecting Error , please try again later!found";
                die();
            }
            $stmt->bind_param("ss",$data,$data);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            return $user;
        }

        public static function Logout(){
            session_unset();
            session_destroy();
        }

        public static function Register($data){
            global $conn;
            $username = htmlentities($data["username"]);
            $password = generateRandomString();
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            $name = htmlentities($data["name"]);
            $email = htmlentities($data["email"]);
            $image = $data["image_path"];

            if(strlen($username) <= 4 && strlen($password)<=4){
                echo "username or password too short!";
                die();
            }
            $hv_user = User::found_user($username);
            $hv_email = User::found_user($email);

            if($hv_user){
                echo "Username is already be use!";
                die();
            }elseif ($hv_email){
                echo "Email is already be use!";
                die();
            }

            $sql = "INSERT INTO `users` (`image`,`name`,`uname`,`email`,`upassword`) VALUES(?,?,?,?,?)";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "We got Connecting Error , please try again later! register";
                die();
            }
            $stmt->bind_param("sssss",$image,$name,$username,$email,$password_hash);
            Email::send_email($email,$name,$username,$password);
            $stmt->execute();
            echo "Successful Register";
        }
        
        public static function Change_Pass($data){
            global $conn;
            $hv_user = User::found_user($_SESSION["user_details"]["uname"]);
            $new_pass = $data["pass"];
            $new_pass2 = $data["pass2"];
            if(!$hv_user){
                echo "Some thing wrong";
                die();
            }
            $new_hash_pass = password_hash($new_pass2,PASSWORD_DEFAULT);
            if(!password_verify($new_pass,$hv_user["upassword"])){
                echo "old Password Wrong! Please Try again!";
                die();
            }
            $sql = "UPDATE `users` SET `upassword` = ?";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "We got Connecting Error , please try again later! register";
                die();
            }
            $stmt->bind_param("s",$new_hash_pass);
            $stmt->execute();
        }
    }