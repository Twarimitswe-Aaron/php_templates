<?php
session_start();
error_reporting(0);
include('admin/includes/dbconnection.php');
?>
<!DOCTYPE html>

<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Land Record System | View Property Details</title>
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/fontello.css">
        <link href="assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="assets/css/price-range.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css"> 
        <link rel="stylesheet" href="assets/css/wizard.css"> 
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

       
        <div class="header-connect">
            <div class="container">
                <?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> +<?php  echo $row['MobileNumber'];?></span>
                                <span><i class="pe-7s-mail"></i> <?php  echo $row['Email'];?></span>
                                 
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><?php } ?>
            </div>
        </div>        
        <!--End top header -->
    <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                   
                    <a class="navbar-brand" href="index.php"><h4 style="font-weight: bolder;">Land Record System</h4></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.open('index.php')" data-wow-delay="0.4s">Home</button>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.open('admin/login.php')" data-wow-delay="0.5s">Admin</button>
                    </div>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->


        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Property Details</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                                               
                               

                                <ul>
                                    <li><a href="#step1" data-toggle="tab">Land Details </a></li>
                                 
                                </ul><?php
                                        $vid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblproperty.ID as pid,tblproperty.PropertyNumber,tblproperty.PropertyID,tblproperty.LandSubtype,tblproperty.FirstPartyname,tblproperty.FPIDType,tblproperty.FPIDNumber,tblproperty.FPMobilenumber,tblproperty.FPAddress,tblproperty.SPName,tblproperty.SPIDType,tblproperty.SPIDNumber,tblproperty.SPMobilenumber,tblproperty.SPAddress,tblproperty.Landarea,tblproperty.firstwitnessname,tblproperty.fwitidtype,tblproperty.fwitidnumber,tblproperty.fwitmobnumber,tblproperty.switname,tblproperty.switidtype,tblproperty.switidnumber,tblproperty.switmobnumber,tblproperty.fpartypic,tblproperty.secpartypic,tblproperty.landmappic,tblproperty.landfirstpic,tblproperty.landsecpic,tblproperty.fwitpic,tblproperty.secwitpic,tblpropertytype.PropertType,tblpropertytype.ID from tblproperty join tblpropertytype on tblpropertytype.ID=tblproperty.PropertyID where tblproperty.ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="tab-content">

                                    <div class="tab-pane" id="step1">
                                        <div class="row p-b-15  ">
                                            <h4 class="info-text"> Property Details(<?php echo $row['PropertyNumber'];?>)</h4>
                                            <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                       <strong>Land Area:</strong> <?php echo $row['Landarea'];?>
                                   <br>
                                    <strong>Land Map:</strong>  <img src="admin/landmapimages/<?php echo $row['landmappic'];?>" width="200" height="150" value="admin/landmapimages/<?php echo $row['landmappic'];?>">

                                                    </div> 
                                                    <div class="picture">
                                                    
                                   <br>
                                    <strong>Land First Pic:</strong>  <img src="admin/landfimages/<?php echo $row['landfirstpic'];?>" width="200" height="150" value="admin/landfimages/<?php echo $row['landfirstpic'];?>">
                                    
                                                    </div> 
                                                    <div class="picture">
                                                    
                                   <br>
                                    <strong>Land Second Pic:</strong>  <img src="admin/landsecimages/<?php echo $row['landsecpic'];?>" width="200" height="150" value="admin/landsecimages/<?php echo $row['landsecpic'];?>">
                                    
                                                    </div> 
                                                </div>

                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                     <h4 class="s-property-title">First Party Details</h4>
                                    <div class="s-property-content">
                                        <p><strong>Name:</strong> <?php echo $row['FirstPartyname'];?>
                                        <br><strong>Photo:</strong> <img src="admin/firstpartypic/<?php echo $row['fpartypic'];?>" width="200" height="150" value="<?php  echo $row['fpartypic'];?>">
                                        <br><strong>ID Type:</strong> <?php echo $row['FPIDType'];?>
                                        <br><strong>ID Number:</strong> <?php echo $row['FPIDNumber'];?>
                                    <br><strong>Mobile Number:</strong> <?php echo $row['FPMobilenumber'];?>
                                <br><strong>Address:</strong> <?php echo $row['FPAddress'];?></p>
                                    </div>
                                                </div>

                                                <div class="form-group">
                                                     <div class="section additional-details">

                                    <h4 class="s-property-title">Second Party Details</h4>
                                    <p><strong>Name:</strong> <?php echo $row['SPName'];?>
                                        <br><strong>Photo:</strong> <img src="admin/secpartypic/<?php echo $row['secpartypic'];?>" width="200" height="150" value="<?php  echo $row['secpartypic'];?>">
                                        <br><strong>ID Type:</strong> <?php echo $row['SPIDType'];?>
                                        <br><strong>ID Number:</strong> <?php echo $row['SPIDNumber'];?>
                                    <br><strong>Mobile Number:</strong> <?php echo $row['SPMobilenumber'];?>
                                <br><strong>Address:</strong> <?php echo $row['SPAddress'];?></p>

                                  
                                </div> 
                                                </div> 
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 1 -->




                                    <!--  End step 4 -->

                                </div><?php } ?>

                              
                            
                        </div>
                      
                    </div> 
                </div>
            </div>
        </div>

     <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                                <h3>Land Record System</h3>
                                <?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <p><?php  echo $row['PageDescription'];?>.</p><?php } ?>
                                <ul class="footer-adress">
                                    <?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                    <li><i class="pe-7s-map-marker strong"> </i> <?php  echo $row['PageDescription'];?></li>
                                    <li><i class="pe-7s-mail strong"> </i> <?php  echo $row['Email'];?></li>
                                    <li><i class="pe-7s-call strong"> </i> +<?php  echo $row['MobileNumber'];?></li><?php } ?>
                                </ul>
                            </div>
                        </div>
                        
                       
                      

                    </div>
                </div>
            </div>

            <div class="footer-copy text-center">
                <div class="container">
                    <div class="row">
                        <div class="pull-left">
                            <span> Land Record System  </span> 
                        </div> 
                        
                    </div>
                </div>
            </div>

        </div>

        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="assets/js//jquery-1.10.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="assets/js/easypiechart.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/wow.js"></script>
        <script src="assets/js/icheck.min.js"></script>

        <script src="assets/js/price-range.js"></script> 
        <script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/wizard.js"></script>

        <script src="assets/js/main.js"></script>


    </body>
</html>