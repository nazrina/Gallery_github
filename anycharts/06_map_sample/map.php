<?php 

	header('content-type:text/xml');

	// This script creates XML
	// used to create Map chart
	// in index.php

	$map_file = "states.amap";


	// Create new series
	$regions = "<series palette='Default' type='MapRegions'>
			<actions>
				<action type='call' function='alert'>
					<arg>{%REGION_NAME} is clicked</arg>
				</action>
			</actions>

			<tooltip enabled='true'>
				<format>{%Value}</format>
			</tooltip>
			<label enabled='true'>
				<format>{%Name}</format>
			</label>";

	$alaska  = "<point name='AK' y='10'/>";
	$alabama = "<point name='AL' y='20'/>";
	$arkansas= "<point name='AR' y='40'>
			<tooltip>
				<format>Arkansas shares a border with six states.</format>
			</tooltip>
		    </point>";

        $regions = $regions.$alaska.$alabama.$arkansas."</series>";


	$cities = Array(
			Array ("San Francisco","-122.433333","37.766667"),	
			Array ("Los Angeles","-118.25","34.05"),
			Array ("Denver","-104.984","39.739")
			);

	// Create new series with points
	$points =  "<series name='Cities' palette='Default' type='Marker'>
			<actions>
				<action type='navigateToUrl' url='http://en.wikipedia.org/wiki/{%Name}'/>
			</actions>
			<marker type='Circle'/>
			<tooltip enabled='true'>
				<format>Click to read about {%Name} on Wikipedia</format>
			</tooltip>
			<label enabled='true'>
				<format>{%Name}</format>
			</label>";

			for ($i = 0;$i<count($cities);$i++) {

		  	$points .= "<point name='".$cities[$i][0]."' x='".$cities[$i][1]."' y='".$cities[$i][2]."' />";
	
			}

        $points .= "</series>";

	$data = $regions.$points;

?>
    
<anychart>
	<margin all="2"/>
		<charts>
			<chart plot_type="map">
				<data_plot_settings>
<? 
	// map file is set here it is stored in maps anychart_files/swf/maps
	// AnyChart package contains more than 300 of other maps
	// and AnyChart team can create custom maps for you
	// please refer to AnyChart Documentation for more

?>

<map_series source="<?echo $map_file;?>"/>
				</data_plot_settings>
				<data>
<?php
		
	// Output data section
	echo $data; 

?>

				</data>
				<chart_settings>
					<title><text><![CDATA[Sample Map of the USA]]></text></title>
					<chart_background><corners type="Square"/></chart_background>
					<data_plot_background><inside_margin all="2"/></data_plot_background>
				</chart_settings>
			</chart>
		</charts>
</anychart>
