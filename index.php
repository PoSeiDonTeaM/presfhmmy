<html>
<head>
<title>House Control </title>

<!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" > -->

<style>

hr {

color: #aaa;
background-color: #222;
height: 10px;
box-shadow: 0 8px 16px;
}

body{

background-color: #aaa;

}

.button{

background-color: #259;
border-color:white;
color: white;
padding: 20px;
text-align: center;
display: inline-block;
margin-top:100px;
margin-left:0px;
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);

}

.button1{

width:600px;
height:200px;
font-size:48px;
}

.button2 {

width:250px;
height:250px;
font-size:36px;
}

.button3 {
width: 250px;
height: 250px;
font-size:36px;
margin-left:50px;
}

.onclick_time{
font-size: 40px;
display: inline-block;
margin-left: 30px;
margin-top:20px;
width:600px;
}


#outside_door{

margin-left: 100px;
margin-bottom: -80px;
width: 200px;
height:200px;

}



#title{

font-size: 100px;
text-align:center;
color: #259;

}


</style>

</head>

<body>
<p><div id='title'>House Control</div><hr> </p>


<form action="" method="post">&nbsp;<input class="button button1" type="submit" name="LEDon" value="Open the Outside Door"><img id="outside_door" src="outside_door.png"> </form>

<form action="" method="post">&nbsp;<input class="button button2" type="submit" name="room_light_on" value="Lights ON"> </form>

<form action="" method="post">&nbsp;<input class="button button3" type="submit" name="room_light_off" value="Lights OFF">  </form>

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

<div class="onclick_time">

<?php

if(isset($_POST["LEDon"]))
{
	$date_clicked = date('Y-m-d H:i:s');;
	echo "Last time door opened by server: " . $date_clicked . "<br>";
}

?> </div>


</html>
