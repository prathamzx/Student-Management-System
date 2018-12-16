<?php 


// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','srms');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


function get_subject_at_result_row($dbh, $id) {

	$sql = "SELECT * FROM tblresult WHERE id=:id";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':id', $id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	return $res[0]->SubjectId;
}

function has_practical($dbh, $sub_id) {
	$sql = "SELECT * FROM tblsubjects WHERE id=:id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id', $sub_id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	return $res[0]->hasPractical;
}

function get_subject_credits($dbh, $sub_id) {
	$sql = "SELECT * FROM tblsubjects WHERE id=:id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id', $sub_id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);
	
	return $res[0]->SubjectCredit;	
}

function get_batches($dbh) {
	$sql = "SELECT * FROM tblbatches WHERE isActive = 1";
	$query = $dbh->prepare($sql);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res;
	else
		return null;
}

function get_batch($dbh, $id) {
	$sql = "SELECT * FROM tblbatches WHERE id=:id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id', $id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res;
	else
		return null;
}

function get_batch_id($dbh,$start,$end) {
	$sql = "SELECT id FROM tblbatches WHERE BatchStart=:batchstart AND BatchEnd=:batchend";
	$query = $dbh->prepare($sql);
	$query->bindParam(':batchstart', $start, PDO::PARAM_STR);
	$query->bindParam(':batchend', $end, PDO::PARAM_STR);
	$query->execute();
	$res = $$query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res[0]->id;
	else
		return null;
}

function get_all_courses($dbh) {

	$sql = "SELECT * From tblclasses";
	$query = $dbh->prepare($sql);
	//$query->bindParam(':id', $id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res;
	else
		return null;

}

function get_subject($dbh, $id) {
	$sql = "SELECT * FROM tblsubjects WHERE id = :id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id', $id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res;
	else
		return null;
}

function get_subject_name($dbh, $id) {
	$sql = "SELECT SubjectName FROM tblsubjects WHERE id = :id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id', $id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res[0]->SubjectName;
	else
		return null;
}
function get_subject_number($dbh, $id) {
	$sql = "SELECT subjectnumber FROM tblsubjects WHERE id = :id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id', $id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res[0]->subjectnumber;
	else
		return null;
}
function get_student_name($dbh, $id) {
    $tbl="tblstudents".$_SESSION['active_class'];
	$sql = "SELECT StudentName FROM tblstudents WHERE StudentId = :id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id', $id, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res[0]->StudentName;
	else
		return null;
}


function get_credit($dbh, $studentid, $subjectid, $sem) {
	$sql = "SELECT Credit FROM tblcredits WHERE StudentId = :stid AND SubjectId = :subid AND Semister = :sem";
	$query = $dbh->prepare($sql);
	$query->bindParam(':stid', $studentid, PDO::PARAM_STR);
	$query->bindParam(':subid', $subjectid, PDO::PARAM_STR);
	$query->bindParam(':sem', $sem, PDO::PARAM_STR);
	
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res[0]->Credit;
	else
		return null;
	
}

function get_class_id($dbh, $school) {
	$sql = "SELECT id FROM tblclasses WHERE Section = :classname";
	$query = $dbh->prepare($sql);
	$query->bindParam(':classname', $school, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res[0]->id;
	else
		return null;
}

function get_course_name ($dbh,$classid) {
	$sql = "SELECT ClassName, Section FROM tblclasses WHERE id = :classid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':classid', $classid, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res[0]->ClassName.' ('.$res[0]->Section.')';
	else
		return null;
}

function get_all_subject_with_course_id($dbh, $courseid) {
	$sql = "SELECT SubjectId FROM tblsubjectcombination WHERE ClassId = :classid AND status = 1";
	$query = $dbh->prepare($sql);
	$query->bindParam(':classid', $courseid, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);
	$subjects = array();
	
	//echo "<pre>".print_r($res, true)."</pre>";

	if ($query->rowCount() > 0){
		foreach ($res as $key => $subject) {
			array_push($subjects, [$subject->SubjectId, get_subject_name($dbh, $subject->SubjectId),get_subject_number($dbh, $subject->SubjectId)]);
		}

		return $subjects;
	}

	return null;
}

function get_all_students_with_course_id($dbh, $courseid) {
    $tbl="tblstudents".$courseid;
 	$sql = "SELECT StudentName, RollId, StudentId FROM $tbl WHERE ClassId = :classid AND Status = 1";
 	$query = $dbh->prepare($sql);
	$query->bindParam(':classid', $courseid, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);
	$students = array();

	
	//echo "<pre>".print_r($res, true)."</pre>";

	if ($query->rowCount() > 0){
		foreach ($res as $key => $student) {
			array_push($students, [$student->StudentId, $student->StudentName, $student->RollId]);
		}

		return $students;
	}

	return null;
}

function get_student_subjects($dbh, $studentid, $semister) {
	$sql = "SELECT * FROM studentsubjects WHERE StudentId = :studentid  AND Semister = :semister AND status = 1";
	$query = $dbh->prepare($sql);
	$query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
	$query->bindParam(':semister', $semister, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res;
	return null; 
}

function get_all_main_courses($dbh) {
	$sql = "SELECT DISTINCT  ClassName FROM tblclasses";
	$query = $dbh->prepare($sql);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res;
	return null;	
}

function get_all_sections($dbh, $classname) {
	$sql = "SELECT  id, Section FROM tblclasses WHERE ClassName = :id";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id', $classname, PDO::PARAM_STR);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_OBJ);

	if ($query->rowCount() > 0)
		return $res;
	return null;	
}
?>