<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
$Fortune_lite = wp_get_theme( 'fortune' );
?>

<div id="getting_started" class="fortune-lite-tab-pane active">

	<div class="fortune-tab-pane-center">
		
		<h1 class="fortune-lite-welcome-title"><?php _e('Welcome to Fortune!','fortune'); if( !empty($Fortune_lite['Version']) ): ?> <sup id="fortune-lite-theme-version"><?php echo esc_attr( $Fortune_lite['Version'] ); ?> </sup><?php endif; ?></h1>
	</div>

	<hr />

	<div class="fortune-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'fortune' ); ?></h1>

		<h4><?php esc_html_e( 'Customize Whole theme in a single place.' ,'fortune' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'fortune' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'fortune' ); ?></a></p>
	</div>

	<hr />
	<div class="fortune-tab-pane-center">
		<h1><?php esc_html_e( 'FAQ', 'fortune' ); ?></h1>
	</div>
	<div class="fortune-tab-pane-half fortune-tab-pane-first-half">
		<h4><?php esc_html_e( 'Create a child theme', 'fortune' ); ?></h4>
		<p><?php esc_html_e( 'If you want to make changes to the theme\'s files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.', 'fortune' ); ?></p>
		<p><a href="http://demo.webhuntinfotech.com/blog/2016/01/11/how-to-create-a-child-theme/" class="button"><?php esc_html_e( 'View how to do this', 'fortune' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Gallery in Blog Posts', 'fortune' ); ?></h4>
		<p><?php esc_html_e( 'If you want to use more than one images in your post or want to make gallery images in your post. This can be accomplished by following the documention below.', 'fortune' ); ?></p>
		<p><a href="http://demo.webhuntinfotech.com/blog/2016/01/11/add-gallery-posts-in-matrix-or-kyma-theme/" class="button"><?php esc_html_e( 'View how to do this', 'fortune' ); ?></a></p>
	</div>

	<div class="fortune-tab-pane-half">
	
		<h4><?php esc_html_e( 'Translate fortune Lite', 'fortune' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to translate fortune Lite into your native language or any other language you need for you site.', 'fortune' ); ?></p>
		<p><a href="http://demo.webhuntinfotech.com/blog/2016/01/11/how-to-translate-any-translation-ready-theme/" class="button"><?php esc_html_e( 'View how to do this', 'fortune' ); ?></a></p>

		<hr />
		
		<h4><?php esc_html_e( 'How To Setup Home Page', 'fortune' ); ?></h4>
		<p><?php esc_html_e( 'See below document. It will help you to setup Home Page' , 'fortune' ); ?></p>
		<p><a href="http://demo.webhuntinfotech.com/blog/2016/02/02/how-to-setup-home-page-in-matrix-or-kyma-lite/" class="button"><?php esc_html_e( 'View how to do this', 'fortune' ); ?></a></p>
		
	</div>

	<div class="fortune-lite-clear"></div>

</div>
