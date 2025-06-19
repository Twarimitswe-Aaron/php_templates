<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
 $propertyid=$_POST['propertyid'];
 $landsubtype=$_POST['landsubtype'];
 $fpname=$_POST['fpname'];
 $fpidtype=$_POST['fpidtype'];
  $fpidnumber=$_POST['fpidnumber'];
 $fpmobnumber=$_POST['fpmobnumber'];
  $fpaddress=$_POST['fpaddress'];
 $spname=$_POST['spname'];
 $spidtype=$_POST['spidtype'];
  $spidnumber=$_POST['spidnumber'];
 $spmobnumber=$_POST['spmobnumber'];
  $spaddress=$_POST['spaddress'];
 $landarea=$_POST['landarea'];
 $fwitname=$_POST['fwitname'];
 $fwitidtype=$_POST['fwitidtype'];
 $fwitidnumber=$_POST['fwitidnumber'];
 $fwitmobnumber=$_POST['fwitmobnumber'];
  $switname=$_POST['secwitname'];
 $switidtype=$_POST['fwitidtype'];
 $switidnumber=$_POST['switidnumber'];
 $switmobnumber=$_POST['switmobnumber'];


 $query=mysqli_query($con,"update tblproperty set PropertyID='$propertyid',LandSubtype='$landsubtype',FirstPartyname='$fpname',FPIDType='$fpidtype',FPIDNumber='$fpidnumber',FPMobilenumber='$fpmobnumber',FPAddress='$fpaddress',SPName='$spname',SPIDType='$spidtype',SPIDNumber='$spidnumber',SPMobilenumber='$spmobnumber',SPAddress='$spaddress',Landarea='$landarea',firstwitnessname='$fwitname',fwitidtype='$fwitidtype',fwitidnumber='$fwitidnumber',fwitmobnumber='$fwitmobnumber',switname='$switname',switidtype='$switidtype',switidnumber='$switidnumber',switmobnumber='$switmobnumber' where ID='$eid'");

    if ($query) {
    echo '<script>alert("Propert details has been updated.")</script>';
echo "<script>window.location.href ='manage-property.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

 } 


?>

<!doctype html>
<html lang="en">

 
<head>
    
    <title>Land Record System || Land/Property Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       
         <?php include_once('includes/header.php');?>
       
       <?php include_once('includes/sidebar.php');?>
       
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Land/Property Details</h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page">Land/Property Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Land/Property Details</h5>
                                <div class="card-body">
                                    <form  method="post" enctype="multipart/form-data">
                                        <?php
                                        $eid=$_GET['editid'];
