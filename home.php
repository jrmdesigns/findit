<section id="newest-products-container" style="padding: 70px;">

<h1>Laatste producten in STAD</h1>

<section id="newest-products">
<!-- <a href="#">
	<article>
		<img src="images/product.jpg" alt="">
		<h3>Title</h3>
		<h2 class="price">2.450,00</h2>
		<h4 class="time">Geplaatst: vandaag</h4>
	</article>
</a> -->

<?php
	foreach ($productsData as $data) {
		$price = str_replace('.', ',', $data['Price']);
		$result = "<a href='product.php?id=";
		$result .= $data['ID'];
		$result .= "'>";
		$result .= "<article>";
		$result .= "<img src='images/";
		$result .= $data['ImageName'];
		$result .= "'/>";
		$result .= "<h3>" . $data['Title'] . "</h3>";
		$result .= "<h2 class='price'>" . $price . "</h2>";
		$result .= "<h4 class='time'>Geplaatst: " . $data['Date'] . "</h4>";
		$result .= "</article>";
		$result .= "</a>";
		echo $result;
	}
?>

<!-- <a href="#">
	<article>
		<img src="images/product.jpg" alt="">
		<h3>Title</h3>
		<h2 class="price">2.450,00</h2>
		<h4 class="time">Geplaatst: vandaag</h4>
	</article>
</a>

<a href="#">
	<article>
		<img src="images/product.jpg" alt="">
		<h3>Title</h3>
		<h2 class="price">2.450,00</h2>
		<h4 class="time">Geplaatst: vandaag</h4>
	</article>
</a>

<a href="#">
	<article>
		<img src="images/product.jpg" alt="">
		<h3>Title</h3>
		<h2 class="price">2.450,00</h2>
		<h4 class="time">Geplaatst: vandaag</h4>
	</article>
</a>

<a href="#">
	<article>
		<img src="images/product.jpg" alt="">
		<h3>Title</h3>
		<h2 class="price">2.450,00</h2>
		<h4 class="time">Geplaatst: vandaag</h4>
	</article>
</a> -->
</section>

</section>