<?php
include 'db.link.php';

if(isset($_GET['loggedIn'])){
    $loggedIn = filter_var(mysqli_real_escape_string($link,$_GET['loggedIn']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}

if($loggedIn == '' || $loggedIn == false){
    $buttonForLoggedInOrNot = "<span id='login'>Login</span>";
    $sideJS = '<script src="notLoggedInNav.js"></script>';
    $boxContent = <<<EOT
        <div id="loginBox">
            <table>
                <tr>
                    <td colspan="2"><span class="closeLoginBox" id="closeLoginBox"><img src="images/close.svg"></span></td>
                </tr>
                <tr>
                    <td colspan="2" class="thead">Login</td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" placeholder="Username" id="login_username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" placeholder="Password" id="login_password"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Login" id="login_submit"></td>
                </tr>
            </table>
        </div>
EOT;
}elseif($loggedIn == true){
    $buttonForLoggedInOrNot = "<span id='profileButton'>$username</span>";
    $sideJS = 'loggedInNav.js';
    $boxContent = <<<EOT
        <div id="loggedIn">
            <table>
                <tr>
                    <td id='profileSettings'><img src="images/settings.svg"> Settings</td>
                </tr>
                <tr>
                    <td id='profileLogout'><img src="images/logout.svg"> Logout</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
EOT;
}
echo "
  <xml>
    <html>
        <![CDATA[
        $boxContent
        ]]>
    </html>
    <js>
        $sideJS
    </js>
    <button>
        $buttonForLoggedInOrNot
    </button>
  <xml>
";
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