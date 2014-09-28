<?php require_once('../../Connections/wgli_admin.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

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
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
$query_ig_meetings = "SELECT *, UNIX_TIMESTAMP(when_start) AS unixdate_when_start, UNIX_TIMESTAMP(when_end)  FROM intergroup_meetings WHERE active = 'y' ORDER BY when_start ASC";
$ig_meetings = mysql_query($query_ig_meetings, $wgli_admin) or die(mysql_error());
$row_ig_meetings = mysql_fetch_assoc($ig_meetings);
$totalRows_ig_meetings = mysql_num_rows($ig_meetings);
?>

<?
	$title = "Meeting Schedule for the the West Great Lakes ACA Intergroup";
	$section = "about";
	$page = "";
	$description = "Information about the West Great Lakes ACA (or ACOA) (Adult Children of Alcoholics and Dysfunctional Families) Intergroup, which is made up of representatives of meetings in the Chicago, Chicagoland (suburbs), NW Wisconsin, Milwaukee, and NW Indiana areas. ";
	$keywords = "intergroup, meetings, representatives, find, search, news, aca, acoa, Adult Children of Alcoholics, Dysfunctional Families";
?>
<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/header.php"; ?>




<div id="main">
<h1>Intergroup Meeting Schedule - 2013</h1>

<p>Meetings start at <strong>1pm</strong></p>

<ul class="list-normal">
	<?php do { ?>
	  <li>
	    <strong><?php echo date('F j', $row_ig_meetings['unixdate_when_start']); ?></strong>:
	    <? if ($row_ig_meetings['where_name']) { ?>
	    <a href="<?php echo $row_ig_meetings['map_url']; ?>" target="_blank">
	      <?php echo $row_ig_meetings['where_name']; ?>
        </a>
	    <? } else { ?>
	    <a class="vtip" title="<?php echo $row_ig_meetings['call_info']; ?>">Conference call</a>
	    <? } ?>
      </li>
	  <?php } while ($row_ig_meetings = mysql_fetch_assoc($ig_meetings)); ?>
</ul>


<? /* 
<ul class="list-normal">
	<li>
		<strong>January 19</strong>:
		<a href="https://maps.google.com/maps?q=30+Riverwoods+Road,+Lincolnshire,+IL&hl=en&ll=42.186398,-87.907577&spn=0.010859,0.021844&sll=42.187145,-87.907426&sspn=0.010859,0.021844&gl=us&hnear=30+Riverwoods+Rd,+Lincolnshire,+Lake,+Illinois+60069&t=m&z=16" target="_blank">
			Lutheran Church of the Holy Spirit
		</a>
	</li>
	<li>
		<strong>February 16</strong>: <a class="vtip" title="530-881-1300, pass code: 434291">Conference call</a>
	</li>
	<li>
		<strong>March 16</strong>: <a class="vtip" title="530-881-1300, pass code: 434291">Conference call</a>
	</li>

	<li>
		<strong>April 20</strong>:
		<a href="https://maps.google.com/maps?q=30+Riverwoods+Road,+Lincolnshire,+IL&hl=en&ll=42.186398,-87.907577&spn=0.010859,0.021844&sll=42.187145,-87.907426&sspn=0.010859,0.021844&gl=us&hnear=30+Riverwoods+Rd,+Lincolnshire,+Lake,+Illinois+60069&t=m&z=16" target="_blank">
			Lutheran Church of the Holy Spirit
		</a>
	</li>
	<li>
		<strong>May 18</strong>: <a class="vtip" title="530-881-1300, pass code: 434291">Conference call</a>
	</li>
	<li>
		<strong>June 22</strong>: <a class="vtip" title="530-881-1300, pass code: 434291">Conference call</a>
	</li>

	<li>
		<strong>July 20</strong>:
		<a href="https://maps.google.com/maps?q=30+Riverwoods+Road,+Lincolnshire,+IL&hl=en&ll=42.186398,-87.907577&spn=0.010859,0.021844&sll=42.187145,-87.907426&sspn=0.010859,0.021844&gl=us&hnear=30+Riverwoods+Rd,+Lincolnshire,+Lake,+Illinois+60069&t=m&z=16" target="_blank">
			Lutheran Church of the Holy Spirit
		</a>
	</li>
	<li>
		<strong>August 17</strong>: <a class="vtip" title="530-881-1300, pass code: 434291">Conference call</a>
	</li>
	<li>
		<strong>September 21</strong>: <a class="vtip" title="530-881-1300, pass code: 434291">Conference call</a>
	</li>

	<li>
		<strong>October 19</strong>:
		TBD (Held during our Annual ACA Intergroup Event)
	</li>
	<li>
		<strong>November 16</strong>: <a class="vtip" title="530-881-1300, pass code: 434291">Conference call</a>
	</li>
	<li>
		<strong>December 21</strong>: <a class="vtip" title="530-881-1300, pass code: 434291">Conference call</a>
	</li>

</ul>
*/ ?>

<p><b>Conference call meetings</b>: <br>
	530-881-1300<br>
	Pass code: 434291<br>
	<i>Long distance rates may apply.</i>
</p>
<p><b>In-person meetings</b>: <br>
	<a href="https://maps.google.com/maps?q=30+Riverwoods+Road,+Lincolnshire,+IL&hl=en&ll=42.186398,-87.907577&spn=0.010859,0.021844&sll=42.187145,-87.907426&sspn=0.010859,0.021844&gl=us&hnear=30+Riverwoods+Rd,+Lincolnshire,+Lake,+Illinois+60069&t=m&z=16" target="_blank">
		Lutheran Church of the Holy Spirit<br>
		30 Riverwoods Road,<br>Lincolnshire, IL<br>

	</a>
</p>






</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>
<?php
mysql_free_result($ig_meetings);
?>
