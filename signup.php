

<?php
include ("main-header.php")
?>

<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/result-pages.css">

</head>
<body>
<div class="signup-container">
    <h1>Welcome!</h1>
    <hr><br>
    <form method = "POST" action = "signup-result.php" >
            <label for="firstname">First Name:<br></label>
            <input style="width: 100%" type="text" class="input-box" id="firstname" name="firstname" required><br>
            
            <label for="lastname">Last Name:<br></label>
            <input style="width: 100%" type="text" class="input-box" id="lastname" name="lastname" required><br>
            
            <label for="telephonenumber">Telephone Number:<br></label>
            <input style="width: 100%"type="tel" class="input-box" id="telephonenumber" name="telephonenumber" required><br><br>

            <label for="username">Username: <br></label>
            <input style="width: 100%" type="text" class="input-box" placeholder="username" id="username" name="username" required><br>

            <label for="email">Email Address:<br></label>
            <input style="width: 100%" type="email" class="input-box" id="email" name="email" required><br><br>

            <label for="createpassword">Create Password:<br></label>
            <input style="width: 100%" type="password" class="input-box" id="password" name="password" required><br>

            <label for="confirmpassword">Confirm Password:<br></label>
            <input style="width: 100%" type="password" class="input-box" id="password" name="confpassword" required><br>
        <div class="checkbox">
            <input  type="checkbox" id="agree">I agree the terms and conditions and the privacy policies
        </div>

        <br>
      <button style="width: 100%" type="submit" class="button1">Sign Up</button>
      <div class="p1">
        <p> OR </p>
      </div>
      <div class="p2">
        <p>I Have An Account </p>
      </div>

    </form>
    <button onclick = "window.location.href='login.php';" style="width: 100%" href="#" type="submit" class="button">Login</button>
  </div>
</body>
</html>

  

