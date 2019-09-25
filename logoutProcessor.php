<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

session_unset();
session_destroy();
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