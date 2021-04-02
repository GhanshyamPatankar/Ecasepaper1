<?php 

$host="localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "ecasepaper";
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

$conn =mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
if(isset($_POST['LOGIN'])){
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    
$sql = "SELECT * FROM paitentssignup1 where email=? AND password=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if($row = $result->fetch_assoc()) {
 
    header('location: patientsafterlogin.html');
}
else{
    echo "Incorrect Login Credetials";
}



// $data = [];
// while ($row = $result->fetch_assoc()) {
//     $data[] = $row;
// }



     //$stmt = $conn->prepare("SELECT * FROM paitentssignup1 where email=? AND password=? limit 1");

     

    // $stmt->bind_param("ss", $email, $password);
   
    // $stmt->execute();
    // echo $stmt;
    // printf("%d Row inserted.\n", $stmt->affected_rows);

// $stmt=mysqli_prepare($conn,"SELECT * FROM paitentssignup1 where email='".$email."'AND password='".$password."' limit 1");
// $stmt->bind_param('ss', $email, $password);
// $stmt->execute();

//   echo $result;
    
// if ($stmt->num_rows === 0) {
//     echo "Incorrect Login Credetials";
// } else {
//     $row = $stmt->fetch_assoc();
//     $_SESSION['email'] = $row['email'];
//     $_SESSION['name'] = $row['name'];
//     $_SESSION['user_id'] = $row['id'];
//     header('location: products.php');

        
}

?>