<head>
<link rel="shortcut icon" href="design/title_img.gif"> 
    <title>Patient Registration</title>
    
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
     <h1 id="logo">Patient Registration<span></span></a></h1>
       

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
					<li id="active"><a href="need_help.html">Register a patient<span class="tab-l"></span><span class="tab-r"></span></a></li>
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
		
        <fieldset>
		<legend>Registration form for patient registration</legend>
        
		<?php
		
$error = 0;
require_once("data_base.php");
error_reporting(0);
$table = "need_help";
$table_secondary = "need_help_secondary"; 

		$name = $_REQUEST['name'];
		$doctor = $_REQUEST['doctor'];
		$hospital = $_REQUEST['hospital'];
		$hospital_district = $_REQUEST['hospital_district'];
				
		$age = $_REQUEST['age'];
		$gender = $_REQUEST['gender'];
		$disease = $_REQUEST['disease'];
		$treatment_cost = $_REQUEST['treatment_cost'];
		$treatment_last_day = $_REQUEST['treatment_last_day'];
		$treatment_last_month = $_REQUEST['treatment_last_month'];
		$treatment_last_year = $_REQUEST['treatment_last_year'];
		$account_holder = $_REQUEST['account_holder'];
		$account_no = $_REQUEST['account_no'];
		$bank_name = $_REQUEST['bank_name'];
		$bank_place = $_REQUEST['bank_place'];
		$contact_no = $_REQUEST['contact_no'];
		$house_name = $_REQUEST['house_name'];
		$street = $_REQUEST['street'];
		$city = $_REQUEST['city'];
		$district = $_REQUEST['district'];
		$state = $_REQUEST['state'];
		$pincode = $_REQUEST['pincode'];
		$email = $_REQUEST['email'];
		
		
		echo "<br><b> * Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $name ";        if($name == "")     {$error = 1;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		
		
		echo "<br> * Doctor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : $doctor";	 if($doctor == "")   {$error = 2;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Hospital &nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : $hospital";	 if($hospital == "")   {$error = 2;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Hospital at &nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : $hospital_district";	 if($hospital_district == "")   {$error = 2;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $age";			 if($age == "")      {$error = 3;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:";	 
											if($gender == "Select") {$error = 4;     echo "<font color = \"red\" >Specify gender  </font>"; }
											else echo " $gender ";
		
		echo "<br> * Disease &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $disease ";	 
											if($disease == "")    {$error = 5;    echo "<font color = \"red\" >Mention disease </font>"; }
		
		echo "<br> * Treatment Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $treatment_cost";  
											if($treatment_cost == "")  
																  {$error = 6;    echo "<font color = \"red\" >Field Unfilled  </font>"; }
		

//------------------------------------------------------------------------------------------------------------------
		echo "<br> * Treatment best before &nbsp;&nbsp;:"; 
								 $day =0; $month =0;;
								 if($treatment_last_day == "Day")     { $error = 7; $day = 1;} 
								 if($treatment_last_month == "Month") { $error = 8; $month = 1; }
								 if($treatment_last_year == "this year") $treatment_last_year = "this_year";
								 if($treatment_last_year == "next year") $treatment_last_year = "next_year";
								 
		if(($day==1) &&($month==1)) echo "<font color = \"red\" >&nbsp;Select Day\month &nbsp; </font>";
		else 
		{ 
		echo "<font color = \"red\" >";
		if($day == 1) echo "Select day"; if($month == 1) echo "Select month";
		echo "  </font>";
		}
		
	switch($treatment_last_month)
	{
	case "January" :   $m = 1; break;   case "February" :  $m = 2; break;
	case "March" : 	   $m = 3; break;   case "April" :     $m = 4; break;
	case "May" :       $m = 5; break;   case "June" :      $m = 6; break;
	case "July" : 	   $m = 7; break;   case "August" :    $m = 8; break;
	case "September" : $m = 9; break;   case "October" :   $m = 10; break;
	case "November" :  $m = 11; break;  case "December" :  $m = 12; break;
	}
	
	$current_year = date('y');
	$current_month = date('m');
	$current_day = date('d');
	
	if($treatment_last_year == "this_year") 
	{
	$y = (2000 + $current_year);
	$diff_month = $m - $current_month;
	$diff_day = $treatment_last_day - $current_day;	
	
	if (($diff_month < 0) || (($diff_month == 0) && ($diff_day < 0)) ) 
							{echo "<font color=\"red\"> Cannot enter previous dates</font>";  $error = 25;}
							// if this value becomes -ve , means that the date entered is past
	}
	
	if($treatment_last_year == "next_year")   $y = (2001 + $current_year);
	
	
	
	
	if( ($error!=7) && ($error!=8) && ($error!=25))
	 echo " $treatment_last_day, $treatment_last_month of $treatment_last_year";
	
	/*
	echo "<br> day : $treatment_last_day";
	echo "<br> month : $m";
	echo "<br> year	 : $y";
	*/
//------------------------------------------------------------------------------------------------------------------
	
		echo "<br> * Account holder &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;: $account_holder"; 
								if($account_holder == "")         { $error = 10;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
//---------------------------------------------------------------------------------------------------------------------

$query = "SELECT account_no FROM $table ORDER BY slno DESC";
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
{
$account_no_db = $rows['account_no'];
if($account_no_db == $account_no) {$error = 36; break; }
}	
		echo "<br> * Account no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : "; 
								if($account_no == "") { $error = 11;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
								if($error == 36) echo "<font color = \"red\" >Already existing account</font>";
								else echo "$account_no";
//-------------------------------------------------------------------------------------------------------------------------

		
		echo "<br> * Bank name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $bank_name "; 
								if($bank_name == "")              { $error = 12;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Bank place &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $bank_place ";
								if($bank_place == "")             { $error = 13;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Contact no &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $contact_no"; 	
								if($contact_no == "")             { $error = 14;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * House name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $house_name"; 
								if($house_name == "")             { $error = 15;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Street &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $street"; 
								if($street == "")                 { $error = 16;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $city"; 
								if($city == "")           	      { $error = 17;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * District &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $state"; 
								if($district == "")          		  { $error = 18;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * State &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $state"; 
								if($state == "")          		  { $error = 18;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Pincode &nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $pincode"; 
								if($pincode == "")                { $error = 19;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Email &nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $email";
								if($email == "")             	  { $error = 20;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		
		
		$width  = 150;
		$height = 130;
	
	    echo"<br><br> <b> * Patient Image <b><br>";
		if($_FILES['patient_pic']['name'] != "")
{
	$server_file_name = $_FILES['patient_pic']['tmp_name'];

	switch($_FILES['patient_pic']['type'])
	{
	case "image/png"  :
	case "image/PNG"  : $ext= "png" ; break;
	case "image/gif"  : 
	case "image/GIF"  : $ext= "gif" ; break;
	case "image/jpeg" : 
	case "image/JPEG" : $ext= "jpg" ; break;
	case "image/bmp"  : 
	case "image/BMP"  : $ext= "bmp" ; break;
	default : 
	echo "<br><br> * <font color =\"red\"> * Not an image file *  </font>";
	$error = 26;
	}

	$img_name = "pat" . time(). $account_no . "." .$ext;
	$location = "images/".$img_name; 
	$err_mov = move_uploaded_file($server_file_name , $location);
	if($err_mov != 1)  
	{ echo " <font color = \"red\" >Error in Upload"; $error = 55; } 
	echo "<img border=\"2\" src=\"$location\" width=\"$width\" height=\"$height\" />";
}	

else
{
$error = 21;
echo "<font color = \"red\" >&nbsp&nbsp&nbsp Patient's image is mandatory  </font>";
}

echo"<br><br> <b> * Doctor's Script <b><br>";

$img_1 = 0;
$img_2 = 0;
$img_3 = 0;	

if($_FILES['doc_script_1']['name'] != "")
{
	$img_1 = 1;
	$server_file_name = $_FILES['doc_script_1']['tmp_name'];

	switch($_FILES['doc_script_1']['type'])
	{
	case "image/png"  :
	case "image/PNG"  : $ext1= "png" ; break;
	case "image/gif"  : 
	case "image/GIF"  : $ext1= "gif" ; break;
	case "image/jpeg" : 
	case "image/JPEG" : $ext1= "jpg" ; break;
	case "image/bmp"  : 
	case "image/BMP"  : $ext1= "bmp" ; break;
	default : echo " * <font color =\"red\">  Not an image file *  </font>"; $error = 26;
	}
	
	$img_name1 = "ds1" . time(). $account_no. "." .$ext1;
	$location = "images/".$img_name1; 
	$err_mov = move_uploaded_file($server_file_name , $location);
	if($err_mov != 1)  
	{ echo " <font color = \"red\" >Error in Upload"; $error = 55; }
	echo " &nbsp;&nbsp;<img border=\"2\" src=\"$location\" width=\"$width\" height=\"$height\" />";
}	


if($_FILES['doc_script_2']['name'] != "")
{
	$img_2 = 1;
	$server_file_name = $_FILES['doc_script_2']['tmp_name'];

	switch($_FILES['doc_script_2']['type'])
	{
	case "image/png"  :
	case "image/PNG"  : $ext2= "png" ; break;
	case "image/gif"  : 
	case "image/GIF"  : $ext2= "gif" ; break;
	case "image/jpeg" : 
	case "image/JPEG" : $ext2= "jpg" ; break;
	case "image/bmp"  : 
	case "image/BMP"  : $ext2= "bmp" ; break;
	default : 
	echo " * <font color =\"red\">  Not an image file *  </font>";
	$error = 26;
	}
	
	$img_name2 = "ds2" . time(). $account_no. "." .$ext2;
	$location = "images/".$img_name2; 
	$err_mov = move_uploaded_file($server_file_name , $location);
	if($err_mov != 1)  
	{ echo " <font color = \"red\" >Error in Upload"; $error = 55; }
	echo " &nbsp;&nbsp;<img border=\"2\" src=\"$location\" width=\"$width\" height=\"$height\" />";
}	



if($_FILES['doc_script_3']['name'] != "")
{
	
	$img_3 = 1;
	$server_file_name = $_FILES['doc_script_3']['tmp_name'];

	switch($_FILES['doc_script_3']['type'])
	{
	case "image/png"  :
	case "image/PNG"  : $ext3= "png" ; break;
	case "image/gif"  : 
	case "image/GIF"  : $ext3= "gif" ; break;
	case "image/jpeg" : 
	case "image/JPEG" : $ext3= "jpg" ; break;
	case "image/bmp"  : 
	case "image/BMP"  : $ext3= "bmp" ; break;
	default : 
	echo " * <font color =\"red\">  Not an image file *  </font>";
	$error = 26;
	}
	
	$img_name3 = "ds3" . time(). $account_no. "." .$ext3;
	$location = "images/".$img_name3; 
	$err_mov = move_uploaded_file($server_file_name , $location);
	if($err_mov != 1)  
	{ echo " <font color = \"red\" >Error in Upload"; $error = 55; }
	echo "&nbsp;&nbsp;<img border=\"2\" src=\"$location\" width=\"$width\" height=\"$height\" />";
}	

if(($img_1 == 0) && ($img_2 == 0) && ($img_3 == 0))
{
$error = 22;
echo "<font color = \"red\" >&nbsp;&nbsp;&nbsp;Atleast one Doctor script should be uploaded  </font>";
}


if($error == 0)
{

//  ------------------- save to database  ---------------------------------

$query = "CREATE TABLE IF NOT EXISTS $table 
(slno integer , name varchar(25) , doctor varchar(30) , hospital varchar(40) , hospital_district varchar(20),
 age integer , gender varchar(7) , disease varchar(20) , treatment_cost integer , treatment_last_day integer, 
 treatment_last_month integer, treatment_last_year integer, account_holder varchar(30), account_no varchar(15), bank_name varchar(30), bank_place varchar(30) ,  contact_no varchar(13) , 
 house_name varchar(20), street varchar(20), city varchar(20) , district varchar(20), state varchar(18), pincode varchar(8), email varchar(30), 
 patient_image varchar(60) , doctor_script1 varchar(60), doctor_script2 varchar(60), doctor_script3 varchar(60),
 date_and_time_of_register varchar(30) , ip_address varchar(15) ) ";

$result = mysql_query($query);
if(!$result) {die("<br><br><br><br> * Table creation error ". mysql_error() );}


//----------------Secondary----------------------------------------------------------

$query = "CREATE TABLE IF NOT EXISTS $table_secondary 
(slno integer , name varchar(25) , doctor varchar(30) , hospital varchar(40) , hospital_district varchar(20),
 age integer , gender varchar(7) , disease varchar(20) , treatment_cost integer , treatment_last_day integer, 
 treatment_last_month integer, treatment_last_year integer, account_holder varchar(30), account_no varchar(15), 
 bank_name varchar(30), bank_place varchar(30) ,  contact_no varchar(13) , house_name varchar(20), street varchar(20), 
 city varchar(20) , district varchar(20), state varchar(18), pincode varchar(8), email varchar(30),
 date_and_time_of_register varchar(30) , ip_address varchar(15) ) ";
 
$result = mysql_query($query);
if(!$result) {die("<br><br><br><br> * Secondry Table creation error ". mysql_error() );}

//----------------Primary Db--------------------------------------------------------------------

$slno =0;
$result = mysql_query("SELECT slno FROM $table");
while ($rows = mysql_fetch_array($result))
$slno = $rows['slno'];


$date_and_time_of_register = strftime('%c');
if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}
$ip_address = $ip;

$value ="\"" . (++$slno) . "\" ,\"" . $name ."\" , \"" . $doctor ."\" , \"" . $hospital ."\" , \"" . $hospital_district ."\" , \"" . $age ."\" , \"" . $gender ."\" , \"" . 
$disease ."\" , \"" . $treatment_cost ."\" , \"" . $treatment_last_day ."\" , \"" . $m ."\" , \"" . $y ."\" , \"" . 
$account_holder ."\" , \"" . $account_no ."\" , \"" . $bank_name ."\" , \"" . $bank_place ."\" , \"" . $contact_no ."\" , \"" . 
$house_name ."\" , \"" . $street ."\" , \"" . $city ."\" , \"" . $district ."\" , \"" . $state ."\" , \"" . $pincode ."\" , \"" . 
$email ."\" , \"" . $img_name ."\" , \"" . $img_name1 ."\" , \"" . $img_name2 ."\" , \"" . $img_name3 ."\" , \"" . 
$date_and_time_of_register ."\" , \"" . $ip_address ."\" ";
 
$query = "INSERT INTO $table 
(slno , name , doctor , hospital , hospital_district , age , gender , disease , treatment_cost , treatment_last_day , treatment_last_month , 
treatment_last_year , account_holder , account_no , bank_name , bank_place , contact_no , house_name , 
street , city , district , state , pincode , email , patient_image , doctor_script1 , doctor_script2 , doctor_script3 ,
date_and_time_of_register , ip_address) VALUES ($value)";

$result = mysql_query($query);
if(!$result) {die(" <br><br> * File writing to database error". mysql_error());}

//------------SECODARY DB---------------------------------------------------------------------------------


$slno_sec =0;
$result = mysql_query("SELECT slno FROM $table_secondary");
while ($rows = mysql_fetch_array($result))
$slno_sec = $rows['slno'];


$value ="\"" . (++$slno) . "\" ,\"" . $name ."\" , \"" . $doctor ."\" , \"" . $hospital ."\" , \"" . $hospital_district ."\" , \"" . $age ."\" , \"" . $gender ."\" , \"" . 
$disease ."\" , \"" . $treatment_cost ."\" , \"" . $treatment_last_day ."\" , \"" . $m ."\" , \"" . $y ."\" , \"" . 
$account_holder ."\" , \"" . $account_no ."\" , \"" . $bank_name ."\" , \"" . $bank_place ."\" , \"" . $contact_no ."\" , \"" . 
$house_name ."\" , \"" . $street ."\" , \"" . $city ."\" , \"" . $district ."\" , \"" . $state ."\" , \"" . $pincode ."\" , \"" . 
$email ."\" , \"" .$date_and_time_of_register ."\" , \"" . $ip_address ."\" ";
 
$query = "INSERT INTO $table_secondary 
(slno , name , doctor , hospital , hospital_district , age , gender , disease , treatment_cost , treatment_last_day , treatment_last_month , 
treatment_last_year , account_holder , account_no , bank_name , bank_place , contact_no , house_name , 
street , city , district , state , pincode , email , date_and_time_of_register , ip_address) VALUES ($value)";

$result = mysql_query($query);
if(!$result) {die(" <br><br> * File writing to secondary database error". mysql_error());}


//-------------------------------------------------------------------------------------



echo "<font color = \"green\"> <br><br><br><b>Successfully entered all details<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<form action = \"index.php\" method =\"GET\">
<input type=\"submit\" value=\"Click here to return to home\"><br><br></form>";
}



else
echo "<form action = \"need_help.html\" method =\"POST	\">
<font color = \"red\"> <br><br><br><b>Errors are found and are mentioned above, 
so you need to try again. Click on this button to return to the previous registraton page<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"submit\" value=\"Click here to return to home\"><br><br></form>";

?>
		
		
		
		
		</fieldset>
        
		</div> 
		<!-- /content -->

        <!-- Side Pic -->
        <div id="about-me">
        <p>&nbsp;&nbsp;<img src="design/verification.gif" height="142" width="192" />
        </div> 
	    <!-- /Side Pic -->

		
		
    </div> <!-- /page-in -->
    </div> <!-- /page -->

	
	
	
	<!------------------------------------------------------------------------------------------------------------------------>
	
	
    <!-- Footer -->
    <div id="footer">
    <p id="createdby"><font size="1">Product of <a href="http://www.newdimensions.in">New Dimensions</a> </p>
    <p id="copyright">&copy; 2013 Developed by Aravind R Pillai ,Asif Jaleel (For best result use Google Chrome)</font></p>
    </div> 
	<!-- /footer -->

</div> <!-- /main -->

</body>
</html>
