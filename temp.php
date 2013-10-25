<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php


			echo "<table  border='15'>";
			echo "<tr>";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Name: ";
			echo "<th scope='row' bgcolor='#996600'>"." <br />Price: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Detail: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />Cartegory: ";
			echo "<th scope='row' bgcolor='#996600'>"." <br />Author: ";
			echo "<th scope='row' bgcolor='#996600'>"."<br />ISPB: ";
			echo "<th scope='row' bgcolor='#996600'>"." <br />";
			echo "</tr>";
			while($row=mysql_fetch_assoc($query))
			{
				echo "<tr>";
				echo "<td>".stripslashes(stripslashes($row['product_name'])) ;
				echo "<td>".stripslashes(stripslashes(number_format(($row['price']),2)));
				echo "<td>".stripslashes(stripslashes($row['detail_text']));
				echo "<td>".stripslashes(stripslashes($row['detail_text'])) ;
				echo "<td>".stripslashes(stripslashes($row['author']));
				echo "<td>".stripslashes(stripslashes($row['ISBN'])) ;
				echo "<td>"." <a  href='carts.php?add='".$row['id']."'' > Add </a>";
			}	
			echo "</tr>";
			echo "</table>";


?>
<body>
</body>
</html>