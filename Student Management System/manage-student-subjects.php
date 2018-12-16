<?php
session_start();
error_reporting(0);
include('includes/config.php');
$msg = $error = "";
$subjects = null;
if(strlen($_SESSION['alogin'])=="") {   
	 header("Location: index.php"); 
}
else{
		  
	 if(isset($_GET['submit'])) {

	 	$semister = $_GET['semister'];
	 	$studentid = $_GET['student-id'];

	 	$subjects = get_student_subjects($dbh, $studentid, $semister);
		  //$query->bindParam(':section',$section,PDO::PARAM_STR);
		  //$query->execute();
		  /*$lastInsertId = $dbh->lastInsertId();
		  echo $sql;
		  if($lastInsertId) {
				$msg="Batch Created successfully";
		  }
		  else {
				$error="Something went wrong. Please try again";
		  }*/

}


?>
<!DOCTYPE html>
<html lang="en">
	 <head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <title>SMS Admin Manage Students Subjects</title>
		  <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
		  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
		  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
		  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
		  <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
		  		  <link rel="stylesheet" href="css/select2/select2.min.css">

		  <link rel="stylesheet" href="css/main.css" media="screen" >
		  <script src="js/modernizr/modernizr.min.js"></script>
			<style>
		  .errorWrap {
	 padding: 10px;
	 margin: 0 0 20px 0;
	 background: #fff;
	 border-left: 4px solid #dd3d36;
	 -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	 box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
	 padding: 10px;
	 margin: 0 0 20px 0;
	 background: #fff;
	 border-left: 4px solid #5cb85c;
	 -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	 box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		  </style>
	 </head>
	 <body class="top-navbar-fixed">
		  <div class="main-wrapper">

				<!-- ========== TOP NAVBAR ========== -->
				<?php include('includes/topbar.php');?>   
			 <!-----End Top bar>
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
												<h2 class="title">Manage Students Subjects</h2>
										  </div>
										  
									 </div>
									 <!-- /.row -->
									 <div class="row breadcrumb-div">
										  <div class="col-md-6">
												<ul class="breadcrumb">
											<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
											<li><a href="#">Batch</a></li>
											<li class="active">Manage Students Subjects</li>
										</ul>
										  </div>
										 
									 </div>
									 <!-- /.row -->
								</div>
								<!-- /.container-fluid -->

								<section class="section">
									 <div class="container-fluid">
										  <div class="row">
												<div class="col-md-8 col-md-offset-2">
													 <div class="panel">
														  <div class="panel-heading">
																<div class="panel-title">
																	 <h5>Manage Students Subjects</h5>
																</div>
														  </div>
			  <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
	 <div class="alert alert-danger left-icon-alert" role="alert">
														  <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
													 </div>
													 <?php } ?>
  
														  <div class="panel-body">

																<form method="GET" active="">
																	<div class="row">
																		<div class="form-group col-md-6">
																			<label for="">Student</label>
																				<select name="student-id" id="student-search" class="form-control">
																					<option value=""></option>
																					<?php
																								$students = get_all_students_with_course_id($dbh, $_SESSION['active_class']);
																								if ($students != null) {
																									foreach($students as $s) {
																										?>	
																												<option value="<?=$s[0]?>"><?=$s[1]." (".$s[2].")"?></option>
																										<?php
																									}
																								}
																					?>
																				</select>
																		</div>
																		<div class="form-group col-md-6">
																			<label for="">Semister</label>
																			<select name="semister" id="semister" class="form-control">
																				<option value="1">Semister I</option>
																				<option value="2">Semister II</option>
																				<option value="3">Semister III</option>
																				<option value="4">Semister IV</option>
																				<option value="5">Semister V</option>
																				<option value="6">Semister VI</option>
																			</select>
																		</div>
																	</div>


																	<div class="row">
																		<div class="col-md-12">
																			<?php
																						if ($subjects != null) {
																							?>	
																							<h4>Student Subject Details</h4>
																							<table class="table table-bordered">
																								<thead>
																									<tr>
																										<th>Student ID</th>
																										<th>Student Name</th>
																										<th>Subjects</th>
																									</tr>
																								</thead>
																							<tbody>
																								<tr>
																									<td rowspan="<?=sizeof($subjects)?>"><?=$subjects[0]->StudentId?></td>
																									<td rowspan="<?=sizeof($subjects)?>"><?=get_student_name($dbh, $subjects[0]->StudentId)?></td>
																							<?php

																							foreach($subjects as $sub) {
																								?>
																									<td>
																										<span><a href="deactivate-student-subject.php?studentid=<?=$studentid?>&sem=<?=$semister?>&subjectid=<?=$sub->SubjectId?>"><i class="glyphicon glyphicon-remove"></i></a></span>
																										<?=get_subject_name($dbh, $sub->SubjectId)?>
																											
																										</td>
																								</tr>
																								<?php
																							}
																							echo "</tbody></table>";

																						}
																			?>
																		</div>
																	</div>
																		 
																		  <div class="">
																			  <button type="submit" name="submit" class="btn btn-success btn-labeled">Find Subjects<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
																	 </div>
																</form>
														  </div>
													 </div>
												</div>
												<!-- /.col-md-8 col-md-offset-2 -->
										  </div>
										  <!-- /.row -->
									 </div>
									 <!-- /.container-fluid -->
								</section>
								<!-- /.section -->

						  </div>
						  <!-- /.main-page -->

					 </div>
					 <!-- /.content-container -->
				</div>
				<!-- /.content-wrapper -->

		  </div>
		  <!-- /.main-wrapper -->

		  <!-- ========== COMMON JS FILES ========== -->
		  <script src="js/jquery/jquery-2.2.4.min.js"></script>
		  <script src="js/jquery-ui/jquery-ui.min.js"></script>
		  <script src="js/bootstrap/bootstrap.min.js"></script>
		  <script src="js/pace/pace.min.js"></script>
		  <script src="js/lobipanel/lobipanel.min.js"></script>
		  <script src="js/iscroll/iscroll.js"></script>

		  <!-- ========== PAGE JS FILES ========== -->
		  <script src="js/prism/prism.js"></script>
		 <script src="js/select2/select2.min.js"></script>


		  <!-- ========== THEME JS ========== -->
		  <script src="js/main.js"></script>
		  	<script type="text/javascript">
						$(function(){
								$('#student-search').select2({ 
											placeholder: "Enter Student Roll ID",
    							allowClear: true})
								
						})
					</script>



		  <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
	 </body>
</html>
<?php  } ?>
