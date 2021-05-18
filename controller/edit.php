<?php

if (isset($_POST['edit']) && $_POST['edit'] != "") {
    echo "Please select a profile pic 3";
    $id = $_POST['edit'];
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $active_days = $_POST['active_days'];
    $total_leave = $_POST['total_leave'];
    $send_salary = $_POST['send_salary'];
    

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

            $update = $conn->query("UPDATE employee SET image='$image' WHERE id='$id'");
        }
    }

    // $sql3 = "UPDATE employee SET name='demo' WHERE id ='$id'";
    $update1 = $conn->query("UPDATE employee SET  name='$name', salary='$salary',active_days='$active_days',total_leave='$total_leave',send_salary='$send_salary'  WHERE id='$id'");
    //

    // $result3 = mysqli_query($conn, $sql3);
}

?>