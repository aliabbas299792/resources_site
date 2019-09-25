<?php
include 'db.link.php';

if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['comments'])){
    $name = filter_var(mysqli_real_escape_string($link,$_GET['name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $email = filter_var(mysqli_real_escape_string($link,$_GET['email']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $comments = filter_var(mysqli_real_escape_string($link,$_GET['comments']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $location = filter_var(mysqli_real_escape_string($link,$_GET['location']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: actionUnsuccesful');
}

$to = "admin@resources.re";
$subject = "Resources - Contact";

$message = "
    <html>
        <head>
            <title>Resources - Contact</title>
        </head>
        <body>
        <h1>From: $name</h1>
        <h2>Email: $email</h2>
        <h3>Comments: </h3>
        $comments
        <h3>Location: </h3>
        $location
        </body>
    </html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= "From: <$email>" . "\r\n";

for($i = 0; $i < 10; $i++){
    $randomKey .= rand(0,120);
}

$message .= "<span style='display:none'>$randomKey</span>";

if(mail($to,$subject,$message,$headers)){
    header('Location: /actionSuccessful');
}else{
    header('Location /actionUnsuccesful');
}
?>