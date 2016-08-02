/* toggleInfo.js - testing jQuery in WordPress
Toggles specific paragraph on/off when button is clicked on page */
jQuery(document).ready(function($) {
$("#btnMore").click(function( ){
$("#moreInfo").toggle( );
});
})