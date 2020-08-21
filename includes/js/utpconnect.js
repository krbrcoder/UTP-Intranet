$( document ).ready(function() {

  // SVG Fallback Replacement
  // https://css-tricks.com/a-complete-guide-to-svg-fallbacks/

  function svgasimg() {
    return document.implementation.hasFeature(
      "http://www.w3.org/TR/SVG11/feature#Image", "1.1");
  }

  if (!svgasimg()){
    var e = document.getElementsByTagName("img");
    if (!e.length){
      e = document.getElementsByTagName("IMG");
    }
    for (var i=0, n=e.length; i<n; i++){
      var img = e[i],
          src = img.getAttribute("src");
      if (src.match(/svgz?$/)) {
        /* URL ends in svg or svgz */
        img.setAttribute("src",
               img.getAttribute("data-fallback"));
      }
    }
  }

  // gravity forms customization
  $('input.gform_button.button').addClass('ui orange');


  //////////////////////////////////////////////////////////////////////
  ////////////////////     REST API FOR UTPhysicians.com //////////////
  ////////////////////////////////////////////////////////////////////

  // globals shared between wpapi_get_posts & card_article_list
  var selector="";
  var imagecount=0;
  var jsonresult=[];
  var httpproto;
  var hostname=location.hostname;

  if (hostname.indexOf('local') !== -1){
      httpproto="http://";
    }else{
      httpproto="https://";
  };

 //wp rest api jquery ajax request
  function wpapi_get_posts( apiurl, elementid, numimages ) {
    var wpAPIrequest = $.getJSON( apiurl , function(result){
      selector = elementid;
      imagecount= numimages;
      jsonresult = result;
      card_article_list();
    })
      .done(function() {
        //callback when request complete
        console.log(jsonresult);
      })
      .fail(function() {
        //callback if request error
      })
      .always(function() {
        //callback on success or failure
      });
    wpAPIrequest.done(function() {
      //second callback after done
    });
  };

  //convert the wp iso date to a full month, day, year format
    function convert_wp_date_full_format( wppostdate ){
      var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
      var isoDate = new Date( wppostdate );
      var fullDateFormat = months[isoDate.getMonth()]+' '+isoDate.getDate()+', '+isoDate.getFullYear();
      return fullDateFormat;
    }

  // parse rest api json and render data to dom
  function card_article_list( ){
    var postArr = [];
    $.each( jsonresult, function( i, item ) {
      if(!item._embedded['wp:featuredmedia']){
      }else{
        var featImageURL = item._embedded['wp:featuredmedia'][0].source_url;
      }
      var postURL = item.link;
      var postTitle = item.title.rendered;
      var postDate = convert_wp_date_full_format( item.date );
      postArr[i]={'featImageURL':featImageURL,'postURL':postURL,'postTitle':postTitle,'postDate':postDate};
    });
    $(selector).each(function( i ) {
      if( i < imagecount+1 ){
        $(this).find("a img").attr('src',postArr[i]['featImageURL'] );
      }
      $(this).find("a").attr('href',postArr[i]['postURL']);
      $(this).find("a .title").html(postArr[i]['postTitle']);
      $(this).find("a .date").html('Published: '+postArr[i]['postDate']);
    });
  };

// headline and patient story category articles
  if ($('.page-template-homepage').length > 0) {
    apiDifference = 'https://www.utphysicians.com/wp-json/wp/v2/posts?_embed&per_page=3&categories=1';
    apiHeadlines = 'https://www.utphysicians.com/wp-json/wp/v2/posts?_embed&per_page=3&categories=3';
    wpapi_get_posts( apiHeadlines,'#headlines .item',2 );
    wpapi_get_posts( apiDifference,'#difference .item',1 );
  }
////////////////////////////////////////////////////////////////////////////
//////////////////////////// Semantic UI ELEMENTS  /////////////////////////////////
///////////////////////////////////////////////////////////////////////////



//global video embed modifications for accessibility
  $('.ui.embed').embed();
  $( ".embed iframe" ).each(function( index ) {
    // remove iframe presentation attributes produced buy semantic ui
    $(this).removeAttr('height width frameborder scrolling');
    // add title attribute to embedded video iframes
    $(this).attr('title', 'Video From Youtube '+ index);
    //do not show related content when the youtube videos reach the end
    var uiembedurl = $(this).attr('src')+'&rel=0';
    $(this).attr('src',uiembedurl);
  });

// basit accordion
$('.ui.accordion')
  .accordion()
;
//dismissable message
  $('.message .close')
    .on('click', function() {
      $(this)
        .closest('.message')
        .transition('fade')
      ;
    });
    ////////////////////////////////////////////////////////////////////////////
    //////////////////////////// Detect MS Explorer  /////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

    // Get IE or Edge browser version
    var version = detectIE();

    if (version === false) {
      //document.getElementById('result').innerHTML = '<s>IE/Edge</s>';
    } else if (version >= 12) {
      //document.getElementById('result').innerHTML = 'Edge ' + version;
    } else {
      alert('You are using Microsoft Internet Explorer. UTPCONNECT.COM is most compatable with Chrome, Mozilla Firefox, or Safari browsers. If you have problems viewing the site please use these recommeneded browsers.');
    }

    // add details to debug result
    //document.getElementById('details').innerHTML = window.navigator.userAgent;

    /**
     * detect IE
     * returns version of IE or false, if browser is not Internet Explorer
     */
    function detectIE() {
      var ua = window.navigator.userAgent;

      // Test values; Uncomment to check result …

      // IE 10
      // ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)';

      // IE 11
      // ua = 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';

      // Edge 12 (Spartan)
      // ua = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0';

      // Edge 13
      // ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586';

      var msie = ua.indexOf('MSIE ');
      if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
      }

      var trident = ua.indexOf('Trident/');
      if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
      }

      var edge = ua.indexOf('Edge/');
      if (edge > 0) {
        // Edge (IE 12+) => return version number
        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
      }

      // other browser
      return false;
    }


});
