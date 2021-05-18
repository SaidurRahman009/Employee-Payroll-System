<?php

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("location: ./login.php");
}
$name = $_SESSION['name'];
require_once "../model/config.php";
error_reporting(0);
$status = '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>   Welcome </strong> ' . $name . ' 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';

// delete

include "../controller/delete.php";

include "../controller/edit.php";
// add item

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayRoll</title>
    <!-- icon -->
    <link rel="icon" href="../img/cart.png">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- zoom in animantion css -->
    <link href="../css/aos.min.css" rel="stylesheet">
    <!-- google font css-->
    <link href="../css/poppinsfont.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/exofont.min.css">
    <!-- iconfont css -->
    <link rel="stylesheet" href="../css/icofont/icofont.min.css">
    <!-- icons css css-->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- carousel css -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <!-- magnatic popup -->
    <link rel="stylesheet" href="../Magnific-Popup/dist/magnific-popup.min.css">
    <!-- variable css -->
    <link rel="stylesheet" href="../css/variable1.min.css">

    <!-- sidebar css -->
    <link rel="stylesheet" href="../css/sidebar1.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.min.css">
    <!-- resposive css -->
    <link rel="stylesheet" href="../css/responsive.min.css">
</head>

<body>

    <!-- side bar -->

    <section>
        <div class="container d-flex align-items-center justify-content-around">

            <nav class="nav-menu d-none d-lg-block">
                <div class="logo text-center">
                    <span>Payroll</span>
                </div>
                <hr>
                <?php
                include "./sidebar.php";
                ?>

            </nav>

        </div>


        <?php
        $id = $_SESSION['id'];

        $sql = "SELECT * FROM user WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {

        ?>

            <!-- main body -->
            <main class="site-main main">
                <!-- incharge info area -->
                <div class="container info text-right">
                    <div>
                        <p>
                            <?php
                            if ($row['pic'] == '') {
                                echo '<a class="test-popup-link" href="../img/person.png"><img src="../img/person.png"/></a>';
                            } else {
                                echo '<a class="test-popup-link" href="data:image/jpeg;base64,' . base64_encode($row['pic']) . '"><img src="data:image/jpeg;base64,' . base64_encode($row['pic']) . '"/></a>';
                            }

                            ?>
                            <?php echo "Welcome " . $_SESSION['name'] ?>
                        </p>

                        <hr>
                    </div>
                </div>
            <?php

        }
            ?>

            <!-- cart -->



    </section>
    <section class="main">

        <div class="container">
            <!-- <div style="clear:both;"></div> -->
            <!-- mesaage box -->
            <div class="message_box">
                <?php echo $status; ?>
            </div>

            <div class="my-3 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#exampleModalCenter">
                    add Employee
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> name -</label>
                                    <div class="input-group-prepend">

                                        <input type="text" class="form-control" id="name" name="name" required="">
                                    </div>
                                    <label for="exampleInputPassword1"> Basic Salary  -</label>
                                    <div class="input-group-prepend">

                                        <input type="text" class="form-control" id="salary" name="salary" required="">
                                    </div>
                                    <label for="exampleInputPassword1"> Active days -</label>
                                    <div class="input-group-prepend">

                                        <input type="text" class="form-control" id="active" name="active" value="0" required="">
                                    </div>
                                    <label for="exampleInputPassword1"> Total Leave -</label>
                                    <div class="input-group-prepend">

                                        <input type="text" class="form-control" id="leave" name="leave" value="0" required="">
                                    </div>
                                    <label for="exampleInputPassword1"> send_salary -</label>
                                    <div class="input-group-prepend">

                                        <input type="text" class="form-control" id="send_salary" name="send_salary" value="0" required="">
                                    </div>
                                    <label for="exampleInputPassword1"> image -</label>
                                    <div class="input-group-prepend">

                                        <input type="file" name="image" class="form-control" id="file" required="">
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <button class="btn btn-success text-uppercase" type="submit" name="add" value="add">add employee</button>



                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive my-3">
                <table class="table text-capitalize table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Picture</th>
                            <th>name</th>
                            <th>Basic Salary</th>
                            <th>Active Days</th>
                            <th>Total Leave</th>
                            <th>Send salary</th>
                            <th>Edit</th>
                            <th>delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM employee ";
                        $result2 = mysqli_query($conn, $sql2);
                        $count = 1;
                        while ($row = $result2->fetch_assoc()) {
                        ?>
                            <tr>


                                <td><?php echo $count; ?></td>
                                <td><?php
                                    if ($row['image'] == '') {
                                        echo '<a class="test-popup-link" href="../img/cart.png"><img src="../img/cart.png" class="img-fluid"  width="60px"/></a>';
                                    } else {
                                        echo '<a class="test-popup-link" href="data:image/jpeg;base64,' . base64_encode($row['image']) . '"><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" class="img-fluid"  width="60px"/></a>';
                                    }
                                    ?></td>
               
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['salary']; ?></td>
                                <td><?php echo $row['active_days']; ?></td>
                                <td><?php echo $row['total_leave']; ?></td>
                                <td><?php echo $row['send_salary']; ?></td>
                                <td>

                                    <button class=" btn btn-outline-success text-uppercase" type="button" data-toggle="modal" data-target="#exampleModalCenter<?php echo $count ?>">edit</button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter<?php echo $count ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1"> name -</label>
                                                            <div class="input-group-prepend">

                                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required="">
                                                            </div>
                                                            <label for="exampleInputPassword1"> salary -</label>
                                                            <div class="input-group-prepend">

                                                                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $row['salary']; ?>" required="">
                                                            </div>
                                                            <label for="exampleInputPassword1"> active_days -</label>
                                                            <div class="input-group-prepend">

                                                                <input type="text" class="form-control" id="active_days" name="active_days" value="<?php echo $row['active_days']; ?>" required="">
                                                            </div>
                                                            <label for="exampleInputPassword1"> total_leave -</label>
                                                            <div class="input-group-prepend">

                                                                <input type="text" class="form-control" id="total_leave" name="total_leave" value="<?php echo $row['total_leave']; ?>" required="">
                                                            </div>
                                                            <label for="exampleInputPassword1"> send_salary -</label>
                                                            <div class="input-group-prepend">

                                                                <input type="text" class="form-control" id="send_salary" name="send_salary" value="<?php echo $row['send_salary']; ?>" required="">
                                                            </div>
                                                            <label for="exampleInputPassword1"> image -</label>
                                                            <div class="input-group-prepend">

                                                                <input type="file" name="image" class="form-control" id="file">
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        <button class="btn btn-success text-uppercase" type="submit" name="edit" value="<?php echo $row['id']; ?>">edit</button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <form action="" method="POST">
                                        <button class=" btn btn-outline-danger text-uppercase" type="submit" name="delete" value="<?php echo $row['id']; ?>">delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $count += 1;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    </main>
    <?php
    include './footer.php';
    ?>

    <!-- gotop -->
    <div class="container-fluid"><a class="gotop" href="#"><i class="fas fa-level-up-alt"></i></a></div>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <script type="text/javascript">
        windo
        w.addEventListener("scroll", function() {
            // var header = document.querySelector("section");
            // header.classList.toggle("sticky", window.scrollY > 0);
            var gotop = document.querySelector(".gotop");
            gotop.classList.toggle("gotopbutton", window.scrollY > 0);
        });
        $(function() {

            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <script src="../js/aos.min.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="../js/header.min.js"></script>
    <script src="../js/alert.min.js"></script>
    <script src="../js/index.js"></script>
</body>

</html>