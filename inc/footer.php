			</div>
		</div>
		<ul id="footer">
			<li><a href="/privacy-policy/" <? if ($section == "privacy-policy") {print ' class="on"';}?>>Privacy Policy</a></li>
			<li><a href="/terms-of-use/" <? if ($section == "terms-of-use") {print ' class="on"';}?>>Terms of Use</a></li>
			<li>&copy; 2011-<?=date('Y')?> West Great Lakes ACA Intergroup - P.O. Box 2124, Bolingbrook, IL 60440</li>
		</ul>
		<script type="text/javascript" src="/scripts/jquery.pack.js"></script>
		<script type="text/javascript" src="/scripts/application.js"></script>	
<? if ($page = "meetings") {?>
		<script>
			$(document).ready(function() {
				AnimateMapWithScrolling('#map-chicago','#meeting-zone-chicago');
			});
		</script>	
<? } ?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-24712951-1']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
	</body>
</html>
