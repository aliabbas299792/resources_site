<?php
$require = true;
include 'db.link.php';
include 'verifUser.php';

#print_r($_FILES['icon']);
#echo "<br>";

#print_r($_POST);
#echo "<br>";

if(isset($_FILES['icon']) && isset($_POST['title'])){
    $originalTitle = filter_var(mysqli_real_escape_string($link,$_POST['title']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $icon = $_FILES['icon'];
    $iconURL = '/images/'.$icon['name'];
    
    if($icon['type'] == 'image/png' || $icon['type'] == 'image/jpeg' || $icon['type'] == 'image/gif' || $icon['type'] == 'image/jpg' || $icon['type'] == 'image/svg+xml'){
        if(file_exists($iconURL)) {
            //Too bad
        }else{ 
            move_uploaded_file($icon['tmp_name'], 'images/'.$icon['name']);
        header('Location: actionSuccessful');
            echo "ok";
        }
    }else{
    }
}else{
    header('Location: actionUnsuccessful');
}

$sql = "INSERT INTO subjects (name,imgSrc) VALUES ('$originalTitle','$iconURL')";#echo $sql;
if(mysqli_query($link,$sql)){
    header('Location: actionSuccessful');
}else{
    header('Location: actionUnsuccessful');
}
?>