<?php
session_start();
//error_reporting(0);
include('includes/config.php');
$msg = $error = "";
$tbl="tblstudents".$_SESSION['active_class'];
if(strlen($_SESSION['alogin'])=="") {   
	 header("Location: index.php"); 
}
else{

	$courseid = isset($_SESSION['active_class'])?$_SESSION['active_class']:"";
	
	if (strlen($courseid) == 0)
		echo "<script>alert('Please select a School first!')</script>";

	$subjects = get_all_subject_with_course_id($dbh, $courseid);
	$students = get_all_students_with_course_id($dbh, $courseid);
	//echo "<pre>".print_r($students, true)."</pre>";
	 if(isset($_POST['submit'])) {
	 	$semister = $_POST['semister'];
	 	$studentid = $_POST['student-id'];
	 	//echo "<script> alert(".$studentid.")</script>";
	 	$subs = $_POST['subjects'];
	 	$status = 1;
         $sql="select RollId from $tbl where StudentId=?";
             $stmt = $dbh->prepare($sql);
         $stmt->execute([$studentid]);
         $rno=$stmt -> fetch(PDO::FETCH_ASSOC);
       // $rno="bkjb";
          $sql="select ClassNameNumeric from tblclasses where id=$_SESSION[active_class]";
    $stmt = $dbh->prepare($sql);
         $stmt->execute();
    $cin=$stmt -> fetch(PDO::FETCH_ASSOC);
         
        
         // $rno=substr_replace($rno,$s,2,1);
                //$SESSION['dob']=$SESSION['dob']+$semister;
                $sql1=" UPDATE $tbl SET RollId =? where StudentId=?";
    $stmt = $dbh->prepare($sql1);
         $s=$semister;
         $r=$rno['RollId'];
             if($cin['ClassNameNumeric']<4){
              
             $r=substr_replace($r,$s,3,1);
             }
         else
         { $r=substr_replace($r,$s,4,1);
             $sql2="select subjectnumber from tblsubjects where id = $subs[0]";
             $stm=$dbh->prepare($sql2);
           $stm->execute();
    $sn=$stm -> fetch(PDO::FETCH_ASSOC);
            $r=substr_replace($r,$sn['subjectnumber'],3,1);
         }
                 $stmt->execute([$r,$studentid]);
         //$_SESSION['roll']=0;
         //$sql2="update tblstudents SET RollId= CONCAT(RollId,$_SESSION[roll])";
          //$stmt = $dbh->prepare($sql);
         //$stmt->execute();
         
          $sql="update $tbl set Semester=$semister where StudentId=$studentid";
    $stmt = $dbh->prepare($sql);
         $stmt->execute();
         
     
	 	if (sizeof($subs) > 0) {
	 		// with  the subject add its corresponding row in the tbl result for the subject 
	 		// also remember to clear to delete the row when you delete the subject from the student.
	 		foreach($subs as $sub) {
	 			$sql = "INSERT INTO studentsubjects VALUES (:studentid, :semister, :subjectid, :isActive)";
	 			$sql_check = "SELECT COUNT(*) AS count FROM tblresult WHERE StudentId = :studentid AND ClassId=:classid AND SubjectId =:subjectid";
	 			$sql2 = "INSERT INTO tblresult (StudentId, ClassId, SubjectId) VALUES(:studentid, :classid, :subjectid)";
                
	 			$query = $dbh->prepare($sql);
	 			$query2 = $dbh->prepare($sql2);
	 			$query_check = $dbh->prepare($sql_check);

	 			$query_check->bindParam(':studentid', $studentid, PDO::PARAM_STR);
	 			$query_check->bindParam(':classid', $courseid, PDO::PARAM_STR);
	 			$query_check->bindParam(':subjectid', $sub, PDO::PARAM_STR);

	 			$query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
	 			$query->bindParam(':semister', $semister, PDO::PARAM_STR);
	 			$query->bindParam(':subjectid', $sub, PDO::PARAM_STR);
	 			$query->bindParam(':isActive', $status, PDO::PARAM_STR);

	 			$query2->bindParam(':studentid', $studentid, PDO::PARAM_STR);
	 			$query2->bindParam(':classid', $courseid, PDO::PARAM_STR);
	 			$query2->bindParam(':subjectid', $sub, PDO::PARAM_STR);
	 			$query->execute();
	 			$query_check->execute();
	 			$r = $query_check->fetchAll(PDO::FETCH_OBJ);
	 		//	echo "<pre>".print_r($r, true)."</pre>";
	 			if ($r) {
	 				if ($r[0]->count == 0){
	 					$query2->execute();
	 					//echo "EXECUTED!";
	 				}
	 			}else {
	 				///echo $sql_check.$studentid.$sub;
	 			}

	 			//echo $sql_check."-".$studentid."-".$courseid."-".$sub;
	 		}
	 	}
	 	else
	 		$error = "No Subjects Recieved";

				$msg="Batch Created successfully";

}
?>
<!DOCTYPE html>
<html lang="en">
	 <head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <title>SMS Admin Add Subjects to Students</title>
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
												<h2 class="title">Add Subjects to Students</h2>
										  </div>
										  
									 </div>
									 <!-- /.row -->
									 <div class="row breadcrumb-div">
										  <div class="col-md-6">
												<ul class="breadcrumb">
											<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
											<li><a href="#">Subjects</a></li>
											<li class="active">Add Subjects to Students</li>
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
																	 <h5>Add Subjects to Students</h5>
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
								<div class="row">
										<div class="form-group col-md-6">
											<label for="">Student</label>
											<select name="student-id" id="search-wise" class="form-control">
												<option value=""></option>
												<?php
														if ($students != null ){ 
															foreach($students as $student) {
																?>
																		<option value="<?=$student[0]?>"><?=$student[1]." (".$student[2].")";?></option>
																<?php
															}
														}
												?>
											</select>
											</div>
											<div class="form-group col-md-6">
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
										<div class="row">
											<div class="col-md-12">
												<label for="">Subjects</label>
												<select name="subjects[]" id="subject-select" class="form-control" multiple="multiple">
													<?php
															if($subjects != null) {
																foreach($subjects as $subject) {
																	?>
																			<option value="<?=$subject[0]?>"><?=$subject[1]?></option>
																	<?php
																}
															}
													?>
												</select>
											</div>
										</div>

								
																
									

											<div style="margin-top: 30px;">
												
														<button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
												
											</div>
							</form>
								</div>
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
								$('#search-wise').select2({ 
											placeholder: "Enter Student Roll ID",
    							allowClear: true})
								$('#subject-select').select2({placeholder: "Start typing Subject Name"})
						})
					</script>


		  <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
	 </body>
</html>
 
<?php } ?>