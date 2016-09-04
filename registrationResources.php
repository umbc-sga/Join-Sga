<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function addToBasecamp ($url, $email) {

        // Username and Password of a basecamp user you wish to connect with
	include "../../cgi-bin/bc_cred.php";


	if (empty($url)) {
		$url = 'projects.json';
	}

        // jSON String for request
	$json_string = '';

        // Initializing curl
	$ch = curl_init();

        // define data
	$data = array('email_addresses' => array($email));

        // Configuring curl options
	$options = array(
		CURLOPT_URL            => 'https://basecamp.com/2979808/api/v1/' . $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POSTFIELDS     => json_encode($data),
            CURLOPT_USERPWD        => $credentials, // authentication; from included file bc_cred.php
            CURLOPT_HTTPHEADER     => array('Content-type: application/json', 'User-Agent: UMBC SGA iTracker (joshua.massey@umbc.edu)', 'Content-Length: ' . strlen(json_encode($data))),
            CURLOPT_USERAGENT      => 'Api Client',
            CURLOPT_FAILONERROR    => true
            );

        // Setting curl options
	curl_setopt_array($ch, $options);

        // Getting results
	curl_exec($ch); 
        // Close open connection
	curl_close($ch);
}


function getJson ($url) {
	include "../../cgi-bin/bc_cred.php";

    	// jSON String for request
	$json_string = '';

		// Initializing curl
	$ch = curl_init();

		// Configuring curl options
	$options = array(
		CURLOPT_URL            => 'https://basecamp.com/2979808/api/v1/' . $url,
		CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_USERPWD        => $credentials, // authentication; from included file bc_cred.php
		    CURLOPT_HTTPHEADER     => array('Content-type: application/json', 'User-Agent: UMBC SGA iTracker (joshua.massey@umbc.edu)'),
		    CURLOPT_USERAGENT      => 'Api Client',
		    CURLOPT_FAILONERROR    => true
		    );

		// Setting curl options
	curl_setopt_array($ch, $options);

		// Getting results
		$result = curl_exec($ch); // Getting jSON result string
		
		// Close open connection
		curl_close($ch);
		return json_decode($result, true);

		
}


function registerPersonal ($mail) {

	include "../../cgi-bin/mysqlcred.php";

	$id = 0;
	$bio = $_POST['bio'];
	$major = $_POST['major'];
	$class = $_POST['classStanding'];
	$home = $_POST['hometown'];
	$fact = $_POST['fact'];
	$people = getJson('people.json');
	foreach($people as $person){
		if($person['email_address'] === $mail){
			$id = $person['id'];
			$sql = "SELECT * FROM person WHERE id = $id";
			$results = mysqli_query($link, $sql);
			if(mysqli_num_rows($results) > 0){
				$sql = "UPDATE `person` SET `bio`= '$bio',`major`= '$major',`classStanding`= '$class',`hometown`= '$home',`fact`='$fact' WHERE `id` = $id";
				mysqli_query($link, $sql);
			}else{
				$sql = "INSERT INTO `person`(`id`, `bio`, `major`, `classStanding`, `hometown`, `fact`) VALUES ($id, '$bio', '$major', '$class', '$home', '$fact')";
				mysqli_query($link, $sql);
			}
			return;
		}
	}
}


function slackAdd ($email) {

	//	authentication token
	include "../../cgi-bin/slack_token.php";

	// $email = $_POST['mail'];
	$first = $_POST['preferedName'];
	$last = $_POST['last-name'];
	
	$slackInviteUrl='https://umbcsga.slack.com/api/users.admin.invite?t='.time();

	$fields = array(
		'email' => urlencode($email),
		'first_name' => urlencode($first),
		'last_name' => urlencode($last),
		'token' => $token,
		'set_active' => urlencode('true'),
		'_attempts' => '1'
		);

    // url-ify the data for the POST
	$fields_string='';
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');

    // open connection
	$ch = curl_init();

    // set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $slackInviteUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    // exec
	curl_exec($ch);
    // $replyRaw = curl_exec($ch);
    // $reply = json_decode($replyRaw,true);
    // if($reply['ok']==false) {
       //  	echo '<p style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
    //         echo 'Something went wrong, try again!';
    //         echo '</p>';
    //         showForm();
    // }
    // else {
       //  	echo '<p style="font-family: \'Roboto\', sans-serif; color: #719E6F">';
    //         echo 'Invited successfully. Check your email. It should arrive within a couple minutes';
    //         echo '</p>';
    // }

    // close connection
	curl_close($ch);
}


function emails ($email, $subject, $fileName) {
	$file = fopen($fileName, 'r');
	$subsrciption = '';
	$message = '';
	
	$first = $_POST['preferedName'];
	$last = $_POST['last-name'];

	while(!feof($file)){
		$message .= fgets($file). "<br />";
	}

	$header = "MIME-Version: 1.0" . "\r\n";
	$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$header .= "From: sga@umbc.edu" . "\r\n" . "CC: sga@umbc.edu";

	$subsrciption = 'ADD sga ' . $email . ' ' . $first . ' ' . $last;
	mail("sympa@lists.umbc.edu", $subsrciption, '', $header);

	$header .= ",joshua.massey@umbc.edu";
	$message = wordwrap($message, 70);
	mail($email, $subject, $message, $header);	

}


?>