<?php
include "db.php"; // Using database connection file here

if(isset($_POST['submit']))
{		
    
    $UserName=$_POST['UserName'];
$phno=$_POST['PhoneNo'];
$email=$_POST['email'];
$Message=$_POST['Message'];

    $insert = mysqli_query($db,"INSERT INTO `Cust_Message`(`UserName`,`PhoneNo`, `email`, `Message`, `Submitted_on`) VALUES ('$UserName','$phno', '$email', '$Message', current_timestamp())");

    if(!$insert)
    {
        echo "<script>alert('something went wrong.try again!')</script>";
        //echo "<a href='https://agrolimited.000webhostapp.com/'>Click Here To Continue</a>";
        echo"<script>location.href='https://agrolimited.000webhostapp.com'</script>";
       
        
    }
    else
    {
        echo "<script>alert('message sent.thank you!')</script>";
        //echo "<a href='https://agrolimited.000webhostapp.com/'>Click Here To Continue</a>";
        echo"<script>location.href='https://agrolimited.000webhostapp.com'</script>";
    }
}

mysqli_close($db); // Close connection
?>