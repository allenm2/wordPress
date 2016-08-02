<?php $fortune_theme_options = fortune_theme_options(); 
if($fortune_theme_options['social_home']==false) return; ?>
<!-- Social Links -->
<div class="social-links-section social-links-section__dark icons-rounded">
  <div class="container">
    <ul><?php if($fortune_theme_options['social_facebook_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_facebook_link']);?>"><i class="fa fa-facebook fa-lg"></i>
        <h5><?php _e('Facebook','fortune');?></h5>
        </a> </li><?php
		} 
		if($fortune_theme_options['social_twitter_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_twitter_link']);?>"><i class="fa fa-twitter fa-lg"></i>
        <h5><?php _e('Twitter','fortune');?></h5>
        </a> </li><?php
		}
		if($fortune_theme_options['social_instagram_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_instagram_link']);?>"><i class="fa fa-instagram fa-lg"></i>
        <h5><?php _e('instagram','fortune');?></h5>
        </a> </li><?php
		}
		if($fortune_theme_options['social_linkedin_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_linkedin_link']);?>"><i class="fa fa-linkedin fa-lg"></i>
        <h5><?php _e('linkedin','fortune');?></h5>
        </a> </li><?php
		}
		if($fortune_theme_options['social_youtube_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_youtube_link']);?>"><i class="fa fa-youtube fa-lg"></i>
        <h5><?php _e('youtube','fortune');?></h5>
        </a> </li><?php
		}
		if($fortune_theme_options['social_google_plus_link']!=""){?>
      <li> <a href="<?php echo esc_url($fortune_theme_options['social_google_plus_link']);?>"><i class="fa fa-google-plus fa-lg"></i>
        <h5><?php _e('Google+','fortune');?></h5>
        </a> </li><?php
		} ?>
    </ul>
  </div>
</div>
<!-- Social Links / End -->