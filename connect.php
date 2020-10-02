<?php
$your_name=$_POST['your name'];
$phone_number=$_POST['phone no'];
$email_id=$_POST['email-id'];
$your_message=$_POST['your message'];

if(!empty($your_name || !empty($phone_number) || !empty($email_id) || !empty($your_message))){
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="contact";

    $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

    if (mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }else{
        $SELECT="SELECT email from contact_us Where email = ? Limit 1";
        $INSERT="INSERT Into contact_us (your_name,phone_number,email_id,your_message)values(?,?,?,?,?.?)";

        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("s", $email_id);
        $stmt->execute();
        $stmt->bind_result($email_id);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
         $stmt->close();
         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("ssssii", $your_name, $phone_number, $email_id, $your_message);
         $stmt->execute();
         echo "New record inserted sucessfully";
        } else {
         echo "Someone already register using this email";
        }
        $stmt->close();
        $conn->close();
       }
   } else {
    echo "All field are required";
    die();
   }
   ?>
    }
}