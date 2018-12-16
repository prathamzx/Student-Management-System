<?php
session_start();
error_reporting(0);
include('includes/config.php');
$tbl="tblstudents".$_GET['courseid'];
$batchid = $_GET['batchid'];
$classid = $_GET['courseid'];
$semister = $_GET['semister'];
$sem = $p_sem = '';
switch ($semister) {
		case '1':
				$sem = 'sem_1';
				$p_sem = 'p_sem_1';
				$s_sem = 's_sem_1';
				$p_s_sem = 'p_s_sem_1';
				$credit_sem = 'credit_1';
				$p_credit_sem = 'credit_p_1';
				$_sem ="SECOND";
				break;
		
		case '2':
				$sem = 'sem_2';
				$p_sem = 'p_sem_2';
				$s_sem = 's_sem_2';
				$p_s_sem = 'p_s_sem_2';
				$credit_sem = 'credit_2';
				$p_credit_sem = 'credit_p_2';
				$_sem ="THIRD";
				break;
		case '3':
				$sem = 'sem_3';
				$p_sem = 'p_sem_3';
				$s_sem = 's_sem_3';
				$p_s_sem = 'p_s_sem_3';
				$credit_sem = 'credit_3';
				$p_credit_sem = 'credit_p_3';
				$_sem ="FOURTH";
				break;
		case '4':
				$sem = 'sem_4';
				$p_sem = 'p_sem_4';
				$s_sem = 's_sem_4';
				$p_s_sem = 'p_s_sem_4';
				$credit_sem = 'credit_4';
				$p_credit_sem = 'credit_p_4';
				$_sem ="FIFTH";
				break;
		case '5':
				$sem = 'sem_5';
				$p_sem = 'p_sem_5';
				$s_sem = 's_sem_5';
				$p_s_sem = 'p_s_sem_5';
				$credit_sem = 'credit_5';
				$p_credit_sem = 'credit_p_5';
				$_sem ="SIXTH";
				break;
		case '6':
				$sem = 'sem_6';
				$p_sem = 'p_sem_6';
				$s_sem = 's_sem_6';
				$p_s_sem = 'p_s_sem_6';
				$credit_sem = 'credit_6';
				$p_credit_sem = 'credit_p_6';
				
				break;
		default:
				$sem = "";
				$p_sem = "";
				$s_sem = "";
				$p_s_sem = "";
				$credit_sem = '';
				$p_credit_sem = '';
				break;
}

$sql = "select $tbl.StudentId, $tbl.StudentName, $tbl.FatherName, $tbl.EnrollmentId, $tbl.RollId, $tbl.StudentBatch, tblbackresult.SubjectId, tblbackresult.".$sem.", tblbackresult.".$p_sem.", tblbackresult.".$s_sem.", tblbackresult.".$p_s_sem.", tblbackresult.".$credit_sem.", tblbackresult.".$p_credit_sem." from $tbl inner join tblbackresult on $tbl.StudentId = tblbackresult.StudentId AND $tbl.classid = :classid AND $tbl.StudentBatch = :batchid AND $tbl.Status = 1";
//echo $sql;
$query = $dbh->prepare($sql);
$query->bindParam(':batchid', $batchid, PDO::PARAM_STR);
$query->bindParam(':classid', $classid, PDO::PARAM_STR);
$query->execute();

$result = $query->fetchAll(PDO::FETCH_OBJ);
//echo $query->rowCount();
if ($query->rowCount() > 0 ) {
	$id = $result[0]->StudentId;
	$students = array();
	$student = array();

	for ($i=0; $i<$query->rowCount(); $i++) {
		$students[$result[$i]->StudentId][] = $result[$i];
		//echo "<br> Checking".$result[$i]->SubjectId;
	}
	//array_push($student, $result[$]);
	//echo "<pre>".print_r($students, true)."</pre>";


}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    				<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Add Result </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>
        	hr {
        		border-top: 1px solid;
			    border-color: grey;
			    width: 102%;
			    margin: 0 0 0 -10px;
        	}
        </style>
        </head>
        <body>
<div class="row" style="margin-bottom: 0;text-align: center;">
	<div class="col-md-12 text-center" >
		<h4><b>Pt. L.M.S Govt. Post Graduate College, Rishikesh (Autonomus College)</b></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center" style="text-align: center;">
		<h5 style="margin-top:0"><b>Tabulation chart for <?=get_course_name($dbh, $classid);?>, Batch: <?php $b = get_batch($dbh, $batchid); echo $b[0]->BatchStart."-".$b[0]->BatchEnd;?>, Semister: <?=$semister?></b></h5>
	</div>
