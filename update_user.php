<?php
require_once('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id = $id");
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $conn->query("UPDATE users SET title='$title', name='$name', email='$email' WHERE id=$id");

    header("Location: index.php");
    exit();
}
?>

<!-- HTML Form -->
<form method="POST">
    <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
    <input type="submit" value="Update">
</form>
