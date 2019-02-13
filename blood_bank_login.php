<head>
    
<link rel="shortcut icon" href="design/title_img.gif"> 
	<title>Blood Bank</title>
    
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

<script language='javascript' type='text/javascript'>
  		function check(input)
		{
		if(input.value != document.getElementById('password').value)
		input.setCustomValidity('Mismatching Passwords ');
		else
		input.setCustomValidity('');
		}

		function check2(input)
		{
		if(input.value != document.getElementById('password1').value)
		input.setCustomValidity('Mismatching Passwords ');
		else
		input.setCustomValidity('');
		}
		
		</script>




<div id="main" class="box">

    <!-- Header -->
    <div id="header">
     <h1 id="logo">Blood Bank <span></span></a></h1>
       

        <!-- Search -->
        <div id="search" class="noprint">
        <form action="search.php" method="POST">
        <span id="search-input-out">
		<input type="text" name="search_matter" id="search-input" size="30" />
		</span>
		<input type="image" src="design/search_submit.gif" id="search-submit" value="OK" name="search" />
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
					<li><a href="feedback.php">Feedback<span class="tab-l"></span><span class="tab-r"></span></a></li>
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
		
        
		
		
<!---------------- P H P ----------------------------------------------------------------------->
		
		
<?php
		
error_reporting(0);
require_once("data_base.php");

$table_individual = "blood_bank";
$table_organisation = "organisation";
$table_college = "college";

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if($password == "adminlogin")
{
$result = mysql_query("SELECT password FROM $table_individual WHERE username=\"$username\"");
$rows = mysql_fetch_array($result);
$password = $rows['password'];
}


//--------------ACCOUNT LOGIN -----------------------------------------------------------------------------------------

$result = mysql_query("SELECT username, password FROM $table_individual");
$accept_individual = 0;

while ($rows = mysql_fetch_array($result))
{
$username_cmp =strcmp($username, $rows['username']);
$password_cmp =strcmp($password, $rows['password']);
if(($username_cmp == 0) && ($password_cmp == 0)) { $accept_individual = 1; break; }
}

$result = mysql_query("SELECT username, password FROM $table_organisation");
$accept_organisation = 0;

while ($rows = mysql_fetch_array($result))
{
$username_cmp =strcmp($username, $rows['username']);
$password_cmp =strcmp($password, $rows['password']);
if(($username_cmp == 0) && ($password_cmp == 0)) { $accept_organisation = 1; break; }
}


//--------------For deleting this account -----------------------------------------------------------------------------

if(isset($_REQUEST['delete_my_account']))
{
$acc_del_error = 2;
$username = $_REQUEST['username'];
$password =  $_REQUEST['password'];
$password_verify =  $_REQUEST['password_verify'];

$compare_pw_to_del = strcmp($password , $password_verify);
if($compare_pw_to_del == 0)
	{
	mysql_query("DELETE FROM $table_individual WHERE username = \"$username\"");
	$acc_del_error = 0;
	header('location: index.php'); exit;
	}
else $acc_del_error = 1;
}

//........UPDATE DONATION..........................................................................
{//-------------------------------------------------------------------------------------------------update donation open

$update = 3;   // if success $update=0; error 1; mistake 2
if(isset($_REQUEST['donation_update']))
{
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$month    = $_REQUEST['last_month_donated'];
$year     = $_REQUEST['last_year_donated'];

if($month != "Not yet donated")
{
	$today_month = date('m');
	Switch ($month)
	{
	case "January"	: $inp_month = 1;  break;	case "February"  : $inp_month = 2;  break;	
	case "March"  	: $inp_month = 3;  break;	case "April"	 : $inp_month = 4;  break;	
	case "May"    	: $inp_month = 5;  break;	case "June"      : $inp_month = 6;  break;
	case "July"	    : $inp_month = 7;  break;	case "August"    : $inp_month = 8;  break;	
	case "September": $inp_month = 9;  break;   case "October"   : $inp_month = 10; break;	
	case "November"	: $inp_month = 11; break;	case "December"  : $inp_month = 12; break;
	}

if( ($inp_month>$today_month) && ($year == "this year") ) $update = 2;
}


if($update==3)
{
$query = "UPDATE $table_individual SET last_month_donated=\"$month\" , last_year_donated = \"$year\" WHERE username = \"$username\" ";
$result = mysql_query($query);
if(!$result) $update = 1; 
else $update = 0;
}

}

$query = "SELECT * FROM $table_individual WHERE username = \"$username\"";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);
$last_month_donated = $rows['last_month_donated'];
$last_year_donated = $rows['last_year_donated'];

$accept_individual == 1;
if($last_month_donated == "Not yet donated") $donation_update = "Not yet donated";
else
$donation_update = "$last_month_donated of $last_year_donated";

}//-----------------------------------------------------------------------------------------------update donation closed


//.......EDITING PROFILE............................................................................

