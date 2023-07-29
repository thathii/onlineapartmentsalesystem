<?php
include ("db.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/request2_styles.css">
    <!--applied bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <!--applied bootstrap -->
    <?php include("main-header.php"); ?>
    <!--end of the navigation bar -->

    <!--begin of content-->
    <div class="body_section">
        <div class="cont_1">
            <h1 class="H1">Summary of your requests</h1><br>
        </div>
    
        <div class="large_cont">
        
            <div class="table_cont" style="margin-top: 30px;">

                <!--insert table -->
                <table>
                    <tr class="tr1">
                        <th class="TH">User ID</th>
                        <th class="TH">Request ID</th>
                        <th class="TH">Number of bedrooms</th>
                        <th class="TH">Number of bathrooms</th>
                        <th class="TH">Price range</th>
                        <th class="TH">Location</th>
                        <th class="TH">Options</th>

                    </tr>

                    <!--begin of PHP-->
                    <?php
                        include("db.php");
                        // $servername = "localhost";
                        // $username = "root";
                        // $password = "";
                        // $database = "request";

                        // //create connection
                        // $connection = new mysqli($servername, $username, $password, $database);

                        // //check connection
                        // if($connection->connect_error){
                        //     die("Connection failed: ". $connection->connect_error);
                        // }

                        //read all row from database table
                        $sql = "SELECT * FROM request where  request_user_id like '".$_SESSION['user_id']."'";
                        $result = mysqli_query($conn, $sql);

                        if(!$result){
                            die("Invalid query: ". $conn->error);
                        }

                        //read data of each row
                        while($row = $result->fetch_assoc()){
                            echo "<tr class='tr2'>
                            <td class='TD'>    </td>
                            <td class='TD'>{$row['request_id']}</td>
                            <td class='TD'>{$row['no_bed']}</td>
                            <td class='TD'>{$row['no_bathrooms']}</td>
                            <td class='TD'>{$row['price']}</td>
                            <td class='TD'>{$row['city']}</td>
                            <td class='TD'>
                           
                                <a  href='request-edit.php?edit_id={$row['request_id']}'><button class='btn btn-sm btn-info' id='btn2'>Edit</button></a>
                                <a href='request-delete.php?delete_id={$row['request_id']}'><button class='btn btn-sm btn-danger' id='btn3'>Delete</button></a>
                            </td>
                            
                            </tr>";

                            }
                    ?>

                    
                </table>
            </div>
            
            
        </div>



    </div>
    

    
</body>
<script>

    function confirmDelete() {
        return confirm("Are you sure you want to delete this request?");
    }


</script>
</html>
<!--<a  href='request-edit.php?edit_id={$row['request_id']}'><button class='btn btn-sm btn-info' id='btn2'>Edit</button></a>-->
<!--//                            <form style='margin: 0;padding:0;' method='post' action=''>-->
<!--    //                                <input type='hidden' name='delete_request_id' value='{$row['request_id']}'>-->
<!--    //                                <button type='submit' onclick='return confirmDelete()' class='btn btn-sm btn-danger mx-3'>Delete</button>-->
<!--    //                            </form> -->
