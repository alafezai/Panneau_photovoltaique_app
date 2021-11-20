<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "id17586849_exemple";
// REPLACE with Database user
$username = "id17586849_root";
// REPLACE with Database user password
$password = "Y@Jr&J>gdH}n3{Wu";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "";

$api_key= $temperature = $humidity = $sensorValue = $courant = $tension = $puissance = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $temperature = test_input($_POST["$temperature"]);
        $humidity = test_input($_POST["humidity"]);
        $sensorValue = test_input($_POST["sensorValue"]);
        $courant = test_input($_POST["courant"]);
        $tension = test_input($_POST["tension"]);
		$puissance  = test_input($_POST["puissance"]);
        // Create connection
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        
       $sql = "INSERT INTO iot_project (temperature, humidity, sensorValue, courant, tension, puissance)
        VALUES ('" . $temperature . "', '" . $humidity . "', '" . $sensorValue . "', '" . $courant . "', '" . $tension . "', '" . $puissance . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
