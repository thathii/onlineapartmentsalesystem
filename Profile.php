<?php
include("db.php");
include("main-header.php");


if (isset($_POST['oldpassword']) && trim($_POST['oldpassword'])) {

  /*$SQL="select  user_id, oldpassword, newpassword from user";
    $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

    if ($row = mysqli_fetch_assoc($exeSQL)) {
        $oldpassword = $row['oldpassword'];
        $newpassword = $row['newpassword'];
        if(trim($_POST['oldpassword'])!=$oldpassword){
            echo '<script>alert("Password is wrong. Re-enter")</script>';
        }else{
            $userid = $row['user_id'];
            $_SESSION['user_id'] = $userid;
            header("Location: index.php");
            exit();
        }

    } else {
        echo '<script>alert("There are is no user")</script>';
    }



}else{*/

  $userID = $_SESSION['user_id'];

  //$oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
  //$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);

  $new_password = $POST['newpassword'];

  echo $new_password;

  echo $userID;
}

?>


<html>

<head>
  <link rel="stylesheet" href="style/login.css">
</head>

<body>
  <div class="login-container">

    <center> <img style="width: 100px;height: 100px;margin-right: 10px" src="assets/user.png"><br>
     <?php
// Make sure to include this line at the beginning of your PHP code

if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];
    echo '<span style="color: black; margin-right: 20px">@' . $userId . '</span>';
}
?>
    </center><br><br>

    <form method="POST" action="updateProf.php">
      <div class="h3"><label>
          <h3>Change Password
        </label>
        <h3></label><br>
      </div>
      <h5><label for="old password">Old Password:<br></label>
        <input style="width: 100%" type="text" class="input-box" id="old password" name="old_password" required><br>



        <label for="new password">New Paaword:<br></label>
        <input style="width: 100%" type="text" class="input-box" id="new password" name="new_password" required><br>
      </h5></br>

      <button style="width: 100%;" type="submit" class="button2" name="submit_button">Update</button>
  </div>
  </form>

  <div class="login-container">
    <!-- FORM FOR REMOVE USERS -->
    <form onsubmit="return validateForm()" method="POST" action="delete.php">
      <label>
        <input type="checkbox" name="myCheckbox" value="1" id="myCheckbox">
        Are you sure you want to delete account?
      </label>

      <button style="width: 100%;" type="submit" class="button2" name="delete">Delete Account</button>
    </form>
  </div>

  <script>
    function validateForm() {
      var checkbox = document.getElementById("myCheckbox");
      if (!checkbox.checked) {
        alert("Please check the box to confirm");
        return false; // Prevent form submission
      }
      return true; // Allow form submission
    }
  </script>
  
  </br>
</body>

</html>