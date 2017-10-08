<html>
<head>
<title>House Control </title>

<meta name="viewport" content="width=device-width">

<style>

body{

background-color: #fff;

}

.button{

background-color: #259;
border-color:white;
color: white;
padding: 20px;
text-align: center;
display: inline-block;
font-size: 16px;
margin-left:450px;
margin-top: 100px;
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);

}


#outside_door{

margin-left: 100px;
margin-bottom: -33px;
width: 80px;
height:80px;

}



#title{

font-size: 50px;
text-align:center;
color: #222;

}


</style>

</head>

<body>
<p><div id='title'>House Control</div><hr> </p>


<form action="" method="post">&nbsp;<input class="button" type="submit" name="LEDon" value="Open the Outside Door"><img id="outside_door" src="outside_door.png"> </form>




<!-- <button class='button button2'>LED Off</button> -->




</body>


<?php


error_reporting(E_ALL);
ini_set('display_errors', false);



if($_POST["LEDon"])
{
$a = escapeshellcmd("sudo python /var/www/html/led_on.py");
$output = shell_exec($a);
echo $output;
}


?>


</html>
