<?php 
    include("main-header.php");
    include("db.php");

   
    
    if(isset($_POST['new-appointment_date']) && ($_POST['new-appointment_time'])){

        $app_id = $_POST['update_appointment_id'];
        $new_date = $_POST['new-appointment_date'];
        $new_time = $_POST['new-appointment_time'];

        

        $update_SQL = "UPDATE `appointment` SET date = '$new_date', time = '$new_time' WHERE appointment_id = '$app_id'";

        $exe = mysqli_query($conn, $update_SQL);

        if($exe){
            //header ("my-appointments.php");
            exit();
        }else{
            echo 'query_error: ' . mysqli_error($conn);
            exit();
        }
    }

//}





    echo
        "<div style='height: 50vh;height: 100%;display: flex; justify-content: center;align-items: center;'>
            <div class='container' style=' width: 60%; height: auto; padding: 50px 30px; border: 1px solid black;border-radius: 30px'>
                <h1>Edit your Appointment</h1>
                <hr>
                <form   method='post' action=''>
                    <input type='hidden' name='update_appointment_id' value=".$_POST['update_appointment_id'].">
                    <label  for='new-appointment-date'>Select Date For Appointment</label>
                    <input id='new-appointment-date' name='new-appointment_date' class='form-control my-3' required type='date'>
                    <label  for='new-appointment-time'>Select Time For Appointment</label>
                    <input id='new-appointment-time' name='new-appointment_time' class='form-control my-3' required type='time'>
                    <button class='btn btn-primary' type='submit'>Add Appointment</button>
                </form>
            </div>
        </div>

        <h1>




        </h1>
        </body>";













?>