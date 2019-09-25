<?php
include "db.link.php";
$title = "Relax";
include "head.php";
?>

<body>
    <style>
        *{
            overflow-x:hidden;
            overflow-y:hidden;
            
        }
    
        iframe{
            position:absolute;
            z-index:-20;
        }
        
        #background{
            background:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0),rgba(0,0,0,0.7)),url(images/Untitled-1.png);
            background-repeat:no-repeat;
            background-size:cover;
            width:100vw;
            height:100vh;
            position:absolute;
            z-index:100;
            background-position:center;
        }
    </style>
        <iframe width="1" height="1" src="https://www.youtube.com/embed/neV3EPgvZ3g?rel=0&autoplay=1&playlist=neV3EPgvZ3g&loop=1" frameborder="0" autoplay allowfullscreen></iframe>
        <div id="background"></div>
    <?php
    include "footer.php";
    ?>
</body>