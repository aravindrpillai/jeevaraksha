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



<div id="main" class="box">

    <!-- Header -->
    <div id="header">
     <h1 id="logo">Donate Blood<span></span></a></h1>
       

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
					<li id="active"><a href="blood_bank.php">Blood Bank<span class="tab-l"></span><span class="tab-r"></span></a></li>
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
		 
		 
<?php
		 
$error = 0;
require_once("data_base.php");
error_reporting(0);

$table_individual   = "blood_bank";
$table_organisation = "organisation";


//----COLLECTING DATAS---------------------------------------------------------------------------------------

if(isset($_REQUEST['individual_submit']) || isset($_REQUEST['individual_submit_error']))
{
 $name = $_REQUEST['name'];
 $contact_no = $_REQUEST['contact_no'];
 $blood_group = $_REQUEST['blood_group'];
 $gender = $_REQUEST['gender'];
		 
 $dob_day = $_REQUEST['dob_day'];
 $dob_month  = $_REQUEST['dob_month'];
 $dob_year = $_REQUEST['dob_year'];
		 
 $last_month_donated = $_REQUEST['last_month_donated'];
 $last_year_donated = $_REQUEST['last_donated_year'];
 $username = $_REQUEST['username'];
 $password = $_REQUEST['password'];
 $re_password = $_REQUEST['re_password'];
 $username_already_exist = 0;
		 
 $state = $_REQUEST['state'];
 $district = $_REQUEST['district'];
 $city = $_REQUEST['city'];
	
 $type = "individual";
}		 

if((isset($_REQUEST['organisation_submit']))  || (isset($_REQUEST['organisation_register_error'])))
{

$organisation_name   = $_REQUEST['organisation_name'];
$state 		    = $_REQUEST['state'];
$district 		= $_REQUEST['district'];
$city 			= $_REQUEST['city'];
$incharge 		= $_REQUEST['incharge'];
$contact_no_1 	= $_REQUEST['contact_no_1'];
$contact_no_2 	= $_REQUEST['contact_no_2'];
$contact_no_3 	= $_REQUEST['contact_no_3'];
$username 		= $_REQUEST['username'];
$username_already_exist = 0;
$password1	 	= $_REQUEST['password1'];
$password2 		= $_REQUEST['password2'];
$error			= 0;

$type = "organisation";
}		 


