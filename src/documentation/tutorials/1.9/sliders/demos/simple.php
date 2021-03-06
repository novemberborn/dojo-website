<?php include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/',dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php') ?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Simple Horizontal and Vertical Sliders</title>
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<?php Utils::printClaroCss() ?>
	</head>
	<body class="claro">
		<h1>Demo: Simple Horizontal and Vertical Sliders</h1>
		
		<h3>Horizontal Slider</h3>
		<p>This horizontal slider ranges in value from 0-10, incrementing by 1.</p>
		<div style="width: 400px;">
			<!-- declaratively create a slider with buttons, values from 0-10 -->
			<input id="hslider" value="3" type="range"
				data-dojo-type="dijit/form/HorizontalSlider"
				data-dojo-props="
					minimum: 0,
					maximum: 10,
					discreteValues: 11">
			<!-- Create an element showing the value -->
			<div style="padding-top: 10px; text-align: center;">Value: <strong id="decValue"></strong></div>
			<!-- Controls to play with slider -->
			<div style="padding-top: 10px;">
				<!-- button to enable and disable slider -->
				<button id="disableButton" data-dojo-type="dijit/form/Button"
					data-dojo-props="onClick: updateHorizontalState">Disable Slider</button>
			</div>
		</div>
		<p>&nbsp;</p>
		<h3>Vertical Slider</h3>
		<p>This vertical slider ranges in value from 0-100 with no discrete values,
			so the widget is freely draggable.</p>
		<div id="vertSlider"></div>
		<!-- Create an element showing the value -->
		<div style="padding-top: 10px;">Value: <strong id="vertValue"></strong></div>
		
		<?php Utils::printDojoScript("isDebug: true, async: true") ?>
		<script>
		
			// Require all dependencies
			require(["dijit/form/HorizontalSlider", "dijit/form/VerticalSlider", "dijit/form/Button", "dojo/aspect", "dijit/registry", "dojo/parser", "dojo/domReady!"],
			function(HorizontalSlider, VerticalSlider, Button, aspect, registry, parser) {
				// Function for updating the enabled/disabled state of the slider
				updateHorizontalState = function() {
					// Get the slider's current state
					var currentState = registry.byId("hslider").get("disabled");
					// Update its state
					registry.byId("hslider").set("disabled", !currentState);
					// Update the button text
					registry.byId("disableButton").set("label", (currentState ? "Disable" : "Enable") + " Slider");
				};

				// Parse the page
				parser.parse();

				// Get access to nodes/widgets we need to get/set values
				var hSlider = registry.byId("hslider"), label = document.getElementById("decValue");

				// Create function that updates label when changed
				function updateHorizontalLabel() {
					// Update label
					label.innerHTML = hSlider.get("value");
				}
				aspect.after(hSlider, "onChange", updateHorizontalLabel, true);
				// Update label right away
				updateHorizontalLabel();

				// Create the vertical slider programmatically
				var vertSlider = new VerticalSlider({
					minimum: 0,
					maximum: 100,
					pageIncrement: 20,
					value: 20,
					intermediateChanges: true,
					style: "height: 200px;"
				}, "vertSlider");
				var vertLabel = document.getElementById("vertValue");
				function updateVerticalLabel() {
					// Update label
					vertLabel.innerHTML = vertSlider.get("value");
				}
				aspect.after(vertSlider, "onChange", updateVerticalLabel, true);
				// Update label right away
				updateVerticalLabel();

				// Start up the widget
				vertSlider.startup();
			});
		</script>
	</body>
</html>
