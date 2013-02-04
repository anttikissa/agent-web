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

//print("Page is " . $current_page);

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
	<div id='lines'>
	</div>

	<div id='wrapper'>
		<div id='header'>
		</div>

		<div id='content-wrapper'
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
		//print("<ul> <li class='current'><a>Tarina</a> <li><a>Hahmot</a> </ul>");
		//print("</li>");
	}
?>
					</ul>
				</nav>

				<article>

<?php include($current_page . '/content.html'); ?>

				</article>

				<div style='clear: both'></div>
			</div>
		</div>

<!--	<footer>
		<a>teekkarispeksi.fi</a>
	</footer>
-->
	</div>
</body>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<script src='js/script.js'></script>

