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
		   
			$query="delete from super_admin where sid='".$_GET['delete']."' ";
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
              <li><a href="sAdmin.php" class="current">Add Admin</a></li>
            <li> <a href="viewAdmin.php">View  Admin</a></li>             
            <li><a href="sAdmin.php?logout=1">Logout</a></li>
           
    			 
    	</ul>
    </div> 
	<!-- end of menu -->
    
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
    
  <div id="templatemo_content">
    	
    <div id="templatemo_content_left">
          <div class="templatemo_content_left_section">
       	    <h1>ADMINISTRATORS</h1>
            <ul>
                    <li><form id="form2" name="form2" method="post" action="">
                      <img src="Images/IMG-20130205-WA000.jpg" alt="" width="200" height="200" />
              </form></li>
           	</ul>
            <p>&nbsp;</p>
          </div>
            
            <div class="templatemo_content_left_section">                
                <p><a href="http://validator.w3.org/check?uri=referer">
                <img src="Images/valid-xhtml10.png" width="88" height="31" /></a>
                <img src="Images/vcss-blue.gif" width="88" height="31" /></p>
                <p>&nbsp;</p>
            </div>
    </div> <!-- end of content left --><!--- copy -->

    <p>
      <!-- End of copy --><!-- end of content right -->
          
      <?php

$msg = "";
 @ $db = new mysqli('localhost', 'root', '','e_book_db');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
  $query = "select * from super_admin";		
	$result = $db->query($query);
	$num_results = $result->num_rows;
	
	
	echo "<table  border='15'>";
		echo "<tr>";
	echo "<th scope='row' bgcolor='#996600'>". "Name: ";
	echo "<th scope='row' bgcolor='#996600'>"." <br />CELL: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />E-MAIL: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />DELETE: ";
	
		echo "</tr>";
	for ($i=0; $i <$num_results; $i++) {
	$row = $result->fetch_assoc();
	$id=$row['sid'];
	echo "<tr>";
	echo "<td>".htmlspecialchars(stripslashes($row['name']))." ".stripslashes(stripslashes($row['surname']));
	echo "<td>".stripslashes(stripslashes($row['cell']));
	echo "<td>".stripslashes(stripslashes($row['email']));
	echo "<td>".'<a href="viewAdmin.php?delete='.$id.'" >delete</a>'."</strong></p>";
	//echo "<td>".stripslashes(stripslashes($row['passoerd'])) ;
	
	
	}echo "</tr>";
	echo "</table>";
$result->free();
$db->close();
?></p>
        <a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" width="894" height="102" /></a></div> 
    <!-- end of content -->
    
    <div id="templatemo_footer"><br />
        Copyright © 2013 <strong>SPN Company</strong> </div> 
    <!-- end of footer -->

</div> <!-- end of container -->
</body>
</html>