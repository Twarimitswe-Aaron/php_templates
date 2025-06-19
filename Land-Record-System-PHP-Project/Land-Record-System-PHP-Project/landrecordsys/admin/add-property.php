<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


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
$pronumber=mt_rand(100000000, 999999999);
//First Party Photo
 $fpphoto=$_FILES["fpphoto"]["name"];
$extension = substr($fpphoto,strlen($fpphoto)-4,strlen($fpphoto));
//Second Party Photo
$spphoto=$_FILES['spphoto']["name"];
$extension1 = substr($spphoto,strlen($spphoto)-4,strlen($spphoto));
//Land Map  Image 
$landmap=$_FILES['landmap']["name"];
$extension2 = substr($landmap,strlen($landmap)-4,strlen($landmap));
//Land First Photo
 $landfirstphoto=$_FILES['landfirstphoto']["name"];
$extension3 = substr($landfirstphoto,strlen($landfirstphoto)-4,strlen($landfirstphoto));
//Land Second Photo
$landsecphoto=$_FILES['landsecphoto']["name"];
$extension4 = substr($landsecphoto,strlen($landsecphoto)-4,strlen($landsecphoto));
//First Witness  Image 5
 $fwitphoto=$_FILES['fwitphoto']["name"];
$extension5 = substr($fwitphoto,strlen($fwitphoto)-4,strlen($fwitphoto));

//Second Witness  Image 5
 $switphoto=$_FILES['switphoto']["name"];
$extension6 = substr($switphoto,strlen($switphoto)-4,strlen($switphoto));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");

// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Property gallery image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension2,$allowed_extensions))
{
echo "<script>alert('Property gallery image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert('Property gallery image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension4,$allowed_extensions))
{
echo "<script>alert('Property gallery image4 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension5,$allowed_extensions))
{
echo "<script>alert('Property gallery image5 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension6,$allowed_extensions))
{
echo "<script>alert('Property gallery image5 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename property images
$fpartypic=md5($fpphoto).time().$extension;
$secpartypic=md5($spphoto).time().$extension1;
$landmappic=md5($landmap).time().$extension2;
$landfirstpic=md5($landfirstphoto).time().$extension3;
$landsecpic=md5($landsecphoto).time().$extension4;
$fwitpic=md5($fwitphoto).time().$extension5;
$secwitpic=md5($switphoto).time().$extension6;
     move_uploaded_file($_FILES["fpphoto"]["tmp_name"],"firstpartypic/".$fpartypic);
     move_uploaded_file($_FILES["spphoto"]["tmp_name"],"secpartypic/".$secpartypic);
     move_uploaded_file($_FILES["landmap"]["tmp_name"],"landmapimages/".$landmappic);
     move_uploaded_file($_FILES["landfirstphoto"]["tmp_name"],"landfimages/".$landfirstpic);
     move_uploaded_file($_FILES["landsecphoto"]["tmp_name"],"landsecimages/".$landsecpic);
     move_uploaded_file($_FILES["fwitphoto"]["tmp_name"],"firstwitnessimages/".$fwitpic);
     move_uploaded_file($_FILES["switphoto"]["tmp_name"],"secwitnessimages/".$secwitpic);

 $query=mysqli_query($con,"insert into tblproperty(PropertyNumber,PropertyID,LandSubtype,FirstPartyname,FPIDType,FPIDNumber,FPMobilenumber,FPAddress,SPName,SPIDType,SPIDNumber,SPMobilenumber,SPAddress,Landarea,firstwitnessname,fwitidtype,fwitidnumber,fwitmobnumber,switname,switidtype,switidnumber,switmobnumber,fpartypic,secpartypic,landmappic,landfirstpic,landsecpic,fwitpic,secwitpic) value('$pronumber','$propertyid','$landsubtype','$fpname','$fpidtype','$fpidnumber','$fpmobnumber','$fpaddress','$spname','$spidtype','$spidnumber','$spmobnumber','$spaddress','$landarea','$fwitname','$fwitidtype','$fwitidnumber','$fwitmobnumber','$switname','$switidtype','$switidnumber','$switmobnumber','$fpartypic','$secpartypic','$landmappic','$landfirstpic','$landsecpic','$fwitpic','$secwitpic')");

    if ($query) {
    echo '<script>alert("Propert details has been added.")</script>';
echo "<script>window.location.href ='add-property.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

 } 
}

?>

<!doctype html>
<html lang="en">

 
<head>
    
    <title>Land Record System || Land/Property Property</title>
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
                            <h2 class="pageheader-title">Add Land/Property </h2>
                            
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
                                <h5 class="card-header">Add Land/Property</h5>
                                <div class="card-body">
                                    <form  method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land/Property Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select type="text" name="propertyid" id="propertyid" required="true" class="form-control">
                                                    <option value="">Select Land/Property Type</option>
              <?php $query=mysqli_query($con,"select * from tblpropertytype");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['ID'];?>"><?php echo $row['PropertType'];?></option>
                  <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Subtype</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="landsubtype" id="landsubtype" required="true" placeholder="Land Subtype" class="form-control">
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
                                                <input type="text" name="fpname" id="fpname" required="true" placeholder="First Party Name" class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="fpphoto" id="fpphoto" required="true" class="form-control">
                                            </div>
                                        </div>
                                     <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                
                                                <select class="form-control" name="fpidtype" required="true">
                                                    <option value="">Select ID Type</option>
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
                                                <input type="text" name="fpidnumber" id="fpidnumber" required="true" placeholder="First Party ID Number" class="form-control">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mobile Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fpmobnumber" id="fpmobnumber" maxlength="10" pattern="[0-9]+" required="true" placeholder="First Party Mobile Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <textarea required="true" name="fpaddress" rows="4" cols="4" placeholder="First Party Address" class="form-control"></textarea>
                                                
                                            </div>
                                        </div>

</div>
   <div class="col-6">
                                       
                                        <h4>Second Party Details</h4>
                                         <hr>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="spname" id="spname" required="true" placeholder="Second Party Name" class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="spphoto" id="spphoto" required="true" class="form-control">
                                            </div>
                                        </div>
                                     <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                
                                                <select class="form-control" name="spidtype" required="true">
                                                    <option value="">Select ID Type</option>
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
                                                <input type="text" name="spidnumber" id="spidnumber" required="true" placeholder="Second Party ID Number" class="form-control">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mobile Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="spmobnumber" id="spmobnumber" maxlength="10" pattern="[0-9]+" required="true" placeholder="Second Party Mobile Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <textarea required="true" name="spaddress" rows="4" cols="4" placeholder="Second Party Address" class="form-control"></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        <hr>
                                        <h4>Land Details</h4>
                                     <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Area</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="landarea" id="landarea" required="true" placeholder="Land Area" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Map</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="landmap" id="landmap" required="true" placeholder="Land Area" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Photo First</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="landfirstphoto" id="landfirstphoto" required="true"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Land Photo Second</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="landsecphoto" id="landsecphoto" required="true" class="form-control">
                                            </div>
                                        </div>
                                        <hr>

  <div class="row">
                                            <div class="col-6">

                                        <h4>Witness First</h4>
                                        <hr />
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fwitname" id="fwitname" required="true" placeholder="First Witness Name" class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="fwitphoto" id="fwitphoto" required="true" class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                
                                                <select class="form-control" name="fwitidtype" required="true">
                                                    <option value="">Select ID Type</option>
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
                                                <input type="text" name="fwitidnumber" id="fwitidnumber" required="true" placeholder="First Witness ID Number" class="form-control">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mobile Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="fwitmobnumber" id="fwitmobnumber" maxlength="10" pattern="[0-9]+" required="true" placeholder="First Witness Mobile Number" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <h4>Witness Second</h4>
                                        <hr />
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="secwitname" id="secwitname" required="true" placeholder="Second Witness Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Photo</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="file" name="switphoto" id="switphoto" required="true" class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                
                                                <select class="form-control" name="switidtype" required="true">
                                                    <option value="">Select ID Type</option>
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
                                                <input type="text" name="switidnumber" id="switidnumber" required="true" placeholder="Second Witness ID Number" class="form-control">
                                            </div>
                                        </div>
                                           
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mobile Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="switmobnumber" id="switmobnumber" maxlength="10" pattern="[0-9]+" required="true" placeholder="Second Witness Mobile Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                               <p style="text-align: center;"> <button type="submit" class="btn btn-space btn-primary" name="submit">Submit</button></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </form>
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