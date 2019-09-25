<?php
include 'db.link.php';
include 'verifUser.php';

if(isset($_GET['subject_id'])){
    $subject_id = filter_var(mysqli_real_escape_string($link,$_GET['subject_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    exit();
}

$sql = "DELETE FROM subjects WHERE id='$subject_id'";

if(mysqli_query($link,$sql)){
    mysqli_query($link,$sql);
    echo "element_deleted";
}

?>

<script>
    window.onload = function(){
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/')+1);
        
        if(window.location.href.indexOf(filename) !== -1){
            window.location = '/404';
        }
    }
</script>