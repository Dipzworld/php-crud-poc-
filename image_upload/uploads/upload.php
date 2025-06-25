<!DOCTYPE html>
<html>
<head>
  <title>Upload Image</title>
</head>
<body>

<h2>Upload Image to Server (Localhost)</h2>

<form method="POST" enctype="multipart/form-data">
  Name: <input type="text" name="name" required><br><br>
  Select Image: <input type="file" name="image" required><br><br>
  <input type="submit" name="submit" value="Upload">
</form>

<?php
$conn = mysqli_connect("localhost", "root", "", "test_db");

if (isset($_POST['submit'])) {
    
}
?>
</body>
</html>
