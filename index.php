<?php

header('Content-Type: text/html; charset=utf-8');

function current_url() {
	$result = 'http';
	if ($_SERVER["HTTPS"] == "on") {$result .= "s";}
		$result .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$result .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$result .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $result;
}

$base = current_url();

$current_page = '';

if ($level) {
	for ($i = 0; $i < $level; $i++) {
		$matches = array();
		if (preg_match('/([^\/]+)\/$/', $base, $matches)) {
			$current_page = $matches[1];
		}
		// 'cd ..'
		$base = preg_replace('/[^\/]+\/$/', '', $base);
	}
}

if (!$current_page) {
	$current_page = '.';
}

print("Page is " . $current_page);

$pages = array(
	'.' => 'Etusivu',
	'agent' => 'Agent',
	'liput' => 'Liput',
	'tekijat' => 'Tekijät',
	'sponsorit' => 'Sponsorit',
	'mikaspeksi' => 'Mikä speksi?'
);

?>
<!doctype html>
<head>
	<meta charset='utf-8'>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->
	<base href='<?= $base ?>'>
	<link rel='stylesheet' href='css/style.css'>
	<title>Agent</title>
</head>

<body>
	<div id='main'>
		<nav>
			<ul>

<?php
	foreach ($pages as $page => $title) {
		if ($current_page == $page) {
			print("<li class='current'><a href='$page'>$title</a>");
		} else {
			print("<li><a href='$page'>$title</a>");
		}

		// TODO keksi jostain joku hierarkia
		print("<ul> <li class='current'><a>Tarina</a> <li><a>Hahmot</a> </ul>");
		print("</li>");
	}
?>

			</ul>
		</nav>

		<article>
			<h2>Lorem ipsum dolor</h2>
			<p>Lorem ipsum dolor sit amet, diam et augue parturient, suscipit id orci 
		ridiculus. Volutpat amet, eu wisi nibh. Luctus sit. Orci nulla wisi bibendum 
		<a>sagittis quisque</a>, libero sodales mauris ipsum tincidunt auctor, erat amet. 
		Tellus egestas maecenas, penatibus sed sed mi nec vitae, convallis ut, ante 
		magna.

			<h2>Vel aenean nibh</h2>
			<p>Vel aenean nibh morbi, eu arcu vehicula, aenean ornare mauris metus 
		aliquam fusce, eget sapien sed, pede integer metus. Magna dolor enim wisi lorem 
		massa in, nulla odio vitae blandit sed, quam pede, cras metus non pellentesque 
		ante sed. <a>Purus ut massa</a> rutrum posuere egestas ac, quis tincidunt bibendum 
		turpis tellus sit augue, nulla aliquam vel, est vestibulum nibh quam 
		condimentum suspendisse. Non commodo ipsum habitasse, rhoncus vitae erat pede 
		odio, quisque risus. Metus enim pretium nec, quisque volutpat phasellus in, 
		amet tempus pede orci eleifend cum arcu, ligula faucibus, risus feugiat nunc. 
		Aliquet suspendisse fermentum at adipiscing morbi metus, wisi sapien malesuada 
		ultricies non amet sit. Volutpat quam velit vitae proin mauris, nam donec 
		molestias nulla pellentesque et fusce, ut dignissim elit, donec ipsa semper.

			<h2>Felis velit sed</h2>
			<p>Felis velit sed, in amet non eiusmod nibh leo augue. Dictumst aliquam metus 
		senectus, nisl pede sit sed faucibus justo. Eros id vitae, integer dictum orci 
		orci, sapien felis quam et blandit. Convallis vel nec. Donec erat nulla 
		sociosqu odio erat. Donec etiam sed natus, turpis commodo euismod facilisi orci 
		dolor nunc, eleifend ipsum suscipit cursus ornare, <a>sociis</a> odio mus 
		aliquam sit nibh pharetra. Tellus sit lectus risus tempus quam, amet non. Eu 
		ac, donec donec, adipisicing nunc proin aptent pretium cras vivamus, leo vitae. 
		Lacus duis eu vestibulum ante auctor, ultrices sapien, donec sit enim posuere 
		proin libero, et nunc in leo augue id vehicula

		</article>

		<div style='clear: both'></div>
	</div>
	<footer>
		<a>teekkarispeksi.fi</a>
	</footer>
</body>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<script src='js/script.js'></script>

