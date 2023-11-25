<?php
session_start();
if (!isset($_SESSION['Username'])) {
    echo "<script>window.location.href='../login/adminLogin.php';</script>";
}
include('../init/db.php');

if(isset($_GET['postid'])){
    $id  = mysqli_real_escape_string($con,$_GET['postid']);    
    $del = "delete from vehicledetailsdb where userid =  '$_SESSION[id]' and id = '$id'";
    $queryDel = mysqli_query($con,$del);
    if($queryDel){
        echo "<script>alert('Car Deleted')</script>";
    echo "<script>window.location.href='view.php';</script>";

    }else{
        echo "<script>alert('Something goes wrong')</script>";
    }
}



$selectCar = "select * from vehicledetailsdb where userid =  '$_SESSION[id]'";
$queryCar = mysqli_query($con,$selectCar);
$rowCar = mysqli_num_rows($queryCar);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Added Cars</title>
    <style>
        .title-view{
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
        <h2>View Cars</h2><span><a href="./admin-dashboard.php">Back to Dashbord</a></span>
    </div>
    <div class="container ">
        <div class="card">

        <?php
        if($rowCar>0){
            while($fetchCar = mysqli_fetch_assoc($queryCar)){
             
            ?>   
            <div class="card-body row">
                <div class="col-6" style="height: 200px;">
                    <img src="../login/img/login1.jpg" alt="image" style="width: 100%;height:100%;object-fit:cover">
                </div>
                <div class="col-6">
                    <h2>Car Details</h2>
<!-- Vehicle model, Vehicle number, seating capacity, rent per day,date,time,status,userid -->
                    <p><span style="font-weight:bold;">Vehicle model</span> - <?php echo $fetchCar['vehicleModel']; ?></p>
                    <p><span style="font-weight:bold;">Vehicle number</span> - <?php echo $fetchCar['vehicleNumber']; ?></p>
                    <p><span style="font-weight:bold;">Seating capacity</span> - <?php echo $fetchCar['seatingCapacity']; ?></p>
                    <p><span style="font-weight:bold;">Rent per day</span> - <?php echo $fetchCar['rentPerDay']; ?></p>
                    <p><span style="font-weight:bold;">Date</span> - <?php echo $fetchCar['date']; ?></p>
                    <p><span style="font-weight:bold;">Time</span> - <?php echo $fetchCar['time']; ?></p>
                    <p><span style="font-weight:bold;">Status</span> - <?php  if($fetchCar['status']==1){ echo 'Active';}else{ echo 'Deactive';} ?></p>
                </div>
            </div>
            <div class="row">
                <div class="card-body title-view"> 
                    <button type="button" class="btn btn-secondary" onclick="up(<?php echo $fetchCar['id']; ?>)">Update</button>
                    <button type="button" class="btn btn-warning" onclick="book(<?php echo $fetchCar['id']; ?>)">Car Booking</button>
                    <button type="button" class="btn btn-danger" onclick="del(<?php echo $fetchCar['id']; ?>)">Delete</button>
                </div>
               
            </div>
            <?php
               
            }
        }else{
            ?><h2>No Cars !!</h2><?php
        }
        ?>
           
        </div>
    </div>
</body>

</html>

<script>
    function up(id){
        window.location.href = 'admin-dashboard.php?postid='+id;
    }
    function del(id){
        if(confirm("Are you sure ")){
            window.location.href = '?postid='+id;
        }
    }
    function book(id){
        window.location.href = 'viewBookedCars.php?postid='+id;
    }
</script>