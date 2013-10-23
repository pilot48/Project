<?php
 	session_start();
	
	$mainPage = 'product';
	
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('e_book_db') or die(mysql_error());
	
	function products()
	{
		$query = mysql_query("select * from products where quantity > 0 ORDER BY id DESC");
		
		if(mysql_num_rows($query)==0)
		{
			echo 'No product to dispay';
		}
		else
		{
			echo "<table  border='15'>";
			echo "<tr>";
			echo "<th scope='row' bgcolor='#996600'>". "ID: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Name: ";
			echo "<th scope='row' bgcolor='#996600'>"." <br />Price: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Detail: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Cartegory: ";
			echo "<th scope='row' bgcolor='#996600'>"." <br />Author: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />ISPB: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Quantity: ";
			echo "<th scope='row' bgcolor='#996600'>"." <br />";
			echo "</tr>";
			while($row=mysql_fetch_assoc($query))
			{
				echo "<tr>";
				echo "<td>".htmlspecialchars(stripslashes($row['id']));
				echo "<td>".stripslashes(stripslashes($row['product_name'])) ;
				echo "<td>".stripslashes(stripslashes(number_format(($row['price']),2)));
				echo "<td>".stripslashes(stripslashes($row['detail_text']));
				echo "<td>".stripslashes(stripslashes($row['cartegory'])) ;
				echo "<td>".stripslashes(stripslashes($row['author']));
				echo "<td>".stripslashes(stripslashes($row['ISBN'])) ;
				echo "<td>".stripslashes(stripslashes($row['quantity'])) ;
				echo "<td>"."<a href='#' ><img src='Images/add-to-cart.gif' width='88' height='31' /></a>";
			}	
			echo "</tr>";
			echo "</table>";
		}
	}
	



?>