{
$error_update = 5;
if(isset($_REQUEST['blood_donation_update']))
{
$error_update = 0;
$username = $_REQUEST['username'];		//hidden transfer
$password = $_REQUEST['password'];


$query = "SELECT * FROM $table_individual WHERE username = \"$username\"";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);
		
		$name 		= $rows['name'];
        $contact_no = $rows['contact_no'];	
		$state 		= $rows['state'];	
		$district 	= $rows['district'];	
		$city 		= $rows['city'];
		
		$name_u       = $_REQUEST['name_u'];
		$contact_no_u = $_REQUEST['contact_no_u'];	
		$username_u   = $_REQUEST['username_u'];	
		$password1_u  = $_REQUEST['password_u'];	
		$password2_u  = $_REQUEST['re_password_u'];	
		$state_u      = $_REQUEST['state_u'];	
		$district_u   = $_REQUEST['district_u'];	
		$city_u       = $_REQUEST['city_u'];	
		
		$state_u    = strtoupper($state_u);	
		$district_u = strtoupper($district_u);	
		$city_u     = strtoupper($city_u);
		
/*		echo "<br> $name - $name_u ";
		echo "<br> $username - $username_u ";
		echo "<br> $password - $password1_u - $password2_u ";
		echo "<br> $contact_no - $contact_no_u ";
		echo "<br> $state - $state_u ";
		echo "<br> $district - $district_u ";
		echo "<br> $city - $city_u ";
*/		
		
if($username != $username_u) //checking for previosly existing username
{
$query = "SELECT username FROM $table_individual ORDER BY slno DESC";
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
{
$username_prev = $rows['username'];
if($username_prev == $username_u) { $error_update = 6; break; }   // already existing
}
}		
		
		$compare_password = strcmp($password1_u , $password2_u);
		$length = strlen($password1_u);
		
		if($password1_u != $password2_u)      $error_update = 1;
		if($length < 5) 	     	          $error_update = 2;
		
		if($name_u == "")        $name_u = $name;
		if($contact_no_u == "")  $contact_no_u = $contact_no;
		if($username_u == "")    $username_u = $username;
		if($state_u == "")       $state_u = $state;
		if($district_u == "")    $district_u = $district;
		if($city_u == "")        $city_u = $city;
		if( ($password1_u == "") && ($password2_u == "") )       
								 $password1_u = $password;
		

$update = 3; // this is to off the msg shown in the "last blood donated section"; 		
if($error_update == 0)
{
$query = "UPDATE $table_individual SET name=\"$name_u\" , contact_no=\"$contact_no_u\" , username=\"$username_u\" ,
password=\"$password1_u\" ,state=\"$state_u\" ,district=\"$district_u\" ,city=\"$city_u\" WHERE username=\"$username\" ";
//echo "<br> Query : $query";
$result = mysql_query($query);
if(!$result) $error_update = 3; else $accept_individual=1;
$username = $username_u;
$password = $password1_u;

}


}
}

//-----INDIVIDUALS PROFILE------------------------------------------------------------------------------------

