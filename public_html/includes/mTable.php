<?php
	$count = 0; /* SET AN INCREMENT COUNTER TO RETURN THE NUMBER OF ENTRIES */

	if($stmt->fetch()) /* IF ANY ENTRIES HAVE BEEN RETURNED */
	{
		echo ("<tr> <th>Movie ID</th> <th>Movie Title</th> <th>Actor Name</th> <th>Price</th> <th>Year</th> <th>Genre</th> <th>Actions</th> </tr>");

		do /* DO-WHILE, SINCE THE FIRST FETCH WAS USED IN THE IF STATEMENT, THIS IS SO DATA WILL NOT BE LOST */
		{
			$count++; /* INCREMENT THE COUNTER BY 1 */
			echo ("<tr>");
			echo ("<td>" . htmlentities($ID) . "</td>");
			echo ("<td>" . htmlentities($Title) . "</td>");
			echo ("<td>" . htmlentities($Actor) . "</td>");
			echo ("<td>" . htmlentities($Price) . "</td>");
			echo ("<td>" . htmlentities($Year) . "</td>");
			echo ("<td>" . htmlentities($Genre) . "</td>");
			/* USE A PERIOD, TO JOIN MULTIPLE STRINGS IN A SINGLE ECHO */

			$Name = urlencode($Title); /* PUT TITLE IN THE RIGHT FORMAT, SO IT CAN BE PARSED IN A URL */
			/* USED BACKTICKS TO PASS PHP STRING VARIABLES TO THE JAVASCRIPT FUNCTION AS A 
			STRING TO PRINT THE CONFIRM MESSAGE AND TO SEND TO THE FORM */
			/* USED A BACKSLASH BEFORE THE DOUBLE QUOTES, AS AN ESCAPE CHARACTER */
			echo ("<td>
						<a href='#' class='Update' 
							onClick=\"return movieE(`$ID`,`$Title`,`$Year`,`$Genre`,`$Price`,`$Actor`)\">Edit</a>
						
						<a class='Delete' href='./mvDelete.php?movie=$Name' 
							onClick=\"return deleteMsgM(`$Title`)\">Delete</a>
					</td>"); /* HREF POINTS TO THE MOVIE DELETE PAGE, WITH THE CORRECTLY FORMATTED MOVIE NAME */
			echo ("</tr>");
			
		} while($stmt->fetch());
	}
	else
	{
		echo ("<p>:(</p>");
	}

	$stmt->close();
?>