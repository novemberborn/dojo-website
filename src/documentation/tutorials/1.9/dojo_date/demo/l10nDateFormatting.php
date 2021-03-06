<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Localized Date Formatting</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h1>Demo: Localized Date Formatting</h1>
		<p>Using dojo/date.locale.parse to format a date to locale-appropriate date strings</p>

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
				formatL10NDates: function() {
					var mayDay = new Date("May 01, 2011"); 
					
					this.showResult("Localized Dates (May Date: 1st May, 2011)", [
						"locale\tshort\t\t\tlong",
						"en-gb\t" 
							+ locale.format(mayDay, { locale: "en-gb", formatLength: "short" })
							+ "\t"
							+ locale.format(mayDay, { locale: "en-gb", formatLength: "full" })
							,
						"en-us\t" 
							+ locale.format(mayDay, { locale: "en-us", formatLength: "short" })
							+ "\t"
							+ locale.format(mayDay, { locale: "en-us", formatLength: "full" })
							,
						"es\t" 
							+ locale.format(mayDay, { locale: "es", formatLength: "short" })
							+ "\t\t"
							+ locale.format(mayDay, { locale: "es", formatLength: "full" })
					].join("\n"))
				},
				showResult: function(heading, content){
					// IE8 strips whitespace when assigning to innerHTML, so use outerHTML
					dom.byId("outbox").outerHTML = '<pre id="outbox">' + content + '</pre>';
				}
			}

			demo.formatL10NDates();
		});
		</script>
	</body>
</html>
