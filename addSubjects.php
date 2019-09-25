<?php
include 'db.link.php';
$require = true;
include 'verifUser.php';
$title = 'Add Subjects';
include 'head.php';
?>
<body>
    <?php
        include 'nav.php';
        include 'navAdmin.php';
    ?>
    <h1 class="mainHeader">Add Subject</h1>
    <form action="addSubjectsProccessor.php" method="post" enctype="multipart/form-data" style="margin:30px auto;display:block;text-align:center;line-height:150%;">
        <input type="text" name='title' placeholder="Title" id="subjectName" style="padding:5px 20px;margin:20px;"><br>
        <input type='file' name='icon' style="padding:5px;margin:20px;" id="subjectIcon"><br>
        <input type='submit' id="addSubjectSubmit" value='Add Subject' style="padding:5px;margin:20px;">
    </form>
    <script src="js/addSubjectValidator.js"></script>
    <?php include 'footer.php'; ?>
</body>