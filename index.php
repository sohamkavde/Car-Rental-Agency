<?php
session_start();
// this page is needed userName1 i.e. customer is loging
include('./init/db.php');
$selectCar = "select * from vehicledetailsdb";
$queryCar = mysqli_query($con, $selectCar);
$rowCar = mysqli_num_rows($queryCar);


if(isset($_POST['submit'])){
    
        if (!isset($_SESSION['Username1'])) {
            if(isset($_SESSION['Username'])){
                ?> <script>alert('Only customer allow to rent a car !! ')</script>           
                <?php 
            }else{
            ?> <script>alert('To rent car please login !! ')</script>           
            <?php      

            }
        } else{
            $pid = mysqli_real_escape_string($con,$_POST['pid']);
            $customerid = mysqli_real_escape_string($con,$_POST['customerid']);
            $days = mysqli_real_escape_string($con,$_POST['days']);
            $date = mysqli_real_escape_string($con,$_POST['date']);
            $status = 0; // default : Car rental service will be response yes or now ie 1 or 0 respectively
            $date = date("d:m:Y");
            $time = date("h:i:s A");
            
            $insert = "insert into orderdb (pid,customerid,days,date,status,insertionDate,insertionTime) values('$pid','$customerid','$days','$date','$status ','$date','$time')";
            $query = mysqli_query($con,$insert);
            if($query){
                ?> <script>alert('Car Booked Successfully !! ')</script>           
                <?php 
            }else{
                ?> <script>alert('Something goes wrong ')</script>           
                <?php 
            }
        }
           
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Added Cars</title>
    <style>
        .title-view {
            display: flex;
            justify-content: end;
        }

        h1 {
            font-size: 9.0em;
            text-transform: uppercase;
            font-family: 'Open Sans Pro', sans-serif;
            background: url(https://24.media.tumblr.com/tumblr_m87dri70zh1qzla33o1_500.gif);
            background-size: cover;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    <!--Bootsraps  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: coral;">
        <div class="container-fluid d-flex justify-space-between">
            <a class="navbar-brand" href="#">
                <h1 style="text-wrap: wrap;">Welcome to Car Rentals </h1>
            </a>
            <?php
            if (isset($_SESSION['Username1']) || isset($_SESSION['Username'])) {
            ?> <a href="logout.php" style="padding:5px 10px;text-decoration:none;color:#fff;">Log Out</a><?php
                                                                                                    } else {
                                                                                                        ?>
                <a href="direction.php" style="padding:5px 10px;text-decoration:none;color:#fff;">Log In</a>
            <?php
                                                                                                    }
            ?>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>View Cars</span>
    </div>
    <div class="container ">
        <div class="card">

            <?php
            if ($rowCar > 0) {
                while ($fetchCar = mysqli_fetch_assoc($queryCar)) {

            ?>
                    <form action="#" method="post">
                        <div class="card-body row">
                            <div class="col-6" style="height: 200px;">
                                <img src="./login/img/login2.jpg" alt="image" style="width: 100%;height:100%;object-fit:cover">
                            </div>
                            <div class="col-6">
                                <h2>Car Details</h2>
                                <!-- Vehicle model, Vehicle number, seating capacity, rent per day,date,time,status,userid -->
                                <p><span style="font-weight:bold;">Vehicle model</span> - <?php echo $fetchCar['vehicleModel']; ?></p>
                                <p><span style="font-weight:bold;">Vehicle number</span> - <?php echo $fetchCar['vehicleNumber']; ?></p>
                                <p><span style="font-weight:bold;">Seating capacity</span> - <?php echo $fetchCar['seatingCapacity']; ?></p>
                                <p><span style="font-weight:bold;">Rent per day</span> - <?php echo $fetchCar['rentPerDay']; ?></p>
                                <?php
                                // show when user is logged in 
                                if (isset($_SESSION['Username1'])) {
                                ?>
                                    <label style="font-weight:bold;" for="Rent the car for number days">Rent the car for number days</label>
                                    <select name="days" id="days" required>
                                        <option value="">Select Days</option>
                                        <?php
                                        for ($i = 1; $i <= 30; $i++) {
                                            echo "<option value='$i Day'>$i Day</option>";
                                        }
                                        ?>
                                    </select><br><br>
                                    <label for="start date" style="font-weight:bold;">Start Date</label>
                                    <input type="date" name="date" id="date" required>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">

                            <input type="hidden" name="pid" value="<?php echo $fetchCar['id']; ?>">
                            <input type="hidden" name="customerid" value="<?php  if(isset($_SESSION['id1'])){ echo $_SESSION['id1'];} ?>">
                            <div class="card-body title-view">
                                <button type="submit" class="btn btn-danger" name="submit">Rent Car</button>
                            </div>

                        </div>
                    </form>
                <?php

                }
            } else {
                ?><h2>No Cars !!</h2><?php
                        }
                            ?>

        </div>
    </div>
</body>

</html>