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
    
    <title>Land Record System || Edit Land/Property</title>
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
                            <h2 class="pageheader-title">Edit Land/Property </h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page">Add Land/Property</li>
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
                                <h5 class="card-header">Edit Land/Property</h5>
                                <div class="card-body">
                                    <form  method="post" enctype="multipart/form-data">
                                        <?php
                                        $eid=$_GET['editid'];
$ret=mysqli_query($con,"select tblproperty.ID as pid,tblproperty.PropertyNumber,tblproperty.PropertyID,tblproperty.LandSubtype,tblproperty.FirstPartyname,tblproperty.FPIDType,tblproperty.FPIDNumber,tblproperty.FPMobilenumber,tblproperty.FPAddress,tblproperty.SPName,tblproperty.SPIDType,tblproperty.SPIDNumber,tblproperty.SPMobilenumber,tblproperty.SPAddress,tblproperty.Landarea,tblproperty.firstwitnessname,tblproperty.fwitidtype,tblproperty.fwitidnumber,tblproperty.fwitmobnumber,tblproperty.switname,tblproperty.switidtype,tblproperty.switidnumber,tblproperty.switmobnumber,tblproperty.fpartypic,tblproperty.secpartypic,tblproperty.landmappic,tblproperty.landfirstpic,tblproperty.landsecpic,tblproperty.fwitpic,tblproperty.secwitpic,tblpropertytype.PropertType,tblpropertytype.ID from tblproperty join tblpropertytype on tblpropertytype.ID=tblproperty.PropertyID where tblproperty.ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land/Property Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select type="text" name="propertyid" id="propertyid" required="true" class="form-control">
                                                    <option value="<?php echo $row['PropertyID'];?>"><?php echo $row['PropertType'];?></option>
              <?php $query=mysqli_query($con,"select * from tblpropertytype");
              while($row1=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row1['ID'];?>"><?php echo $row1['PropertType'];?></option>
                  <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Subtype</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="landsubtype" id="landsubtype" required="true" value="<?php echo $row['LandSubtype'];?>" class="form-control">
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-6">
                                        <h4>First Party Details</h4>
                                        <hr>
                                    <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fpname" id="fpname" required="true" value="<?php echo $row['FirstPartyname'];?>" class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                               
                                                 <img src="firstpartypic/<?php echo $row['fpartypic'];?>" width="200" height="150" value="<?php  echo $row['fpartypic'];?>"><a href="changefpimage.php?editid=<?php echo $row['pid'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                        </div>
                                     <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                
                                                <select class="form-control" name="fpidtype" required="true">
                                                    <option value="<?php echo $row['FPIDType'];?>"><?php echo $row['FPIDType'];?></option>
                                                    <option value="Voter ID">Voter ID</option>
                                                    <option value="Aadhar">Aadhar</option>
                                                    <option value="Driving Licence">Driving Licence</option>
                                                    <option value="Passport">Passport</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fpidnumber" id="fpidnumber" required="true" value="<?php echo $row['FPIDNumber'];?>" class="form-control">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mobile Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fpmobnumber" id="fpmobnumber" maxlength="10" pattern="[0-9]+" required="true" value="<?php echo $row['FPMobilenumber'];?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <textarea required="true" name="fpaddress" rows="4" cols="4" placeholder="First Party Address" class="form-control"><?php echo $row['FPAddress'];?></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                       <div class="col-6">
                               
                                        <h4>Second Party Details</h4>         <hr>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="spname" id="spname" required="true" value="<?php echo $row['SPName'];?>" class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <img src="secpartypic/<?php echo $row['secpartypic'];?>" width="200" height="150" value="<?php  echo $row['secpartypic'];?>"><a href="changespimage.php?editid=<?php echo $row['pid'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                        </div>
                                     <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                
                                                <select class="form-control" name="spidtype" required="true">
                                                    <option value="<?php echo $row['SPIDType'];?>"><?php echo $row['SPIDType'];?></option>
                                                    <option value="Voter ID">Voter ID</option>
                                                    <option value="Aadhar">Aadhar</option>
                                                    <option value="Driving Licence">Driving Licence</option>
                                                    <option value="Passport">Passport</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="spidnumber" id="spidnumber" required="true" value="<?php echo $row['SPIDNumber'];?>" class="form-control">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mobile Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="spmobnumber" id="spmobnumber" maxlength="10" pattern="[0-9]+" required="true" value="<?php echo $row['SPMobilenumber'];?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <textarea required="true" name="spaddress" rows="4" cols="4" placeholder="Second Party Address" class="form-control"><?php echo $row['SPAddress'];?></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        <hr>
                                        <h4>Land Details</h4>
                                     <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Area</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="landarea" id="landarea" required="true" value="<?php echo $row['Landarea'];?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Map</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                               <img src="landmapimages/<?php echo $row['landmappic'];?>" width="200" height="150" value="<?php  echo $row['landmappic'];?>"><a href="changelandmapimage.php?editid=<?php echo $row['pid'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Photo First</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <img src="landfimages/<?php echo $row['landfirstpic'];?>" width="200" height="150" value="<?php  echo $row['landfirstpic'];?>"><a href="changelandfirstimage.php?editid=<?php echo $row['pid'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Photo Second</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                 <img src="landsecimages/<?php echo $row['landsecpic'];?>" width="200" height="150" value="<?php  echo $row['landsecpic'];?>"><a href="changelandsecimage.php?editid=<?php echo $row['pid'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                        </div>
                                        <hr />
                                  <div class="row">
                                            <div class="col-6">
                                        <h4>Witness First</h4>
                                  <hr />
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fwitname" id="fwitname" required="true" value="<?php echo $row['firstwitnessname'];?>"class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                 <img src="firstwitnessimages/<?php echo $row['fwitpic'];?>" width="200" height="150" value="<?php  echo $row['fwitpic'];?>"><a href="changefirstwitimage.php?editid=<?php echo $row['pid'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                
                                                <select class="form-control" name="fwitidtype" required="true">
                                                    <option value="<?php echo $row['fwitidtype'];?>"><?php echo $row['fwitidtype'];?></option>
                                                    <option value="Voter ID">Voter ID</option>
                                                    <option value="Aadhar">Aadhar</option>
                                                    <option value="Driving Licence">Driving Licence</option>
                                                    <option value="Passport">Passport</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fwitidnumber" id="fwitidnumber" required="true" value="<?php echo $row['fwitidnumber'];?>" class="form-control">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mobile Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fwitmobnumber" id="fwitmobnumber" maxlength="10" pattern="[0-9]+" required="true" value="<?php echo $row['fwitmobnumber'];?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <h4>Witness Second</h4>
                                        <hr />
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="secwitname" id="secwitname" required="true" value="<?php echo $row['switname'];?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <img src="secwitnessimages/<?php echo $row['secwitpic'];?>" width="200" height="150" value="<?php  echo $row['secwitpic'];?>"><a href="changesecwitimage.php?editid=<?php echo $row['pid'];?>"> &nbsp; Edit Image</a>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                
                                                <select class="form-control" name="switidtype" required="true">
                                                    <option value="<?php echo $row['switidtype'];?>"><?php echo $row['switidtype'];?></option>
                                                    <option value="Voter ID">Voter ID</option>
                                                    <option value="Aadhar">Aadhar</option>
                                                    <option value="Driving Licence">Driving Licence</option>
                                                    <option value="Passport">Passport</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="switidnumber" id="switidnumber" required="true" value="<?php echo $row['switidnumber'];?>" class="form-control">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mobile Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="switmobnumber" id="switmobnumber" maxlength="10" pattern="[0-9]+" required="true" value="<?php echo $row['switmobnumber'];?>" class="form-control">
                                            </div>
                                        </div><?php } ?>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                               <p style="text-align: center;"> <button type="submit" class="btn btn-space btn-primary" name="submit">Update</button></p>
                                                
                                            </div>
                                        </div>
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