if($accept_individual == 1)
{

$result = mysql_query("SELECT * FROM $table_individual WHERE username = \"$username\"");
$rows = mysql_fetch_array($result);
$name = $rows['name'];


echo "<fieldset><legend>Welcome $name</legend>";

//.......LAST DONATION....................................................................................
echo "<form action=\"blood_bank_login.php\" method=\"POST\">
      <fieldset><legend> Last donated on :  $donation_update</legend> last blood donated date ";
echo "	<select name=\"last_month_donated\">
<option>Not yet donated </option>
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
<option>June</option>
<option>July</option>
<option>August</option>
<option>September</option>
<option>October</option>
<option>November</option>
<option>December</option>
</select>

&nbsp;&nbsp; Year <select name=\"last_year_donated\">
<option>this year</option>
<option>previous year</option>
<option>before 1 year</option>
</select> ";
echo "<input type =\"hidden\" value = \"$username\" name=\"username\">";
echo "<input type =\"hidden\" value = \"$password\" name=\"password\">";
echo "<input type=\"submit\" value=\"save\" name=\"donation_update\">
</form>";

echo "<b>";
if($update == 0)  echo "<font color=\"green\"><br>&nbsp;&nbsp;&nbsp;&nbsp; Sucessfully Updated </font>";
if($update == 1)  echo "<font color=\"red\"><br>&nbsp;&nbsp;&nbsp;&nbsp; Updating Error </font>";
if($update == 2)  echo "<font color=\"red\"><br>&nbsp;&nbsp;&nbsp;&nbsp; check Month and Year </font>";
echo "</b>";

echo "</fieldset>";

//....EDIT PROFILE............................................................................
if(!isset($_REQUEST['edit_profile']))
{
echo "<form action = \"blood_bank_login.php\" method=\"POST\">
<fieldset><legend> Edit profile </legend>To edit profile click on this button &nbsp;&nbsp;&nbsp;";


echo "<input type =\"hidden\" value = \"$username\" name=\"username\">";
echo "<input type =\"hidden\" value = \"$password\" name=\"password\">";
echo "<input type =\"submit\" value=\"Edit my profile details\" name=\"edit_profile\">
</form>";

echo "<br><br><b>";
if($error_update == 0)
echo "<font color=\"green\"> Sucessfully updated </font>";
if($error_update == 1)
echo "<font color=\"red\"> Update error, Passwords does'nt match </font>";
if($error_update == 2)
echo "<font color=\"red\"> Update error, Passwords length shouls be greater then 5 characters </font>";
if($error_update == 3)
echo "<font color=\"red\"> Update error, Failed to write onto database</font>";
if($error_update == 6)
echo "<font color=\"red\"> Update error, Username already exists</font>";
echo "</b></fieldset>";
}


$editing = 0;			// while successfully updated its value will be 1
if(isset($_REQUEST['edit_profile']))
{

$editing = 1;
$query = "SELECT * FROM $table_individual WHERE username = \"$username\"";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);
		
        $name = $rows['name'];	
		$contact_no = $rows['contact_no'];	
		$password_db = $rows['password'];	
		$state = $rows['state'];	
		$district = $rows['district'];	
		$city = $rows['city'];	
		
 echo "<form action=\"blood_bank_login.php\" method =\"POST\">
 <fieldset><legend> Update account </legend>       
	
	<table>	
	<tr><td><b>Name          </td><td>  <input required type=\"text\" name=\"name_u\" value=\"$name\">				 </td></tr>
	<tr><td><b>Contact No    </td><td>  <input required type=\"text\" name=\"contact_no_u\" value=\"$contact_no\">  </td></tr>
	<tr><td><b>Username		 </td><td>	<input required type=\"text\" name=\"username_u\" value=\"$username\">   </td></tr>
	<tr><td><b>Password      </td><td>	<input required type=\"password\" name=\"password_u\" id=\"password\" value=\"$password\">	 </td></tr>
	<tr><td><b>Re-Enter      </td><td>	<input required type=\"password\" name=\"re_password_u\" id=\"passwordconf\" value=\"$password_db\" oninput=\"check(this)\"></td></tr>
	<tr><td><b>Specify state </td><td>	<input required readonly type=\"text\" name=\"state_u\" value=\"$state\">		     </td></tr>
	<tr><td><b>Specify District</td><td><input required type=\"text\" name=\"district_u\" value=\"$district\">      </td></tr>
	<tr><td><b>Specify City  </td><td>	<input required type=\"text\" name=\"city_u\" value=\"$city\">              </td></tr>
	
	
	<input type=\"hidden\" value=\"$username\" name=\"username\">
	<input type=\"hidden\" value=\"$password_db\" name=\"password\">
	<tr><td><input type = \"submit\" value = \"Update Record\" name=\"blood_donation_update\"></td></tr>
	</table>		
		<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<br></fieldset></form>";

		}










//..........SELECTING ORGANISATION............................................................................

$submit = $_REQUEST['organisation_username'];
$default = "Not in any organisation";


echo "<fieldset><legend>Are you a part of any Organisation</legend>";

$error =2;
$allow_enter_inside = 0;


if((isset($_REQUEST['sel_org'])) && ($submit == $default))
{
$result = mysql_query("UPDATE $table_individual SET organisation=\"\" WHERE username = \"$username\" ");
if(!$result) $error =1;
else $error =0;

mysql_query("DELETE FROM $table_college WHERE student_username = \"$username\" ");
// deleted value from Table college as they opted association, where its not a college

$allow_enter_inside = 1;
}



