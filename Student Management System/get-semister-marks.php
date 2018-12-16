<?php 
include('includes/config.php');
session_start();
$t = explode('$', $_POST['data']);
$stid = $t[0];
$sem = $p_sem = $s_sem ="";
$tbl="tblstudents".$_SESSION['active_class'];
$student_assigned_subjects = get_student_subjects($dbh, $stid, $t[1]);
 
$validSubjects = array();
if (sizeof($student_assigned_subjects) >0)
    foreach($student_assigned_subjects as $s)
        array_push($validSubjects, $s->SubjectId);

// echo "<pre>".print_r($validSubjects, true)."</pre>";
  
switch ($t[1]) {
  case '1':
        $sem = 'sem_1';
        $p_sem = 'p_sem_1';
        $t_s_sem = 's_sem_1';
        $p_s_sem = 'p_s_sem_1';
        break;
    
    case '2':
        $sem = 'sem_2';
        $p_sem = 'p_sem_2';
        $t_s_sem = 's_sem_2';
        $p_s_sem = 'p_s_sem_2';
        break;
    case '3':
        $sem = 'sem_3';
        $p_sem = 'p_sem_3';
        $t_s_sem = 's_sem_3';
        $p_s_sem = 'p_s_sem_3';
        break;
    case '4':
        $sem = 'sem_4';
        $p_sem = 'p_sem_4';
        $t_s_sem = 's_sem_4';
        $p_s_sem = 'p_s_sem_4';
        break;
    case '5':
        $sem = 'sem_5';
        $p_sem = 'p_sem_5';
        $t_s_sem = 's_sem_5';
        $p_s_sem = 'p_s_sem_5';
        break;
    case '6':
        $sem = 'sem_6';
        $p_sem = 'p_sem_6';
        $t_s_sem = 's_sem_6';
        $p_s_sem = 'p_s_sem_6';
        break;
    default:
        $sem = "";
        $p_sem = "";
        $s_sem = "";
        $p_s_sem = "";
        break;
}
//$tbl="tblstudents".$_SESSION['active_class'];
//echo $stid." ".$sem ;
$sql = "SELECT distinct $tbl.StudentName,$tbl.StudentId,tblsubjects.MaxTheoryMarks, tblsubjects.MaxPracticalMarks, tblsubjects.MaxTheorySessionalMarks, tblsubjects.MaxPracticalSessionalMarks,tblclasses.ClassName,tblclasses.Section,tblsubjects.SubjectName,tblsubjects.hasPractical,tblsubjects.id, tblresult.$sem as marks,$p_sem as p_marks,tblresult.$t_s_sem as t_s_marks, tblresult.$p_s_sem as p_s_marks, tblresult.id as resultid from tblresult join $tbl on $tbl.StudentId=tblresult.StudentId join tblsubjects on tblsubjects.id=tblresult.SubjectId join tblclasses on tblclasses.id=$tbl.ClassId where $tbl.StudentId=:stid";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result){  
    if (in_array($result->id, $validSubjects) && sizeof($student_assigned_subjects) >0) {

    ?>



<div class="form-group">
<label for="default" class="col-sm-2 control-label"><?php echo htmlentities($result->SubjectName)?></label>
<div class="col-sm-5">
<input type="hidden" name="id[]" value="<?php echo htmlentities($result->resultid)?>">
<label for="" class="form-control-">Theory (out of <?=$result->MaxTheoryMarks?>)</label>
<input type="number" name="marks[]" class="form-control" id="marks" value="<?php echo htmlentities($result->marks)?>" min="0" max="<?=$result->MaxTheoryMarks;?>" required="required" autocomplete="off">
</div>
<div class="col-md-5">
	<?php $_SESSION['check']=$result->hasPractical;
		if (htmlentities($result->hasPractical) == 1) {
			?>
			<label for="" class="form-control-">Practical (out of <?=$result->MaxPracticalMarks?>)</label>
<input type="number" name="practical-marks[]" class="form-control" id="marks" value="<?php echo htmlentities($result->p_marks)?>" min="0" max="<?=$result->MaxPracticalMarks;?>" required="required" autocomplete="off">

			<?php
		}
	?>
</div>
<div class="col-md-offset-2 col-sm-5">
<label for="" class="form-control-">Theory - Sessional (out of <?=$result->MaxTheorySessionalMarks?>)</label>
<input type="number" name="sessional-t-marks[]" class="form-control" id="marks" value="<?php echo htmlentities($result->t_s_marks)?>" min="0" max="<?=$result->MaxTheorySessionalMarks;?>" required="required" autocomplete="off">
</div>
<div class="col-md-5">
	<?php 
		if (htmlentities($result->hasPractical) == 1) {
			?>
			<label for="" class="form-control-">Practical - Sessional (out of <?=$result->MaxPracticalSessionalMarks?>)</label>
<input type="number" name="sessional-p-marks[]" class="form-control" id="marks" value="<?php echo htmlentities($result->p_s_marks)?>" min="0" max="<?=$result->MaxPracticalSessionalMarks;?>" required="required" autocomplete="off">

			<?php
		}
	?>
</div>
</div>
</div>




<?php }
}
} ?> 