<?php 

	header('content-type:text/xml');


	// This script creates XML
	// used to create Bar chart
	// in index.php that is shown
	// on Pie Slice Click



	$arrProducts = Array(
			Array ('2006',10000,20000,5000),	
			Array ('2007',20000,23000,6000),
			Array ('2008',50000,10000,8000)
			   );

	if ($_GET["product"]=="Apples")
		{
		$index = 1;
		$color="Green";
		}
	elseif ($_GET["product"]=="Bananas")
		{
		$index = 2;
		$color="Yellow";
		}
	elseif ($_GET["product"]=="Oranges")
		{
		$index = 3;
		$color="Orange";
		}

	// Create new series
	$series = "<series name='Product Sales' style='AquaLight' type='bar' color='".$color."'>";

	
	for ($i = 0;$i<count($arrProducts);$i++) {

		$series=$series."<point name='".$arrProducts[$i][0]."' y='".$arrProducts[$i][$index]."'/>";
	
	}

        $series = $series."</series>"


?>

<anychart>
	<margin all="2"/>
		<charts>
			<chart>
				<data>
<?php
		
	// Output data section
	echo $series; 

?>
				</data>
			<chart_settings>
				<title>
					<text><![CDATA[Apples Sales Details]]></text></title>
				<chart_background>
					<corners type="Square"/>
				</chart_background>
				<data_plot_background>
					<inside_margin all="2"/>
				</data_plot_background>
				<axes>
					<x_axis><title><text><![CDATA[Years]]></text></title></x_axis>
					<y_axis>
						<labels><format><![CDATA[${%Value}{numDecimals:0}]]></format></labels>
						<title><text><![CDATA[Sales]]></text></title>
					</y_axis>
				</axes>
			</chart_settings>
			</chart>
		</charts>
</anychart>