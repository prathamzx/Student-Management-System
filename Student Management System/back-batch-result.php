<?php
session_start();
//error_reporting(0);
include('includes/config.php');
$tbl="tblstudents".$_SESSION['active_class'];
$msg = $error = "";
if(strlen($_SESSION['alogin'])=="") {   
	 header("Location: index.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
	 <head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <title>SMS Admin Batch Results</title>
		  <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
		  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
		  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
		  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
		  <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
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
												<h2 class="title">Batch Result</h2>
										  </div>
										  
									 </div>
									 <!-- /.row -->
									 <div class="row breadcrumb-div">
										  <div class="col-md-6">
												<ul class="breadcrumb">
											<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
											<li><a href="#">Result</a></li>
											<li class="active">Batch Result</li>
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
																	 <h5>Batch Results</h5>
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

																<form method="get" action="back-batch-result-generate.php">
																	<div class="row">
																		<div class="col-md-12">
																		  <label for="success" class="control-label">Course</label>
																		  <select name="courseid" id="" class="form-control">
																		  	<?php
																		  			$course = get_all_courses($dbh);
																		  			if ($course != null) {
																		  				foreach ($course as $c) {
																		  						?>
																		  						<option value="<?=$c->id?>"><?=$c->ClassName." - ".$c->Section?></option>
																		  						<?php
																		  				}
																		  			}
																		  	?>
																		  </select>
																		  </div>
																			</div>
																			<div class="row">
																				<div class="col-md-12">
																					<label for="">Batch</label>

																					<select name="batchid" id="" class="form-control">
																						<?php
																								$batches = get_batches($dbh);
																								if ($batches != null) {
																									foreach ($batches as $batch) {
																										?>
																										<option value="<?=$batch->id?>"><?=$batch->BatchStart." - ".$batch->BatchEnd?></option>
																										<?php
																									}
																								}
																						?>
																					</select>
																				</div>
																			</div>
																			<div class="row" style="margin-bottom: 20px;">
																				<div class="col-md-12">
																					<label for="">Semister</label>
																					<select name="semister" id="" class="form-control">
																						<option value="1">I</option>
																						<option value="2">II</option>
																						<option value="3">III</option>
																						<option value="4">IV</option>
																						<option value="5">V</option>
																						<option value="6">VI</option>
																					</select>
																				</div>
																			</div>
																			
																			  <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
																
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

		  <!-- ========== THEME JS ========== -->
		  <script src="js/main.js"></script>



		  <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
	 </body>
</html>
