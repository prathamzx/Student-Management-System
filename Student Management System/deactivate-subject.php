<?php

	require_once('./includes/config.php');
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$sql = "UPDATE tblsubjects SET status = 0 WHERE id = :id";
		$sql2 = "UPDATE tblsubjectcombination SET status = 0 WHERE SubjectId=:id";
		$query = $dbh->prepare($sql);
		$query2 = $dbh->prepare($sql2);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query2->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$query2->execute();
		//echo $sql2;

		if ($query->rowCount() > 0 && $query2->rowCount() > 0)
			header('Location: manage-subjects.php');
		else
			echo "Error occured!";
	}
?>