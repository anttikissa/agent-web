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

	<title>Agent</title>

	<meta property="og:image" content="http://teekkarispeksi.fi/2013/img/fb-ikoni.jpg"/>
	<meta property="og:description"
		   content="Impovisaatiolla höystetty musikaali moraalin ulkoistamisesta ja kiertoratalaserista"/>
</head>

<body>
	<div id='banner-extension'>
	</div>

	<div id='wrapper'>
		<div id='banner'>
			<img src="img/banneri.png">
		</div>

		<div id='content-wrapper'>
			<nav>
				<ul>

<?php
	foreach ($pages as $page => $title) {
		if ($current_page == $page) {
			$link = $page;
//			$link = $page == 'liput' ? 'http://teekkarispeksi.nappikauppa.net/' : $page;
			print("<li class='current'><a href='$link'>$title</a>");
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
<!--					<p class='debug'>hello</p> -->

					<div>

<?php include($current_page . '/content.html'); ?>

					</div>
				</article>

				<div style='clear: both'></div>

				<footer>
				</footer>
<!--				<footer>
					<a href='http://teekkarispeksi.fi/'>teekkarispeksi.fi</a>
				</footer>
-->
			</div>
		</div>

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
