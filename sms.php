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
		
		
<fieldset><legend>SMS GATEWAY</legend>
		
		
		 
<?php
		 
$error = 0;
require_once("data_base.php");
error_reporting(0);

$password = "projectjeeva";
$table_individual   = "blood_bank";
$table_organisation = "organisation";

if(   ((!isset($_REQUEST['sms_enter'])) || (isset($_REQUEST['sms_enter']) && ($_REQUEST['password'] != $password))) && (!isset($_REQUEST['select_names'])) && (!isset($_REQUEST['message'])))
{
echo "<fieldset><legend>Authentication</legend>";
echo "<form action=\"sms.php\" method=\"POST\">";
echo "Enter password : <input required type=\"password\" name=\"password\">";
echo "<input type=\"submit\" value=\"Submit\" name=\"sms_enter\">";
echo "</form></fieldset>";
}



if(isset($_REQUEST['sms_enter']) && ($_REQUEST['password'] == $password) )
{
echo "<form action=\"sms.php\" method=\"POST\">";
echo "<textarea rows=\"4\" cols=\"55\" name=\"sms_content\" warp=\"physical\"></textarea>";
echo "<br><br><input type=\"radio\" name=\"gender\" value=\"all\">List all";
echo "<br><input type=\"radio\" name=\"gender\" value=\"female\">List Females only";
echo "<br><input type=\"radio\" name=\"gender\" value=\"male\">List Males only";
echo "<br><br><input type=\"submit\" value=\"Proceed\" name=\"message\">";
}

if(isset($_REQUEST['message']))
{
echo "<fieldset><legend>Select People</legend><form action = \"sms.php\" method=\"POST\">";

$list = $_REQUEST['gender'];
$sms_content = $_REQUEST['sms_content'];

if($list == "female") { echo "<br> Showing list of females only <br><br>"; $query = "SELECT * FROM $table_individual WHERE gender =\"Female\"";}
if($list == "male")   { echo "<br> Showing list of males only <br><br>"; $query = "SELECT * FROM $table_individual WHERE gender =\"Male\"";}
if($list == "all") { echo "<br> Showing Whole list <br><br>"; $query = "SELECT * FROM $table_individual"; }

$result = mysql_query($query);

$i=0;
echo "<table>";
while ($rows = mysql_fetch_array($result))
{
$name= "name_".$i++;
$username = $rows['username'];
$contact_no = $rows['contact_no'];
$district = $rows['district'];
$name_disp = $rows['name'];
echo "<tr><td><input type = \"checkbox\" value=\"$username\" name = \"$name\">&nbsp;&nbsp;&nbsp; </td>
		  <td>&nbsp;$name_disp </td><td> $contact_no </td><td> $district</td></tr>";
}

echo "<input type=\"hidden\" value=\"$sms_content\" name=\"sms_content\">";
echo "<input type=\"hidden\" value=\"$list\" name=\"list\">";
echo "<tr><td></td><td><input type=\"submit\" value=\"Send message\" name=\"select_names\"></td></table>";
echo "</fieldset>";
}


if(isset($_REQUEST['select_names']))
{
$username="aravind1992";
$api_password="c73a333g14dptrtox";
$sender="test";
$domain="sms.coolwrks.com";
$priority="1";// 1-Normal,2-Priority,3-Marketing

$sms_content = $_REQUEST['sms_content'];
$count = 0;
$query = "SELECT * FROM $table_individual";
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result))
$count++;

for($i=0; $i<=$count ; $i++)
{
$name= "name_".$i;
if(isset($_REQUEST[$name]) != "")
{
$username = $_REQUEST[$name];
$query = "SELECT contact_no , name , password FROM $table_individual WHERE username =\"$username\"";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);
$name = $rows['name'];
$contact_no = $rows['contact_no'];

if($sms_content == "jeevaraksha")
$sms_content = "Hi $name, Welcome to Jeevaraksha. Your Username: $username , Password: $password. Regards admin";


{//sms api cod inside this
echo "send message to $contact_no - $username <br>";
//--------------

//--------------------------------

$mobile=$contact_no;
$message= $sms_content;
$username=urlencode($username);
$password=urlencode($password);
$sender=urlencode($sender);
$message=urlencode($message);
	
$parameters="username=$username&api_password=$api_password&sender=$sender&to=$mobile&message=$message&priority=$priority";

$fp = fopen("http://$domain/pushsms.php?$parameters", "r");

	$response = stream_get_contents($fp);
	fpassthru($fp);
	fclose($fp);
//--------------------------------


//--------------
}
}
}

}


		
		
?>
</fieldset>
		 
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
