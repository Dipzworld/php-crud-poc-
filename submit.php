<?php
require_once('db.php');
if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $title = $_POST['profile_title'];
  $name = $_POST['name'] ;
  $email = $_POST['email'] ;
  $password = $_POST['password'];
  $image = $_FILES['image']['name'];
   $tmp_name = $_FILES['image']['tmp_name'];
   $folder = "image_upload/uploads/" . $image;
   $upload_image = '';
        if (move_uploaded_file($tmp_name, $folder)) {
            $upload_image = $folder; 
            echo "<p style='color:green;'> Image uploaded successfully! </p>";
            }
        else {
        echo "<p style='color:red;'> Failed to upload image. </p>";
            }



 



  //hashing the password
  $hashed_password =  password_hash($password , PASSWORD_DEFAULT) ;




  $query = "INSERT INTO members(`profile_title`, `name`, `email`, `password`, `image`) 
            VALUES ('$title', '$name', '$email', '$hashed_password', '$upload_image')";
    $conn->query($query);
    

     header("Location: index.php");
    exit();
  }
else{
    echo "no method is differnt";
}
?>