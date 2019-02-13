

<head>
<link rel="shortcut icon" href="design/title_img.gif"> 
    <title>Donate An Organ</title>
    
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
     <h1 id="logo">Organ Donation<span></span></a></h1>
       

        <!-- Search -->
        <div id="search" class="noprint">
        <form action="search.php" method="POST">
        <span id="search-input-out">
		<input type="text" name="search_keyword" id="search-input" size="30" /></span></label>
        <input type="image" src="design/search_submit.gif" id="search-submit" name = \"submit\" value="OK" />
        </form>
        </div> 
		<!-- /search -->

      </div> <!-- /header -->


<!----------------------------------------------------------------------------------------------------------------------------->

 

		<!-- Main menu (tabs) -->
               <div id="tabs" class="noprint">
               <h3 class="noscreen">Navigation</h3>
               <ul class="box">
                    <li><a href="index.html">Home<span class="tab-l"></span><span class="tab-r"></span></a></li>
                    <li id="active"><a href="donate_organ.html">Donate Organs<span class="tab-l"></span><span class="tab-r"></span></a></li> 
                    <li><a href="hospital_registration.html">Hospitals<span class="tab-l"></span><span class="tab-r"></span></a></li>
					<li><a href="donate_blood.html">Donate Blood<span class="tab-l"></span><span class="tab-r"></span></a></li>
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
		
        <form name="organ_donation" action="donate_organ_save.php" method="POST">
        <fieldset>
		<legend>Registration form for Organ Donation</legend>
        
		<?php

		
$error = 0;
error_reporting(0);
require_once("data_base.php");
$table = "organ_donation";

		$name 			= $_REQUEST['name'];
		$dob_day 		= $_REQUEST['day'];
		$dob_month 		= $_REQUEST['month'];
		$dob_year 		= $_REQUEST['year'];
		$organ 		    = $_REQUEST['organ'];
		
		$house_name 	= $_REQUEST['house_name'];
		$street 		= $_REQUEST['street'];
		$city 		    = $_REQUEST['city'];
		$district 		= $_REQUEST['district'];
		$state          = $_REQUEST['state'];
		$pincode 		= $_REQUEST['pincode'];
		
		$contact_no 	= $_REQUEST['contact_no'];
		$email 			= $_REQUEST['email'];
		
		
		echo "<br><b> * Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $name ";        
									if($name == "")            {$error = 1; echo "<font color = \"red\" >Field Unfilled  </font>"; }
		echo "<br> * Organ to donate  &nbsp;&nbsp;&nbsp;&nbsp;: ";	 
									if($organ == "Organ")           {$error = 2; echo "<font color = \"red\" >Field Unfilled  </font>"; }
									else echo "$organ";

									
//-------------------------------------------------------------------------------------------


		echo "<br> * Date Of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>$dob_day - $dob_month - $dob_year &nbsp;&nbsp;&nbsp;&nbsp;"; 
			if($dob_day == "Day")      {$error = 7;  $dob_d = 1;}
			if($dob_month == "Month")  {$error = 8;  $dob_m = 1;}
			if($dob_year == "Year")    {$error = 9;  $dob_y = 1;}

			if(($dob_d == 1)&&($dob_m == 1)&&($dob_y == 1))
			echo "<font color = \"red\" >Select Day-Month-Year &nbsp; </font>";
			else 
			{
			echo "<font color = \"red\" >";
			if($dob_d == 1) echo "Select Day";
			if($dob_m == 1) echo " Select Month";
			if($dob_y == 1) echo " Select Year";
			echo "</font>";
			}
		
$current_year = date('y');		
if($dob_year <2000)		
$age = ((2000 - $dob_year) + $current_year);
else
$age = ($current_year - ($dob_year - 2000));
		
