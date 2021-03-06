<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Localized Date Parsing</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h1>Demo: Localized Date Parsing</h1>
		<p>Using dojo/date.locale.parse to parse locale-sensitive date strings</p>

		<div class="resultPanel">
			<pre id="outbox"></pre>
		</div>

		<script>
			var dojoConfig = {
				extraLocale: ['en-us', 'en-gb', 'fr', 'es']
			};
		</script>
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript();
		?>
		<script>
		require(["dojo/date/locale", "dojo/dom", "dojo/domReady!"], 
				function(locale, dom){
			
			demo = {
				parseL10NDates: function() {
					var gbDateStr = "1/5/2011", 
						usDateStr = "1/5/2011", 
						gbDate = locale.parse(gbDateStr, {
							formatLength:'short', selector:'date', locale:'en-gb'
						}), 
						usDate = locale.parse(usDateStr, {
							formatLength:'short', selector:'date', locale:'en-us'
						});
						
					this.showResult("UK and US parsing of 1/5/2011", 
					[
						"en-gb: " + gbDateStr  + ": " + gbDate,
						"en-us: " + usDateStr + ": " + usDate,
					].join("\n<br>"))
				},
				showResult: function(heading, content){
					dom.byId("outbox").innerHTML = content;
				}
			}
			demo.parseL10NDates();
		});
		</script>
	</body>
</html>
