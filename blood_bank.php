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
		
        <fieldset>
		<legend>Blood Bank</legend>

		
		
		

<form action = "blood_bank_results.php" method="POST">
<table>
<tr>
<td><b>Required blood group </td>
<td><select name="blood_group" style="width:160px; height:20px;"/>
		<option>Blood Group</option>
		<option>O positive</option>
		<option>O negative</option>
		<option>A positive</option>
		<option>A negative</option>
		<option>B positive</option>
	    <option>B negative</option>
	    <option>AB positive</option>
        <option>AB negative</option>
        </select></td>
		</tr></table>
		
<font color="orange"><b>For more specific search use the form provided below. 
<br>If you are'nt sure about the proper spelling of the location just type first 
two or three characters of the place</b></font>
<table>
<tr><td><b>Specify state </td>
<td><input readonly type="text" name="state" value="Kerala" style="width:160px; height:20px;"/></td>
</tr>

<tr>
<td><b>Specify district</td>
<td><select name="district" style="width:160px; height:20px;"/>
		<option>All</option>
		<option>Alappuzha</option>
		<option>Ernakulam</option>
		<option>Idukki</option>
		<option>Kannur</option>
		<option>Kasaragod</option>
		<option>Kollam</option>
		<option>Kottayam</option>
		<option>Kozhikode</option>
		<option>Malappuram</option>
		<option>Palakkad</option>
		<option>Pathanamthitta</option>
		<option>Thrissur</option>
		<option>Trivandrum</option>
		<option>Wayanad</option>
</select></td></tr>

<tr>
<td><b>Specify city &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
<td><input type="text" name="city" style="width:160px; height:20px;"/></td>
</tr>

<tr>
<td></td><td><input type = "submit" value="Search" name="check" style="width:162px; height:30px;"/></td>
</tr>
</table>

</form>
		


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
		<br><br>&nbsp;&nbsp;&nbsp;<input type="submit" value="Register / Update" name="registration"><br></form>
		</fieldset>
        </div> 
	    <!-- /Side Pic -->

        
    </div> <!-- /page-in -->
    </div> <!-- /page -->

	<!------------------------------------------------------------------------------------------------------------------------>
	
    <!-- Footer -->
    <div id="footer">
    <p id="createdby"><font size="1">Product of <a href="http://www.newdimensions.in">New Dimensions</a> </p>
    <p id="copyright">&copy; 2013 Developed by Aravind R Pillai ,Asif Jaleel (For best result use Google Chrome)</p>
     </font	>
	</div> 
	<!-- /footer -->

	
	
</div> <!-- /main -->

</body>
</html>



<?php
/*
no php content...
by mistake this file was saved as a PHP file and all other files are linked with this file with
the PHP extension, so if i change the extension to HTML then it will b necessary to change the 
file name of this page in all other pages.  
*/
?>
