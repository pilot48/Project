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
            <li><a href="admin.php?logout=1">Logout</a></li> 
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
       	    <h1>ADMINISTRATOR                          </h1>
<p>&nbsp;</p>
              <p><img src="Images/download (19).jpg" width="232" height="205" alt="jk" /></p>
              <p>&nbsp;</p>
          </div>
            
            <div class="templatemo_content_left_section">                
                <p><a href="http://validator.w3.org/check?uri=referer">
                <img src="Images/valid-xhtml10.png" width="88" height="31" /></a>
                <img src="Images/vcss-blue.gif" width="88" height="31" /></p>
                <p>&nbsp;</p>
            </div>
    </div> <!-- end of content left -->
        
        
    <div id="templatemo_content_left">
      <div class="templatemo_content_left_section">
            <h1 align="center">WELCOME TO ADMINISTOR HOME</h1>
            <ul>
              <li><form id="form1" name="form1" method="post" action="">
                <img src="Images/pic1.jpg" width="241" height="200" alt="gg" />
              </form></li>
        </ul>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    </div>
        <!--- copy -->
        
    <div id="templatemo_content_left">
   	  <div class="templatemo_content_left_section">
           	  <h1><em>Live time to own the book site and manage most</em></h1>
                <ul>
                    <li>
                      <form id="form1" name="form1" method="post" action="">
                        <img src="Images/download (9).jpg" width="215" height="200" alt="gh" />
                      </form>
                  </li>
           	  </ul>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
   	  </div>
    </div>
        
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