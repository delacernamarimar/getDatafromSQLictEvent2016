<?php

	$hostname="localhost";
	$username="root";
	$password="";
	$database="ictcongress";
	
	$db;
	
	function connect(){
		global $hostname,$username,$password,$database,$db;
		mysql_connect($hostname,$username,$password) or die("Connection Error");		
		$db=mysql_select_db($database) or die('Database unavailable');
	}
	
	function close(){
		global $db;
		mysql_close($db);
	}
	
	function getAllJSON(){
		connect();
		$sql="SELECT * FROM students order by campus,familyName ";
		$container["student"]=array();
		$query=mysql_query($sql) or die('SQL Error');
			while($row=mysql_fetch_assoc($query)){
				if($row['idno']!=0){
					$item=array();
					$item['ticketNo']=$row['ticketNo'];
					$item['campus']=$row['campus'];
					$item['idno']=$row['idno'];
					$item['familyName']=$row['familyName'];
					$item['firstName']=$row['firstName'];
					$item['course']=$row['course'];
					$item['attended']=$row['attended'];
					array_push($container["student"],$item);
				}
			}
		//close();		
		return json_encode($container);
	}
	
	function getAll(){
		connect();
		$sql="SELECT * FROM students order by campus,familyName ";
		$query=mysql_query($sql) or die('SQL Error');
		echo "<table align='center' border width='100%'>";
			echo "<thead>";
				echo "<caption>ICT Congress 2016</caption>";
				echo "<tr>";
					echo "<th>TICKET NO</th>";
					echo "<th>CAMPUS</th>";
					echo "<th>IDNO</th>";
					echo "<th>FAMILY NAME</th>";
					echo "<th>FIRST NAME</th>";
					echo "<th>COURSE</th>";
					echo "<th>ATTENDED</th>";
					
				echo "</tr>";
			echo "</thead>";
			while($row=mysql_fetch_assoc($query)){
				echo "<tr>";
					echo "<td>".$row['ticketNo']."</td>";
					echo "<td>".$row['campus']."</td>";
					echo "<td>".$row['idno']."</td>";
					echo "<td>".$row['familyName']."</td>";
					echo "<td>".$row['firstName']."</td>";
					echo "<td>".$row['course']."</td>";
					echo "<td align='center'>";
					if($row['attended']==0) 
						echo "<input type='checkbox' >";
					else							
						echo "<input type='checkbox' checked>";
					echo "</td>";
				echo "</tr>";
			}
		echo '</table>';
		close();
	}
	
	function addStudent($ticketNo,$idno,$familyName,$firstName,$course){
		connect();
		$sql="UPDATE students set idno='$idno',familyName='$familyName',firstName='$firstName',course='$course' WHERE ticketNo='$ticketNo'";
		$message=(mysql_query($sql))? "New Student Added" : "Error Adding";
		close();
		return $message;
	}
	
?>


