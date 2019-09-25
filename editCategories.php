<?php
$require = true;
include 'db.link.php';
include 'verifUser.php';

if(isset($_GET['id']) && isset($_GET['subject_id'])){
    $category_id = filter_var(mysqli_real_escape_string($link,$_GET['id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $subject_id = filter_var(mysqli_real_escape_string($link,$_GET['subject_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}else{
    header('Location: /management_panel?error');
}

$title = "Edit Categories";
include 'head.php';

$sql = "SELECT * FROM categories WHERE id='$category_id' AND subject_id='$subject_id'";
$result = mysqli_query($link,$sql);

$row = mysqli_fetch_array($result);
$subject_id = $row['subject_id'];
$information = $row['information'];
$title = $row['name'];
$categoryGroup = $row['categoryGroup'];

?>
<body>
    <?php 
        include 'nav.php'; 
        include 'navAdmin.php';
    ?>
    
    <b><h1 class="mainHeader">Edit Category</h1></b>
        <a href='/editorUse' id="editorUse" target="_blank" class="button_dark_invert">How to use</a>
        <form action="/editCategoriesProcessor.php" method="post" id="addCategoriesForm">
            <span id='categoryName'>Category Name: <input type="text" id='title' placeholder="Enter category name" value="<?php echo $title; ?>" name="categoryTitle"></span>
            <textarea id="textarea" placeholder="Enter category information" name="categoryContent"><?php echo $information; ?></textarea>
            <pre id="textAreaHighlight"></pre>
                <br>
            <span id="select_subject">
                Select subject: 
                <select name="subject_id" id="select_subject_options">
                    <?php
                        $sql = "SELECT * FROM subjects";
                        $result = mysqli_query($link,$sql);
                    
                        while($data = mysqli_fetch_array($result)){
                            $subject_NameVal = $data['name'];
                            $subject_id_DB = $data['id'];
                            $subject_Name = ucfirst($subject_NameVal);
                            
                            if($subject_id == $subject_id_DB){
                                echo "<option selected value='$subject_id_DB'>$subject_Name</option>";
                            }else{
                                echo "<option value='$subject_id_DB'>$subject_Name</option>";
                            }
                        }
                    ?>
                </select><span id="select_subject">
                <br>
                Select category group:
                <select name="categoryGroup_id" id="select_group_options">
                    <?php
                        $sql = "SELECT * FROM categoryGroup";
                        $result = mysqli_query($link,$sql);
                    
                        while($data = mysqli_fetch_array($result)){
                            $categoryGroup_NameVal = $data['name'];
                            $categoryGroup_id_DB = $data['id'];
                            $categoryGroup_subject_id = $data['subject_id'];
                            $categoryGroup_Name = ucfirst($categoryGroup_NameVal);
                            
                            if($subject_id == $categoryGroup_subject_id){
                                if($categoryGroup == $categoryGroup_id_DB){
                                    echo "<option selected value='$categoryGroup_id_DB'>$categoryGroup_Name</option>";
                                    $selectedAnOption = true;
                                }else{
                                    echo "<option value='$categoryGroup_id_DB'>$categoryGroup_Name</option>";
                                }
                            }
                        }
                        if($selectedAnOption != true){
                            echo "<option selected>-------</option>";
                        }else{
                            echo "<h1>$selectedAnOption</h1>";
                        }
                    ?>
                </select>
                <br>
                <br>
                <input type="hidden" value="<?php echo $category_id; ?>" name='category_id'>
            </span>
            <input type='button' id="previewInfo" value="Preview">
            <input type='submit' id="saveInfo" value="Submit">
        </form>
    <div id="preText"></div>
    
    <?php include 'footer.php'; ?>
    <script src="/js/addCategoriesValidator.js"></script>
</body>