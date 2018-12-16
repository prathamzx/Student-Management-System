<?php
session_start();
//error_reporting(0);
include('includes/config.php');
$msg = $error = "";
if(strlen($_SESSION['alogin'])=="") {   
	 header("Location: index.php"); 
}
else{
		  
	 if(isset($_POST['submit'])) {
		  
		  $batchstart=$_POST['batchstart'];
		  $batchend=$_POST['batchend']; 
		  $isActive = 1;
		  //$section=$_POST['section'];
		  $sql="INSERT INTO  tblbatches(BatchStart,BatchEnd, isActive)VALUES(:batchstart,:batchend,:isactive)";
		  $query = $dbh->prepare($sql);
		  $query->bindParam(':batchstart',$batchstart,PDO::PARAM_STR);
		  $query->bindParam(':batchend',$batchend,PDO::PARAM_STR);
		  $query->bindParam(':isactive',$isActive,PDO::PARAM_STR);
		  //$query->bindParam(':section',$section,PDO::PARAM_STR);
		  $query->execute();
		  $lastInsertId = $dbh->lastInsertId();
		  echo $sql;
		  if($lastInsertId) {
				$msg="Batch Created successfully";
		  }
		  else {
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
		  <title>SMS Admin Create Batch</title>
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
												<h2 class="title">Create Batch</h2>
										  </div>
										  
									 </div>
									 <!-- /.row -->
									 <div class="row breadcrumb-div">
										  <div class="col-md-6">
												<ul class="breadcrumb">
											<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
											<li><a href="#">Batch</a></li>
											<li class="active">Create Batch</li>
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
																	 <h5>Create Batch</h5>
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

																<form method="post">
																	 <div class="form-group has-success">
																		  <label for="success" class="control-label">Batch Starting</label>
																		<div class="">
																			<select name="batchstart" id="sbatchstart" class="form-control">
																				<option value="">Select Starting Year</option>
																		 <option value="2013">2013</option>
																		 <option value="2014">2014</option>
																		 <option value="2016">2015</option>
																		 <option value="2017">2017</option>
																		 <option value="2018">2018</option>
																		 <option value="2019">2019</option>
																		 <option value="2020">2020</option>
																		 <option value="2021">2021</option>
																		 <option value="2022">2022</option>
																		 <option value="2023">2023</option>
																		 <option value="2024">2024</option>
																		 <option value="2025">2025</option>
																		 <option value="2026">2026</option>
																		 <option value="2027">2027</option>
																		 <option value="2028">2028</option>
																		 <option value="2029">2029</option>
																		 <option value="2030">2030</option>
																		 <option value="2031">2031</option>
																		 <option value="2032">2032</option>
																		 <option value="2033">2033</option>
																		 <option value="2034">2034</option>
																		 <option value="2035">2035</option>
																		 <option value="2036">2036</option>
																		 <option value="2037">2037</option>
																		 <option value="2038">2038</option>
																					 
																				</select>
																			 
																		</div>
																	</div>
																		 <div class="form-group has-success">
																		  <label for="success" class="control-label">Batch Ending</label>
																		  <div class="">
																				
																				<select name="batchend" id="sbatchend" class="form-control">
																					<option value="">Select Ending Year</option>
																		 <option value="2016">2016</option>
																		 <option value="2017">2017</option>
																		 <option value="2018">2018</option>
																		 <option value="2019">2019</option>
																		 <option value="2020">2020</option>
																		 <option value="2021">2021</option>
																		 <option value="2022">2022</option>
																		 <option value="2023">2023</option>
																		 <option value="2024">2024</option>
																		 <option value="2025">2025</option>
																		 <option value="2026">2026</option>
																		 <option value="2027">2027</option>
																		 <option value="2028">2028</option>
																		 <option value="2029">2029</option>
																		 <option value="2030">2030</option>
																		 <option value="2031">2031</option>
																		 <option value="2032">2032</option>
																		 <option value="2033">2033</option>
																		 <option value="2034">2034</option>
																		 <option value="2035">2035</option>
																		 <option value="2036">2036</option>
																		 <option value="2037">2037</option>
																		 <option value="2038">2038</option>
																		 <option value="2039">2039</option>
																		 <option value="2040">2040</option>
																					 
																				</select>
																			 
																			 
																		  </div>
																	 </div>
																	 </div>
																	 <script type="text/javascript">
																		var end = document.getElementById('sbatchend');
																		end.addEventListener('change', function(e) {
																				var starting = parseInt(document.getElementById('sbatchstart').value)
																				if (starting > parseInt(this.value)){
																						alert('Please Select a Valid Ending Year')

																				}
																		})
																	 </script>
																	 <div class="form-group has-success">

																		  <div class="">
																			  <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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

		  <!-- ========== THEME JS ========== -->
		  <script src="js/main.js"></script>



		  <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
	 </body>
</html>
<?php  } ?>
