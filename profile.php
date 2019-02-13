<head>
<link rel="shortcut icon" href="design/title_img.gif"> 
    <title>Home</title>
    
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
     <h1 id="logo">HELP <span></span></a></h1>
       

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
		<legend>Help</legend>
        
		<!---------------------------------------------------------------------------------------------------->
		
<?php


if(isset($_REQUEST['img_viewer']))
$slno = $_REQUEST['slno'];

	
	
require_once("data_base.php");
error_reporting(0);

$slno = $_REQUEST['slno'];
			
			
$table = "need_help";
$query ="SELECT * FROM $table WHERE (slno = $slno)";

$result = mysql_query($query);
$rows = mysql_fetch_array($result);

$img_location = "images/".$rows['patient_image'] ;
$last_year = $rows['treatment_last_year'];
	if($last_year == "this_year") $last_year = "this year";
	if($last_year == "next_year") $last_year = "next year";			

	echo "<b><fieldset><font color=\"blue\" size=\"4\">";
			echo "&nbsp;&nbsp;<u>" . $rows['name'].", ".$rows['age'];
			echo "</u></font><font color=\"red\" size=\"3\">&nbsp;";
			echo "( " . $rows['disease'] . " ) ";
			echo "</font><font color=\"black\" size=\"2\">";
            
			echo "<br><br>&nbsp;&nbsp; <u>Disease / Treatment Details</u>";
					echo "<br><br>&nbsp;  Doctor of " .$rows['name'] . " - Dr " .$rows['doctor'];
	

$google = "https://www.google.co.in/?gws_rd=cr&ei=TtZcUpSyK6bqiAfbj4CQAg#q=";
$hosp = $rows['hospital']. "+hospital+at+" .$rows['hospital_district'];
$len = strlen($hosp);
for($i=0; $i<$len ;$i++) if($hosp[$i] == " ") $hosp[$i] = "+"; 
$google_search = $google.$hosp;
//echo "<br>$google_search<br>";


			echo "<br>&nbsp;  Hospital - <a href=\"$google_search\" target=\"_blank\">" .$rows['hospital']. ", " .$rows['hospital_district'] . "</a>";
			echo "<br>&nbsp;  Treatment Cost <img src=\"design/rs.jpg\" height=\"15\" width=\"15\" />" . 
					$rows['treatment_cost'];
			echo "<br>&nbsp; Treatment best before <font color=\"red\">";
			
			switch ($rows['treatment_last_month'])
			{
			case 1 : $month = "January"; break;			case 2 : $month = "February"; break;
			case 3 : $month = "March"; break;			case 4 : $month = "April"; break;
			case 5 : $month = "May"; break;			case 6 : $month = "June"; break;
			case 7 : $month = "July"; break;			case 8 : $month = "August"; break;
			case 9 : $month = "September"; break;			case 10: $month = "October"; break;
			case 11: $month = "November"; break;			case 12: $month = "December"; break;
						}
			
			echo $rows['treatment_last_day'].", ".$month." of ".$last_year . "</font>";
			
			//-------------------------------------------------------------------------
			
			echo "<br><br>&nbsp;&nbsp; <u>Doctor's script</u> ";
			
			$script_loc_1 = $rows['doctor_script1'] ;
			$script_loc_2 = $rows['doctor_script2'] ;
			$script_loc_3 = $rows['doctor_script3'] ;
			
			
			if($script_loc_1 != "") 
			{
			$var ="img_viewer.php?slno=$script_loc_1";
			echo "<br>&nbsp;&nbsp;<a href=$var>
			<img border=\"2\" src=\"images/$script_loc_1\" width=\"100\" height=\"100\" /> </a>";
			}
			
			
			if($script_loc_2 != "") 
			{
			$var ="img_viewer.php?slno=$script_loc_2";
			echo "&nbsp;&nbsp;<a href=$var>
			<img border=\"2\" src=\"images/$script_loc_2\" width=\"100\" height=\"100\" /> </a>";
			}
			
			
			if($script_loc_3 != "") 
			{
			$var ="img_viewer.php?slno=$script_loc_3";
			echo "&nbsp;&nbsp;<a href=$var>
			
			<img border=\"2\" src=\"images/$script_loc_3\" width=\"100\" height=\"100\" /> </a>";
			}//--------------------------------------------------------------------------
			
			
			
echo "<br><br> &nbsp;&nbsp;<u>Account details</u>";
echo "<a href=\"www.paypal.com\">
<img border=\"3\" src=\"design/payonline.jpg\" height=\"42\" width=\"200\" align=\"right\"/> </a>";

echo "<br>&nbsp;  Account no &nbsp;&nbsp;&nbsp;: " .$rows['account_no'];
echo "<br>&nbsp;  Account of  &nbsp;&nbsp;&nbsp;&nbsp;: " .$rows['account_holder'];
echo "<br>&nbsp;  Bank  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : " .$rows['bank_name'];	
echo "<br>&nbsp;  Place &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : " .$rows['bank_place'];
	
	
echo "<br><br> &nbsp;&nbsp;<u>Contact Details </u>";
echo "<br>&nbsp;  Contact No&nbsp;&nbsp;&nbsp; : " .$rows['contact_no'];
echo "<br>&nbsp;  Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " .$rows['house_name'];
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " .$rows['street'] . " , " . $rows['city'];
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rows['district'];
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " .$rows['state'] . " , " . $rows['pincode'];

echo "<br><br>&nbsp;&nbsp;<a href=\"mailto:\"" . $rows['email'] . ">email provided</a><br><br><br><br>";
			
echo "</fieldset>";			
			
			
$var ="img_viewer.php?slno={$rows['patient_image']}";
//echo "<br>$var";
echo "</div><div id=\"about-me\"><p>
<a href=$var/><img src=\"$img_location\" height=\"142\" width=\"200\" /></a></div>";



setcookie('slno' , $slno , time()+4800);


?>
		
		<!---------------------------------------------------------------------------------------------------->
		
        
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
