<?php
	session_start();
	 if (isset($_SESSION['role']) ) 
    {
		if ($_SESSION['role']==2) 
	    {
	    	echo "<h1>Access Denide</h1><br><a href='home2.php'>back</a>";
	    }
	    else
		{
			echo "<h1>Admin is login</h1><br><a href='home.php'>back</a>
		    	";
		}
	}
	
?>