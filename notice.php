<?php
	session_start();
	require_once(dirname(__FILE__) . "/conf.php");

  include 'header.html';
?>

	<div class="container">
	<h1> Announcement </h1>
	<hr>
	<?php
	
	$con = mysql_connect($db_url, $db_user, $db_pass);
	$result = mysql_select_db($db_use, $con);
	$result = mysql_query('SET NAMES utf8', $con);
	$result = mysql_query("SELECT title, time FROM notice order by id desc", $con);
	?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Article</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($data = mysql_fetch_array($result)) {
			echo "<tr>";
			echo "<td>";echo "<a href="; echo "./read.php?title="; echo urlencode($data["title"]); echo ">" .$data["title"]. "</a>"; echo "</td>";
			echo "<td>";echo $data["time"]; echo "</td>";
			echo "</tr>";
		}
		?>
	</table>

	<?php
		$con = mysql_close($con);
	?>

	<footer>
		Copyright (C) 2014 clom-networks. All Rights Reserved.
	</footer>

	</div> <!-- /container -->


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="./assets/js/jquery.js"></script>
	<script src="./dist/js/bootstrap.min.js"></script>
	<script>
	$('#myCarousel').carousel({
	interval: 3000;
	});
	</script>
	</body>
</html>
