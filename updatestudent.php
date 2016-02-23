<?php
	//////
	
	include('header.php');
	
	if(isset($_POST)){
			
			$ticketNo=$_POST['ticketNo'];
			$idno=$_POST['idno'];
			$familyName=$_POST['familyName'];
			$firstName=$_POST['firstName'];
			$course=$_POST['course'];
			
			$message=addStudent($ticketNo,$idno,$familyName,$firstName,$course);
		
			header("location:addStudent.php?message=".$message);
	}
	
?>