//------FOR INDIVIDUAL REGISTRATION------------------------------------------------------------------
if($type == "individual")
{


//.....................................................................................................
/* if username exixt "$username_already_exist = 1 else 0" */
$query = "SELECT username FROM $table_individual ORDER BY slno DESC";	//checking DB of individual
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
{
$username_prev = $rows['username'];
$compare = strcmp($username_prev,$username);
if($compare == 0) { $username_already_exist = 1; break; }
}


$query = "SELECT username FROM $table_college ORDER BY slno DESC";		//checking DB of organisation
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
{
$username_prev = $rows['username'];
$compare = strcmp($username_prev,$username);
if($compare == 0) { $username_already_exist = 1; break; }
}

//.....................................................................................................

echo "<form action=\"donate_blood.php\" method=\"POST\"><fieldset><legend>Register here to be a blood donor</legend>";
$error = 0;

echo "<table>";		 
echo "<tr><td> * Name</td><td>: $name</td></tr>";  
echo "<tr><td> * Contact No</td><td>: $contact_no";  

echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
echo "<input type=\"hidden\" name=\"contact_no\" value=\"$contact_no\"></td></tr><tr><td>";

//.............................................................................................

if($blood_group == "Blood Group") echo "<font color=\"red\">";
echo " * Blood Group </td><td>: ";

if($blood_group != "Blood Group") 
{ 
echo "$blood_group"; 
echo "<input type=\"hidden\" name=\"blood_group\" value=\"$blood_group\">"; 
}

if($blood_group == "Blood Group") 
{ 
echo "<select name=\"blood_group\" >
<option>Blood Group</option>
<option>O positive</option>
<option>O negative</option>
<option>A positive</option>
<option>A negative</option>
<option>B positive</option>
<option>B negative</option>
<option>AB positive</option>
<option>AB negative</option>
</select>";
$error =3; 
echo "&nbsp;&nbsp; Select Blood Group";
}
echo "</font></td></tr>";
//..........................................................................................
	
echo "<tr><td> * Gender</td><td>: $gender"; 
echo "<input type=\"hidden\" name=\"gender\" value=\"$gender\"></td></tr>";

//----------------------------------------------------------------------------------
echo "<tr><td>";
$day =0; $month =0; $year = 0;
if($dob_day == "Day")     { $error = 5; $day = 1;} 
if($dob_month == "Month") { $error = 6; $month = 1; }
if($dob_year == "Year")   { $error = 7; $year = 1; } 
if(($error == 5) || ($error == 6) || ($error == 7)) echo "<font color=\"red\">";


echo " * Date of birth </td><td> :"; 
if(($day == 0) && ($month == 0) && ($year == 0)) 
{
echo "$dob_day/$dob_month/$dob_year";
echo "<input type=\"hidden\" name=\"dob_day\" value=\"$dob_day\">";
echo "<input type=\"hidden\" name=\"dob_month\" value=\"$dob_month\">";
echo "<input type=\"hidden\" name=\"dob_year\" value=\"$dob_year\">";
}

$current_year = date('y');
if($dob_year <= 2000)
$age_18 =  ((2000 - $dob_year) + $current_year);
if($dob_year > 2000)
$age_18 =  ( $current_year - ($dob_year - 2000));
if($age_18 < 18) $error = 40;

if($error == 40) echo "<font color = \"red\" >&nbsp;Should be above 18 years &nbsp; </font>";

elseif(($day==1) || ($month==1) || ($year==1) )  // DOB is not entered
{
echo"<select name=\"dob_day\">
<option>Day</option>
<option>01</option><option>02</option><option>03</option><option>04</option><option>05</option>
<option>06</option><option>07</option><option>08</option><option>09</option><option>10</option>
<option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
<option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
<option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
<option>31</option>
</select>

<select name=\"dob_month\">
<option>Month</option>
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

<select name=\"dob_year\">
<option>Year</option>

<option>1950</option><option>1951</option><option>1952</option><option>1953</option><option>1954</option>
<option>1955</option><option>1956</option><option>1957</option><option>1958</option><option>1959</option>
<option>1960</option><option>1961</option><option>1962</option><option>1963</option><option>1964</option>
<option>1965</option><option>1966</option><option>1967</option><option>1968</option><option>1969</option>
<option>1970</option><option>1971</option><option>1972</option><option>1973</option><option>1974</option>
<option>1975</option><option>1976</option><option>1977</option><option>1978</option><option>1979</option>
<option>1980</option><option>1981</option><option>1982</option><option>1983</option><option>1984</option>
<option>1985</option><option>1986</option><option>1987</option><option>1988</option><option>1989</option>
<option>1990</option><option>1991</option><option>1992</option><option>1993</option><option>1994</option>
<option>1995</option><option>1996</option><option>1997</option><option>1998</option><option>1999</option>
<option>2000</option><option>2001</option><option>2002</option><option>2003</option><option>2004</option>
<option>2005</option><option>2006</option><option>2007</option><option>2008</option><option>2009</option>
<option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option>

</select>";

echo "<font color = \"red\" >&nbsp; DOB not entered </font>";
}
echo "</font></td></tr>";
	
//----------------------------------------------------------------------------------------

echo "<tr><td>";
if($last_month_donated == "Not yet donated")
{
echo "<input type=\"hidden\" name=\"last_month_donated\" value=\"$last_month_donated\">";
echo " * Last donated on </td><td> : Not yet donated";
}    
else
{
	$today_month = date('m');
	Switch ($last_month_donated)
	{
	case "January"	: $inp_month = 1;  break;	case "February"  : $inp_month = 2;  break;	
	case "March"  	: $inp_month = 3;  break;	case "April"	 : $inp_month = 4;  break;	
	case "May"    	: $inp_month = 5;  break;	case "June"      : $inp_month = 6;  break;
	case "July"	    : $inp_month = 7;  break;	case "August"    : $inp_month = 8;  break;	
	case "September": $inp_month = 9;  break;   case "October"   : $inp_month = 10; break;	
	case "November"	: $inp_month = 11; break;	case "December"  : $inp_month = 12; break;
	}

	$donation_error = 0;
	if( ($inp_month>$today_month) && ($last_year_donated == "this year") ) $donation_error = 1;
	 
	if($donation_error == 1)//error message
    echo "<font color=\"red\">";
	
	echo "<br> * Last donated on &nbsp;:&nbsp;";
    if($donation_error == 0)
    echo "$last_month_donated";

	echo "<input type=\"hidden\" name=\"last_month_donated\" value=\"$last_month_donated\">";

	
if($donation_error == 1)
{
$error =38; 
echo " Month &nbsp;
<select name=\"last_month_donated\">
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
&nbsp;&nbsp; Year <select name=\"last_donated_year\">
<option>this year</option>
<option>previous year</option>
<option>before 1 year</option>
</select>";	
}


else
	{
	if($last_year_donated == "this year")  $year = "this_year";
	if($last_year_donated == "previous year")  $year = "previous_year";
	echo " of ".$last_year_donated;
	echo "<input type=\"hidden\" name=\"last_year_donated\" value=\"$last_year_donated\">";
	}
}
echo "</font></td></tr>";


//........................................................................................................

echo "<tr><td>";
if($username_already_exist == 1) echo "<font color =\"red\">";
echo " * Username </td><td>: "; 
if($username_already_exist != 1) {echo "$username";  echo"<input type=\"hidden\" name=\"username\" value=\"$username\">"; }
if($username_already_exist == 1) 
{ 
$error =18; 
echo "<input required type=\"text\" name=\"username\"> Already existing username";
}
echo "</font></td></tr>";
//.............................................................................................................

echo "<tr><td>";
if((strlen($password)) < 5) echo "<font color=\"red\">";

echo " * Password </td><td>: ";       
	if((strlen($password)) < 5) 
		{
		$error = 1;     
		echo "<input required type=\"password\" name=\"password\" id=\"password\"></td></tr>"; 
		echo "<tr><td><font color=\"red\">* Re enter password </td><td>: ";       
		echo "<input required  type=\"password\" name=\"password\" id=\"passwordconf\" oninput=\"check(this)\">"; 
		echo "<font color = \"red\" > min 5 characters</font>"; 
		}
	else 
	{
	echo" ************ 
	<input type=\"hidden\" name=\"password\" value=\"$password\">
	<input type=\"hidden\" name=\"re_password\" value=\"$password\">";
	}
echo "</font></td></tr>";

//........................................................................................................
echo "<tr><td>";		
		$state    = strtoupper($state);	
		$district = strtoupper($district);	
		$city     = strtoupper($city);
		
echo " * State </td><td>: $state</td></tr>"; 
echo "<tr><td> * District</td><td>: $district</td></tr>"; 
echo "<tr><td> * City</td><td>: $city</td></tr><tr><td>"; 

echo "
<input type=\"hidden\" name=\"state\" value=\"$state\">
<input type=\"hidden\" name=\"district\" value=\"$district\">
<input type=\"hidden\" name=\"city\" value=\"$city\">";

echo "<br><br></form></td></tr></table>";
		
	
if($error != 0)
echo "<br><input type=\"submit\" value=\"Register\" name=\"individual_submit\" style=\"width:200px; height:27px;\"></form>";	

else
{
	
$slno =0;
$result = mysql_query("SELECT slno FROM $table_individual");
while ($rows = mysql_fetch_array($result))
$slno = $rows['slno'];


$date_and_time_of_register = strftime('%c');
if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}
$ip_address = $ip;

$slno+=1;

$value ="\"" . (++$slno) . "\" ,\"" . $name ."\" , \"" . $contact_no ."\" , \"" . $blood_group ."\" , \"" . 
$gender ."\" , \"" . $dob_day ."\" , \"" . $dob_month ."\" , \"" .$dob_year ."\" , \"" . $last_month_donated ."\" , \"" . 
$last_year_donated ."\" , \"" . $username ."\" , \"" .$password ."\" , \"" . $state ."\" , \"" . $district ."\" , \"" . 
$city ."\" , \"" . $date_and_time_of_register ."\" , \"" . $ip_address ."\" ";

 
$query = "INSERT INTO $table_individual
(slno , name , contact_no , blood_group , gender , dob_day , dob_month , dob_year , last_month_donated , 
last_year_donated ,username , password , state , district , city , date_and_time_of_register , ip_address ) 
VALUES ($value)";

$result = mysql_query($query);
if(!$result) {die(" <br><br> * File writing to database error". mysql_error());}



//-------------------------------------------------------------------------------------

		echo "<font color =\"green\"> Data successfully entered"; 
		echo "<form action=\"donate_blood.html\" method=\"POST\">";
		echo"<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<input type=\"submit\" value=\"Click here to return to home\" style=\"width:200; height:30;\">";
		echo "</form></font>";
}
		
		
echo "</fieldset>";
}
//----------------------------- Individual reg closed----------------------------------------------
		

