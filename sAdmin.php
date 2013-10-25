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
$msg = "";
$data = "";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$fName = $_POST['name'];
	$lName = $_POST['surname'];
	$cell = $_POST['cell'];
	$email = $_POST['email'];
	$pass  = $_POST['pass'];
	$rpass = $_POST['rpass'];
	$show="";
	
	if($fName && $lName && $cell && $email && $pass && $rpass )
	{
		
				if (preg_match("/^[a-zA-Z]{3,30}$/",$fName))
				{
					if (preg_match("/^[a-zA-Z]{3,30}$/",$lName))
					{
						
							if(preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $cell))
							{
								if(preg_match("/^[a-zA-Z0-9\_\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\_]+$/",$email))
								{
										if(strlen($pass) > 8)
										{
  
											if($pass == $rpass)
											{
												@ $db = new mysqli('localhost', 'root','','e_book_db');
												
												 if (mysqli_connect_error()) 
												 {
													 $msg= "Error: Could not connect to database.Please try again later.</br>";
													 exit;
												 }
												 //$password = md5($pass);
												 
												 //uploading a picture 
													
												 $query = "insert into super_admin values
												(NULL,'".$fName."', '".$lName."','".$cell."','".$email."','".$pass."')";
													
												$result = $db->query($query);
												
												if ($result)
												{
													$msg = $email." is inserted into database.</br>";
													$show = "Welcome ".$email;
													//header("Location: login2.php");
													
												}
												else
													{
														$msg =  "An error has occurred.user was not added.</br>";
													}
											 
										}
										else
											{
												$msg = "password does not match";
											}
										}
										else
											{
										 	 $msg .="Invalid password.";
 											 }
								}
								else
									{
										$msg = "wrong email address";
									}
							}
							else
								{
									$msg ="Wrong number";
								}
							
						
					}
					else
						{
							$msg = "Wrong surname format must be letters and more than two words";
						}
				}
				 else
				 {
					$msg = "Wrong name format  must be letters and more than two words";
				 }
						
	}
	//else 
		//$msg =  "All fields are required</br>";
		
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
            <li><a href="sAdmin.php" class="current">Add Admin</a></li>
            <li> <a href="viewAdmin.php">View  Admin</a></li>            
            <li><a href="sAdmin.php?logout=1">Logout</a></li>
            <li></li>
            <li></li>
   	      
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
       	    <h1><a href="member.php?logout=1">Logout</a></h1>
                <ul>
                    <li>
                      <form id="form2" name="form1" method="post" action="">
                        <p>
                          <?php  echo $show ; ?>
                        </p>
                        <p><img src="Images/IMG-20130205-WA000.jpg" width="200" height="200" /></p>
                        <p>&nbsp;</p>
                      </form>
                    </li>
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
    </div><!-- end of content left --><!--- copy -->

    <p>
      <!-- End of copy --><!-- end of content right -->
          
    <form id="form1" name="form1" method="post" action="sAdmin.php" enctype="multipart/form-data">
      <table width="475" border="0">
        <tr>
          <td colspan="2" align="center"><h2>Register Admin</h2></td>
        </tr>
        <tr>
          <td width="159" align="left">Name</td>
          <td width="318"><label for="textfield"></label>
            <input type="text" name="name" id="textfield" placeholder="sibusiso" required/></td>
        </tr>
        <tr>
          <td align="left">Surname</td>
          <td><label for="textfield2"></label>
            <input type="text" name="surname" id="textfield2" placeholder="maluleke" required/></td>
        </tr>
        <tr>
          <td  align="left"> Cell Number</td>
          <td><p>
            <input type="text" name="cell" id="textfield8" placeholder="0797588808"required />
          </p></td>
        </tr>
        <tr>
          <td align="left">Email Address</td>
          <td><p>
            <input type="text" name="email" id="textfield7" placeholder="pilotnkuna@gmail.com" required/>
          </p></td>
        </tr>
        <tr>
          <td align="left">Password</td>
          <td><label for="textfield4"></label>
            <input name="pass" type="password" id="textfield4" value="" required/></td>
        </tr>
        <tr>
          <td align="left">Re-Password</td>
          <td><label for="textfield5"></label>
            <input name="rpass" type="password" id="textfield5" required/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"><?php echo $msg; ?></div>
           </td>
          </tr>
        <tr>
          <td>
           </td>
          <td><input type="submit" name="button" id="button" value="Register" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" width="481" height="46" /></a></td>
          </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
      </table>
    </form></p>
        <a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" width="894" height="102" /></a></div> 
    <!-- end of content -->
    
    <div id="templatemo_footer">Copyright © 2013 <strong>SPN Company</strong></div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>