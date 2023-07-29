
<?php

require_once 'db.php';

session_start();

if (isset($_POST['submit_button'])) {
    
    $user_ID = $_SESSION['user_id'];

    $new_password = $_POST['new_password'];

    $SQL = "UPDATE user SET password = '$new_password' WHERE user_id = '$user_ID';";

    $stmt = $conn->prepare($SQL);

    if ($stmt->execute()) 
    {
        header("Location: index.php?message=User updated successfully.&success=1");

        exit;

    } else 
    {
        header("Location: index.php?message=Failed to update user. Please try again.&success=0");

        exit;
    }

    // Close the statement and database connection
    $stmt->close();
    
    $conn->close();
}


?>