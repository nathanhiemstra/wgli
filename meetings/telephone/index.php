<?php require_once('../../Connections/wgli_admin.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_milwaukee = "SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(time_end) AS unixdate_time_end  FROM meetings WHERE active = 'true' AND zone = 1 ORDER BY zone,  meetings.`day`, unixdate_time_start";
$meetings_milwaukee = mysql_query($query_meetings_milwaukee, $wgli_admin) or die(mysql_error());
$row_meetings_milwaukee = mysql_fetch_assoc($meetings_milwaukee);
$totalRows_meetings_milwaukee  = mysql_num_rows($meetings_milwaukee);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_chicago = "SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(time_end) AS unixdate_time_end FROM meetings WHERE active = 'true'  AND zone = 2 ORDER BY zone,  meetings.`day`, unixdate_time_start";
$meetings_chicago = mysql_query($query_meetings_chicago, $wgli_admin) or die(mysql_error());
$row_meetings_chicago = mysql_fetch_assoc($meetings_chicago);
$totalRows_meetings_chicago = mysql_num_rows($meetings_chicago);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_neighborhoods = "SELECT DISTINCT neighborhood FROM meetings WHERE active = 'true' ORDER BY neighborhood";
$meetings_neighborhoods = mysql_query($query_meetings_neighborhoods, $wgli_admin) or die(mysql_error());
$row_meetings_neighborhoods = mysql_fetch_assoc($meetings_neighborhoods);
$totalRows_meetings_neighborhoods = mysql_num_rows($meetings_neighborhoods);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_indiana = "SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(time_end) AS unixdate_time_end  FROM meetings WHERE active = 'true' AND zone = 3 ORDER BY zone,  meetings.`day`, unixdate_time_start";
$meetings_indiana = mysql_query($query_meetings_indiana, $wgli_admin) or die(mysql_error());
$row_meetings_indiana = mysql_fetch_assoc($meetings_indiana);
$totalRows_meetings_indiana = mysql_num_rows($meetings_indiana);

?>
	
<?php  do { ?>
	<? $neighborhoods_list =  $neighborhoods_list.", ".$row_meetings_neighborhoods['neighborhood']; ?>
<?php } while ($row_meetings_neighborhoods = mysql_fetch_assoc($meetings_neighborhoods)); ?>
	
<?
	$title = "Meetings of Adult Children of Alcoholics and Dysfunctional Families -  Chicago, Illinois, Milwaukee, Wisconsin, Indiana";
	$section = "meetings";
	$page = "fpo-telephone-meetings";
	$description = "A list of meetings of Adult Children of Alcoholics and Dysfunctional Families in Chicago, Illinois (and suburbs), Milwaukee, Wisconsin, and Indiana";
	$keywords = "adult children of alcoholics, dysfunction, families, abuse, neglect, aca, acoa, ptsd, post traumatic stress disorder, meetings, higher power, god, help, 12 steps, twelve, drug, religious, serenity prayer, recovery	$neighborhoods_list";
?>

<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/header.php"; ?>

<?
function getDayNames($i) {
	if ($i == 1) {	
		print "Sunday";
	} else if 	($i == 2) {	
		print "Monday";
	} else if	($i == 3) {	
		print "Tuesday";
	} else if 	($i == 4) {	
		print "Wednesday";
	} else if	($i == 5) {	
		print "Thursday";
	} else if	($i == 6) {	
		print "Friday";
	} else if	($i == 7) {	
		print "Saturday";
	} 
}
?>





<div class="fpo-telephone-meetings">


</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>
<?php
mysql_free_result($meetings_milwaukee);
mysql_free_result($meetings_indiana);
mysql_free_result($meetings_chicago);
?>
