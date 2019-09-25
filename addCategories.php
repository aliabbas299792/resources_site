<?php
$require = true;
include "db.link.php";
include 'verifUser.php';
    $title = "Editor";
    include "head.php";
    
    $sql = "SELECT * FROM subjects";
    $result = mysqli_query($link,$sql);
?>
    
    <body>
        <?
        include "nav.php";
        include 'navAdmin.php';
        ?>
        <b><h1 class="mainHeader">Add Category</h1></b>
        <a href='editorUse' id="editorUse" target="_blank" class="button_dark_invert">How to use</a>
        <form action="addCategoriesProcessor.php" method="post" id="addCategoriesForm">
            <span id='categoryName'>Category Name: <input type="text" id='title' placeholder="Enter category name" name="categoryTitle"></span>
            <textarea id="textarea" placeholder="Enter category information" name="categoryContent"></textarea>
            <pre id="textAreaHighlight"></pre>
            <span id="select_subject">
                Select subject: 
                <select name="subject_id" id="select_subject_options">
                    <option>-------</option>
                    <?php
                        while($data = mysqli_fetch_array($result)){
                            $subjectName = ucfirst($data['name']);
                            $subject_id = $data['id'];
                            
                            echo "<option value='$subject_id'>$subjectName</option>";
                        }
                    ?>
                </select>
                <br>
                <br>
                <bold style="color:#000;font-weight:400;">To select a category group, please do so in the edit category section.</bold>
                <br>
                <br>
            </span>
            <input type='button' id="previewInfo" value="Preview">
            <input type='submit' id="saveInfo" value="Submit">
        </form>
        <div id="preText"></div>
        <?php
        include 'footer.php';
        ?>
        <script src="js/addCategoriesValidator.js"></script>
    </body>
</html>