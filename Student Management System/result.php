<?php
session_start();
error_reporting(0);
include('includes/config.php');
$rollid=$_POST['rollid'];
$semister = $_POST['semister'];
$tbl="tblstudents".$_POST['class'];
$dat=date('my');
?>
<!DOCTYPE html>
<html lang="en">
		<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
				
				<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
				<link rel="stylesheet" media="print" href="css/bootstrap.min.css" media="screen" >

				<link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
				<link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
				<link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
				<link rel="stylesheet" href="css/prism/prism.css" media="screen" >
				<link rel="stylesheet" href="css/main.css" media="screen" >
				<script src="js/modernizr/modernizr.min.js"></script>
				<style>
						table,td, th {
								text-align: center;
								vertical-align: middle !important;
								padding: 0px;
								margin: 0px; 
								font-size: 12px;
						}
						@media print {
								#head {
										color: #2020b7 !important;
								}
								* {
										color: #7f7fcc !important;
								}

								table, tr,td, p, th ,b,h6 {
										color: #000 !important;
								}
								.back-link {
										display: none;
								}
						}
				</style>
		</head>
		<body>
				<div class="main-wrapper">
						<div class="content-wrapper">
								<div class="content-container">

				 
										<!-- /.left-sidebar -->

										<div class="main-page">
												<div class="container-fluid">
														
														<!-- /.row -->
													
														<!-- /.row -->
												</div>
												<!-- /.container-fluid -->

												<section class="section">
														<div class="container-fluid">

																<div class="row">
															
														 
																		<div class="col-xs-12">
																						<a href="dashboard.php" class="btn btn-primary back-link">Go Home</a>

																				<div class="panel">
																						<div class="panel-heading">
																								<div class="panel-title" style="text-align: center;">
																										<h6 style="text-align: right; margin: 5px 0 10px 0px"><?php echo "$dat".$semister.$rollid;?></h6>
																										<h5 id="head" style="color: #7f7fcc !important;font-size: 30px;font-weight: bolder;margin-bottom: 10px"><i>Pt. L.M.S.Govt. Post Graduate College, Rishikesh</i></h5>
																										<p style="margin-bottom: 0;color: #7f7fcc !important;font-size: 13px;">(Autonomous College)</p>
																										<p style="margin-bottom: 0;color: #7f7fcc !important;font-size: 13px;">(Affiliated to H.N.B Garhwal University, Srinagar Garhwal)</p>
																										<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-Zx9vlMxKhQvlGobfoqStv-Yv1S-ZIvAGlmHo5MMbEa00FmAC" alt="" style="max-height:60px;">
																										<h6 style="margin-top:10px;color: #7f7fcc !important">STATEMENT OF MARKS</h6>

<?php
// code Student Data
$classid=$_POST['class'];
 $sem = $p_sem = '';
 switch ($semister) {
		case '1':
				$sem = 'sem_1';
				$p_sem = 'p_sem_1';
				$s_sem = 's_sem_1';
				$p_s_sem = 'p_s_sem_1';
				$_sem = "FIRST";
				$credit_sem = 'credit_1';
				$p_credit_sem = 'credit_p_1';
				break;
		
		case '2':
				$sem = 'sem_2';
				$p_sem = 'p_sem_2';
				$s_sem = 's_sem_2';
				$p_s_sem = 'p_s_sem_2';
				$_sem ="SECOND";
				$credit_sem = 'credit_2';
				$p_credit_sem = 'credit_p_2';
				break;
		case '3':
				$sem = 'sem_3';
				$p_sem = 'p_sem_3';
				$s_sem = 's_sem_3';
				$p_s_sem = 'p_s_sem_3';
				$_sem ="THIRD";
				$credit_sem = 'credit_3';
				$p_credit_sem = 'credit_p_3';
				break;
		case '4':
				$sem = 'sem_4';
				$p_sem = 'p_sem_4';
				$s_sem = 's_sem_4';
				$p_s_sem = 'p_s_sem_4';
				$_sem ="FOURTH";
				$credit_sem = 'credit_4';
				$p_credit_sem = 'credit_p_4';
				break;
		case '5':
				$sem = 'sem_5';
				$p_sem = 'p_sem_5';
				$s_sem = 's_sem_5';
				$p_s_sem = 'p_s_sem_5';
				$_sem ="FIFTH";
				$credit_sem = 'credit_5';
				$p_credit_sem = 'credit_p_5';
				break;
		case '6':
				$sem = 'sem_6';
				$p_sem = 'p_sem_6';
				$s_sem = 's_sem_6';
				$p_s_sem = 'p_s_sem_6';
				$_sem ="SIXTH";
				$credit_sem = 'credit_6';
				$p_credit_sem = 'credit_p_6';
				break;
		default:
				$sem = "";
				$p_sem = "";
				$s_sem = "";
				$p_s_sem = "";
				break;
}
$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$qery = "SELECT $tbl.StudentName,$tbl.FatherName,$tbl.EnrollmentId,$tbl.RollId,$tbl.RegDate,$tbl.StudentId,$tbl.Status,tblclasses.ClassName,tblclasses.Section from $tbl join tblclasses on tblclasses.id=$tbl.ClassId where $tbl.RollId=:rollid and $tbl.ClassId=:classid ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{  $studentid=$row->StudentId; ?>
		
