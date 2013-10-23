<?php
session_start();
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
		$query = mysql_query("SELECT * FROM users WHERE email='$email'");
		
		$rows = mysql_num_rows($query);
		
			if($rows!=0)
			{
				while($row = mysql_fetch_assoc($query))
				{
					$dbemail= $row['email'];
					$dbpassword= $row['password'];
				}
					
					 if($email==$dbemail && $password==$dbpassword)
					 {
						// "You're successfully loged in ! <a href='memberpage.php' >Click here to continue <a/>";
						$_SESSION['admin']=1;
						$_SESSION['email']=$email;
						header("Location: member.php");
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
</head>


<body >

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
                <li>PHP and MySQL</li></ul></div>
  </div>
    <!-- end of header -->
    
  <div id="templatemo_content">
    	
        <div id="templatemo_content_left">
          <div class="templatemo_content_left_section">
       	    <h1>Search</h1>
                <ul>
                    <li><form id="form2" name="form2" method="post" action="">
                        <table width="200" border="0">
                          <tr>
                            <td width="86"><p>
                              <label for="type">Search Type</label>
                            </p>
                              <p>
                                <label for="type"></label>
                                <select name="type" id="type">
                                <option>Name</option>
                                <option>Discription</option>
                                <option>ISBN</option>
                                </select>
                              </p></td>
                            <td width="98"><label for="term">Search Term</label>
                            <input name="term" type="text" id="term" size="17" required/></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="search" id="search" value="Search" /></td>
                          </tr>
                        </table>
                      </form></li>
            	</ul>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
		  </div>
            
            <div class="templatemo_content_left_section">                
                <p> <img src="Images/valid-xhtml10.png" width="88" height="31" />
              <img src="Images/vcss-blue.gif" width="88" height="31" /></p>
                <p>&nbsp;</p>
            </div>
    </div> <!-- end of content left -->
        
        
    <div id="templatemo_content_left">
      <div class="templatemo_content_left_section">
            <h1>Login First in order to buy</h1>
            <ul>
              <li><form id="form1" name="form1" method="post" action="">
                        <table width="239" height="128" border="0">
                          <tr>
                            <th colspan="2" align="left" scope="row"><?php echo $display; ?>&nbsp;</th>
                          </tr>
                          <tr>
                            <th width="67" align="left" scope="row"><div align="left">Email  </div></th>
                            <td width="117"><label for="email"></label>
                            <input type="text" name="email"  width="100px" required/></td>
                          </tr>
                          <tr>
                            <th align="left" scope="row"><div align="left">Password</div></th>
                            <td><label for="password"></label>
                            <input type="password" name="pass"  width="100px" required/></td>
                          </tr>
                          <tr>
                            <th colspan="2" align="left" scope="row"><div align="center">
                              <input type="checkbox" name="remember" id="remember" />
                            Remember Me</div></th>
                          </tr>
                          <tr>
                            <th align="left" scope="row">&nbsp;</th>
                            <th align="left" scope="row"><input type="submit" name="login" id="login" value="Login" /></th>
                          </tr>
                          <tr>
                            <th colspan="2" align="left" scope="row"><a href="#">Forgot your password?</a></th>
                          </tr>
                          <tr>
                            <div id="cala"><th colspan="2" align="left" scope="row">No account yet? <a href="register.php">Register now!</a></span></a></th></div>
                          </tr>
                        </table>
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
                            <th width="100" align="left" scope="row">
            <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/download (14).jpg',1)"><img src="images/download (5).jpg" name="Image7" width="80" height="150" border="0" id="Image7" /></a></th>
                            <td width="107"><label for="email"></label>
        <p><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/download (8).jpg',1)">
        <img src="images/download (19).jpg" name="Image6" width="80" height="150" border="0" id="Image6" /></a></p>                              
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

</div> <!-- end of container -->
</body>
</html>