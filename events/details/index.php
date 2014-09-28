<?php require_once('../../Connections/wgli_admin.php');  ?>
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

$colname_event = "-1";
if (isset($_GET['id'])) {
  $colname_event = $_GET['id'];
}
mysql_select_db($database_wgli_admin, $wgli_admin);
$query_event = sprintf("SELECT *, UNIX_TIMESTAMP(when_start) AS unixdate_when_start, UNIX_TIMESTAMP(when_end) AS unixdate_when_end FROM events WHERE id = %s", GetSQLValueString($colname_event, "int"));
$event = mysql_query($query_event, $wgli_admin) or die(mysql_error());
$row_event = mysql_fetch_assoc($event);
$totalRows_event = mysql_num_rows($event);
?>
<?
	$title = $row_event['title']." - ".$row_event['where_city_state'];
	$section = "events";
	$page = "";
	$description = "";
	$keywords = "";
?>
<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/header.php"; ?>




<div id="main">
		<h1 class="no-margin-bottom">
			<span class="visuallyhidden">Event: </span>
			<?php echo $row_event['title']; ?>
		</h1>
		<p class="sponsor"><?php echo $row_event['sponsor']; ?></p>
		<div class="event-item">
		<div class="event-item-content">

			<dl class="event-item-details-list">
				<? if ($row_event['what_description']) {?>
					<dt class="event-item-details-list-term first">
						What:
					</dt>
					<dd class="event-item-details-list-definition first">
						<?php echo $row_event['what_description']; ?>
					</dd>
				<? } ?>



				<? if ($row_event['unixdate_when_start']) {?>
					<dt class="event-item-details-list-term">
						When:
					</dt>
					<dd class="event-item-details-list-definition">
						<strong>
							<?
								$when_start_day = date('Ymd' , $row_event['unixdate_when_start']);
								$when_end_day = date('Ymd' , $row_event['unixdate_when_end']);

								// If it's midnight, it's 00:00:00 in the DB, which means it's not set.
								if (date('gi' , $row_event['unixdate_when_start']) !== "1200") {
									$when_start_time = date(', g:ia' , $row_event['unixdate_when_start']);
								}

								echo date('l, M j, Y' , $row_event['unixdate_when_start']);
								echo $when_start_time;

								if ($row_event['unixdate_when_end'] !== NULL) {
									if ($when_start_day == $when_end_day) {
										echo date(' - g:ia' , $row_event['unixdate_when_end']);
									} else {
										echo date(' - l, M j' , $row_event['unixdate_when_end']);
										if ($when_start_time) {
											echo date(', g:ia' , $row_event['unixdate_when_end']);
										}
									}
								}
							?>

						</strong>
						<?  if ($row_event['when_details']) { ?>
							<br><?=$row_event['when_details']?>
						<? } ?>
					</dd>
				<? } ?>


				<dt class="event-item-details-list-term">
					Where:
				</dt>
				<dd class="event-item-details-list-definition">
					<p>
						<a href="<?php echo $row_event['map_url']; ?>" target="_blank">
							<strong><?php echo $row_event['where_host']; ?></strong><? if ($row_event['where_host']) { print "<br>"; } ?>
							<?php echo $row_event['where_address']; ?><? if ($row_event['where_address']) { print "<br>"; } ?>
							<?php echo $row_event['where_city_state']; ?>
						</a>
					</p>
					<?php echo $row_event['where_description']; ?>
				</dd>

				<? if ($row_event['who']) {?>
					<dt class="event-item-details-list-term">
						Who:
					</dt>
					<dd class="event-item-details-list-definition">
						<?php echo $row_event['who']; ?>
					</dd>
				<? } ?>


				<? if ($row_event['cost']) {?>
					<dt class="event-item-details-list-term">
						Cost:
					</dt>
					<dd class="event-item-details-list-definition">
						<?php echo $row_event['cost']; ?>
					</dd>
				<? } ?>

				<? if ($row_event['questions']) {?>
				<dt class="event-item-details-list-term">
					Questions?
				</dt>
				<dd class="event-item-details-list-definition">
					<?php echo $row_event['questions']; ?>
				</dd>
				<? } ?>

				<? if ($row_event['rsvp'] == "" && $row_event['flyer_url'] == "") {} else {?>
					<dt  class="event-item-details-list-term event-item-flyer">
						<? if ($row_event['rsvp']) {?>
							<div class="event-item-details-rsvp"><?php echo $row_event['rsvp']; ?></div>
						<? } ?>
						<? if ($row_event['flyer_url']) {?>
							<a href="<?php echo $row_event['flyer_url']; ?>" target="_blank" class="<?php if ($row_event['flyer_link_class']) {echo $row_event['flyer_link_class'];} else { print "cta"; } ?>">Download a flyer for your meeting</a>
						<? } ?>
					</dt>
				<? } ?>
			</dl>
			<div class="aside">
				<? if ($row_event['poster_url']) {?>
					<img src="<?php echo $row_event['poster_url']; ?>" width="325" class="illustration">
				<? } ?>
				<?php echo $row_event['map_embedded']; ?>
			</div>
		</div>
		<ul class="link-group">
			<li><p class="no-margin-bottom"><strong><a href="mailto:chair@westgreatlakesaca.org" class="link-add">Add your event</a></strong></p></li>
			<li><p><strong><a href="/events/" class="link-secondary">More events</a></strong></p></li>
		</ul>

	</div>

</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>
<?php
mysql_free_result($event);
?>
