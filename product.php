<?php 
	session_start();
	require 'carts.php' ;
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
    
  <div id="templatemo_content"><!-- end of content left -->
        
        
    
      <div class="templatemo_content_left_section" >
      
    <h1><a href="member.php?logout=1">Logout</a></h1>
            <ul>
              <li><form id="form1" name="form1" method="post" action="">
                <p>
                  <?php  echo $msg ; ?>
                </p>
                <p>&nbsp;</p>
                <?php 
				
				products();
				
				
				
				?>
                <table width="541" border="15">
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