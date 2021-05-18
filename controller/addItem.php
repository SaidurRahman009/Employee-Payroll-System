<?php
 
if (isset($_POST['add']) && $_POST['add'] != "") {
    echo "Please select a profile pic 2";
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $active = $_POST['active'];
    $leave = $_POST['leave'];
    $send_salary = $_POST['send_salary'];
    

    $flag = 0;
    $pic = 0;

    $file = $_FILES['image']['tmp_name'];
    if (!isset($file)) {
        // echo "Please select a profile pic";
    } else {


        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);

        if ($image_size == FALSE) {
            // echo "That isn't a image.";
            $status = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>   That is not a image </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        } else {
            $pic = 1;
        }
    }

   
    if ($flag != 1) {
        $sql3 = "INSERT INTO employee(name, image, salary, active_days,total_leave,send_salary) VALUES 
        ('$name','$image',$salary,$active,$leave,$send_salary)";
        $result3 = mysqli_query($conn, $sql3);
    } else {
        $status = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>   Employee is already exits! </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
}
?>