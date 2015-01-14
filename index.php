<?php require_once('Connections/wgli_admin.php');

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

$unixdate_now_year = date('Y');
$unixdate_now_month = date('m');
$unixdate_now_month_3_ago = ($unixdate_now_month - 3);
$unixdate_now_pre = date('Y-m-');
$unixdate_now_day = (date('d') - 1);
$unixdate_now_post = date(' G:i:s');
$unixdate_now = $unixdate_now_pre.$unixdate_now_day.$unixdate_now_post;
$colname_event = $unixdate_now;


$unixdate_3_months_ago = $unixdate_now_year.'-'.$unixdate_now_month_3_ago.'-'.$unixdate_now_day.$unixdate_now_post;



mysql_select_db($database_wgli_admin, $wgli_admin);
$query_event = sprintf("SELECT *, UNIX_TIMESTAMP(when_start) AS unixdate_when_start, UNIX_TIMESTAMP(when_end) AS unixdate_when_end FROM events WHERE when_start > %s AND active = 'y' AND local = 'y' ORDER BY when_start ASC", GetSQLValueString($colname_event, "date"));
$event = mysql_query($query_event, $wgli_admin) or die(mysql_error());
$row_event = mysql_fetch_assoc($event);
$totalRows_event = mysql_num_rows($event);


$colname_ig_meetings = $unixdate_now;
mysql_select_db($database_wgli_admin, $wgli_admin);
$query_ig_meetings = sprintf("SELECT *, UNIX_TIMESTAMP(when_start) AS unixdate_when_start, UNIX_TIMESTAMP(when_end) AS unixdate_when_end FROM intergroup_meetings WHERE when_start > %s AND active = 'y' ORDER BY when_start ASC", GetSQLValueString($colname_ig_meetings, "date"));
$ig_meetings = mysql_query($query_ig_meetings, $wgli_admin) or die(mysql_error());
$row_ig_meetings = mysql_fetch_assoc($ig_meetings);
$totalRows_ig_meetings = mysql_num_rows($ig_meetings);

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_next_ig_meeting = "SELECT *, UNIX_TIMESTAMP(when_start) AS unixdate_when_start, UNIX_TIMESTAMP(when_end) FROM intergroup_meetings WHERE active = 'y' ORDER BY when_start ASC";
$next_ig_meeting = mysql_query($query_next_ig_meeting, $wgli_admin) or die(mysql_error());
$row_next_ig_meeting = mysql_fetch_assoc($next_ig_meeting);
$totalRows_next_ig_meeting = mysql_num_rows($next_ig_meeting);


mysql_select_db($database_wgli_admin, $wgli_admin);
/*  $query_ig_meetings = sprintf("SELECT *, UNIX_TIMESTAMP(when_start) AS unixdate_when_start, UNIX_TIMESTAMP(when_end) AS unixdate_when_end 														   FROM intergroup_meetings WHERE when_start > %s AND active = 'y' ORDER BY when_start ASC", GetSQLValueString($colname_ig_meetings, "date"));*/
$query_news_meetings = sprintf("SELECT *, UNIX_TIMESTAMP(time_start) AS unixdate_time_start, UNIX_TIMESTAMP(date_added) AS unixdate_date_added, id, neighborhood, zone, `day`, time_start, active, date_added FROM meetings WHERE active = 'true' AND date_added > %s ORDER BY date_added ASC", GetSQLValueString($unixdate_3_months_ago, "date"));
$news_meetings = mysql_query($query_news_meetings, $wgli_admin) or die(mysql_error());
$row_news_meetings = mysql_fetch_assoc($news_meetings);
$totalRows_news_meetings = mysql_num_rows($news_meetings);



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
function getState($i) {
	if ($i == 1) {
		print "WI";
	} else if 	($i == 2) {
		print "IL";
	} else if	($i == 3) {
		print "IN";
	} 
}
?>




