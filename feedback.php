<head>

<link rel="shortcut icon" href="design/title_img.gif">
	<title>Feedback</title>

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

    <!-- Header -->
    <div id="header">
     <h1 id="logo">Feedback <span></span></a></h1>


        <!-- Search -->
        <div id="search" class="noprint">
        <form action="" method="get">
        <span id="search-input-out"><input type="text" name="" id="search-input" size="30" /></span></label>
        <input type="image" src="design/search_submit.gif" id="search-submit" value="OK" />
        </form>
        </div>
		<!-- /search -->

      </div> <!-- /header -->


<!----------------------------------------------------------------------------------------------------------------------------->



		<!-- Main menu (tabs) -->
               <div id="tabs" class="noprint">
               <h3 class="noscreen">Navigation</h3>
               <ul class="box">
                    <li><a href="index.php">Home<span class="tab-l"></span><span class="tab-r"></span></a></li>
                    <li><a href="donate_organ.html">Donate Organs<span class="tab-l"></span><span class="tab-r"></span></a></li>
                    <li><a href="hospital_registration.html">Hospitals<span class="tab-l"></span><span class="tab-r"></span></a></li>
					<li><a href="blood_bank.php">Blood Bank<span class="tab-l"></span><span class="tab-r"></span></a></li>
					<li><a href="need_help.html">Register a patient<span class="tab-l"></span><span class="tab-r"></span></a></li>
				    <li id="active"><a href="feedback.php">Feedback<span class="tab-l"></span><span class="tab-r"></span></a></li>
					<li><a href="about.html">About<span class="tab-l"></span><span class="tab-r"></span></a></li>
              </ul>
              <hr class="noscreen" />
              </div> <!-- /tabs -->

	<!------------------------------------------------------------------------------------------------------------------------>


    <!-- Page (2 columns) -->
    <div id="page" class="box">
    <div id="page-in" class="box">

        <!-- Content should be written inside this -->
        <div id="content">

<fieldset>

<form action="feedback.php" method="POST">

&nbsp;&nbsp;&nbsp;
<input type= "text" name="name" value="Your name">&nbsp;&nbsp;&nbsp;
<input type= "text" name="mail" value="Your mail ID / mobile no">&nbsp;&nbsp;&nbsp;
<input type= "submit" name="submit" value="Submit feedback"><br>&nbsp;&nbsp;&nbsp;
<textarea placeholder="Enter your valuable feedback here." rows="4" cols="55" name="text" warp="physical"></textarea>

</form>

<!---------------- P H P ----------------------------------------------------------------------->


<?php

error_reporting(0);
require_once("data_base.php");
$table = "feedback";

if(isset($_REQUEST['submit']))
{
$name = $_REQUEST['name'];
$mail = $_REQUEST['mail'];
$text = $_REQUEST['text'];

$cmp_name = strcmp($name , "Your name"); 						  if($cmp_name == 0 ) $error = 1;
$cmp_mail = strcmp($mail , "Your mail ID / mobile no"); 		  if($cmp_mail == 0 ) $error = 2;
$cmp_text = strcmp($text , "Enter your valuable feedback here."); if($cmp_text == 0 ) $error = 3;

if($error > 0)
echo "<font color=\"RED\"> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Field Unfilled <b></font>";

$result = mysql_query("SELECT * FROM $table ORDER BY slno DESC");
while ($rows = mysql_fetch_array($result))
{
    $name_prev = $rows['name'];
    $mail_prev = $rows['mail'];
    $text_prev = $rows['text'];

$chk_name = strcmp($name , $name_prev);
$chk_mail = strcmp($mail , $mail_prev);
$chk_text = strcmp($text , $text_prev);

if(($chk_name == 0) && ($chk_mail == 0) && ($chk_text == 0)) $error = 4; // to avoid repetation
}



if($error == 0) // write into database
{

$query = "CREATE TABLE IF NOT EXISTS $table
(slno integer,name varchar(25),mail varchar(25),text varchar(200),
date_and_time_of_register varchar(30),ip_address varchar(15) )";


$result = mysql_query($query);
if(!$result) {die("<br><br><br><br> * Table creation error ". mysql_error() );}

$slno =0;
$result = mysql_query("SELECT slno FROM $table");
while ($rows = mysql_fetch_array($result))
$slno = $rows['slno'];


$date_and_time_of_register = strftime('%c');
if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}
$ip_address = $ip;

$slno+=1;

$value ="\"" . (++$slno) . "\" ,\"" . $name ."\" , \"" . $mail ."\" , \"" . $text ."\" , \"" .
$date_and_time_of_register ."\" , \"" . $ip_address ."\" ";

$query = "INSERT INTO $table
(slno , name , mail , text , date_and_time_of_register , ip_address )VALUES ($value)";

$result = mysql_query($query);
if(!$result) {die(" <br><br> * File writing to database error". mysql_error());}
}
}

$result = mysql_query("SELECT * FROM $table ORDER BY slno DESC");
while ($rows = mysql_fetch_array($result))
{
    $name = $rows['name'];
    $date = $rows['date_and_time_of_register'];
    $mail = $rows['mail'];
    $text = $rows['text'];
   	echo "<fieldset><legend><font color = \"MAGENTA\">$name </font>posted on $date</legend><font color=\"ORANGE\"><b> $text</b></font></fieldset>";
}


?>
</fieldset></div>


		<!-- Side Pic -->
        <div id="about-me">
        <p><img src="design/feedback.jpg" height="132" width="199" />
        </div>
	    <!-- /Side Pic -->
</div>
	<!------------------------------------------------------------------------------------------------------------------------>

</div> <!-- /main -->


<!-- Footer -->
<div id="footer">
<p id="createdby"><font size="1"><b>Product of <a href="http://www.newdimensions.in">New Dimensions</a> </p>
<p id="copyright">&copy; 2013 Developed by Aravind R Pillai ,Asif Jaleel (For best result use Google Chrome)</font></b></p>
</div>
<!-- /footer -->







</body>
</html>
