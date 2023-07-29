<?php
include ('main-header.php');
include ('db.php');
include('db.php');

$sql = "SELECT * FROM request ";
$result = mysqli_query($conn, $sql);
echo    "<div style='padding: 30px 50px' >
<div class='row my-4 mx-4' >";
while ($row = $result->fetch_assoc()){
    echo "
<div class='card my-4 mx-4' style='width: 18rem;'>
  <div class='card-body'>
    <h5 class='card-title'>{$row['city']}</h5>
    <div class='card-text'>
                    <ul>
                        <li>Number of Bedrooms : {$row['no_bed']}</li>
                        <li>Number of Bathrooms : {$row['no_bathrooms']}</li>
                        <li>Price : {$row['price']}</li>

                    </ul>

                </div>
    <a href='#' class='btn btn-primary'>More Details...</a>
  </div>
</div>
    ";


}
echo '</div></div>'

?>


