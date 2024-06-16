<?php
	$count = 0;
	
	if($stmt->fetch())
	{
		echo ("<tr> <th>Actor ID</th> <th>Actor Name</th> <th>Actions</th> </tr>");
		
		do
		{
			$count++;
			echo ("<tr>");
			echo ("<td>" . htmlentities($ID) . "</td>");
			echo ("<td>" . htmlentities($Actor) . "</td>");
			/* USED PERIODS (FULL STOPS) TO CONCATENATE STRINGS */
			$Name = urlencode($Actor); /* PUT TITLE IN THE RIGHT FORMAT, SO IT CAN BE PARSED IN A URL */
			/* USED BACKTICKS TO PASS PHP STRING VARIABLE TO THE JAVASCRIPT FUNCTION AS A STRING TO PRINT THE CONFIRM MESSAGE */
			echo ("<td>
						<a href='#' class='Update' 
							onClick=\"return actorE(`$ID`,`$Actor`)\">Edit</a>

						<a class='Delete' href='./actDelete.php?actor=$Name' 
							onClick=\"return deleteMsgA(`$Actor`)\">Delete</a>
					</td>"); /* USED A BACKSLASH BEFORE THE DOUBLE QUOTES, AS AN ESCAPE CHARACTER */
			echo ("</tr>");
		} while($stmt->fetch());
	}
	else
	{
		echo ("<p>:(</p>");
	}

	$stmt->close();
?>
