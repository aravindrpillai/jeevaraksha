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
<font color ="Green" size ="5">
<br>
<b><u>Jeevaraksha DB Editing Page</u></b>
<br><br><br>
</font>





<?php
error_reporting(0);
$pw = "projectjeeva";
$access = 0;


if(isset($_REQUEST['db_edit']))
{
$access = 2;	  // $access = 2 is to ensure that "edit" button of DB editing field is clicked
$password = $pw;  // already password entered, so no need for new password check.
}

if(isset($_REQUEST['submit']))
{
$access = 1;	// $access = 1 is to ensure that "submit" button of password field is clicked
$password = $_REQUEST['password'];
}

if(strcmp($password,$pw) != 0)
{
echo "<fieldset><form action = \"new_field_db.php\" method=\"POST\">
Enter password : <input type = \"password\" name =\"password\">
<input type = \"submit\" value =\"Submit\" name =\"submit\">
</form></fieldset>";
if($access == 1) 
echo "<br><font color=\"red\"> Database access error, check password </font> ";
}


/* ------------ DAtabase access is allowed inside the "if condition" below stated --------------- */ 
if(strcmp($password,$pw) == 0)
{
echo"<fieldset><legend> Field Add/Drop/Show/Edit </legend>";

echo "<left><form action=\"new_field_db.php\" method=\"POST\">
<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Select table  <select name=\"table\">
<option>organ_donation</option>
<option>hospital_registration</option>
<option>need_help</option>
<option>blood_bank</option>
<option>need_help_secondary</option>
<option>feedback</option>
</select>

&nbsp; Field to &nbsp;&nbsp;&nbsp;<select name=\"action\">
<option>ADD</option>
<option>DELETE</option>
<option>SHOW</option>
<option>EDIT</option>
</select>


<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Field name   <input type=\"text\" name=\"field_name\"> 

&nbsp; Field type &nbsp;<select name=\"type\">
<option>integer</option>
<option>character</option>
<option>decimal</option>
</select> 

<br>&nbsp;for character enter word limit &nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"limit\">

<br><br>  <input type=\"submit\" value=\"Edit database\" name=\"db_edit\">";

$table      = $_REQUEST['table'];
$action     = $_REQUEST['action'];
$field_name = $_REQUEST['field_name'];
$type       = $_REQUEST['type'];
$limit      = $_REQUEST['limit'];


/*
echo "<br><br> * Table : $table";
echo "<br> * Action : $action";
echo "<br> * Field_name : $field_name";
echo "<br> * Type : $type";
echo "<br> * limit : $limit";
*/

if(($field_name == "") && ($action != "SHOW")) echo "<br><br><font color=\"red\"> * Error , Field Empty *</font>  ";
if(($type == "character") && ($limit == "") && ($action != "DELETE")) 
echo "<br><br><font color=\"red\"> * Error , Word limit empty *</font>  ";

else    //database action comes inside this ELSE function
{
require_once("data_base.php");

if($action == "ADD")
switch($type)
{
case "integer":   $query = "ALTER TABLE $table ADD $field_name integer";         break;
case "character": $query = "ALTER TABLE $table ADD $field_name varchar($limit)"; break;
case "decimal":   $query = "ALTER TABLE $table ADD $field_name double";          break;
}


//-------------
if($action == "EDIT")
if(($filed_name == "") || ($limit == "") || ($type != "character")) 
{
$query = "alter table $table modify $field_name varchar($limit)";
$result = mysql_query($query);
if(!$result) {echo "<br><br><br><br><font color = \"red\" size=\"4\"> * Error ". mysql_error() ;}
}
else
echo "<br><br><font color=\"red\"> * Error , Check fields *</font>  ";

//-------------



if($action == "DELETE")  $query = "ALTER TABLE $table DROP $field_name";
if($action != "SHOW") $result = mysql_query($query);
if(!$result) {echo "<br><br><br><br><font color = \"red\" size=\"4\"> * Error ". mysql_error() ;}

}
echo "<br><br><font color = \"blue\" size=\"3\"> Colums of Table : $table<br></font>";
$query2 = "SHOW COLUMNS FROM $table";
$result = mysql_query($query2);
if(!$result) {echo"<br><br><br><br> * Error ". mysql_error() ;}
while ($rows = mysql_fetch_array($result))
echo $rows['Field'] . " ; ";

echo"</fieldset></font>";

//-----------------------------------------------------------------------------------------------


}

/*---------------------------------------------------------------------------------------------------*/


?>






<br><br><br><br><br>
Designed by Aravind R Pillai , Asif Jaleel . Company <a href="www.newdimensionz.in">New Dimensionz </a>
</fieldset>
</div>		