if((isset($_REQUEST['sel_org'])) && ($submit != $default))
{
$organisation_username = $_REQUEST['organisation_username'];

$result = mysql_query("SELECT organisation_type FROM $table_organisation WHERE username =\"$organisation_username\" ");
$rows = mysql_fetch_array($result);
$organisation_type = $rows['organisation_type'];

if($organisation_type == "association")
{
$result = mysql_query("UPDATE $table_individual SET organisation=\"$organisation_username\" WHERE username = \"$username\" ");
$allow_enter_inside = 1;
if(!$result) $error = 1; else $error = 0;

mysql_query("DELETE FROM $table_college WHERE student_username = \"$username\" ");
// deleted value from Table college as they opted association, where its not a college

}


if($organisation_type == "college")
{
$result = mysql_query("SELECT * FROM $table_organisation WHERE username =\"$organisation_username\" ");
$rows = mysql_fetch_array($result);
$branch_1 = $rows['branch_1'];		$branch_2 = $rows['branch_2'];
$branch_3 = $rows['branch_3'];		$branch_4 = $rows['branch_4'];
$branch_5 = $rows['branch_5'];		$branch_6 = $rows['branch_6'];
$branch_7 = $rows['branch_7'];		$branch_8 = $rows['branch_8'];
$branch_9 = $rows['branch_9'];		$branch_10 = $rows['branch_10'];
$branch_11 = $rows['branch_11'];	$branch_12 = $rows['branch_12'];
$branch_13 = $rows['branch_13'];	$no_of_semesters = $rows['no_of_semesters'];

if($branch_13 == "") $no_of_branches = 12;
if($branch_12 == "") $no_of_branches = 11;		
if($branch_11 == "") $no_of_branches = 10;
if($branch_10 == "") $no_of_branches = 9;		
if($branch_9 == "") $no_of_branches = 8;
if($branch_8 == "") $no_of_branches = 7;		
if($branch_7 == "") $no_of_branches = 6;
if($branch_6 == "") $no_of_branches = 5;		
if($branch_5 == "") $no_of_branches = 4;
if($branch_4 == "") $no_of_branches = 3;		
if($branch_3 == "") $no_of_branches = 2;		
if($branch_2 == "") $no_of_branches = 1;		
if($branch_13 != "") $no_of_branches = 13;

echo "<form action = \"blood_bank_login.php\" method=\"POST\">";

echo "Branch <select name=\"branch\">";
switch($no_of_branches)
{
case 1 : echo "<option>$branch_1</option>";  break;
case 2 : echo "<option>$branch_1</option><option>$branch_2</option>";  break;
case 3 : echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option>";  break;
case 4 : echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option>";  break;
case 5 : echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option>";  break;
case 6 : echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option><option>$branch_6</option>";  break;
case 7 : echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option><option>$branch_6</option><option>$branch_7</option>";  break;
case 8 : echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option><option>$branch_6</option><option>$branch_7</option><option>$branch_8</option>";  break;
case 9 : echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option><option>$branch_6</option><option>$branch_7</option><option>$branch_8</option><option>$branch_9</option>";  break;
case 10: echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option><option>$branch_6</option><option>$branch_7</option><option>$branch_8</option><option>$branch_9</option><option>$branch_10</option>";  break;
case 11: echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option><option>$branch_6</option><option>$branch_7</option><option>$branch_8</option><option>$branch_9</option><option>$branch_10</option><option>$branch_11</option>";  break;
case 12: echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option><option>$branch_6</option><option>$branch_7</option><option>$branch_8</option><option>$branch_9</option><option>$branch_10</option><option>$branch_11</option><option>$branch_12</option>";  break;
case 13: echo "<option>$branch_1</option><option>$branch_2</option><option>$branch_3</option><option>$branch_4</option><option>$branch_5</option><option>$branch_6</option><option>$branch_7</option><option>$branch_8</option><option>$branch_9</option><option>$branch_10</option><option>$branch_11</option><option>$branch_12</option><option>$branch_13</option>";   break;
}//braces of switch
echo "</select>";

echo "&nbsp; Semester ";
echo "<select name=\"semester\">";
for($i=1 ; $i<=$no_of_semesters ; $i++)
echo "<option>$i</option>";
echo "</select>";

echo "<input type =\"hidden\" value=\"$organisation_username\" name=\"organisation_username\">";
echo "<input type =\"hidden\" value=\"$username\" name=\"username\">";
echo "<input type =\"hidden\" value=\"$password\" name=\"password\">";
echo "<input type =\"submit\" value=\"Submit\" name=\"clg_reg\"></form>";
}

}






if(isset($_REQUEST['clg_reg']))
{
$branch = $_REQUEST['branch'];
$semester = $_REQUEST['semester'];
$student_username = $_REQUEST['username'];
$organisation_username = $_REQUEST['organisation_username'];
//echo "here it should come : $organisation_username";

$slno =0;
$result = mysql_query("SELECT slno FROM $table_college");
while ($rows = mysql_fetch_array($result))
$slno = $rows['slno'];

$date_and_time_of_register = strftime('%c');
if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}
$ip_address = $ip;

$result = mysql_query("SELECT student_username FROM $table_college WHERE student_username=\"$student_username\"");
if(mysql_num_rows($result) != 0) //username already exists
{
$query = "UPDATE $table_college SET organisation_username = \"$organisation_username\" , branch = \"$branch\" , 
semester = \"$semester\" , date_and_time_of_register = \"$date_and_time_of_register\" , ip_address = \"$ip_address\" 
WHERE (student_username = \"$student_username\")"; 

$result = mysql_query($query);
if(!$result) $error = 1;
else	 $error = 0;

$result = mysql_query("UPDATE $table_individual SET organisation=\"$organisation_username\" WHERE username = \"$student_username\" ");
if(!$result)$error = 1;
else $error = 0;
}

else
{
$value ="\"" . (++$slno) . "\" ,\"" . $organisation_username ."\" , \"" . $student_username ."\" , \"" . 
$branch ."\" , \"" . $semester ."\" , \"" . $date_and_time_of_register ."\" , \"" . $ip_address ."\" ";

 
$query = "INSERT INTO $table_college
(slno , organisation_username , student_username , branch , semester , date_and_time_of_register , ip_address ) 
VALUES ($value)";
$result = mysql_query($query);
if(!$result)$error = 1;
else $error = 0;
$result = mysql_query("UPDATE $table_individual SET organisation=\"$organisation_username\" WHERE username = \"$student_username\" ");
if(!$result)$error = 1;
else $error = 0;


}

$allow_enter_inside = 1;

}



