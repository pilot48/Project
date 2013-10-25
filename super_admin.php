<?php
session_start();

if(isset($_GET['logout'])==1)
	{
		session_destroy();
		header("Location: index.php");	
		die();
	}
$display="";
	if(isset($_POST['email']) && isset($_POST['pass']))
	{
	$email=$_POST['email'];
	$password=$_POST['pass'];
	
	if($email&&$password)
	{
		// calling the database connection
		  require("scripts/DB_Connection.class.php");
		  $obj = new DB_Connection();
		  $obj->connect();
		
		//Selecting the username from the database which is an email
		$query = mysql_query("SELECT * FROM admin WHERE username='$email'");
		
		$rows = mysql_num_rows($query);
		
			if($rows!=0)
			{
				while($row = mysql_fetch_assoc($query))
				{
					$dbemail= $row['username'];
					$dbpassword= $row['password'];
				}
					
					 if($email==$dbemail && $password==$dbpassword)
					 {
						// "You're successfully loged in ! <a href='memberpage.php' >Click here to continue <a/>";
						$_SESSION['admin']=1;
						$_SESSION['email']=$email;
						header("Location: sAdmin.php");
					 }
					 else
						{
						   $display= "Incorrect password !";
						}
			}
			else
			{
				$display="User does not exist!";	
			}
		
		}
	
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
              <li><a href="admin.php" class="current">Super Admin</a></li>
            <li><a href="sAdmin.php">Add Admin</a></li>
            <li><li><a href="super_admin.php?logout=1">Logout</a></li></li>            
            <li></li>   
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
       	    <h1>SUPER ADMINISTRATOR</h1>
            <ul>
                    <li><form id="form2" name="form2" method="post" action="">
                      <img src="Images/pic1.jpg" width="189" height="189" alt="p" />
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
    </div> <!-- end of content left -->
        
        
    <div id="templatemo_content_left">
      <div class="templatemo_content_left_section">
        <h1>Super Admin Login</h1>
        <ul>
              <li><form id="form1" name="form1" method="post" action="">
                <table width="239" height="128" border="0">
                  <tr>
                    <th width="67" align="left" scope="row"><div align="left">Email </div></th>
                    <td width="117"><label for="email"></label>
                      <input type="text" name="email"  width="100px" required="required"/></td>
                  </tr>
                  <tr>
                    <th align="left" scope="row"><div align="left">Password</div></th>
                    <td><label for="password"></label>
                      <input type="password" name="pass"  width="100px" required="required"/></td>
                  </tr>
                  <tr>
                    <th colspan="2" align="left" scope="row"><div align="center">
                      <input type="checkbox" name="remember" id="remember" />
                      Remember Me</div></th>
                  </tr>
                  <tr>
                    <th align="left" scope="row"> <?php echo $display;
					?></th>
                    <th align="left" scope="row"><input type="submit" name="login" id="login" value="Login" /></th>
                  </tr>
                  <tr>
                    <th colspan="2" align="left" scope="row"><a href="#">Forgot your password?</a></th>
                  </tr>
                 
                </table>
              </form></li>
            </ul>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
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
           	  <h1><a href="index.php">Logout</a></h1>
        <ul>
                    <li>
                      <form id="form1" name="form1" method="post" action="">
                        <img src="Images/10082011117.jpg" width="227" height="237" alt="ff" />
                      </form>
                  </li>
           	  </ul>
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
    
    <div id="templatemo_footer">
    
	       <a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="register.php">Register</a> | <a href="newBooks.php">New Releases</a> | | <a href="contact.php">Contact Us</a><br />
        Copyright © 2013 <strong>SPN Company</strong> </div> 
    <!-- end of footer -->

</div> <!-- end of container -->
</body>
</html>