<h6 style="text-align: center; margin: 5px 0 10px 0px"><?php echo htmlentities($row->Section)." ".$_sem." SEMISTER EXAMINATION RESULT";?></h6>
<div class="row" style="text-align: left">
<div class="col-xs-6">    
<p style="margin-bottom: 0;font-size: 15px;padding-left:5px;">NAME :<b> <?php echo htmlentities($row->StudentName);?></b></p>
<p style="margin-bottom: 0;font-size: 15px;padding-left:5px;">FATHER'S NAME :<b> <?php echo htmlentities($row->FatherName);?></b></p>
 </div>
 <div class="col-xs-6">
<p style="margin-bottom: 0;font-size: 15px;">ROLL NUMBER :<b> <?php echo htmlentities($row->RollId);?></b>
<p style="margin-bottom: 0;font-size: 15px;">Enrollment Number :<b> <?php echo htmlentities($row->EnrollmentId);?></b>
</div>
</div>
<?php }

		?>
																						</div>
																						<div class="panel-body p-20">
																								<table class="table table-hover table-bordered align-text-bottom">
																								<thead>
																												<tr>
																														<th rowspan="2">S.N</th>
																														<th rowspan="2">Subjects</th>
																														<th colspan="3">Marks Obtained</th>
																														<th rowspan="2">Credits</th>
																														<th rowspan="2">Grade Point</th>
																														<th rowspan="2">Letter Grade</th>
																														<th rowspan="2">Result</th>
																												</tr>
																												<tr>
																														<td>End Sem</td>
																														<td>Sessionals</td>
																														<td>Total</td>
																												</tr>
																							 </thead>
																										<tbody>
<?php                                              

// Code for result

 $query ="SELECT t.StudentName,t.RollId,t.ClassId,t.StudentId, t.".$sem.",t.".$p_sem.",t.".$s_sem.",t.".$p_s_sem.", t.".$credit_sem.",t.".$p_credit_sem.",SubjectId,tblsubjects.SubjectName, tblsubjects.SubjectCode, tblsubjects.hasPractical, tblsubjects.MaxTheoryMarks, tblsubjects.MaxTheorySessionalMarks, tblsubjects.MaxPracticalSessionalMarks, tblsubjects.MaxPracticalMarks from (select sts.StudentName,sts.RollId,sts.ClassId,sts.StudentId,tr.".$sem.",tr.".$p_sem.",tr.".$s_sem.",tr.".$p_s_sem.",tr.".$credit_sem.",tr.".$p_credit_sem.",SubjectId from $tbl as sts join  tblresult as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";


$query= $dbh -> prepare($query);
$query->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$totalmarks = 0;
$totalcount=0;
$totalmarks = 0;
$totalcredits = 0;
$totalgradepoints = 0;
$sgpa = 0;
$failedSubjects = array();
$failedSubjectId = array();
    $passedSubjects = array();
