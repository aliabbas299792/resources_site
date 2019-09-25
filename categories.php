<?php
include 'db.link.php';
include 'verifUser.php';

if(isset($_GET['category_id']) && isset($_GET['subject_id'])){
    $subject_id = filter_var(mysqli_real_escape_string($link,$_GET['subject_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $categoryId = filter_var(mysqli_real_escape_string($link,$_GET['category_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: 404');
}

###################################################################################################

$sql = "SELECT name FROM subjects WHERE id='$subject_id'";
$result = mysqli_query($link,$sql);
$name = mysqli_fetch_array($result)['name'];

###################################################################################################

$sql = "SELECT * FROM categories WHERE subject_id='$subject_id' AND id='$categoryId'";
$result = mysqli_query($link,$sql);

$row = mysqli_fetch_array($result);
$categoryOriginalName = $row['name'];
$information = $row['information'];

###################################################################################################

$title = ucfirst($name).' - '.ucfirst($categoryOriginalName);
include 'head.php';
?>
<body style="color:#222;">
    <?php include 'nav.php';?>
    
    <h1 class='mainTitle' id="categoriesTitle"><?php echo ucfirst($categoryOriginalName); ?></h1>
    <div id="preText">
        <?php echo $information; ?>
    </div>
    
    <?php include 'footer.php'; ?>
</body>