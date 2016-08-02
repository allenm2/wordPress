/* jQuery.js - functions used in WordPress theme fortune
		Written by:  Matt Allen - allenm2@csp.edu
		Written:  07-30-2016
*/

jQuery(document).ready(function($)
{    
  // alert("jQuery is working!");
  // Creating modal windows that float above the page
  // Get all the links that are class="modal"
  $('a.darkmodal').click(function( ) 
  {
    // get the item that was clicked ('this' is the item that was clicked)
    var modalID = $(this).attr('rel');
    //alert("modalID = " + modalID);
    // Fade in the modal window with a 'close' hyperlink with an image
    $('#' + modalID).fadeIn().prepend('<a href="#" class="close"><img src="http://localhost/wordpress/wp-content/uploads/2016/07/closeButton50x62.png" class="closeButton" title="Close Window" alt="Close Window" /></a>');
    
    // reposition the modal window
    var modalTop    = ($('#' + modalID).height( ) + 80) / 2;
    var modalLeft   = ($('#' + modalID).width( )  + 80) / 2;
    // Add this to the modals as in-line CSS
    $('#' + modalID).css( 
    {
        'margin-top'  : -modalTop,
        'margin-left' : -modalLeft
    });

    // add grey background
    $('body').append('<div id="modalShade"></div>');
    $('#modalShade').css('opacity', 0.7).fadeIn();
    
    return false; // stop the link from jumping
    
  }); // end of (a.modal).click()  
  
  // close the modal and pull down the shade
  $(document).on('click', 'a.close, #modalShade', function( )
  {
    var thisModalID = $('a.close').parent( ).attr('id');
    $('#modalShade, #' + thisModalID).fadeOut(function( )
    {
      // remove the shade and the close button
      $('#modalShade, a.close').remove( );
    });
  }); // end of  .live('click')
});  // end of ready( )