//-----COLLEGE REGISTRATION---------------------------------------------------------

if($type == "organisation")
{	
echo "<form action=\"donate_blood.php\" method=\"POST\">";
echo "<fieldset><legend>Organisation registration</legend>";

echo "<table>";

echo "<tr><td>Organisation name </td><td> : $organisation_name</td></tr>";

echo "<tr><td>State </td><td> : $state</td></tr>";

echo "<tr><td>District </td><td> : $district</td></tr>";

echo "<tr><td>City </td><td> : $city</td></tr>";

echo "<tr><td>Person in charge </td><td> : $incharge</td></tr>";

echo "<input type=\"hidden\" name=\"organisation_name\" value=\"$organisation_name\">";
echo "<input type=\"hidden\" name=\"state\" value=\"$state\">";
echo "<input type=\"hidden\" name=\"district\" value=\"$district\">";
echo "<input type=\"hidden\" name=\"city\" value=\"$city\">";
echo "<input type=\"hidden\" name=\"incharge\" value=\"$incharge\">";

echo "<tr><td>Contact No. 1 </td><td> : $contact_no_1</td></tr>";
if($contact_no_2 != "")    echo "<tr><td>Contact No. 2 </td><td> : $contact_no_2</td></tr>";
if($contact_no_3 != "")    echo "<tr><td>Contact No. 3 </td><td> : $contact_no_3</td></tr>";

echo "<input type=\"hidden\" name=\"contact_no_1\" value=\"$contact_no_1\">";
echo "<input type=\"hidden\" name=\"contact_no_2\" value=\"$contact_no_2\">";
echo "<input type=\"hidden\" name=\"contact_no_3\" value=\"$contact_no_3\">";

//......................................................................................
$username_already_exist = 0;
$query = "SELECT username FROM $table_organisation ORDER BY slno DESC";   // organisation table
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
{
$username_prev = $rows['username'];
$compare = strcmp($username_prev,$username);
if($compare == 0) { $username_already_exist = 1; break; }
}


$query = "SELECT username FROM $table_individual ORDER BY slno DESC";	   // individual table
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
{
$username_prev = $rows['username'];
$compare = strcmp($username_prev,$username);
if($compare == 0) { $username_already_exist = 1; break; }
}


if($username_already_exist == 1)  
echo "<tr><td><font color=\"red\">Username </td><td> : ";
else
echo "<tr><td>Username </td><td> : ";
if($username_already_exist != 1) 
 {
 echo "$username</td></tr>";
 echo "<input type=\"hidden\" name=\"username\" value=\"$username\"></td></tr>";
 }

 if($username_already_exist == 1) 
{
echo "<input required type=\"text\" name=\"username\">";  
echo "<font color=\"red\">Existing Username</font></td></tr>"; 
$error=1;
}

echo "</font>";
//......................................................................................


if((strlen($password1)) < 5) 
{
$error = 2;
echo "<tr><td><font color=\"red\">Enter password </td><td> : <input required type=\"password\" name=\"password1\" id=\"password1\"></td></tr>";  
echo "<tr><td><font color=\"red\">Re enter </td><td> : 
<input  required type=\"password\" name=\"password2\" id=\"passwordconf\" oninput=\"check2(this)\">";  
echo " <font color=\"red\">Min 5 characters</font></title></td></tr>";
}
else
{
echo "<input type=\"hidden\" name=\"password1\" value=\"$password1\">";
echo "<input type=\"hidden\" name=\"password2\" value=\"$password2\">";
echo "<tr><td> Password </td><td> : ***********</td></tr>";
}
echo "</font>";


$all_round_clock = $_REQUEST['all_round_clock'];
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];
if(($all_round_clock=="no") && ($to==$from))
{
echo "
<tr>
<td><br><b>Is this a 24 hours <br>avaliable organisation?</td> 
<td><br>
<input required type=\"radio\" name=\"all_round_clock\" value=\"no\"><b>No , 
Specify time then<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>
From <select name=\"from\">
<option>00</option><option>01</option><option>02</option><option>03</option>
<option>04</option><option>05</option><option>06</option><option>07</option>
<option>08</option><option>09</option><option>10</option><option>11</option>
<option>12</option><option>13</option><option>14</option><option>15</option>
<option>16</option><option>17</option><option>18</option><option>19</option>
<option>20</option><option>21</option><option>22</option><option>23</option>
</select>
<b>To <select name=\"to\">
<option>00</option><option>01</option><option>02</option><option>03</option>
<option>04</option><option>05</option><option>06</option><option>07</option>
<option>08</option><option>09</option><option>10</option><option>11</option>
<option>12</option><option>13</option><option>14</option><option>15</option>
<option>16</option><option>17</option><option>18</option><option>19</option>
<option>20</option><option>21</option><option>22</option><option>23</option>
</select>Hours
</td></tr>

<tr><td></td>
<td><input required type=\"radio\" name=\"all_round_clock\" value=\"yes\"> 
<b> Yes, this is a 24 hours <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;available organisation ";

echo "<br><br><font color=\"red\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Check working time</td></tr></font>";
$error= 44;
}
elseif($all_round_clock=="no")
echo "<tr><td>Working time </td><td>: From $from to $to hours";
else
echo "<tr><td>Working time </td><td>: All round clock";
echo "</td></tr><tr><td> Organisation type </td><td> : ".$_REQUEST['organisation_type'];

