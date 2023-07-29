<?php
include ("main-header.php");
include ("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_apartment_id'])) {
    $apartmentId = $_POST['delete_apartment_id'];

    // Construct the delete query
    $deleteSQL = "DELETE FROM apartment WHERE apartment_id = '$apartmentId'";

    // Execute the delete query
    $result = mysqli_query($conn, $deleteSQL);

    // Check if the delete operation was successful
    if ($result) {
        // Redirect the user back to the original page or display a success message
//        header("Location: http://localhost/sanctuary/my-apartments.php");
//        exit();
    } else {
        // Handle the error, display an error message, or redirect to an error page
        echo "Error deleting apartment: " . mysqli_error($conn);
        exit();
    }
}

// Update apartment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_apartment_id'])) {
    $apartmentId = $_POST['update_apartment_id'];
    $newTitle = $_POST['new_title'];
    $newDescription = $_POST['new_description'];
    $newBedrooms = $_POST['new_bedrooms'];
    $newBathrooms = $_POST['new_bathrooms'];
    $newSize = $_POST['new_size'];
    $newPrice = $_POST['new_price'];

    // Construct the update query
    $updateSQL = "UPDATE apartment SET title = '$newTitle', description = '$newDescription', 
                  no_bed = '$newBedrooms', no_bathrooms = '$newBathrooms', 
                  size = '$newSize', price = '$newPrice'
                  WHERE apartment_id = '$apartmentId'";

    // Execute the update query
    $result = mysqli_query($conn, $updateSQL);

    // Check if the update operation was successful
    if ($result) {
        // Redirect the user back to the original page or display a success message
//        header("Location: http://localhost/sanctuary/my-apartments.php");
//        exit();
    } else {
        // Handle the error, display an error message, or redirect to an error page
        echo "Error updating apartment: " . mysqli_error($conn);
        exit();
    }
}

?>
<html>
<head>

</head>
<body>
<div style="margin-top: 50px" class="container">
    <?php
    $SQL="select * from apartment WHERE apartment_user_id LIKE '".$_SESSION['user_id']."'";
    $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
    if(!mysqli_num_rows($exeSQL)>0) {
        echo "<div class='alert alert-danger shadow' role='alert'>
                        There are no results founded!
                      </div>";
    }else{



      echo  '<table class="table">
            <tr>
            <th>Apartment Name</th>
            <th>Description</th>
            <th>Number of beds</th>
            <th>Number of bathrooms</th>
            <th>Size</th>
            <th>District</th>
            <th>Price</th>
                <th>Option</th>
            </tr>';
      while ($arrayp = mysqli_fetch_array($exeSQL)){
          echo '
          <tr>
          <td>' . $arrayp['title'] . '</td>
          <td>' . $arrayp['description'] . '</td>
          <td>' . $arrayp['no_bed'] . '</td>
          <td>' . $arrayp['no_bathrooms'] . '</td>
          <td>' . $arrayp['size'] . '</td>
          <td>' . $arrayp['district'] . '</td>
          <td>' . $arrayp['price'] . '</td>
          <td>
                <div style="display: flex">
                    <form style="margin: 0;padding:0;" method="post" action="">
                        <input type="hidden" name="delete_apartment_id" value="' . $arrayp['apartment_id'] . '">
                        <button type="submit" onclick="return confirmDelete()" class="btn btn-sm btn-danger mx-3">Delete</button>
                    </form> 
            
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal' . $arrayp['apartment_id'] . '">
                        Update
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal' . $arrayp['apartment_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">You can edit only these fields*</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <label>Name</label>
                                        <input type="text" name="new_title" class="form-control mb-2" placeholder="New Name" value="' . $arrayp['title'] . '">
                                        <label>Description</label>
                                        <input type="text" name="new_description" class="form-control mb-2" placeholder="New Description" value="' . $arrayp['description'] . '">
                                        <label>Number of Bedrooms</label>
                                        <input type="number" name="new_bedrooms" class="form-control mb-2" placeholder="New bed rooms" value="' . $arrayp['no_bed'] . '">
                                        <label>Number of Bathrooms</label>
                                        <input type="number" name="new_bathrooms" class="form-control mb-2" placeholder="New bed bathrooms" value="' . $arrayp['no_bathrooms'] . '">
                                        <label>Size</label>
                                        <input type="number" name="new_size" class="form-control mb-2" placeholder="New Size" value="' . $arrayp['size'] . '" >
                                        <label>Price</label>
                                        <input type="number" name="new_price" class="form-control mb-2" placeholder="New Price" value="' . $arrayp['price'] . '">
            
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="hidden" name="update_apartment_id" value="' . $arrayp['apartment_id'] . '">
                                        <button type="submit" onclick="return confirm()" class="btn btn-sm btn-info mx-3">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>

          </tr>
          
          
          ';
      }




        echo '</table>';
}
    ?>
</div>
</body>
<script>

    function confirmDelete() {
        return confirm("Are you sure you want to delete this apartment?");
    }

    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>
</html>

