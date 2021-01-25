<?php 
include "conn.php";
    class User{
        public static function Login($data){
            global $conn;
            $username = $data["username"];
            $user = User::found_user_name($username);
            if(!$user){
                echo "User not found!";
                die();
            }
            if(password_verify($data["pass"],$user["password"])){
                session_start();
                $_SESSION["user_details"] = $user;
                echo "Successful Login";
            }
        }

        public static function found_user_name($username){
            global $conn;
            $sql = "SELECT * FROM `users` WHERE `name` = ?";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                echo "We got Connecting Error , please try again later!";
                die();
            }
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            return $user;
        }

        public static function Logout(){
            session_start();
            session_unset();
            session_destroy();
        }
    }