<?php
    
    include 'db.php';
    include 'main-header.php';
    function generate_review_id(){
        $id = mt_rand(100, 999);
        return $id;
    }

    if (isset($_POST['Submit'])) {
        $id = generate_review_id();
        $name = $_POST['name'];
        $reviews = $_POST['reviews'];
        $userid = $_SESSION['user_id'];

        $sql = "INSERT INTO `review` (description, name, review_id, review_user_id)
        VALUES ('$reviews', '$name', '$id', '$userid')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            //echo "data inserted successfully";
//            header('location:review-display.php');
        } else {
            die(mysqli_error($conn));
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <link rel="stylesheet" href="style/review-review.css">
    <script src="script/review-review.js"></script>
</head>
<body>
    <h1>ADD A REVIEW </h1>

    <p class="see"><a href="review-display.php">click here to see reviews</a></p>

    <div class="bar" style="width:50%; height:500px";>
        <form class="review-form" method="POST">

            <p class="name">Name:</p>
            <input type="text" name="name" class="box1" style="width:75%; height:50px">

            <p class="rw">Add a Review:</p>
            <input type="text" name="reviews" class="box2" style="width:75%; height:75px">

            <input type="submit" name="Submit" onclick="alertbox()"value="Submit" class="val">

        </form>
    </div>
</body>
</html>
