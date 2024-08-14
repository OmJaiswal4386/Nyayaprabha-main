<?php
include('includes/config.php');
error_reporting(0);
$msg = '';

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactno = $_POST['contactno'];
    $status = 1;
    $registration_allowed = true; // Flag to indicate whether registration is allowed

    // Server-side validation
    if (empty($fullname) || empty($email) || empty($password) || empty($contactno)) {
        $msg = "All fields are required.";
        $registration_allowed = false; // Set flag to false if any field is empty
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format.";
        $registration_allowed = false; // Set flag to false if email format is invalid
    } elseif (!preg_match('/^[0-9]{10}$/', $contactno)) {
        $msg = "Contact number must be a 10-digit number.";
        $registration_allowed = false; // Set flag to false if contact number is invalid
    }

    // Proceed with registration only if all validations pass
    if ($registration_allowed) {
        // Hash the password
        $password = md5($password);

        // Insert into database
        $query = mysqli_query($bd, "INSERT INTO users(fullName, userEmail, password, contactNo, status) VALUES ('$fullname','$email','$password','$contactno','$status')");
        if ($query) {
            $msg = "Registration successful. You can now login!";
        } else {
            $msg = "Error: Registration failed. Please try again.";
        }
    } else {
        // If registration is not allowed, set $msg accordingly
        $msg = "Registration failed due to validation errors. Please check your input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Nyayaprabha | User Registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function (data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () { }
            });
        }
    </script>
</head>

<body>
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="post">
                <h2 class="form-login-heading">User Registration</h2>
                <p style="padding-left: 1%; color: green">
                    <?php if ($msg) {
                        echo htmlentities($msg);
                    } ?>
                </p>
                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
                    <br>
                    <input type="email" class="form-control" placeholder="Email" id="email" onBlur="userAvailability()" name="email" required="required">
                    <span id="user-availability-status1" style="font-size:12px;"></span>
                    <br>
                    <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br>
                    <input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact no" required="required" autofocus>
                    <br>
                    <button class="btn btn-theme btn-block" type="submit" name="submit" id="submit"><i class="fa fa-user" aria-hidden="true"></i> Register</button>
                    <hr>
                    <div class="registration">
                        Already Registered<br />
                        <a class="" href="index.php">Sign in</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("https://storage.needpix.com/rsynced_images/violence-against-women-4209778_1280.jpg", { speed: 500 });
    </script>
</body>

</html>
