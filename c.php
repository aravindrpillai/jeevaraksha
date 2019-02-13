<head>
<link rel="shortcut icon" href="design/title_img.gif"> 
	<title>Database Access</title>
    
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
<center>
<font color ="Green" size ="6">
<br>
<b><u>Jeevaraksha.com Database Access</u></b>
<br><br>
</font>



<?php
error_reporting(0);
require_once("data_base.php");

//-----DELETING CONTENT FROM DB------------------------------------------------------------

$table_passed = $_REQUEST['table_passed'];
$slno_passed = $_REQUEST['id'];

if($table_passed != "") 
{
if($table_passed == "need_help")
{
$result = mysql_query("SELECT * FROM $table_passed WHERE slno = \"$slno_passed\""); 
$rows = mysql_fetch_array($result);
$img_1 = $rows['patient_image'];      $img_2 = $rows['doctor_script1'];
$img_3 = $rows['doctor_script2'];     $img_4 = $rows['doctor_script3'];

if($img_1 != "") {$loc = "images/".$img_1; unlink($loc);}
if($img_2 != "") {$loc = "images/".$img_3; unlink($loc);}
if($img_3 != "") {$loc = "images/".$img_2; unlink($loc);}
if($img_4 != "") {$loc = "images/".$img_4; unlink($loc);}
 
mysql_query("DELETE FROM $table_passed WHERE slno = \"$slno_passed\"");
}

else mysql_query("DELETE FROM $table_passed WHERE slno = \"$slno_passed\""); 
$allow_enter = 1; 
}
else $allow_enter = 0;

//-----FOR VIEWING DB CONTENT-------------------------------------------------------------------------------------------

$pw = "projectjeeva";

if($allow_enter == 0) { $table = $_REQUEST['table']; $password = $_REQUEST['password']; }
else 				  { $table = $table_passed; $password = $pw;}

