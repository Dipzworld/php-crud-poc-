<?php
require_once('db.php');

if(!isset($_GET['id'] )){
echo"No user ID is provided";
exit;
}
 $id = intval($_GET['id']);
 $query = "SELECT * FROM users WHERE id = $id" ;
 $result = mysqli_query($conn , $query);


 if (!$result || mysqli_num_rows($result) == 0) {
    echo "User not found!";
    exit;
}

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Details - <?php echo htmlspecialchars($user['name']); ?></title>
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f0f0f0;
        }
        .user-details {
            background: white;
            padding: 20px;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        .user-details h2 {
            margin-top: 0;
        }
        .user-details img {
            max-width: 150px;
            border-radius: 5px;
        }
        .label {
            font-weight: bold;
        }
        .bio-box {
            max-height: 100px;
            overflow-y: auto;
            background: #fafafa;
            padding: 10px;
            border: 1px solid #ccc;
            margin-top: 5px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

<div class="user-details">
    <h2><?php echo htmlspecialchars($user['title']); ?> - <?php echo htmlspecialchars($user['name']); ?></h2>
    
    <p><span class="label">Email:</span> <a href="mailto:<?php echo htmlspecialchars($user['email']); ?>"><?php echo htmlspecialchars($user['email']); ?></a></p>
    
    <p><span class="label">Password:</span> <input type="password" value="<?php echo htmlspecialchars($user['password']); ?>" id="pass" readonly>
       <button onclick="togglePassword()">Show/Hide</button>
    </p>

    <p><span class="label">Image:</span><br>
        <?php if (!empty($user['image'])): ?>
            <img src="<?php echo htmlspecialchars($user['image']); ?>" alt="Profile Image">
        <?php else: ?>
            No image uploaded
        <?php endif; ?>
    </p>

    <p><span class="label">Date of Birth:</span> <?php echo htmlspecialchars($user['dob']); ?></p>

    <p><span class="label">Phone:</span> <a href="tel:<?php echo htmlspecialchars($user['phone']); ?>"><?php echo htmlspecialchars($user['phone']); ?></a></p>

    <p><span class="label">Intro Video:</span><br>
        <?php if (!empty($user['intro_video'])): ?>
            <video width="300" controls>
                <source src="<?php echo htmlspecialchars($user['intro_video']); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php else: ?>
            No intro video
        <?php endif; ?>
    </p>

    <p><span class="label">Favorite Video:</span><br>
        <?php
        // Display favorite video as embedded iframe or raw HTML stored in DB
        echo $user['fav_video']; 
        ?>
    </p>

    <p><span class="label">Bio:</span></p>
    <div class="bio-box"><?php echo nl2br(htmlspecialchars($user['bio'])); ?></div>

    <p><span class="label">Profile Color:</span>
        <span style="display:inline-block;width:30px;height:20px;background:<?php echo htmlspecialchars($user['profile_color']); ?>;border:1px solid #999;"></span>
    </p>
</div>

<script>
function togglePassword() {
    const passInput = document.getElementById('pass');
    if (passInput.type === 'password') {
        passInput.type = 'text';
    } else {
        passInput.type = 'password';
    }
}
</script>

</body>
</html>
