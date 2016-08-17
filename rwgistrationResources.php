<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	function addToBasecamp($url, $email){

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

    function getJson($url){
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
		return json_decode($result);

		
    }

    function registerPersonal(){

		include "../../cgi-bin/mysqlcred.php";

		$people = getJson('people.json');
		var_dump($people);
		// foreach($people as $idx => $person){
		// 	echo $person['email_address'];
		// }
    }
?>