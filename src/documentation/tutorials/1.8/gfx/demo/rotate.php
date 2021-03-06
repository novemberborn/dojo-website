<?php include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/',dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php') ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Rotate a Group of Shapes</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<?php Utils::printClaroCss() ?>
	</head>
	<body class="claro">
		<h1>Demo: Rotate a Group of Shapes</h1>
		<div id="surfaceElement" style="border:1px solid #ccc;width:400px;height:400px;"></div>

		<br /><br />
		<button data-dojo-type="dijit/form/Button" data-dojo-props="onClick:doAnimations">Start Animations</button>

		<?php Utils::printDojoScript("isDebug: true, async: true,  parseOnLoad: true") ?>
		<script>

			require(["dojox/gfx", "dojox/gfx/fx", "dijit/form/Button", "dojo/parser", "dojo/domReady!"], function(gfx, gfxFx, Button) {

				// Function to start animations
				doAnimations = function() {
					new gfxFx.animateTransform({
					    duration: 1200,
					    shape: group,
					    transform: [{
					        name: "rotategAt",
					        start: [0, 200, 200], // Starts at 0 degree rotation
					        end: [360, 200, 200]  // Ends at 360 degrees
					    }]
					}).play();
					new gfxFx.animateTransform({
					    duration: 1800,
					    shape: group2,
					    transform: [{
					        name: "rotategAt",
					        start: [0, 200, 200], // Starts at 0 degree rotation
					        end: [-360, 200, 200]  // Ends at 360 degrees
					    }]
					}).play();
				};

				// Create a GFX surface
				// Arguments:  node, width, height
				surface = gfx.createSurface("surfaceElement", 400, 400);

				// Create a group
				group = surface.createGroup();

				// Create a circle
				var circle1 = group.createCircle({ cx: 100, cy: 300, r:50 }).setFill({
					type: "radial",
					cx: 100,
					cy: 300,
					colors: [
						{ offset: 0,   color: "#f3001f" },
						{ offset: 1,   color: "#a40016" }
					]
				});
				var circle2 = group.createCircle({ cx: 100, cy: 100, r:50 }).setFill({
					type: "radial",
					cx: 100,
					cy: 100,
					colors: [
						{ offset: 0,   color: "#f3001f" },
						{ offset: 1,   color: "#a40016" }
					]
				});
				var circle3 = group.createCircle({ cx: 300, cy: 300, r: 50 }).setFill({
					type: "radial",
					cx: 300,
					cy: 300,
					colors: [
						{ offset: 0,   color: "#f3001f" },
						{ offset: 1,   color: "#a40016" }
					]
				});
				var circle4 = group.createCircle({ cx: 300, cy: 100, r: 50 }).setFill({
					type: "radial",
					cx: 300,
					cy: 100,
					colors: [
						{ offset: 0,   color: "#f3001f" },
						{ offset: 1,   color: "#a40016" }
					]
				});

				group2 = surface.createGroup();

				var icircle1 = group2.createCircle({ cx: 100, cy: 300, r: 25 }).setFill({
					type: "radial",
					cx: 100,
					cy: 300,
					colors: [
						{ offset: 0,   color: "#b0bddd" },
						{ offset: 1,   color: "#0543de" }
					]
				});
				var icircle2 = group2.createCircle({ cx: 100, cy: 100, r: 25 }).setFill({
					type: "radial",
					cx: 100,
					cy: 100,
					colors: [
						{ offset: 0,   color: "#b0bddd" },
						{ offset: 1,   color: "#0543de" }
					]
				});
				var icircle3 = group2.createCircle({ cx: 300, cy: 300, r: 25 }).setFill({
					type: "radial",
					cx: 300,
					cy: 300,
					colors: [
						{ offset: 0,   color: "#b0bddd" },
						{ offset: 1,   color: "#0543de" }
					]
				});
				var icircle4 = group2.createCircle({ cx: 300, cy: 100, r: 25 }).setFill({
					type: "radial",
					cx: 300,
					cy: 100,
					colors: [
						{ offset: 0,   color: "#b0bddd" },
						{ offset: 1,   color: "#0543de" }
					]
				});

			});

		</script>
	</body>
</html>
