<?php
include 'db.link.php';
include 'verifUser.php';
$title = 'Success';
include 'head.php';
?>
<body>
    <?php include 'nav.php'; ?>
    
    <section class="sectionError">
        <h1 class="mainHeader" style="color:#fff;background-color:#70C48F;">Action Successful</h1>
    </section>
    <script>
        setTimeout(
            function(){
                window.location.href = '/home';
            },1000);
    </script>
    <?php include 'footer.php'; ?>
</body>