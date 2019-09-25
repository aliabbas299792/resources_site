<?php
$require = true;
include "db.link.php";
include 'verifUser.php';

if(isset($_POST['categoryTitle']) && isset($_POST['categoryContent']) && isset($_POST['subject_id']) && isset($_POST['category_id']) && isset($_POST['categoryGroup_id'])){
    $categoryName = filter_var(mysqli_real_escape_string($link,$_POST['categoryTitle']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $categoryContent = filter_var(mysqli_real_escape_string($link,$_POST['categoryContent']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $subject_id = filter_var(mysqli_real_escape_string($link,$_POST['subject_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $category_id = filter_var(mysqli_real_escape_string($link,$_POST['category_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $categoryGroup_id = filter_var(mysqli_real_escape_string($link,$_POST['categoryGroup_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: addCategories');
}

/*************************************/
$sql = "UPDATE categories SET name='$categoryName', information='$categoryContent', subject_id='$subject_id', categoryGroup='$categoryGroup_id' WHERE id='$category_id'";

if(mysqli_query($link,$sql)){
    mysqli_query($link,$sql);
    header('Location: actionSuccessful');
}else{
    header('Location: actionUnsuccessful');
}
?>