<div id="main">

	<h1>Adult Children of Alcoholics and Dysfunctional Families</h1>
	<div class="home-definition">
		<p><em>Adult Children of Alcoholics (<acronym title="Adult Children of Alcoholics">ACA</acronym> or <acronym title="Adult Children of Alcoholics">ACoA</acronym>)</em>, is an anonymous 12 Step recovery program for individuals who grew up in alcoholic or otherwise dysfunctional homes.  <acronym title="Adult Children of Alcoholics">ACA</acronym> is founded on the belief that family dysfunction is a disease that affected us as children and continues to influence us as adults.</p>
		<p class="no-margin-bottom"><strong>What is an “Adult Child”?</strong></p>
		<p>An adult child is someone who meets the demands of life with survival techniques learned as children.  Without help, we unknowingly operate with ineffective thoughts and judgments that can sabotage our decisions and relationships.</p>
		<p class="no-margin-bottom"><strong>Who Attends our Meetings?</strong></p>
		<p>ACA is not limited to those from alcoholic homes. If you identify with <a href="/is-aca-for-me/#laundry-list-anchor">traits from this list</a>, ACA may benefit you.</p>
			<p class="home-callout">Our members have found <acronym title="Adult Children of Alcoholics">ACA</acronym> helps them recover from the effects of family dysfunction.  We encourage you to come to a <a href="/meetings/">meeting</a> and <a href="/literature/">read more about <acronym title="Adult Children of Alcoholics">ACA</acronym></a>.</p>
	</div>


	<div class="mc_embed_signup-container right-column-item">
		<!-- Begin MailChimp Signup Form -->
		<div id="mc_embed_signup">
			<form action="http://westgreatlakesaca.us5.list-manage.com/subscribe/post?u=e768a4f50a96837ac67b9edfc&amp;id=08fe31d3e3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<label for="mce-EMAIL">
					Subscribe to our newsletter.
					<a href="http://westgreatlakesaca.us5.list-manage.com/unsubscribe?u=e768a4f50a96837ac67b9edfc&id=08fe31d3e3" class="small">Unsubscribe</a>.
				</label>
				<!-- <span class="hide show-subscribe-newsletter-target"> -->
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
					<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="cta">
				<!-- </span> -->
			</form>
		</div>
		<!--End mc_embed_signup-->
	</div>

	<div class="home-event-callout">
		<?php if ($totalRows_event > 0) { // Show if recordset empty ?>
   		<h4 class="first">Events</h4>
			<ul class="list-no-indent">
				<?
					$display_limit = 1;
					$series1_count = 0;
					$series2_count = 0;
					$series3_count = 0;
					$series1 = 0;
					$series2 = 0;
					$series3 = 0;
				?>
				<?php do { ?>
				<?
						$when_start_day = date('Ymd' , $row_event['unixdate_when_start']);
						$when_end_day = date('Ymd' , $row_event['unixdate_when_end']);

						// Is this a series
						if ($row_event['series']) {
							// Define the series numbers
							// Has Series1 been set?
							if ($series1 == 0) {
								$series1 = $row_event['series'];

							// Has Series2 been set? And is not Series 1?
							} else if ($series2 == 0 && $row_event['series'] <> $series1 ) {
								$series2 = $row_event['series'];

							// Has Series3 been set? And is not Series 1 or 2?
							} else if ($series3 == 0) {
								$is_series1_or_series2 = "n";
								if ($row_event['series'] == $series1 ) {
									$is_series1_or_series2 = "y";
								} else if ($row_event['series'] == $series2 ) {
									$is_series1_or_series2 = "y";
								}

								if ($is_series1_or_series2 == "n") {
									$series3 = $row_event['series'];
								}
							}

							// Is the count in this series past the "show" limit?
							if ($series1 == $row_event['series']) {
								$series1_count++;
								if ($series1_count > $display_limit) {
									$hide = "y";
								} else {
									$hide = "n";
								}
							}

							// Is the count in this series past the "show" limit?
							if ($series2 == $row_event['series']) {
								$series2_count++;
								if ($series2_count > $display_limit) {
									$hide = "y";
								} else {
									$hide = "n";
								}
							}

							// Is the count in this series past the "show" limit?
							if ($series3 == $row_event['series']) {
								$series3_count++;
								if ($series3_count > $display_limit) {
									$hide = "y";
								} else {
									$hide = "n";
								}
							}

						} else {
							$hide = "n";
						}

						if ($hide == "n") {
					?>

				 <li>

				 	<? if ($row_event['title']) { ?>
	                 	<a href="/events/details/?id=<?php echo $row_event['id']; ?>"><strong><?php echo $row_event['title']; ?></strong></a><br/>
					<? } ?>


                    <?
                    	echo date('M j' , $row_event['unixdate_when_start']);
						if ($row_event['when_start'] !== NULL && $row_event['when_end'] !== NULL) {
							if ($when_start_day !== $when_end_day) {
								if (date('M', $row_event['unixdate_when_start']) == date('M', $row_event['unixdate_when_end'])) {
									echo date('-j' , $row_event['unixdate_when_end']);
								} else {
									echo date(' - M j' , $row_event['unixdate_when_end']);
								}
							}
						}

                    	if ($row_event['where_city_state']) {
	                    	print ", ";
	                    	echo $row_event['where_city_state'];
	                    	print "<br>";
	                     }
                     ?>






			    </li>

			    <? } /* Series "if" */ ?>
				<?php } while ($row_event = mysql_fetch_assoc($event)); ?>
            </ul>

            <?php }  ?>










