<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "request";

    // //create connection
    // $connection = new mysqli($servername, $username, $password, $database);
    include("db.php");
    include ("main-header.php");

    //variables
    $no_bed = "";
    $no_bathrooms = "";
    $price = "";
    $city = "";

    $errorMessage = "";
    $successMessage = "";
    $errorMessage1 = "";
    $errorMessage2 = "";
    $errorMessage3 = "";

    $request_id = $_GET['edit_id'];
    $sql="SELECT * FROM request WHERE request_id = $request_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    //assign  variables
    $no_bed = $row["no_bed"];
    $no_bathrooms = $row["no_bathrooms"];
    $price = $row["price"];
    $city = $row["city"];


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $no_bed = $_POST["no_bed"];
        $no_bathrooms = $_POST["no_bathrooms"];
        $price = $_POST["price"];
        $city = $_POST["city"];

        do {
            if(empty($no_bed) || empty($no_bathrooms) || empty($price) || empty($city)) {
                $errorMessage = "All the fields are required";
                break;
            }

            if (!is_numeric($no_bed) || intval($no_bed) != $no_bed) {
                $errorMessage1 = "Please enter a non-zero integer";
                break;
            }
            
            if(!is_numeric($no_bathrooms) || intval($no_bathrooms) != $no_bathrooms){
                $errorMessage2 = "Please enter an integer";
                break;

            }
            if(!is_numeric($price) || intval($price) != $price){
                $errorMessage3 = "Please enter an integer";
                break;

            }

            // add record into the database
            $sql = "UPDATE request SET no_bed = '$no_bed', no_bathrooms = '$no_bathrooms', price = '$price', city = '$city' WHERE request_id = '$request_id'";

            $result = mysqli_query($conn, $sql);

            if(!$result){
                $errorMessage = "Invalid query ". $connection->error;
                break;
            }

            $successMessage = "Record updated successfully";

            header("location: index.php");
            exit;

        } while(false);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Request</title>
    <link rel="stylesheet" href="style/request_style.css">
    <!--applied bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>

    <div class="large_container">
        <div class="cont_1">
            <h1 class="H1">Are you looking for an apartment?</h1><br>
            <h5 class="P1">Let's look for a fully equipped apartment that suits your requirements.</h5>
        </div>

        <div class="sub_large_container1">

            <div class="sub_cont_1">
                <img src="assets/apartment2.png">
            </div>
            <div class="sub_cont_2">
                <h2 class="H2">Request Apartment</h2>
                <hr class="HR1">

                <?php
                    if(!empty($errorMessage)){
                        echo "
                            <div class='alert_empty' role='alert' style='color: red; font-size: 20px; text-align: center;
                            padding: 4px;
                            border-radius: 5px;
                            background-color: rgb(255, 137, 137);'>
                                <strong>$errorMessage</strong>
                            </div>
                        ";
                    };
                ?>

                <form id="form" method="post" class="form1" >
                
                    <label for="bedrooms">Number of Bedrooms : </label>
                    <input id="numbed" type="text" placeholder="Enter number of bedrooms" name="no_bed" value="<?php echo $no_bed;?>" style="background-color: rgb(0, 3, 27); border: none; border-bottom: 5px solid #203289; width: 85%; color: white;" required>
                    <?php
                        if(!empty($errorMessage1)){
                            echo "
                                <div class='alert_empty' role='alert' style='color: red; font-size: 15px; text-align: left;
                                padding: 4px;
                                margin: 0;'>
                                    <strong>$errorMessage1</strong>
                                </div>
                            ";
                        };
                    ?>
                    <br><br>
                    
                    <label for="no_bathrooms">Number of Bathrooms : </label>
                    <input id="numbath" type="text" placeholder="Enter number of bathrooms" name="no_bathrooms" value="<?php echo $no_bathrooms;?>" style="background-color: rgb(0, 3, 27); border: none; border-bottom: 5px solid #203289; width: 85%; color: white;" required>
                    <?php
                        if(!empty($errorMessage2)){
                            echo "
                                <div class='alert_empty' role='alert' style='color: red; font-size: 15px; text-align: left;
                                padding: 4px;
                                margin: 0;'>
                                    <strong>$errorMessage2</strong>
                                </div>
                            ";
                        };
                    ?>
                    <br><br>
                    
                    <label for="price">Expected Price : </label><br>
                    <input id="Price" type="text" placeholder="Rs.########" name="price" value="<?php echo $price;?>" style="background-color: rgb(0, 3, 27); border: none; border-bottom: 5px solid #203289; width: 85%; color: white;" required>
                    <?php
                        if(!empty($errorMessage3)){
                            echo "
                                <div class='alert_empty' role='alert' style='color: red; font-size: 15px; text-align: left;
                                padding: 4px;
                                margin: 0;'>
                                    <strong>$errorMessage3</strong>
                                </div>
                            ";
                        };
                    ?>
                    <br><br>

                    <label for="city">Location : </label><br>
                    <input id="City" type="text" placeholder="Enter here" name="city" value="<?php echo $city;?>" style="background-color: rgb(0, 3, 27); border: none; border-bottom: 5px solid #203289; width: 85%; color: white;" required>
                    <br><br>

                    

                    <?php
                        if(!empty($successMessage)){
                            echo "
                                <div class='alert_success' role='alert' style='color: green; font-size: 20px; text-align: center;
                                padding: 4px;
                                border-radius: 5px;
                                background-color: rgb(105, 255, 105);'>
                                    <strong>$successMessage</strong>
                                </div>
                            ";
                        };
                    ?>
                    
                    <button type="submit" id="request" style="width: 85%; margin: 0; margin-top: 10px;">Update</button>


                </form>
            </div>
        </div>
    </div>

    
    
</body>
</html>
