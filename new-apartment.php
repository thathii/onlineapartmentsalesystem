<?php
include("main-header.php");

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Apartment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style/new-apartment.css">
</head>
<body>
<?php

if (!isset($_SESSION['user_id'])){
    // error page
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
}
else{
    // form
 echo   '<div class="container list-apartment">
        <div><p>Home/List-Your-Apartment</p></div>
            <h3 class="heading">Fill in the details</h3><br>
                <form method=post action=new-apartment-result.php>
                    <div class="section-1 rounded"><h4>Description And Title</h4><hr>
                        <div class="mb-3"><label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title Here" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="description"  name="description" rows="3" required></textarea>
                        </div>
                    </div>
     <br>
        <div class="section-2"><div class="row"><div class="col-6">
            <label for="bedrooms">Number Of Bed Rooms</label>
                <select class="form-select" aria-label="-Select-" name="bedrooms" id="bedrooms" required>
                    <option selected disabled value=">Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                        <option value="6">Six</option>
                </select>
        </div>
    <div class="col-6">
        <label for="bathroom">Number Of Bathrooms</label>
            <select class="form-select" aria-label="-Select-" name="bathrooms" id="bathroom" required>
                <option selected disabled value=">Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
            </select>
        </div>
    </div>
     <div class="row">
        <div class="col-6">
            <label for="area">Size</label>
                <input type="number" class="form-control" name="area" id="area" required >
        </div>
    </div>
    </div>

     <div class="section-3 rounded"><h4>Location </h4><hr>
     <div class="row">
        <div class="col-6">
            <label for="district">District</label>
                    <select class="form-select" aria-label=-Select-" name="district" id="district" required>
                       <option selected disabled value=">Choose...</option>
                        <option value = "colombo">Colombo </option>
                        <option value = "kaluthara">Kaluthara </option>
                        <option value = "gampaha">Gampaha </option>
                        <option value = "rathnapura">Rathnapura </option>
                        <option value = "kegalle">Kegalle </option>
                        <option value = "hambantota">Hambantota </option>
                        <option value = "galle">Galle </option>
                        <option value = "matara">Matara </option>
                        <option value = "jaffna">Jaffna </option>
                        <option value = "trincomalee">Trincomalee </option>
                        <option value = "kandy">Kandy </option>
                        <option value = "matale">Matale </option>
                        <option value = "nuwara eliya">Nuwara Eliya </option>
                        <option value = "kilinochchi">Kilinochchi </option>
                        <option value = "mannar">Mannar </option>
                        <option value = "vavuniya">Vavniya </option>
                        <option value = "mulathivu">Mulathivu </option>
                        <option value = "batticaloa">Batticaloa </option>
                        <option value = "ampara">Ampara </option>
                        <option value = "kurunegala">Kurunegala </option>
                        <option value = "puttalam">Puttalam </option>
                        <option value = "anuradhapura">Anuradhapura </option>
                        <option value = "polonnaruwa">Polonnaruwa </option>
                        <option value = "badulla">Badulla </option>
                        <option value = "moneragala">Moneragala </option>
                    </select>
                </div>
            </div>
     <div class="row">
     <div class="col-6">
                    <label for="city">City</label>
     <input type="text" class="form-control" id="city" name="city" placeholder="Enter title Here" required>
     </div>
     </div>
     </div>
     <div class="section-4 rounded">
     <h4>Price & Options</h4>
     <hr>
     <div class="row">
     <div class="col-8">
     <label for="price">Price (Rs) :</label>
                    <input type="number" name="price" class="form-control" id="price" required ></div>
       <div class="col-4">
                    <div class="form-check">
                    <br><br>
                        <input class="form-check-input" name="negotiable" type="checkbox" value=" id="negotiable">
                        <label class="form-check-label" for="negotiable">

                            negotiable
                        </label>
                    </div>
                </div>
       <div class="row">
      <div class="col-2">
                    <label for=">Physical Visit &nbsp&nbsp&nbsp&nbsp:&nbsp</label>
                </div>
      <div class="col-4">
       <div class="form-check">
                        <input class="form-check-input"  type="checkbox" name="available" id="available" >
                        <label class="form-check-label" for="available">
                            Available
                        </label>
                    </div>
     </div>
     </div>
     </div>


       </div>
       <div class="section-5 rounded">
            <label for="image">Upload Images</label>
            <input class="form-control" type="file" id="image">
        </div>
     <div class="btn-bar">
            <button class="btn btn-danger cancel-btn">Cancel</button>
            <input class="btn btn-primary submit-btn" type="Submit">

        </div>
         </form>
</div>';
}
?>








</body>
</html>
