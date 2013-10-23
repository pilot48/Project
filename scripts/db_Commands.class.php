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
        
        
    <div id="templatemo_content_left">
      <div class="templatemo_content_left_section">
      
            <h1><a href="member.php?logout=1">Logout</a></h1>
            <ul>
              <li><form id="form1" name="form1" method="post" action="">
                <p>
                  <?php  echo $msg ; ?>
                </p>
                <p>&nbsp;</p>
                <p>&nbsp;
               
                </p>
              </form></li>
            </ul>
      </div>
      </div>
        <!--- copy -->
        
    <div id="templatemo_content_left">
   	  <div class="templatemo_content_left_section">
           	  <h1>PHP and MySQL<span></span></h1>
                <ul>
                    <li>
                      <form id="form1" name="form1" method="post" action="">
                        <table width="233" height="204" border="0">
                          <tr>
                            <th width="100" align="left" scope="row"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/download (14).jpg',1)"><img src="images/download (5).jpg" name="Image7" width="80" height="150" border="0" id="Image7" /></a></th>
                            <td width="107"><label for="email"></label>                              <p><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/download (8).jpg',1)"><img src="images/download (19).jpg" name="Image6" width="80" height="150" border="0" id="Image6" /></a></p>                              
                            <label for="password"></label></td>
                          </tr>
                        </table>
                      </form>
                  </li>
           	  </ul>
      </div>
    </div>
        
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