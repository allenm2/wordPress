<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');

if(in_array($mandatory, array(1, 2)))
{
	$js_string .=
	'
	val1 = Number(wplj.trim(wpl_de_thousand_sep(wplj("#wpl_c_'.$field->id.'").val())));
	val2 = Number(wplj.trim(wpl_de_thousand_sep(wplj("#wpl_c_'.$field->id.'_max").val())));
	
	if((val1 > val2) && wplj("#wpl_listing_field_container'.$field->id.'").css("display") != "none")
	{
		wpl_alert("'.__('Enter a valid', 'wpl').' '.__($label, 'wpl').'!");
		wpl_notice_required_fields(wplj("#wpl_c_'.$field->id.'"), "'.$field->category.'");
		return false;
	}
	';
}