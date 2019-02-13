

<style type="text/css">
div.img
{
  margin: 2px;
  border: 1px solid #0000ff;
  height: auto;
  width: auto;
  float: left;
  text-align: center;
}	
div.img img
{
  display: inline;
  margin: 3px;
  border: 1px solid #ffffff;
}
div.img a:hover img {border: 1px solid #0000ff;}
div.desc
{
  text-align: center;
  font-weight: normal;
  width: 155px;
  margin: 2px;
}

</style>

<head>
<link rel="shortcut icon" href="design/title_img.gif"> 
    <title>Home</title>
    
    <link rel="index" href="./" title="Home" />
	
    <link rel="stylesheet" media="screen,projection" type="text/css" href="./css/main.css" />
    <link rel="stylesheet" media="print" 			 type="text/css" href="./css/print.css" />
    <link rel="stylesheet"							 type="text/css" href="./css/ads.css" />
    <link rel="stylesheet" media="aural"			 type="text/css" href="./css/aural.css" />
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
     <h1 id="logo">HELP <span></span></a></h1>
       

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
                    <li id="active"><a href="index.php">Home<span class="tab-l"></span><span class="tab-r"></span></a></li>
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
		<legend>Help</legend>
    	
		
		
		<!---------------------------------------------------------------------------------------------------->
	
<?php
		    
require_once("data_base.php");
error_reporting(0);

/*-------------DELETE THIS AREA WHEN SITE LAUNCHES----------------------------------------------------------------      

$access = $_COOKIE['access'];

if($access != "yes")
{
header('location: index2.php');  
exit; 
}

//------------------------------------------------------------------------------------------------------------
*/	  
	  
	  
$table = "need_help";

$result = mysql_query("SELECT * FROM $table ORDER BY treatment_last_year , treatment_last_month , treatment_last_day ASC");
$loop = 1;
while ($rows = mysql_fetch_array($result))			
{			
    $img_location = "images/".$rows['patient_image'] ;
	$slno =$rows['slno'];
	$var ="profile.php?slno=$slno";
	$username = $rows['username'];
	
	
//----------Calculation to check whether its time to delete this account--------------------------------	
	
	/* This program gives 'a week' time more for the registered user to keep the data in DB, 
	   After a time period of the ("treatment_best_before" date + 1 week time) the account will
	   be deleted from the DB */
	   
	   
	$date_and_time_of_register = $rows['date_and_time_of_register'];
	$month_of_register = ($date_and_time_of_register['0']*10)+$date_and_time_of_register['1'];
	$day_of_register = ($date_and_time_of_register['3']*10)+$date_and_time_of_register['4'];
	$year_of_register = ($date_and_time_of_register['6']*10)+$date_and_time_of_register['7'];
	
	$last_year = $rows['treatment_last_year'];
	$last_month = $rows['treatment_last_month'];
	$last_day = $rows['treatment_last_day'];
	
	
// $last_day , $last_month &  $last_year are in numerical format
	
	$expire_year_for_feb_check = (2000 + $year_register_expire);
	if(($expire_year_for_feb_check % 4) == 0) $leap_year = 1;  	else $leap_year = 0;
	
	$last_day+=2;		// 2 days extra given
	
	switch($last_month)
	{
	case 1:  if($last_day > 31) {$last_month+=1; $last_day-=31; break; }
	
	case 2:  if( ($leap_year == 0) && ($last_day > 29) ) // means this year is a leap year;
			 {$last_month+=1; $last_day-=29; break; }
			 if( ($leap_year == 1) && ($last_day > 28) ) // means this year is'nt a leap year;
			 {$last_month+=1; $last_day-=28; break; }
			 
	case 3:  if($last_day > 31) {$last_month+=1; $last_day-=31; break; }
	case 4:  if($last_day > 30) {$last_month+=1; $last_day-=30; break; }
	case 5:  if($last_day > 31) {$last_month+=1; $last_day-=31; break; }
	case 6:  if($last_day > 30) {$last_month+=1; $last_day-=30; break; }
	case 7:  if($last_day > 31) {$last_month+=1; $last_day-=31; break; }
	case 8:  if($last_day > 31) {$last_month+=1; $last_day-=31; break; }
	case 9:  if($last_day > 30) {$last_month+=1; $last_day-=30; break; }
	case 10: if($last_day > 31) {$last_month+=1; $last_day-=31; break; }
	case 11: if($last_day > 30) {$last_month+=1; $last_day-=30; break; }
	case 12: if($last_day > 31) {$last_month=1;  $last_day-=31; $last_year+=1; break; }
	}
	
	
	$today_day   = date('d');
	$today_month = date('m');
	$today_year  = 2000 + date('y');
	
	
	$day_diff = $last_day - $today_day;
	$month_diff = $last_month - $today_month;
	$year_diff = $last_year - $today_year;

	$allow = 0; 	
	if( ($year_diff == 0) && ($month_diff == 0) && ($day_diff < 0) ) $allow = 3;
	if( ($year_diff == 0) && ($month_diff < 0)) $allow = 2;
	if  ($year_diff < 0) $allow = 1;
	
	
	// below code prodeces the date in dd - mm - yyyy format
	$disp_last_date = ($last_day-2). "-" . $last_month . "-" . $last_year;
	
/*
	echo "<br> Date and time of register : $date_and_time_of_register";
	echo "<br> last day : $disp_last_date";
	
	echo "<br><br> Day of register : $day_of_register";
	echo "<br> Month of register : $month_of_register";
	echo "<br> Year of register : $year_of_register<br>";
	
	
	echo "<br> Day DB expire : $last_day";
	echo "<br> Month DB expire : $last_month";
	echo "<br> Year DB expire : $last_year<br>";
	
	echo "<br> Today day : $today_day";
	echo "<br> Today month : $today_month";
	echo "<br> Today year : $today_year<br>";
	
	echo "<br> diff day : $day_diff";
	echo "<br> diff month : $month_diff";
	echo "<br> diff year : $year_diff<br>";

	echo "<br> Allow value : $allow"; 
*/


if($allow != 0) // echo "<br> <font color=\"red\"> DELETE ACC </font>"; // delete this account
{

$slno = $rows['slno'];
$img_1 = $rows['patient_image'];
$img_2 = $rows['doctor_script1'];
$img_3 = $rows['doctor_script2'];
$img_4 = $rows['doctor_script3'];

if($img_1 != "") {$loc = "images/".$img_1; unlink($loc);}
if($img_2 != "") {$loc = "images/".$img_3; unlink($loc);}
if($img_3 != "") {$loc = "images/".$img_2; unlink($loc);}
if($img_4 != "") {$loc = "images/".$img_4; unlink($loc);}

mysql_query("DELETE FROM $table WHERE slno = \"$slno\"");
continue;
}	
	
//------------------------------------------------------------------------------------------------------------	
	$name = $rows['name'];
	$age = $rows['age'];
	$disease = $rows['disease'];
	$cost = $rows['treatment_cost'];
	$date = $rows['treatment_last_day'].", ".$rows['treatment_last_month']." of ".$last_year ;
	echo " <a href =$var><div class=\"img\">
 <img src=\"$img_location\" width=\"155\" height=\"120\">
 <div class=\"desc\">
 <font size=\"2\" color =\"blue\">$name, $age</font>
 <font size=\"2\" color =\"red\"><br><b>$disease</b></font>
 <font size=\"2\" color =\"green\"><br>Rs $cost</font>
 <font size=\"2\" color =\"red\"><br>before $disp_last_date</font>
  </div></div></a>";

  $loop +=1;
	if($loop>3)	{echo "<br><br>";   $loop = 1;	}
}	
	
	
	
?>
	
   
   
   
   
		
		<!---------------------------------------------------------------------------------------------------->
			
		</fieldset>
        
		</div> 
		<!-- /content -->


        <!-- Right column -->
            
	
        
    </div> <!-- /page-in -->
    </div> <!-- /page -->

	
	<!-- Footer -->
    <div id="footer">
	
    <p id="createdby">
	
	Product of <a href="http://www.newdimensions.in">New Dimensions</a> </p>
    
	
	<p id="copyright"><font size="1">&copy; 2013 Developed by Aravind R Pillai ,Asif Jaleel (For best result use Google Chrome)</font></p>
    </div> 
	<!-- /footer -->

</div> <!-- /main -->




</body>
</html>
