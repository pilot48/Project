<?php
session_start();
if(!$_SESSION['admin']==1)
	{
		header("Location: index.php");
		}
		else
		{
			$msg = "Welcome Username ".$_SESSION['email'];
	}
	if(isset($_GET['logout'])==1)
	{
		session_destroy();
		header("Location: index.php");
		die();
	}
	
	if(isset($_GET['delete'])==1)
		{
			@ $db = new mysqli('localhost', 'root','','e_book_db');
		
		   if (mysqli_connect_errno()) {
			 echo "Error: Could not connect to database.  Please try again later.";
			 exit;
		   }
		   
			$query="delete from products where id='".$_GET['delete']."' ";
			$result = $db->query($query);
			//$num_results = $result->num_rows;
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPN Book Shop Home</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
</head>


<body onload="MM_preloadImages('Images/download (16).jpg','Images/download (7).jpg')" >

<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
             <li><a href="admin.php" class="current">Admin</a></li>
            <li><a href="users.php">View Users</a></li>
            <li><a href="add_book.php">Add Books</a></li>            
            <li><a href="view_book.php">View Books</a></li> 
          <li><a href="view_book.php?logout=1">Logout</a></li> 
           
    	</ul>
    </div> <!-- end of menu -->
    
<div id="templatemo_header">
   	  <div id="templatemo_special_offers">
       	<p>
                <span>10%</span> discounts for
        purchase over R800</p>
       	<p align="center">&nbsp;</p>
   	  </div>
        
        
    <div id="templatemo_new_books">
   	  <ul>
                <li>Dreamweaver CS6</li>
                <li>Flash cs6</li>
                <li>html5 and css3 </li>
                <li>PHP and MySQL</li></ul></div>
  </div>
    <!-- end of header -->
    
  <div id="templatemo_content"><!-- end of content left -->
<p><!--- copy --></p>
<h2 align="center"><strong>ALL BOOKS</strong></h2>
    <p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
        <p align="center"><?php

 @ $db = new mysqli('localhost', 'root', '','e_book_db');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
  $query = "select * from products";		
	$result = $db->query($query);
	$num_results = $result->num_rows;
	
	//echo "<p>Number of items found: ".$num_results."</p>";
	echo "<table  border='15'>";
		echo "<tr>";
		echo "<th scope='row' bgcolor='#996600'>". "Image: ";
		echo "<th scope='row' bgcolor='#996600'>". "Product Name: ";
		echo "<th scope='row' bgcolor='#996600'>"."<br />Detail: ";
		echo "<th scope='row' bgcolor='#996600'>"." <br />Cartegory: ";
		echo "<th scope='row' bgcolor='#996600'>"."<br />Author: ";
		echo "<th scope='row' bgcolor='#996600'>"." <br />ISBN: ";
		echo "<th scope='row' bgcolor='#996600'>"." <br />Price: ";
		echo "<th scope='row' bgcolor='#996600'>"." <br />Delete: ";
		echo "</tr>";
	for ($i=0; $i <$num_results; $i++) {
	$row = $result->fetch_assoc();
	echo "<tr>";
	$id=stripslashes($row['id']);
	echo "<td>"."<img width='80' height='80' src='book_image/$id.jpg'>";
	echo "<td>".htmlspecialchars(stripslashes($row['product_name']));
	echo "<td>".stripslashes(stripslashes($row['detail_text']));
	echo "<td>".stripslashes(stripslashes($row['cartegory'])) ;
	echo "<td>".stripslashes(stripslashes($row['author']));
	echo "<td>".stripslashes(stripslashes($row['ISBN'])) ;
	echo "<td>".stripslashes(stripslashes($row['price']));
	echo "<td>".'<a href="view_book.php?delete='.$id.'" >delete</a>'."</strong></p>";
	
	
	}echo "</tr>";
	echo "</table>";
$result->free();
$db->close();
?>&nbsp; </p>
        <p>
          <!-- End of copy --><!-- end of content right -->
          
    </p>
        <a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" width="894" height="102" /></a></div> 
    <!-- end of content -->
    
    <div id="templatemo_footer">Copyright © 2013 <strong>SPN Company</strong></div> 
    <!-- end of footer -->

</div> <!-- end of container -->
</body>
</html>