<?php
/* General Options */
function fortune_theme_options()
{
    $fortune_theme_options = array(
        'site_layout' => '',
        'upload_image_logo' => '',
        'headercolorscheme' => 'light_header',
        'headersticky' => 1,
        'custom_css' => '',
		'home_service_enabled' => 1,
		'service_heading'=>__('Our Services','fortune'),
        'service_title_1' => __("Responsive", 'fortune'),
        'service_icon_1' => "fa fa-mobile",
        'service_text_1' => __("Lorem ipsum dolor sit amet, consectetur adipisicing elit ipsum lorem sit amet.", 'fortune'),
        'service_link_1' => "#",
		'service_target_1' =>'' ,

        'service_title_2' => __("Retina Ready", 'fortune'),
        'service_icon_2' => "fa fa-eye",
        'service_text_2' => __("Lorem ipsum dolor sit amet, consectetur adipisicing elit ipsum lorem sit amet.", 'fortune'),
        'service_link_2' => "#",
		'service_target_2'=>'',

        'service_title_3' => __("Multi Layout", 'fortune'),
        'service_icon_3' => "fa fa-copy",
        'service_text_3' => __("Lorem ipsum dolor sit amet, consectetur adipisicing elit ipsum lorem sit amet", 'fortune'),
        'service_link_3' => "#",
		'service_target_3'=>'',
		
		//Slider Settings:
        'slider_home' => 1,
		'slider_category'=>'1',
        //Portfolio Settings:
        'portfolio_home' => 0,
        'portfolio_post' => "",
        'footer_copyright' => __('fortune Theme', 'fortune'),
        'developed_by_text' => __('Developed By', 'fortune'),
        'developed_by_link_text' => __('Webhunt Infotech', 'fortune'),
        'developed_by_link' => 'http://www.webhuntinfotech.com/',
        'footer_layout' => 4,
		'blog_home'=>1,
        'blog_title' => __('Recent Posts', 'fortune'),
		'blog_desc' => __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour of this randomised words which don\'t look even slightly believable', 'fortune'),
		'home_post_cat' => '',
        /* footer callout */
        'callout_home' => 1,
        'callout_title' => __('Best Wordpress Resposnive Theme Ever!', 'fortune'),
        'callout_btn_text' => __('Download Now', 'fortune'),
        'callout_btn_link' => 'http://www.example.com',
        /* Social media icons */
        'contact_info_header' => 1,
        'social_footer' => 1,
		'contact_in_header'=>1,
        'contact_phone' => '+0744-9999',
        'contact_email' => 'example@gmail.com',
		'social_home'=>1,
        'social_facebook_link' => '#',
        'social_twitter_link' => '#',
        'social_instagram_link' => '#',
        'social_linkedin_link' => '#',
        'social_youtube_link' => '#',
        'social_vimeo_link' => '#',
        'social_google_plus_link' => '#',
        'social_skype_link' => '#',
		'home_sections'=>array('service', 'portfolio', 'blog', 'callout')

    );
    return wp_parse_args(get_option('fortune_theme_options', array()), $fortune_theme_options);
}

?>