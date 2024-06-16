<!DOCTYPE html>
<html>

<?php
    require('includes/head.php');
?>

<body>
	<?php
    	require('includes/header.php');
    	require('includes/forms.php');
  	?>

	<section class="main">
		<hr><br>
		<img src="./includes/film.png" id="film" class="film" alt="film">
		<div class="instruct">
			<h2 id="subTitle"><u>Welcome to the Movie and Actor Database!</u></h2>
			<br>
			<h4 id="dash">Instructions</h4>
			<br>	
			<p>To add a movie to the database, simply click on <b>'Add Movie'</b>, in the navigation bar, fill in the 
				displayed form and submit it!</p>
			<br>
			<p>Searching for a movie is easy too! select <b>'Search Movie'</b> and enter a keyword from the movie title 
				in the field and submit it.</p>
			<br>
			<p>A table should appear with all the matching keywords from the search query. For example, if you wish to 
				search for the movie "Rush Hour" or "Rush Hour 2", simply search "rush" or "hour" and both will be visible 
				in the table, as long as they have already been added to the database.</p>
			<br>
			<p>From within the displayed table of results, you can edit the entry on that particular row, or delete the 
				entire row, the <b>'Edit'</b> and <b>'Delete'</b> options can be found in the <b>Actions</b> column. 
				Simply click on the action you wish to perform, and a confirmation message will appear, from this point, 
				you can either cancel the operation, or proceed with it.</p>
			<br>
			<p>For editing an entry, a form will appear, enter in the updated data and submit it. This will then show the 
				updated table.</p>
			<br>
			<p>You can also delete a movie by pressing <b>'Delete Movie'</b> on the navigation bar, this will display a 
				selection box, as a dropdown, and the entry can be easily deleted by selecting it and submitting the form.</p>
			<br>
			<p>If you wish to add an actor or actress to the database, simply follow the above steps, using 
				the <b>'Add Actor'</b> form instead.</p>
			<br>
			<p>The functionality of <b>'Search Actor'</b> is also similar and will return all the names that contain the 
				keywords, from the submitted form.</p>
			<br>
			<p>The displayed table also contains an <b>Actions</b> column, in which you can either <b>'Edit'</b> an 
				existing row, or <b>'Delete'</b> it. If you wish to delete an actor or actress from the dropdown selection 
				instead, select <b>'Delete Actor'</b> in the navigation bar, and a form will appear, select the entry you 
				wish to delete from the dropdown and submit it, this will then show an the updated table.</p>
			<br>
			<p>View the full database by clicking the links: 
				<a class='View' href='./mvSearch.php?movie=%'>Full Movie Table</a> and 
				<a class='View' href='./actSearch.php?actor=%'>Full Actor Table.</a></p>
			<br>
			<h4 id="dash">Enjoy!</h4>
		</div>
		<br><hr>
	</section>

	<?php
    	require('includes/footer.php');
  	?>
</body>

</html>
