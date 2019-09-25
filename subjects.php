<?php
include "db.link.php";
include 'verifUser.php';

if(isset($_GET['subject'])){
    $subject_id = filter_var(mysqli_real_escape_string($link,$_GET['subject']),  FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: 404');
}

$sql = "SELECT name FROM subjects WHERE id='$subject_id'";
$result = mysqli_query($link,$sql);
$subjectName = str_replace(' ','_',mysqli_fetch_array($result)['name']); #Adds in and underscore rather than a space to prevent link issues

$addedCategoryGroups = array();

$sql = "SELECT * FROM categories WHERE subject_id='$subject_id' ORDER BY categoryGroup";
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_array($result)){
    if($row['categoryGroup'] != '' && !in_array($row['categoryGroup'],$addedCategoryGroups)){
        $sql = "SELECT name FROM categoryGroup WHERE subject_id='$subject_id' AND id='".$row['categoryGroup']."'";
        $name = ucwords(mysqli_fetch_array(mysqli_query($link,$sql))['name']);
        $categories .= "
                    <li class='categoryGroupLi'>$name</li>
        ";
            
        array_push($addedCategoryGroups,$row['categoryGroup']);
    }
        
    $name = $row['name'];
    $id = $row['id'];
    
    $nameURL = strtolower(str_replace(' ','-',$name)); #Replace spaces with a dash, and converts all to lowercase
    $categories .= "<li class='categoryLinks'><a href='/subjects/$subjectName/$nameURL/$id/$subject_id/'>$name</a></li>";
}

$title = ucfirst(str_replace('_',' ',$subjectName));
include "head.php";
?>
<body>
    <?php include 'nav.php'; ?>
    <h1 class="mainHeader"><?php echo ucfirst(str_replace('_',' ',$subjectName)); ?></h1>
    <ul id="categoriesOfSubject">
        <?php echo $categories; ?>
    </ul>
    
    <?php include 'footer.php'; ?>
</body>