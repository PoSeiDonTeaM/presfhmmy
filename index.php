<html>
<head>
<title>Engibeering Science </title>

<style>

body{
background-color: #666;
}

.button{
background-color: #222;
border-color:white;
color: white;
padding: 20px;
text-align: center;
display: inline-block;
font-size: 16px;
margin-left: 50px;
margin-top:50px;
}


#title{

font-size: 50px;
text-align:center;
color: #aaa;

}


</style>

</head>

<body>
<p><div id='title'>Engibeering Science</div><hr> </p>


<form action="" method="post">
GPIO 17&nbsp;<input type="submit" name="LEDon" value="ON"></form>

</form>
<button class='button button2'>LED Off</button>




</body>


<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

echo 4;

if(isset($_POST["LEDon"])) 
{
$a = escapeshellcmd("sudo -u www-data python /var/www/html/led_on.py");
$output = shell_exec($a);
echo $output;
echo 3;
}
echo 5;

?>


</html>
