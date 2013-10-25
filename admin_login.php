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
		  $obj->connectLogin();
		
		//Selecting the username from the database which is an email
		$query = mysql_query("SELECT * FROM super_admin WHERE email='$email'");
		
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
						$_SESSION['admin']=1;
						$_SESSION['email']=$email;
						header("Location: admin.php");
					 }
					 else
						{
						   $display= "Incorrect password !";
						}
			}
			else
			{
				$display=" Admin does not exist!";	
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
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>


<body onload="MM_preloadImages('Images/download (16).jpg','Images/download (7).jpg')" >

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
                            <input name="term" type="text" id="term" size="17" /></td>
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
              <p><img src="Images/download (19).jpg" width="220" height="180" alt="jk" /></p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
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
            <h1>Admin Login</h1>
            <ul>
              <li><form id="form1" name="form1" method="post" action="">
                        <table width="239" height="128" border="0">
                          <tr>
                            <th colspan="2" align="left" scope="row"><?php echo $display; ?>&nbsp;</th>
                          </tr>
                          <tr>
                            <th width="67" align="left" scope="row"><div align="left">Email  </div></th>
                            <td width="117"><label for="email"></label>
                            <input type="text" name="email"  width="100px" /></td>
                          </tr>
                          <tr>
                            <th align="left" scope="row"><div align="left">Password</div></th>
                            <td><label for="password"></label>
                            <input type="password" name="pass"  width="100px" /></td>
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
                            <th colspan="2" align="left" scope="row"><a href="forgert.php">Forgot your password?</a></th>
                          </tr>
                          <tr>
                            <div id="cala">
                              <th colspan="2" align="left" scope="row"><p>&nbsp;</p>
                            <p><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','Images/download (16).jpg',1)"><img src="Images/download (18).jpg" name="Image5" width="222" height="233" border="0" id="Image5" /></a></p>
                            <p>&nbsp;</p></th></div>
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
                            <th align="left" scope="row"><label for="email"></label>
                              <p>&nbsp;</p>
                              <p><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','Images/download (7).jpg',1)"><img src="Images/download (1).jpg" name="Image6" width="218" height="299" border="0" id="Image6" /></a></p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>                              
                            <label for="password"></label></th>
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
    
    <div id="templatemo_footer">Copyright © 2013 <strong>SPN Company</strong></div> 
    <!-- end of footer -->

</div> <!-- end of container -->
</body>
</html>