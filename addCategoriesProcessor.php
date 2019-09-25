<?php
$require = true;
include "db.link.php";
include 'verifUser.php';

if(isset($_POST['categoryTitle']) && isset($_POST['categoryContent']) && isset($_POST['subject_id'])){
    $categoryName = filter_var(mysqli_real_escape_string($link,$_POST['categoryTitle']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $categoryContent = filter_var(mysqli_real_escape_string($link,$_POST['categoryContent']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $subject_id = filter_var(mysqli_real_escape_string($link,$_POST['subject_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: addCategories');
}

/*************************************/
$sql = "SELECT * FROM categories WHERE name='$categoryName' AND subject_id='$subject_id'";
$noRows = mysqli_num_rows(mysqli_query($link, $sql));
if($noRows < 1){
    $sql = "REPLACE INTO categories (name, information, subject_id) VALUES ('$categoryName', '$categoryContent', '$subject_id')";
    if(mysqli_query($link,$sql)){
        header('Location: actionSuccessful');
    }else{
        header('Location: actionUnsuccessful');
    }
}else{
    header('Location: actionUnsuccessful?duplicate');
}
?>