$ret=mysqli_query($con,"select tblproperty.ID as pid,tblproperty.PropertyNumber,tblproperty.PropertyID,tblproperty.LandSubtype,tblproperty.FirstPartyname,tblproperty.FPIDType,tblproperty.FPIDNumber,tblproperty.FPMobilenumber,tblproperty.FPAddress,tblproperty.SPName,tblproperty.SPIDType,tblproperty.SPIDNumber,tblproperty.SPMobilenumber,tblproperty.SPAddress,tblproperty.Landarea,tblproperty.firstwitnessname,tblproperty.fwitidtype,tblproperty.fwitidnumber,tblproperty.fwitmobnumber,tblproperty.switname,tblproperty.switidtype,tblproperty.switidnumber,tblproperty.switmobnumber,tblproperty.fpartypic,tblproperty.secpartypic,tblproperty.landmappic,tblproperty.landfirstpic,tblproperty.landsecpic,tblproperty.fwitpic,tblproperty.secwitpic,tblpropertytype.PropertType,tblpropertytype.ID from tblproperty join tblpropertytype on tblpropertytype.ID=tblproperty.PropertyID where tblproperty.ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table class="table table-bordered">
    <tr>
        <th>Land/ Property Number</th>
        <td colspan="3"><?php echo $row['PropertyNumber'];?></td>
    </tr>

    <tr>
        <th>Land/Property Type</th>
        <td colspan="3"><?php echo $row['PropertType'];?></td>
    </tr>
    <tr>
        <th>Land Subtype</th>
        <td colspan="3"><?php echo $row['LandSubtype'];?></td>
    </tr>

<tr>
    <th colspan="2" style="color:blue; font-size:18px;">First Party Details</th>
    <th colspan="2" style="color:blue; font-size:18px;">Second  Party Details</th>
</tr>
<tr>
    <th>Name</th>
    <td><?php echo $row['FirstPartyname'];?></td>
    <th>Name</th>
    <td><?php echo $row['SPName'];?></td>
</tr>

<tr>
    <th>Photo</th>
    <td><img src="firstpartypic/<?php echo $row['fpartypic'];?>" width="150" height="100" value="<?php  echo $row['fpartypic'];?>"></td>
    <th>Photo</th>
    <td><img src="secpartypic/<?php echo $row['secpartypic'];?>" width="150" height="100" value="<?php  echo $row['secpartypic'];?>"></td>
</tr>

<tr>
    <th>ID Type</th>
    <td><?php echo $row['FPIDType'];?></td>
    <th>ID Type</th>
    <td><?php echo $row['SPIDType'];?></td>
</tr>

<tr>
    <th>ID Number</th>
    <td><?php echo $row['FPIDNumber'];?></td>
    <th>ID Number</th>
    <td><?php echo $row['SPIDNumber'];?></td>
</tr>

<tr>
    <th>Mobile Number</th>
    <td><?php echo $row['FPMobilenumber'];?></td>
    <th>Mobile Number</th>
    <td><?php echo $row['SPMobilenumber'];?></td>
</tr>

<tr>
    <th>Address</th>
    <td><?php echo $row['FPAddress'];?></td>
    <th>Address</th>
    <td><?php echo $row['SPAddress'];?></td>
</tr>


<tr>
    <th colspan="4" style="color:blue; font-size:18px;">Land Details</th>
</tr>

<tr>
    <th>Land Area</th>
    <td colspan="3"><?php echo $row['Landarea'];?></td>
</tr>


<tr>
    <th>Land Map</th>
    <td colspan="3">  <img src="landmapimages/<?php echo $row['landmappic'];?>" width="200" height="150" value="<?php  echo $row['landmappic'];?>"></td>
</tr>


<tr>
    <th>Land Photo First</th>
    <td>   <img src="landfimages/<?php echo $row['landfirstpic'];?>" width="200" height="150" value="<?php  echo $row['landfirstpic'];?>"></td>

    <th>Land Photo Second</th>
    <td>   <img src="landsecimages/<?php echo $row['landsecpic'];?>" width="200" height="150" value="<?php  echo $row['landsecpic'];?>"></td>
</tr>


<tr>
    <th colspan="2" style="color:blue; font-size:18px;">Witness First</th>
    <th colspan="2" style="color:blue; font-size:18px;">Witness Second</th>
</tr>
<tr>
    <th>Name</th>
    <td><?php echo $row['firstwitnessname'];?></td>
    <th>Name</th>
    <td><?php echo $row['switname'];?></td>
</tr>


<tr>
    <th>Photo</th>
    <td> <img src="firstwitnessimages/<?php echo $row['fwitpic'];?>" width="150" height="100" value="<?php  echo $row['fwitpic'];?>"></td>
    <th>Photo</th>
    <td> <img src="secwitnessimages/<?php echo $row['secwitpic'];?>" width="150" height="100" value="<?php  echo $row['secwitpic'];?>"></td>
</tr>


<tr>
    <th>ID Type</th>
    <td> <?php echo $row['fwitidtype'];?></td>
    <th>ID Type</th>
    <td><?php echo $row['switidtype'];?></td>
</tr>


<tr>
    <th>ID Number</th>
    <td> <?php echo $row['fwitidnumber'];?></td>
    <th>ID Number</th>
    <td><?php echo $row['switidnumber'];?></td>
</tr>


<tr>
    <th>Mobile Number</th>
    <td> <?php echo $row['fwitmobnumber'];?></td>
    <th>Mobile Number</th>
    <td><?php echo $row['switmobnumber'];?></td>
</tr>



</table>

                                 
                                 
                                  
                                           
                                   <?php } ?>
                                   
                                    </form>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
           
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
             <?php include_once('includes/footer.php');?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/parsley/parsley.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>
 
</html>
<?php }  ?>