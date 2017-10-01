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

<form action="" method="POST">
GPIO 17&nbsp;<input type="submit" name="LEDon" value="ON">

</form>
<button class='button button2'>LED Off</button>




</body>
</html>

<?php

if(isset($_POST["LEDon"])) 
{
$a= exec("sudo python /var/www/html/led_on.py");
echo $a;
  echo 45;
}

?>
