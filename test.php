
<?php
	
	// PHP Skills Test for Software Developer Position at XOMBO - Dean Clancy
	
	// Description - This script uses cURL to request JSON data from the JSONPlaceholder API
	
	
	// I am using the JSONPlaceholder website as a test API
	$url = 'https://jsonplaceholder.typicode.com/users';

	// Initiate a new cURL session
	$request = curl_init($url);
	
	// Return request as string
	curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($request, CURLOPT_POSTFIELDS, $post);	
	
	// Run cURL / execute http request
	$response = curl_exec($request);

	// Close the cURL resource
	curl_close($request);

	// Print error message if there is a problem with the response 
	if ($response === false) {
		print "Could not make successful request\n";
	} else {
		
		// Convert JSON string into php variable using json_decode() method
		$response = json_decode($response);

		print '*** COMMAND LINE OUTPUT ****';
		// Loop through each json object
		foreach ($response as $item) {
			print 'ID: ' . $item->id . "\n";
			print "Name: " . $item->name . "\n";
			print "Username: " . $item->username . "\n";
			print "<br>";
		}
		print '------------------------------------';
	}
?>

<!-- When run in a brower the JSON data is displayed neetly in a table-->
<html>
	<head>
		<title>PHP Test</title>
	</head>
	<body>
		 <table style="margin: 50px auto">
			<thead>
				<tr>
					<th><b>ID</b></th>
					<th><b>Name</b></th>
					<th><b>Username</b></th>
				<tr>
			</thead>	
		
			<tbody>
		
			<!-- Loop through each JSON object and add a row for each one -->
			<?php 
				foreach ($response as $item){
					echo '<tr>';
					echo '<td>' . $item->id . '</td>';
					echo '<td>' . $item->name . '</td>';
					echo '<td>' . $item->username . '</td>';
					echo '</tr>';
				}
			
			?>
		
			</tbody>
		</table>
	</body>
</html>