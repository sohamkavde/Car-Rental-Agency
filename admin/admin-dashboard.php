<?php
session_start();
if (!isset($_SESSION['Username'])) {
    echo "<script>window.location.href='../login/adminLogin.php';</script>";
}

include('../init/db.php');
// insertion:
// <!-- Vehicle model, Vehicle number, seating capacity, rent per day,date,time,status,userid -->

if(isset($_GET['postid'])){
    $id = $_GET['postid'];
    $selectCar = "select * from vehicledetailsdb where userid =  '$_SESSION[id]' and id = '$id'";
    $queryCar = mysqli_query($con,$selectCar);
    $rowCar = mysqli_num_rows($queryCar);
    $fetchCar = mysqli_fetch_assoc($queryCar);
}

if(isset($_POST['update'])){

    $id = $_GET['postid'];    
    $vehicleModel = mysqli_real_escape_string($con, $_POST['vehicleModel']);
    $vehicleNumber = mysqli_real_escape_string($con, $_POST['vehicleNumber']);
    $seatingCapacity = mysqli_real_escape_string($con, $_POST['seatingCapacity']);
    $rentPerDay = mysqli_real_escape_string($con, $_POST['rentPerDay']);
    $status = 1;
    $date = date("d:m:Y");
    $time = date("h:i:s A");
    
    $upd = "update vehicledetailsdb set vehicleModel = '$vehicleModel' , vehicleNumber = '$vehicleNumber' , seatingCapacity = '$seatingCapacity' , rentPerDay = '$rentPerDay',date='$date',time='$time',status='$status' where userid =  '$_SESSION[id]' and id = '$id'";
    $query = mysqli_query($con,$upd);
    if($query){
        echo "<script>alert('Updated !! ')</script>";
        echo "<script>window.location.href='view.php';</script>";
    }else{
        echo "<script>alert('Something goes wrong')</script>";
    }
}



if (isset($_POST['submit'])) {
    $vehicleModel = mysqli_real_escape_string($con, $_POST['vehicleModel']);
    $vehicleNumber = mysqli_real_escape_string($con, $_POST['vehicleNumber']);
    $seatingCapacity = mysqli_real_escape_string($con, $_POST['seatingCapacity']);
    $rentPerDay = mysqli_real_escape_string($con, $_POST['rentPerDay']);
    $status = 1;
    $date = date("d:m:Y");
    $time = date("h:i:s A");
    $userid = $_SESSION['id']; // userid as key for peritcular user
    $insert = "INSERT INTO `vehicledetailsdb`(`vehicleModel`, `vehicleNumber`, `seatingCapacity`, `rentPerDay`, `status`, `date`, `time`,`userid`) VALUES ('$vehicleModel','$vehicleNumber','$seatingCapacity','$rentPerDay','$status','$date','$time','$userid')";
    $query = mysqli_query($con, $insert);
    if ($query) {
        echo "<script>alert('Insertion Successfull');</script>";
    } else {
        echo "<script>alert('Something goes wrong !!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>

    <link rel="stylesheet" href="./admin-dashboard.css">
    <!--Bootsraps  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include('./navbar.php');
    ?>
    <!-- Vehicle model, Vehicle number, seating capacity, rent per day -->
    <div class="container adeCar">
        <div class="title-view">
            <h2>Add Cars</h2> <span><a href="view.php">view cars</a></span>
        </div>
        <!-- Not clear about fields much so I give type as text -->
        <form action="#" method="post">

            <div class="mb-3">
                <label for="Vehicle model" class="form-label">Vehicle model</label>
                <input type="text" class="form-control" name="vehicleModel" placeholder="Vehicle model" 
                value="<?php if(isset($_GET['postid'])){ echo $fetchCar['vehicleModel']; }?>">
            </div>
            <div class="mb-3">
                <label for="Vehicle number" class="form-label">Vehicle number</label>
                <input type="text" class="form-control" name="vehicleNumber" placeholder="Vehicle number" value="<?php if(isset($_GET['postid'])){ echo $fetchCar['vehicleNumber']; }?>">
            </div>
            <div class="mb-3">
                <label for="Seating capacity" class="form-label">Seating capacity</label>
                <input type="text" class="form-control" name="seatingCapacity" placeholder="Seating capacity" value="<?php if(isset($_GET['postid'])){ echo $fetchCar['seatingCapacity']; }?>">
            </div>
            <div class="mb-3">
                <label for="rent per day" class="form-label">Rent per day</label>
                <input type="text" class="form-control" name="rentPerDay" placeholder="rent per day" value="<?php if(isset($_GET['postid'])){ echo $fetchCar['rentPerDay']; }?>">
            </div>


            <div class="mb-12">
                <input type="submit" class="btn btn-secondary"
                name="<?php if(isset($_GET['postid'])){ echo 'update';}else{echo 'submit';}?>"
                 value="<?php if(isset($_GET['postid'])){ echo 'update';}else{echo 'submit';}?>">
            </div>

        </form>
    </div>
</body>

</html>