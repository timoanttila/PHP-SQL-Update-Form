<?php
// If submit
if($_POST["download"){

	$i = 0;
	$id = 1;
	foreach($_POST["download"] as $item){

		// No content
		if(!$item) continue;

		// Update
		$db->query("UPDATE helpers SET '". strip_tags($item) ."', logoLink = '". strip_tags($_POST["logo"][$i]) ."' WHERE id = $id LIMIT 1");

		// Plus one
		$i++;
		$id++;

	}

}

$result = $db->query("SELECT * FROM helpers");
if($result->num_rows > 0){

	// Form
	echo "<form action='#' method='post'><div id='links' class='grid'>";

	// Create sections
	while($row = $result->fetch_assoc()){

		// One link section
		echo "<div class='grid'>";

			// Logo link
			echo "<label class='img'>";
				echo "<span>Logo</span>";
				echo "<input type='text' name='logo[]'>";
			echo "</label>";

			// Download link
			echo "<label class='download'>";
				echo "<span>Download</span>";
				echo "<input type='text' name='downlaod[]'>";
			echo "</label>";

		echo "</div>";
	}

	// Div closed, submit button
	echo "<button name='submit' type='submit'>Update links</button>";

	// Form closed
	echo "</form>";

} else echo "<p>No content.</p>";
