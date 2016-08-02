<?php
if(class_exists('Kirki') ){
	include('customizer-extra.php');
}
add_action( 'customize_register', 'fortune_customizer' );
function fortune_customizer( $wp_customize ) {
	$fortune_theme_options = fortune_theme_options();
	    if(!function_exists('fortune_get_categories_select')):
		    function fortune_get_categories_select() {
			  $fortune_cat = get_categories();
			  $results;
			  if(!empty($fortune_cat)):
				  $count = count($fortune_cat);
				  $results['default'] = __('Select Category','fortune');
				  for ($i=0; $i < $count; $i++) {
				    if (isset($fortune_cat[$i])){
				      $results[$fortune_cat[$i]->cat_ID] = $fortune_cat[$i]->name;
				    }
				  }
			  endif;
			  return $results;
			}
		endif;
		if(!function_exists('fortune_get_post_select')):
		    function fortune_get_post_select() {
			$all_posts = wp_count_posts('post')->publish;
			$latest = new WP_Query( array(
			'post_type'   => 'post',
			'post_per_page'=>$all_posts,
			'post_status' => 'publish',
			'orderby'     => 'date',
			'order'       => 'DESC'
		));
			  $results;
			  if(!empty($latest)):
				  $results['default'] = __('Select Post','fortune');
				  while( $latest->have_posts() ) { $latest->the_post();
				   	$results[get_the_id()] = get_the_title();
				    
				  }
			  endif;
			  
			  return $results;
			}
		endif;
		
	/* Genral section */
	$wp_customize->add_panel( 'fortune_theme_option', array(
    'title' => __( 'Theme Options','fortune' ),
    'priority' => 2, // Mixed with top-level-section hierarchy.
	) );

	$wp_customize->add_section('slider_sec',
		array(
			'title' => __('Slider Options','fortune'),
			'panel' => 'fortune_theme_option',
			'capability' => 'edit_theme_options',
			'priority' => 35, // Mixed with top-level-section hierarchy.
			)
		);
		$wp_customize->add_setting('fortune_theme_options[slider_category]',
	        array(
	            'type' => 'option',
	            'sanitize_callback' => 'fortune_sanitize_number',
	            'default'=>'1',
	        )
	);
	$wp_customize->add_control('slider_category',array(
			'label' => __('Select Category','fortune'),
			'section' => 'slider_sec',
			'settings' => 'fortune_theme_options[slider_category]',
			'type' => 'select',
			'choices'=> fortune_get_categories_select()
			)
		);
	/* Service Options */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options","fortune"),
	'panel'=>'fortune_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	));
	$wp_customize->add_setting(
		'fortune_theme_options[home_service_enabled]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['home_service_enabled'],
			'sanitize_callback'=>'fortune_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('home_service_enabled',array(
			'label' => __('Enable Home Service','fortune'),
			'section' => 'service_section',
			'settings' => 'fortune_theme_options[home_service_enabled]',
			'type' => 'checkbox',		
			)
		);
	$wp_customize->add_setting(
		'fortune_theme_options[service_heading]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['service_heading'],
			'sanitize_callback'=>'fortune_sanitize_text',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('service_heading',array(
		'label' => __('Portfolio Title','fortune'),
		'section' => 'service_section',
		'settings' => 'fortune_theme_options[service_heading]',
		'type' => 'text',		
		)
	);
	for($i=1;$i<=3;$i++){
	$wp_customize->add_setting(
	'fortune_theme_options[service_icon_'.$i.']',
		array(
		'default'=>esc_attr($fortune_theme_options['service_icon_'.$i]),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'fortune_sanitize_text',
		'transport'=>'postMessage'
			)
	);
	$wp_customize->add_setting(
	'fortune_theme_options[service_title_'.$i.']',
		array(
		'default'=>esc_attr($fortune_theme_options['service_title_'.$i]),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'fortune_sanitize_text',
		'transport'=>'postMessage'
			)
	);
	$wp_customize->add_setting(
	'fortune_theme_options[service_text_'.$i.']',
		array(
		'default'=>esc_attr($fortune_theme_options['service_text_'.$i]),
		'type'=>'option',
		'sanitize_callback'=>'fortune_sanitize_text',
		'capability'=>'edit_theme_options',
		'transport'=>'postMessage'
			)
	);
	$wp_customize->add_setting(
	'fortune_theme_options[service_link_'.$i.']',
		array(
		'type'    => 'option',
		'default'=>$fortune_theme_options['service_link_'.$i],
		'capability' => 'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw',
		'transport'=>'postMessage'
		)
	);
	$wp_customize->add_setting(
		'fortune_theme_options[service_target_'.$i.']',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['service_target_'.$i],
			'sanitize_callback'=>'fortune_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	}
	for($i=1;$i<=3;$i++){
	$j = array('', __(' One','fortune'), __(' Two','fortune'), __(' Three','fortune'));
	$wp_customize->add_control( 'fortune_service_icon'.$i, array(
		'label'        => __( 'Service Icon', 'fortune' ).$j[$i],
		'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com" target="_blank">FontAwesome Icons</a>','fortune'),
		'section'  => 'service_section',
		'settings'   => 'fortune_theme_options[service_icon_'.$i.']'
    ) );
	$wp_customize->add_control( 'fortune_service_title'.$i, array(
		'label'        => __( 'Service Title', 'fortune').$j[$i],
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'fortune_theme_options[service_title_'.$i.']'
	) );
	$wp_customize->add_control( 'fortune_service_text_'.$i, array(
		'label'        => __( 'Service Description', 'fortune').$j[$i],
		'type'=>	'textarea',
		'section'    => 'service_section',
		'settings'   => 'fortune_theme_options[service_text_'.$i.']'
	) );
	$wp_customize->add_control( 'fortune_service_link_'.$i, array(
		'label'        => __( 'Service Link', 'fortune').$j[$i],
		'type'=>	'text',
		'section'    => 'service_section',
		'settings'   => 'fortune_theme_options[service_link_'.$i.']',
	) );
	$wp_customize->add_control( 'fortune_service_link_target_'.$i, array(
		'label'        => __( 'Open link in new tab', 'fortune' ),
		'type'=>	'checkbox',
		'section'    => 'service_section',
		'settings'   => 'fortune_theme_options[service_target_'.$i.']',
	) );
	}
	
	/* Portfolio Optionds */
 $wp_customize->add_section('portfolio_section',array(
	'title'=>__("Portfolio Options","fortune"),
	'panel'=>'fortune_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	));
	$wp_customize->add_setting(
		'fortune_theme_options[portfolio_home]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['portfolio_home'],
			'sanitize_callback'=>'fortune_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('portfolio_home',array(
		'label' => __('Enable Home Portfolio','fortune'),
		'section' => 'portfolio_section',
		'settings' => 'fortune_theme_options[portfolio_home]',
		'type' => 'checkbox',		
		)
	);

	
	$wp_customize->add_setting('fortune_theme_options[portfolio_post]',
	        array(
	            'type' => 'option',
	            'sanitize_callback' => 'fortune_sanitize_number',
	            'default'=>'30',
	        )
	);
	$wp_customize->add_control('portfolio_post',array(
			'label' => __('Select Post','fortune'),
			'description' => __('Select the post in which you have put the shortcode to display portfolio.','fortune'),
			'section' => 'portfolio_section',
			'settings' => 'fortune_theme_options[portfolio_post]',
			'type' => 'select',
			'choices'=> fortune_get_post_select()
			)
		);
	/* Blog Optionds */
 $wp_customize->add_section('blog_section',array(
	'title'=>__("Blog Options","fortune"),
	'panel'=>'fortune_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	));
	$wp_customize->add_setting(
		'fortune_theme_options[blog_home]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['blog_home'],
			'sanitize_callback'=>'fortune_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('blog_home',array(
		'label' => __('Enable Home Blog','fortune'),
		'section' => 'blog_section',
		'settings' => 'fortune_theme_options[blog_home]',
		'type' => 'checkbox',		
		)
	);
	$wp_customize->add_setting(
		'fortune_theme_options[blog_title]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['blog_title'],
			'sanitize_callback'=>'fortune_sanitize_text',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('blog_title',array(
		'label' => __('Home Blog Title','fortune'),
		'section' => 'blog_section',
		'settings' => 'fortune_theme_options[blog_title]',
		'type' => 'text',		
		)
	);
	$wp_customize->add_setting(
		'fortune_theme_options[blog_desc]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['blog_desc'],
			'sanitize_callback'=>'fortune_sanitize_desc',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('blog_desc',array(
		'label' => __('Home Blog Description','fortune'),
		'section' => 'blog_section',
		'settings' => 'fortune_theme_options[blog_desc]',
		'type' => 'text',		
		)
	);
 /* Callout Optionds */
 $wp_customize->add_section('callout_section',array(
	'title'=>__("Callout Options","fortune"),
	'panel'=>'fortune_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	));
	$wp_customize->add_setting(
		'fortune_theme_options[callout_home]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['callout_home'],
			'sanitize_callback'=>'fortune_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('callout_home',array(
		'label' => __('Enable Callout Section','fortune'),
		'section' => 'callout_section',
		'settings' => 'fortune_theme_options[callout_home]',
		'type' => 'checkbox',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[callout_title]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['callout_title'],
			'sanitize_callback'=>'fortune_sanitize_text',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('callout_title',array(
		'label' => __('Callout Title','fortune'),
		'section' => 'callout_section',
		'settings' => 'fortune_theme_options[callout_title]',
		'type' => 'text',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[callout_btn_text]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['callout_btn_text'],
			'sanitize_callback'=>'fortune_sanitize_text',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('callout_btn_text',array(
		'label' => __('Callout Button Text','fortune'),
		'section' => 'callout_section',
		'settings' => 'fortune_theme_options[callout_btn_text]',
		'type' => 'text',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[callout_btn_link]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['callout_btn_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('callout_btn_link',array(
		'label' => __('Callout Button Link','fortune'),
		'section' => 'callout_section',
		'settings' => 'fortune_theme_options[callout_btn_link]',
		'type' => 'text',		
		)
	);
/* contact options */
	$wp_customize->add_section('contact_section',array(
	'title'=>__("Contact Options","fortune"),
	'panel'=>'fortune_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	));

	$wp_customize->add_setting(
		'fortune_theme_options[contact_in_header]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['contact_in_header'],
			'sanitize_callback'=>'fortune_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('contact_in_header',array(
		'label' => __('Show Contact Info in Top bar','fortune'),
		'section' => 'contact_section',
		'settings' => 'fortune_theme_options[contact_in_header]',
		'type' => 'checkbox',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[contact_email]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['contact_email'],
			'sanitize_callback'=>'sanitize_email',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('contact_email',array(
		'label' => __('Contact Email','fortune'),
		'section' => 'contact_section',
		'settings' => 'fortune_theme_options[contact_email]',
		'type' => 'text',		
		)
	);
	$wp_customize->add_setting(
		'fortune_theme_options[contact_phone]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['contact_phone'],
			'sanitize_callback'=>'esc_attr',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('contact_phone',array(
		'label' => __('Contact Email','fortune'),
		'section' => 'contact_section',
		'settings' => 'fortune_theme_options[contact_phone]',
		'type' => 'text',		
		)
	);
/* Social Optionds */
 $wp_customize->add_section('social_section',array(
	'title'=>__("Social Options","fortune"),
	'panel'=>'fortune_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	));
	$wp_customize->add_setting(
		'fortune_theme_options[social_home]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['social_home'],
			'sanitize_callback'=>'fortune_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('social_home',array(
		'label' => __('Enable Social Media Option in Home','fortune'),
		'section' => 'social_section',
		'settings' => 'fortune_theme_options[social_home]',
		'type' => 'checkbox',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[social_footer]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['social_footer'],
			'sanitize_callback'=>'fortune_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
			'transport'=>'postMessage'
		)
	);
	$wp_customize->add_control('social_footer',array(
		'label' => __('Enable Social Media in Footer','fortune'),
		'section' => 'social_section',
		'settings' => 'fortune_theme_options[social_footer]',
		'type' => 'checkbox',		
		)
	);
	
	
	$wp_customize->add_setting(
		'fortune_theme_options[social_facebook_link]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['social_facebook_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('social_facebook_link',array(
		'label' => __('Facebook Link','fortune'),
		'section' => 'social_section',
		'settings' => 'fortune_theme_options[social_facebook_link]',
		'type' => 'text',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[social_twitter_link]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['social_twitter_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('social_twitter_link',array(
		'label' => __('Twitter Link','fortune'),
		'section' => 'social_section',
		'settings' => 'fortune_theme_options[social_twitter_link]',
		'type' => 'text',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[social_instagram_link]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['social_instagram_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('social_instagram_link',array(
		'label' => __('Instagram Link','fortune'),
		'section' => 'social_section',
		'settings' => 'fortune_theme_options[social_instagram_link]',
		'type' => 'text',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[social_linkedin_link]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['social_linkedin_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('social_linkedin_link',array(
		'label' => __('LinkedIn Link','fortune'),
		'section' => 'social_section',
		'settings' => 'fortune_theme_options[social_linkedin_link]',
		'type' => 'text',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[social_youtube_link]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['social_youtube_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('social_youtube_link',array(
		'label' => __('Youtube Link','fortune'),
		'section' => 'social_section',
		'settings' => 'fortune_theme_options[social_youtube_link]',
		'type' => 'text',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[social_google_plus_link]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['social_google_plus_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('social_google_plus_link',array(
		'label' => __('Google+ Link','fortune'),
		'section' => 'social_section',
		'settings' => 'fortune_theme_options[social_google_plus_link]',
		'type' => 'text',		
		)
	);
	
	/* Footer Option */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options","fortune"),
	'panel'=>'fortune_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	));
	$wp_customize->add_setting(
		'fortune_theme_options[footer_copyright]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['footer_copyright'],
			'sanitize_callback'=>'fortune_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('footer_copyright',array(
		'label' => __('Copyright Text','fortune'),
		'section' => 'footer_section',
		'settings' => 'fortune_theme_options[footer_copyright]',
		'type' => 'text',		
		)
	);
	$wp_customize->add_setting(
		'fortune_theme_options[developed_by_text]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['developed_by_text'],
			'sanitize_callback'=>'fortune_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('developed_by_text',array(
		'label' => __('Developed by Text','fortune'),
		'section' => 'footer_section',
		'settings' => 'fortune_theme_options[developed_by_text]',
		'type' => 'text',		
		)
	);
	
	$wp_customize->add_setting(
		'fortune_theme_options[developed_by_link_text]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['developed_by_link_text'],
			'sanitize_callback'=>'fortune_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('developed_by_link_text',array(
		'label' => __('Link Text','fortune'),
		'section' => 'footer_section',
		'settings' => 'fortune_theme_options[developed_by_link_text]',
		'type' => 'text',		
		)
	);
	$wp_customize->add_setting(
		'fortune_theme_options[developed_by_link]',
		array(
			'type'    => 'option',
			'default'=>$fortune_theme_options['developed_by_link'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control('developed_by_link',array(
		'label' => __('Developed by Link','fortune'),
		'section' => 'footer_section',
		'settings' => 'fortune_theme_options[developed_by_link]',
		'type' => 'text',		
		)
	);
}

/* Custom Sanitization Function  */
function fortune_sanitize_text($input)
{
    return wp_kses_post(force_balance_tags($input));
}

function fortune_sanitize_checkbox($checked)
{
    return ((isset($checked) && (true == $checked || 'on' == $checked)) ? true : false);
}

/**
 * Sanitize number options
 */
function fortune_sanitize_number($value)
{
    if (is_array($value)) {
        foreach ($value as $key => $val) {
            $v[$key] = is_numeric($val) ? $val : intval($val);
        }
        return $v;
    } else {
        return (is_numeric($value)) ? $value : intval($value);
    }
}
function fortune_sanitize_selected($value)
{
    if ($value[0] == '') {
        return $value = '';
    } else {
        return wp_kses_post($value);
    }
}
function fortune_sanitize_color($color)
{

    if ($color == "transparent") {
        return $color;
    }

    $named = json_decode('{"transparent":"transparent", "aliceblue":"#f0f8ff","antiquewhite":"#faebd7","aqua":"#00ffff","aquamarine":"#7fffd4","azure":"#f0ffff", "beige":"#f5f5dc","bisque":"#ffe4c4","black":"#000000","blanchedalmond":"#ffebcd","blue":"#0000ff","blueviolet":"#8a2be2","brown":"#a52a2a","burlywood":"#deb887", "cadetblue":"#5f9ea0","chartreuse":"#7fff00","chocolate":"#d2691e","coral":"#ff7f50","cornflowerblue":"#6495ed","cornsilk":"#fff8dc","crimson":"#dc143c","cyan":"#00ffff", "darkblue":"#00008b","darkcyan":"#008b8b","darkgoldenrod":"#b8860b","darkgray":"#a9a9a9","darkgreen":"#006400","darkkhaki":"#bdb76b","darkmagenta":"#8b008b","darkolivegreen":"#556b2f", "darkorange":"#ff8c00","darkorchid":"#9932cc","darkred":"#8b0000","darksalmon":"#e9967a","darkseagreen":"#8fbc8f","darkslateblue":"#483d8b","darkslategray":"#2f4f4f","darkturquoise":"#00ced1", "darkviolet":"#9400d3","deeppink":"#ff1493","deepskyblue":"#00bfff","dimgray":"#696969","dodgerblue":"#1e90ff", "firebrick":"#b22222","floralwhite":"#fffaf0","forestgreen":"#228b22","fuchsia":"#ff00ff", "gainsboro":"#dcdcdc","ghostwhite":"#f8f8ff","gold":"#ffd700","goldenrod":"#daa520","gray":"#808080","green":"#008000","greenyellow":"#adff2f", "honeydew":"#f0fff0","hotpink":"#ff69b4", "indianred ":"#cd5c5c","indigo ":"#4b0082","ivory":"#fffff0","khaki":"#f0e68c", "lavender":"#e6e6fa","lavenderblush":"#fff0f5","lawngreen":"#7cfc00","lemonchiffon":"#fffacd","lightblue":"#add8e6","lightcoral":"#f08080","lightcyan":"#e0ffff","lightgoldenrodyellow":"#fafad2", "lightgrey":"#d3d3d3","lightgreen":"#90ee90","lightpink":"#ffb6c1","lightsalmon":"#ffa07a","lightseagreen":"#20b2aa","lightskyblue":"#87cefa","lightslategray":"#778899","lightsteelblue":"#b0c4de", "lightyellow":"#ffffe0","lime":"#00ff00","limegreen":"#32cd32","linen":"#faf0e6", "magenta":"#ff00ff","maroon":"#800000","mediumaquamarine":"#66cdaa","mediumblue":"#0000cd","mediumorchid":"#ba55d3","mediumpurple":"#9370d8","mediumseagreen":"#3cb371","mediumslateblue":"#7b68ee", "mediumspringgreen":"#00fa9a","mediumturquoise":"#48d1cc","mediumvioletred":"#c71585","midnightblue":"#191970","mintcream":"#f5fffa","mistyrose":"#ffe4e1","moccasin":"#ffe4b5", "navajowhite":"#ffdead","navy":"#000080", "oldlace":"#fdf5e6","olive":"#808000","olivedrab":"#6b8e23","orange":"#ffa500","orangered":"#ff4500","orchid":"#da70d6", "palegoldenrod":"#eee8aa","palegreen":"#98fb98","paleturquoise":"#afeeee","palevioletred":"#d87093","papayawhip":"#ffefd5","peachpuff":"#ffdab9","peru":"#cd853f","pink":"#ffc0cb","plum":"#dda0dd","powderblue":"#b0e0e6","purple":"#800080", "red":"#ff0000","rosybrown":"#bc8f8f","royalblue":"#4169e1", "saddlebrown":"#8b4513","salmon":"#fa8072","sandybrown":"#f4a460","seagreen":"#2e8b57","seashell":"#fff5ee","sienna":"#a0522d","silver":"#c0c0c0","skyblue":"#87ceeb","slateblue":"#6a5acd","slategray":"#708090","snow":"#fffafa","springgreen":"#00ff7f","steelblue":"#4682b4", "tan":"#d2b48c","teal":"#008080","thistle":"#d8bfd8","tomato":"#ff6347","turquoise":"#40e0d0", "violet":"#ee82ee", "wheat":"#f5deb3","white":"#ffffff","whitesmoke":"#f5f5f5", "yellow":"#ffff00","yellowgreen":"#9acd32"}', true);

    if (isset($named[strtolower($color)])) {
        /* A color name was entered instead of a Hex Value, convert and send back */
        return $named[strtolower($color)];
    }

    $color = str_replace('#', '', $color);
    if (strlen($color) == 3) {
        $color = $color . $color;
    }
    if (preg_match('/^[a-f0-9]{6}$/i', $color)) {
        return '#' . $color;
    }
    //$this->error = $this->field;
    return false;
}

function fortune_sanitize_textarea($value)
{
    return wp_kses_post(force_balance_tags($value));
}
function fortune_customizer_preview_js()
{
    wp_enqueue_script('custom_css_preview', get_template_directory_uri() . '/vendor/customize-preview.js', array('customize-preview', 'jquery'));
}
add_action('customize_preview_init', 'fortune_customizer_preview_js');

?>
