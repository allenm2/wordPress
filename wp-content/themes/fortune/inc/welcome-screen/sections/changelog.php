<?php
/**
 * Changelog
 */

$Fortune_lite = wp_get_theme( 'fortune' );

?>
<div class="fortune-lite-tab-pane" id="changelog">

	<div class="fortune-tab-pane-center">
	
		<h1>fortune Lite <?php if( !empty($Fortune_lite['Version']) ): ?> <sup id="fortune-lite-theme-version"><?php echo esc_attr( $Fortune_lite['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$Fortune_lite_changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.md' );
	$Fortune_lite_changelog_lines = explode(PHP_EOL, $Fortune_lite_changelog);
	foreach($Fortune_lite_changelog_lines as $Fortune_lite_changelog_line){
		if(substr( $Fortune_lite_changelog_line, 0, 3 ) === "###"){
			echo '<h1>'.substr($Fortune_lite_changelog_line,3).'</h1>';
		} else {
			echo $Fortune_lite_changelog_line,'<br/>';
		}
	}

	?>
	
</div>