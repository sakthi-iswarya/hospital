<?php
session_start();
error_reporting(0);
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['Submit']))
{


  $targetDir = "uploads/";
  $fileName = basename($_FILES["file"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

   $name=$_POST['f_name'];
   $fid=$_POST['l_name'];
   $email=$_POST['email'];
   $mobile=$_POST['contact_no'];
  
  


  $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
          $msg=mysqli_query($con,"insert into user(f_name,l_name,email,contact_no) 
          values('$name','$fid','$email','$mobile')");
        }
  
  }
 
if($msg)
{
  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
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

    <title>Admin </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin </b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
              </ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
             <ul class="sidebar-menu" id="nav-accordion">       
                 
                  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>       
                  <li class="mt"><a href="dashboard.php"><i class="fa fa-file"></i><span>Dashboard</span></a></li>
                  <li class="mt"><a href="add-doctor.php"> <i class="fa fa-file"></i><span>Add Doctor </span></a> </li>
                  
                  <li class="mt"><a href="add-users.php"> <i class="fa fa-file"></i><span>Add Users </span></a> </li>
                  <li class="mt"><a href="add-patient.php"> <i class="fa fa-file"></i><span>Patient Register </span></a> </li>
                  <li class="mt"><a href="assign.php"> <i class="fa fa-file"></i><span>Assign Doctor</span></a> </li>
                  <li class="mt"><a href="medicine.php"> <i class="fa fa-file"></i><span>Medicines </span></a> </li>
                  <li class="mt"><a href="reports.php"><i class="fa fa-file"></i><span>Doctor Reports</span></a></li> 
                  <li class="mt"><a href="patient-reports.php"><i class="fa fa-file"></i><span>Patient Reports</span></a></li> 
                  <li class="mt"><a href="treatment-reports.php"><i class="fa fa-file"></i><span>Treatment Reports</span></a></li> 
                  <li class="mt"><a href="change-password.php"><i class="fa fa-file"></i><span>Change Password</span></a></li>
                  <li class="sub-menu"><a href="manage-users.php" ><i class="fa fa-users"></i><span>Manage Users</span></a></li>
              
              </ul>    
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Add user </h3>
        <div class="row">
        
                  
                    
                  <div class="col-md-12">
                      <div class="content-panel">
                          <form class="form-horizontal style-form" name="form1" method="post" enctype="multipart/form-data" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">FirstName</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="f_name" value="" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">LastName</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="l_name" value="" >
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="" >
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Mobile</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="contact_no" value="" >
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Regiter Date</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" name="date" value="" >
                              </div>
                          </div>
                           

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Image</label>
                              <div class="col-sm-10">
                                  <input type="file" class="form-control" name="file" value="" >
                              </div>
                          </div>
                          

                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Add Patient" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
    </section>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  

  </body>
</html>
<?php } ?>
