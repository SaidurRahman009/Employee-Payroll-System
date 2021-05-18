<?php

if (isset($_POST['delete']) && $_POST['delete'] != "") {

    echo "Please select a profile pic 1";
    $id = $_POST['delete'];
    $sql3 = "DELETE FROM employee  WHERE id ='$id'";
    $result3 = mysqli_query($conn, $sql3);
}

?>