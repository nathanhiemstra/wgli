<?
	$title = "Subscribe to the West Great Lakes ACA Intergroup newsletter";
	$section = "mailing-list";
	$page = "mailing-list-subscribe";
	$description = "Subscribe from the West Great Lakes ACA Intergroup Newsletter ";
	$keywords = "intergroup, meetings, newsletter, representatives, find, search, news, aca, acoa, Adult Children of Alcoholics, Dysfunctional Families";
?>
<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/header.php"; ?>




<div id="main" class="left-column-item">

<h1>Newsletter</h1>


<div class="mc_embed_signup-container">
		<!-- Begin MailChimp Signup Form -->
		<div id="mc_embed_signup">
			<form action="http://westgreatlakesaca.us5.list-manage.com/subscribe/post?u=e768a4f50a96837ac67b9edfc&amp;id=08fe31d3e3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<label for="mce-EMAIL">Subscribe to our newsletter</label>
				<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
				<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="cta">
			</form>
		</div>
		<!--End mc_embed_signup-->

	</div>
<p>We send newsletters about once a month telling of new <a href="/meetings/">meetings</a>, meeting news, <a href="/events/">local ACA events</a> and news, and <a href="http://www.adultchildren.org/">global ACA news</a>.</p>
<p><strong><a href="http://westgreatlakesaca.us5.list-manage.com/unsubscribe?u=e768a4f50a96837ac67b9edfc&id=08fe31d3e3" class="link-secondary">Unsubscribe</a></strong></p>


<h2>Past Newsletters</h2>
<ul class="list-normal list-single-space">
	<li><a href="/mailing-list/past/2013-12-23/" target="_blank">December 23, 2013</a></li>
	<li><a href="/mailing-list/past/2013-10-16/" target="_blank">October 16, 2013</a></li>
	<li><a href="/mailing-list/past/2013-06-21/" target="_blank">June 21, 2013</a></li>
	<li><a href="/mailing-list/past/2013-04-11/" target="_blank">April 11, 2013</a></li>
</ul>




</div><!-- /#main -->


<div id="aside-footer">

</div><!-- /#aside-footer -->





<?php include "".$_SERVER["DOCUMENT_ROOT"]."/inc/footer.php"; ?>


<script>

function resizeIframe(newHeight) {
    document.getElementById('newsletter-past').style.height = parseInt(newHeight,10) +  'px';
}

console.log("height" );

// $('iframe').load(function() {
//     //this.style.height = this.contentWindow.document.body.offsetHeight + 'px';
//     console.log("height"  + 'px');
// });

// $('iframe').load(function() {
//     setTimeout(iResize, 50);
//     // Safari and Opera need a kick-start.
//     var iSource = document.getElementById('newsletter-past').src;
//     document.getElementById('newsletter-past').src = '';
//     document.getElementById('newsletter-past').src = iSource;
// });
// function iResize() {
//     document.getElementById('newsletter-past').style.height = 
//     document.getElementById('newsletter-past').contentWindow.document.body.offsetHeight + 'px';
// }

</script>
