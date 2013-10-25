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
		
			$name="";
			$surname="";
			$cell="";
			$password="";
			$confirm="";
			$ID="";
			$email="";
	
		 @ $db = new mysqli('localhost', 'root','','e_book_db');
		
		  if (mysqli_connect_errno()) {
			 echo "Error: Could not connect to database.  Please try again later.";
			 exit;
		  }
	  	$query = "select * from users where email ='".$_SESSION['email']."'";		
		$result = $db->query($query);
		$num_results = $result->num_rows;
		
		for($a=0; $a<$num_results; $a++)
		{
			$row=$result->fetch_assoc();
			$id=$row["user_id"];
			$ID=$row["id_number"];
			$name=$row["name"];
			$surname=$row["surname"];	
			$email=$row["email"];
			$cell=$row["cell"];	
			$confirm=$row["password"];
			$password=$row["password"];
	    }
		if(isset($_POST['update']))
		{
			$name=trim($_POST['name']);
			$surname=trim($_POST['surname']);
			$id=trim($_POST['id']);
			$email=trim($_POST['email']);
			$cell=trim($_POST['cell']);
			$password=trim($_POST['pass']);
			$confirm=trim($_POST['rpass']);
			
			if($password==$confirm)
			{
				$edit="update users set name='$name',surname='$surname',cell='$cell',email='".$_SESSION['email']."',password='$password' where id_number='$ID'";
				$result2=$db->query($edit);
			}
			else
			{
				$nu= "password doesnt match";	
			}
			
		}
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPN Book Shop edit page</title>
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
                    <?php echo "<img width='200' height='200' src='my_image/$id.jpg'>"; ?>
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
                <table width="299" border="15">
                  <tr>
                    <td colspan="2" bgcolor="#996600"><?php echo $nu;?>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="100" bgcolor="#996600">Name</td>
                    <td width="110"><label for="name"></label>
                    <input type="text" name="name" id="name" value="<?php echo $name;?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#996600">Surname</td>
                    <td><label for="surname"></label>
                    <input type="text" name="surname" id="surname" value="<?php echo $surname;?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#996600">Phone </td>
                    <td><label for="cell"></label>
                    <input type="text" name="cell" id="cell" value="<?php echo $cell;?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#996600">Password</td>
                    <td><label for="pass"></label>
                    <input type="password" name="pass" id="pass" value="<?php echo $password;?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#996600">Re-Pass</td>
                    <td><label for="rpass"></label>
                    <input type="password" name="rpass" id="rpass" value="<?php echo $confirm;?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#996600">email</td>
                    <td><label for="email2"></label>
                    <input type="text" name="email" id="email2" readonly="readonly" value="<?php echo $email;?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#996600">ID</td>
                    <td><label for="id"></label>
                    <input type="text" name="id" id="id" readonly="readonly" value="<?php echo $ID;?>"/></td>
                  </tr>
                  <tr>
                    <td bgcolor="#996600">&nbsp;</td>
                    <td><input type="submit" name="update" id="update" value="Update" /></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
              </form></li>
            </ul>
      </div>
      </div>
        <!--- copy -->

        <p>
          <!-- End of copy --><!-- end of content right -->
          
    </p>
        <a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" width="894" height="102" /></a></div> 
    <!-- end of content -->
    
    <div id="templatemo_footer"><a href="member.php">Home</a> |<a href="edit.php">change profile</a>|<a href="product.php">product</a>|<a href="cart.php">view cart</a><br />
<strong>SPN Company</strong></div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>