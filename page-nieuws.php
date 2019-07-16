<?php
/**
 * Template Name: Nieuws
 */
?>

<?php get_header(); ?>
    

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php include_once('includes/header-vervolg-intro.php'); ?>

<?php include_once('includes/header-vervolg-breadcrumbs.php'); ?>

<style>
.bg-foto {
    background-size: cover;
    width: 100%;
    height: 250px;
    background-position: center;
    overflow: hidden;
}
</style>
    
<section id="nieuws" class="pt-3 pb-3 vlak-lichtgrijs">
	<div class="container pb-5">
		<div class="row">
			<div class="col-12">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="row row-eq-height">
			<?php 
			$args_nieuws = array (
				'post_type' 		=> 'post',
				'posts_per_page'	=> -1,
				'post_status' 		=> 'publish', 
				'orderby' 			=> 'date',
				'order' 			=> 'DESC',
			);
			$query_nieuws = new WP_Query( $args_nieuws );
			if ($query_nieuws->have_posts()) :
				while ($query_nieuws->have_posts()) :
				$query_nieuws->the_post(); ?>
				<div class="col-12 col-md-6 col-lg-4 fadeIn wow mt-4 grid-item">
					<?php if( get_field('nieuwsfoto') ): 
						$hoofdAfbeelding = get_field('nieuwsfoto');
						$size = 'large';
						$afbeeldingID = $hoofdAfbeelding['ID'];
						$afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
						$afbeelding_url = $afbeelding_array[0];
					?>
					<a href="<?php the_permalink(); ?>">
						<div class="bg-foto mb-3 hoef" style="background-image: url('<?php echo $afbeelding_url; ?>');"></div>
					</a>
					<?php endif; ?>
					
						<h5 class="tekst-secondair"><?php the_title(); ?></h5>
					
					<div class="blok-tekst mt-4">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="button button-secondair animated fadeInLeft delay-3s mt-2 mb-5">Lees verder <i class="fal fa-long-arrow-right"></i></a>
				</div>
				<?php 
				endwhile;
			endif;
			wp_reset_query();
			?>
		</div>
	</div>
</section>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>
	