$organisation_type = $_REQUEST['organisation_type'];
$branch_1 = $_REQUEST['branch_1'];
$branch_2 = $_REQUEST['branch_2'];
$branch_3 = $_REQUEST['branch_3'];
$branch_4 = $_REQUEST['branch_4'];
$branch_5 = $_REQUEST['branch_5'];
$branch_6 = $_REQUEST['branch_6'];
$branch_7 = $_REQUEST['branch_7'];
$branch_8 = $_REQUEST['branch_8'];
$branch_9 = $_REQUEST['branch_9'];
$branch_10 = $_REQUEST['branch_10'];
$branch_11 = $_REQUEST['branch_11'];
$branch_12 = $_REQUEST['branch_12'];
$branch_13 = $_REQUEST['branch_13'];
$no_of_semesters = $_REQUEST['no_of_semesters'];

echo "</td><tr>";

if($error !=0 )
{
echo "<tr><td></td><td><br> <input type =\"submit\" value=\"Submit\" name=\"organisation_register_error\" style=\"width:200; height:30;\"></td></tr> ";
	
}

echo "</form></table>";
//-------------------

if($error == 0)
{
		

$slno =0;
$result = mysql_query("SELECT slno FROM $table_organisation");
while ($rows = mysql_fetch_array($result))
$slno = $rows['slno'];


$date_and_time_of_register = strftime('%c');
if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}
$ip_address = $ip;

