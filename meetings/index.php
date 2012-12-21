<?php require_once('../Connections/wgli_admin.php'); ?>
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
	$page = "meetings";
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







<div id="main">
	<h1>Meetings</h1>
	<? /* ?>
	<div class="meeting-zone" id="meeting-what-to-expect">
		<h2><strong>What to expect</strong></h2>
		<ul class="list-normal list-single-space">
			<li><strong>Who:</strong> <acronym title="Adult Children of Alcoholics">ACA</acronym> Meetings are made up of people who wish to recover from the effects of growing up in an alcoholic or otherwise dysfunctional homes. Many of us identify with these <a href="/literature/#literature_laundry_list">common survival traits</a>. </li>
			<li><strong>Duration:</strong> Telephone meetings commonly last 60 minutes. </li>
			<li><strong>How telephone meetings work:</strong> Telephone meetings are conference calls. Participants call the number then enter an access code. By default, all participants are on mute. To share, participants un-mute themselves by pressing *1 on their keypad. </li>
			<li><strong>Format:</strong> There are many formats (described below), but most telephone meetings have a meeting chairperson who reads guidelines and describes how the format works. Participants take turns reading from the ACA Red Text. Next, the chairperson asks for volunteers to share, one at a time, about their experience relating to the topic or reading. We talk about our feelings and our life experiences and how the literature, step work, or other <acronym title="Adult Children of Alcoholics">ACA</acronym> recovery works in our lives. We share about personal change, working the steps, and connecting with our inner child and higher power.</li> 
				<li><strong>Respect:</strong> There is no "cross talk" which means no one interrupts or criticizes what another has to say, members speak only from their own point of view and experience. If there is ever perpetrating behavior, the meeting moderator will drop the perpetrator from the conference calls.</li>
			
		</ul>
	</div>
<? */ ?>
	
	
	<div class="meeting-zone" id="meeting-what-to-expect">
		<h2><strong>What to expect</strong></h2>
		<ul class="list-normal list-single-space">
			<li><strong>Who:</strong> <acronym title="Adult Children of Alcoholics">ACA</acronym> Meetings are made up of people who wish to recover from the effects of growing up in an alcoholic or otherwise dysfunctional homes. Many of us identify with these <a href="/literature/#literature_laundry_list">common survival traits</a>. </li>
			<li><strong>Duration:</strong> Meetings commonly last 60-90 minutes. </li>
			<li><strong>Format:</strong> A common format is where an <acronym title="Adult Children of Alcoholics">ACA</acronym> member speaks on an <acronym title="Adult Children of Alcoholics">ACA</acronym> topic or the group reads from <a href="/literature/"><acronym title="Adult Children of Alcoholics">ACA</acronym> literature</a>. Then volunteers share about their experience relating to the topic or reading. We talk about our feelings and our life experiences and how the literature, step work, or other <acronym title="Adult Children of Alcoholics">ACA</acronym> recovery works in our lives. We share about personal change, working the steps, and connecting with our inner child and higher power.</li> 
				<li><strong>Respect:</strong> There is no "cross talk" which means no one interrupts or criticizes what another has to say, members speak only from their own point of view and experience.</li>
		</ul>
	</div>
	
	<div class="meeting-zone" id="meetings-summary">
		<ul>
			<li>
				<div><a href="#meeting-zone-chicago">Chicago Area <span>(<?=$totalRows_meetings_chicago?>)</span></a></div>
				<a href="#meeting-zone-chicago">See meetings </a>
			</li>
			<li>
				<div><a href="#meeting-zone-milwaukee">SE Wisconsin / Milwaukee <span>(<?=$totalRows_meetings_milwaukee?>)</span></a></div>
				<a href="#meeting-zone-milwaukee">See meetings </a>
			</li>
			<li>
				<div><a href="#meeting-zone-indiana">NW Indiana <span>(<?=$totalRows_meetings_indiana?>)</span></a></div>
				<a href="#meeting-zone-indiana">See meetings </a>
			</li>
	</div>
	
	

	
	
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
						<? if ($row_meetings_chicago['wso_id']) { 
						      $wso_id_pre = '<a href="javascript:void(0)" title="WSO ID: '.$row_meetings_chicago['wso_id'].'" class="wso-id">'; 
						      $wso_id_post = '</a>'; 
						  } else {
						    $wso_id_pre = ''; 
						    $wso_id_post = ''; 
						  } ?>
						<?=$wso_id_pre?>
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
						<? if ($row_meetings_chicago['neighborhood']) {print "</strong>  - <strong> "; echo $row_meetings_chicago['neighborhood']; } ?>
						</strong> 
						<?=$wso_id_post?><br />
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
							if ($row_meetings_chicago['name']) { print '“'; echo $wso_id_pre; echo $row_meetings_chicago['name']; $wso_id_post; print "”<br />";}
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
			<p class="meeting-ctas">
				<strong><a href="/pdf/ACA-Meetings-Chicago-Indiana-Wisconsin-2012-06-20-v4.1.pdf" target="_blank" class="link-print">Printable meeting list</a></strong><br />
				<strong><a href="mailto:webmaster@westgreatlakesaca.org" class="link-add">Add a meeting</a></strong>
			</p>
		</div>

		<div class="meetings-map" id="map-chicago">


