<?php get_header(); ?>

<?php
$colclass = 'col-md-10';
if ( get_field('headerafbeelding_rechts') ):
    $colclass = 'col-xl-6';
	$hoofdAfbeelding = get_field('headerafbeelding_rechts');
	$size = 'full';
	$afbeeldingID = $hoofdAfbeelding['ID'];
	$afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
	$afbeelding_url = $afbeelding_array[0];
?>
<style>@media (min-width: 1200px) { #vervolg-intro {background-image: url('<?php echo $afbeelding_url; ?>')} }</style>
<?php endif; ?>

<section id="vervolg-intro">
	<div class="container">
		<div class="row py-5 py-md-0">
            <div class="col-12 p-0 p-md-3 mt-md-5 mt-lg-0 foto-rechts">
				<?php if( get_field('headerafbeelding_rechts') ): ?>
                	<img class="d-lg-none" src="<?php echo $afbeelding_url; ?>" alt="<?php the_title(); ?>" width="100%">
				<?php endif; ?>
            </div>
			<div id="home-intro-tekst" class="col-12 <?php echo $colclass;?> d-flex align-items-center">
				<div class="d-inline-block">
                    <h3 class="mb-2 mt-4 mt-md-0">Zoekresultaten:</h3>
                    <h1 class="mb-4"><?php echo the_search_query(); ?></h1>
					<?php if(!is_single()): ?>
						<?php if( get_field('headerafbeelding_rechts')): ?>
						<div class="pb-2 pr-0 pr-md-5 home-intro-tekst-inner">
						</div>
						<?php endif; ?>
					<?php endif; ?>
                </div>
			</div>
		</div>
	</div>
</section>

<?php include_once('includes/header-vervolg-breadcrumbs.php'); ?>

<section id="zoeken" class="vlak-lichtgrijs">
	<div class="container">
		<div class="row pt-3 mb-3">
			<div class="col-12">
				Aantal resultaten: <span id="aantal"></span>
			</div>
			<div class="col-12 mt-3 mb-3">
				<?php
				$aantal = 0;
				if (have_posts()) :
					while (have_posts()) : the_post();?>
					<div class="col-12 pb-4 px-0">
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
						<a class="button button-secondair" href="<?php the_permalink(); ?>" >Lees verder</a>
					</div>
				<hr>
				<?php
					$aantal ++;	
				   endwhile;
				endif;
				?>
				<script>
				jQuery(document).ready(function(){
					jQuery("#aantal").text(<?php echo $aantal; ?>);
				});
				</script>
				<?php if($aantal == 0) {?>
					<div class="col-12">
						<h3>Geen resultaten</h3>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>