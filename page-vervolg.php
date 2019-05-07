<?php
/**
 * Template Name: Vervolg
 */
get_header();

if (have_posts()) : while (have_posts()) : the_post();
?>

<?php include_once('includes/header-vervolg-intro.php'); ?>

<?php include_once('includes/header-vervolg-breadcrumbs.php'); ?>

<section id="content" class="vlak-lichtgrijs pt-3 pb-3">
	<div class="container">
		<div class="row pb-5">
			<div class="col-12 ">
                <?php the_content();?>
			</div>
		</div>
	</div>
</section>

<?php if( get_field('tekstblok_1') ): ?>
<section id="content-1" class="pt-3 pb-3 vlak-lichtgrijs">
	<div class="container">
		<div class="row pt-5 pb-5">
			<div class="col-12">
				<?php the_field('tekstblok_1'); ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( get_field('slider_beelden') ): ?>
<section id="visieslider" class="">
	<div class="container-fluid mb-5 " >
		<div class="row">
			<div class="col-12 p-0">
				<div class="owl-carousel owl-theme " id="visie-slider">
					<?php
					if( have_rows('slider_beelden') ):
                        while ( have_rows('slider_beelden') ) : the_row();
                            if ( get_sub_field('slide_foto') ): $t=0; $t++;
                                $slideAfbeelding = get_sub_field('slide_foto');
                                $size = 'medium';
                                $afbeeldingID = $slideAfbeelding['ID'];
                                $afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
                                $afbeelding_url = $afbeelding_array[0];
                            endif; ?>
						<div class="item p-0">
							<img class="" src="<?php echo $afbeelding_url; ?>" alt="Visie Catent " width="100%">
						</div>
						<?php
						endwhile;
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
