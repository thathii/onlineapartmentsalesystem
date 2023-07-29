
<?php
include ("db.php");
include ("main-header.php");

if(isset($_POST['username']) && trim($_POST['username'])){
    $SQL="select  user_id, email , password from user where email like '".trim($_POST['username'])."'";
    $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

    if ($row = mysqli_fetch_assoc($exeSQL)) {
        $user = $row['email'];
        $pw = $row['password'];
        if(trim($_POST['password'])!=$pw){
            echo '<script>alert("Password is wrong . Check it!")</script>';
        }else{
            $userid = $row['user_id'];
            $_SESSION['user_id'] = $userid;
            header("Location: index.php");
            exit();
        }

    } else {
        echo '<script>alert("There is no user.. Try again!")</script>';
    }



}else{

}


?>




<html>
<head>
<link rel="stylesheet" href="style/login.css" ">
</head>
<body>
<div class="login-container">
    <h1>Welcome!</h1>
    <hr><br>
    <form style="form-style" action="login.php" method="POST">
      <label  for="username">Email:</label><br>
      <input style="width: 100%" type="text" id="username" name="username" required>
        <br>
      <label for="password">Password:</label> <br>
      <input style="width: 100%" type="password" id="password" name="password" required> <br>
        <a href="#">Forget Password</a>
      <button style="width: 100%" type="submit">Login</button>
          <div class="p1">
            <p> OR </p>
          </div>
          <div class="p2">
            <p>If You Don't Have An Account Signup Here</p>
          </div>

    </form>
    <button style="width: 100%;" onclick = "window.location.href='Signup.php';" type="submit" class="button1">Sign Up</button>
  </div>
  </body>
  </html>

  
