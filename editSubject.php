<?php
include 'db.link.php';
include 'verifUser.php';

#print_r($_POST); ///////////////////////////////Testing Echo
#echo '<br>'; ///////////////////////////////Testing Echo

#print_r($_FILES); ///////////////////////////////Testing Echo
#echo '<br>'; ///////////////////////////////Testing Echo

if(isset($_POST['subject_id']) && isset($_POST['subject_name']) && $_POST['subject_id'] != ''){
    $subject_name = filter_var(mysqli_real_escape_string($link,$_POST['subject_name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $subject_id = filter_var(mysqli_real_escape_string($link,$_POST['subject_id']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    
    if(isset($_FILES['icon'])){
        #echo "isset --> ".$_FILES['icon']['name']."<br>"; ///////////////////////////////Testing Echo
        
        $icon = $_FILES['icon'];
        
        if($icon['type'] == 'image/png' || $icon['type'] == 'image/jpeg' || $icon['type'] == 'image/gif' || $icon['type'] == 'image/jpg' || $icon['type'] == 'image/svg+xml'){
            #echo "Type --> ".$_FILES['icon']['type']."<br>"; ///////////////////////////////Testing Echo
            
            $iconURL = '/images/'.$icon['name'];
            if(file_exists($iconURL)) {
                $sql = "UPDATE subjects SET imgSrc='$iconURL', name='$subject_name' WHERE id='$subject_id'"; #echo "1 + $sql <br>"; ///////////////////////////////Testing Echo
                
                if(mysqli_query($link,$sql)){
                    mysqli_query($link,$sql);
                    header('Location: actionSuccessful');
                }else{
                    header('Location: actionUnsuccessful');
                }
                
            }else{ 
                move_uploaded_file($icon['tmp_name'], 'images/'.$icon['name']);
                
                $sql = "UPDATE subjects SET imgSrc='$iconURL', name='$subject_name' WHERE id='$subject_id'"; #echo "2 + $sql <br>"; ///////////////////////////////Testing Echo
                
                if(mysqli_query($link,$sql)){
                    mysqli_query($link,$sql);
                    header('Location: actionSuccessful');
                }else{
                    header('Location: actionUnsuccessful');
                }
            }
        }else{
            header('Location: actionUnsuccessful');
        }
    }else{
        $sql = "UPDATE subjects SET name='$subject_name' WHERE id='subject_id'"; #echo "3 + $sql <br>"; ///////////////////////////////Testing Echo
                
        if(mysqli_query($link,$sql)){
            mysqli_query($link,$sql);
            header('Location: actionSuccessful');
        }else{
            header('Location: actionUnsuccessful');
        }
    }
}else{
    header('Location: actionUnsuccessful');
}

?>