<?php
include 'db.link.php';
include 'verifUser.php';
$title = 'Unsuccessful';
include 'head.php';
?>
<body>
    <?php include 'nav.php'; ?>
    
    <section class="sectionError">
        <h1 class="mainHeader" style="color:#fff;background-color:#DE4F4F;">Action unsuccessful</h1>
        <?php if(isset($_GET['duplicate'])){echo '<h2 class="mainHeader">Due to duplicate</h2>';} ?>
    </section>
    <script>
        setTimeout(
            function(){
                window.location.href = '/home';
            },1000);
    </script>
    <?php include 'footer.php'; ?>
</body>