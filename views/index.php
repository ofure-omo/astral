<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>
            Astral
        </title>
        
<!--        bootstrap, styling -->
    </head>
    <body>
        <div id="web-container">
            
<!--     HEADER     -->
<?php
        include_once "views/pages/header.php";
        ?> 
<!--        BODY    -->
<?php require_once('routes.php'); ?>

<!--           FOOTER    -->
 <?php
    include_once "views/pages/footer.php";
    ?>
        </div>
        
    </body>
        
</html>
 