</div>
<table border="1" style="font-size: 10px; text-align: center;">
			<thead>
				<tr>
				<th rowspan="2">SL <br>ROLL NO. <br>ENROLLMENT NO. <br>MARKSHEET NO </th>
				<th rowspan="2">NAME <br> FATHER'S NAME</th>
				<th rowspan="2">SUBJECT/<br>COURSE CODE</th>
				<th colspan="2" >END SEMISTER</th>
				<th colspan="2" >SESSIONALS</th>
				<th colspan="3" >TOTAL</th>
				<th rowspan="2">COURSE CREDIT</th>
				<th rowspan="2">CREDIT SCORED</th>
				<th rowspan="2">GRADE POINT</th>
				<th rowspan="2">LETTER GRADE</th>
				<th rowspan="2">RESULT</th>
				</tr>
				<tr>
					<th>MAX MARKS</th>
					<th>MARKS OBTAINED</th>
					<th>MAX MARKS</th>
					<th>MARKS OBTAINED</th>
					<th>MAX MARKS </th>
					<th>MIN MARKS </th>
					<th>MARKS OBTAINED</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$GRADE_POINT = 0;
						$GRADE = "";
						$STATUS = "";
						$totalmarks=0;
						$totalgradepoints = 0;
						$totalcredits = 0;
						$sgpa = 0;
						$totalcreditscored = 0;
						//echo "<pre>".print_r($students, true)."</pre>";

					foreach($students as $ss => $s) {
						$subcount = sizeof($s);
						//echo "<pre>".print_r($s, true)."</pre>";
						$credit_semm="";
						$p_credit_semm="";
						$totalcreditscored = 0;
						$totalgradepoints = 0;
						$totalcredits = 0;
						$sgpa = 0;
						$totalmarks= 0;
						$totalC = 0;
						$student_assigned_subjects = get_student_subjects($dbh, $s[0]->StudentId, $semister);
						$validSubjects = array();
						if (sizeof($student_assigned_subjects) >0)
						    foreach($student_assigned_subjects as $x)
						        array_push($validSubjects, $x->SubjectId);
						

						?>
						<tr>
							<td rowspan="<?=$subcount+2?>"><?=$ss+1?> <br><?=$s[0]->RollId?><br> <?=$s[0]->EnrollmentId?> <br>0-150986</td>
							<td rowspan="<?=$subcount+2?>"><?=$s[0]->StudentName?> <br><?=$s[0]->FatherName?></td>
							
</tr>
						<?php
						$failedSubjects = array();
						

						for ($i=0; $i<$subcount; $i++) {
							$p_credit_semm=0;
							$credit_semm=0;
								if (in_array($s[$i]->SubjectId, $validSubjects) && sizeof($validSubjects) >0){
		
							$CREDITS = get_subject_credits($dbh, $s[$i]->SubjectId);
							$sub = get_subject($dbh, $s[$i]->SubjectId);

							//echo "<pre>".print_r($sub, true)."</pre>";
							if (has_practical($dbh, $s[$i]->SubjectId) == "1") {
									$percntage = $s[$i]->$s_sem + $s[$i]->$sem + $s[$i]->$p_s_sem + $s[$i]->$p_sem;
									$totalmarks = $sub[0]->MaxTheoryMarks + $sub[0]->MaxTheorySessionalMarks + $sub[0]->MaxPracticalMarks+ $sub[0]->MaxPracticalSessionalMarks;
									$percntage /= $totalmarks;
									
							}
							else {
									$percntage = $s[$i]->$s_sem + $s[$i]->$sem; 
									$totalmarks = $sub[0]->MaxTheoryMarks + $sub[0]->MaxTheorySessionalMarks;
									$percntage /= $totalmarks;
							}

							//credit sem/*
		$ab = $s[$i]->$s_sem + $s[$i]->$sem;
		$bc = $sub[0]->MaxTheoryMarks + $sub[0]->MaxTheorySessionalMarks;
		$ab /= $bc;

		if($ab >= .40) {
			$credit_semm = $CREDITS;
		}
		else {
			$credit_semm = 0;
		}
		
		$pa = $s[$i]->$p_s_sem + $s[$i]->$p_sem;
		$pt = $sub[0]->MaxPracticalMarks + $sub[0]->MaxPracticalSessionalMarks;
		$pa /= $pt;
		
		if($pa >= .40) {
			$p_credit_semm = 2;
		}
		else {
			$p_credit_semm = 0;
		}

						 // echo $percntage;
							
							if ($percntage >= .95) {
									$GRADE = "O";
									$GRADE_POINT = 10;
									$STATUS = "PASS";
							}
							else if ($percntage >= .90){
									$GRADE = "A+";
									$GRADE_POINT = 9;
									$STATUS = "PASS";
							}
							else if ($percntage >= .80){
									$GRADE = "A";
									$GRADE_POINT = 8;
									$STATUS = "PASS";
							}
							else if ($percntage >= .70){
									$GRADE ="B+";
									$GRADE_POINT = 7;
									$STATUS = "PASS";
							}
							else if ($percntage >= .60){
									$GRADE = "B";
									$GRADE_POINT = 6;
									$STATUS = "PASS";
							}
							else if ($percntage >= .50){
									$GRADE = "C";
									$GRADE_POINT = 5;
									$STATUS = "PASS";
							}
							else if ($percntage >= .40){
									$GRADE = "P";
									$GRADE_POINT = 4;
									$STATUS = "PASS";
							}
							else{
									$GRADE = "F";
									$GRADE_POINT = 0;
									$STATUS = "FAIL";
									array_push($failedSubjects, $sub[0]->SubjectCode);
							}
							$totalcredits += $credit_semm + $p_credit_semm;
							$totalC += $CREDITS;
							$totalgradepoints += $GRADE_POINT;
							$sgpa += $GRADE_POINT*($credit_semm + $p_credit_semm);
//echo "<b><br>".$sgpa."</b>"


							?>
							<tr>
								<td><?php $sub = get_subject($dbh, $s[$i]->SubjectId); echo $sub[0]->SubjectCode;?><br>THEORY</td>
								<td><?=($sub != null?$sub[0]->SubjectName:"null")?> <br><?=$sub[0]->MaxTheoryMarks?></td>

								<td><?=$s[$i]->$sem?></td>
								<td><?=$sub[0]->MaxTheorySessionalMarks?></td>
								<td><?=$s[$i]->$s_sem?></td>
								<td><?=$sub[0]->MaxTheoryMarks+$sub[0]->MaxTheorySessionalMarks?></td>
								<td><?=.4*($sub[0]->MaxTheoryMarks+$sub[0]->MaxTheorySessionalMarks)?></td>
								<td><?=$s[$i]->$sem+$s[$i]->$s_sem?></td>
								<td><?=$CREDITS?></td>
								<td><?= $s[$i]->$credit_sem + $s[$i]->$p_credit_sem?></td> <!-- ADD CREDIT FUNCTIONALITY-->
								<td><?=$GRADE_POINT?></td>
								<td><?=$GRADE?></td>
								<td><?=$STATUS?></td>
							</tr>
							<?php
						}
					}
						//echo "<pre>".print_r($failedSubjects, true)."</pre>";
	
					?>
		<tr>
					<td colspan="8" class="text-left"><i><b>CREDIT/GRADE POINTS:</b></i></td>
					<td><?=$totalC?></td>
					<td><?=$totalcredits?></td>
					<td><?=$totalgradepoints?></td>
					<td rowspan="2" colspan="2">SGPA <br>
					<?php 
						if ($totalcredits != 0)
							echo number_format((float)$sgpa/$totalcredits, 2,'.','');
						else
							echo 0;  
							//number_format((float)$sgpa/$totalcredits, 2,'.',''); 
					?>
					</td>

				</tr>
				<tr>
					<td colspan="11" class="text-left">
							<?php
							if (sizeof($failedSubjects) > 0) {
								echo "<i>ACADEMIC ARREAR(S):</i> ";
								foreach($failedSubjects as $sub)
									echo "<i>".$sub."</i> ";
								echo "<hr>"	;
							}
							?>
						<i><b>SEMISTER RESULT :</b></i> <?=($sgpa/$totalcredits)>2.5?"<b>PROMOTED TO ".$_sem." SEMISTER</b>":"FAIL"?></td>
						</tr>
						<?php
					}

				?>

				
			</tbody>
		</table>        	
	    </body>
</html>