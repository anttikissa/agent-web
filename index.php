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

$base = preg_replace('/\?.*$/', '', current_url());

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
	'mikaspeksi' => 'Mikä speksi?',
	'galleria' => 'Galleria',
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
	<link rel='stylesheet' href='js/fancybox/jquery.fancybox.css'>
	<!--[if lt IE 9]>
	<link rel='stylesheet' href='css/ie8.css'>
	<![endif]-->

	<title>Agent - <?= $pages[$current_page] ?></title>

	<meta property="og:image" content="http://teekkarispeksi.fi/2013/img/content/carter_katja-thumb.png" />
	<meta property="og:description"
		   content="Impovisaatiolla höystetty musikaali moraalin ulkoistamisesta ja kiertoratalaserista." />
</head>

<body>
	<div id='banner-extension'>
	</div>

	<div id='banner'>
	</div>

	<div id='main'>
		<nav>
			<ul>

<?php
	foreach ($pages as $page => $title) {
		if ($current_page == $page) {
			$link = $page;
			print("<li class='current'><a href='$link'>$title</a>");
		} else {
			print("<li><a href='$page'>$title</a>");
		}
	}
?>
			</ul>
		</nav>

		<article>
			<div>

<?php include($current_page . '/content.html'); ?>

			</div>
		</article>

		<div style='clear: both'></div>

	</div>

	<div id="team-wrapper">
		<div id="team">
			<div id="kgb"></div>
			<div id="cia"></div>
		</div>
	</div>

	<div id="sponsors">
		<h2>Pääyhteistyökumppanit</h2>
		<center>
			<a href="http://www.seepsula.fi"><img src='img/small_seepsula.png'></a>
			<a href="http://www.yit.fi"><img src='img/small_yit.png'></a>
			<a href="http://www.academicwork.fi"><img src='img/small_aw.png'></a>
		</center>
	</div>

</body>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<script src='js/fancybox/jquery.fancybox.js'></script>
<script src='js/script.js'></script>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7094567-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!-- vahti ok -->
