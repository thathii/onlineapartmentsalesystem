<?php
include("main-header.php");
include("db.php");

if(!isset($_SESSION['user_id'])){
    echo '
<div style="min-height: 75vh; display: flex; justify-content: center; align-items: center" class="container">
    <div class="alert alert-danger" role="alert">
     <h4 class="alert-heading">Cannot Access!</h4>
    <p>First you should Login</p>
  <hr>
  <p class="mb-0">If you haven\'t an account please signup </p>
    </div>

</div>
';
    exit();

}
    // $conn = new mysqli($servername, $username, $password, $database);


    $userid = $_SESSION['user_id'];

    $no_bed = "";
    $no_bathrooms = "";
    $price = "";
    $city = "";

    $errorMessage = "";
    $successMessage = "";
    $errorMessage1 = "";
    $errorMessage2 = "";
    $errorMessage3 = "";

    function generate_R_id(){
        $id = mt_rand(100, 999);
        return $id;
    }

    //check the request method of the form is POST
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $no_bed = $_POST["no_bed"];
        $no_bathrooms = $_POST["no_bathrooms"];
        $price = $_POST["price"];
        $city = $_POST["city"];

        //do while operation
        do {
            //check for any of the input fields are empty
            if(empty($no_bed) || empty($no_bathrooms) || empty($price) || empty($city)) {
                $errorMessage = "All the fields are required"; //error message store for the variable
                break;
            }

            //check if user input integer or not
            if(!is_numeric($no_bed) || intval($no_bed) != $no_bed){
                $errorMessage1 = "Please enter an integer";
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
              $requestid =  generate_R_id();

            // add record into the database
            $sql = "INSERT INTO request (no_bed, no_bathrooms, price, city, request_user_id, request_id)".
                    "VALUES ('$no_bed','$no_bathrooms','$price','$city','$userid','$requestid')";
            $result = mysqli_query($conn, $sql);

            //check for the query has any errors
            if(!$result){
                $errorMessage = "Invalid query ". $conn->error;
                break;
            }

            $no_bed = "";
            $no_bathrooms = "";
            $price = "";
            $city = "";

            $successMessage = "Record added successfully";

//            header("location: index.php"); //direct to
            exit;

        } while(false);
    }

?>


<!--begin of HTML code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Request</title>

    <link rel="stylesheet" href="style/request_style.css">
    <script src="script/index.js"></script>
    
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
                <!--insert image-->
                <img class="example-img"src="assets\apartment2.png">
            </div>
            <div class="sub_cont_2">
                <h2 class="H2">Request Apartment</h2>
                <hr class="HR1">

                <!--PHP code begin -->
                <?php

                    //check if this variable is not empty
                    if(!empty($errorMessage)){
                        //print the html code inside echo'' including the variable
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

                <!--insert form -->
                <form id="form" method="post" class="form1" >
                
                    <label for="bedrooms">Number of Bedrooms : </label>

                    <!--input textbox-->
                    <input id="numbed" type="text" placeholder="Enter number of bedrooms" name="no_bed" value="<?php echo $no_bed;?>" style="background-color: rgb(0, 3, 27); border: none; border-bottom: 5px solid #203289; width: 85%; color: white;" required>
                    
                    <!--PHP begin-->
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
                    ?><!--PHP end-->
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
                    <input id="Price" type="text" placeholder="Rs.########" name="price" value="<?php echo $price;?>"  style="background-color: rgb(0, 3, 27); border: none; border-bottom: 5px solid #203289; width: 85%; color: white;" required>
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
                    
                    <!--Button for request-->
                    <button type="submit" id="request" style="width: 85%; margin: 0; margin-top: 10px;">Request</button>


                </form>
            </div>
        </div>
    </div>

    <div class="large_container2">

        <div class="sub_cont2_1">
            <p class="hero_text">Checkout our <br>available apartments</p><br>
            <input type="button" href="www.google.com" value="Check Now" id="btn5">
        </div>
        <div class="sub_cont2.2">
            
        </div>
    </div>

    <center><!--center all the elemets-->
            
            <h1 class="H1">Most of our apartments have</h1><br>

            <div class="nav2">
                <!-- add buttons-->
                <button class="bttn1" type="button" id="bttn1" onclick="loadData('bttn1')">Parking area</button>
                <button class="bttn1" type="button" id="bttn2" onclick="loadData('bttn2')">Gymnasium</button>
                <button class="bttn1" type="button" id="bttn3" onclick="loadData('bttn3')">Swimming pool</button>
                <button class="bttn1" type="button" id="bttn4" onclick="loadData('bttn4')">Play area</button>
                <button class="bttn1" type="button" id="bttn5" onclick="loadData('bttn5')">Own garden area</button>
                <br>
            </div>
            <img src="assets/apartment.png" class="img1" alt="Iphone" id="image1" style="width: 600px; border-radius: 50px; margin: 20px;">
            <p class="text1" id="para">Experience the best of apartment living with our exceptional facilities. Our apartments offer a range of amenities that cater to your comfort and convenience. Enjoy the convenience of dedicated parking areas, stay fit and active in our well-equipped gymnasium, take a refreshing dip in our sparkling swimming pool, and let your little ones have a blast in our fun-filled play area. Additionally, unwind in your own private garden area, providing a tranquil space to relax and recharge. These facilities create a well-rounded living experience, promoting recreation, fitness, and social interaction within our vibrant community. Discover the perfect blend of comfort and convenience in our apartment facilities.</p>
            
    </center>  
    <!-- button for scroll top of the page-->
    <div onclick="scrollToTop()" class="scrolltop"><b>Top</b></div>
    
</body>
</html>

