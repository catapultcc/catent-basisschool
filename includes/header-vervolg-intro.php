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

<?php
if (is_page("contact")) :
	$fotoSchoolhoofd = get_field('foto_schoolhoofd');
	$size2 = 'medium';
	$afbeeldingID2 = $fotoSchoolhoofd['ID'];
	$afbeeldingArray2 = wp_get_attachment_image_src($afbeeldingID2, $size2);
	$afbeeldingUrl2 = $afbeeldingArray2[0];
endif;
?>

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
                    <h3 class="mb-2 mt-4 mt-md-0"><?php the_field('subtitel_pagina'); ?></h3>
                    <h1 class="mb-4"><?php the_title(); ?></h1>
					<?php if(!is_single()): ?>
						<?php if( get_field('headerafbeelding_rechts')): ?>
						<div class="pb-2 pr-0 pr-md-5 home-intro-tekst-inner">
							<?php
							if( get_field('intro_header') ) : 
								echo get_field('intro_header'); 
							endif;
							if (is_page("contact")) : ?>
							<img class="rounded-circle contactfoto mt-3 mb-3" src="<?php echo $afbeeldingUrl2; ?>" alt="Basischool directeur">
							<?php endif; ?>
						</div>
						<?php endif; ?>
					<?php endif; ?>
                </div>
			</div>
		</div>
	</div>
</section>
