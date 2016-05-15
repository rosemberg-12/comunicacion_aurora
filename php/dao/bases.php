<?php
		$usuario = "root";
		$clave = "";

		try
		{
			$base = new PDO('mysql:host=localhost;dbname=aurora', $usuario, $clave);
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	}
    	catch (Exception $e)
    	{
      			die("Unable to connect: " . $e->getMessage());
    	}
 ?>