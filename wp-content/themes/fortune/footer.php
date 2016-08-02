<!-- Footer -->
<?php $fortune_theme_options = fortune_theme_options();
$col = 12 / (int)$fortune_theme_options['footer_layout']; ?>
<footer class="footer" id="footer">
  <div class="footer-widgets">
    <div class="container">
      <div class="row">
        <?php if (is_active_sidebar('footer-widget')) {
					dynamic_sidebar('footer-widget');
				} else {
					$args = array(
						'before_widget' => '<div class="col-sm-6 col-md-'.$col.'">
				<div class="widget_categories widget widget__footer">',
						'after_widget' => '</div></div>',
						'before_title' =>' <h3 class="widget-title">',
						'after_title' => '</h3>',
					);
					the_widget('WP_Widget_Tag_Cloud', null, $args);
					the_widget('WP_Widget_Meta', null, $args);
				} ?>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4"> <?php echo esc_attr($fortune_theme_options['footer_copyright'] . ' ' . $fortune_theme_options['developed_by_text']); ?>
                    <a href="<?php echo esc_url($fortune_theme_options['developed_by_link']); ?>"><?php echo esc_attr($fortune_theme_options['developed_by_link_text']); ?></a> </div>
		<?php	if($fortune_theme_options['social_footer']){ ?>
        <div id="social_footer" class="col-sm-6 col-md-8">
          <div class="social-links-wrapper"> <span class="social-links-txt"><?php _e('Connect with us', 'fortune'); ?></span>
            <ul class="social-links social-links__dark">
             <?php if($fortune_theme_options['social_facebook_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_facebook_link']);?>"><i class="fa fa-facebook"></i>
        </a> </li><?php
		} 
		if($fortune_theme_options['social_twitter_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_twitter_link']);?>"><i class="fa fa-twitter"></i>

        </a> </li><?php
		}
		if($fortune_theme_options['social_instagram_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_instagram_link']);?>"><i class="fa fa-instagram"></i>
        </a> </li><?php
		}
		if($fortune_theme_options['social_linkedin_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_linkedin_link']);?>"><i class="fa fa-linkedin"></i>
        </a> </li><?php
		}
		if($fortune_theme_options['social_youtube_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_youtube_link']);?>"><i class="fa fa-youtube"></i>
        </a> </li><?php
		}
		if($fortune_theme_options['social_google_plus_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_google_plus_link']);?>"><i class="fa fa-google-plus"></i>
        </a> </li><?php
		} ?>
            </ul>
          </div>
        </div><?php
		}
		?>
      </div>
    </div>
  </div>
</footer>
<!-- Footer / End -->
</div>
<!-- Main / End -->
</div>
<?php 
if($fortune_theme_options['custom_css']!=""){?>
<style type="text/css"><?php echo esc_textarea($fortune_theme_options['custom_css']); ?></style>
<?php }
wp_footer();?>
</body>
</html>