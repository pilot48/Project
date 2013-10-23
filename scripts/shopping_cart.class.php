<?php
require("db_Commands.class.php");

class shopping_cart extends db_Commands
{
	private $total_amount;
	private $object;
	//this method recieves a session variable sended by a form called cart.php and sends the value to the method called shopping_cart return the information from the database and sends the information to cart.php
	function cart($session)
	{
		$cart_infor="";
		$this->object=new db_Commands();
		foreach($session as $name =>$value)
		{
			if($value>0)
			{
				if(substr($name,0,5)=="cart_")
				{
					$id=substr($name,5,(strlen($name)-5));
					$cart_infor.=$this->object->shopping_cart($id)."<td>".$value."</td><td><a href='cart.php?add=$id'>[+]</a> <a href='cart.php?sub=$id'>[-]</a> <a href='cart.php?remov=$id'>[remove]</a></td></tr>";					
					$this->total_amount+= $this->object->total_amount_cost($id,$value);
		
				}	
			}
		}
		return $cart_infor;	
	}
	
	//this method display the order by recieving a session variable and sends the value to shopping_cart returning an information to a form called order.php
	function order_display($session)
	{
		$cart_infor="";
		$this->object=new db_Commands();
		foreach($session as $name =>$value)
		{
			if($value>0)
			{
				if(substr($name,0,5)=="cart_")
				{
					$id=substr($name,5,(strlen($name)-5));
					$cart_infor.=$this->object->shopping_cart($id)."<td>".$value."</td>";					
					$this->total_amount+= $this->object->total_amount_cost($id,$value);
		
				}	
			}
		}
		return $cart_infor;	
	}
	
	//the method sends the total_amount to the cart.php form and displays it
	function total_amount_cost_to_pay()
	{
		$t=$this->total_amount;
		$vat=$t*0.14;
		return "<br/><br/>"."Overall total_amount: R".$this->total_amount."<br/> VAT: R".$vat;	
	}
	//return amount due
	function cost()
	{
		return $this->total_amount;	
	}
	
	//invokes a method that captures the current order
	function order($id,$total_amount_cost,$total_amount)
	{
		return $this->object->captureOrder($id,$total_amount_cost,$total_amount);
	}
	
	//invokes the method called order_items from db_Commands.class.php to store the orders items in a database
	function order_items($id,$session)
	{
		$this->object->order_item($id,$session);
	}
	
}



?>