if($age<17) {$error = 23; echo "<font color = \"red\"> Age should be above 18 years </font> "; }
			
			
//----------------------------------------------------------------------------------------------


		echo "<br><b> * house name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $house_name";			 
									if($house_name == "")      {$error = 3;   echo "<font color = \"red\" >Field Unfilled  </font>"; }
		echo "<br> * Street &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $street ";	 
									if($street == "")          {$error = 4;   echo "<font color = \"red\" >Field Unfilled  </font>"; }
		echo "<br> * City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $city ";	 
									if($city == "")            {$error = 5;   echo "<font color = \"red\" >Field Unfilled </font>";  }
		echo "<br> * District &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $district";  
									if($district == "")        {$error = 6;   echo "<font color = \"red\" >Field Unfilled  </font>";  }
		echo "<br> * State &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $state"; 
		    						if($state == "")           { $error = 10; echo "<font color = \"red\" >Field Unfilled  </font>"; }
		echo "<br> * Pincode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $pincode ";
									if($pincode == "")         { $error = 13; echo "<font color = \"red\" >Field Unfilled  </font>"; }
		echo "<br> * Contact no &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $contact_no"; 	
									if($contact_no == "")      { $error = 14; echo "<font color = \"red\" >Field Unfilled  </font>"; }
		echo "<br> * Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $email";
									if($email == "")           { $error = 20; echo "<font color = \"red\" >Field Unfilled  </font>"; }

									
//----- Checking for previously exixting users----------------------------------------------------

$query = "SELECT email, contact_no FROM $table ORDER BY slno DESC";
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
{
$email_prev = $rows['email'];
$contact_no_prev = $rows['contact_no'];
$compare_email = strcmp($email_prev,$email);
$compare_contact_no = strcmp($contact_no_prev,$contact_no);

if($compare_email == 0)
 {$error = 26; echo "<br><br><font color=\"red\">&nbsp;&nbsp; Already existing email ID </font>"; break; }
if($compare_contact_no == 0)
 {$error = 26; echo "<br><br><font color=\"red\">&nbsp;&nbsp; Already existing contact no </font>"; break; }
 
}


//-------------------------------------------------------------------------------------------------
		
echo"</form>";


		
if($error == 0)
{
echo "<form action = \"index.php\" method =\"POST\">
<font color = \"green\"> <br><br><br><b>Successfully entered all data to database<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"submit\" name=\"save_db\" value=\"Click here return to home \"></form><br><br><br>";

//  ------------------- save to database  ---------------------------------

$result = mysql_query("CREATE TABLE IF NOT EXISTS $table 
(slno integer , name varchar(25) , organ varchar(30) , dob_day varchar(3) , dob_month varchar(13) , dob_year integer , 
 house_name varchar(30) , street varchar(25), city varchar(25), district varchar(25), state varchar(25), pincode varchar(8), 
 contact_no varchar(14), email varchar(30) , date_and_time_of_register varchar(30) , ip_address varchar(16) ) ");
if(!$result) {die("<br><br><br><br> * Donate Organ database creation error");}

$slno =0;
$result = mysql_query("SELECT slno FROM $table");
while ($rows = mysql_fetch_array($result))
$slno = $rows['slno'];

$date_and_time_of_register = strftime('%c');
if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}
$ip_address = $ip;



$query = "INSERT INTO $table 
(slno , name , organ , dob_day , dob_month , dob_year , house_name , street , city , 
 district , state , pincode , contact_no , email , date_and_time_of_register , ip_address) 
 VALUES (\"" . (++$slno) . "\" ,\"" . $name ."\" , \"" . $organ ."\" , \"" . $dob_day ."\" , \"" . $dob_month ."\" , \"" . 
 $dob_year ."\" , \"" . $house_name ."\" , \"" . $street ."\" , \"" . $city ."\" , \"" . $district ."\" , \"" . $state ."\" , \"" . 
 $pincode ."\" , \"" . $contact_no ."\" , \"" . $email ."\" , \"" . $date_and_time_of_register ."\" , \"" . $ip_address ."\")";

$result = mysql_query($query);
if(!$result) {die("File writing to Temporary database error");}


//-------------------------------------------------------------------------------------

}
else
echo "<form action = \"donate_organ.html\" method =\"POST\"><font color = \"red\"> <br><br><br><b>Errors are found and are mentioned above, 
so you need to try again. Click on this button to return to the previous registraton page<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"submit\" name=\"buttton\" value=\"Back to registration page\"><br><br>";

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
    <p id="createdby">Product of <a href="http://www.newdimensions.in">New Dimensions</a> </p>
    <p id="copyright">&copy; 2013 Developed by Aravind R Pillai ,Asif Jaleel (For best result use Google Chrome)</p>
    </div> 
	<!-- /footer -->

	
</div> <!-- /main -->

</body>
</html>
