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
	
	if(isset($_POST['addbook']))
	{
		$name=trim($_POST['name']);
		$detail=trim($_POST['detail']);
		$price=trim($_POST['price']);
		$author=trim($_POST['author']);
		$isbn=trim($_POST['isbn']);
		$quantity=trim($_POST['quantity']);
		$cartegory=trim($_POST['cartegory']);
		
		@ $db = new mysqli('localhost', 'root','','e_book_db');
												
		 if (mysqli_connect_error()) 
		 {
			$msg= "Error: Could not connect to database.Please try again later.</br>";
			exit;
		 }
												 //$password = md5($pass);
												 
												 //uploading a picture 
													
 $query = "insert into products values(NULL,'".$name."', '".$price."','".$detail."','".$cartegory."','".$author."','".$isbn."', '".$quantity."')";
													
			$result = $db->query($query);
												
			$id_image=mysqli_insert_id($db);
			$newname="$id_image.jpg";
			move_uploaded_file($_FILES["image"]["tmp_name"],"book_image/$newname");
												
			if ($result)
			{
				$msg = $name." is inserted into product";

													
			}
			else
			{
				$msg =  "An error has occurred.user was not added.</br>";
			}
		
	}



	if(isset($_GET['logout'])==1)
	{
		session_destroy();
		header("Location: index.php");
		die();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPN Book Shop Home</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
</head>


<body onload="MM_preloadImages('Images/download (16).jpg','Images/download (7).jpg')" >

<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
              <li><a href="admin.php" class="current">Admin</a></li>
            <li><a href="users.php">View Users</a></li>
            <li><a href="add_book.php">Add Books</a></li>            
            <li><a href="view_book.php">View Books</a></li> 
            <li><a href="users.php?logout=1">Logout</a></li> 
              
            
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
       	    <h1>ADMINISTRATOR</h1>
                <ul>
                    <li><form id="form2" name="form2" method="post" action="">
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
    <p><!--- copy --></p>
        <h2 align="center"><strong>Add Book</strong></h2>
        <p>&nbsp;</p>
        <table width="200" border="15" align="center">
          <tr>
            <td>Name</td>
            <td><label for="name"></label>
              <input type="text" name="name" id="name" required/></td>
          </tr>
          <tr>
            <td>Cartegory</td>
            <td><label for="cartegory"></label>
              <label for="cartegory"></label>
              <select name="cartegory" id="cartegory">
                <option>--Select--</option>
                <option>Web develop</option>
                <option>Multimedia</option>
              </select></td>
          </tr>
          <tr>
            <td>Author</td>
            <td><label for="author"></label>
              <input type="text" name="author" id="author" required/></td>
          </tr>
          <tr>
            <td>Detail</td>
            <td><label for="detail"></label>
              <textarea name="detail" id="detail" cols="21" rows="5" required></textarea></td>
          </tr>
          <tr>
            <td>ISBN</td>
            <td><label for="isbn"></label>
              <input type="text" name="isbn" id="isbn" required/></td>
          </tr>
          <tr>
            <td>Price</td>
            <td><label for="price"></label>
              <input type="text" name="price" id="price" required/></td>
          </tr>
          <tr>
            <td>Quantity</td>
            <td><label for="quantity"></label>
              <input type="text" name="quantity" id="quantity" required/></td>
          </tr>
          <tr>
            <td>Image</td>
            <td><label>
              <input type="hidden" name="MAX_FILE_SIZE" value="900000000000000000000000000000000000000000000000" />
              <input name="image" type="file" value="<?php echo $_POST['image'];?>"/>
            </label>
              &nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php echo $msg;?>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="addbook" id="addbook" value="Submit" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
    <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp; </p>
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