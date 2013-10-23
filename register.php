<?php
$msg = "";
$data = "";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$fName = $_POST['name'];
	$lName = $_POST['surname'];
	$id = $_POST['id'];
	$cell = $_POST['cell'];
	$email = $_POST['email'];
	$pass  = $_POST['pass'];
	$rpass = $_POST['rpass'];
	$image = $_POST['image'];

	if($fName && $lName && $id && $cell && $email && $pass && $rpass && $image)
	{
		
				if (preg_match("/^[a-zA-Z]{3,30}$/",$fName))
				{
					if (preg_match("/^[a-zA-Z]{3,30}$/",$lName))
					{
						if (preg_match("/^(((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])
													(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229))(
													( |-)(\d{4})( |-)(\d{3})|(\d{7}))$/",$id))
						{
							if(preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $cell))
							{
								if(preg_match("/^[a-zA-Z0-9\_\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\_]+$/",$email))
								{
									if($pass == $rpass)
									{
										
										/*require("scripts/db_Commands.class.php");
										$myObject = new db_Commands();
										$data = $myObject->register($fName,$lName,$id,$cell,$email,$pass);
										
										if($data > 0)
										{
											$msg = 	$email." is inserted into database.</br>";
											$msg =  "<br /><a href = 'login.php'>Login</a>";
										
											exit;	
										}
										*/
										
										@ $db = new mysqli('localhost', 'root','','e_book_db');
										
										 if (mysqli_connect_error()) 
										 {
											 $msg= "Error: Could not connect to database.Please try again later.</br>";
											 exit;
										 }
										 //$password = md5($pass);
										 
										 //uploading a picture 
										 	
										 $query = "insert into users values
										(NULL,'".$fName."', '".$lName."',										'".$cell."','".$email."','".$pass."','".$id."','".$image."')";
											
										$result = $db->query($query);
										
										if ($result)
										{
											$msg = $email." is inserted into database.</br>";
											session_start();
											header("Location: login2.php");
											die;
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
								$msg = "wrong SA id number";
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
                <li>PHP and MySQL</li></ul></div>
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
                            <input type="text" name="email" id="email" width="100px" placeholder="pilotnkuna@gmail.com" required/></td>
                          </tr>
                          <tr>
                            <th align="left" scope="row">Password</th>
                            <td><label for="password"></label>
                            <input type="password" name="password" id="password"  width="100px" placeholder="M@luleke.1#" required/></td>
                          </tr>
                          <tr>
                            <th align="left" scope="row">&nbsp;</th>
                            <td><input type="submit" name="login" id="login" value="Login" /></td>
                          </tr>
                          <tr>
                            <th align="left" scope="row">&nbsp;</th>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
                      </form>
                    </li>
            	</ul>
            </div>
			<div class="templatemo_content_left_section">
            	<h1>Search Feature</h1>
                <ul>
                    <li>
                      <form id="form2" name="form2" method="post" action="">
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
                            <input name="term" type="text" id="term" size="17" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="search" id="search" value="Search" /></td>
                          </tr>
                        </table>
                      </form>
                    </li>
            	</ul>
            </div>
            
            <div class="templatemo_content_left_section">                
           <a href="http://validator.w3.org/check?uri=referer"><img src="images/valid-xhtml10.png" width="88" height="31" /></a><img src="images/vcss-blue.gif" width="88" height="31" /></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
          <div class="cleaner_with_width">&nbsp;</div>
          <div class="cleaner_with_height">&nbsp;
          <form id="form1" name="form1" method="post" action="register.php">
      <table width="475" border="0">
        <tr>
          <td colspan="2" align="center"><h2>Register </h2></td>
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
          <td align="left">Id Number</td>
          <td><label for="textfield3"></label>
            <input type="text" name="id" id="textfield3" placeholder="9406185444072" required/> </td>
        </tr>
        <tr>
          <td  align="left">Email Address</td>
          <td><p>
            <input type="text" name="email" id="textfield7" placeholder="pilotnkuna@gmail.com" required/>
            </p></td>
        </tr>
        <tr>
          <td align="left">Cell Number</td>
          <td><p>
            <input type="text" name="cell" id="textfield8" placeholder="0797588808"required /></p></td>
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
          <td align="left">Picture</td>
          <td><label>
                           <input type="hidden" name="MAX_FILE_SIZE" value="900000000000000000000000000000000000000000000000" />
                           <input name="image" type="file" value="<?php echo $_POST['image'];?>"/>
                </label>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
		  <?php
		  echo $msg;
          ?>
           </div>
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
    </form>
    </div>
          <div class="cleaner_with_width">&nbsp;</div>
          <div class="cleaner_with_height">&nbsp;</div>
      </div> 
    <div id="templatemo_footer">
    
	     <a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="register.php">Register</a> | <a href="newBooks.php">New Releases</a> | | <a href="contact.php">Contact Us</a><br />
        Copyright © 2013 SPN Company	</div> 

</div> <!-- end of container -->
</body>
</html>