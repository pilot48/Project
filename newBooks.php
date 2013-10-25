<?php
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPN Book Shop Home</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>

<script src="js/jcarousellite.js" type="text/javascript"></script>
<script type="text/javascript">

	$(document).ready(function(){
	
	  $("a.new_window").attr("target", "_blank");
	  
	  //carousel
	  $(".carousel").jCarouselLite({
		  btnNext: ".next",
		  btnPrev: ".prev"
	  });
	});
</script>
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
        
              <div class="carousel-box">
						<div class="prev"><a href="#"><img src="images/prev.png" alt="" /></a></div>
						
						<div class="carousel">     
                        
							
									<div class="box">
                                      <div class="templatemo_content_left_section">
                                       <ul>
              <li>
            <h4>Dreamwaever CS6  </h4>
            
                <form id="form2" name="form1" method="post" action="">
                  <table width="250" height="205" border="0">
                    <tr>
                      <th width="100" rowspan="2" align="left" scope="row"><img src="images/download (20).jpg" width="80" height="150" /></th>
                      <td width="107"><label for="email3"></label>
                        <p>Name : DW CS6</p>
                        <p>Author: Mark flar</p>
                        <p>ISBN : 8186547</p>
                        <h3>R600</h3>
                        <label for="password3"></label></td>
                    </tr>
                    <tr>
                      <td><span class="buy_now_button"><a href="login.php">Buy Now<span class="detail_button"></span></a></span></td>
                    </tr>
                  </table>
                </form>
                 
              </li>
            </ul>
         				
																		
									
								
                     
								
									<div class="box"><ul>
              <li>
                                    <h4>Flash cs6</h4>
            
	        <form id="form3" name="form1" method="post" action="">
                  <table width="298" height="213" border="0">
                    <tr>
                      <th width="103" rowspan="2" align="left" scope="row"><img src="Images/download (15).jpg" width="80" height="150" alt="gt" /></th>
                      <td width="148"><label for="email4"></label>
                        <p>Name : Flash cs6</p>
                        <p>Author: Bob Prescil</p>
                        <p>ISBN : 8526446</p>
                        <h3>R550<br />
                        </h3>
                        <label for="password4"></label></td>
                    </tr>
                    <tr>
                      <td height="79"><span class="buy_now_button"><a href="login.php">Buy Now<span class="detail_button"></span></a></span></td>
                    </tr>
                  </table>
                </form>	
                  </li>
            </ul>				
                                </div>
									<div class="box">
										                 <ul>
              <li>   <h4>html5 and css3 </h4>
            
							           <form id="form1" name="form1" method="post" action="">
                        <table width="260" height="205" border="0">
                          <tr>
                            <th width="100" rowspan="2" align="left" scope="row"><img src="Images/download (2).jpg" width="80" height="150" alt="i" /></th>
                            <td width="107"><label for="email"></label>                              <p>Name :html5 and css3 </p>
                              <p>Author: Darwin Hobbs</p>
                              <p>ISBN : 6458725</p>
<h3>R495</h3>                            <label for="password"></label></td>
                          </tr>
                          <tr>
                            <td><span class="buy_now_button"><a href="login.php">Buy Now<span class="detail_button"></span></a></span></td>
                          </tr>
                        </table>
                      </form>
                           </li>
            </ul>	
									</div>
    </div>
            <div class="next" align="right"><a href="#"><img src="images/next2.png" alt="" /></a></div>
         </div>
    </div>
        <!--- copy -->
        
   <!-- <div id="templatemo_content_left"></div>
        
        <p>
          <!-- End of copy --><!-- end of content right
          
        </p>
        <a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" width="894" height="102" /></a></div> 
     end of content -->
     <center>
    <div id="templatemo_footer">
   <center>
	     
	       <div id="templatemo_content_left2">
	         <div class="templatemo_content_left_section">
	           <h1><span>Login</span></h1>
	           <ul>
	             <li>
	               <form id="form5" name="form1" method="post" action="index.php">
	                 <table width="250" height="128" border="0">
	                   <tr>
	                     <th width="67" align="left" scope="row"><div align="left">Email </div></th>
	                     <td width="117"><label for="email21"></label>
	                       <input type="text" name="email" id="email21" width="100px" /></td>
                       </tr>
	                   <tr>
	                     <th align="left" scope="row"><div align="left">Password</div></th>
	                     <td><label for="password21"></label>
	                       <input type="password" name="password" id="password21"  width="100px" /></td>
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
	                     <div id="cala">
	                       <th colspan="2" align="left" scope="row">No account yet? <a href="register.php">Register now!</a></span></a></th>
                         </div>
                       </tr>
                     </table>
                   </form>
                 </li>
               </ul>
	           <p>&nbsp;</p>
             </div>
	         <div class="templatemo_content_left_section">
	           <h1>Search</h1>
	           <ul>
	             <li>
	               <form id="form6" name="form2" method="post" action="">
	                 <table width="250" border="0">
	                   <tr>
	                     <td width="86"><p>
	                       <label for="type3">Search Type</label>
	                       </p>
	                       <p>
	                         <label for="type3"></label>
	                         <select name="type" id="type3">
	                           <option>Name</option>
	                           <option>Discription</option>
	                           <option>ISBN</option>
                             </select>
                           </p></td>
	                     <td width="98"><label for="term3">Search Term</label>
	                       <input name="term" type="text" id="term3" size="17" /></td>
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
	           <p><img src="images/valid-xhtml10.png" width="88" height="31" /><img src="images/vcss-blue.gif" width="88" height="31" /></p>
	           <p>&nbsp;</p>
             </div>
              
      </div>
      
	       <a href="about.php">About</a> | <a href="register.php">Register</a> | <a href="newBooks.php">New Releases</a> |  <a href="contact.php">Contact Us</a> |  <a href="adminlogin.php">Admin</a><br />
    Copyright © 2013 <a href="#"><strong>SPN Company</strong></a></center> 	
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container --></center>
    <!-- end of footer -->
</body>
</html>