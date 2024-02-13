<?php
	if (isset($_GET["reference"])){
		$fail = htmlspecialchars($_GET["reference"]);
	}
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE-edge">
			<meta name="view-port" content="width=device-width, initial-scale=1.0">
			<title>Topup App with Flutter wave (Airtime Sales App)</title>
			<link rel="stylesheet" href="css/style.css"/>
		</head>
		<body>
			<section class="container">
				<header>
					<h1>Success!</h1>
					<p>You have been successfuly credited, the reference to your transcation is:<?php echo $reference; ?></p>
					<header>
				
			</section>
		</body>
	</html>