<?php
foreach(glob('img/galleria/thumb/*') as $f) {
	$base = basename($f);
	echo "<a rel='galleria' class='fancybox galleria' href='img/galleria/large/".$base."'>";
	echo "<img src='img/galleria/thumb/".$base."'>";
	echo "</a>\n\n";
}
?>