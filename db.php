<?php
$conn = new mysqli("localhost", "root", "", "poc");
// $conn->query("INSERT INTO users (`name`,`email`, `phone`) values('deepak','test@gmail.com','9799470714')");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "mysql is connected";
}
?>




