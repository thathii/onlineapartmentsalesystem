<?php
include ("db.php");
include ("main-header.php");
echo '<head>
<link rel="stylesheet" href="style/result-pages.css" ">
</head>';


// Handle form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $telephonenumber = $_POST['telephonenumber'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $createpassword = $_POST['password'];
    $confirmpassword = $_POST['confpassword'];
    if($createpassword<>$confirmpassword){
        echo "<div class='result-body'>
            <div class='alert alert-danger' role='alert'>
              <h4 class='alert-heading'>Error!</h4>
              <p>Password is not matching</p>
              <hr>
              <p class='mb-0'>If you want to signin , Go back and check password</p>
            </div>
          </div>";
    }else{
        $SQL = "INSERT INTO user (`user_id`,`first_name`,`last_name`,`email`,`password`,`telephone`,`status`) VALUES
    ('" . $username . "','" . $firstname . "','" . $lastname . "','" . $email . "','" . $createpassword . "','" . $telephonenumber . "','c')";
        try {
            if (mysqli_query($conn, $SQL)) {
                echo "<div class='result-body'>
            <div class='alert alert-success' role='alert'>
              <h4 class='alert-heading'>Success!</h4>
              <p>You  registered in here, Now you can login</p>
              <hr>
              <p class='mb-0'>Post your requests and list your apartments</p>
            </div>
          </div>";

            }
        }catch (Exception $e) {
            echo "<div class='result-body'>
                  <div class='alert alert-danger' role='alert'>
                      <h4 class='alert-heading'>Error!</h4>
                      <p>User name or email is already used</p>
                      <hr>
                      <p class='mb-0'>Double check your email and username</p>
                  </div>
               </div>";
        }
    }
    // Close the database connection
    $conn->close();
}
