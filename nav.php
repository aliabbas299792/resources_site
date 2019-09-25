<?php
if($loggedIn == '' || $loggedIn == false){
    $buttonForLoggedInOrNot = "<span id='login'>Login</span>";
    $sideJS = 'notLoggedInNav.js';
    #$sideJsId = 'notLoggedInNavJS';
    $boxText = <<<EOT
        <div id="loginBox">
            <table>
                <tr>
                    <td colspan="2"><span class="closeLoginBox" id="closeLoginBox"><img src="/images/close.svg"></span></td>
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
    #$sideJsId = 'loggedInNavJS';
    $boxText = <<<EOT
        <div id="loggedIn">
            <table id='profileOptions'>
                <tr>
                    <td id='profileSettings' class='button_dark_invert'><img src="/images/settings.svg"> Settings</td>
                    <td id='managementLink' class='button_dark'><img src='/images/managment.svg'> Panel</td>
                    <td id='profileLogout' class='button_dark'><img src="/images/logout.svg"> Logout</td>
                </tr>
            </table>
            <table id='profileSettings_settings'>
                <tr>
                    <td>Username: </td>
                    <td class='settings_displayField'>{$username}</td>
                </tr>
                <tr>
                    <td>Original Password: </td>
                    <td class='settings_displayField'><input type="password" id="settings_password_original"></td>
                </tr>
                <tr>
                    <td>New Password: </td>
                    <td class='settings_displayField'><input type="password" id="settings_password"></td>
                </tr>
                <tr>
                    <td>Re-enter password: </td>
                    <td class='settings_displayField'><input type="password" id="settings_password_again"></td>
                </tr>
                <tr>
                    <td>Original E-mail: </td>
                    <td class='settings_displayField'><input type="email" value="{$email}" id="settings_email_original"></td>
                </tr>
                <tr>
                    <td>New E-mail: </td>
                    <td class='settings_displayField'><input type="email" id="settings_email"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan='2'><input type="submit" value="Save" id="settings_submit"></td>
                </tr>
            </table>
        </div>
EOT;
}
?>
<nav>
    <a href='/home' id="bigHome">
        <img src="/images/icon.svg" alt="Logo">
    </a>
    <span id="smallMenu">
        <i class="ion-android-menu"></i>
    </span>
    <?php echo $buttonForLoggedInOrNot; ?>
    <ul id="mobileExpand" data-type='menu_item'>
        <li><a href="/home" data-type='menu_item'>Home</a></li>
        <li><a href="/contact" data-type='menu_item'>Contact</a></li>
        <li><a href="/relax" data-type='menu_item'>Relax</a></li>
        <!--<li><a href="/entertainment" data-type='menu_item'>Entertainment</a></li>-->
    </ul>
</nav>
<div class="navPlaceholder"></div>
<?php
echo $boxText;
?>
<div id="overlay"></div>
<span id="responseText"></span>