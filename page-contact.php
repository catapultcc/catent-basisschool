<?php
/**
 * Template Name: Contact
 */
?>

<?php get_header(); ?>

<?php include_once('includes/header-vervolg-intro.php'); ?>

<?php include_once('includes/header-vervolg-breadcrumbs.php'); ?>
    
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section id="intro" class="vlak-lichtgrijs">
	<div class="container">
		<div class="row">
			<div class="contactformulier col-12 col-md-8 pb-5">
				<?php echo do_shortcode(get_field('contactformulier'));?>
			</div>
            
			<div class="col-12 col-md-4 pb-5">
                <h3 class="tekst-groen mb-3"><?php bloginfo('name'); ?></h3>
				<?php echo str_replace('</p>','',get_field('contactinformatie')); ?><br />
                <a href="tel:<?php echo get_field('telefoonnummer', 'option'); ?>">T. <?php echo get_field('telefoonnummer', 'option'); ?></a></p>
				<div class="social-icons">
					<?php if( get_field('e-mailadres', 'option') ): ?>
					<a class="m-0" href="mailto:<?php echo antispambot(get_field('e-mailadres', 'option')); ?>">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
						</span>
					</a>
					<?php endif;
					if( get_field('google_maps_link', 'option') ): ?>
					<a class="m-0" href="<?php echo get_field('google_maps_link', 'option'); ?>" target="_blank">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fas fa-map-marker-alt fa-stack-1x fa-inverse"></i>
						</span>
					</a>
					<?php endif;
					if( get_field('social_media_linkedin', 'option') ): ?>
					<a class="m-0" href="<?php echo get_field('social_media_linkedin', 'option'); ?>" target="_blank">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
						</span>
					</a>
					<?php endif;
					if( get_field('social_media_twitter', 'option') ): ?>
					<a class="m-0" href="<?php echo get_field('social_media_twitter', 'option'); ?>" target="_blank">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
						</span>
					</a>
					<?php endif;
					if( get_field('social_media_facebook', 'option') ): ?>
					<a class="m-0" href="<?php echo get_field('social_media_facebook', 'option'); ?>" target="_blank">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
						</span>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php endwhile; endif; wp_reset_postdata(); ?>
	
<?php get_footer(); ?>