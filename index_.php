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
$query_meetings_indiana = "SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(time_end) AS unixdate_time_end  FROM meetings WHERE active = 'true' AND zone = 3 ORDER BY zone,  meetings.`day`, unixdate_time_start";
$meetings_indiana = mysql_query($query_meetings_indiana, $wgli_admin) or die(mysql_error());
$row_meetings_indiana = mysql_fetch_assoc($meetings_indiana);
$totalRows_meetings_indiana = mysql_num_rows($meetings_indiana);


mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_milwaukee = "SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(time_end) AS unixdate_time_end  FROM meetings WHERE active = 'true' AND zone = 1 ORDER BY zone,  meetings.`day`, unixdate_time_start";
$meetings_milwaukee = mysql_query($query_meetings_milwaukee, $wgli_admin) or die(mysql_error());
$row_meetings_milwaukee = mysql_fetch_assoc($meetings_milwaukee);
$totalRows_meetings_milwaukee = mysql_num_rows($meetings_milwaukee);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_chicago = "SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(time_end) AS unixdate_time_end  FROM meetings WHERE active = 'true' AND zone = 2 ORDER BY zone,  meetings.`day`, unixdate_time_start";
$meetings_chicago = mysql_query($query_meetings_chicago, $wgli_admin) or die(mysql_error());
$row_meetings_chicago = mysql_fetch_assoc($meetings_chicago);
$totalRows_meetings_chicago = mysql_num_rows($meetings_chicago);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_neighborhoods = "SELECT DISTINCT neighborhood FROM meetings WHERE active = 'true' ORDER BY neighborhood";
$meetings_neighborhoods = mysql_query($query_meetings_neighborhoods, $wgli_admin) or die(mysql_error());
$row_meetings_neighborhoods = mysql_fetch_assoc($meetings_neighborhoods);
$totalRows_meetings = mysql_num_rows($meetings_neighborhoods);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_meetings_indiana = "SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(time_end) AS unixdate_time_end  FROM meetings WHERE active = 'true' AND zone = 3 ORDER BY zone,  meetings.`day`, unixdate_time_start";
$meetings_indiana = mysql_query($query_meetings_indiana, $wgli_admin) or die(mysql_error());
$row_meetings_indiana = mysql_fetch_assoc($meetings_indiana);
$totalRows_meetings = mysql_num_rows($meetings_indiana);
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
		<p><em>Adult Children of Alcoholics (<acronym title="Adult Children of Alcoholics">ACA</acronym> or <acronym title="Adult Children of Alcoholics">ACoA</acronym>)</em>, is as an autonomous 12 Step recovery program for individuals who grew up in alcoholic or otherwise dysfunctional homes.  <acronym title="Adult Children of Alcoholics">ACA</acronym> is founded on the belief that family dysfunction is a disease that affected us as children and continues to influence us as adults.</p>
		<p><strong>What is an “Adult Child”?</strong></p>
		<p>An adult child is someone who meets the demands of life with survival techniques learned as children.  Without help, we unknowingly operate with ineffective thoughts and judgments that can sabotage our decisions and relationships.</p>
		<p><strong>Who Attends our Meetings?</strong></p>
		<p>ACA is not limited to those from alcoholic homes. If you identify with <a href="/is-aca-for-me/#laundry-list-anchor">items from this traits list</a>, ACA will benefit you. <a href="/is-aca-for-me/">Read more</a>.</p>
			<p class="home-callout">Our members have found <acronym title="Adult Children of Alcoholics">ACA</acronym> helps them recover from the effects of family dysfunction.  We encourage you to come to a <a href="/meetings/">meeting</a> and <a href="/literature/">read more about <acronym title="Adult Children of Alcoholics">ACA</acronym></a>.</p>
	</div>
	
	<? /* ?>	
	<div class="home-event-callout">
		<h4><a href="/events/" class="normal">Spaghetti Potluck Dinner &amp; Open ACA Meeting</a></h4>
		<div>
			<a href="/events/" class="normal">Saturday, Feb. 25, 2012 <br />
				4:30pm<br />
			Chicago, IL</a><br />
			<a href="/events/">&raquo; Read more</a>
		</div>
	</div>
<? */ ?>
	
	
	<div class="home-event-callout">
		
		<? /*
		<ul class="list-normal list-normal-size list-single-space list-no-indent">
			<li><strong>New meeting:</strong> 
				<ul class="list-normal list-secondary">
					<li>
						<p><a href="#meeting-id-26" id="meeting-id-26-cta">4th Step Workbook Group<br> Lincoln Square &ndash; Thursday, 7pm</a></p></li>
					</li>
				</ul>	
		</ul>
		*/ ?>
		<h4 class="first">Events</h4>
		<ul class="list-no-indent">

			

			<li>
				<p><a href="/pdf/ACA-Conference-Quarterly-IG-Mtg-2012-10-20.pdf" target="_blank"><strong>ACA Conference</strong>, Oct. 20, Des Plaines, IL</a>
				</p>
			</li>

			
		</ul>





		




		<h4>Local ACA &amp; Intergroup News</h4>
		<ul class="list-no-indent">


			<li>
				<p><strong>New meeting:</strong> <br /> <a href="#meeting-id-26" id="meeting-id-26-cta">4th Step Workbook Group<br> Lincoln Square &ndash; Thursday, 7pm</a></p></li>

			</li>


			<li>
				<p><strong>Please add this website to your phone lists</strong>: <i>westgreatlakesaca.org</i>

				</p>
			</li>
		
			<li>
				<p><strong>Intergroup Service</strong><br /> 
				Consider volunteering on a committee: Hospitals and Institutions, Outreach, Events, and Website.    
				<br />Contact <a href="mailto:chair@westgreatlakesaca.org">chair@westgreatlakesaca.org</a>.
				</p>
				
			</li>

			<li>
				<p><strong>Next Intergroup meeting:</strong><br /> 
				<a href="/pdf/ACA-Conference-Quarterly-IG-Mtg-2012-10-20.pdf" target="_blank">Oct. 20, at the ACA Conference in Des Plaines, IL. </a></p>
	
				
			</li>
		</ul>


		<h4>Global ACA News</h4>
		<ul class="list-no-indent">
			<li  class="link-red-book">
				<p><strong>Red Book - Kindle Edition</strong>  
					available on <a href="http://www.amazon.com/CHILDREN-ALCOHOLICS-DYSFUNCTIONAL-FAMILIES-ebook/dp/B008YH705E/ref=sr_1_3?s=digital-text&ie=UTF8&qid=1346814607&sr=1-3&keywords=adult+children+of+alcoholics" target="_blank">Amazon</a> and <a href="http://www.barnesandnoble.com/w/adult-children-of-alcoholics-dysfunctional-families-aca-wso-inc/1112610318" target="_blank">Barnes and Noble</a>!
					<br /> 162 copies sold in the first two weeks.
				</p>
				
			</li>

			<li>
				<p>Over 1100 ACA meetings now registered world wide!</p>
			</li>

			<li>
				<p><strong><a href="http://www.adultchildren.org/abc/"  target="_blank">The WSO  requests your feedback</a></strong>
					and personal stories on brochures they are developing on “crosstalk” and “meetings”.
			</li>
		</ul>
		
		
		

	</div>
	



	<h2>Meetings</h2>
