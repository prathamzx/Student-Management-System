<?php
session_start();
include('includes/config.php');
$msg = $error = "";
$tbl="tblstudents".$_SESSION['active_class'];
if(!empty($_POST["classid"])) 
{
 $cid=intval($_POST['classid']);
 if(!is_numeric($cid)){
 
 	echo htmlentities("invalid Class");exit;
 }
 else{
 $stmt = $dbh->prepare("SELECT StudentName,StudentId,EnrollmentId FROM $tbl WHERE ClassId= :id AND status = 1 order by StudentName");
 $stmt->execute(array(':id' => $cid));
 ?><option value="">Select Category </option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
  <option value="<?php echo htmlentities($row['StudentId']);  ?>"><?php echo htmlentities($row['StudentName']." (".htmlentities($row['EnrollmentId']).")"); ?></option>
  <?php
 }
}

}
// Code for Subjects
if(!empty($_POST["classid1"])) 
{
  $arr = explode("$",$_POST['classid1']);
  $cid1 = $arr[0];
  $studentId = $arr[1];
  $sem = $arr[2];
//  echo "<script>console.log(".$studentId.")</script>";
 $cid1=intval($_POST['classid1']);
 if(!is_numeric($cid1)){
 
  echo htmlentities("invalid Class");exit;
 }
 else{

  $student_assigned_subjects = get_student_subjects($dbh, $studentId, $sem);
  //echo "<pre>".print_r($student_assigned_subjects, true)."</pre>";
  $validSubjects = array();
  if (sizeof($student_assigned_subjects) > 0)
    foreach($student_assigned_subjects as $s)
      array_push($validSubjects, $s->SubjectId);

  //echo "<pre>".print_r($validSubjects, true)."</pre>";
 

 $status = 0;	
 $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName,tblsubjects.MaxTheoryMarks, tblsubjects.MaxTheorySessionalMarks,tblsubjects.MaxPracticalMarks, tblsubjects.MaxPracticalSessionalMarks,tblsubjects.hasPractical,tblsubjects.id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=:cid and tblsubjectcombination.status!=:stts order by tblsubjects.SubjectName");
 $stmt->execute(array(':cid' => $cid1,':stts' => $status));
//echo "SELECT tblsubjects.SubjectName,tblsubjects.MaxTheoryMarks, tblsubjects.MaxTheorySessionalMarks,tblsubjects.MaxPracticalMarks, tblsubjects.MaxPracticalSessionalMarks,tblsubjects.hasPractical,tblsubjects.id, tblsubjects.SubjectCredit FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=:cid and tblsubjectcombination.status!=:stts order by tblsubjects.SubjectName";
//echo $cid1.$status;

//echo "<pre>".print_r($validSubjects, true)."</pre>";

 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  if (in_array($row['id'], $validSubjects) && sizeof($student_assigned_subjects) > 0) {
 	if ($row['hasPractical'] == 1 ) {
 ?>

  <p class="col-md-6"> 
	  <?php echo htmlentities("Theory - ".$row['SubjectName']); ?>
	  <input type="number"  name="marks[]" value="" class="form-control" required="" placeholder="Enter marks out of <?=$row['MaxTheoryMarks']?>" autocomplete="off" min="0" max="<?=$row['MaxTheoryMarks']?>">
  </p>

  <p class="col-md-6">
	  <?php echo htmlentities("Practical - ".$row['SubjectName']); ?>
	  <input type="number"  name="practical-marks[]" value="" class="form-control" required="" placeholder="Enter marks out of <?=$row['MaxPracticalMarks']?>" autocomplete="off" min="0" max="<?=$row['MaxPracticalMarks']?>">
	</p>
	<p class="col-md-6">
		<?php echo htmlentities("Theory Sessionals - ".$row['SubjectName']); ?>
	  <input type="number"  name="theory-s-marks[]" value="" class="form-control" required="" placeholder="Enter marks out of <?=$row['MaxTheorySessionalMarks']?>" autocomplete="off" min="0" max="<?=$row['MaxTheorySessionalMarks']?>">	
	</p>
	<p class="col-md-6">
	  <?php echo htmlentities("Practical Sessionals - ".$row['SubjectName']); ?>
	  <input type="number"  name="practical-s-marks[]" value="" class="form-control" required="" placeholder="Enter marks out of <?=$row['MaxPracticalSessionalMarks']?>" autocomplete="off" min="0" max="<?=$row['MaxPracticalSessionalMarks']?>">
	</p>
	<hr>


<?php
}  

	else {
		?>
	<p class="col-md-12">
	  <?php echo htmlentities($row['SubjectName']); ?>
	  <input type="number"  name="marks[]" value="" class="form-control" required="" placeholder="Enter marks out of <?=$row['MaxTheoryMarks']?>" autocomplete="off" min="0" max="<?=$row['MaxTheoryMarks']?>"> 
	</p>

	<p class="col-md-12">
		<?php echo htmlentities("Theory Sessionals - ".$row['SubjectName']); ?>
	  <input type="number"  name="theory-s-marks[]" value="" class="form-control" required="" placeholder="Enter marks out of <?=$row['MaxTheorySessionalMarks']?>" autocomplete="off" min="0" max="<?=$row['MaxTheorySessionalMarks']?>">	
	</p>

	<hr>	
	<?php }
}
	}
	}
}

?>

<?php

if(!empty($_POST["studclass"])) 
{
  $id = $_POST['studclass'];
  $dta = explode("$",$id);
  $id = $dta[0];
  $id1 = $dta[1];
  $studentId = $id1;
  $id2 = $dta[2];
  $sem="";
  switch ($id2) {
    case '1':
        $sem = 'sem_1';
        $p_sem = 'p_sem_1';
        break;
    
    case '2':
        $sem = 'sem_2';
        $p_sem = 'p_sem_2';
        break;
    case '3':
        $sem = 'sem_3';
        $p_sem = 'p_sem_3';
        break;
    case '4':
        $sem = 'sem_4';
        $p_sem = 'p_sem_4';
        break;
    case '5':
        $sem = 'sem_5';
        $p_sem = 'p_sem_5';
        break;
    case '6':
        $sem = 'sem_6';
        $p_sem = 'p_sem_6';
        break;
    default:
        $sem = "";
        $p_sem = "";
        break;
}
$qq = "SELECT StudentId,ClassId FROM tblresult WHERE StudentId=:id1 and ClassId=:id and ".$sem.">0";
 $query = $dbh->prepare($qq);
//$query= $dbh -> prepare($sql);
$query-> bindParam(':id1', $id1, PDO::PARAM_STR);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{ ?>
<p>
<?php
echo "<span style='color:red'> Result Already Declare .</span>";
echo "<script>$('#submit').prop('disabled',true);</script>";
 ?></p>
<?php }

else {
	echo "<script>$('#submit').prop('disabled',false);</script>";
}


  }?>


