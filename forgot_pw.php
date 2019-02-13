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
     <h1 id="logo">Forgot Password<span></span></a></h1>
       

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
		
		
<fieldset><legend>Password Recovery</legend>


		
<?php
		 
$error = 0;
require_once("data_base.php");
error_reporting(0);

$password = "projectjeeva";
$table_individual   = "blood_bank";
$table_organisation = "organisation";
	 
echo "<fieldset><legend><font color=\"red\">Mobile verification</font></legend><form action=\"forgot_pw.php\" method=\"POST\"><table>";
echo "<tr><td>Enter your mobile no which you have registered here </td><td><input type=\"text\" name=\"mobile\"></td></tr>";
echo "<tr><td></td><td><input type=\"submit\" value=\"Recover my password\" name=\"recover\"></td></tr>";		
echo "</table></fieldset>";

echo "<fieldset><legend><font color=\"red\">Could not Recover</font></legend><form action=\"forgot_pw.php\" method=\"POST\">";
echo "Still got problem in accessing your account. Fill the form below. let us check your account and will contact you soon. ";
echo "<br>";
echo "<textarea required placeholder=\"Enter your compalint here\" cols=\"55\" rows=\"4\" warp=\"physical\" name=\"compliant\"></textarea>";
echo "Available contact no to contact you <input required placeholder=\"9447020535\" type=\"text\" name=\"contact_no\">";
echo "<tr><td></td><td><input type=\"submit\" value=\"send\" name=\"complaint_send\" ></td></tr>";		
echo "</table></fieldset>";

echo "<fieldset><legend><font color=\"red\">Direct enquiry</font></legend>";
echo "<b>Or you can contact our admin for assistance ";
echo "<table><tr><td><b> Aravind R Pillai</td><td><b> +91-9447-020-535</td></tr><tr><td><b> Asif Jaleel</td><td><b> +91-9946-428-850</td></tr></table>";
echo "</fieldset>";


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
