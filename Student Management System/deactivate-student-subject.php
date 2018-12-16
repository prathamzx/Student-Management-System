<?php

	require_once('./includes/config.php');
	
	if (isset($_GET['sem']) && isset($_GET['studentid']) && isset($_GET['subjectid'])) {
		$sem = $_GET['sem'];
		$studentid = $_GET['studentid'];
		$subjectid = $_GET['subjectid'];

		$sql = "UPDATE studentsubjects  SET Status = 0 WHERE StudentId = :studentid AND SubjectId =:subjectid AND Semister=:sem ";
		echo $sql."-".$studentid."-".$subjectid."-".$sem;
		$query = $dbh->prepare($sql);
		$query->bindParam(':sem', $sem, PDO::PARAM_STR);
		$query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
		$query->bindParam(':subjectid', $subjectid, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		echo $lastInsertId;

		if ($query->rowCount() > 0)
			header('Location: manage-student-subjects.php?student-id='.$studentid.'&semister='.$sem.'&submit=');
			
		else
			echo "Error occured!";
	}
?>