$slno += 1;

$value ="\"" . (++$slno) . "\" ,\"" . $organisation_name ."\" , \"" . $state ."\" , \"" . $district ."\" , \"" . 
$city ."\" , \"" . $incharge ."\" , \"" . $contact_no_1 ."\" , \"" .$contact_no_2 ."\" , \"" . $contact_no_3 ."\" , \"" . 
$username ."\" , \"" . $password1 ."\" , \"" . $all_round_clock ."\" , \"" . $from ."\" , \"" . $to ."\" , \"" . 
$organisation_type ."\" , \"" . $branch_1 ."\" , \"" . $branch_2 ."\" , \"" . $branch_3 ."\" , \"" . $branch_4 ."\" , \"" . 
$branch_5 ."\" , \"" . $branch_6 ."\" , \"" . $branch_7 ."\" , \"" . $branch_8 ."\" , \"" . $branch_9 ."\" , \"" . 
$branch_10 ."\" , \"" . $branch_11 ."\" , \"" . $branch_12 ."\" , \"" . $branch_13 ."\" , \"" . 
$no_of_semesters ."\" , \"" . $date_and_time_of_register ."\" , \"" . $ip_address ."\" ";

 
$query = "INSERT INTO $table_organisation
(slno , organisation_name , state , district , city , incharge , contact_no_1 , contact_no_2 , contact_no_3 , 
username , password , all_round_clock , from_time , to_time , organisation_type , branch_1 , branch_2 , branch_3 , 
branch_4 , branch_5 , branch_6 , branch_7 , branch_8 , branch_9 , branch_10 , branch_11 , branch_12 , branch_13 , 
no_of_semesters , date_and_time_of_register , ip_address ) 
VALUES ($value)";

