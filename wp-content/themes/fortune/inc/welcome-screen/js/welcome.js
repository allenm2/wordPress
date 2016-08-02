jQuery(document).ready(function() {
	
	/* If there are required actions, add an icon with the number of required actions in the About fortune page -> Actions required tab */
    var Fortune_nr_actions_required = fortuneLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof Fortune_nr_actions_required !== 'undefined') && (Fortune_nr_actions_required != '0') ) {
        jQuery('li.fortune-lite-w-red-tab a').append('<span class="fortune-lite-actions-count">' + Fortune_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".fortune-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'Fortune_lite_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : fortuneLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.fortune-lite-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + fortuneLiteWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var Fortune_lite_actions_count = jQuery('.fortune-lite-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof Fortune_lite_actions_count !== 'undefined' ) {
                    if( Fortune_lite_actions_count == '1' ) {
                        jQuery('.fortune-lite-actions-count').remove();
                        jQuery('.fortune-lite-tab-pane#actions_required').append('<p>' + fortuneLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.fortune-lite-actions-count').text(parseInt(Fortune_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
	
	/* Tabs in welcome page */
	function Fortune_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".fortune-lite-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}
	
	var Fortune_actions_anchor = location.hash;
	
	if( (typeof Fortune_actions_anchor !== 'undefined') && (Fortune_actions_anchor != '') ) {
		Fortune_welcome_page_tabs('a[href="'+ Fortune_actions_anchor +'"]');
	}
	
    jQuery(".fortune-lite-nav-tabs a").click(function(event) {
        event.preventDefault();
		Fortune_welcome_page_tabs(this);
    });

});