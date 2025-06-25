<?php require_once("header.php");  //for header ?>
<div class="main">   
<?php require_once("sidebar.php");  //for sidebar ?>
      <div class="content">
            Technical and Managerial Tutorials
          <h2>Data Form</h2>

          
    <form action="submit.php" id="userForm"  method="POST" enctype="multipart/form-data" class="my-form" onsubmit="return validateForm()"> 
        
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

         <script>
function validateForm() {
    const title = document.getElementById("profile_title").value.trim();
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const imageInput = document.getElementById("image");
    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (!title || !name || !email || !password) {
        alert("All fields are required.");
        return false;
    }
     
    if (title.length < 3 || title.length > 50) {
    alert("Profile Title must be between 3 to 50 characters.");
    return false;
    }


    const domainAllowed = /@gmail\.com$/;
    if (!domainAllowed.test(email)) {
    alert("Only Gmail addresses are allowed.");
    return false;
}


    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        return false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }


    if (imageInput.value && !allowedExtensions.exec(imageInput.value)) {
        alert("Please upload an image file (jpg, jpeg, png, gif only).");
        imageInput.value = "" ; 
        return false;
    }

    return true;
}
</script>

  </div>
<?php

require_once("footer.php");
?>
 