<?php
	
	$amount= $phone= $error= "";
	
	if(isset($_POST['topup'])){
		$amount = trim(htmlspecialchars($_POST["amount"]));
		$phone = trim(htmlspecialchars($_POST["number"]));
		if(!empty($amount) AND !empty($phone)){
			
			//integrate flutter wave Aurtime API
			$endpoint= "https://api.flutterwave.com/v3/bills";
			
			$postdata= array(
				"country" => "NG",
				"customer" => $phone,
				"amount" => $amount,
				"recurrence" => "ONCE",
				"type" => "AIRTIME",
				"reference" => uniqid().uniqid()
			);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_URL, $endpoint);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
			curl_setopt($ch, CURLOPT_TIMEOUT, 200);
			
			//set the headers from the endpoint
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					"Authorization: ",
					"Content-type: Application/json",
					"Cache-control: no-cache"
			));
			$request = curl_exec($ch);
			$result = json_decode($request);
			print_r($request);
			var_dump($result);
			echo $status = $result->status;
			echo $message = $result->message;
			$ref = $result->data->reference;
			if($status == "success"){
				header("Location: success.php?reference=" . $ref);
				exit;
			}else{
				header("Location: fail.php?error=" . $message);
				exit;
			}
		}
		else{
			$error="Both amount and Phone number must not be Empty!";
		}
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
					<h1>Topup or VTU App using Flutter wave (Airtime Sales App)</h1>
					<span id="errors"><?php echo $error; ?></span>
				<header>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="number" name="amount" placeholder="Enter airtime amount here" value=""/>
					<input type="tel" name="number" placeholder="Enter the phone to be credited here" value=""/>
					<input type="submit" name="topup" value="Topup Now!"/>
				</form>
			</section>
		</body>
	</html>