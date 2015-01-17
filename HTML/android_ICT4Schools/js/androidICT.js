

$( document ).ready(function() {

	var test = '<div class="popover popover-medium"><div class="arrow"></div><div class="popover-inner"><div class="popover-content with-scroll"><p></p></div></div></div>'
	var nua = navigator.userAgent;
	var is_android = ((nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 &&     nua.indexOf('AppleWebKit') > -1) && !(nua.indexOf('Chrome') > -1));
	if (is_android) //no scrolling in popover
		test = '<div class="popover popover-medium"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>';

			
			
			
	
	//$('#menu').stickyBar();
	$(".popover-icon")
    .popover({ 
            placement: function(tip, element) {
			//http://stackoverflow.com/questions/10238089/how-can-you-ensure-twitter-bootstrap-popover-windows-are-visible
			//removed "left" and "right", made actualHeight larger, return "bottom" over "top"
    var $element, above, actualHeight, actualWidth, below, boundBottom, boundLeft, boundRight, boundTop, elementAbove, elementBelow, elementLeft, elementRight, isWithinBounds, left, pos, right;
    isWithinBounds = function(elementPosition) {
      return boundTop < elementPosition.top && boundBottom > (elementPosition.top + actualHeight);
    };
    $element = $(element);
    pos = $.extend({}, $element.offset(), {
      width: element.offsetWidth,
      height: element.offsetHeight
    });
    // actualHeight = 140;
	actualHeight = 250; //this the max-height in style.css
    boundTop = $(document).scrollTop();
    boundBottom = boundTop + $(window).height();
    elementAbove = {
      top: pos.top - actualHeight,
    };
    elementBelow = {
      top: pos.top + pos.height,
    };
    above = isWithinBounds(elementAbove);
    below = isWithinBounds(elementBelow);
    if (below) {
      return "bottom";
    } 
	else {
        return "top";
      } 
  },
			html:true,
            toggle : "popover",
            content : "",
            container: 'body',
            template: test,
			// function()
			// {
				// return '<div class="popover popover-medium"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>'
					// var nua = navigator.userAgent;
					// var is_android = ((nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 &&     nua.indexOf('AppleWebKit') > -1) && !(nua.indexOf('Chrome') > -1));
					// if (is_android) //no scrolling in popover
						// return '<div class="popover popover-medium"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>';
					// else //scrolling in popover
						// return '<div class="popover popover-medium"><div class="arrow"></div><div class="popover-inner"><div class="popover-content with-scroll"><p></p></div></div></div>';
			// },
        });
		

	 $('.popover-icon').on('click', function (e) {
    //$('.popover-icon').not(this).popover('hide');
	$('.popover-icon').not(this).popover('hide').next('.popover').remove() 
}); //show one popover at a time

    setNavigation();

});


function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);

    $(".nav li a").each(function () {
   // $("#navigation li a").each(function () {
	
        var href = $(this).attr('href');
        if (path.substring(path.length-href.length) === href) {
            $(this).closest('li').addClass('myActive');
        }
    });
}


function openSearchPage()
{
	var el = document.getElementById("searchTerm");
	var searchTerm = el.value;
	location.href = "search.php?"+searchTerm;
}