$result = mysql_query($query);
if(!$result) {die(" <br><br> * File writing to Organiation DB error". mysql_error());}



//-------------------------------------------------------------------------------------

		echo "<br><br><font color =\"green\" size=\"3\"> Data successfully entered"; 
		echo "<form action=\"donate_blood.html\">";
		echo "<br><input type=\"submit\" value=\"Click here to return to home\" style=\"width:200; height:30px; margin-right: 140px; float:right;\">";
		echo "</form></font>";
		}
	

	
}//  --> closed college reg section.
		

		
		
?>
		
		 
		</div> <!-- /content -->

		
		
		<!-- Side Pic -->
        <div id="about-me">
        <p>&nbsp;&nbsp;&nbsp;<img src="design/donate_blood.jpg" height="142" width="192" />
        </div> 
	    <!-- /Side Pic -->

        
    </div> <!-- /page-in -->
    </div> <!-- /page -->

	
	
	
	<!------------------------------------------------------------------------------------------------------------------------>
	
    <!-- Footer -->
    <div id="footer">
    <p id="createdby"><font size="1">Product of <a href="http://www.newdimensions.in">New Dimensions</a> </p>
    <p id="copyright">&copy; 2013 Developed by Aravind R Pillai ,Asif Jaleel (For best result use Google Chrome)</p>
    </div> 
	<!-- /footer -->

	
	
</div> <!-- /main -->

</body>
</html>
