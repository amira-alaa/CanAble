<?php
if(isset($_POST['faq'])){
	$name= $_POST['name'];
	$review=$_POST['subject'];

	$url = 'http://api.text2data.com/v3/analyze';
	$payload = array(
		'DocumentText' => $review,
		'IsTwitterContent' => 'false',
		'PrivateKey' => '784A61E1-A8BF-4D19-B459-42DDF5B0B16F', // Add your private key here (you can find it in the admin panel once you sign-up)
		'Secret' => 'youssef', // This should be set-up in admin panel as well
	);

	$options = array(
		'http' => array(
			'header' => "Content-type: application/x-www-form-urlencoded\r\n",
			'method' => 'POST',
			'content' => http_build_query($payload),
		),
	);

	$context = stream_context_create($options);
	$response = file_get_contents($url, false, $context);
	$data = json_decode($response, true);

	// echo $result;
	if ($data['Status'] == 1) {
		global $con;
		$stmt=$con->prepare("INSERT INTO faq(name,review,result) value(?,?,?)");
		$stmt->execute(array($name,$review,$data['DocSentimentResultString']));
		
	} else {
	    echo $data['ErrorMessage'];
	}
	
}
?>