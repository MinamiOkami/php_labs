<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Курсовая</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php include("template/header.php") ?>
    
    <main>
        <?php
        $link = mysqli_connect("std-mysql", "std_1728_sorter", "justify-items", "std_1728_sorter");
        mysqli_query($link, "SET NAMES 'utf8'"); ?>
        <?php 
        if((!isset($_GET["page"])) || (($_GET["page"])=="main")){
            include("template/main.php");
        } elseif((($_GET["page"])=="read")){
            include("template/read.php");
        }
        elseif((($_GET["page"])=="create")){
            include("template/create.php");
        }
         ?>
    </main>
    <?php include("template/footer.php") ?>
</body>

</html>