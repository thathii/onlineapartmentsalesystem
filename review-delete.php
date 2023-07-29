<?php
    include 'db.php';
    if(isset($_GET['deleteid'])) {
        $id=$_GET['deleteid'];

        $sql = "DELETE FROM `review` WHERE `review_id` = $id";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('location:review-display.php');
        }else{
            die(mysqli_error($conn));
        }
    }
    ?>