<?php if ($totalRows_event == 0) { $class_first = 'class="first"';} ?>
		<h4 <?=$class_first?>>Local ACA &amp; Intergroup News</h4>
		<ul class="list-no-indent">




<?php if ($totalRows_news_meetings > 0) { // Show if recordset empty ?>
		<li>
			<p><strong>New Meetings Listed:</strong></p>
			<ul class="list-normal list-secondary  list-normal-size list-single-space ">
	<?php do { ?>
				<li>
					<a href="#meeting-id-<?=$row_news_meetings['id']?>" class="meeting-cta">
						<?=$row_news_meetings['neighborhood']?>,
						<?getState($row_news_meetings['zone'])?> &ndash;
						<?getDayNames($row_news_meetings['day'])?>, 
						<?=date('g:ia' , $row_news_meetings['unixdate_time_start'])?>
					</a>
				</li>
  <?php } while ($row_news_meetings = mysql_fetch_assoc($news_meetings)); ?>
  			</ul>
		</li>
<? } ?>




	
			


			<li>

				<p>
					<strong>Next Intergroup meeting:</strong><br />
					<?php
				    	echo date('M j, g', $row_ig_meetings['unixdate_when_start']);
				    	echo date('-ga', $row_ig_meetings['unixdate_when_end']);
			    	?>
					<? if ($row_ig_meetings['where_name'] == NULL) { ?>
						, conference call:<br />
						<?=$row_ig_meetings['call_info']?>
				    <? } else { ?>
				    	<br>
				    	<a href="<?php echo $row_ig_meetings['map_url']; ?>" target="_blank">
					      <?php echo $row_ig_meetings['where_name']; ?>
				        </a>
				    <? } ?>
					<br />Visitors welcome
				</p>

			</li>

		</ul>


		<h4>Global ACA News</h4>
		<ul class="list-no-indent">
			<li  class="link-meditation-book">
				<p><strong>
					 <a href="http://www.shop.adultchildren.org/Strengthening-My-Recovery-100-8.htm" target="_blank">New ACA Meditation Book Available</a><br>
					</strong>
					Written by ACAs, incuding some from our region.

				</p>
			</li>

			<li  class="link-red-book">
				<p>- <strong>Red Book is now an eBook</strong>:
					 <a href="http://www.amazon.com/CHILDREN-ALCOHOLICS-DYSFUNCTIONAL-FAMILIES-ebook/dp/B008YH705E/ref=sr_1_3?s=digital-text&ie=UTF8&qid=1346814607&sr=1-3&keywords=adult+children+of+alcoholics" target="_blank">Amazon</a> and <a href="http://www.barnesandnoble.com/w/adult-children-of-alcoholics-dysfunctional-families-aca-wso-inc/1112610318" target="_blank">Barnes and Noble</a><br>
					- <strong>Audiobook</strong> coming soon.<br>
					- <strong>Spanish</strong> version coming soon.
				</p>
			</li>


		</ul>
	</div>




	<h2>Meetings</h2>
