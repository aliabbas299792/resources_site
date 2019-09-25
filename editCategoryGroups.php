<?php
include 'db.link.php';
$require = true;
include 'verifUser.php';

if(isset($_GET['id'])){
    $categoryGroup_id = filter_var(mysqli_real_escape_string($link,$_GET['id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: /management_panel?error');
}

$title = 'Add Category Group';
include 'head.php';

$sql = "SELECT * FROM categoryGroup WHERE id=$categoryGroup_id";
$result = mysqli_query($link,$sql);

if(mysqli_num_rows($result) < 1){
    header('Location: /management_panel?error');
}

$row = mysqli_fetch_array($result);

$name = $row['name'];
$subject_group_id = $row['subject_id'];
?>
<body>
    <?php
        include 'nav.php';
        include 'navAdmin.php';
    ?>
    <h1 class="mainHeader">Edit Category Group</h1>
    <span id="responseText"></span>
    <form action="/editCategoryGroupsProcessor.php" method="post" style="margin:30px auto;display:block;text-align:center;line-height:150%;" id="addCategoryGroupForm">
        <input type="hidden" name='id' value="<?php echo $categoryGroup_id; ?>">
        <input type="text" name='groupName' placeholder="Group Name" value="<?php echo $name; ?>" style="padding:5px 20px;margin:20px;text-overflow:ellipsis" id="groupName"><br>
        <select id="select_subject_options" name="select_subject_options">
            <option>-------</option>
            <?php
                $sql = "SELECT * FROM subjects";
                $result = mysqli_query($link,$sql);
                
                while($row = mysqli_fetch_array($result)){
                    $name = $row['name'];
                    $name = ucwords($name);
                    $subject_id = $row['id'];
                    
                    if($subject_id == $subject_group_id){
                        echo "<option selected value='$subject_id'>$name</option>";
                    }else{
                        echo "<option value='$subject_id'>$name</option>";
                    }
                }
            ?>
        </select>
        <br>
        <input id="addCategoryGroupSubmit" type='submit' value='Submit Changes' style="padding:5px;margin:20px;">
    </form>
    <?php include 'footer.php'; ?>
    <script src="js/addCategoryGroup.js"></script>
</body>