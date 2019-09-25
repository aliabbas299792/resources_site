<?php
include 'db.link.php';
$require = true;
include 'verifUser.php';
$title = 'Add Category Group';
include 'head.php';
?>
<body>
    <?php
        include 'nav.php';
        include 'navAdmin.php';
    ?>
    <h1 class="mainHeader">Add Category Group</h1>
    <span id="responseText"></span>
    <form action="addCategoryGroupsProcessor.php" method="post" style="margin:30px auto;display:block;text-align:center;line-height:150%;" id="addCategoryGroupForm">
        <input type="text" name='groupName' placeholder="Group Name" style="padding:5px 20px;margin:20px;" id="groupName"><br>
        <select id="select_subject_options" name="select_subject_options">
            <option>-------</option>
            <?php
                $sql = "SELECT * FROM subjects";
                $result = mysqli_query($link,$sql);
                
                while($row = mysqli_fetch_array($result)){
                    $name = $row['name'];
                    $name = ucwords($name);
                    $subject_id = $row['id'];
                    
                    echo "<option value='$subject_id'>$name</option>";
                }
            ?>
        </select>
        <br>
        <input id="addCategoryGroupSubmit" type='submit' value='Add Category Group' style="padding:5px;margin:20px;">
    </form>
    <?php include 'footer.php'; ?>
    <script src="js/addCategoryGroup.js"></script>
</body>