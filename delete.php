<?php

require_once 'db.php';

session_start();

if (isset($_POST['delete'])) {
    
    $user_ID = $_SESSION['user_id'];

    $SQL = "DELETE FROM user WHERE user_id = '$user_ID';";

    $stmt = $conn->prepare($SQL);

    if ($stmt->execute()) 
    {
       session_destroy();

       header("Location: signup.php");

        exit;

    } else 
    {
        header("Location: index.php?message=Failed to Delete user. Please try again.&success=0");

        exit;
    }

    // Close the statement and database connection
    $stmt->close();
    
    $conn->close();
}


?>