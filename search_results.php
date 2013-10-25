<?php
	session_start();
	$term=trim($_POST['term']);
$type=$_POST['type'];
 
 $msg = "";
if (!$term || !$type) {

	header("Location: index.php");
	die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPN Book Shop Home</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findobjectect(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findobjectect(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
</script>
</head>


<body onload="MM_preloadImages('images/download (8).jpg','images/download (14).jpg')">
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
              <li><a href="index.php" class="current">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="register.php">Register</a></li>            
            <li><a href="newBooks.php">New Releases</a></li>   
            <li><a href="contact.php">Contact</a></li>
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
                <li>PHP and MySQL</li>
      </ul>
   	  <p><span class="detail_button"><a href="newBooks.php">more</a></span></p>
    </div>
  </div>
    <!-- end of header -->
    
  <div id="templatemo_content"><!-- end of content left -->
        
        
    <div id="templatemo_content_left">
      <div class="templatemo_content_left_section">
            <h1>Search Results</h1>
            <ul>
              <li>
              
                <p>&nbsp;</p>
                <p></p>
              </li>
            </ul>
      </div>
    </div>
        <!--- copy -->

        <p>
          <!-- End of copy --><!-- end of content right -->
          
          <?php

$term=trim($_POST['term']);
$type=$_POST['type'];
 
 $msg = "";
if (!$term || !$type) {

	
}

 @ $db = new mysqli('localhost', 'root','','e_book_db');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
   
  }
  $query = "select * from products where ".$type." like '%".$term."%'";		
	$result = $db->query($query);
	$num_results = $result->num_rows;
	
	//echo "<p>Number of items found: ".$num_results."</p>";
	
	echo "<table  border='15'>";
		echo "<tr>";
	echo "<th scope='row' bgcolor='#996600'>". "Name: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />Price: ";
	echo "<th scope='row' bgcolor='#996600'>"." <br />Detail: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />Cartegory: ";
	echo "<th scope='row' bgcolor='#996600'>"." <br />ISBN: ";
	echo "<th scope='row' bgcolor='#996600'>"." <br />Aurhor: ";
		echo "</tr>";
	for ($i=0; $i <$num_results; $i++) {
	$row = $result->fetch_assoc();
	echo "<tr>";
	echo "<td>".htmlspecialchars(stripslashes($row['product_name']));
	echo "<td>". stripslashes(stripslashes($row['price']));
	echo "<td>". stripslashes(stripslashes($row['detail_text'])) ;
	echo "<td>". stripslashes(stripslashes($row['cartegory']));
	echo "<td>". stripslashes(stripslashes($row['ISBN']));
	echo "<td>". stripslashes(stripslashes($row['author']));
	}echo "</tr>";
	echo "</table>";
	
	if(!$result)
	{
		$msg = "item is not on our database";
		}
		else
		{
			$msg="";
			}

$db->close();
?>
    </p>
        <a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" width="894" height="102" /></a></div> 
    <!-- end of content -->
    
    <div id="templatemo_footer">
    
	       <a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="register.php">Register</a> | <a href="newBooks.php">New Releases</a> | | <a href="contact.php">Contact Us</a><br />
        Copyright © 2013 <a href="#"><strong>SPN Company</strong></a> 	</div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>