<?php
    include 'db.php';
    include 'main-header.php';
    //$id = $_SESSION['user_id'];

    if (isset($_GET['updateid'])) {
        $id = $_GET['updateid'];
        
    //     $sql = "SELECT * FROM `review` WHERE review_id = $id";

    //     $result = mysqli_query($conn, $sql);

    //     if ($result && mysqli_num_rows($result) > 0) {
    //         $row = mysqli_fetch_assoc($result);
    //         $description = $row['description'];
    //         $userid = $row['name'];
    //     } else {
    //         die("Review ID not found.");
    //     }
    // } else {
    //     die("No review ID provided.");
    }

    if (isset($_POST['Submit'])) {
        $reviews = $_POST['reviews'];
        $name = $_POST['name'];
       
        $sql = "UPDATE `review` SET  description = '$reviews', name = '$name' WHERE review_id = $id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('http://localhost/sanctuary/review-display.php');
            exit();
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
    <script src="review.js"></script>
</head>
<body>
    <h1>ADD A REVIEW</h1>

    <div class="bar" style="width: 50%; height: 500px;">
        <form method="POST">
            <p class="name">Name:</p>
            <input type="text" name="name" class="box1" style="width: 75%; height: 50px" autocomplete="off" value="<?php echo $userid ?? ''; ?>">

            <p class="rw">Add a Review:</p>
            <input type="text" name="reviews" class="box2" style="width: 75%; height: 75px" autocomplete="off" value="<?php echo $description ?? ''; ?>">

            <input type="submit" name="Submit" onclick="alertbox()" value="Update" class="val">

            <p class="add"></p>
        </form>
    </div>
</body>
</html>
