<?php
$require = true;
$requiredType = ['admin','mod','owner'];
include 'db.link.php';
include 'verifUser.php';
$title = 'View Category Groups';
include 'head.php';
include 'nav.php';
include 'navAdmin.php';

$sql = "SELECT * FROM subjects";
$result = mysqli_query($link,$sql);

$colours = ["#713f91","#dd7426","#6ac967","#90a574","#25283f","#7f2a2a"];

while($row = mysqli_fetch_array($result)){
    $name = $row['name'];
    $id = $row['id'];
    
    $subjects[$id] = "$name";
}

$sql = "SELECT * FROM categoryGroup ORDER BY subject_id";
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_array($result)){
    $colorNumber = rand(0,5);
    $colour = $colours[$colorNumber];
    
    $name = $row['name'];
    $id = $row['id'];
    $subject_id = $row['subject_id'];
    
    #$subject_name = ucwords($subjects["$subject_id"]);echo $subject_name;
    
    $categoryGroups .= "
                <a href='/categoryGroups/edit/$id' class='col-2-12 col-3-12-med col-4-12-small col-12-12-xsmall' style='background-color:$colour;'>
                    <span class='subjectName' style='background-color:rgba(0,0,0,0.5);margin:30px 15px;padding:5px;color:#fff;'>".ucfirst($name)."</span>
                </a>
    ";
}
?>
<body>
    <?php echo $categoryGroups; ?>
</body>
<?php
include 'footer.php';
?>