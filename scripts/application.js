/**
Vertigo Tip by www.vertigo-project.com
Requires jQuery
*/

function initiateToolTip() {
  this.vtip=function(){this.xOffset=-10;this.yOffset=10;$(".vtip").unbind().hover(function(a){this.t=this.title;this.title="";this.top=(a.pageY+yOffset);this.left=(a.pageX+xOffset);$("body").append('<p id="vtip"><img id="vtipArrow" />'+this.t+"</p>");$("p#vtip #vtipArrow").attr("src","images/vtip_arrow.png");$("p#vtip").css("top",this.top+"px").css("left",this.left+"px").fadeIn("fast")},function(){this.title=this.t;$("p#vtip").fadeOut("fast").remove()}).mousemove(function(a){this.top=(a.pageY+yOffset);this.left=(a.pageX+xOffset);$("p#vtip").css("top",this.top+"px").css("left",this.left+"px")})};jQuery(document).ready(function(a){vtip()});
}

var utilities = {
	addToolTipACAsOnly : function() {
	    var strNewString = $('#main').html().replace(/\ACAs only/g,'<span title="Reserved for those identifying an &ldquo;adult child&rdquo;. Those coming for education or research (for example) are welcome at other meetings." class="vtip">ACAs only</span>');
	    $('#main').html(strNewString);
	}
}

var AnimateMapWithScrolling = function(mapID,mapContainerID) {
    var mapID = mapID,
      mapContainerID = mapContainerID,
      mapPaddingTop = 0,
      mapPaddingBottom = 40,
      heightOfMap = $(mapID).height(),
      heightOfContainer,
      distanceFromTopOfContainer,
      startAnimatingMap,
      stopAnimatingMap,
      positonMapAtWindowTop,
      positonMapAtContainerTop = 0,
      positonMapAtContainerBottom,
      measurements;
    
  // Are we scrolling?
  $(window).scroll(function() {
      measurements = getMeasurements();
      animateMap();
  });
    
  // Update the measurements and positions of elements    
  getMeasurements = function() {
        var distanceFromTopOfContainer = $(mapContainerID).offset(),
            heightOfContainer = $(mapContainerID).height(),
            startAnimatingMap = distanceFromTopOfContainer.top,
            positonMapAtContainerBottom = heightOfContainer - heightOfMap - mapPaddingBottom,
            stopAnimatingMap = startAnimatingMap + (positonMapAtContainerBottom - mapPaddingTop);       
        return {
          distanceFromTopOfContainer : distanceFromTopOfContainer,
          heightOfContainer : heightOfContainer,
          startAnimatingMap : startAnimatingMap,
          positonMapAtContainerBottom : positonMapAtContainerBottom,
          stopAnimatingMap : stopAnimatingMap
      }
  }
  
  // Reposition the map                
  animateMap = function() {
    var scrollPosition =  $(window).scrollTop();  
    measurements.positonMapAtWindowTop = (scrollPosition - measurements.startAnimatingMap) + mapPaddingTop;    

    // Are we scrolling within map container?
    if (scrollPosition > measurements.startAnimatingMap && scrollPosition < measurements.stopAnimatingMap) {
        // Put the top of the map to the top of the screen
        animateMapPosition(measurements.positonMapAtWindowTop);
    // After exiting map container, position map at edge of container
    } else {
        // Below map container? Position at bottom.
        if (scrollPosition > measurements.stopAnimatingMap) {
            animateMapPosition(measurements.positonMapAtContainerBottom);
        // Above map container? Position at top.
        } else if (scrollPosition < measurements.startAnimatingMap) {
            animateMapPosition(positonMapAtContainerTop);
        }
    }
  }  
  
  animateMapPosition = function(postion) {
      $(mapID).stop().animate({
          marginTop: postion
      },300);
  }
 };



$(document).ready(function() {

   	
	// Search for where it says "ACAs only" and add a tooltip to it.
	utilities.addToolTipACAsOnly();
	
	
	// Clear & Refill fields
	//autoFill($("#realname"), "Name");

	function autoFill(id, v){
		$(id).css({ color: "#b2adad" }).attr({ value: v }).focus(function(){
			if($(this).val()==v){
				$(this).val("").css({ color: "#333" });
			}
		}).blur(function(){
			if($(this).val()==""){
				$(this).css({ color: "#b2adad" }).val(v);
			}
		});
	}	
	
	// Open external links in new windows
	$(function() { 
		$('a[href^=http]').click( function() {
			window.open(this.href);
			return false;
		});
	});
	

	
	
	$('.more-info-cta').click(function() {
		$(this).hide();
		$(this).parent().next().show();
	});

	
	
	$('.more-info-all-show').click(function() {
		$('#main').removeClass('hide-all-details');
		$('.more-info-cta').hide();
		$('.info-more').show();
	});
	
	$('.more-info-all-hide').click(function() {
		$('#main').addClass('hide-all-details');
		$('.more-info-cta').show();
		$('.info-more').hide();
	});
	
	$('#meeting-id-26-cta').click(function() {
		$('#meeting-id-26').children('.info-more').show();
	});
	
	$('#meeting-id-27-cta').click(function() {
		$('#meeting-id-27').children('.info-more').show();
	});

	$('#meeting-id-28-cta').click(function() {
		$('#meeting-id-28').children('.info-more').show();
	});

	$('#meeting-id-12-cta').click(function() {
		$('#meeting-id-12').children('.info-more').show();
	});
	
	
	
	
	
	$('#page-meetings #main, #page-home #main').addClass('hide-all-details');
	
	$('.show-this').hide();



	$('.show-next-target').hide();
	$('.show-next').click(function() {
		$(this).next().slideDown();
		$(this).hide();
	});




	
	
	/*$('a[rel="external"], a[rel="document"]').click(function (event) {
			event.preventDefault();
			window.open($(this).attr('href'));
			return false;
		});
	*/
	
	initiateToolTip();

});