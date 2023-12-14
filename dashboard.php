<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | </title>
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
            <a href="#" class="logo"><b>Admin - Hospital</b></a>
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
          	<h3><i class="fa fa-angle-right"></i> Hospital Management</h3>
				<div class="row">
				
                  
	                  
                
              </div>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>