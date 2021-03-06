<?php include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php') ?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: dojo/on</title>

		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<style>
			#myButton {
				margin-bottom:1em;
			}
			#myDiv {
				border: 1px solid black;
				background-color: white;
				width: 100px;
				height: 100px;
			}
		</style>
	</head>
	<body>
		<h1>Demo: dojo/on</h1>
		<button id="myButton">Click me!</button>
		<div id="myDiv">Hover over me!</div>
		<br /><br />
		<button id="myScopedButton1">Click me to see the scope of my handler ("myScopedButton1")</button>
		<br/>
		<button id="myScopedButton2">Click me to see the scope of my handler ("myObject")</button>
		<?php
                        Utils::printDojoScript("async: true");
		?>
		<script>
			require(["dojo/on", "dojo/dom", "dojo/dom-style", "dojo/_base/lang", "dojo/mouse", "dojo/domReady!"],
			function(on, dom, domStyle, lang, mouse) {
				var myButton = dom.byId("myButton"),
					myDiv = dom.byId("myDiv"),
					myScopedButton1 = dom.byId("myScopedButton1"),
					myScopedButton2 = dom.byId("myScopedButton2"),
					myObject = {
						id: "myObject",
						onClick: function(evt){
							alert("The scope of this handler is " + this.id);
						}
					};

				on(myButton, "click", function(evt){
					domStyle.set(myDiv, "backgroundColor", "blue");
				});
				on(myDiv, mouse.enter, function(evt){
					domStyle.set(myDiv, "backgroundColor", "red");
				});
				on(myDiv, mouse.leave, function(evt){
					domStyle.set(myDiv, "backgroundColor", "");
				});

				var handle = on(myButton, "click", function(evt){
					// Remove this event using the handle
					handle.remove();

					// Do other stuff here that you only want to happen one time
					alert("This alert will only happen one time.");
				});

				// This will alert "myScopedButton1"
				on(myScopedButton1, "click", myObject.onClick);
				// This will alert "myObject" rather than "myScopedButton2"
				on(myScopedButton2, "click", lang.hitch(myObject, "onClick"));
			});
		</script>
	</body>
</html>
