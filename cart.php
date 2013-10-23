<?php
require("scripts/shopping_cart.class.php");
session_start();
//Shows products selected by the customer and store them in a shopping cart
if(isset($_GET['add']))
{
	
	$_SESSION['cart_'.$_GET['add']]+=1;
}

if(isset($_GET['sub']))
{
	
	$_SESSION['cart_'.$_GET['sub']]--;
}

if(isset($_GET['remov']))
{
	
	$_SESSION['cart_'.$_GET['remov']]=0;
}

$object=new shopping_cart();
$output=$object->cart($_SESSION);
$total=$object->total_amount_cost_to_pay();

if(isset($_GET['clear'])&&isset($_GET['clear'])=="empty")
{
	session_destroy();
	header("Location: index.php");
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
            <li><a href="newBooks.php">New Releases  </a></li>
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
       	    <h1>&nbsp;</h1>
                <ul>
                    <li></li>
            	</ul>
               <p><a href="#"><img src="Images/add-to-the-cart-button.png" width="92" height="83" align="right"/></a><br />
    </p>
  <p>&nbsp;</p>
  <p>&nbsp;	</p></p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
		  </div>
            
            <div class="templatemo_content_left_section">                
              <p>&nbsp;</p>
               <p><?php echo $total;?></p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
               <a href=cart.php?clear=empty>Empty Shopping cart</a></p>
            </div>
    </div> <!-- end of content left --><!--- copy -->

        <p>
          <!-- End of copy --><!-- end of content right -->
          
        </p>
        <p align="right"><a href="cart.php">View Cart</a></div></td>&nbsp;
<p>&nbsp;</p>
        <table width="400" height="77" border="1">
          <tr>
            <td width="60"><strong>Product</strong></td>
            <td width="76"><strong>Description</strong></td>
            <td width="62"><strong>Price</strong></td>
            <td width="59"><strong>Categoty</strong></td>
            <td width="107"><strong>Sub-Category</strong></td>
            <td width="78"><strong>Quantity</strong></td>
            <td width="126"><strong>add/sub/remove</strong></td>
          </tr>
          <?php echo $output;?>
        </table>
        <a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" width="894" height="102" /></a></div> 
    <!-- end of content -->
    
    <div id="templatemo_footer">
    
	       <a href="index.php">Home</a> | <a href="about.php">About</a> | <a href="register.php">Register</a> | <a href="newBooks.php">New Releases</a> | | <a href="contact.php">Contact Us</a><br />
        Copyright © 2013 <a href="#"><strong>SPN Company</strong></a> 	</div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>
</html>
	