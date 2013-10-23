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
		
		if($_REQUEST['logout']== 1)
		{
			session_destroy();
			header("Location: index.php");
			die();
			}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPN Book Shop member page</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

</head>
<body onload="MM_preloadImages('images/download (8).jpg','images/download (14).jpg')">
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
            <li><a href="member.php">Profile</a></li>
            <li><a href="edit.php">Change Profile</a></li>            
            <li><a href="newBooks.php">New Releases  </a></li>
            <li><a href="product.php">Product  </a></li>
            <li><a href="cart.php">view Cart </a></li>
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
    
  <div id="templatemo_content">
    	
        <div id="templatemo_content_left">
          <div class="templatemo_content_left_section">
       	    <h1>Picture</h1>
                <ul>
                    <li><form id="form2" name="form2" method="post" action="">
                  </form></li>
            	</ul>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
		  </div>
            
            <div class="templatemo_content_left_section">                
                <p><img src="images/valid-xhtml10.png" width="88" height="31" /><img src="images/vcss-blue.gif" width="88" height="31" /></p>
                <p>&nbsp;</p>
            </div>
    </div> <!-- end of content left -->
        
        
    
      <div class="templatemo_content_left_section" >
      
    <h1><a href="member.php?logout=1">Logout</a></h1>
            <ul>
              <li><form id="form1" name="form1" method="post" action="">
                <p>
                  <?php  echo $msg ; ?>
                </p>
                <p>&nbsp;</p>
                <p>
              <?php

if (!get_magic_quotes_gpc()){
$id = addslashes($id);
 
}
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
	echo "<th scope='row' bgcolor='#996600'>". "ID: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />Name: ";
	echo "<th scope='row' bgcolor='#996600'>"." <br />Price: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />Detail: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />Cartegory: ";
	echo "<th scope='row' bgcolor='#996600'>"." <br />Author: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />ISPB: ";
	echo "<th scope='row' bgcolor='#996600'>"."<br />Quantity: ";
	echo "<th scope='row' bgcolor='#996600'>"." <br />";
		echo "</tr>";
	for ($i=0; $i <$num_results; $i++) {
	$row = $result->fetch_assoc();
	echo "<tr>";
	echo "<td>".htmlspecialchars(stripslashes($row['id']));
	echo "<td>".stripslashes(stripslashes($row['product_name'])) ;
	echo "<td>".stripslashes(stripslashes($row['price']));
	echo "<td>".stripslashes(stripslashes($row['detail_text']));
	echo "<td>".stripslashes(stripslashes($row['cartegory'])) ;
	echo "<td>".stripslashes(stripslashes($row['author']));
	echo "<td>".stripslashes(stripslashes($row['ISBN'])) ;
	echo "<td>".stripslashes(stripslashes($row['quantity'])) ;
	echo "<td>"."<a href='#' ><img src='Images/add-to-cart.gif' width='88' height='31' /></a>";
	
	}echo "</tr>";
	echo "</table>";
$result->free();
$db->close();
?><table width="541" border="15">
  <tr>
    <td width="6">&nbsp;</td>
    <td width="6">&nbsp;</td>
    <td width="11"><img src="Images/purchase.gif" width="135" height="50" /></td>
    <td width="8">&nbsp;</td>
    <td width="135">&nbsp;</td>
    <td width="6"><img src="Images/view-cart.gif" width="135" height="50" /></td>
    <td width="6">&nbsp;</td>
    <td width="135">&nbsp;</td>
    <td width="177"><img src="Images/continue.gif" width="135" height="50" /></td>
  </tr>
</table>

                &nbsp;</p>
              </form></li>
        </ul>
     
      </div>
        <!--- copy -->

        <p>
          <!-- End of copy --><!-- end of content right -->
          
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