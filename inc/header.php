<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta http-equiv="imagetoolbar" content="false" />
	<meta http-equiv="MSSmartTagsPreventParsing" content="true" />
	<meta http-equiv="robots" content="all" />
	
	<title><? if ($title) { echo $title; } else { print "Adult Children of Alcoholics and Dysfunctional Families (ACA or ACoA) - West Great Lakes Intergroup - Chicagoland, SE Wisconsin, NE Indiana";} ?></title>
	<meta name="description" content="<? if ($description) { echo $description; } else { print 'Meetings and information for Adult Children of Alcoholics (ACA or ACoA) and Dysfunctional Families in Chicago Illinois and suburbs, Milwaukee, Wisconsin, and northwest Indiana';} ?>" />
	<meta name="keywords" content="<? if ($keywords) { echo $keywords; } else { print 'adult children of alcoholics, dysfunction, families, abuse, neglect, aca, acoa, ptsd, post traumatic stress disorder, meetings, higher power, god, help, 12 steps, twelve, drug, religious, serenity prayer, recovery';} ?>" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="icon" href="favicon.ico" />
	<link rel="stylesheet" href="/css/screen.css?v=1" type="text/css" media="all" />
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="/css/ie7.css" type="text/css" media="all" />
	<![endif]-->
</head>
<?php flush(); ?>

<body <? if ($section) {echo 'class="section-'.$section.'"';} ?> <? if ($page) {echo 'id="page-'.$page.'"';} ?>>
	<div id="skip"><a href="#content" title="Skip to content">Skip to content</a></div>
	<div id="container">
		<div id="header">
			
			<a href="/" title="Go to home page" class="wgli-logo" >
				<object data="/images/logos/aca-logo.svg" class="vector" height="89" width="120">
					<img src="/images/logos/wgli-logo-hi-dpi.png" alt="ACA logo" class="wgli-logo" />
				</object>
			</a>



			<div class="hgroup">	
				<h4>West Great Lakes <acronym title="Adult Children of Alcoholics">ACA</acronym> Intergroup</h4>
				<h3>Chicagoland, SE Wisconsin, NW Indiana</h3>
				<h2>Adult Children of Alcoholics and Dysfunctional Families</h2>
			</div>
		</div><!-- /#header -->
		<ul id="nav" role="navigation">
			<li class="primary <? if ($section == "home") {print 'on';}?>">
				<a href="/">Home</a>
			</li>
			<li class="primary <? if ($section == "meetings") {print 'on';}?>">
				<a href="/meetings/">Meetings</a>
			</li>
			<li class="primary <? if ($section == "is_aca_for_me") {print 'on';}?>">
				<a href="/is-aca-for-me/">Is <acronym title="Adult Children of Alcoholics">ACA</acronym> For Me?</a>
			</li>
			<li <? if ($section == "faqs") {print ' class="on"';}?>>
				<a href="/faqs/">FAQs</a>
			</li>
			<li <? if ($section == "literature") {print ' class="on"';}?>>
				<a href="/literature/">Literature</a>
			</li>
			<li <? if ($section == "events") {print ' class="on"';}?>>
				<a href="/events/">Events</a>
			</li> 
			<li <? if ($section == "personal-recovery-stories") {print ' class="on"';}?>>
				<a href="/personal-recovery-stories/">Recovery Stories</a>
			</li>
			<li <? if ($section == "about") {print ' class="on"';}?>>
				<a href="/about/">About</a>
			</li>
			<li <? if ($section == "contact") {print ' class="on"';}?>>
				<a href="/contact/">Contact</a>
			</li>
		</ul>

		<div id="content">