$passedSubjectId = array();
if($query->rowCount()>0)  { 

$student_assigned_subjects = get_student_subjects($dbh, $results[0]->StudentId, $semister);
//echo "<pre>".print_r($results, true)."</pre>";
$validSubjects = array();
if (sizeof($student_assigned_subjects) >0)
    foreach($student_assigned_subjects as $s)
        array_push($validSubjects, $s->SubjectId);
 //echo "<pre>".print_r($validSubjects, true)."</pre>";
 foreach($results as $result){
 	if (in_array($result->SubjectId, $validSubjects) && sizeof($validSubjects) >0){

		// to calculate GRADE POINT
		$credit_semm="";
		$p_credit_semm="";
		$GRADE_POINT = "";
		$GRADE_POINTP = "";
		$GRADE = "";
		$GRADEP = "";
		$STATUS = "";
		$STATUSP = "";
		$p_STATUS = "";
		$CREDITS = get_subject_credits($dbh, $result->SubjectId);
        $sc="";
		
		
		//credit sem/*
		$ab = $result->$s_sem + $result->$sem;
		$bc = $result->MaxTheoryMarks + $result->MaxTheorySessionalMarks;
		$ab /= $bc;
$c_s=$CREDITS;
        
		if($ab >= .40) {
			$credit_semm = $CREDITS;
		}
		else {
			$credit_semm = 0;
		}
		
		$pa = $result->$p_s_sem + $result->$p_sem;
		$pt = $result->MaxPracticalMarks + $result->MaxPracticalSessionalMarks;
		$pa /= $pt;
		if(has_practical($dbh, $result->SubjectId))
        {
            $p_c_s=2;
        }
        else
        {
            $p_c_s=0;
        }
		if($pa >= .40) {
			$p_credit_semm = 2;
			$p_STATUS = "PASS";
		}
		else {
			$p_credit_semm = 0;
			$p_STATUS = "FAIL";
            #$GRADE_POINTP=0;
            #$GRADEP="F";
		}

		if (has_practical($dbh, $result->SubjectId) == "1") {
				$percntagep = $result->$p_s_sem + $result->$p_sem;
				$totalmarksp = $result->MaxPracticalMarks+ $result->MaxPracticalSessionalMarks;
				$percntagep /= $totalmarksp;
				
		}

				$percntage = $result->$s_sem + $result->$sem; 
				$totalmarks = $result->MaxTheoryMarks + $result->MaxTheorySessionalMarks;
				$percntage /= $totalmarks;
		

	 // echo $percntage;
		
		if ($percntage >= .95) {
				$GRADE = "O";
				$GRADE_POINT = 10;
				$STATUS = "PASS";
            array_push($passedSubjects, $result->SubjectCode);
				array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntage >= .90){
				$GRADE = "A+";
				$GRADE_POINT = 9;
				$STATUS = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntage >= .80){
				$GRADE = "A";
				$GRADE_POINT = 8;
				$STATUS = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntage >= .70){
				$GRADE ="B+";
				$GRADE_POINT = 7;
				$STATUS = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntage >= .60){
				$GRADE = "B";
				$GRADE_POINT = 6;
				$STATUS = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntage >= .50){
				$GRADE = "C";
				$GRADE_POINT = 5;
				$STATUS = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntage >= .40){
				$GRADE = "P";
				$GRADE_POINT = 4;
				$STATUS = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				array_push($passedSubjectId, $result->SubjectId);
		}
		else{
				$GRADE = "F";
				$GRADE_POINT = 0;
				$STATUS = "FAIL";
				array_push($failedSubjects, $result->SubjectCode);
				array_push($failedSubjectId, $result->SubjectId);
		}
         if (has_practical($dbh, $result->SubjectId) == "1") {
				
				
		
        
        if ($percntagep >= .95) {
				$GRADEP = "O";
				$GRADE_POINTP = 10;
				$STATUSP = "PASS";
            array_push($passedSubjects, $result->SubjectCode);
				#array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntagep >= .90){
				$GRADEP = "A+";
				$GRADE_POINTP = 9;
				$STATUSP = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				#array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntagep >= .80){
				$GRADEP = "A";
				$GRADE_POINTP = 8;
				$STATUSP = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				#array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntagep >= .70){
				$GRADEP ="B+";
				$GRADE_POINTP = 7;
				$STATUSP = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				#array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntagep >= .60){
				$GRADEP = "B";
				$GRADE_POINTP = 6;
				$STATUSP = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				#array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntagep >= .50){
				$GRADEP = "C";
				$GRADE_POINTP = 5;
				$STATUSP = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				#array_push($passedSubjectId, $result->SubjectId);
		}
		else if ($percntagep >= .40){
				$GRADEP = "P";
				$GRADE_POINTP = 4;
				$STATUSP = "PASS";
             array_push($passedSubjects, $result->SubjectCode);
				#array_push($passedSubjectId, $result->SubjectId);
		}
		else{
				$GRADEP = "F";
				$GRADE_POINTP = 0;
				$STATUSP = "FAIL";
            $sc=$result->SubjectCode." Lab";
				array_push($failedSubjects, $sc);
				#array_push($failedSubjectId, $result->SubjectId);
		}}
        if (has_practical($dbh, $result->SubjectId) == "1") {
				
				
		}
        
		$totalcredits += $c_s + $p_c_s;
		$totalcredits1 += $credit_semm + $p_credit_semm;
		$totalgradepoints += $GRADE_POINT+$GRADE_POINTP;
		$sgpa += $GRADE_POINT*$credit_semm;
		$sgpa += $GRADE_POINTP*$p_credit_semm;

		?>
		<tr>
				<td><?=htmlentities($cnt);?></td>
				<td style="text-align: left;color: #000 !important"><i style="color: #000 !important">
				<?=htmlentities($result->SubjectName)." (".htmlentities($result->SubjectCode).")";?></i><br><br>
				Theory<br>
				<?=has_practical($dbh, $result->SubjectId)?"Lab Course": "";?>
				</td>
				
				<td><br><br><?=!has_practical($dbh, $result->SubjectId)?"<br>":""?><?=$result->$sem."/".$result->MaxTheoryMarks?><br><?=has_practical($dbh, $result->SubjectId)?$result->$p_sem."/".$result->MaxPracticalMarks: "";?></td>
				
				<td><br><br><?=$result->$s_sem?>/<?=$result->MaxTheorySessionalMarks?><br><?=has_practical($dbh, $result->SubjectId)?$result->$p_s_sem."/".$result->MaxPracticalSessionalMarks: "";?></td>
				
				<td><br><br><?=($result->$sem+$result->$s_sem)."/".($result->MaxTheorySessionalMarks+$result->MaxTheoryMarks)?><br><?=has_practical($dbh, $result->SubjectId)?($result->$p_sem+$result->$p_s_sem)."/".($result->MaxPracticalSessionalMarks+$result->MaxPracticalMarks):""?></td>
				
				<td><br><br><?=!has_practical($dbh, $result->SubjectId)?"<br>":""?><?=$credit_semm."/".($CREDITS);?><br><?=has_practical($dbh, $result->SubjectId)?$p_credit_semm."/2": "";?></td>
				<td><br><br><?=!has_practical($dbh, $result->SubjectId)?"<br>":""?><?=$GRADE_POINT;?><br><?=has_practical($dbh, $result->SubjectId)?$GRADE_POINTP: "";?></td>
				<td><br><br><?=!has_practical($dbh, $result->SubjectId)?"<br>":""?><?=$GRADE;?><br><?=has_practical($dbh, $result->SubjectId)?$GRADEP: "";?></td>
				<td valign="buttom"><br><br><?php echo $STATUS."<br>"; echo has_practical($dbh, $result->SubjectId)?$p_STATUS: "";?></td>
		</tr>

	 

		<?php 

				if (has_practical($dbh, $result->SubjectId) == "1")
						$totalmarks = $totalmarks + 100 + 50;
				else
						$totalmarks += 100; 

				$totalcount += $result->$sem + $result->$p_s_sem + $result->$s_sem + $result->$p_sem;
				$cnt++;
		
		}
	}
		?>
		<tr>
				<td colspan="5" style="text-align: left"><i style="color: #000 !important">Credits / Grade Points</i></td>
				<td><b><?=$totalcredits1;?></b></td>
				<td><b><?=$totalgradepoints;?></b></td>
				<td colspan="2"><b>SGPA: <?=number_format((float)$sgpa/$totalcredits, 2,'.','');?></b></td>
		</tr>
		<tr>
					<td colspan="9" class="text-left">
							<?php
							if (sizeof($failedSubjects) > 0) {
								echo "<i>ACADEMIC ARREAR(S):</i> ";
								foreach($failedSubjects as $sub )
									echo "<i>".$sub."</i> ";
								echo "<hr>"	;
                                foreach( $failedSubjectId as $subid){
                                $query="select * from tblback where SubjectId=$subid and StudentId=$studentid";
//$sql="Insert into tblback select * from tblresult where "
                                $query= $dbh -> prepare($query);
                                $query-> execute();  
                                $results = $query -> fetchAll(PDO::FETCH_BOTH);
                                if($query==null)
                                {
                                   $sql="Insert into tblback select * from tblresult where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute();  
                                     $sql="Insert into tblbackresult select * from tblresult where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute();  
                                }
                                    else{
                                          $sql="delete from tblback where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute();
                                        $sql="insert into tblback select * from tblresult where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute();
                                          $sql="delete from tblbackresult where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute();
                                        $sql="insert into tblbackresult select * from tblresult where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute();
                                    }
                                
							}}
    foreach($passedSubjectId as $subid)
        
    {
       $query="select * from tblback where SubjectId=$subid and StudentId=$studentid";  
         $query= $dbh -> prepare($query);
    $query-> execute();  
    $results = $query -> fetchAll(PDO::FETCH_BOTH);
        if($results)
        {
            
             $sql="delete from tblbackresult where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute();
                                        $sql="insert into tblbackresult select * from tblresult where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute();
             $sql="delete from tblback where SubjectId=$subid and StudentId=$studentid " ;
                                     $sql= $dbh -> prepare($sql);
                                $sql-> execute(); 
             
        }
    }
							?>
						<i style="color: #000 !important">SEMISTER RESULT :</i> <?=($sgpa/$totalcredits)>2.5?"<b>PROMOTED TO NEXT SEMISTER</b>":"FAIL"?>
						</td>
						</tr>
		
<!-- <tr>
		<th scope="row" colspan="2">Total Marks</th>
		<td>
				<b>
						<?php echo htmlentities($totalcount); ?>
				</b> out of <b>
						<?php echo htmlentities($outof=$totalmarks); ?>
								
						</b>
		</td>
</tr> -->
<!-- <tr>
		<th scope="row" colspan="2">Download Result</th>           
				<td>
						<b>
								<a href="download-result.php">Download </a> 
						</b>
				</td>
		</tr>
 -->
 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
																						<strong>Notice!</strong> Your result not declare yet
 <?php }
