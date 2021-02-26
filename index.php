<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>NASA image</title>
</head>
<body> 
    <?php
$timestamp = rand(strtotime("2015-01-01"), strtotime("2021-02-26"));
$randomDate = date("Y-m-d", $timestamp );
$par = '&date='.$randomDate;
$ch = curl_init('https://api.nasa.gov/planetary/apod?api_key=N9Abr9FP71jWAdwhMB0Ftnb9j6Vp1zh3nYndlvFk'.$par);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$data = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo '<h1>NASA Test API call</h1>
     <p>This is a sample call to the NASA API. It uses the demo key from <a href="https://api.nasa.gov/index.html#getting-started">NASA API docs</a></p>
     <p>The NASA API requests must be made over HTTPS.</p>
     <p>Returned http code: '.$code.'
      </p><br><hr>';
      curl_close($ch);
$jtablica = json_decode($data, true); 
var_dump($jtablica);
$adres = $jtablica['url'];
echo '<br><hr>';
echo '<a href='.$adres.'>';
echo 'Random Picture of the Day';
echo '<br>'.$jtablica['title'].' from '.$jtablica['date'];
echo '</a>';
echo '<hr>';
 



?>




</body>