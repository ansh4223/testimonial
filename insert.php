<?php
$username = $_POST['username'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$hn = $_POST['hn'];
$testimonial = $_POST['testimonial'];
if (!empty($username) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone) || !empty($address) || !empty($hn) || !empty($testimonial)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "testimonial";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (username, gender, email, phoneCode, phone, address, hn, testimonial) values(?, ?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssiisis", $username, $gender, $email, $phoneCode, $phone, $address, $hn, $testimonial);
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
<html lang="en">
<head>
<meta charset="utf-8">
<script>
    function pageRedirect() {
        window.location.replace("/project/display.php");
    }      
    setTimeout("pageRedirect()", 500);
</script>
</head>
<body>
</body>
</html>