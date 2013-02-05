<?php
foreach(glob('img/galleria/thumb/*') as $f) {
	$suffix = substr($f, strrpos($f, "."));
	$base = basename($f);
	$base_nosuffix = basename($f, $suffix);

	echo "<a";

	$caption_file = "content/galleria/caption/".$base_nosuffix.".txt";
	if(is_file($caption_file)) {
		echo " title='".file_get_contents($caption_file)."'";
	}

	echo " rel='galleria' class='fancybox galleria' href='img/galleria/large/".$base."'>";
	echo "<img src='img/galleria/thumb/".$base."'>";
	echo "</a>\n\n";
}
?>