if((!isset($_REQUEST['sel_org'])) || ($allow_enter_inside == 1))
{
$result = mysql_query("SELECT username FROM $table_organisation");
echo "<form action=\"blood_bank_login.php\" method=\"POST\">";
echo "<select name=\"organisation_username\">";
echo "<option>Not in any organisation</option>";
while ($rows = mysql_fetch_array($result))
echo "<option>".$rows['username']."</option>";
echo "</select>";

echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
echo "<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo "<input type=\"submit\" name=\"sel_org\" value=\"Submit\">";
echo "</form>";

if($error == 1) echo "<font color=\"red\"> &nbsp;&nbsp;&nbsp; File writing to database error". mysql_error() . "</font>";
if($error == 0) echo "<font color=\"green\">&nbsp;&nbsp;&nbsp; <b>Successfully updated</b><br></font>";
}


 
//------------------------------------
echo "<br><b>";
$query = "SELECT organisation FROM $table_individual WHERE username = \"$username\" ";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);
$usr_nme_org = $rows['organisation'];

$query = "SELECT organisation_name FROM $table_organisation WHERE username = \"$usr_nme_org\" ";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);
$organisation_name = $rows['organisation_name'];

if($organisation_name == "")
echo "Currently you are not in any organisations above listed<br><br></b>"; 
else
echo "Your organisation : $organisation_name <br><br></b>"; 
//---------------------------------------

echo"</fieldset>";



//...........DELETING ACCOUNT...........................................................................

echo "<fieldset><legend><font color=\"red\">Delete account </font></legend>";
echo "<form method=\"POST\" action=\"blood_bank_login.php\">
<b> You can delete your account anytime , just enter your password <br>and click delete icon</b><form action = \"donate_blood_update\" method=\"POST\">
<br>Enter password : 
<input type=\"password\" name=\"password_verify\"> &nbsp;&nbsp;&nbsp;
<input type=\"hidden\" name=\"username\" value=\"$username\">
<input type=\"hidden\" name=\"password\" value=\"$password\">
<input type=\"submit\" value=\"Delete my account\" name=\"delete_my_account\">";
if($acc_del_error == 1) echo "<font color=\"red\"><br><br><b> Error, Wrong Password </b></font>";

echo "</form></fieldset>";

echo "</fieldset>";


echo "</fieldset>";
}//final braces



 
 
 
//=============ORGANISATION LOGIN========================================================================
//==============================================================================================================


//--------------For deleting organisation -----------------------------------------------------------------------------


if(isset($_REQUEST['delete_org']))
{
$acc_del_error = 2;
$username = $_REQUEST['username'];
$password =  $_REQUEST['password'];
$password_verify =  $_REQUEST['password_verify'];

$compare_pw_to_del = strcmp($password , $password_verify);
if($compare_pw_to_del == 0)
	{
	mysql_query("DELETE FROM $table_organisation WHERE username = \"$username\"");
	mysql_query("UPDATE $table_individual SET organisation=\"\" WHERE organisation = \"$username\"");
	
	$acc_del_error = 0;
	header('location: index.php'); exit;
	}
else $acc_del_error = 1;
}


//-----ORGANISATION EDITING---------------------------------------------------------------------

if(isset($_REQUEST['organisation_edit_update']))
{
//previous values
$username_prev =  $_REQUEST['username_prev'];

//edited values
$organisation_name_edit = $_REQUEST['organisation_name_edit'];
$state_edit =  $_REQUEST['state_edit'];
$district_edit =  $_REQUEST['district_edit'];
$city_edit =  $_REQUEST['city_edit'];
$incharge_edit =  $_REQUEST['incharge_edit'];
$contact_no_1_edit =  $_REQUEST['contact_no_1_edit'];
$contact_no_2_edit =  $_REQUEST['contact_no_2_edit'];
$contact_no_3_edit =  $_REQUEST['contact_no_3_edit'];
$username_edit =  $_REQUEST['username_edit'];
$password_edit =  $_REQUEST['password_edit'];
$all_round_clock_edit = $_REQUEST['all_round_clock_edit'];
$from_edit =  $_REQUEST['from_edit'];
$to_edit =  $_REQUEST['to_edit'];

if($all_round_clock_edit=="")
{
$from_edit =  $_REQUEST['from_prev'];
$to_edit =  $_REQUEST['to_prev'];
}

$working_time_error =0;
if( ($from_edit == $to_edit) && ($all_round_clock_edit=="no")) $working_time_error=1;

$username_already_exist = 0;  // condition when no such username exist
if($username_edit != $username_prev)
{
$result = mysql_query("SELECT username FROM $table_individual");
while ($rows = mysql_fetch_array($result))
{
$username_prev_db = $rows['username'];
$compare = strcmp($username_prev_db,$username_edit);
if($compare == 0) { $username_already_exist = 1; break; }
}

if($username_already_exist == 0)
$result = mysql_query("SELECT username FROM $table_organisation");
while ($rows = mysql_fetch_array($result))
{
$username_prev_db = $rows['username'];
$compare = strcmp($username_prev_db,$username_edit);
if($compare == 0) { $username_already_exist = 1; break; }
}
}




$error_in_password_length = 0;
if(strlen($password_edit) < 5) $error_in_password_length = 1;

 $error = 1;
if(($error_in_password_length==0) && ($username_already_exist == 0) && ($working_time_error==0))
{

if(($username_already_exist == 0) && ($username_edit != $username_prev))
{
$query = "UPDATE $table_individual SET organisation = \"$username_edit\" WHERE organisation = \"$username_prev\"";
$result = mysql_query($query);
if(!$result) {die(" <br><br> * Updation error while changing table $table_individual". mysql_error());}
}

$query = "UPDATE $table_organisation SET organisation_name = \"$organisation_name_edit\", state = \"$state_edit\", 
district = \"$district_edit\", city = \"$city_edit\", incharge = \"$incharge_edit\", 
contact_no_1 = \"$contact_no_1_edit\", contact_no_2 = \"$contact_no_2_edit\", contact_no_3 = \"$contact_no_3_edit\", 
username = \"$username_edit\", password = \"$password_edit\", all_round_clock = \"$all_round_clock_edit\", 
from_time = \"$from_edit\", to_time = \"$to_edit\" WHERE username = \"$username_prev\" ";
$result = mysql_query($query);
if(!$result) {die(" <br><br> * Updation error while changing table $table_organisation". mysql_error());}
else $error = 2;

$accept_organisation == 1;
$username = $username_edit;
$password = $password_edit;

}

}
//-------------------------------------------------------------------------------------------

