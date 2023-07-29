<?php
    session_start();
?>
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <!--applied bootstrap -->

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>

    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel="stylesheet" href="style/main-header.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</head>
<body>
<div >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%; padding: 20px 50px">
    <div class='container-fluid'>
        <a class="navbar-brand" href="#">Sanctuary Logo</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target=''#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse nav-center' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
            <li class='nav-item'>
                <a class='nav-link' href='index.php'>Home</a>
            </li>
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownRequest' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Requests
                </a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdownRequest'>
                    <li><a class='dropdown-item' href='request-create.php'>Create Request</a></li>
                    <li><a class='dropdown-item' href='all-requests.php'>All Requests</a></li>

                </ul>

            </li>


            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                List your Apartments
                </a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                    <li><a class='dropdown-item' href='#'>Subscription Plan</a></li>
                    <li><a class='dropdown-item' href='new-apartment.php'>Listing Apartments</a></li>

                </ul>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='review-display.php'>Feedback</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' href='#'>Contact Us</a>
            </li>

        </ul>
            <div class="buttons">
            <?php
            if(isset($_SESSION['user_id'])){
                //if User is logged in, display logout button
                echo '
                    <a href ="Profile.php">
                    <img style="width: 30px;height: 30px;margin-right: 10px" src="assets/user.png"></a>
                    <span style="color: white; margin-right: 20px">@' . $_SESSION["user_id"] . '</span>
                    <form style="margin: 0" method="post" action="logout.php" id="logoutForm">
                    
                    <button type="submit" class="btn btn-danger btn-sm" style="display: flex" onclick="confirmLogout(event)" id="logout-btn">Logout
                    &nbsp;&nbsp;<i class="material-icons">logout</i>
                    </button>
                    
                    </form>';
            } else {
                //if User is not logged in, display login button
                echo '<a class="btn btn-warning btn-sm" style="display: flex" href="login.php" id="login-btn">
                        <i class="material-icons">login</i>&nbsp;&nbsp;
                        Login</a>';
            }
            ?>
            </div>
        </div>
    </div>

</nav>
</div>
</body>
</html>

<script>
    function confirmLogout(event) {
        event.preventDefault();
       
        if (confirm('Are you sure you want to log out?')) {
            document.getElementById('logoutForm').submit();
        }
    }
</script>



