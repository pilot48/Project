<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Voyage
Version    : 1.0
Released   : 20090118
Description: A two-column, fixed-width and lightweight template ideal for 1024x768 resolutions. Suitable for blogs and small websites.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="header"></div>
<!-- end header -->

<div id="banner">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="menu">
    <ul>
      <li class="current_page_item"><a href="index.php">Homepage</a></li>
      
      <li><a href="register.php">Register</a></li>
      <li><a href="#">Help</a></li>
      <li class="last"><a href="contact.php">Contact</a></li>
    </ul>
  </div>
  <p>&nbsp;</p>
</div>

<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Welcome to techno matrix website</h2>
			<div class="byline"></div>
			<div class="entry">
				<h1>Reset Password</h1>
				<p>&nbsp;</p>
				<form id="form2" method="post" action="forget.php">
				  <table width="306" border="0">
				    <tr>
				      <td width="141"><label for="textfield">Enter ID Number</label></td>
				      <td width="149"><input type="text" name="textfield" id="textfield" /></td>
			        </tr>
				    <tr>
				      <td>&nbsp;</td>
				      <td><input type="submit" name="button2" id="button2" value="Submit" /></td>
			        </tr>
			      </table>
		      </form>
				<p>&nbsp;</p>
          </div>
			<div class="meta"></div>
		</div>
		<div class="post">
	    <div class="entry"> </div>
			<div class="meta">
				<p class="links">&nbsp;</p>
			</div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
		  <li id="search">
			<h2>Search</h2></li>
		</ul>
		<form id="form1" name="form1" method="POST" action="index.php">
          <?php
	$id = trim($_POST['textfield']);
	
	
	/*if (!$username || !$current || !$new) {
     echo "You have not entered all the required details Please go back and try again";
     exit;
	 
  }*/
   if (!get_magic_quotes_gpc()) {
	$id = addslashes($id);
  
   
  }
  echo "ID : " .$id;
  @ $db = new mysqli('localhost', 'root', '','users');

  if (mysqli_connect_errno()) {
     echo "<p> "."Error: Could not connect to database.  Please try again later."."</p> ";
     exit;
  }
  
  $query = "select * from userinfo where ID ='".$id."'";		
	$result = $db->query($query);
	$num_results = $result->num_rows;
	
	
	for ($i=0; $i <$num_results; $i++) {
	$row = $result->fetch_assoc();
	echo "<p><strong>".($i+1).". Password: ";
	echo htmlspecialchars(stripslashes($row['password']))."</p>";
	echo "<p><strong>"."2".". Username: ";
	echo htmlspecialchars(stripslashes($row['Username']))."</p>";
	
	}
  $result->free();
  $db->close();
	
?>
	  </form>&nbsp;</p>
		<ul>
		  <li> </li>
	  </ul>
  </div>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p id="legal">( c ) 2013. All Rights Reserved   <a href="adminlogin.php">Admin Login</a> | <a href="techlogin.php">Technician Login</a></p>
</div>
<!-- end footer -->
<div align=center></div></body>
</html>
