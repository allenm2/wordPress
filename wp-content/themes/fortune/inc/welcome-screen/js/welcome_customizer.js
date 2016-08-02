jQuery(document).ready(function() {
    var Fortune_aboutpage = fortuneLiteWelcomeScreenCustomizerObject.aboutpage;
    var Fortune_nr_actions_required = fortuneLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof Fortune_aboutpage !== 'undefined') && (typeof Fortune_nr_actions_required !== 'undefined') && (Fortune_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + Fortune_aboutpage + '"><span class="fortune-lite-actions-count">' + Fortune_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".fortune-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section fortune-upsells">');
    }
    if (typeof Fortune_aboutpage !== 'undefined') {
        jQuery('.fortune-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + Fortune_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', fortuneLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".fortune-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});