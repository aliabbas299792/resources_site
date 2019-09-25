<?php
include 'db.link.php';
include 'verifUser.php';

echo <<<EOT
        <div id="loggedIn">
            <table id='profileOptions'>
                <tr>
                    <td id='profileSettings' class='button_dark_invert'><img src="/images/settings.svg"> Settings</td>
                    <td id='managementLink' class='button_dark'><img src='/images/managment.svg'> Panel</td>
                    <td id="profileLogout" class="button_dark"><img src="/images/logout.svg"> Logout</td>
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