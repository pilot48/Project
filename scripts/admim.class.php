<?php
	require('db_Commands.class.php');
	class admin extends db_Commands
	{
		//the method accepts 3 parameters that has the login details of the user
		
		function check($user,$pass,$privilage)
		{
			$data ="";
			if(isset($user)&& isset($pass)&& ($privilage))
			{
				$data= db_Commands::Login($use,$pass,$privilage);
			}
			return $data;
		}
	}
?>
