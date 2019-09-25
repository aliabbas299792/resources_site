<?php
include "db.link.php";
include 'verifUser.php';
$title = "Resources";
include "head.php";
?>

<body>
    <?
    include "nav.php";
    ?>
    <section>
        <h1 class="mainTitleFront">Resources<br><span class="mainSubheading">GCSE resources for students</span></h1>
        <div class="row">
            <?php
            
            $sql = "SELECT * FROM subjects ORDER BY priority DESC";
            $result = mysqli_query($link,$sql);
            
            while($row = mysqli_fetch_array($result)){
                $subject_id = $row['id'];
                $name = $row['name'];
                $urlName = str_replace(' ','_',$name);
                $imgSrc = $row['imgSrc'];
                
                echo "
                <a href='subjects/$urlName/$subject_id' class='col-2-12 col-3-12-med col-4-12-small col-6-12-xsmall'>
                    <img src='$imgSrc'>
                    <span class='subjectName'>".ucfirst($name)."</span>
                </a>
                ";
            }
            
            ?>
        </div>
    </section>

    <?php
    include "footer.php";
    ?>
</body>