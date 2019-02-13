<html>
<head>
<title>RBtnText</title>
<script type="text/javascript">

function checkIt(el) 
{
  var elArr = ['mtext'];
  for (var i=0; i<elArr.length; i++) 
  {
sel = document.getElementById(elArr[i]);
if (el.value == elArr[i]) { sel.style.display = 'block'; }
                     else { sel.style.display = 'none'; } 
  }
  
}

</script>
</head>
<body>

<input type="radio" name="radioBtn" value="stext" onclick="checkIt(this)">Organisation
<input type="radio" name="radioBtn" value="mtext" onclick="checkIt(this)">College


<div id="stext" style="display:none;width:150px" />
 <input type="text" id="single" size="25" />
</div>
<div id="mtext" style="display:none;width:150px" />
 <input type="text" id="multiple1" size="25" />
 <input type="text" id="multiple2" size="25" />
 <input type="text" id="multiple3" size="25" />
 <input type="text" id="multiple4" size="25" />
 <input type="text" id="multiple5" size="25" />
</div>
<div id="ltext" style="display:none;width:150px">
 <textarea id="alist" rows="10" cols="19" /></textarea>
</div>

<input type="radio" onclick="alert('hello');"/>

</body>
</html>