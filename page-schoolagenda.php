<?php
/**
 * Template Name: Schoolagenda
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
                <?php echo get_the_content();?>
			</div>
		</div>
	</div>
</section>


<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
