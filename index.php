<?php
// 98eb61702a655580856ce7ad
$INR_price = 0;
$req_url = 'https://prime.exchangerate-api.com/v5/98eb61702a655580856ce7ad/latest/USD';
$response_json = file_get_contents($req_url);

if(false !== $response_json) {
    try {
		$response = json_decode($response_json);
		if('success' === $response->result) {
			$INR_price = round($response->conversion_rates->INR, 2);
		}
    }
    catch(Exception $e) {}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>USD - INR</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="jumbotron container">
		<a href="signup.php"><button class="btn btn-lg btn-primary" style="float: right;">Sign up</button></a>
		<p class="h1">Current Rate:</p>
		<p class="text-center h1">
		<?php 
			echo "1 Dollar = " . $INR_price . " Rupee";
		?></p>
	</div>

</body>
</html>