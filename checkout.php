<?php
session_start();
require 'carts.php' ;
	if(!$_SESSION['admin']==1)
	{
		header("Location: index.php");
		}
		else
		{
			$msg = $_SESSION['email'];
		}
		if(isset($_GET['logout'])== 1)
		{
			session_destroy();
			header("Location: index.php");
			die();
			}
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPN Book Shop Cart</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
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

function MM_findobjectect(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findobjectect(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findobjectect(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<style type="text/css">
body,td,th {
	color: #FFF;
}
</style>
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
   	</ul> </div> <!-- end of menu -->
    
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
    
  <div id="templatemo_content"><!-- end of content left --><!--- copy -->

        <p>
          <!-- End of copy --><!-- end of content right -->
          
        </p>
        <p align="right"><a href="cart.php?logout=1">Logout</a></div></td>&nbsp;
<p>&nbsp;</p>
<p>&nbsp;</p>
        <center>
          
                
                <form id="form1" name="form1" method="post" action="done.php">
                  <table width="320" border="15">
                    <tr>
                      <td width="65">Email</td>
                      <td width="168"><label for="email"></label>
                      <input type="text" name="email" id="email" value="<?php echo $msg;?>" readonly="readonly"/></td>
                    </tr>
                    <tr>
                      <td>Account Type</td>
                      <td><label for="type"></label>
                        <select name="type" id="type">
                        <option>--select--</option>
                        <option>cheque</option>
                        <option>debit</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td>Account number</td>
                      <td><label for="num"></label>
                      <input type="text" name="num" id="num" required/></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input type="submit" name="sub" id="sub" value="Submit" /></td>
                    </tr>
                  </table>
                </form>
                &nbsp;
  </center>
        <p></p>
</div> 
    <!-- end of content -->
    
   <center> <div id="templatemo_footer">
    
	       <a href="member.php">Home</a> |<a href="edit.php">change profile</a>|<a href="product.php">product</a>|<a href="cart.php">view cart</a><br />
        Copyright © 2013 <strong>SPN Company</strong> </div> </center>
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>
</html>
	