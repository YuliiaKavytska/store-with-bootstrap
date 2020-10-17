<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	<?php
	$categorySql = "SELECT * FROM category";
	$categoryResult = $connect -> query($categorySql);
	if(isset($_GET["id"])){
		echo "<a class='nav-link' href='/'>All</a>";
	}else{
		echo "<a class='nav-link active' href='/'>All</a>";
	}
	while($category = mysqli_fetch_assoc($categoryResult)){
		if(isset($_GET["id"]) && $_GET["id"] == $category["id"]){
			echo "<a class='nav-link active' href='/category.php?id=" . $category["id"] . "'>" . $category["title"] . "</a>";
		}else{
			echo "<a class='nav-link' href='/category.php?id=" . $category["id"] . "'>" . $category["title"] . "</a>";
		}
	}
	?>
</div>