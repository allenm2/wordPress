<?php
/* Add Customizer Panel */
$fortune_theme_options = fortune_theme_options();
Kirki::add_config('fortune_theme', array(
    'capability'  => 'edit_theme_options',
    'option_type' => 'option',
    'option_name' => 'fortune_theme_options',
));

Kirki::add_field('fortune_theme', array(
    'settings'          => 'header_topbar_bg_color',
    'label'             => __('Header Top Bar Background Color', 'fortune'),
    'description'       => __('Change Top bar Background Color', 'fortune'),
    'section'           => 'colors',
    'type'              => 'color',
    'priority'          => 9,
    'default'           => '#2f2f2f',
    'sanitize_callback' => 'fortune_sanitize_color',
    'output'            => array(
        array(
            'element'  => '.header-top',
            'property' => 'background',
        ),
    ),

));

Kirki::add_field('fortune_theme', array(
    'settings'          => 'header_topbar_color',
    'label'             => __('Header Top Bar Color', 'fortune'),
    'description'       => __('Change Top bar Font Color', 'fortune'),
    'section'           => 'colors',
    'type'              => 'color',
    'priority'          => 9,
    'default'           => '#a3a3a3',
    'sanitize_callback' => 'fortune_sanitize_color',
    'output'            => array(
        array(
            'element'  => '.header-top, .header-top ul li a, .header-top-right a',
            'property' => 'color',
        ),
    ),
));

Kirki::add_field('fortune_theme', array(
    'settings'          => 'header_background_color',
    'label'             => __('Header Background Color', 'fortune'),
    'description'       => __('Change Header Background Color', 'fortune'),
    'section'           => 'colors',
    'type'              => 'color',
    'priority'          => 9,
    'default'           => '#ececec',
    'sanitize_callback' => 'fortune_sanitize_color',
    'output'            => array(
        array(
            'element'  => '.header-main',
            'property' => 'background',
        ),
    ),
));

Kirki::add_section('general_sec', array(
    'title'       => __('General Options', 'fortune'),
    'description' => __('Here you can change basic settings of your site', 'fortune'),
    'panel'       => 'fortune_theme_option',
    'priority'    => 10,
    'capability'  => 'edit_theme_options',
));
if ( version_compare( $wp_version, '4.5.1', '<=' ) ) {
Kirki::add_field('fortune_theme', array(
    'settings'          => 'upload_image_logo',
    'label'             => __('Upload logo image', 'fortune'),
    'section'           => 'general_sec',
    'type'              => 'image',
    'priority'          => 10,
    'sanitize_callback' => 'esc_url',
));
Kirki::add_field('fortune_theme', array(
    'settings'          => 'logo_width',
    'label'             => __('Image Logo Width', 'fortune'),
    'section'           => 'general_sec',
    'type'              => 'slider',
    'priority'          => 10,
    'default'           => $fortune_theme_options['logo_width'],
    'choices'           => array(
        'max'  => 250,
        'min'  => 35,
        'step' => 1,
    ),
    'output'            => array(
        array(
            'element'  => '#logo img',
            'property' => 'width',
            'units'    => 'px',
        ),
    ),
    'sanitize_callback' => 'fortune_sanitize_number',
));
}
Kirki::add_field('fortune_theme', array(
    'type'              => 'toggle',
    'settings'          => 'headersticky',
    'label'             => __('Fixed Header', 'fortune'),
    'description'       => __('Switch between fixed and static header', 'fortune'),
    'section'           => 'general_sec',
    'default'           => $fortune_theme_options['headersticky'],
    'priority'          => 10,
    'sanitize_callback' => 'fortune_sanitize_checkbox',
));
Kirki::add_field('fortune_theme', array(
    'type'                 => 'code',
    'settings'             => 'custom_css',
    'label'                => __('Custom Css', 'fortune'),
    'section'              => 'general_sec',
    'default'              => '',
    'priority'             => 10,
    'sanitize_callback'    => 'wp_filter_nohtml_kses',
    'sanitize_js_callback' => 'wp_filter_nohtml_kses',
	'choices'     => array(
		'language' => 'css',
		'theme'    => 'monokai',
		'label'=>'Open Css Editor'
	),
));

/* Typography */
Kirki::add_section('typography_sec', array(
    'title'       => __('Typography Section', 'fortune'),
    'description' => __('Here you can change Font Style of your site', 'fortune'),
    'panel'       => 'fortune_theme_option',
    'priority'    => 160,
    'capability'  => 'edit_theme_options',
));

Kirki::add_field('fortune_theme', array(
    'type'        => 'typography',
    'settings'    => 'logo_font',
    'label'       => __('Logo Font Style', 'fortune'),
    'description' => __('Change logo font family and font style.', 'fortune'),
    'section'     => 'typography_sec',
    'default'     => array(
        'font-style'  => array('bold', 'italic'),
        'font-family' => 'Anton',
		'variant'        => 'regular',
		'font-size'      => '36px',
		'line-height'    => '1em',
		'letter-spacing' => '0',
		'subsets'        => array( 'sans-serif' ),
		'color'          => '#2f2f2f',
		'text-transform' => 'uppercase',

    ),
    'priority'    => 10,
    'output'      => array(
        array(
            'element' => '.header .logo h1, .header .logo h2',
        ),
    ),
));

Kirki::add_field('fortune_theme', array(
    'type'        => 'typography',
    'settings'    => 'logo_tag_font',
    'label'       => __('Logo Tag line Style', 'fortune'),
    'description' => __('Change logo tag ine font family and font style.', 'fortune'),
    'section'     => 'typography_sec',
    'default'     => array(
        'font-style'  => array('bold', 'italic'),
        'font-family' => 'Muli',
		'font-size'      => '11px',
		'line-height'    => '1.5em',
		'subsets'        => array( 'sans-serif' ),
		'color'          => '#a3a3a3',
		'text-transform' => 'uppercase',

    ),
    'priority'    => 10,
    'output'      => array(
        array(
            'element' => '.header .logo .tagline',
        ),
    ),
));

