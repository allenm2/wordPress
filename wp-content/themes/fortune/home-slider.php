<?php 
$fortune_theme_options = fortune_theme_options();
if(!$fortune_theme_options['slider_home']){return;}
$slider_category_id = $fortune_theme_options['slider_category'] == ''?'1': (int)$fortune_theme_options['slider_category'];
$fortune_slider_arg = array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'order'          => 'desc',
	'orderby'        => 'date',
	'ignore_sticky_posts' => 1,
	'category__in' => array($slider_category_id),
	);
	
$fortune_slider = new WP_Query($fortune_slider_arg) ?>
<!-- Slider / End -->

<div class="tp-banner-holder">
  <div class="tp-banner-container">
    <div class="slider-wrapper theme-default">
      <div class="ribbon"></div>
      <div id="slider" class="nivoSlider">
        <?php if($fortune_slider->have_posts()):
		while($fortune_slider->have_posts()):
		 	$fortune_slider->the_post(); 
				$slider_image_id = get_post_thumbnail_id();
				$slider_image = wp_get_attachment_image_src( $slider_image_id, 'fortune_slider');
				echo '<img class="img_responsive" src="'.$slider_image[0].'" alt="slidebg1" title="'.esc_attr(get_the_content()).'">';
		 endwhile;
		 endif;?>
		</div>
    </div>
  </div>
</div>
