<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
		{   
		header("Location: index.php"); 
		}
		else{
if(isset($_POST['submit']))
{$subnum="";
$subjectname=$_POST['subjectname'];
$subjectcode=$_POST['subjectcode']; 
$haspracticals = $_POST['haspracticals'];
$subjectcredit = $_POST['subjectcredit'];
    if($_POST['subnum']!=NULL)
    {
        $subnum=$_POST['subnum'];
    }
$maxmarks = $_POST['maxmarks'];
$maxtheorysessionalmarks = $_POST['maxtheorysessionalmarks'];
$maxpracticalmarks = 0;
$maxpracticalsessionalmarks = 0;

if (isset($_POST['maxpracticalmarks']))
	$maxpracticalmarks = $_POST['maxpracticalmarks'];
if (isset($_POST['maxpracticalsessionalmarks']))
	$maxpracticalsessionalmarks = $_POST['maxpracticalsessionalmarks'];

$sql="INSERT INTO  tblsubjects(SubjectName,SubjectCode, hasPractical, SubjectCredit, MaxTheoryMarks, MaxTheorySessionalMarks, MaxPracticalMarks, MaxPracticalSessionalMarks,subjectnumber) VALUES(:subjectname,:subjectcode,:haspracticals,:subjectcredit,:maxmarks, :maxtheorysessionalmarks, :maxpracticalmarks, :maxpracticalsessionalmarks,:subjectnumber)";
$query = $dbh->prepare($sql);
$query->bindParam(':subjectname',$subjectname,PDO::PARAM_STR);
$query->bindParam(':subjectcode',$subjectcode,PDO::PARAM_STR);
$query->bindParam(':haspracticals',$haspracticals,PDO::PARAM_STR);
$query->bindParam(':subjectcredit',$subjectcredit,PDO::PARAM_STR);
$query->bindParam(':maxmarks',$maxmarks,PDO::PARAM_STR);
$query->bindParam(':maxtheorysessionalmarks',$maxtheorysessionalmarks,PDO::PARAM_STR);
$query->bindParam(':maxpracticalmarks',$maxpracticalmarks,PDO::PARAM_STR);
$query->bindParam('maxpracticalsessionalmarks',$maxpracticalsessionalmarks,PDO::PARAM_STR);
$query->bindParam(':subjectnumber',$subnum,PDO::PARAM_STR);


$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Subject Created successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
		<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>SMS Admin Subject Creation </title>
				<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
				<link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
				<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
				<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
				<link rel="stylesheet" href="css/prism/prism.css" media="screen" >
				<link rel="stylesheet" href="css/select2/select2.min.css" >
				<link rel="stylesheet" href="css/main.css" media="screen" >
				<script src="js/modernizr/modernizr.min.js"></script>
		</head>
		<body class="top-navbar-fixed">
				<div class="main-wrapper">

						<!-- ========== TOP NAVBAR ========== -->
	<?php include('includes/topbar.php');?> 
						<!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
						<div class="content-wrapper">
								<div class="content-container">

										<!-- ========== LEFT SIDEBAR ========== -->
									 <?php include('includes/leftbar.php');?>  
										<!-- /.left-sidebar -->

										<div class="main-page">

										 <div class="container-fluid">
														<div class="row page-title-div">
																<div class="col-md-6">
																		<h2 class="title">Subject Creation</h2>
																
																</div>
																
																<!-- /.col-md-6 text-right -->
														</div>
														<!-- /.row -->
														<div class="row breadcrumb-div">
															<div class="col-md-6">
																<ul class="breadcrumb">
																	<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
																	<li> Subjects</li>
																	<li class="active">Create Subject</li>
																</ul>
															</div>
														</div>
														<!-- /.row -->
												</div>
												<div class="container-fluid">
													 
												<div class="row">
													<div class="col-md-12">
														<div class="panel">
															<div class="panel-heading">
																<div class="panel-title">
																	<h5>Create Subject</h5>
																</div>
															</div>
														<div class="panel-body">
														<?php if($msg){?>
														<div class="alert alert-success left-icon-alert" role="alert">
														 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
														 </div><?php } 
														else if($error){?>
																<div class="alert alert-danger left-icon-alert" role="alert">
																		<strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
																</div>
																				<?php } ?>
																								<form class="form-horizontal" method="post">
																										<div class="form-group">
																												<label for="default" class="col-sm-2 control-label">Subject Name</label>
																												<div class="col-sm-10">
 																														<input type="text" name="subjectname" class="form-control" id="default" placeholder="Subject Name" required="required">
																												</div>
																										</div>
																										<div class="form-group">
																												<label for="default" class="col-sm-2 control-label">Subject Code</label>
																												<div class="col-sm-10">
																													 <input type="text" name="subjectcode" class="form-control" id="default" placeholder="Subject Code" required="required">
																												</div>
                                                        <label for="default" class="col-sm-2 control-label">Subject Credits</label>
                                                        <div class="col-sm-10">
                                                          
 																														<input type="text" name="subjectcredit" class="form-control" id="default" max="7" placeholder="Subject Credits" required="required">
 																														<small>NOTE: 2 Credit points are reserved for Practicals (only if applicable)</small>
                                                        </div>
                                                        <div class="row" style="padding:0px;margin:0">
                                                        <label for="default" class="col-sm-2 control-label">Maximum Theory Marks</label>
																												<div class="col-sm-3">
 																														<input type="text" name="maxmarks" class="form-control" id="default" placeholder="Maximum Theory Marks" required="required" max="150" min="1" required>
																												</div>


																												<label for="default" class="col-sm-2 control-label">Maximum Theory Sessional Marks</label>
																												<div class="col-sm-4">
 																														<input type="text" name="maxtheorysessionalmarks" class="form-control" id="default" placeholder="Maximum Theory Sessional Marks" required="required" max="150" min="1" required>
																												</div>
																												</div>


                                                        <label for="default" class="col-sm-2 control-label">Practical Subject</label>
                                                        <div class="col-sm-10" style="margin-top:5px;">
                                                          <div class="col-md-2">
 																														<input type="radio" name="haspracticals" class="form-control-" id="practicalsYES" value="1" required="required">Yes</div>
 																														<div class="col-md-2">
 																														<input type="radio" name="haspracticals" class="form-control-" id="practicalsNO" value="0" required="required" selected>No
																													</div>
                                                        </div>
																										</div>


																										<div id="parctical-div" style="display: none;">
																										<div class="row" style="padding:0px;margin:0">
                                                        <label for="default" class="col-sm-2 control-label">Maximum Practical Marks</label>
																												<div class="col-sm-3">
 																														<input type="text" name="maxpracticalmarks" class="form-control" id="maxpracticalmarks" placeholder="Maximum Practical Marks" required="required" max="150" min="1">
																												</div>


																												<label for="default" class="col-sm-2 control-label">Maximum Practical Sessional Marks</label>
																												<div class="col-sm-4">
 																														<input type="text" name="maxpracticalsessionalmarks" class="form-control" id="maxpracticalsessionalmarks" placeholder="Maximum Theory Sessional Marks" required="required" max="150" min="1">
																												</div>
                                                                                                            </div> 
                                                                                                            </div>
                                                                                                      <label for="default" class="col-sm-2 control-label">Programme</label>
                                                        <div class="col-sm-10" style="margin-top:5px;">
                                                          <div class="col-md-2">
 																														<input type="radio" name="prgm" class="form-control-" id="UG" value="1" required="required">UG</div>
 																														<div class="col-md-2">
 																														<input type="radio" name="prgm" class="form-control-" id="PG" value="0" required="required" selected>PG
																													</div>
                                                        </div>
<div id="subnum" style="display: none;">
																										<div class="row" style="padding:0px;margin:0">                                                                                                    
<label for="default" class="col-sm-2 control-label">Enter Subject Numeric Id:</label>  
<div class="col-sm-4">
 																														<input type="text" name="subnum" class="form-control" id="subnumid"> 
                                                                                                            </div> </div></div> 
																												
																												
																												<script>
																													var div = document.getElementById('parctical-div');
																													var practicalsYES = document.getElementById('practicalsYES');
																													var practicalsNO = document.getElementById('practicalsNO');
																													practicalsYES.addEventListener('click', function(e) {
																														var div = document.getElementById('parctical-div');
																														div.style.display = 'block';
																														document.getElementById('maxpracticalsessionalmarks').setAttribute('required', 'required')
																														document.getElementById('maxpracticalmarks').setAttribute('required', 'required')
																													})
																													var ug = document.getElementById('UG'); 
                                                                                                                   var pg = document.getElementById('PG'); pg.addEventListener('click', function(e) {
																														var div = document.getElementById('subnum');
																														div.style.display = 'block';
																														document.getElementById('subnumid').setAttribute('required', 'required')})
                                                                                                                        practicalsNO.addEventListener('click', function(e) {
																														var div = document.getElementById('parctical-div');
																														div.style.display = "none";
                                                                                                                             
																														document.getElementById('maxpracticalsessionalmarks').removeAttribute('required')
																														document.getElementById('maxpracticalmarks').removeAttribute('required')

																													})
                                                                                                                    ug.addEventListener('click', function(e) {
																														var div = document.getElementById('subnum');
																														div.style.display = "none";})
																												</script>

																										<div class="form-group">
																												<div class="col-sm-offset-2 col-sm-10">
																														<button type="submit" name="submit" class="btn btn-primary">Submit</button>
																												</div>
																										</div>
																								</form>

																						</div>
																				</div>
																		</div>
																		<!-- /.col-md-12 -->
																</div>
										</div>
								</div>
								<!-- /.content-container -->
						</div>
						<!-- /.content-wrapper -->
				</div>
				<!-- /.main-wrapper -->
				<script src="js/jquery/jquery-2.2.4.min.js"></script>
				<script src="js/bootstrap/bootstrap.min.js"></script>
				<script src="js/pace/pace.min.js"></script>
				<script src="js/lobipanel/lobipanel.min.js"></script>
				<script src="js/iscroll/iscroll.js"></script>
				<script src="js/prism/prism.js"></script>
				<script src="js/select2/select2.min.js"></script>
				<script src="js/main.js"></script>
				<script>
						$(function($) {
								$(".js-states").select2();
								$(".js-states-limit").select2({
										maximumSelectionLength: 2
								});
								$(".js-states-hide").select2({
										minimumResultsForSearch: Infinity
								});
						});
				</script>
		</body>
</html>
<?PHP } ?>
