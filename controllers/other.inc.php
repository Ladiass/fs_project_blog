<?php 
    // function get from https://stackoverflow.com/questions/4356289/php-random-string-generator
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    include "vendor/autoload.php";
    class Email{
        public static function send_email($email,$name,$username,$password){
            $body = "
                Thank For Register to our Website 
                Here is your Email and Password: 
                Email : $email 
                Username : $username
                Password : $password";
            //准备工作 setups!!
            $transport = new Swift_SmtpTransport('smtp.gmail.com',465,'ssl');
            $transport->setUsername("limxinze1@gmail.com");
            $transport->setPassword("hvgjwakophkliwzb");

            $mailer = new Swift_Mailer($transport);
            // end Setups 

            $massage = new Swift_Message("noReply");
            $massage->setFrom(["noReply@gmail.com"=>"Ai"]);
            $massage->setTo([$email=>$name]);
            $massage->setBody($body);
            
            $result = $mailer->send($massage);
            if($result){
                return 1;
            }
            return 0;
        }
    }
    class File{
        public static function get($local){
            $data = json_decode(file_get_contents($local));
            return $data;
        }

        public static function create($name,$type,$local ="data/posts/"){
            $rand_num = mt_rand(10000,99999);
            $file_patch = $local.$name.$rand_num.".".$type;
            $fh = fopen($file_patch, 'w');
            if($type == "json"){
                fwrite($fh, '{}');
            }
            fclose($fh);
            return $file_patch;
        }
        public static function delete($name,$local = "data/posts/"){
            unlink($local.$name);
        }
    }
    class Image{
        public static function add($data){
            //// Image

            $img_name = $data['image']['name'];
            
            $img_tmpname = $data["image"]["tmp_name"];
            //pathinfo() is a method that returns information about a file path
            $img_type = pathinfo($img_name,PATHINFO_EXTENSION);

            $type = array("jpg","svg","jpeg","png","gif","jfif");
            if(!in_array($img_type,$type)){
                echo 0;
                die();
            }
            
            /////////$_SERVER["DOCUMENT_ROOT"];
            move_uploaded_file($img_tmpname,$_SERVER["DOCUMENT_ROOT"]."../assets/img/".$img_name);
            $path_image = "/assets/img/".$img_name;
            return $path_image;
        }
    }