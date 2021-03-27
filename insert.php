<?php
#database code
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "ecasepaper";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $aadhar = $_POST['aadhar'];
    $address = $_POST['address'];
    $pastdiseases = $_POST['pastdiseases']; 

if(isset($_POST['submit']))
{


    
     //Prepare statement
     $stmt = $conn->prepare("INSERT INTO paitentssignup1 (name, gender, birthdate, email, phone, aadhar, address, pastdiseases) values(?, ?, ?, ?, ?, ?, ?, ?)");

     

     $stmt->bind_param("ssssssss", $name, $gender, $birthdate, $email, $phone, $aadhar, $address, $pastdiseases);
   
     $stmt->execute();
      printf("%d Row inserted.\n", $stmt->affected_rows);

     }
 else {
 echo "All field are required";
 die();
}
?>

