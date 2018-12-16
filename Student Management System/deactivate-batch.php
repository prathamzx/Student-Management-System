<?php

	require_once('./includes/config.php');
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$sql = "UPDATE tblbatches SET isActive = 0 WHERE id = :id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();

		if ($query->rowCount() > 0)
			header('Location: manage-batches.php');
		else
			echo "Error occured!";
	}
?>