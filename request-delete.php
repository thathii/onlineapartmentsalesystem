<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "request";
    
    // // Create connection
    // $connection = new mysqli($servername, $username, $password, $database);
    
    include ("db.php");

    if(isset($_GET['delete_id'])){
        $request_id = $_GET['delete_id'];

        $sql = "DELETE from request WHERE request_id = $request_id";
        $result = mysqli_query($conn, $sql);
        echo "$result";
        if($result){
           header("location: my-requests.php");
        }else{
            die("Invalid query: ". $conn->error);
        }
        
    }
?>
