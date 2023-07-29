<?php
include ("main-header.php");
include ("db.php");


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Apartments</title>

    <link rel="stylesheet" href="style/index.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>


</head>
<body>
<div class="search-body">
    <div class="search-bar-background bg-dark">
        <form class='d-flex' method=post action=index.php>
            <div class='search-bar'>
                    <input class='form-control me-2 search-input' type='search' name='search' placeholder='Search' aria-label='Search'>
                    <button class='btn btn-outline-light ' type='submit'>Search </button>

            </div>
        </form>
    </div>
    <div class="result-main-outer">
        <div class="col-2 result-filter bg-dark">
            <?php
            if(isset($_SESSION['user_id'])){
                echo "
                <div class='filter-buttons'>
                <a  class='btn btn-warning filter-btn' href='my-apartments.php'>My Apartments</a>
                <a  class='btn btn-warning filter-btn' href='my-requests.php'>MY Requests</a>
                <a  class='btn btn-warning filter-btn' href='my-appointments.php'>My Appointments</a>
                
                </div>
                ";
            }else{
                echo "
                <div class='filter-buttons'>
                <p style='color: white; padding:20px; text-align: center'>These features are available after you log into the system <br> <br>
                    <i style='font-size: 50px;' class='material-icons'>error</i>
                </p>
                </div>
                ";
            }
            ?>

        </div>
        <div class="col-10 container overflow-auto result-list" >
            <div style="display: flex;width: 100%;justify-content: center;padding-top: 20px">
                <div>

            <?php
            // load results according to the search query
            if(isset($_POST['search']) && trim($_POST['search'])){
                $SQL="select * from apartment WHERE title LIKE '%".trim($_POST['search'])."%' or district LIKE '%".trim($_POST['search'])."%' or city LIKE '%".trim($_POST['search'])."%'";
            }else {
                $SQL="select * from apartment";
            }
            //run SQL query for connected DB or exit and display error message
            $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

            if(mysqli_num_rows($exeSQL)>0){
                echo"    <div class='alert alert-success shadow' role='alert'>
                           ".mysqli_num_rows($exeSQL)." results found!
       
                            </div>";

                while ($arrayp = mysqli_fetch_array($exeSQL)) {
                    echo "<div class='apartment-card rounded mb-4'>
                                <div class='row '>
                                    <div class='col-4'>
                                        <img class='apartment-img' src='https://www.rent.com/blog/wp-content/uploads/2021/08/25losangeles.jpg' alt=''>
                                    </div>
                                    <div class='col-4'>
                                        
                                        <h3 id='title'>" . $arrayp['title'] . "</h3>
                                        <span></span>
                                        <span id='bedroom'>x" . $arrayp['no_bed'] . " bedrooms</span>
                                        <br>
                                        <span id='bathroom'>x" . $arrayp['no_bathrooms'] . " Bathrooms</span><br>
                                        <span id='size'>" . $arrayp['size'] . " square feets</span><br>
                                        <span style='font-weight: bold' id='district'>" . $arrayp['district'] . " District</span>, <span style='font-weight: bold'  id='city'>" . $arrayp['city'] . "</span><br>
                             
                             
                                    </div>
                                    <div class='col-4 card-right'>
                                        <div>
                                            <span class='discount' id='discount-price'>Rs : " . $arrayp['price'] * 0.98 . "</span><br>
                                            <span class='actual-price' id='actual-price'>Rs : " . $arrayp['price'] . "</span>
                                             <br><br>
                                        </div>
                                        <button style='width: 100%' class='btn btn-primary btn-sm mb-2'>View Details</button>
                                        
                                        <form  style='margin: 0; padding:0;' class='d-flex' method='post' action='add-apoinment.php'>
                                        
                                        <input type='hidden'  name='apartment_id' id='apartment-id' value='".$arrayp['apartment_id']."'  >
                                        <button type='submit' style='width: 100%' class='btn btn-outline-primary btn-sm'>Add apoinment</button>
                                        
                                        </form>  
                                    </div>
                              
                                </div>
                            </div>";
                }
            }else{
                echo "<div class='alert alert-danger shadow' role='alert'>
                        There are no result founded!
                      </div>";
            }

            ?>
                </div>
            </div>

        </div>
    </div>
</div>





</body>
</html>
<?php
include ("footer.php");
?>
