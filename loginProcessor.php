<?php
session_start();
include 'db.link.php';

if(isset($_GET['username']) && isset($_GET['password'])){
    $username = filter_var(mysqli_real_escape_string($link,$_GET['username']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $password = filter_var(mysqli_real_escape_string($link,$_GET['password']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    echo 'false';
}

/**/############################################################/**/
/**/ $sql = "SELECT * FROM users WHERE username='$username'";   /**/
/**/ $result = mysqli_query($link,$sql);                        /**/
/**/                                                            /**/
/**/ $row = mysqli_fetch_array($result);                        /**/
/**/                                                            /**/
/**/ $real_username = $row['username'];                         /**/
/**/ $real_password = $row['password'];                         /**/
/**/############################################################/**/
/**/
/**/$encrypt_password = $encrypt_password;
/**/$method = 'AES-128-ECB';
/**/$options = OPENSSL_RAW_DATA;
/**/$iv = '';
/**/
/**/$real_password_decrypted = openssl_decrypt($real_password,$method,$encrypt_password,$options,$iv);

if($real_password_decrypted == $password && $real_username == $username && $username != '' && $password != ''){
    $type = $row['type'];
    $_SESSION['user']['username'] = $username;
    $_SESSION['user']['password'] = $password;
    $_SESSION['user']['type'] = $type;
    
    if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['username']) && isset($_SESSION['user']['username'])){
        echo 'success';
    }
    #echo "<br>Real Username: $real_username <br>Real Password: $real_password_decrypted <br>Username: $username <br>Password: $password";
}else{
    echo 'failure';
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