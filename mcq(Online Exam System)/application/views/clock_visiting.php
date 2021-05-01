<html>
<HEAD>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
startday = new Date();
clockStart = startday.getTime();
function initStopwatch() { 
var myTime = new Date(); 
return((myTime.getTime() - clockStart)/1000); 
}
function getSecs() { 
var tSecs = Math.round(initStopwatch()); 
var iSecs = tSecs % 60;
var iMins = Math.round((tSecs-30)/60);   
var sSecs ="" + ((iSecs > 9) ? iSecs : "0" + iSecs);
var sMins ="" + ((iMins > 9) ? iMins : "0" + iMins);
document.forms[0].timespent.value = sMins+":"+sSecs;
window.setTimeout('getSecs()',1000); 
}
// End -->
</script>

</HEAD>
<BODY onLoad="window.setTimeout('getSecs()',1)">

<CENTER>
<FORM>
<FONT SIZE="2" FACE="Arial" color="#000000">Time spent here: </FONT><input size=5 name=timespent>
</FORM>
</CENTER>
</BODY>
</html>