<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project";
  
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  
  // $conn = mysqli_connect("sql100.epizy.com", "epiz_33880372", "BwcOpZ1bRKJQ", "epiz_33880372_treetrading");
  
  if(!$conn){
	  
	    die("Connection failed: " . mysqli_connect_error());
  }
  
  else{
  //echo "connected";
  }
  
?>
