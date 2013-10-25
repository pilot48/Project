<?php
 	session_start();
	if(!$_SESSION['admin']==1)
	{
		header("Location: index.php");
		}
		else
		{
			$msg = $_SESSION['email'];
		}
	//session_destroy();
	//header("Location: product.php");
	$mainPage = 'product.php';
	
	
	
	if(isset($_GET['add']))
	{
		mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('e_book_db') or die(mysql_error());
	
		$quant = mysql_query("SELECT id,quantity FROM products WHERE  id ='".mysql_real_escape_string((int)$_GET['add'])."' ");
		while($q_row = mysql_fetch_assoc($quant))
		{
			if($q_row['quantity'] != $_SESSION['carts_'.(int)$_GET['add']])
			{
				$_SESSION['carts_'.(int)$_GET['add']]+='1';
			}
		}
		header('Location: cart.php');
	}
	
	if(isset($_GET['bd_add']))
	{
		$date = date('H:i F d, Y');
		$tot = total();
		
		@ $db = new mysqli('localhost', 'root','','e_book_db');
		$quant = "insert into orders values('".$_GET['bd_add']."','".$_SESSION['email']."','".$tot."','".$date."')";
		$result=$db->query($quant);
	
	}
	
	if(isset($_GET['remove']))
	{
		$_SESSION['carts_'.(int)$_GET['remove']]--;
		header('Location: cart.php');
	}
	
	if(isset($_GET['delete']))
	{
		$_SESSION['carts_'.(int)$_GET['delete']]='0';
		header('Location: cart.php');
	}
	
	function products()
	{
		mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('e_book_db') or die(mysql_error());
	
		$query = mysql_query("SELECT id,product_name,price,detail_text,cartegory,author,ISBN FROM products WHERE quantity > 0 ORDER BY id DESC");
		
		if(mysql_num_rows($query)==0)
		{
			echo 'No product to dispay';
		}
		else
		{
			
			echo "<table  border='15'>";
			echo "<tr>";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Image: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Name: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Cartegory: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Author: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Detail: ";
			echo "<th scope='row' bgcolor='#996600'>"." <br />Price: ";
			echo "<th scope='row' bgcolor='#996600'>"." <br />";
			echo "</tr>";
			while($row = mysql_fetch_assoc($query))
			{
				$id=$row['id'];
				echo "<tr>";
				echo "<td>"."<img width='50' height='50' src='book_image/$id.jpg'>";
				echo "<td>".$row['product_name'];
				echo "<td>".$row['cartegory'];
				echo "<td>".$row['author'];
				echo "<td>".$row['detail_text'];
				echo "<td>".'R'.number_format($row['price'],2);
				echo "<td>".'<a href="carts.php?add='.$row['id'].'"><img src="Images/add-to-cart.gif" width="67" hieght="64" /></a></p>'.'</td>';
			}	echo "</tr>";
			echo "</table>";
			
		}
	}
	function paypal()
	{
		mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('e_book_db') or die(mysql_error());
		$num = 0;
		foreach($_SESSION as $name => $value)
		{
			if($value!=0)
			 {
				if(substr($name, 0, 6)=='carts_')
				{
					$db_id= substr($name, 6, (strlen($name)-6));
					$quant = mysql_query("SELECT id,product_name,price FROM products WHERE  id =".mysql_real_escape_string((int)$db_id));
					while($row=mysql_fetch_assoc($quant))
					{
						$num ++;
						echo '<input type="hidden" name="item_number_'.$num.'" value="'.$db_id.'">';
						echo '<input type="hidden" name="item_name_'.$num.'" value="'.$row['product_name'].'">';
						echo '<input type="hidden" name="amount_'.$num.'" value="'.$row['price'].'">';
						echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';
					}
				}
			 }
		}
	} 
	function Add_cart()
	{
		mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('e_book_db') or die(mysql_error());
		foreach($_SESSION as $name => $value)
		{
			 if($value>0)
			 {
				if(substr($name, 0, 6)=='carts_')
				{
					$date = date('H:i F d, Y');
					$db_id= substr($name, 6, (strlen($name)-6));
					$quant = mysql_query("SELECT id,product_name,price,detail_text FROM products WHERE  id =".mysql_real_escape_string((int)$db_id));
					
					echo "<table  border='15'>";
					echo "<tr>";
					echo "<th scope='row' bgcolor='#996600'>"."<br />Name: ";
					echo "<th scope='row' bgcolor='#996600'>"."<br />Detail: ";
					echo "<th scope='row' bgcolor='#996600'>"."<br />Quantity: ";
					echo "<th scope='row' bgcolor='#996600'>"." <br />Price: ";
					echo "<th scope='row' bgcolor='#996600'>"." <br />Total Amount: ";
					echo "<th scope='row' bgcolor='#996600'>"."<br />Date : ";
					echo "<th scope='row' bgcolor='#996600'>"." <br />";
					echo "</tr>";
					while($row=mysql_fetch_assoc($quant))
					{
						$tot = $row['price']*$value;
						echo "<tr>";
						echo "<td>". $row['product_name'];
						echo "<td>". $row['detail_text'];
						echo "<td>".$value;
						echo "<td>".' R'.number_format($row['price'],2);
						echo "<td>".'R',number_format($tot ,2);
						echo "<td>".$date;
						echo "<td>".'<a href="carts.php?remove='.$db_id.'">[-]</a> <a href="carts.php?add='.$db_id.'">[+]</a><a href="carts.php?delete='.$db_id.'">[delete]</a>';
					}
					echo "</tr>";
					echo "</table>";
					echo '<a href="cart.php?bd_add='.$db_id.'"><img src="Images/place_order.gif" width="123" height="38" /></a>';
				} 
				$total+=$tot;
				$vat = ($total * 0.14);
			 }
			
		}
		if($total==0)
		{
			mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('e_book_db') or die(mysql_error());
			echo 'Your cart is empty';	
		}else{
		echo '<br/><h2>Your total is R'.$total.'</h2><br/>';
		echo '<br/><h2>Vat is R'.$vat.'</h2><br/>';
		
			?>
            <p>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_carts">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="business" value="pilot@gmail.com">
            <?php paypal();?>
            <input type="hidden" name="currency_code" value="GBP">
            <input type="hidden" name="amount" value="<?php echo $total;?>">
            <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but03.gif" name="submit" alt="Make payments with PayPal - it's 		fast, free and secure!">
            </form></p>
            <?php
			
		}
	}
	
	function total()
	{
		mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('e_book_db') or die(mysql_error());
		$total = 0; 
		
		foreach($_SESSION as $name => $value)
		{
			 if($value>0)
			 {
				if(substr($name, 0, 6)=='carts_')
				{
					$date = date('H:i F d, Y');
					$db_id= substr($name, 6, (strlen($name)-6));
					$quant = mysql_query("SELECT id,product_name,price,detail_text FROM products WHERE  id =".mysql_real_escape_string((int)$db_id));
					$all="";
					
					while($row=mysql_fetch_assoc($quant))
					{
						$tot = $row['price']*$value;
						
						  $row['product_name'];
						 $row['detail_text'];
						$value;
						 number_format($row['price'],2);
						 number_format($tot ,2);
						$date;
						'<a href="carts.php?remove='.$db_id.'">[-]</a> <a href="carts.php?add='.$db_id.'">[+]</a><a href="carts.php?delete='.$db_id.'">[delete]</a>';
					}
					
				} 
				$total+=$tot;
			 }
			
		}
		return $total;
	}
?>