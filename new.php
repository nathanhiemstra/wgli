<?php require_once('Connections/wgli_admin.php'); ?>
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
$totalRows_meetings = mysql_num_rows($meetings_milwaukee);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_chicago = "SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(time_end) AS unixdate_time_end  FROM meetings WHERE active = 'true' AND zone = 2 ORDER BY zone,  meetings.`day`, unixdate_time_start";
$meetings_chicago = mysql_query($query_meetings_chicago, $wgli_admin) or die(mysql_error());
$row_meetings_chicago = mysql_fetch_assoc($meetings_chicago);
$totalRows_meetings = mysql_num_rows($meetings_chicago);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_neighborhoods = "SELECT DISTINCT neighborhood FROM meetings WHERE active = 'true' ORDER BY neighborhood";
$meetings_neighborhoods = mysql_query($query_meetings_neighborhoods, $wgli_admin) or die(mysql_error());
$row_meetings_neighborhoods = mysql_fetch_assoc($meetings_neighborhoods);
$totalRows_meetings = mysql_num_rows($meetings_neighborhoods);
 ?>
 
<?php  do { ?>
	<? $neighborhoods_list =  $neighborhoods_list.", ".$row_meetings_neighborhoods['neighborhood']; ?>
<?php } while ($row_meetings_neighborhoods = mysql_fetch_assoc($meetings_neighborhoods)); ?>
	
<?
	$title = "";
	$section = "home";
	$page = "home";
	$description = "Home page of Adult Children of Alcoholics and Dysfunctional Families - West Great Lakes Intergroup- Chicago and Milwaukee - Illinois, Wisconsin, Indiana. General information, overview, and list of meetings.";
	$keywords = "adult children of alcoholics, dysfunction, families, abuse, neglect, aca, acoa, ptsd, post traumatic stress disorder, meetings, higher power, god, help, 12 steps, twelve, drug, religious, serenity prayer, recovery $neighborhoods_list";
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








