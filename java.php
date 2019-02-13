<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>


<script>
function generateRow() 
{
var d=document.getElementById("div");
d.innerHTML+="<br>Branch name <input type='text' name='food'>";
}
</script>


<?php

$i++;
echo "
<input name=\"food\" type=\"text\"/>
<div id=\"div\"></div>
<input type=\"button\" value=\"Add\" onclick=\"generateRow()\"/>";

?>