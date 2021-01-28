<?php session_start() ;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ling's Blog | <?php echo $title ?></title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    
    <!-- Jquery 3.5.1 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Font Awesome JavaScript -->
    <script src="https://kit.fontawesome.com/511217841c.js" crossorigin="anonymous"></script>

    <!-- Montserrat font -->
    <link rel="preconnect" href = "https: //fonts.gstatic.com" >
    <link href = "https: //fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;700&display=swap" rel = "stylesheet " > 
    <link rel="stylesheet" href="/assets/css/style.css">
    
</head>
<body class="bg-gray-700">
    <?php include "nav.php" ?>
    <header class="hero font-bold row justify-center items-center">
        <div class="hero-text text-center ">
            <?php hero_content() ?>
        </div>
    </header>
    <main>
        <?php get_content() ?>
    </main>
    <?php include "footer.php";?>

    <style>
        header{
            background: linear-gradient(to top , rgba(0,0,0,.5),rgba(0,0,0,.1)),url("<?php (isset($image)&&strlen($image)>= 3) ? print($image) : print("/assets/img/Hero/Hero Image-".mt_rand(1,4).".png"); ?>");
            height: 55vh;
            background-position: center;
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
    </style>
</body>
</html>
