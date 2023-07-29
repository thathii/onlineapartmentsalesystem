<?php
include("db.php");

echo '<title>Save Apartment Result</title>
      <link rel="stylesheet" href="style/new-apartment.css">';

include("main-header.php");
$title=trim($_POST['title']);
$description=trim($_POST['description']);
$bedrooms=trim($_POST['bedrooms']);
$bathroom=trim($_POST['bathrooms']);
$area=trim($_POST['area']);
$district=trim($_POST['district']);
$city=trim($_POST['city']);
$price=trim($_POST['price']);
if(isset($_POST['available'])){
    $visit= "true";
} else {
    $visit= "false";
}
$user = $_SESSION['user_id'];

function generateProductId($name) {
    $nums = "0123456789";
    $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $size = 8;
    $str = strtoupper(substr($name, 0, 3));
    $str .= substr(str_shuffle($letters), 0, $size);

    for ($i = 0; $i < 4; $i++) {
        $str .= $nums[rand(0, 9)];
    }

    return $str;
}

$apartment_id =generateProductId($district);
$SQL = "INSERT INTO apartment (`apartment_id`,`title`,`description`,`no_bed`,`no_bathrooms`,`size`,`district`,`city`,`price`,`visit`,`apartment_user_id`) VALUES 
        ('".$apartment_id."','".$title."','".$description."','".$bedrooms."','".$bathroom."','".$area."','".$district."', '".$city."', '".$price."', '".$visit."', '".$user."')";

$isOk = mysqli_query($conn,$SQL);
if($isOk){
    echo "<div  class='result-body'>
                <div class='alert alert-success' role='alert'>
                  <h4 class='alert-heading'>successful!!</h4>
                  <p>Apartment Saved Successfully</p>
                  <hr>
                  <table class='table'>
                      <tr>
                        <td>Title</td> <td>: ".$title."</td>
                      </tr>
                      <tr>
                        <td>Description</td> <td>: ".$description."</td>
                      </tr>
                      <tr>
                        <td>Number of Bedrooms</td> <td>: ".$bedrooms."</td>
                      </tr>
                      <tr>
                        <td>Number of Bedrooms</td> <td>: ".$bathroom."</td>
                      </tr>
                      <tr>
                        <td>Size</td> <td>: ".$area."</td>
                      </tr>
                      <tr>
                        <td>District</td> <td>: ".$district."</td>
                      </tr>
                      <tr>
                        <td>City</td> <td>: ".$city."</td>
                      </tr>
                       <tr>
                        <td>Price</td> <td><h2> Rs : ".$price. "</h2></td>
                      </tr>
                  </table>
                  <p class='mb-0'>To visit Home Page, Please <a href='index.php'>HomePage</a></p>
                </div>
            </div>";


}else{

    echo "<div class='result-body'>
            <div class='alert alert-danger' role='alert'>
                  <h4 class='alert-heading'>Error!</h4>
                  <p>SQL Error No: ".mysqli_errno($conn)."</p>
                  <p>SQL Error Msg: ".mysqli_error($conn)."</p>
                  <hr>
                  <p class='mb-0'>Server Error Try later!!</p>
            </div>
         </div>";
}
include("footer.php"); //include head layout
echo "</body>";


?>