Kirki::add_field('fortune_theme', array(
    'type'        => 'typography',
    'settings'    => 'prime_menu_font',
    'label'       => __('primery menu Style', 'fortune'),
    'section'     => 'typography_sec',
    'default'     => array(
        'font-style'  => array('bold', 'italic'),
        'font-family' => 'Oswald',
		'font-size'      => '16px',
		'line-height'    => '114px',
		'subsets'        => array( 'sans-serif' ),
		'text-transform' => 'uppercase',

    ),
    'priority'    => 10,
    'output'      => array(
        array(
            'element' => '.fhmm .navbar-collapse .navbar-nav > li > a',
        ),
    ),
));

/* Full body typography */
Kirki::add_field('fortune_theme', array(
    'type'        => 'typography',
    'settings'    => 'site_font',
    'label'       => __('Site Font Style', 'fortune'),
    'description' => __('Change whole site font family and font style.', 'fortune'),
    'section'     => 'typography_sec',
    'default'     => array(
        'font-style'  => array('bold', 'italic'),
        'font-family' => "Open Sans",

    ),
    'priority'    => 10,
    'choices'     => array(
        'font-style'  => true,
        'font-family' => true,
    ),
    'output'      => array(
        array(
            'element' => 'body, h1, h2, h3, h4, h5, h6, p, em, blockquote, .main_title h2',
        ),
    ),
));
/* Layout section */
Kirki::add_section('layout_sec', array(
    'title'       => __('Layout Options', 'fortune'),
    'description' => __('Here you can change Layout and basic design of your site', 'fortune'),
    'panel'       => 'fortune_theme_option',
    'priority'    => 160,
    'capability'  => 'edit_theme_options',
    'transport'   => 'postMessage',
));
Kirki::add_field('fortune_theme', array(
    'settings'          => 'site_layout',
    'label'             => __('Site Layout', 'fortune'),
    'description'       => __('Change your site layout to full width or boxed size.', 'fortune'),
    'section'           => 'layout_sec',
    'type'              => 'radio-image',
    'priority'          => 10,
    'transport'         => 'postMessage',
    'default'           => '',
    'sanitize_callback' => 'fortune_sanitize_text',
    'choices'           => array(
        ''           => get_template_directory_uri() . '/images/1c.png',
        'boxed' => get_template_directory_uri() . '/images/3cm.png',
    ),

));
Kirki::add_field('fortune_theme', array(
    'settings'          => 'footer_layout',
    'label'             => __('Footer Layout', 'fortune'),
    'description'       => __('Change footer into 2, 3 or 4 column', 'fortune'),
    'section'           => 'layout_sec',
    'type'              => 'radio-image',
    'priority'          => 10,
    'default'           => $fortune_theme_options['footer_layout'],
    'transport'         => 'postMessage',
    'choices'           => array(
        2 => get_template_directory_uri() . '/images/footer-widgets-2.png',
        3 => get_template_directory_uri() . '/images/footer-widgets-3.png',
        4 => get_template_directory_uri() . '/images/footer-widgets-4.png',
    ),
    'sanitize_callback' => 'fortune_sanitize_number',
));

/* Home Page Customizer */
Kirki::add_section('home_customize_section', array(
    'title'      => __('Home Page Reorder Sections', 'fortune'),
    'panel'      => 'fortune_theme_option',
    'priority'   => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field( 'fortune_theme', array(
	'type'        => 'sortable',
	'settings'    => 'home_sections',
	'label'       => __( 'Here You can reorder your homepage section', 'fortune' ),
	'section'     => 'home_customize_section',
	'default'     => array(
		'service',
		'portfolio',
		'blog',
		'callout'
	),
	'choices'     => array(
		'service' => esc_attr__( 'Service Section', 'fortune' ),
		'portfolio' => esc_attr__( 'Portfolio Section', 'fortune' ),
		'blog' => esc_attr__( 'Blog Section', 'fortune' ),
		'callout' => esc_attr__( 'Callout Section', 'fortune' ),
	),
	'priority'    => 10,
) );
/* footer options */
Kirki::add_section('footer_section', array(
    'title'      => __('Footer Options', 'fortune'),
    'panel'      => 'fortune_theme_option',
    'priority'   => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('fortune_theme', array(
    'settings'          => 'footer_bg_color',
    'label'             => __('Footer-1 Background Color', 'fortune'),
    'section'           => 'footer_section',
    'type'              => 'color-alpha',
    'default'           => '#2f2f2f',
    'priority'          => 10,
    'output'            => array(
        array(
            'element'  => '.footer',
            'property' => 'background',
        ),
    ),
    'transport'         => 'auto',
    'sanitize_callback' => 'fortune_sanitize_color',
));

Kirki::add_field('fortune_theme', array(
    'settings'          => 'footer_2_bg_color',
    'label'             => __('Footer-2 Background Color', 'fortune'),
    'section'           => 'footer_section',
    'type'              => 'color-alpha',
    'default'           => '#212121',
    'priority'          => 10,
    'output'            => array(
        array(
            'element'  => '.footer-copyright',
            'property' => 'border-top',
        ),
		array(
            'element'  => '.footer-copyright',
            'property' => 'background',
        ),
    ),
    'transport'         => 'auto',
    'sanitize_callback' => 'fortune_sanitize_color',
)); ?>