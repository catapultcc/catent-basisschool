<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php include_once('includes/header-vervolg-intro.php'); ?>

<?php include_once('includes/header-vervolg-breadcrumbs.php'); ?>

<section id="nieuws" class="vlak-lichtgrijs pb-3">
	<div class="container">
		<div class="row mb-5">
			<div class="col-12 light">
                <?php 
                    $hoofdAfbeelding = get_field('nieuwsfoto');
                    $size = 'full';
                    $afbeeldingID = $hoofdAfbeelding['ID'];
                    $afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
                    $afbeelding_url = $afbeelding_array[0];
                ?>
                
                <img src="<?php echo $afbeelding_url; ?>" alt="<?php the_title(); ?>" class="w-100" width="100%">
                
                <div class="mt-4 ">
                    <?php the_content(); ?>
                </div>
                
                <div class="mt-4 mb-5">
                    <a href="#" onclick="javascript:history.go(-1);" class="button button-secondair animated fadeInLeft delay-3s "><i class="fal fa-long-arrow-left"></i> Ga terug</a>
                </div>
			</div>
		</div>
	</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>  