if($accept_organisation == 1)
{

$result = mysql_query("SELECT * FROM $table_organisation WHERE username = \"$username\"");
$rows = mysql_fetch_array($result);
$organisation_name = $rows['organisation_name'];

echo "<fieldset><legend> Admin Panel of $organisation_name </legend>";


{//starting of members register-----------------------------------
echo "<form action = \"blood_bank_login.php\" method=\"POST\">
<fieldset>
<input type=\"hidden\" value=\"$password\" name=\"password\">
<input type=\"hidden\" value=\"$username\" name=\"username\">
<legend>Members Register";

echo "&nbsp;&nbsp;&nbsp;<select name=\"blood_group\" style=\"width:100px; height:17px; font-size:8pt\" >
<option>Blood Group</option>
		<option>O positive</option>
		<option>O negative</option>
		<option>A positive</option>
		<option>A negative</option>
		<option>B positive</option>
	    <option>B negative</option>
	    <option>AB positive</option>
        <option>AB negative</option>

</select> <input type=\"submit\" value=\"go\" name=\"blood_group_in_organisation\" style=\"width:25px; height:18px; font-size:8pt\">
</legend></form>";

if(isset($_REQUEST['blood_group_in_organisation']))
{
$count = 0;
$blood_group = $_REQUEST['blood_group'];
$result = mysql_query("SELECT name, username FROM $table_individual WHERE (organisation = \"$username\") AND (blood_group = \"$blood_group\")");
echo "<font color=\"blue\"><b>";
while ($rows = mysql_fetch_array($result))
{
++$count;
$student_username = $rows['username'];
$result2 = mysql_query("SELECT * FROM $table_college WHERE student_username = \"$student_username\"");
$rows2 = mysql_fetch_array($result2);
echo $rows['name'] ." of S". $rows2['semester'] . ", ". $rows2['branch'];
}
echo "</font></b>";
if($_REQUEST['blood_group'] != "Blood Group")
echo "<br><br> $count results found";
else
echo "<br> Select Blood group";

}



else
{// starting of main else part
$count = 0;
$result = mysql_query("SELECT name , username FROM $table_individual WHERE organisation = \"$username\"");
echo "<font color=\"blue\"><b>";
while ($rows = mysql_fetch_array($result))   $count ++;
echo " $count people in this organisation</font></b>";
}//ending of main else part

echo "</fieldset>";
}//ending of members register--------------------------------------




{//Editing profile starting------------------------------------------
echo "<fieldset><legend>Edit profile</legend>";

if((!isset($_REQUEST['edit_profile']) && (!isset($_REQUEST['organisation_edit_update'])) ) || ($error == 2))
{
echo "<form action=\"blood_bank_login.php\" method=\"POST\">";
echo "<b>Click on this button to edit organisation details</b> <input type=\"submit\" value=\"Edit\" name=\"edit_profile\">";
echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
echo "<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo "</form>";
if($error == 2)
echo "<br> <font color=\"green\"><b> Successfully updated </font> </b>";
}


if(isset($_REQUEST['edit_profile']) || ($username_already_exist==1) || ($error_in_password_length==1) || (($working_time_error==1)) )
{
$result = mysql_query("SELECT * FROM $table_organisation WHERE username = \"$username\"");
$rows = mysql_fetch_array($result);

$organisation_name = $rows['organisation_name'];
$state  = $rows['state'];
$district = $rows['district'];
$city = $rows['city'];
$incharge = $rows['incharge'];
$contact_no_1 = $rows['contact_no_1'];
$contact_no_2 = $rows['contact_no_2'];
$contact_no_3 = $rows['contact_no_3'];
$username = $rows['username'];
$password = $rows['password'];
$all_round_clock = $rows['all_round_clock'];
$from = $rows['from_time'];
$to = $rows['to_time'];


if($district == "Alappuzha") $Alappuzha = "selected";
if($district == "Ernakulam") $Ernakulam = "selected";
if($district == "Idukki")    $Idukki = "selected"; 
if($district == "Kannur")    $Kannur = "selected";
if($district == "Kasaragod") $Kasaragod = "selected";
if($district == "Kollam")    $Kollam = "selected";
if($district == "Kottayam")  $Kottayam = "selected";
if($district == "Kozhikode") $Kozhikode = "selected";
if($district == "Malappuram")$Malappuram = "selected";
if($district == "Palakkad")  $Palakkad = "selected";
if($district == "Pathanamthitta") $Pathanamthitta= "selected";
if($district == "Thrissur")  $Thrissur = "selected";
if($district == "Trivandrum")$Trivandrum = "selected";
if($district == "Wayanad")   $Wayanad = "selected";

echo "<form action =\"blood_bank_login.php\" method=\"POST\">
<table>
	<tr><td><b>Organisation Name  </td><td>  
	<input required type=\"text\" name=\"organisation_name_edit\" value=\"$organisation_name\"> 
	</td></tr>
	<tr><td><b>Specify state </td><td>	
	<input required readonly type=\"text\" name=\"state_edit\" value=\"$state\">  					
	</td></tr>
	
	
	<tr><td><b>Specify District</td><td>
		<select name=\"district_edit\" style=\"width:155px;\"/>
		<option $Alappuzha>Alappuzha</option>
		<option $Ernakulam>Ernakulam</option>
		<option $Idukki>Idukki</option>
		<option $Kannur>Kannur</option>
		<option $Kasaragod>Kasaragod</option>
		<option $Kollam>Kollam</option>
		<option $Kottayam>Kottayam</option>
		<option $Kozhikode>Kozhikode</option>
		<option $Malappuram>Malappuram</option>
		<option $Palakkad>Palakkad</option>
		<option $Pathanamthitta>Pathanamthitta</option>
		<option $Thrissur>Thrissur</option>
		<option $Trivandrum>Trivandrum</option>
		<option $Wayanad>Wayanad</option>
		</select></td></tr>
	
	<tr><td><b>Specify City  </td><td>	
	<input required type=\"text\" name=\"city_edit\" value=\"$city\">              
	</td></tr>
	
	<tr><td><b>Person Incharge  </td><td>  
	<input required type=\"text\" name=\"incharge_edit\" value=\"$incharge\">  
	</td></tr>
	<tr><td><b>Contact No.1		 </td><td>	
	<input required type=\"text\" name=\"contact_no_1_edit\" value=\"$contact_no_1\">   
	</td></tr>
	<tr><td><b>Contact No.2		 </td><td>	
	<input type=\"text\" name=\"contact_no_2_edit\" value=\"$contact_no_2\">   
	</td></tr>
	<tr><td><b>Contact No.3		 </td><td>	
	<input type=\"text\" name=\"contact_no_3_edit\" value=\"$contact_no_3\">   
	</td></tr>";
	
	
echo "<tr><td><b>Username		 </td><td>	
	<input required type=\"text\" name=\"username_edit\" value=\"$username\">   
	</td><td>";
	if($username_already_exist == 1) echo "<font color=\"red\">Already<br>existing <br>username</font></td></tr>";
	
	
echo "	<tr><td><b>Password      </td><td>	
	<input required type=\"password\" name=\"password_edit\" id=\"password1\" value=\"$password\">	 
	</td></tr>
	<tr><td><b>Re-Enter      </td><td>	
	<input required type=\"password\" name=\"re_password\" id=\"passwordconf\" value=\"$password\" oninput=\"check2(this)\">
	</td><td>";
if($error_in_password_length == 1) echo "<font color=\"red\">Password <br>should be <br>minimum 5 characters</font></td></tr>";
	
	
echo "<tr>
<td><br><b>Is this a 24 hours &nbsp;&nbsp;&nbsp; <br>avaliable organisation?</td> 
<td><br>
<input type=\"radio\" name=\"all_round_clock_edit\" value=\"no\"><b>No , 
Specify time then<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>
From <select name=\"from_edit\">
<option>00</option><option>01</option><option>02</option><option>03</option>
<option>04</option><option>05</option><option>06</option><option>07</option>
<option>08</option><option>09</option><option>10</option><option>11</option>
<option>12</option><option>13</option><option>14</option><option>15</option>
<option>16</option><option>17</option><option>18</option><option>19</option>
<option>20</option><option>21</option><option>22</option><option>23</option>
</select>
<b>To <select name=\"to_edit\">
<option>00</option><option>01</option><option>02</option><option>03</option>
<option>04</option><option>05</option><option>06</option><option>07</option>
<option>08</option><option>09</option><option>10</option><option>11</option>
<option>12</option><option>13</option><option>14</option><option>15</option>
<option>16</option><option>17</option><option>18</option><option>19</option>
<option>20</option><option>21</option><option>22</option><option>23</option>
</select>Hours
</td></tr><tr><td></td>
<td><input type=\"radio\" name=\"all_round_clock_edit\" value=\"yes\"> <b> Yes, this is a 24 hours 
<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;available organisation </td><td>
";


if($working_time_error==1)
echo "<font color=\"red\"><br>Starting and<br>ending time<br>are same </font></td></tr>";

echo "	
<input type=\"hidden\" value=\"$username\" name=\"username_prev\">
<input type=\"hidden\" value=\"$password\" name=\"password_prev\">
<input type=\"hidden\" value=\"$from\" name=\"from_prev\">
<input type=\"hidden\" value=\"$to\" name=\"to_prev\">
	
	<tr><td><input type = \"submit\" value = \"Update Record\" name=\"organisation_edit_update\">
	</td></tr>
	</table>";	


		
}

echo "</fieldset>";
}//Editing profile ending--------------------------------------------

{//deleting profile starting-----------------------------------------

echo "<fieldset><legend><font color=\"red\">Delete account </font></legend>";

if(!isset($_REQUEST['delete_confirmation']))
{
echo "<form action=\"blood_bank_login.php\" method=\"POST\">";
echo "<b>Click here to delete your account</b> &nbsp;&nbsp;&nbsp;<input type=\"submit\" value=\"Delete\" name=\"delete_confirmation\" style=\"width:170; height:30;\">";
echo "<input type=\"hidden\" value=\"$username\" name=\"username\">";
echo "<input type=\"hidden\" value=\"$password\" name=\"password\">";
echo "</form>";
}
else
{
echo "<form method=\"POST\" action=\"blood_bank_login.php\">
<b> You can delete this organisation anytime , just enter your password <br>and click delete icon</b>
<br>Enter password : 
<input type=\"password\" name=\"password_verify\"> &nbsp;&nbsp;&nbsp;
<input type=\"hidden\" name=\"username\" value=\"$username\">
<input type=\"hidden\" name=\"password\" value=\"$password\">
<input type=\"submit\" value=\"Delete organisation\" name=\"delete_org\">";
if($acc_del_error == 1) echo "<font color=\"red\"><br><br><b> Error, Wrong Password </b></font>";

echo "<br><br><b><font color=\"red\"> Note : No confirmation message will be shown by clicking the delete icon after entering the right password. </font><br><br><font color=\"blue\">By deleting this organisation, people who belongs to this organisation will be removed from this organisation and their details will be made public</b></font>";
echo "</form>";
}

echo "</fieldset></fieldset>";
}//deleting profile ending-------------------------------------------



echo "</fieldset>";
}

