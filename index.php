<?php 
session_start();

if(isset($_SESSION['message'])){
     echo "<p style='color: green; font-weight: bold;'>" . $_SESSION['message'] . "</p>";
   unset($_SESSION['message']);
}

if(isset($_SESSION['changed'])){
     echo "<p style='color: green; font-weight: bold;'>" . $_SESSION['changed'] . "</p>";
   unset($_SESSION['changed']);
}


require_once("header.php");  // for header ?>
<div class="main">   
  <?php require_once("sidebar.php");  // for sidebar ?>
  <div class="content">
    <h2>Technical and Managerial Tutorials</h2>
    
    <div class="button-container">
      <a href="user_list.php" class="add-user-btn">Add User</a>
    </div>
    <?php


require_once('db.php');

$sql = "SELECT * FROM members ORDER BY id DESC";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    echo "<table class='user-table'>";
    echo "<thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
          </thead>";
    echo "<tbody>";
     while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        if(!empty($row['image'])) {
            echo "<td><img src='" .htmlspecialchars($row['image']) . "' width='100' height='100'></td>"; } 
        else{ 
            
            echo "<td><img src='path/to/default_no_image.png' width='100' height='100' alt='No Image'></td>";
}
        
     echo "<td>
     <a href='edit_user.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a>
         </td>";
      echo "<td>
      <a href='delete_user.php?id=" . $row['id'] . "' class='btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
    </td>";
        echo "</tr>";
    }
     echo "</tbody>
     </table>";
     }
     else {
      echo "<p>No data found.</p>";
    }
     ?>
  </div>
</div>

<?php require_once("footer.php"); ?>
