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

$unixdate_now_pre = date('Y-m-');
$unixdate_now_day = (date('d') - 1);
$unixdate_now_post = date(' G:i:s');
$unixdate_now = $unixdate_now_pre.$unixdate_now_day.$unixdate_now_post;

$colname_event = $unixdate_now;

mysql_select_db($database_wgli_admin, $wgli_admin);
$query_event = sprintf("SELECT *, UNIX_TIMESTAMP(when_start) AS unixdate_when_start, UNIX_TIMESTAMP(when_end) AS unixdate_when_end FROM events WHERE when_start < %s AND active = 'y' AND local = 'y' ORDER BY when_start DESC", GetSQLValueString($colname_event, "date"));
$event = mysql_query($query_event, $wgli_admin) or die(mysql_error());
$row_event = mysql_fetch_assoc($event);
$totalRows_event = mysql_num_rows($event);



mysql_select_db($database_wgli_admin, $wgli_admin);
$query_event_not_local = sprintf("SELECT *, UNIX_TIMESTAMP(when_start) AS unixdate_when_start, UNIX_TIMESTAMP(when_end) AS unixdate_when_end FROM events WHERE when_start < %s AND active = 'y' AND local = 'n' ORDER BY when_start DESC", GetSQLValueString($colname_event, "date"));
$event_not_local = mysql_query($query_event_not_local, $wgli_admin) or die(mysql_error());
$row_event_not_local = mysql_fetch_assoc($event_not_local);
$totalRows_event_not_local = mysql_num_rows($event_not_local);


?>


<?
	$title = "Past events for Adult Children of Alcoholics in the Chicagoland and Milwaukee areas";
	$section = "events";
	$page = "";
	$description = "";
	$keywords = "";
?>
<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/header.php"; ?>




<div id="main">
		<h1>Past Events</h1>
		<div class="events-index">
			<?php if ($totalRows_event == 0) { // Show if recordset empty ?>
              <p>No events currently listed, check back soon.</p>
  			<?php } else  { ?>
  
  

			<ul class="list-normal">
				<?php do { ?>
                <? 
					$when_start_day = date('Ymd' , $row_event['unixdate_when_start']);
					$when_end_day = date('Ymd' , $row_event['unixdate_when_end']);
				?>
				 <li>
               
                 	<? if ($row_event['title']) { ?>
	                 	<a href="/events/details/?id=<?php echo $row_event['id']; ?>" class="event-index-title">
					   		<strong><?php echo $row_event['title']; ?></strong></a>
					<? } ?>

					<? if ($row_event['where_city_state']) { ?>
                    	- <?php echo $row_event['where_city_state']; ?><br>
                    <? } ?>

                    <strong>
	                    <? echo date('M j, Y' , $row_event['unixdate_when_start']); ?>
						<?
							if ($row_event['unixdate_when_end'] !== NULL) {
								if ($when_start_day !== $when_end_day) {
									echo date(' - M j, Y' , $row_event['unixdate_when_end']);
								}
							} 
						?>
                    </strong> 
                    <br />
					
					<? if ($row_event['synopsis']) { ?>
				    	<?php echo $row_event['synopsis']; ?>
				    <? } ?>

				    </p>
			    </li>
				<?php } while ($row_event = mysql_fetch_assoc($event)); ?>
            </ul>
            
            <?php }  ?>


            
            <?php if ($totalRows_event_not_local == 0) { // Show if recordset empty ?>
              	<?php } else  { ?>

              	<div class="events-not-local">
		  			<h2>Events outside of our region</h2>
					<ul class="list-normal">
						<?php do { ?>
		                <? 
							$when_start_day = date('Ymd' , $row_event_not_local['unixdate_when_start']);
							$when_end_day = date('Ymd' , $row_event_not_local['unixdate_when_end']);
						?>
						 <li>
		               
		                 	<? if ($row_event_not_local['title']) { ?>
			                 	<a href="/events/details/?id=<?php echo $row_event_not_local['id']; ?>" class="event-index-title">
							   		<strong><?php echo $row_event_not_local['title']; ?></strong></a>
							<? } ?>

							<? if ($row_event_not_local['where_city_state']) { ?>
		                    	-  <strong><?php echo $row_event_not_local['where_city_state']; ?> </strong><br>
		                    <? } ?>

		                   
		                    <? echo date('M j, g:ia' , $row_event_not_local['unixdate_when_start']); ?>
							<?
								if ($row_event_not_local['unixdate_when_end'] !== NULL) {
									if ($when_start_day !== $when_end_day) {
										echo date(' - M j, g:ia' , $row_event_not_local['unixdate_when_end']);
									}
								} 
							?>
		                
		                    <br />
							
							<? if ($row_event_not_local['synopsis']) { ?>
						    	<?php echo $row_event_not_local['synopsis']; ?>
						    <? } ?>

						    </p>
					    </li>
						<?php } while ($row_event_not_local = mysql_fetch_assoc($event_not_local)); ?>
		            </ul>

		        </div>
            
            <?php }  ?>

			<ul class="link-group">
				<li><p><strong><a href="mailto:chair@westgreatlakesaca.org" class="link-add">Add your event</a></strong></p></li>
				<li><p><strong><a href="/events/" class="link-add">Upcoming events</a></strong></p></li>
			</ul>	
		</div>
	</div>
</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>
