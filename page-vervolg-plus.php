<?php
/**
 * Template Name: Vervolg met plusjes
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
				
                <div id="visie1" class="">
					
                    <?php
                    if( have_rows('tekstblokken') ): $blokTeller = 0;
                        while ( have_rows('tekstblokken') ) : the_row(); $blokTeller++; 
                            $visieAfbeelding = get_sub_field('foto');
                            $size = 'full';
                            $afbeeldingID = $visieAfbeelding['ID'];
                            $afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
                            $afbeelding_url = $afbeelding_array[0];
                    ?>
					<div class="card pl-1">
						<div class="card-header" id="heading-<?php echo $blokTeller;?>">
							<h4 class="">
								<button data-toggle="collapse" data-target="#collapse-<?php echo $blokTeller;?>" aria-expanded="false" aria-controls="collapse-<?php echo $blokTeller;?>" class="pl-0 btn-link text-left"  onclick="gtag('event', 'Klik', { event_category:  'PLUS - <?php echo get_the_title();?>', event_action: '<?php echo get_sub_field('titel');?>'});">
									<?php echo get_sub_field('titel');?>
								</button>
							</h4>
						</div>
						<div id="collapse-<?php echo $blokTeller;?>" class="collapse pt-2 pl-3 mb-3" aria-labelledby="heading-<?php echo $blokTeller;?>" data-parent="" >
							<div class="card-body pl-0 pt-0">
								<?php echo get_sub_field('tekst'); ?>
								<?php if(get_sub_field('foto')) { ?>
                                <img class="mb-4 mt-2" src="<?php echo $afbeelding_url; ?>" alt="<?php echo get_sub_field('titel');?>" width="100%">
                                <?php } ?>
                                <hr />
							</div>
						</div>
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


<?php /*?><section id="content" class="pt-3 pb-3 vlak-lichtgrijs">
	<div class="container">
		<div class="row pt-5 pb-5">
			<div class="col-12 pl-0">
				
                <div id="visie1" class="panel-group">
					
                    <?php
                    if( have_rows('tekstblokken') ): $blokTeller = 0;
                        while ( have_rows('tekstblokken') ) : the_row(); $blokTeller++; 
                            $visieAfbeelding = get_sub_field('foto');
                            $size = 'medium';
                            $afbeeldingID = $visieAfbeelding['ID'];
                            $afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
                            $afbeelding_url = $afbeelding_array[0];
                    ?>
					<div class="panel panel-default">
						<div class="panel-heading ">
							<h4 class="panel-title">
								<button data-toggle="collapse" href="#content-<?php echo $blokTeller;?>" class="text-left"  data-parent="#visie1">
									<?php echo get_sub_field('titel');?>
								</button>
							</h4>
						</div>
						<div id="content-<?php echo $blokTeller;?>" class="panel-collapse collapse pt-4 pl-3 mb-5">
							<div class="panel-body ">
                                <img class="mb-4" src="<?php echo $afbeelding_url; ?>" alt="<?php echo get_sub_field('titel');?>" width="100%">
								<?php echo get_sub_field('tekst');?> 
                                <hr />
							</div>
						</div>
					</div>
					<?php 
						endwhile; 
					endif;
					?>
					
				</div>
                
			</div>
		</div>
	</div>
</section><?php */?>


<?php
if ( get_field('slider_beelden') ):
?>
<section id="visieslider" class="">
	<div class="container-fluid  " >
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
							<img class="" src="<?php echo $afbeelding_url; ?>" alt="Stel je vraag aan" width="100%">
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
