<?php
//phpinfo();
//exit(0);
session_start();
/**
*Created by Todor Iulian
*/

//<<<--------------------------GEOLOCATION-------------------------->>>//

//<---Geolocation API with ipAdress--->//
$url = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=2b3d7d0ad1a285279139487ce77f3f58d980eea9546b5ccc5d08f5ee62ce7471&ip=83.103.155.123&format=json"));

//<---print all json info. from API--->//
//print_r($url);

echo "<table border='1' width='50%' align='center'><tr><td>CITY:</td><td>";
echo $url->cityName;
echo "</td></tr><tr><td>STATE OR REGION:</td><td>";
echo $url->regionName;
echo "</td></tr><tr><td>COUNTRY CODE:</td><td>";
echo $url->countryCode;
echo "</td></tr><tr><td>IP</td><td>";
echo $url->ipAddress;
echo "</td></tr><tr></table>";

//<<<--------------------------WEATHER-------------------------->>>//

//<---Link with location selected with hardcoding(you can choose a location and put it in this link)--->//
//$string = file_get_contents("http://api.wunderground.com/api/31fd9f279498fa5f/conditions/alerts/forecast/hourly/q/RO/Cluj-Napoca.json");


//<---Link with dynamic location extracted from geo location--->//
$string = file_get_contents("http://api.wunderground.com/api/31fd9f279498fa5f/forecast/geolookup/conditions/q/" .$url->countryCode. "/" .$url->cityName.".json");
$json_decode = json_decode($string, true);

//<---print all json info. from API--->//
//print_r($json_decode);


//<--- display_location ---> //
$location_city = $json_decode['current_observation']['display_location']['city'];
$location_country = $json_decode['current_observation']['display_location']['country'];

echo "Location City: " .$location_city."</br>";
echo "Location Country: " .$location_country."</br>";

//<--- wather_data ---> //

$weather_temp_c = $json_decode['current_observation']['temp_c'];

echo "Temperature C: " .$weather_temp_c."</br>";

/*-------------------------------------------------------------------------------------------------------------------------
//<<<--------------------------JSON-------------------------->>>//

//<--- Return JSON with SESSiON and refresh the data after 600 s---> //

header('Content-Type: application/json; charset=utf-8');


if (isset($_SESSION['weather_temp_c']) && (time() < $_SESSION['current_time'] + 600 )) {
  echo "From cache!";
}
else {
  $string = file_get_contents("http://api.wunderground.com/api/31fd9f279498fa5f/conditions/alerts/forecast/hourly/q/RO/Cluj-Napoca.json");
  $json_decode = json_decode($string, true);
  $weather_temp_c = $json_decode['current_observation']['temp_c'];
  $_SESSION['weather_temp_c'] = $weather_temp_c;
  $_SESSION['current_time'] = time();
  echo "From wunderground!";
}
$array = array('temperature_c' => $_SESSION['weather_temp_c']);
echo json_encode($array)."\n";

print_r($_SESSION);
------------------------------------------------------------------------------------------------------------------------*/
?>
