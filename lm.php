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
				if($row['idno']!=0 && $row['campus']=='LM' && $row['attended']==1){
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
    
    echo getAllJSON();
	
	
?>


