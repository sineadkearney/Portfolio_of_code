$(function () {
    setNavigation();
});

function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);

    $("#navigation li a").each(function () {
        var href = $(this).attr('href');
        if (path.substring(path.length-href.length) === href) {
            $(this).closest('li').addClass('myActive');
        }
    });
}

function showResult(str) {
	

  if (str.length==0) { 
    //document.getElementById("livesearch").innerHTML="";
    //document.getElementById("livesearch").style.border="0px";
	console.log('empty')
	//console.log($('#livesearch2').data('bs.popover').options.content)
	//$('#livesearch2').data('bs.popover').options.content = '';
	
    $('#livesearch').popover("hide");
	
	
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	console.log('update')
      $('#livesearch').data('bs.popover').options.content = xmlhttp.responseText;
    $('#livesearch').popover("show");
	
	
	  //document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      //document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
  
  SetSearchResultBoxMaxHeight()
}

$('body').on('click', function (e) {
    //did not click a popover toggle or popover
    if ($(e.target).data('toggle') !== 'popover'
        && $(e.target).parents('.popover.in').length === 0) { 
        $('[data-toggle="popover"]').popover('hide');
    }
});

function openSectionIfSearchResult() { //if we have come to this page using the site's "search" feature
    var path = document.URL
	if (path.indexOf("#") != -1) //if the url contains websites.ph#art, #maths, etc
	{
		var section = path.substr(path.indexOf("#")+1)
		$("#"+section+"_content").show();
		console.log(section)
		
		var element = document.getElementById(section+"_header")		
		//element.children[0] is the <span> that is contained within the <h3>
		element.children[0].className = element.children[0].className.replace("plus", "minus");
	}
}

//set the max size of the search result popover based on the width and height of the window
function SetSearchResultBoxMaxHeight() {
  var myWidth = GetWindowWidth();
  var myHeight = GetWindowHeight();

	if (myWidth < 1200)
		$('.popover').css('max-height', myHeight - 400+'px'); //set max height
	else
		$('.popover').css('max-height', myHeight - 100+'px'); //set max height
}

function GetWindowWidth()
{
  var myWidth = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    myWidth = window.innerWidth;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    myWidth = document.documentElement.clientWidth;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    myWidth = document.body.clientWidth;
  }

  return myWidth;
}

function GetWindowHeight()
{
	 var myHeight = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    myHeight = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    myHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    myHeight = document.body.clientHeight;
  }
  
  return myHeight;
}

function SetSearchBoxWidth()
{
	var myWidth = GetWindowWidth();
	if (myWidth < 1200 && myWidth > 1000)
		$('#searchBox').css('width', myWidth - 50+'px');
}

$( document ).ready(function() {

SetSearchBoxWidth()


$("#livesearch")
    .popover({
	placement: 'bottom',
		html: true})

});

