<?php
$msg="";
if(isset($_POST['button']))
{
	$name = $_POST['name'];
	$surname  = $_POST['surname'];
	$id = $_POST['id'];
	$pass  = $_POST['pass'];
	$rpass = $_POST['rpass'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	
	if(!$name  )
	{
		$msg = "  Name Field required  <br/>" ;
		}
		else if(!$surname) {
			$msg ="  Surname Field required  <br/>" ;
			}
			else if( !$id ) {
			$msg ="  ID Field required  <br/>" ;
			}
			else if(!$pass) {
			$msg ="  Password Field required  <br/>" ;
			}
			else if(!$rpass) {
			$msg ="  Password Field required  <br/>" ;
			}else if(!$cell) {
			$msg =" Cell number  Field required  <br/>" ;
			}else if($pass != $rpass)
			{
				$msg = "your password dont match ";
				}
				else if (!preg_match("/^[a-zA-Z]{3,30}$/",$name))
				{
					$msg = "Wrong name format  must be letters and more than two words";
					}
					else if (!preg_match("/^[a-zA-Z]{3,30}$/",$surname))
				{
					$msg = "Wrong surname format must be letters and more than two words";
					}
		else if(!preg_match("/^[a-zA-Z0-9\_\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\_]+$/",$email))
		{
			$msg = "wrong email address";
			
		}
		else if(!preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $cell)) {
  			$msg ="Wrong number";
			}
			else if (!preg_match("/^(((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229))(( |-)(\d{4})( |-)(\d{3})|(\d{7}))$/",$id))
			{
				$msg = "wrong SA id number";
				}
				else
				{
					require("scripts/DB_Connection.class.php");
					
		 			// $obj = new DB_Connection();
		  				//$db=$obj->connect();
						
						@ $db = new mysqli('localhost','root','','users');
			if(mysqli_connect_error())
			{
				echo "Not connected to data base";
			}
			
		 			 
					 $query="INSERT INTO users VALUES(null,'".$name."','".$surname."','".$cell."','".$email."','".$pass."','".$id."')";
					 $result = $db->query($query);
					
			
				if($result)
				{
					$msg= "Username ".$username." is inserted to database";
					
					$msg="Thank you, you have registered - you may now login";
				}
				else
				{
					$msg= "not inserted";
				}
			
				}
					
}
if(isset($_POST['login']))
{
	
session_start();
	$display="";
	if(isset($_POST['email']) && isset($_POST['password']))
	{
	$email=$_POST['email'];
	$password=$_POST['password'];
	
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

	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store Template, Free CSS Template, CSS Website Layout</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<!--<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css"/>-->
</head>
<body>
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
        purchase over R800
        	</p>
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
    </div> <!-- end of header -->
    
    <div id="templatemo_content">
    	
        <div id="templatemo_content_left">
       	  <div class="templatemo_content_left_section">
            	<h1>Login</h1>
                <ul>
                    <li>
                      <form id="form1" name="form1" method="post" action="">
                        <table width="200" border="0">
                          <tr>
                            <th width="67" align="left" scope="row">Email</th>
                            <td width="117"><label for="email"></label>
                            <input type="text" name="email" id="email" width="100px" /></td>
                          </tr>
                          <tr>
                            <th align="left" scope="row">Password</th>
                            <td><label for="password"></label>
                            <input type="password" name="password" id="password"  width="100px" /></td>
                          </tr>
                          <tr>
                            <th align="left" scope="row">&nbsp;</th>
                            <td><input type="submit" name="login" id="login" value="Login" /></td>
                          </tr>
                          <tr>
                            <th align="left" scope="row">&nbsp;</th>
                            <td><a href="register.php">Register</a></td>
                          </tr>
                        </table>
                      </form>
                    </li>
            	</ul>
            </div>
        	<div class="templatemo_content_left_section"> <img src="images/valid-xhtml10.png" width="88" height="31" /><img src="images/vcss-blue.gif" width="88" height="31" /></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
          <div class="cleaner_with_width">&nbsp;</div>
          <div class="cleaner_with_height">&nbsp;
            <p>&nbsp;</p>
            <p><?php if(isset($_POST['remeber']))
	{
		$email2 = trim($_POST['email2']);
	
 		  if (!get_magic_quotes_gpc()) {
			$email2 = addslashes($email2);
  			}

		  @ $db = new mysqli('localhost', 'root', '','e_book_db');
		
		  if (mysqli_connect_errno()) {
			 echo "<p> "."Error: Could not connect to database.  Please try again later."."</p> ";
			 exit;
		  }
		  
		  $query = "select * from users where id_number ='$email2'";		
		$result = $db->query($query);
		$num_results = $result->num_rows;
	
	
		for ($i=0; $i <$num_results; $i++) {
		$row = $result->fetch_assoc();
		echo "<p><strong>"." Username: ";
		echo htmlspecialchars(stripslashes($row['email']))."</p>";
		echo "<p><strong>"."Password: ";
		echo htmlspecialchars(stripslashes($row['password']))."</p>";
		
		
		}
	  $db->close();
}?>&nbsp;</p>
            <form id="form1" name="form1" method="post" action="">
            <table width="300" border="0">
              <tr>
                <td width="131">ID Number</td>
                <td width="153"><label for="email3"></label>
                <input type="text" name="email2"  /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="remeber" id="remeber" value="Submit" /></td>
              </tr>
            </table>
          </form></div>
          <div class="cleaner_with_width">&nbsp;</div>
          <div class="cleaner_with_height">&nbsp;</div>
      </div> 
        <!-- end of content right -->
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
    <div id="templatemo_footer">
    
	     <a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="register.php">Register</a> | <a href="newBooks.php">New Releases</a> | | <a href="contact.php">Contact Us</a><br />
        Copyright © 2013 <strong>SPN Company</strong> </div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>