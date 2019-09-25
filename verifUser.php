<?php
session_start();

if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['password']) && isset($_SESSION['user']['type'])){
    $username = filter_var(mysqli_real_escape_string($link,$_SESSION['user']['username']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $password = filter_var(mysqli_real_escape_string($link,$_SESSION['user']['password']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);        /* Sanitize whatever is being inputed */
    $type = filter_var(mysqli_real_escape_string($link,$_SESSION['user']['type']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}elseif($require == true && !isset($_SESSION['user']['username']) && !isset($_SESSION['user']['password']) && !isset($_SESSION['user']['type'])){                       /// Asks if there is a requirment to be logged in (in admin areas for example)
    header('Location: pleaseLogIn');
}
/**/############################################################/**/
/**/ $sql = "SELECT * FROM users WHERE username='$username'";   /**/
/**/ $result = mysqli_query($link,$sql);                        /**/
/**/                                                            /**/
/**/ $row = mysqli_fetch_array($result);                        /**/
/**/                                                            /**/
/**/ $real_username = $row['username'];                         /**/
/**/ $real_password = $row['password'];                         /**/
/**/ $real_type = $row['type'];                                 /**/
/**/ $email = $row['email'];                                    /**/
/**/############################################################/**/
/**/
/**/$encrypt_password = $encrypt_password;
/**/$method = 'AES-128-ECB';
/**/$options = OPENSSL_RAW_DATA;
/**/$iv = '';
/**/
/**/$real_password_decrypted = openssl_decrypt($real_password,$method,$encrypt_password,$options,$iv);

if($real_password_decrypted != $password || $real_username != $username || $username == '' || $password == '' || $real_type != $type){
    if($require == true){
        header('Location: pleaseLogIn');       // if being logged in as an admin
        #echo "$username -- $real_username <br> $password -- $real_password_decrypted <br> $type -- $real_type"; // checking
    }
}else{
    if(isset($requiredType)){
        if(in_array($type, $requiredType)){
            $loggedIn = true;
        }else{
            header('Location: nhep');      // if the required Type is not met redirect to not required, redirrect to privelidges page
        }
    }else{
        $loggedIn = true;    
        #echo "<h1 style='color:#000;'>LOGGED IN</h1>"; // verifying it works
    }
}
?>