?>
																				</div>
 <?php 
 } else
 {?>

<div class="alert alert-danger left-icon-alert" role="alert">
strong>Oh snap!</strong>
<?php
echo htmlentities("Invalid Roll Id");
 }
?>
																				</div>



																									</tbody>
																								</table>
																								<div class="row" style="margin-top: 130px; text-align: left;">
																										<div class="col-xs-4">
																												<p>Principal</p>
																										</div>
																										<div class="col-xs-4">
																												<p>Checked by</p>
																										</div>
																										<div class="col-xs-4">
																												<p>Controller of Examination</p>
																										</div>
																								</div>

																						</div>
																				</div>
																				<!-- /.panel -->
																		</div>
																		<!-- /.col-xs-6 -->

																		<div class="form-group">
																													 
																													 
																												</div>

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
				<script src="js/bootstrap/bootstrap.min.js"></script>
				<script src="js/pace/pace.min.js"></script>
				<script src="js/lobipanel/lobipanel.min.js"></script>
				<script src="js/iscroll/iscroll.js"></script>

				<!-- ========== PAGE JS FILES ========== -->
				<script src="js/prism/prism.js"></script>

				<!-- ========== THEME JS ========== -->
				<script src="js/main.js"></script>
				<script>
						$(function($) {

						});
				</script>

				<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

		</body>
</html>
