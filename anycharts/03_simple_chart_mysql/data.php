<?php 

	// This script gets data from MySQL Database and
	// puts it into AnyChart XML format
	// this script is used in index.html file
	// to show chart using AnyChart.

	// set XML as output format for this script.

	header('content-type:text/xml');

	// configure connection to your database
	// data from dump.sql should be added to
	// your database in order for this sample
	// to work 

	$MYSQL['host'] = 'localhost';
	$MYSQL['user'] = 'root';
	$MYSQL['password'] = '';
	$MYSQL['database'] = 'test_1'; 

	$connect = mysql_connect($MYSQL['host'],$MYSQL['user'],$MYSQL['password']);
	mysql_select_db($MYSQL['database'], $connect);

	// Note: the same idea can be used for 
	// connecting with any other database.

	// Select all products from anychart_sample_products
	$res = mysql_query("SELECT * FROM `person`", $connect);

	$products = Array();

	// Create a string with data section
	$data = '<data>';

	// Loop through all products
	while ($product = mysql_fetch_assoc($res))
	$products[] = $product;

	for ($i = 0;$i<count($products);$i++) {

		$product = $products[$i];

		// Open series node 
		$data .= '<series name="'.$product['name'].'">';

		// Make a query to MySQL
		$productOrders = mysql_query('SELECT * FROM `car` WHERE id_car='.$product['id'].' ORDER BY `rental_car` ASC', $connect);

		// Fetch rows from server
 		while ($order = mysql_fetch_assoc($productOrders)) 
			// create points in series
		  	$data .= '<point name="'.$order['rental_car'].'" y="'.$order['price'].'" />';
	
		// Close series node
		$data .= '</series>';  

		}

	// Close data node
	$data .= '</data>';

	mysql_close($connect);

// Chart Settings XML
?><anychart>
	<charts>
		<chart>
			<chart_settings>
			  <title>
				<text>Products orders by date</text>
			  </title>
			  <legend enabled="true">
			  	<title enabled="false" />
			  	<title_separator enabled="false" />
			  </legend>
			  <axes>
			  	<x_axis>
			  		<title>
			  			<text>Date</text>
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
						<format><![CDATA[Product: {%SeriesName}{enabled:false}
Date: {%Name}{enabled:false}
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