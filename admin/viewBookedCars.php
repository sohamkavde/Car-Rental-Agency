<?php
session_start();
if (!isset($_SESSION['Username'])) {
    echo "<script>window.location.href='../login/adminLogin.php';</script>";
}
include('../init/db.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Who Booked Car List</title>
    <style>
        .title-view {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <!--Bootsraps  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include('./navbar.php');
    ?>
    <div class="container mt-5 title-view">
        <h2>Curtomer List</h2><span><a href="./view.php">Back</a></span>
    </div>
    <div class="container">
        <table class="table table-dark table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">S No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Starting Date</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Booking time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['postid'])) {
                    $id  = mysqli_real_escape_string($con, $_GET['postid']);
                    $selectCar = "select * from orderdb where pid = '$id'";
                    $queryCar = mysqli_query($con, $selectCar);
                    $rowCar = mysqli_num_rows($queryCar);
                    if ($rowCar > 0) {
                        $i = 1;
                        while ($fetch = mysqli_fetch_assoc($queryCar)) {
                            $customerSelect = "select userName from customerlogindb where id = '$fetch[customerid]'";
                            $queryCustomer = mysqli_query($con, $customerSelect);
                            $row = mysqli_num_rows($queryCustomer);
                            $fetchCustomer = mysqli_fetch_assoc($queryCustomer)
                ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php if ($row > 0) {
                                        echo $fetchCustomer['userName'];
                                    } else {
                                        echo 'customer account not exist';
                                    } ?></td>
                                <td><?php echo $fetch['days']; ?></td>
                                <td><?php echo $fetch['date']; ?></td>
                                <td><?php echo $fetch['insertionDate']; ?></td>
                                <td><?php echo $fetch['insertionTime']; ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                                ?>
                            <tr>
                                <td colspan="6">Car has not Booked yet !!
                            </tr>
                            </td><?php
                                }
                            }

                                    ?>


            </tbody>
        </table>
    </div>
</body>

</html>