<?php
session_start();

require_once('db.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = " SELECT * FROM users where id = $id " ;
    $result = mysqli_query( $conn , $query);
    if( mysqli_num_rows($result)>0){
        $user = mysqli_fetch_assoc($result) ;
    }
    else{
        echo"User not found" ;
        exit();
    }
}
if (isset($_POST['update'])){
$id = $_POST['id'];
$title = $_POST['title'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT ); 

 $image = $user['image']; 

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_name = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        $img_path = 'image_upload/uploads/' . basename($img_name);

        if (move_uploaded_file($img_tmp, $img_path)) {
            $image = basename($img_name); // update new image name
        }
    }

 $update_query = "UPDATE users SET title = '$title', name = '$name', email = '$email', password = '$hashed_password' , image = '$img_path' 
                    WHERE id = $id";

 if (mysqli_query($conn, $update_query)) {
    $_SESSION['changed'] = "user edited sucessfully!";
         header("location: index.php");
         exit;
    } else {
        echo " Update failed: " . mysqli_error( $conn );
    }
}
?>



<div class="edit-form ">
<h2>Edit User</h2>
<link rel="stylesheet" href="style.css">

<form method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

    <label>Title:</label>
    <input type="text" name="title" value="<?php echo $user['title']; ?>" required><br><br>

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>

    <label>Password:</label>
    <input type="text" name="password" placeholder="Enter new password" required><br><br>

    <label >Image: </label>
    <input type="file" name="image" value="<?php echo $row['image']; ?>">
    <br>

    <input type="submit" name="update" value="Update">
</form>
</div>

