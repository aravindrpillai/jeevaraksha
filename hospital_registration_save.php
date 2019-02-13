<head>
<link rel="shortcut icon" href="design/title_img.gif"> 
    <title>Hospital Registration</title>
    
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
     <h1 id="logo">Hospital Registration <span></span></a></h1>
       

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
                    <li id="active"><a href="hospital_registration.html">Hospitals<span class="tab-l"></span><span class="tab-r"></span></a></li>
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
		
        <fieldset>
		<legend>Registration for a new hospital</legend>


<?php

$error = 0;
error_reporting(0);
require_once("data_base.php");

		$hospital_name = $_REQUEST['hospital_name'];
		
		$hospital_username = $_REQUEST['hospital_username'];
		$hospital_password = $_REQUEST['hospital_password'];
		$hospital_re_password = $_REQUEST['hospital_re_password'];
		
		$place = $_REQUEST['place'];
		$district = $_REQUEST['district'];
		$liscence_no = $_REQUEST['liscence_no'];
		$sector = $_REQUEST['sector'];
		$pincode = $_REQUEST['pincode'];
		
		$contact_no1 = $_REQUEST['contact_no1'];
		$contact_no2 = $_REQUEST['contact_no2'];
		$email = $_REQUEST['email'];
		$website = $_REQUEST['website'];
				
		$tac = $_REQUEST['tac'];
		
		
		
		if($tac != "yes")
		{
		echo "<font color = \"red\" >  You have'nt accepted the <a href=\"tac.html\" target=\"_blank\">Terms and Conditions</a> </font>";
		echo "<form action=\"hospital_registration.html\" method=\"POST\">";
		echo "<br>&nbsp;&nbsp;&nbsp;<input type =\"submit\" value =\"Return back to registration page\" >";
		echo "</form>";
		exit;
		}
		
		echo "<br> <b>* Hospital Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $hospital_name ";       
		if($hospital_name == "")                  {$error = 1;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Hospital Username &nbsp;&nbsp; $hospital_username ";       
		if($hospital_username == "")     {$error = 2;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Hospital Password  &nbsp; ";       
					$compare_password = strcmp($hospital_password , $hospital_re_password);
					$length = strlen($hospital_password);
					if($compare_password != 0)      {$error = 3;     echo "<font color = \"red\" >Mismatching Password</font>"; }
				    if($length < 5) 				{$error = 4;     echo "<font color = \"red\" >Password length should be greater than 5 characters</font>"; }
					if(($compare_password == 0) && ($length > 4) )   echo" &nbsp; ************ ";
		
		echo "<br> * Place &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  $place";	
		if($place == "")         {$error = 5;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * District &nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $district";
		if($district == "")      {$error = 6;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Sector &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	 
											if($sector == "Sector") {$error = 7;     echo "<font color = \"red\" >Specify sector  </font>"; }
											else echo " $sector ";
		
		echo "<br> * Liscence No 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $liscence_no ";	 
											if($liscence_no == "")    {$error = 8;    echo "<font color = \"red\" >Field Unfilled </font>"; }
		
		echo "<br> * Contact no 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $contact_no1";  
											if($contact_no1 == "")  
																  {$error = 9;    echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
			
		
		echo "<br> * Contact_no2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 "; 
		if($contact_no2 != "optional")  echo "$contact_no2";
		
		
		echo "<br> * Pincode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  $pincode"; 
								if($pincode == "")             { $error = 10;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  $email"; 
								if($email == "")              { $error = 11;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		
		echo "<br> * Website &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  $website"; 
								if($website == "")  { $error = 12;     echo "<font color = \"red\" >Field Unfilled  </font>"; }
		

		
		
		
if($error == 0)
{

//-----------------------------------------------------------------------------------------------------

$table = "hospital_registration";
$result = mysql_query("CREATE TABLE IF NOT EXISTS $table 
 (slno integer , hospital_name varchar(35) , hospital_username varchar(35) , hospital_password varchar(16) , 
 place varchar(25) , district varchar(20) ,  sector varchar(15) , liscence_no varchar(25), contact_no1 varchar(15), 
 contact_no2 varchar(15), pincode varchar(13), email varchar(18), website varchar(20), 
 date_and_time_of_register varchar(30) , ip_address varchar(16) ) ");
if(!$result) {die("<br><br> * Hospital database creation error");}

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
(slno , hospital_name , hospital_username , hospital_password , place , district , sector , liscence_no , contact_no1 , 
 contact_no2 , pincode , email , website , date_and_time_of_register , ip_address) 
 VALUES (\"" . (++$slno) . "\" ,\"" . $hospital_name ."\" , \"" . $hospital_username ."\" , \"" . $hospital_password ."\" , \"" . 
 $place ."\" , \"" . $district ."\" , \"" . $sector ."\" , \"" . $liscence_no ."\" , \"" . $contact_no1 ."\" , \"" . 
 $contact_no2 ."\" , \"" . $pincode ."\" , \"" . $email ."\" , \"" . $website ."\" , \"" . 
 $date_and_time_of_register ."\" , \"" . $ip_address ."\")";

$result = mysql_query($query);
if(!$result) {die("<br><br> * File writing to Hospital database error");}


//-------------------------------------------------------------------------------------
echo "<font color = \"green\"> <br><br><br><b>Successfully entered all details. Data saved to database<form action=\"index.html\"><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"submit\" name=\"buttton\" value=\"Return to home\"></form><br><br>";
}


else
echo "<font color = \"red\"> <br><br><br><b>Errors are found and are mentioned above, 
so you need to try again. Click on this button to return to the previous registraton page
<form action=\"hospital_registration.html\"><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=\"submit\" name=\"buttton\" value=\"Return back to registration page\"></form><br><br>";



?>

	
		</fieldset>
        </form>
        
		</div> 
		<!-- /content -->

		<!-- Side Pic -->
        <div id="about-me">
        <p>&nbsp;&nbsp;&nbsp;<img src="design/hospital.jpg" height="142" width="192" />
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
