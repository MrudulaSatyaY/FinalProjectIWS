<?php

		$host_name='localhost';
				$user_name = "root";
				if(!@mysql_connect($host_name,$user_name,'') || !@mysql_select_db("iws")){
					die('could not connect');
				}
				
?>