//==============================================================================================================
//==============================================================================================================







		

//--------------SIDE PIC ------------------------------------------------------------


$side_pic_allow = 1;  	// if =1, means side pic is enabled, else signout option is displayed
if( ($accept_individual == 0) && ($accept_organisation == 0))        // username & password error 
{
$side_pic_allow = 0;
echo "<form action =\"donate_blood.html\"><fieldset><legend><font color =\"red\">ERROR</legend></font>";
echo "<br> &nbsp;&nbsp;<font color = \"red\" size =\"2\"><b>Error, Username and Password does'nt match.</font>  ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type = \"submit\" value=\"Back to login page\"></form>";
echo "</fieldset>";
}


echo "</div>";

//<!------------------------------------------------------------------------------------------->

		if($side_pic_allow == 1)
		{
        echo"<div id=\"about-me\"><fieldset><legend>Sign Out</legend><form action =\"index.php\">
		&nbsp;&nbsp;&nbsp;<input type=\"submit\" value=\"&nbsp;&nbsp;&nbsp;&nbsp;Sign Out&nbsp;&nbsp;&nbsp;&nbsp;\">
		<br></form><br>";
		
		echo "<form action =\"blood_bank_login.php\" method=\"POST\">
		<input type=\"hidden\" name=\"username\" value=\"$username\">
		<input type=\"hidden\" name=\"password\" value=\"$password\">
		&nbsp;&nbsp;&nbsp;<input type=\"submit\" value=\"&nbsp;Refresh page&nbsp;\">
		</form><br></fieldset></div>";
		}
		
		
		?>
		
</div></div>
		
<!------------------------------------------------------------------------------------------------------------------------>
	
	
    <!-- Footer -->
    <div id="footer">
    <p id="createdby">Product of <a href="http://www.newdimensions.in">New Dimensions</a> </p>
    <p id="copyright"><font size="1">&copy; 2013 Developed by Aravind R Pillai ,Asif Jaleel (For best result use Google Chrome)</p>
    </div> 
	<!-- /footer -->

	
</div> <!-- /main -->

</body>
</html>
