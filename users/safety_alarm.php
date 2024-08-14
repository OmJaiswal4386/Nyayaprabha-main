<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{ 
    header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Nyayaprabha | Safety Alarm</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/safety-alarm.css" rel="stylesheet"> <!-- Custom CSS for safety alarm -->

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Common scripts -->
<script src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/common-scripts.js"></script>
<!-- Custom JavaScript for safety alarm -->
<script src="assets/js/safety-alarm.js"></script>

</head>

<body>

<section id="container">
    <?php include("includes/header.php");?>
    <?php include("includes/sidebar.php");?>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-bell" aria-hidden="true"></i> Safety Alarm</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <section id="safety-alarm">
                            <div class="alarm-controls">
                                <button id="start-alarm" class="btn btn-danger" ><i class="fa fa-play"></i> Start Alarm</button>
                                <button id="pause-alarm" class="btn btn-warning"><i class="fa fa-pause"></i> Pause Alarm</button>
                            </div>
                        </section>
                    </div><!-- /content-panel -->
                </div><!-- /col-lg-4 -->
            </div><!-- /row -->
        </section>
    </section>
    <?php include("includes/footer.php");?>
</section>



</body>
</html>

<?php } ?>
