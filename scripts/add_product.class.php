<?php
require("db_Commands.class.php");
class add_product extends db_Commands
{
	//This function accepts 5 arguments from the inventory page (form)
	//invoke the function add_product from db_Commands.class.php 
	//And also will insert the details in the database
	function add($name,$price,$description,$category,$subcategory)
	{
		$db_object=new db_Commands();
		$id=0;
		if(isset($name)&&isset($price)&&isset($description)&&isset($category)&&isset($subcategory))
		{
			$id=$db_object->add_product($name,$price,$description,$category,$subcategory);	
		}
		else
		{
			$id= "Fields not proparly filled <a href='../Inventory.php'>Click Here</a>";	
			exit;
		}
		return $id;
	} 
	
	//this method return all products stored in a database by invoking a method from db_Commands.class.php called select_all_productc and sends the information to inventory.php
	function all()
	{
		$db_object=new db_Commands();
		return $db_object->select_all_productc();
	}
	
	//this method delete recieves an id of a product from inventory form and sends it to a method called delete in db_Commands.class.php and remove the information and this method delete removes the image and the information from the product_list form
	function delete($id)
	{
		$db_object=new db_Commands();
		$db_object->delete($id);
		$pic_delete=("Images/$id.jpg");		
		
		if(file_exists($pic_delete))
		{
			unlink($pic_delete);	
		}
	}
	
	//this meethod recieve an id of a product from inventory.php and invoke a method called select_for_editing in db_Commands.class.php and returns the informatio to the edit.php form
	function return_for_edit($id)
	{
		$ans="";
		$db_object=new db_Commands();
		$ans=$db_object->select_editing($id);
		return $ans;
	}
	//the method edit the information recieved fro the edit.php form
	function edit($name,$price,$description,$category,$subcategory,$id)
	{
		$db_object=new db_Commands();
		$db_object->edit_records($name,$price,$description,$category,$subcategory,$id);
	}
	
}


?>