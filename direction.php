<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login || Car Rental Service</title>
    <link rel="stylesheet" href="./login/css/adminLogin.css">
    <style>
      .secondHalf{
        width: 50%;
        display: flex;
        flex-direction: column;
        align-content: center;
        justify-content: center;
      }
      .color{
        margin: 10px;
        width: 90%;
        height: 100px;
        background-color: brown;
        padding: 5px;
        color: #fff;
      }
      .color:nth-child(even){
        background-color: gray;
      }
      .links{
        padding-top: 10px;
        display: flex;  
        align-content: center;
        justify-content: space-around;
      }
      .links>a{
        color: #fff;
      }
    </style>
</head>

<body>
    <div class="container">
        <div class="firstHalf"></div>
        <div class="secondHalf">
            <div class="color">
                <h1>Car Rental Service </h1>
                <div class="links">
                    <a href="./registration/adminLogin.php">Registration</a>
                    <a href="./login/adminLogin.php">login</a>
                </div>
            </div>
            <div class="color">
                <h1>Customer </h1>
                <div class="links">
                    <a href="./registration/customerLogin.php">Registration</a>
                    <a href="./login/customerLogin.php">login</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>