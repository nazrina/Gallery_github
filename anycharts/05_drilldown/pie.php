<?php 

	header('content-type:text/xml');

	// This script creates XML
	// used to create Pie chart
	// in index.php


	// Create new series
	$series = "<series name='Product Sales'>
			<tooltip enabled='true'>
				<format>{%YPercentOfSeries}{numDecimals:0} %</format>
			</tooltip>
			<label>
				<format>{%Name}</format>
			</label>";




	$series=$series."<point name='Oranges' y='10' color='Orange' selected='true'/>";
	$series=$series."<point name='Bananas' y='20' color='Yellow'/>";
	$series=$series."<point name='Apples'  y='40' color='Green'/>";

        $series = $series."</series>"
?>

<anychart>
<margin all="2"/>
<charts>
	<chart plot_type="pie">
	<data_plot_settings>
		<pie_series >
		  <label_settings mode="Outside" text_align="Center" enabled="True"/>
			<tooltip_settings enabled="true">
				<background>
					<fill opacity="0.8"/>
					<effects enabled="false"/>

					<border>
						<effects enabled="false"/>
					</border>
					<corners type="Rounded" all="20"/>
				</background>
				<format>{%YPercentOfSeries}{numDecimals:0}%</format>
			</tooltip_settings>			
		  <connector enabled="True" opacity="1" thickness="1"/>
		  <marker_settings enabled="true" color="Yellow">
			<marker type="Star5" anchor="Center" size="20">
			</marker>


			<states>
				<normal> 
					<marker type="None"/>
				</normal>
				<hover color="White">
					<marker size="12"/> 
				</hover>
			</states>
		  </marker_settings>

		</pie_series>

	</data_plot_settings>
	<data>
<?php
		
	// Output data section
	echo $series; 

?>

	</data>
	<chart_settings>
		<title enabled="false"/>
		<chart_background>
			<corners type="Square"/>
		</chart_background>
		<data_plot_background>
			<inside_margin all="2"/>
			</data_plot_background>
	</chart_settings>
	</chart>
</charts>
</anychart>
