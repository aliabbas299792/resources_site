<?php
$require = true;
include 'db.link.php';
include 'verifUser.php';

if(isset($_POST['groupName']) && isset($_POST['select_subject_options'])){
    $groupName = filter_var(mysqli_real_escape_string($link,$_POST['groupName']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $select_subject_options = filter_var(mysqli_real_escape_string($link,$_POST['select_subject_options']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: addCategoryGroups');
}

$sql = "INSERT INTO categoryGroup (name, subject_id) VALUES ('$groupName',$select_subject_options)";
if(mysqli_query($link,$sql)){
    header('Location: actionSuccessful');
}else{
    header('Location: actionUnsuccessful');
}
?>