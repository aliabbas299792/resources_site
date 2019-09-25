<?php
$require = true;
$requiredType = ['admin','mod','owner'];
include 'db.link.php';
include 'verifUser.php';
$title = 'Managment';
include 'head.php';

if(isset($_GET['error'])){
    $errorJS = "
        <script>
            responseText.setAttribute('class','failureResponse');
            responseText.innerHTML = 'An error occurred';
            setTimeout(deleteNotification,2000);
        </script>";
}

$subjectsName_idArray;

if(!isset($_GET['subject'])){
    $sql = "SELECT * FROM subjects";
    $result = mysqli_query($link,$sql);
    
    while($row = mysqli_fetch_array($result)){
        $subject_id = $row['id'];
        $name = $row['name'];
        $imgSrc = $row['imgSrc'];
        
        $sql2 = "SELECT id FROM categories WHERE subject_id='$subject_id'";
        $result2 = mysqli_query($link,$sql2);
        $numberOfCategories = mysqli_num_rows($result2);
        
        $nameURL = strtolower(str_replace(' ','_',$name)); #Replace spaces with a dash, and converts all to lowercase
        
        $subjectIcon .= "
        <div class='col-2-12 col-3-12-med col-4-12-small col-6-12-xsmall' data-subject_id='$subject_id'>
            <a href='/management_panel/$nameURL/$subject_id/'>
                <img src='$imgSrc'>
                <span class='subjectName'>".ucfirst($name)."</span>
                <span class='numberOfCategories'>Categories: ".$numberOfCategories."</span>
            </a>
            <span style='display:block;text-align:center;' class='categoryLinks_table_delete'><i data-element='i' style='color:#222;' class='ion-close'>Delete </i></span>
        </div>
        ";
    }
}else{
    $subject = filter_var(mysqli_real_escape_string($link,$_GET['subject_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    
    $sql = "SELECT imgSrc, name FROM subjects WHERE id='$subject'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);
    $imgSrc = $row['imgSrc'];
    $subject_name = $row['name'];
    
    $addedCategoryGroups = array();
    
    $sql = "SELECT * FROM categories WHERE subject_id='$subject' ORDER BY categoryGroup";
    $result = mysqli_query($link,$sql);
    
    while($row = mysqli_fetch_array($result)){
        if($row['categoryGroup'] != '' && !in_array($row['categoryGroup'],$addedCategoryGroups)){
            $sql = "SELECT name FROM categoryGroup WHERE subject_id='$subject' AND id='".$row['categoryGroup']."'";
            $name = ucwords(mysqli_fetch_array(mysqli_query($link,$sql))['name']);
            $categories .= "
                    <tr class='categoryLinks'>
                        <td colspan='3' class='categoryGroup'>$name</td>
                    </tr>
            ";
            
            array_push($addedCategoryGroups,$row['categoryGroup']);
        }
        
        $name = $row['name'];
        $subject_id = $row['subject_id'];
        $id = $row['id'];
        
        $subject_name = strtolower(str_replace(' ','_',$subject_name)); #Replace spaces with a dash, and converts all to lowercase
        $nameURL = strtolower(str_replace(' ','_',$name)); #Replace spaces with a dash, and converts all to lowercase
        $categories .= "<tr class='categoryLinks' data-category_id='$id'>
                            <td><a href='/management_panel/$subject_name/$subject_id/$nameURL/$id'>$name</a></td>
                            <td class='categoryLinks_table_delete'><i data-element='i' class='ion-close'></i></td>
                        </tr>";
    }
}
?>
<body>
    <?php 
        include 'nav.php'; 
        include 'navAdmin.php';
    ?>
    <div id="areYouSure">
        <input type="button" value='Yes' id="areYouSure_yes">
        <input type="button" value='No' id="areYouSure_no">
    </div>
    <section>
        <?php 
            if($subjectIcon != ''){
                echo $subjectIcon;
            }
            if($subject != ''){
                $subjectDisplay = ucfirst($subject_name);
                
                echo <<<EOT
                <div class='mainTitle'>
                    <form action="/editSubject.php" method="post" enctype="multipart/form-data">
                        Title: <input type='text' value='{$subject_name}' name='subject_name'><br>
                        Icon: <br> <img src='{$imgSrc}'><br>
                        <input type='file' name='icon'><br>
                        <input type='hidden' name='subject_id' value='{$subject}'>
                        <input type='submit' value='Save Changes'>
                    </form>
                </div>
EOT;
                
                
                echo "
                <table id='displayEditCategories'>
                    $categories
                </table>
                ";
            }
        ?>
    </section>
    
    <?php include 'footer.php'; echo $errorJS; ?>
    <script src="/js/management_panel.js"></script>
</body>