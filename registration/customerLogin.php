<?php
include('../init/db.php');
if(isset($_POST['submit'])){
    // Fetch values
    // DB Fields: id,UserName,Email id, Password,Status(Active/Deactive),date and time (Asia/Kolkata time zone)
    $userName = mysqli_real_escape_string($con,$_POST['uname']);
    $email = mysqli_real_escape_string($con,$_POST['uemail']);
    $psw = mysqli_real_escape_string($con,$_POST['psw']);
    $status = 1;
    $date = date("d:m:Y");
    $time = date("h:i:s A");

    // check email is already in db or not
    $checkEmailSelect = "select email from customerlogindb where email = '$email'";
    $CheckEmailQuery = mysqli_query($con,$checkEmailSelect);
    $row = mysqli_num_rows($CheckEmailQuery);
    if($row == 0){ // current email is not exist in db
        // password hashing
        $pass_hashing = password_hash($psw,PASSWORD_BCRYPT);
        $datInsert = "insert into customerlogindb(`userName`, `email`, `password`, `status`, `date`, `time`) VALUES ('$userName','$email','$pass_hashing','$status','$date','$time')";
        $dataInserQuery = mysqli_query($con,$datInsert);
        if($dataInserQuery){
            ?> <script>alert('Inserted Successfully !!');
            window.location.href = '../login/customerLogin.php';
            </script>           
            <?php
        }else{
            ?> <script>alert('Something goes wrong')</script>           
            <?php
        }

    }else{
        ?> <script>alert('Email Already Exist')</script>           
        <?php
        
    }
    
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration || Car Rental Service</title>
   <link rel="stylesheet" href="./css/customerLogin.css">
</head>

<body>
    <div class="container">
        <div class="firstHalf"></div>
        <div class="secondHalf">
            <form action="#" method="post">           

                <div class="container1">
                    <h1>Customer Registration</h1><br>
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <label for="uemail"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="uemail" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit" name="submit">Login</button>                    
                </div>                
            </form>

        </div>
    </div>
</body>

</html>