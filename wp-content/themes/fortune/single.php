<?php get_header(); ?>
<!-- Page Heading -->
<section class="page-heading">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="col-md-6">
				<?php fortune_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</section>
<section class="page-content">
	<div class="container">

		<div class="row">
			<div class="content col-md-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!-- Post (Standard Format) -->
				<article class="entry entry__standard entry__with-icon">
					<div class="entry-icon visible-md visible-lg"><?php
					if(has_post_thumbnail()){
						echo '<i class="fa fa-image"></i>';
						}else{
							echo '<i class="fa fa-pencil"></i>';
						}?>
					</div>
					<header class="entry-header">
						<h2><?php the_title(); ?></h2>
						<div class="entry-meta">
							<span class="entry-date"><?php echo get_the_date(get_option('date_format'), true); ?></span>
							<span class="entry-comments">
								<?php esc_url(comments_popup_link(__('No Comments', 'fortune'), __('1 Comment', 'fortune'), __('% Comments', 'fortune'))); ?>
							</span>
							<span class="entry-category"><?php _e('in ','fortune');  echo get_the_category_list(','); ?></span>
							<span class="entry-author">
								<?php _e('by','fortune'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
								<?php esc_attr(the_author()); ?></a>
							</span>
						</div>
					</header><?php
						if(has_post_thumbnail()){
							$post_image_id = get_post_thumbnail_id();
							$post_image = wp_get_attachment_image_src( $post_image_id , 'full'); ?>
						<figure class="alignnone post-thumb entry-thumb">
							<a href="<?php echo esc_url($post_image[0]);?>" class="popup-link zoom">
							<?php the_post_thumbnail('fortune_post_single');?>
							</a>
						</figure><?php
						} ?>
					<div class="entry-content">
						<?php the_content();
						wp_link_pages(); ?>
					</div>
					<div class="post-nav">
				<?php next_post_link('%link', '<i class="fa fa-long-arrow-left"></i> ' . __('Previous Post', 'fortune') ); ?>
				<?php previous_post_link('%link', __('Next', 'fortune') . ' <i class="fa fa-long-arrow-right"></i>'); ?>
				</div>
				</article>
				<!-- Post (Standard Format) / End -->
				
				<!-- Comments -->
				 <?php endwhile; endif; comments_template('', true); ?>
				<!-- Comments / End -->
				
			</div>
			<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<?php get_footer();?>