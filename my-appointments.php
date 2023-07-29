<?php 
include("main-header.php");
include("db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style\my-appointments.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php 
    if(isset($_POST['delete_appointment_id'])){
        $app_id = $_POST['delete_appointment_id'];

        //delete query
        $delSQL = "DELETE FROM appointment WHERE appointment_id = '$app_id'";
        
        //executing the query
        $delresult = mysqli_query($conn, $delSQL);

        //checking if the query executed
        if($delresult){
            //success message
            
        }else{
            //display error message
            echo "Couldn't delete: " .mysqli_error($conn);
            exit();
        }
    }

    





    //query for getting appointment data from database
    $SQL = "SELECT appointment_id, date, time FROM appointment where appointment_user_id like '".$_SESSION['user_id']."'";

    //executing the query
   $exSQL = mysqli_query($conn, $SQL);

   //fetch result as a array
  

    if(mysqli_num_rows($exSQL)> 0){
            echo '<br><h2 style="text-align: center">My Appointments</h2><br><hr><br>';
            echo '
                   <div style="display: flex;width: 100%;justify-content: center">
                        <div class="myapp-table">
                                <table style="width: 80vw" class="table">
                                    
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">TIME</th>
                                        <th scope="col">DATE</th>
                                        <th scope="col">UPDATE</th>
                                        <th scope="col">DELETE</th>
                                        </tr>
                                    
            ';
            while ($result = mysqli_fetch_array($exSQL)){

                    echo'
                                    <tbody>
                                        <tr>
                                        <th scope="row">'. $result['appointment_id'] .'</th>
                                        <td>'.$result['time'].'</td>
                                        <td>'.$result['date'].'</td>
                                        <td>
                                            <form style="margin: 0;padding:0;" method="post" action="update-appointment.php">
                                                <input type="hidden" name="update_appointment_id" value="'  .$result['appointment_id']. '">
                                                <button type="submit" onclick = "window.location.href=`update-appointment.php`;" class="btn btn-secondary">Update</button>
                                            
                                        </td>
                                        </form>
                                        <td>
                                            <form style="margin: 0;padding:0;" method="post" action="">
                                                <input type="hidden" name="delete_appointment_id" value="'  .$result['appointment_id']. '">
                                                <button type="submit" onclick="return delete_app()" class="btn btn-danger mx-3">Delete</button>                                               
                                        </td>
                                         </form> 
                                        </tr>
                                    </tbody>
                            
                        </div>';
            }
            echo "</table> </div>";
        }else{
            echo "<div  style='padding: 50px' class='container'>
<div class='alert alert-danger shadow' role='alert'>
                        There are no result found!
                     </div> </div>";
        }
    ?>    
</body>
<script>
    function delete_app(){
        return confirm ("Do you want to delete this appointment?")
    }
</script>
</html>