if((isset($_REQUEST['check'])) || ($allow_enter == 1))
{

if($password != $pw) echo"<br><font color=\"red\" size =\"3\"><b>Database Access Password Error</b></font>";

else
{
$result = mysql_query("SELECT * FROM $table ORDER BY slno DESC");
echo "<br><center> <font color =\"green\"> <h2>Table : $table </font></h2></center>";
echo "<table cellpadding='5' cellspacing='5' border='5' width='100%'>";

switch($table)
{
//---------------------------------------------------------------------------------------------------------//

case "organ_donation":
while ($rows = mysql_fetch_array($result))
{
echo "<tr><td>" . $rows['slno'] . "</td><td> " . $rows['name'] . "</td><td> " . $rows['organ'] . "</td><td> " . $rows['dob_day'] . "</td><td> " . 
$rows['dob_month'] . "</td><td> " . $rows['dob_year'] . "</td><td> " . $rows['house_name'] . "</td><td> " . $rows['street'] . "</td><td> " . $rows['city'] . "</td><td> " . 
$rows['district'] . "</td><td> " . $rows['state'] . "</td><td> " . $rows['contact_no'] . "</td><td> " . $rows['email'] . "</td><td> " . 
$rows['date_and_time_of_register'] . "</td><td> " . $rows['ip_address']; 
$rows['name'] . "</td><td> " . $username . "</td><td> " . $rows['password'] . "</td><td> " . $rows['host']."</td><td>"; 

$id = $rows['slno'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"c.php?table_passed=$table& id=$id\">delete</a></td></tr>";
}
break;

//---------------------------------------------------------------------------------------------------------//

case "blood_bank":
echo "<tr><td><b>Sl no</td><td><b>Name</td><td><b>Contact no</td><td><b>Blood group</td><td><b>Gender</td><td><b>Day OB</td><td><b>Month OB</td><td><b>Year OB</td><td><b>Last month donated</td><td><b>Last year donated</td><td> <font color=\"red\"><b>Username</font></td><td> <font color=\"green\"><b>Password</font></td><td><b>State</td><td><b>District</td><td><b>City</td><td><b>date_and_time_of_register</td><td><b>ip_address</td><td><b>Action</td><td>"; 

while ($rows = mysql_fetch_array($result))
{
echo "<tr><td>" . $rows['slno'] . "</td><td> " . $rows['name'] . "</td><td> " . $rows['contact_no'] . "</td><td> " . $rows['blood_group'] . "</td><td> " . 
$rows['gender'] . "</td><td> " . $rows['dob_day'] . "</td><td> " .$rows['dob_month'] . "</td><td> " . $rows['dob_year'] . "</td><td> " . 
$rows['last_month_donated'] . "</td><td> " . $rows['last_year_donated'] . "</td><td> <font color=\"red\">" . $rows['username'] . "</font></td><td> <font color=\"green\">" .
$rows['password'] . "</font></td><td> " . $rows['state'] . "</td><td> " . $rows['district'] . "</td><td> " . $rows['city'] . "</td><td> " . 
$rows['date_and_time_of_register'] . "</td><td> " . $rows['ip_address'] . "</td><td> "; 

$id = $rows['slno'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"c.php?table_passed=$table& id=$id\">delete</a></td></tr> ";
}
break;

//---------------------------------------------------------------------------------------------------------//

case "hospital_registration":
while ($rows = mysql_fetch_array($result))
{
echo "<tr><td>" . $rows['slno'] . "</td><td> " . $rows['hospital_name'] . "</td><td> " . $rows['hospital_username'] . "</td><td> " . 
$rows['hospital_password'] . "</td><td> " . $rows['place'] . "</td><td> " . $rows['district'] . "</td><td> " . $rows['sector'] . " -- " . 
$rows['liscence_no'] . "</td><td> " . $rows['contact_no1'] . "</td><td> " . $rows['contact_no2'] . "</td><td> " . $rows['pincode'] . "</td><td> " . 
$rows['email'] . "</td><td> " . $rows['website'] . "</td><td> " . $rows['date_and_time_of_register'] . "</td><td> " .$rows['ip_address']; 

$id = $rows['slno'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"c.php?table_passed=$table& id=$id\">delete</a>";
}
break;

//---------------------------------------------------------------------------------------------------------//


case "college":


echo "<tr><td><b>Slno</td><td><b>Organisation_username</td><td><b>Student_username</td><td><b>Branch</td><td><b>Semester</td><td><b>Date_and_time_of_register</td><td><b>Ip_address</td><td><b>Action</td></tr>"; 

while ($rows = mysql_fetch_array($result))
{
echo "<tr><td>" . $rows['slno'] . "</td><td> " . $rows['organisation_username'] . "</td><td> " . $rows['student_username'] . "</td><td> " . 
$rows['branch'] . "</td><td> " . $rows['semester'] . "</td><td> " . $rows['date_and_time_of_register'] . "</td><td> " .$rows['ip_address'] . "</td><td>"; 

$id = $rows['slno'];
echo "<a href=\"c.php?table_passed=$table& id=$id\">delete</a></td></tr>";
}
break;

//---------------------------------------------------------------------------------------------------------//

case "need_help_secondary":
while ($rows = mysql_fetch_array($result))
{
echo "<tr><td>" . $rows['slno'] . "</td><td> " . $rows['name'] . "</td><td> " . $rows['doctor'] . "</td><td> " . 
$rows['age'] . "</td><td> " . $rows['gender'] . "</td><td> " . $rows['disease'] . "</td><td> " . $rows['treatment_cost'] . "</td><td> " . 
$rows['treatment_last_day'] . "</td><td> " . $rows['treatment_last_month'] . "</td><td> " . $rows['treatment_last_year'] . "</td><td> <font color =\"green\">" . 
$rows['account_holder'] . "</font></td><td> <font color =\"red\">" . $rows['account_no'] . "</font></td><td> " . $rows['bank_name'] . "</td><td> " . 
$rows['bank_place'] . "</td><td> " . $rows['contact_no'] . "</td><td> " . $rows['state'] . "</td><td> " . $rows['pincode'] . "</td><td> " . 
$rows['email'] . "</td><td> " .$rows['date_and_time_of_register'] . "</td><td> " .$rows['ip_address'] . "</td><td>"; 

$id = $rows['slno'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"c.php?table_passed=$table& id=$id\">delete</a></td></tr>";
}
break;

//---------------------------------------------------------------------------------------------------------//

case "need_help":
while ($rows = mysql_fetch_array($result))
{
echo "<tr><td>" . $rows['slno'] . "</td><td> " . $rows['name'] . "</td><td> " . $rows['doctor'] . "</td><td> " . 
$rows['age'] . "</td><td> " . $rows['gender'] . "</td><td> " . $rows['disease'] . "</td><td> " . $rows['treatment_cost'] . "</td><td> " . 
$rows['treatment_last_day'] . "</td><td> " . $rows['treatment_last_month'] . "</td><td> " . $rows['treatment_last_year'] . " -- <font color =\"green\">" . 
$rows['account_holder'] . "</font> -- <font color =\"red\">" . $rows['account_no'] . "</font> -- " . $rows['bank_name'] . "</td><td> " . 
$rows['bank_place'] . "</td><td> " . $rows['contact_no'] . "</td><td> " . $rows['state'] . "</td><td> " . $rows['pincode'] . "</td><td> " . 
$rows['email'] . "</td><td> " . $rows['patient_image'] . "</td><td> " . $rows['doctor_script1'] . "</td><td> " . 
$rows['doctor_script2'] . "</td><td> " .$rows['doctor_script3'] . "</td><td> " .
$rows['date_and_time_of_register'] . "</td><td> " .$rows['ip_address']."</td><td>"; 

$id = $rows['slno'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"c.php?table_passed=$table& id=$id\">delete</a></td></tr>";


}
break;

//---------------------------------------------------------------------------------------------------------//

case "feedback":
echo "<tr><td><b>Slno</td><td><b>Sender</td><td><b>Mail</td><td> <font color=\"RED\"><b>Content</font></td><td><b>date_and_time_of_register</td><td><b> ip_address</td><td><b>Action </td></tr>"; 

while ($rows = mysql_fetch_array($result))
{
echo "<tr><td>" . $rows['slno'] . "</td><td> " . $rows['name'] . "</td><td> " . $rows['mail'] . "</td><td> <font color=\"RED\"> " . 
$rows['text'] . " </font></td><td> " .$rows['date_and_time_of_register'] . "</td><td> " .$rows['ip_address']."</td><td> "; 

$id = $rows['slno'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"c.php?table_passed=$table& id=$id\">delete</a></td></tr> ";
}
break;

//---------------------------------------------------------------------------------------------------------//

case "organisation":

echo "<tr><td><b>Slno</td><td><b>Organisation_name</td><td><b>State</td><td><b>District</td><td><b>City</td><td><b>Incharge
</td><td><b>Contact_no_1</td><td><b>Contact_no_2</td><td><b>Contact_no_3</td><td><b>Username</td><td><b>Password</td><td>
<b>date_and_time_of_register</td><td><b>ip_address</td><td><b>Action</td></tr>";
while ($rows = mysql_fetch_array($result))
{
echo "<tr><td>" . $rows['slno'] . "</td><td> " . $rows['organisation_name'] . "</td><td> " . $rows['state'] . "</td><td> " . 
$rows['district'] . "</td><td> " . $rows['city'] . "</td><td> " . $rows['incharge'] . "</td><td> " . $rows['contact_no_1'] . "</td><td> " . 
$rows['contact_no_2'] . "</td><td> " . $rows['contact_no_3'] . "</td><td> " . $rows['username'] . "</td><td> " .$rows['password'] . "</td><td> " . 
$rows['date_and_time_of_register'] . "</td><td> " .$rows['ip_address']."</td><td> "; 

$id = $rows['slno'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"c.php?table_passed=$table& id=$id\">delete</a></td></tr> ";
}
break;

//----------------------------------------------------------------------------------------------------------//

default : echo "no choice";
}


echo "</table>";
}


}

?>






<form action="c.php" method="POST">
<br><br> * Enter Database Access password : <input type="password" name="password">
&nbsp;&nbsp;&nbsp;&nbsp; Select table : <select name="table">
<option>organ_donation</option>
<option>hospital_registration</option>
<option>need_help</option>
<option>blood_bank</option>
<option>need_help_secondary</option>
<option>feedback</option>
<option>organisation</option>
<option>college</option>

</select>
<input type="submit" value="Go" name="check">

</font>



<br><br><br><br><br>
Designed by Aravind R Pillai , Asif Jaleel . Company <a href="www.newdimensionz.in">New Dimensionz </a>
</div>		