<div id="main">

	<h1>Adult Children of Alcoholics and Dysfunctional Families</h1>
	<div class="home-definition">
		<p><strong>Adult Children of Alcoholics (<acronym title="Adult Children of Alcoholics">ACA</acronym> or <acronym title="Adult Children of Alcoholics">ACoA</acronym>)</strong>, is as an autonomous 12 Step recovery program for individuals who grew up in alcoholic or otherwise dysfunctional homes.  <acronym title="Adult Children of Alcoholics">ACA</acronym> is founded on the belief that family dysfunction is a disease that affected us as children and continues to influence us as adults.</p>
		<p><strong>What is an “Adult Child”?</strong></p>
		<p>An adult child is someone who meets the demands of life with survival techniques learned as children.  Without help, we unknowingly operate with ineffective thoughts and judgments that can sabotage our decisions and relationships.</p>
		<p><strong>Who Attends our Meetings?</strong></p>
		<p>ACA is not limited to those from alcoholic homes. If you identify with <a href="/is-aca-for-me/#laundry-list-anchor">items from this traits list</a>, ACA will benefit you. <a href="/is-aca-for-me/">Read more</a>.</p>
	</div>
	
	<div class="home-event-callout">
		<strong>Spaghetti Potluck Dinner &amp; Open ACA Meeting</strong>
		Saturday, February 25, 2012 <br />
		4:30pm<br />
		Chicago, IL<br />
		<a href="/events/">&rdquo; Read more</a>
	</div>
	

	<p class="home-callout">Our members have found <acronym title="Adult Children of Alcoholics">ACA</acronym> helps them recover from the effects of family dysfunction.  We encourage you to come to a <a href="/meetings/">meeting</a> and <a href="/literature/">read more about <acronym title="Adult Children of Alcoholics">ACA</acronym></a>.</p>

	<h2>Meetings</h2>
	<iframe width="926" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;hl=en&amp;ie=UTF8&amp;source=embed&amp;ll=42.468045,-87.879639&amp;spn=2.02601,5.147095&amp;z=8&amp;output=embed"></iframe>

	<div class="clearfix meeting-zone" id="meeting-zone-milwaukee">
		
		<div class="meetings-list">
			<div class="meeting-zone-header">
				<h3>Milwaukee Area</h3>
				<span><a href="javascript:void(0)" class="more-info-all-show">Show all meeting info</a><a href="javascript:void(0)" class="more-info-all-hide">Hide extra meeting info</a></span>
			</div>
			<ul>	
				<?php do { ?>
				<li class="day-<?=$row_meetings_milwaukee['day']?>">
					<div class="info-main">
					  <strong><? getDayNames($row_meetings_milwaukee['day']); ?>
						 	<?
   						  echo date('g:i' , $row_meetings_milwaukee['unixdate_time_start']);
   						  if ($row_meetings_milwaukee['unixdate_time_end'] !== NULL) {
   						    echo date('-g:ia' , $row_meetings_milwaukee['unixdate_time_end']);

   						  } else {
   						    echo date('a' , $row_meetings_milwaukee['unixdate_time_start']);
   						  }
   						?>
						<? if ($row_meetings_milwaukee['host']) {print "</strong>  - <strong> "; echo $row_meetings_milwaukee['host']; } ?></strong> <br />
						<? if ($row_meetings_milwaukee['address_map_url']) { 
								print '<a href="'; 
								echo $row_meetings_milwaukee['address_map_url']; 
								print '" class="address-map-url">';
								echo $row_meetings_milwaukee['address']; 
								print "</a><br />";
							} else if ($row_meetings_milwaukee['address']) {
								echo $row_meetings_milwaukee['address']; print "<br />";
							}
						?>
						<a href="javascript:void(0)" class="more-info-cta">More meeting info</a>										
					</div>
					<div class="info-more">
						<? 
							if ($row_meetings_milwaukee['name']) { print '<div class="meeting-name">“'; echo $row_meetings_milwaukee['name']; print "”</div>";}
							if ($row_meetings_milwaukee['directions']) { print "- "; echo $row_meetings_milwaukee['directions']; print "<br />";} 
							if ($row_meetings_milwaukee['description']) { print "- "; echo $row_meetings_milwaukee['description']; print "<br />";} 
							$emailTagOpen = NULL;
							$emailTagClose = NULL;
							if ($row_meetings_milwaukee['email']) { 
								$emailTagOpen = '<a href="mailto:'.$row_meetings_milwaukee['email'].'">';
								$emailTagClose = '</a>';
							}
							if ($row_meetings_milwaukee['contact_name']) { 
								print "Contact: "; 
								echo $emailTagOpen;
								echo $row_meetings_milwaukee['contact_name']; 
								echo $emailTagClose;
								print "<br />";
							} 
							if ($row_meetings_milwaukee['phone']) { echo $row_meetings_milwaukee['phone']; print "<br />";} 
							if (!$row_meetings_milwaukee['contact_name']) {
								echo $emailTagOpen;
								print "Email"; 
								echo $emailTagClose;
								print "<br />";
							}
							if ($row_meetings_milwaukee['url']) { 
								print '<a href="'; 
								echo $row_meetings_milwaukee['url']; 
								print '">';
								echo $row_meetings_milwaukee['url']; 
								print '</a><br />';
							} 
						?>
					</div>
				</li>
				<?php } while ($row_meetings_milwaukee = mysql_fetch_assoc($meetings_milwaukee)); ?>
			</ul>
			<p><strong><a href="mailto:webmaster@westgreatlakes.org">More meeting info</a></strong></p>
		</div>

	</div>
	
	
	
	<div class="clearfix meeting-zone" id="meeting-zone-chicago">
		<div class="meeting-zone-header">
			<h3>Chicago Area</h3>
			<span><a href="javascript:void(0)" class="more-info-all-show">Show all meeting info</a><a href="javascript:void(0)" class="more-info-all-hide">Hide extra meeting info</a></span>
		</div>
		
		<div class="meetings-list">
			<ul>	
				<?php do { ?>
				<li class="day-<?=$row_meetings_chicago['day']?>">
					<div class="info-main">
						
						<strong>
					  	<? getDayNames($row_meetings_chicago['day']); ?>
  						<?
  						  echo date('g:i' , $row_meetings_chicago['unixdate_time_start']);
  						  if ($row_meetings_chicago['unixdate_time_end'] !== NULL) {
  						    echo date('-g:ia' , $row_meetings_chicago['unixdate_time_end']);
						    
  						  } else {
  						    echo date('a' , $row_meetings_chicago['unixdate_time_start']);
  						  }
  						?>
						<? if ($row_meetings_chicago['neighborhood']) {print "</strong>  - <strong> "; echo $row_meetings_chicago['neighborhood']; } ?></strong> <br />
						<? if ($row_meetings_chicago['address_map_url']) { 
								print '<a href="'; 
								echo $row_meetings_chicago['address_map_url']; 
								print '" class="address-map-url">';
								echo $row_meetings_chicago['address']; 
								print "</a><br />";
							} else if ($row_meetings_chicago['address']) {
								echo $row_meetings_chicago['address']; print "<br />";
							}
						?>
						<a href="javascript:void(0)" class="more-info-cta">More meeting info</a>								
					</div>
					<div class="info-more">
						<div class="meeting-name"><? if ($row_meetings_chicago['host']) {echo $row_meetings_chicago['host']; } ?></div>
						<? 
							if ($row_meetings_chicago['name']) { print '“'; echo $row_meetings_chicago['name']; print "”<br />";}
							if ($row_meetings_chicago['description']) { print "- "; echo $row_meetings_chicago['description']; print "<br />";} 
							if ($row_meetings_chicago['directions']) { print "- "; echo $row_meetings_chicago['directions']; print "<br />";} 
							$emailTagOpen = NULL;
							$emailTagClose = NULL;
							if ($row_meetings_chicago['email']) { 
								$emailTagOpen = '<a href="mailto:'.$row_meetings_chicago['email'].'">';
								$emailTagClose = '</a>';
							}
							if ($row_meetings_chicago['contact_name']) { 
								print "Contact: "; 
								echo $emailTagOpen;
								echo $row_meetings_chicago['contact_name']; 
								echo $emailTagClose;
								print "<br />";
							} 
							if ($row_meetings_chicago['phone']) { echo $row_meetings_chicago['phone']; print "<br />";} 
							if (!$row_meetings_chicago['contact_name']) {
								echo $emailTagOpen;
								print "Email"; 
								echo $emailTagClose;
								print "<br />";
							}
							if ($row_meetings_chicago['url']) { 
								print '<a href="'; 
								echo $row_meetings_chicago['url']; 
								print '">';
								echo $row_meetings_chicago['url']; 
								print '</a><br />';
							} 
						?>
					</div>
				</li>
				<?php } while ($row_meetings_chicago = mysql_fetch_assoc($meetings_chicago)); ?>
			</ul>
			<p><strong><a href="mailto:webmaster@westgreatlakes.org">More meeting info</a></strong></p>
		</div>
	</div>




</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>
