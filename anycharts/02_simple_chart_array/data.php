<?php 

	// This script gets data from Array and
	// puts it into AnyChart XML format
	// this script is used in index.html file
	// to show chart using AnyChart.

	// set XML as output format for this script.

	header('content-type:text/xml');

	$products = Array(
			Array ('Product A',10000),	
			Array ('Product B',20000),
			Array ('Product C',50000)
			);

	// Create a string with data section
	$data = '<data>';

		// Open series node 
		$data .= '<series name="Products Report">';

			for ($i = 0;$i<count($products);$i++) {

		  	$data .= '<point name="'.$products[$i][0].'" y="'.$products[$i][1].'" />';
	
			}

		// Close series node
		$data .= '</series>';  

	// Close data node
	$data .= '</data>';


// Chart Settings XML
?><anychart>
	<charts>
		<chart>
			<chart_settings>
			  <title>
				<text>Products Sales Volume by Products</text>
			  </title>
			  <axes>
			  	<x_axis>
			  		<title>
			  			<text>Product Name</text>
			  		</title>
			  	</x_axis>
			  	<y_axis>
			  		<title>
			  			<text>Volume</text>
			  		</title>
			  		<labels>
			  			<format>{%Value} $</format>
			  		</labels>
			  	</y_axis>
			  </axes>
			</chart_settings>
			<data_plot_settings>
				<bar_series>
					<tooltip_settings enabled="true">
						<format><![CDATA[{%Name}{enabled:false}
Volume: {%YValue}$]]> </format>
					</tooltip_settings>
				</bar_series>
			</data_plot_settings>

			<?php
		
			// Output data section

			echo $data; 

			?>

		</chart>
	</charts>
</anychart>