
<?php
require_once('db.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
  $title = $_POST['profile_title'];
  $name = $_POST['name'] ;
  $email = $_POST['email'] ;
  $password = $_POST['password'];

  $query = "INSERT INTO users(`title`, `name`,`email`,`password`) values('$title','$name','$email', '$password')";
    $conn->query($query);
   }
   else{
    echo "no method is differnt";
   }
   ?>

  <?php
  require_once('db.php');
  if($_SERVER['REQUEST_METHOD']=="POST"){
  $title = $_POST['profile_title'];
  $name = $_POST['name'] ;
  $email = $_POST['email'] ;
  $password = $_POST['password'];

  $query = "INSERT INTO users(`title`, `name`,`email`,`password`) values('$title','$name','$email', '$password')";
    $conn->query($query);
  }
  else{
    echo "no method is differnt";
  }
  ?>

<?php
require_once("db.php");

?><!DOCTYPE html>
<html>
<head>
  <title>HTML POC by Dipanshu Dhawan</title>
 
</head>
<body>
  <header>This is Web Page Main title</header>




  ====


  <?php require_once("header.php");  //for header ?>
<div class="main">   
<?php require_once("sidebar.php");  //for sidebar ?>
      <div class="content">
            Technical and Managerial Tutorials
          <h2>Data Form</h2>
    <form action="submit.php" method="POST" enctype="multipart/form-data" class="my-form"> 
        
        <label for="profile_title">Profile Title:</label>
        <input type="text" id="profile_title" name="profile_title" placeholder="Enter Profile Title" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your Name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your Email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*">

        <input type="submit" value="Submit">

    </form>
   
      </div>
  </div>
<?php
require_once("footer.php"); //footer
?>
 


 --------------


 <?php require_once("header.php");  //for header ?>
<div class="main">   
<?php require_once("sidebar.php");  //for sidebar ?>
      <div class="content">
            Technical and Managerial Tutorials
         <div class="button-container">
             <a href="user_list.php" class="add-user-btn">Add User</a>
         </div>
      </div>
  </div>
<?php
require_once("footer.php");
?>
  
  

  .content {
      background-color: #f2f2f2;
      width: 75%;
      padding: 20px;
    }


    .content {
      background-color: #f2f2f2;
      width: 75%;
      padding: 20px;
    }
------------------------------------------------

<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

    <label>Title:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($user['title']); ?>" required>

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

    <label>Password (enter new):</label>
    <input type="password" name="password" required>

    <label>Image:</label>
    <input type="file" name="image">
    <p>Current Image: <img src="<?php echo htmlspecialchars($user['image']); ?>" width="100"></p>

    <button type="submit" name="update">Update User</button>
</form>








<form method="POST" enctype="multipart/form-data">

<input type="text">
<input type="text">












===========================

if (isset($_FILES['image'])) {
    $image = $_FILES['image']['name'];        
    $tmp_name = $_FILES['image']['tmp_name']; 
    $upload_dir = "uploads/";                  
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $target_file = $upload_dir . basename($image);
    if (move_uploaded_file($tmp_name, $target_file)) {
        echo "Image uploaded successfully!";
    } else {
        echo "Failed to upload image.";
    }
}
