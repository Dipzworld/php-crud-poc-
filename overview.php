first we make 3-4 separae files for header ,footer ,sidebar and one is the main curl_multi_getcontent
like this -->
<?php require_once("header.php");  // for header ?>

then create a button with anchor tag 
<div class="button-container">
  <a href="user_list.php" class="add-user-btn">Add User</a>
</div>
so that when we click this go to next Page

then on next page we created a form 
    <form action="submit.php" method="POST" enctype="multipart/form-data" class="my-form" > 
 then go to submit.php file