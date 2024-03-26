<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking_db";
$conn = new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error){
    die("Connection Failed:" .$conn->connect_error);
}

//handle form submission

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $room = $_POST["room"];
    $date = $_POST["date"];
    $return_date = $_POST["return_date"];

    //prepare and execute the database
    $sql = "INSERT INTO `booking`(`name`, `email`, `room`, `date`, `return_date`) 
    VALUES ('$name','$email','$room','$date','$return_date')";
    

    if($conn->query($sql) == TRUE){
        echo "Booking Successfull";
    
    }else{
        echo "Error" .$sql. "<br>" .$conn->error;
    }


}

$conn->close();

?>