<iframe width="560" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=42.313878,-87.626953&amp;spn=1.827895,5.081177&amp;z=8&amp;output=embed"></iframe><br />
<small><a href="http://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=42.313878,-87.626953&amp;spn=1.827895,5.081177&amp;z=8&amp;source=embed" style="color:#0000FF;display: block">View a larger map</a></small>

	
	
	
	
	
	<div class="clearfix meeting-zone" id="meeting-zone-chicago">
		<div class="meeting-zone-header">
			<h3>Chicago Area <span>(<?=$totalRows_meetings_chicago?>)</span></h3>
			<span><a href="javascript:void(0)" class="more-info-all-show">Show all meeting info</a><a href="javascript:void(0)" class="more-info-all-hide">Hide extra meeting info</a></span>
		</div>
		
		<div class="meetings-list">
			<ul>	
				<?php do { ?>
				<li class="day-<?=$row_meetings_chicago['day']?>" id="meeting-id-<?=$row_meetings_chicago['id']?>">
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
							if ($row_meetings_chicago['email'] && !$row_meetings_chicago['contact_name']) {
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
			<p>
				<strong><a href="mailto:webmaster@westgreatlakesaca.org">Add my meeting</a></strong><br />
				<strong><a href="/pdf/ACA-Meetings-Chicago-Indiana-Wisconsin-2012-06-20-v4.1.pdf" target="_blank">Download printable list of meetings</a></strong>
			</p>
		</div>
	</div>
	
	
	
	
	
	<div class="clearfix meetings-home-group1">
		<div class="meeting-zone" id="meeting-zone-milwaukee">
			<div class="meetings-list">
				<div class="meeting-zone-header">
					<h3>SE Wisconsin / Milwaukee <span>(<?=$totalRows_meetings_milwaukee?>)</span></h3>
					<span><a href="javascript:void(0)" class="more-info-all-show">Show all meeting info</a><a href="javascript:void(0)" class="more-info-all-hide">Hide extra meeting info</a></span>
				</div>
				<ul>	
					<?php do { ?>
					<li class="day-<?=$row_meetings_milwaukee['day']?>" id="meeting-id-<?=$row_meetings_milwaukee['id']?>">
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
								if ($row_meetings_milwaukee['email'] && !$row_meetings_milwaukee['contact_name']) {
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
				<p>
					<strong><a href="mailto:webmaster@westgreatlakesaca.org">Add my meeting</a></strong><br />
					<strong><a href="/pdf/ACA-Meetings-Chicago-Indiana-Wisconsin-2012-06-20-v4.1.pdf" target="_blank">Download printable list of meetings</a></strong>
				</p>
			</div>
		</div>
		
		
		<div class="meeting-zone" id="meeting-zone-indiana">
			<div class="meetings-list">
				<div class="meeting-zone-header">
					<h3>NW Indiana Area <span>(<?=$totalRows_meetings_indiana?>)</span></h3>
					<span><a href="javascript:void(0)" class="more-info-all-show">Show all meeting info</a><a href="javascript:void(0)" class="more-info-all-hide">Hide extra meeting info</a></span>
				</div>
				<ul>	
					<?php do { ?>
					<li class="day-<?=$row_meetings_indiana['day']?>" id="meeting-id-<?=$row_meetings_indiana['id']?>">
						<div class="info-main">
						  <strong><? getDayNames($row_meetings_indiana['day']); ?>
							 	<?
	   						  echo date('g:i' , $row_meetings_indiana['unixdate_time_start']);
	   						  if ($row_meetings_indiana['unixdate_time_end'] !== NULL) {
	   						    echo date('-g:ia' , $row_meetings_indiana['unixdate_time_end']);

	   						  } else {
	   						    echo date('a' , $row_meetings_indiana['unixdate_time_start']);
	   						  }
	   						?>
							<? if ($row_meetings_indiana['host']) {print "</strong>  - <strong> "; echo $row_meetings_indiana['host']; } ?></strong> <br />
							<? if ($row_meetings_indiana['address_map_url']) { 
									print '<a href="'; 
									echo $row_meetings_indiana['address_map_url']; 
									print '" class="address-map-url">';
									echo $row_meetings_indiana['address']; 
									print "</a><br />";
								} else if ($row_meetings_indiana['address']) {
									echo $row_meetings_indiana['address']; print "<br />";
								}
							?>
							<a href="javascript:void(0)" class="more-info-cta">More meeting info</a>										
						</div>
						<div class="info-more">
							<? 
								if ($row_meetings_indiana['name']) { print '<div class="meeting-name">“'; echo $row_meetings_indiana['name']; print "”</div>";}
								if ($row_meetings_indiana['directions']) { print "- "; echo $row_meetings_indiana['directions']; print "<br />";} 
								if ($row_meetings_indiana['description']) { print "- "; echo $row_meetings_indiana['description']; print "<br />";} 
								$emailTagOpen = NULL;
								$emailTagClose = NULL;
								if ($row_meetings_indiana['email']) { 
									$emailTagOpen = '<a href="mailto:'.$row_meetings_indiana['email'].'">';
									$emailTagClose = '</a>';
								}
								if ($row_meetings_indiana['contact_name']) { 
									print "Contact: "; 
									echo $emailTagOpen;
									echo $row_meetings_indiana['contact_name']; 
									echo $emailTagClose;
									print "<br />";
								} 
								if ($row_meetings_indiana['phone']) { echo $row_meetings_indiana['phone']; print "<br />";} 
								if ($row_meetings_indiana['email'] && !$row_meetings_indiana['contact_name']) {
									echo $emailTagOpen;
									print "Email"; 
									echo $emailTagClose;
									print "<br />";
								}
								if ($row_meetings_indiana['url']) { 
									print '<a href="'; 
									echo $row_meetings_indiana['url']; 
									print '">';
									echo $row_meetings_indiana['url']; 
									print '</a><br />';
								} 
							?>
						</div>
					</li>
					<?php } while ($row_meetings_indiana = mysql_fetch_assoc($meetings_indiana)); ?>
				</ul>
				<p>
					<strong><a href="mailto:webmaster@westgreatlakesaca.org">Add my meeting</a></strong><br />
					<strong><a href="/pdf/ACA-Meetings-Chicago-Indiana-Wisconsin-2012-06-20-v4.1.pdf" target="_blank">Download printable list of meetings</a></strong>
				</p>
			</div>

		</div>
	
	</div>




</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>
