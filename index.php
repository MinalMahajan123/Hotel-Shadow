<?php
$insert=false;
if(isset($_POST['Name'])){
 //set connection variable   
$server="localhost";
$username="root";
$password="";
//create connection
$con=mysqli_connect($server ,$username ,$password);
if(!$con){
    die("connection to this database failes due to".mysqli_connect_error());

}
// echo "Successfully connected to db";
//collect post variable
$Name=$_POST['Name'];
$Contact=$_POST['Contact'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$sql="INSERT INTO  `booking`. `booking`(`Name`, `Contact`, `Email`, `Password`, `DD`) VALUES ('$Name', '$Contact', '$Email', '$Password', current_timestamp())";
//echo $sql;
//execute the query
if($con->query($sql)==true){
    //echo "successfully inserted";
    //flag for successfull instruction 
 $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";

}
//close the database connection
$con->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bgimg" src="https://thesmartcab.in/wp-content/uploads/2023/04/hotelbooking.jpg" alt="room img">
    <div class="container">
        <h1>Welcome to Shadow Hotel Bookings </h1>
        <p><h3>Let's book your Rooms!<br> Enter your details and confirm your bookings.</h3></p>

        <?php
        if($insert==true){
       echo "<p class='submitmsg'>Thanks for complete registration process.Let's start the bookings. </p>";
    }
        ?>
        
        <form action="index.php" method="post">
            <input type="text" name="Name" id="name" placeholder="Enter Your name">
          <input type="text" name="Contact" id="contact" placeholder="Enter your contact Number">
           <input type="email" name="Email" id="email" placeholder="Enter your Email Address">
           <input type="password" name="Password" id="password" placeholder="Enter your email password">
            <button class="btn">Submit</button>
           

        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `booking` (`Name`, `Contact`, `Email`, `Password`, `DD`) VALUES ('gita', '1212121212', 'gita@gmail.com', 'gita', current_timestamp()) -->
</body>

</html>