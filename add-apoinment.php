<?php
include ("main-header.php");
include ("db.php");
$_SESSION['apartment_id'] = trim($_POST['apartment_id']);

$userid = $_SESSION['user_id'];

function generate_appointment_id(){
    $number = mt_rand(1000, 9999);
    return $number;
}

if(isset($_POST['appointment_date']) && trim($_POST['appointment_date'])&&isset($_POST['appointment_time']) && trim($_POST['appointment_time'])){

    $appointment_id = generate_appointment_id();
    
    $SQL ="INSERT INTO `appointment` ( `appointment_id`, `date`, `time`, `appointment_apartment_id`, `appointment_user_id`) VALUES ('".$appointment_id."','".$_POST['appointment_date']."','".$_POST['appointment_time']."', '".$_SESSION['apartment_id']."', '".$_SESSION['user_id']."')";

    $isOk = mysqli_query($conn, $SQL);
    if($isOk){
        echo "<div style='height:80vh;width100%;display: flex; justify-content: center;align-items: center'>
<div class='alert alert-success' role='alert'>
<h4 class='alert-heading'>successful!!</h4>
<hr>
<p>go to Home <a href='index.php'>Here</a></p>
</div></div>";
        exit();
    }else{
        echo "<div class='alert alert-error' role='alert'><h4 class='alert-heading'>unsuccessful!!</h4>
</div>";
        echo 'query_error: ' . mysqli_error($conn);
        exit();
    }

    }

?>
<head>

</head>
<body >
<?php
if(isset($_SESSION['user_id'])) {
    echo "

       
<div style='height: 50vh;height: 100%;display: flex; justify-content: center;align-items: center;'>
    <div class='container' style=' width: 60%; height: auto; padding: 50px 30px; border: 1px solid black;border-radius: 30px'>
        <h1>Add Appointment For This Apartment</h1>
        <hr>
        <form   method='post' action='add-apoinment.php'>
          <input type='hidden' name='apartment_id' id='apartment-id' value='" . trim($_POST['apartment_id']) . "'  >
            <label  for='appointment-date'>Select Date For Appointment</label>
            <input id='appointment-date' name='appointment_date' class='form-control my-3' required type='date'>
            <label  for='appointment-time'>Select Time For Appointment</label>
            <input id='appointment-time' name='appointment_time' class='form-control my-3' required type='time'>
            <button class='btn btn-primary' type='submit'>Add Appointment</button>
        </form>
    </div>
</div>

<h1>




</h1>
</body>";
}else{
    echo "<div style='height:80vh;width100%;display: flex; justify-content: center;align-items: center'>
<div class='alert alert-danger'>Please Login to the system</div></div>";
}
?>
