<?php

	// Create an XML String with data
	// we've put away chart settings
	// using anychart templates, to
	// see how chart title, axes, 
	// labels, etc. are configured
	// see templates.xml file

	$xml = "<anychart>
			<templates path='templates.xml'/>
			<charts>
				<chart template='chartTemplate'>
					<data>
						<series>
							<point name='1999' y='56789'/>
							<point name='2000' y='156890'/>
							<point name='2001' y='192019'/>
						</series>
					</data>
				</chart>
			</charts>
		</anychart>";

	// Remove line breaks from XML string
    	$xml = str_replace("\r\n","",$xml);

	// Remove tabs from XML String
    	$xml = str_replace("\t","",$xml);

	// Output Simple HTML that uses AnyChart.js and AnyChart.swf:

?>

<html>
	<head>
		<title>AnyChart Sample of Simple Using AnyChart with PHP in single PHP File</title>
		<script type="text/javascript" language="javascript" src="../anychart_files/js/AnyChart.js"></script>
	</head>
	<body>
		<h1>AnyChart Sample of Simple Using AnyChart with PHP in single PHP File</h1>
		<p>Please see index.php code to see how xml for AnyChart is created using PHP.</p>
		<div id="container"></div>
		<script type="text/javascript" language="javascript">
			//<![CDATA[
				var chart = new AnyChart("../anychart_files/swf/AnyChart.swf");
				chart.setData("<?php

// Place XML as String into AnyChart embedding JavaScript

echo $xml; 

?>");
				chart.write("container");
			//]]>
		</script>
	</body>
</html>
