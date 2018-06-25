<html>
	<body>
		<div>
		<ul>
		<li>Add an item :<br />
		<form action="edit_page.php" method="post">
				<input type="text" name="name" required placeholder="Name of your item"/><br />
			</li>
			<li>Add a price :<br />
					<input type="number" name="price" min="1" required placeholder="Put a price"/><br />
			</li>
			<li>Add a comment :<br />
				<input type="text" name="comment" required placeholder="Put comment to your product"/><br />
			</li>
			<li>Add a category :
				<br />
				<input list="category" type="radio" name="category" required value="monocles"/>monocles<br />
				<input list="category" type="radio" name="category" required value="sticks"/>sticks<br />
				<input list="category" type="radio" name="category" required value="phones"/>phones<br />
				<input list="category" type="radio" name="category" required value="pipes"/>pipes<br />
			</li>
			<li>Add your path to image:
				<br />
				<input type="text" name="image" required placeholder="Put path to image"/>
			</li>
			<input type="submit" name="submit" value="OK">
		</form>
		</div>
    </body>
</html>