<iframe width="463" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;ie=UTF8&amp;t=m&amp;ll=42.039094,-87.874146&amp;spn=1.121916,1.271667&amp;z=9&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;ie=UTF8&amp;t=m&amp;ll=42.039094,-87.874146&amp;spn=1.121916,1.271667&amp;z=9&amp;source=embed" style="color:#0000FF;text-align:left">Adult Children of Alcoholic Meetings - West Great Lakes</a> in a larger map</small>

		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="clearfix meeting-zone" id="meeting-zone-milwaukee">
		<div class="meetings-list">
			<div class="meeting-zone-header">
				<h3>SE Wisconsin / Milwaukee <span>(<?=$totalRows_meetings_milwaukee?>)</span></h3>
				<span><a href="javascript:void(0)" class="more-info-all-show">Show all meeting info</a><a href="javascript:void(0)" class="more-info-all-hide">Hide extra meeting info</a></span>
			</div>
			<ul>	
				<?php do { ?>
				<li class="day-<?=$row_meetings_milwaukee['day']?>" id="meeting-id-<?=$row_meetings_milwaukee['id']?>">
					<div class="info-main">
					  <? if ($row_meetings_milwaukee['wso_id']) { 
						      $wso_id_pre = '<a href="javascript:void(0)" title="WSO ID: '.$row_meetings_milwaukee['wso_id'].'" class="wso-id">'; 
						      $wso_id_post = '</a>'; 
						  } else {
						    $wso_id_pre = ''; 
						    $wso_id_post = ''; 
						  } ?>
						<?=$wso_id_pre?>
					  <strong>
						 	<?
   						  echo date('g:i' , $row_meetings_milwaukee['unixdate_time_start']);
   						  if ($row_meetings_milwaukee['unixdate_time_end'] !== NULL) {
   						    echo date('-g:ia' , $row_meetings_milwaukee['unixdate_time_end']);

   						  } else {
   						    echo date('a' , $row_meetings_milwaukee['unixdate_time_start']);
   						  }
   						?>
						<? if ($row_meetings_milwaukee['host']) {print "</strong>  - <strong> "; echo $row_meetings_milwaukee['host']; } ?>
						</strong>
						<?=$wso_id_post?><br />
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
					<? 
				
							
						?>
					<div class="info-more">
						<? 
							if ($row_meetings_milwaukee['name']) { print '<div class="meeting-name">“'; echo $wso_id_pre; echo $row_meetings_milwaukee['name']; echo $wso_id_post; print "”</div>";}
							if ($row_meetings_milwaukee['description']) { print "- "; echo $row_meetings_milwaukee['description']; print "<br />";} 
							if ($row_meetings_milwaukee['directions']) { print "- "; echo $row_meetings_milwaukee['directions']; print "<br />";} 
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
							if ($row_meetings_milwaukee['email'] && !$row_meetings_milwaukee['contact_name'] ) {
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
			<p class="meeting-ctas">
				<strong><a href="/pdf/ACA-Meetings-Chicago-Indiana-Wisconsin-2012-06-20-v4.1.pdf" target="_blank" class="link-print">Printable meeting list</a></strong><br />
				<strong><a href="mailto:webmaster@westgreatlakesaca.org" class="link-add">Add a meeting</a></strong>
			</p>
		</div>

		<div class="meetings-map">

<iframe width="463" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;ie=UTF8&amp;t=m&amp;ll=42.799431,-87.868652&amp;spn=0.705343,1.271667&amp;z=9&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;ie=UTF8&amp;t=m&amp;ll=42.799431,-87.868652&amp;spn=0.705343,1.271667&amp;z=9&amp;source=embed" style="color:#0000FF;text-align:left">Adult Children of Alcoholic Meetings - West Great Lakes</a> in a larger map</small>
	</div>

	</div>
	
	
	
	
	
	
	
	
	
	<div class="clearfix meeting-zone" id="meeting-zone-indiana">
		
		
		<div class="meetings-list">
			<div class="meeting-zone-header">
				<h3>Northwest Indiana <span>(<?=$totalRows_meetings_indiana?>)</span></h3>
				<span><a href="javascript:void(0)" class="more-info-all-show">Show all meeting info</a><a href="javascript:void(0)" class="more-info-all-hide">Hide extra meeting info</a></span>
			</div>
			<ul>	
				<?php do { ?>
				<li class="day-<?=$row_meetings_indiana['day']?>" id="meeting-id-<?=$row_meetings_indiana['id']?>">
					<div class="info-main">
					  <? if ($row_meetings_indiana['wso_id']) { 
						      $wso_id_pre = '<a href="javascript:void(0)" title="WSO ID: '.$row_meetings_indiana['wso_id'].'" class="wso-id">'; 
						      $wso_id_post = '</a>'; 
						  } else {
						    $wso_id_pre = ''; 
						    $wso_id_post = ''; 
						  } ?>
						<?=$wso_id_pre?>
					  <strong>
						 	<?
   						  echo date('g:i' , $row_meetings_indiana['unixdate_time_start']);
   						  if ($row_meetings_indiana['unixdate_time_end'] !== NULL) {
   						    echo date('-g:ia' , $row_meetings_indiana['unixdate_time_end']);

   						  } else {
   						    echo date('a' , $row_meetings_indiana['unixdate_time_start']);
   						  }
   						?>
						<? if ($row_meetings_indiana['neighborhood']) {print "</strong>  - <strong> "; echo $row_meetings_indiana['neighborhood']; } ?>
						</strong> 
						<?=$wso_id_post?><br />
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
					<? 
				
							
						?>
					<div class="info-more">
						<? 
							if ($row_meetings_indiana['name']) { print '<div class="meeting-name">“'; echo $wso_id_pre; echo $row_meetings_indiana['name']; echo $wso_id_post; print "”</div>";}
							if ($row_meetings_indiana['description']) { print "- "; echo $row_meetings_indiana['description']; print "<br />";} 
							if ($row_meetings_indiana['directions']) { print "- "; echo $row_meetings_indiana['directions']; print "<br />";} 
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
			<p class="meeting-ctas">
				<strong><a href="/pdf/ACA-Meetings-Chicago-Indiana-Wisconsin-2012-06-20-v4.1.pdf" target="_blank" class="link-print">Printable meeting list</a></strong><br />
				<strong><a href="mailto:webmaster@westgreatlakesaca.org" class="link-add">Add a meeting</a></strong>
			</p>
		</div>

		<div class="meetings-map">

<iframe width="463" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;ie=UTF8&amp;t=m&amp;ll=41.559977,-87.458382&amp;spn=0.044957,0.079479&amp;z=13&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;ie=UTF8&amp;t=m&amp;ll=41.559977,-87.458382&amp;spn=0.044957,0.079479&amp;z=13&amp;source=embed" style="color:#0000FF;text-align:left">Adult Children of Alcoholic Meetings - West Great Lakes</a> in a larger map</small>		</div>

	</div>
	
	
	
	
	
	
	
	
	
	
	
	<? /* ?>
	<div id="show-this-meeting">
		<p><acronym title="Adult Children of Alcoholics">ACA</acronym> meetings are fully self-supporting and do not affiliate with any outside entity. <acronym title="Adult Children of Alcoholics">ACA</acronym> is an autonomous Twelve Step fellowship. <acronym title="Adult Children of Alcoholics">ACA</acronym> meetings are not Al-Anon ACoA meetings.</p>
		<p>A chairperson or group secretary usually arrives at the <acronym title="Adult Children of Alcoholics">ACA</acronym> meeting early and sets up the meeting. Chairs are arranged and refreshments may be made available. The chairperson hands out the opening reading materials as others arrive. Reading is voluntary, so no one is pressured to read or speak at the meeting. However, we watch for newer members showing up and ask them to help out the reading to get them involved in the group. The items that are generally read at the opening of the meeting are: 
			<a href="/literature/#literature_laundry_list">The Laundry List</a> (Problem), 
			<a href="/literature/#literature_solution">The Solution</a>, 
			the <a href="/literature/#literature_steps">12 Steps</a>, 
			the 12 Traditions, 
			and the <a href="/literature/#literature_promises"><acronym title="Adult Children of Alcoholics">ACA</acronym> Promises</a>. 
			
			Read more about these <a href="/literature/">five pieces of foundational literature</a>.</p>
			
			
			<h3>Other meeting format types</h3>
			
			<ul class="list-normal">
				<li><strong>Closed Meeting/Open Meeting:</strong> Many <acronym title="Adult Children of Alcoholics">ACA</acronym> groups hold closed meetings, which means the meeting is reserved for those identifying as an adult child. Guests are asked to attend an open meeting, which is open to friends and relatives of the adult child. For some <acronym title="Adult Children of Alcoholics">ACA</acronym> members, closed meetings offer a sense of safety and stronger identification among those sharing or speaking at the meeting.</li>

			<li><strong>Step Study:</strong> <acronym title="Adult Children of Alcoholics">ACA</acronym> groups that thrive and grow typically focus on reading and studying the <acronym title="Adult Children of Alcoholics">ACA</acronym> Twelve Steps. The <acronym title="Adult Children of Alcoholics">ACA</acronym> basic text you are reading offers an extended study of the Twelve Steps in Chapter Seven. Additionally, <acronym title="Adult Children of Alcoholics">ACA</acronym> offers a Twelve Step Workbook, which further details how to work the Twelve Steps. Chapter Seven or the Workbook can be read and discussed in <acronym title="Adult Children of Alcoholics">ACA</acronym> meetings. Typically, an <acronym title="Adult Children of Alcoholics">ACA</acronym> group will begin with Step One and read a portion of the Step at each meeting. By this method, the Steps are read and studied during many weeks.</li>

			<li><strong><acronym title="Adult Children of Alcoholics">ACA</acronym> Twelve Traditions Study:</strong> Our experience shows that <acronym title="Adult Children of Alcoholics">ACA</acronym> groups are strengthened when their members read and discuss the Twelve Traditions. <acronym title="Adult Children of Alcoholics">ACA</acronym> groups usually study one Tradition a month with the number of the Tradition corresponding to the number of a given month. For example, Tradition One would be read and discussed during one meeting in January. Tradition Two would be discussed in February and so on. The Twelve Traditions can be found in Chapter Nineteen.</li>

			<li><strong>Newcomer/Beginner Introductory Meeting:</strong> Many newcomers have expressed confusion over what they should be doing in the <acronym title="Adult Children of Alcoholics">ACA</acronym> program. Many have suggested that the group offer an introductory meeting to newcomers. While we don’t want to separate newer members from the main meeting, some <acronym title="Adult Children of Alcoholics">ACA</acronym> groups ask newcomers if they would like an introductory meeting in another room. If so, the newer person will accompany two group members to another room to learn about the basics of the <acronym title="Adult Children of Alcoholics">ACA</acronym> program.<br /><br />

			<acronym title="Adult Children of Alcoholics">ACA</acronym> members explaining the program to a newcomer should use a copy of The Laundry List (Problem) and the <acronym title="Adult Children of Alcoholics">ACA</acronym> First Step. It is not necessary to cover all Twelve Steps during an introductory meeting, but emphasize working the Steps with a sponsor. Most newcomers need to know about the disease of family dysfunction and the effects of growing up in a dysfunctional home. The Six Suggestions of Recovery are also a topic of discussion.</li>

			<li><strong>Writing Meeting:</strong> Each member of the meeting writes for twenty minutes on a given topic or one of the Twelve Steps. What was written is read aloud and shared with the group.</li>

			<li><strong>Small Groups:</strong> After opening the meeting together as a large group, the meeting is divided into smaller discussion groups to allow everyone the chance to share. The smaller groups may rejoin one another at a specific time to close the meeting together; or each small group may end its meeting when the meeting time ends.</li>

			<li><strong>Speaker Meeting:</strong> The chairperson shares for 10 minutes on a recovery topic. Then one or two <acronym title="Adult Children of Alcoholics">ACA</acronym> speakers share for a total of 20 minutes. This is followed by open sharing among the group members.</li>

			<li><strong>Birthday Meeting:</strong> Usually occurs once a month. In addition to handing out monthly recovery chips, <acronym title="Adult Children of Alcoholics">ACA</acronym> groups give away yearly medallions that represent a person’s length of time attending <acronym title="Adult Children of Alcoholics">ACA</acronym> meetings. The group usually has a speaker who shares his or her story during the meeting. The medallions are handed out at the end of the meeting. Some groups serve a birthday cake or refreshments at this monthly meeting.</li>

			<li><strong>Panel Discussion:</strong> Three or more speakers form a panel, and each shares for 10 to 15 minutes for the first half of the meeting. The remainder of the meeting is allocated to open sharing or question and answers.</li>
		<ul>
			
			
	</div>
	<? */ ?>
</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>
<?php
mysql_free_result($meetings_milwaukee);
mysql_free_result($meetings_indiana);
mysql_free_result($meetings_chicago);
?>
