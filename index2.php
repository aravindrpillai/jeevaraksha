<head>
<link rel="shortcut icon" href="design/title_img.gif"> 
	<title>Jeevaraksha</title>
    
    <link rel="index" href="./" title="Home" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="./css/main.css" />
    <link rel="stylesheet" media="print" type="text/css" href="./css/print.css" />
    <link rel="stylesheet" media="aural" type="text/css" href="./css/aural.css" />
</head>

<body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45110407-1', 'jeevaraksha.com');
  ga('send', 'pageview');

</script>




<div id="main" class="box">

<fieldset>
<legend>www.jeevaraksha.com</legend>
<center>
<font color ="Green" size ="6">
<br><br><br>
<b><u>Welcome to Jeevaraksha.com</u></b>
<br><br><br>
</font>

<font size="3" color ="blue">
<b>This site will launch by the first week of next year.</b>
<br><br><br><br><br><br><br><br><br><br>

<fieldset>
<form action = "index2.php" method="POST">
For Administrator enter password : <input type = "password" name ="password">
<input type = "submit" value ="Enter Jeevaraksha" name ="submit">
</form></fieldset>


<?php
error_reporting(0);
if(isset($_REQUEST['submit']))
{
$pw = $_REQUEST['password'];
if($pw == "jeeva2014") 
{
$value = "yes";
setcookie('access' , $value , time()+4800);
header('location: index.php');  
exit; 
}

else 
{
$value = "no";
echo"<br><br><font color =\"RED\"> Sorry , Access password error</font> ";
setcookie('access' , $value , time()+4800);    // $access = $_COOKIE['access'];
}
}

else   
{
$value = "no";
setcookie('access' , $value , time()+4800);    // $access = $_COOKIE['access'];
}

?>

</font>



<br><br><br><br><br>
Designed by Aravind R Pillai , Asif Jaleel . Company <a href="www.newdimensionz.in">New Dimensionz </a>
</fieldset>
</div>		






