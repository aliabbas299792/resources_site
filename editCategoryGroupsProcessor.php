<?php
$require = true;
include "db.link.php";
include 'verifUser.php';

if(isset($_POST['groupName']) && isset($_POST['select_subject_options']) && isset($_POST['id'])){
    $groupName = filter_var(mysqli_real_escape_string($link,$_POST['groupName']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $select_subject_options = filter_var(mysqli_real_escape_string($link,$_POST['select_subject_options']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $id = filter_var(mysqli_real_escape_string($link,$_POST['id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: /category/view');
}

/*************************************/
$sql = "UPDATE categoryGroup SET name='$groupName', subject_id='$select_subject_options' WHERE id='$id'";

if(mysqli_query($link,$sql)){
    mysqli_query($link,$sql);
    header('Location: actionSuccessful');
}else{
    header('Location: actionUnsuccessful');
}
?>