<iframe width="560" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=42.5207,-88.379517&amp;spn=2.226732,3.076172&amp;z=8&amp;output=embed"></iframe><br /><small>View <a href="https://www.google.com/maps/ms?msa=0&amp;msid=214133927203785504508.0004a839414370c0c6e64&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=42.5207,-88.379517&amp;spn=2.226732,3.076172&amp;z=8&amp;source=embed" style="color:#0000FF;text-align:left">Adult Children of Alcoholic Meetings - West Great Lakes</a> in a larger map</small>


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
							if ($row_meetings_chicago['name']) { print '“'; echo $wso_id_pre; echo $row_meetings_chicago['name']; echo $wso_id_post; print "”<br />";}
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
				<strong><a href="/pdf/meetings-printable/ACA-Meetings-Chicago-Indiana-Wisconsin-2013-07-07.pdf" target="_blank" class="link-print">Printable meeting list</a></strong><br />
				<strong><a href="mailto:webmaster@westgreatlakesaca.org" class="link-add">Add a meeting</a></strong>
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
						  <? if ($row_meetings_milwaukee['wso_id']) {
						      $wso_id_pre = '<a href="javascript:void(0)" title="WSO ID: '.$row_meetings_milwaukee['wso_id'].'" class="wso-id">';
						      $wso_id_post = '</a>';
						  } else {
						    $wso_id_pre = '';
						    $wso_id_post = '';
						  } ?>
						<?=$wso_id_pre?>
						<strong>
						<? getDayNames($row_meetings_milwaukee['day']); ?>
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
						<div class="info-more">
							<?
								if ($row_meetings_milwaukee['name']) { print '<div class="meeting-name">“'; echo $wso_id_pre; echo $row_meetings_milwaukee['name']; echo $wso_id_post; print "”</div>";}
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
				<p class="meeting-ctas">
					<strong><a href="/pdf/meetings-printable/ACA-Meetings-Chicago-Indiana-Wisconsin-2013-07-07.pdf" target="_blank" class="link-print">Printable meeting list</a></strong><br />
					<strong><a href="mailto:webmaster@westgreatlakesaca.org" class="link-add">Add a meeting</a></strong>
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
						  <? if ($row_meetings_indiana['wso_id']) {
						      $wso_id_pre = '<a href="javascript:void(0)" title="WSO ID: '.$row_meetings_indiana['wso_id'].'" class="wso-id">';
						      $wso_id_post = '</a>';
						  } else {
						    $wso_id_pre = '';
						    $wso_id_post = '';
						  } ?>
						<?=$wso_id_pre?>
						<strong>
						<? getDayNames($row_meetings_indiana['day']); ?>
							 	<?
	   						  echo date('g:i' , $row_meetings_indiana['unixdate_time_start']);
	   						  if ($row_meetings_indiana['unixdate_time_end'] !== NULL) {
	   						    echo date('-g:ia' , $row_meetings_indiana['unixdate_time_end']);

	   						  } else {
	   						    echo date('a' , $row_meetings_indiana['unixdate_time_start']);
	   						  }
	   						?>
							<? if ($row_meetings_indiana['host']) {print "</strong>  - <strong> "; echo $row_meetings_indiana['host']; } ?>
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
						<div class="info-more">
							<?
								if ($row_meetings_indiana['name']) { print '<div class="meeting-name">“'; echo $wso_id_pre; echo $row_meetings_indiana['name']; echo $wso_id_post; print "”</div>";}
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
				<p class="meeting-ctas">
					<strong><a href="/pdf/meetings-printable/ACA-Meetings-Chicago-Indiana-Wisconsin-2013-07-07.pdf" target="_blank" class="link-print">Printable meeting list</a></strong><br />
					<strong><a href="mailto:webmaster@westgreatlakesaca.org" class="link-add">Add a meeting</a></strong>
				</p>
			</div>

		</div>

	</div>




</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>
<?php
mysql_free_result($next_ig_meeting);
?>
