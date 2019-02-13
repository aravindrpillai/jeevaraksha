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
     <h1 id="logo">Blood Bank <span></span></a></h1>
       

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
		
		
<!---------------- P H P ----------------------------------------------------------------------->
		
		
<?php
		
		
error_reporting(0);
require_once("data_base.php");

$table_individual = "blood_bank";
$table_organisation = "organisation";
$table_college = "college";

$state         = $_REQUEST['state'];
$district      = $_REQUEST['district'];
$city          = $_REQUEST['city'];
$blood_group   = $_REQUEST['blood_group'];
$current_year  = date('y');

$state    = strtoupper($state);
$district = strtoupper($district); 
if($district=="ALL") $district="";			// condition to check wether all districts are selected
$city     = strtoupper($city);


if($blood_group == "Blood Group")
echo "<form action=\"blood_bank.php\"><br><b> <font color=\"red\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No Blood Group selected </font></b>&nbsp;&nbsp;&nbsp;<input type=\"submit\" value=\"Back to home\"></form><br><br>";

else
{
echo "<legend>Results of <font color=\"red\" size=\"2\">&nbsp;&nbsp;" .$blood_group . "</font> </legend>";


echo "<fieldset><legend> Individuals </legend>";
$query = "SELECT * FROM $table_individual WHERE state LIKE '%$state%' AND district LIKE '%$district%' AND city LIKE '%$city%' ORDER BY slno DESC";
$result = mysql_query($query);

$count = 0; // to find the no of results
echo "<table>";
while ($rows = mysql_fetch_array($result))
{

$dob_year = $rows['dob_year'];
if($dob_year[0] == 1) { $year_birth_1 = (2000 - $dob_year); $actual_age = $current_year+$year_birth_1; }
if($dob_year[0] == 2) { $year_birth_1 = ($dob_year - 2000); $actual_age = $current_year - $year_birth_1; }

if($rows['gender'] == "Male") $gender = 'M'; else $gender = 'F';

if($rows['blood_group'] == $blood_group)
{

$last_month_donated = $rows['last_month_donated'];
$last_year_donated = $rows['last_year_donated'];

if($last_month_donated == "January")   $lmd = 1;  if($last_month_donated == "February") $lmd = 2;
if($last_month_donated == "March")     $lmd = 3;  if($last_month_donated == "April")    $lmd = 4;
if($last_month_donated == "May")       $lmd = 5;  if($last_month_donated == "June")     $lmd = 6;
if($last_month_donated == "July")      $lmd = 7;  if($last_month_donated == "August")   $lmd = 8;
if($last_month_donated == "September") $lmd = 9;  if($last_month_donated == "October")  $lmd = 10;
if($last_month_donated == "November")  $lmd = 11; if($last_month_donated == "December") $lmd = 12;
$cm = date('m');  										//cm -> current month , lmd ->last month donated

$allow = 0;
if($last_month_donated == "Not yet donated") $allow = 1;
if($last_year_donated == "before 1 year") $allow = 1;
if($last_year_donated == "previous year")
{	//cm -current month ; lmd - last month donated
if(($cm == 1) && ($lmd < 10)) $allow =1;
if(($cm == 2) && ($lmd < 11)) $allow =1;
if(($cm == 3) && ($lmd < 12)) $allow =1;
}

if($last_year_donated == "this year")  { $diff = ($cm - $lmd);  if($diff > 3) $allow = 1; }

$state    = strtolower($rows['state']);
$district = strtolower($rows['district']);
$city     = strtolower($rows['city']);


if(($allow == 1) && ($rows['organisation'] == ""))
{
echo "<tr><td><font color=\"blue\">".$rows['name'].", ". $actual_age. " (" .$gender . ")</td><td><font color=\"red\">". $rows['contact_no']."</td><td>". $district . ", " . $city ."</td></tr>";
$count+=1;
}


}

}
echo "<tr><td></td></tr>";
if($count > 1)
echo "<tr><td><font color=\"green\"></b>&nbsp;&nbsp;$count results found</font></td></tr>";
if($count == 1)
echo "<tr><td><font color=\"green\"></b>&nbsp;&nbsp;One result found</font></td></tr>";
if($count == 0)
echo "<tr><td><font color=\"red\"></b>&nbsp;&nbsp;Oops! .. No result found for $blood_group</font></td></tr>";

echo "</table></fieldset>";

//----------SEARCHING FOR ORGANISATIONS------------------------------------------------------------------------

//----------------------to check wether org exists or not (JUST TO CHECK)
$count  =0;
$query = "SELECT * FROM $table_organisation WHERE state LIKE '%$state%' OR district LIKE '%$district%' OR district = \"All Kerala\" OR city LIKE '%$city%'";
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
{
$organisation_username = $rows['username'];
$query2 = "SELECT organisation FROM $table_individual WHERE ((organisation =\"$organisation_username\") AND (blood_group=\"$blood_group\"))";
$result2 = mysql_query($query2);
$rows2 = mysql_fetch_array($result2);
if($rows2['organisation'] != "")
$count++;
}
//----------------------

echo "<fieldset><legend> Organisations </legend>";
$query = "SELECT * FROM $table_organisation WHERE state LIKE '%$state%' OR district LIKE '%$district%' OR city LIKE '%$city%'";
$result = mysql_query($query);
echo "<font color=\"blue\">";

echo "<table>";
if($count !=0)
echo "<tr><td><font color=\"blue\"><u><b>Org'n name</td><td><u><b>Head</td><td><font color=\"magenta\"><u><b>contact no 1</td><td><u><b>cntct no 2</td><td><font color=\"magenta\"><u><b>cntct no 3</td></tr>";
$count=0;
while ($rows = mysql_fetch_array($result))
{
$organisation_username = $rows['username'];
$query2 = "SELECT organisation FROM $table_individual WHERE ((organisation =\"$organisation_username\") AND (blood_group=\"$blood_group\"))";
$result2 = mysql_query($query2);
$rows2 = mysql_fetch_array($result2);
if($rows2['organisation'] != "")
{echo "<tr><td><font color=\"blue\">". $rows2['organisation']. "</td><td>" . $rows['incharge']. "</td><td><font color=\"magenta\">" . $rows['contact_no_1'] . "</td><td>" .$rows['contact_no_2']. "</td><td><font color=\"magenta\">" .$rows['contact_no_3']. "</td></tr>";
$count++;
}
}


echo "<tr><td></td></tr>";
if($count > 1)
echo "<tr><td><font color=\"green\"></b>&nbsp;&nbsp;$count results found</font></td></tr>";
if($count == 1)
echo "<tr><td><font color=\"green\"></b>&nbsp;&nbsp;One result found</font></td></tr>";
if($count == 0)
echo "<tr><td><font color=\"red\"></b>&nbsp;&nbsp;Oops!... No organisation found having members with $blood_group blood group</font></td></tr>";

echo "</table></font>";


//echo "<br> Organisatons :- These are associations or colleges which have registered members. If your search shows an organisation as a result, it means that, that organisation have members with the same blood group which you have searched. ";
echo "</fieldset>";
}		
?>

<!------------------------------------------------------------------------------------------->




		</fieldset>
        
		</div> 
		<!-- /content -->

		<!-- Side Pic -->
        <div id="about-me">
        <fieldset>
		<legend>Registration / Login</legend>
        <form action ="donate_blood.html" method="POST">
		
		 click here to register for blood bank or to update your profile 
		
		<br><br>&nbsp;&nbsp;&nbsp;<input type="submit" value="Register / Update" name="registration">
		<br></form>
		
		</fieldset>
        
		
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
