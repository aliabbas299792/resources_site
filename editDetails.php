<?php
session_start();
include 'db.link.php';

if(isset($_SESSION['user']['username']) && isset($_GET['password']) && isset($_GET['emailOriginal'])){
    $username = filter_var(mysqli_real_escape_string($link,$_SESSION['user']['username']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $password = filter_var(mysqli_real_escape_string($link,$_GET['password']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);        /* Sanitize whatever is being inputed */
    $emailOriginal = filter_var(mysqli_real_escape_string($link,$_GET['emailOriginal']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    echo 'false1';
}

if(isset($_GET['emailNew']) && $_GET['emailNew'] != ''){
    $emailNew = filter_var(mysqli_real_escape_string($link,$_GET['emailNew']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    $emailNew = $emailOriginal;
}

if(isset($_GET['passwordNew']) && isset($_GET['passwordNewAgain'])){
    $passwordNew = filter_var(mysqli_real_escape_string($link,$_GET['passwordNew']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);        /* Sanitize whatever is being inputed */
    $passwordNewAgain = filter_var(mysqli_real_escape_string($link,$_GET['passwordNewAgain']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    
    $newPassesIdentical = ($passwordNewAgain == $passwordNew ? true : false);  //True comes first, then false
}
/**/############################################################/**/
/**/ $sql = "SELECT * FROM users WHERE username='$username'";   /**/
/**/ $result = mysqli_query($link,$sql);                        /**/
/**/                                                            /**/
/**/ $row = mysqli_fetch_array($result);                        /**/
/**/                                                            /**/
/**/ $real_username = $row['username'];                         /**/
/**/ $real_password = $row['password'];                         /**/
/**/ $real_email = $row['email'];                               /**/
/**/############################################################/**/
/**/
/**/$encrypt_password = $encrypt_password;
/**/$method = 'AES-128-ECB';
/**/$options = OPENSSL_RAW_DATA;
/**/$iv = '';
/**/
/**/$real_password_decrypted = openssl_decrypt($real_password,$method,$encrypt_password,$options,$iv);
/**/$new_password_encrypted = openssl_encrypt($passwordNew,$method,$encrypt_password,$options,$iv);

if($real_password_decrypted != $password || $real_username != $username || $username == '' || $password == '' || $real_email != $emailOriginal){
    echo 'false2';
   echo <<<POT
  <table border=1>
    <tr>
        <td style='font-weight:bold;'>My Input: </td>
        <td style='font-weight:bold;'>Database: </td>
    </tr>
    <tr>
        <td>{$username}</td>
        <td>{$real_username}</td>
    <tr>
    <tr>
        <td>{$password}</td>
        <td>{$real_password_decrypted}</td>
    <tr>
    <tr>
        <td>{$emailOriginal}</td>
        <td>{$real_email}</td>
    <tr>
  <table>    
POT;
}else if(isset($newPassesIdentical) || isset($emailNew)){
    $sql = "UPDATE users SET email='$emailNew', password=\"$new_password_encrypted\" WHERE username='$username'";#echo $sql;
    mysqli_query($link,$sql);
    echo 'true';
}else{
    echo 'true';
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