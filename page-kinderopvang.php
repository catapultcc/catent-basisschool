<?php

/**
 * Template Name: Kinderopvang
 */
get_header();

if (have_posts()) : while (have_posts()) : the_post();
?>

<style>
	.inner-introblok {
		border-radius: 15px;
	}
	.inner-introblok .icoon {
		position: relative;
		top: -50px;
		border-radius: 50%;
		width: 100px;
	}
</style>

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
				<img class="d-lg-none" src="<?php echo $afbeelding_url; ?>" alt="<?php the_title(); ?>" width="100%">
            </div>
			<div id="home-intro-tekst" class="col-12 <?php echo $colclass;?> d-flex align-items-center">
				<div class="d-inline-block">
                    <h1 class="mb-4"><span class="tekst-secondair"><?php the_title(); ?></span><br><?php the_field('subtitel_pagina'); ?></h1>
					<?php if(!is_single()): ?>
						<?php if( get_field('headerafbeelding_rechts')): ?>
						<div class="pb-2 pr-0 pr-md-5 home-intro-tekst-inner">
							<?php
							if( get_field('intro_header') ) : 
								echo get_field('intro_header'); 
							endif;
							?>
						</div>
						<?php endif; ?>
					<?php endif; ?>
                </div>
			</div>
		</div>
	</div>
</section>

<?php include_once('includes/header-vervolg-breadcrumbs.php'); ?>

<section id="content" class="vlak-lichtgrijs pt-3 pb-3">
	<div class="container">
		<div class="row row-eq-height pt-5">
		<?php
		if( have_rows('introblokken') ):
			while ( have_rows('introblokken') ) : the_row(); ?>
			<div class="col-12 col-md-4 pt-4">
				<div class="inner-introblok h-100 vlak-wit px-3 px-lg-5 pb-5 text-center">
					<img class="icoon" src="<?php the_sub_field('introblok_icoon'); ?>" alt="<?php the_sub_field('introblok_titel'); ?>">
					<h3 class="rem15 mt-0 pt-0 tekst-primair"><?php the_sub_field('introblok_titel'); ?></h3>
				</div>
			</div>
			<?php
			endwhile;
		endif;
		?>
		</div>
		<div class="row pt-5">
			<div class="col-12 pt-5 pb-3">
				<h2>Het team</h2>
			</div>
		</div>
	</div>
</section>

<section id="team" style="background-color: <?php the_field('kleurvlak_team'); ?>">
	<div class="container">
		<div class="row pt-5 pb-5">
			<div class="col-12 col-md-4">
				<div class="row">
					<div class="col-12">
						<p class="mb-5 rem15"><strong>Locatiecoördinator</strong></p>
					</div>
					<div class="col-4">
						<img class="rounded-circle w-100" src="<?php the_field('locatiecoordinator_foto'); ?>" alt="Locatiecoördinator" width="100%">
					</div>
					<div class="col-6 col-sm-8 d-flex align-items-center">
						<p><?php the_field('locatiecoordinator_tekst'); ?></p>
					</div>
				</div>
			</div>
			
			<?php
			if( have_rows('leidsters') ): $teller2 = 0;
				while ( have_rows('leidsters') ) : the_row(); $teller2 ++; ?>
				<div class="col-12 col-md-4">
					<div class="row">
						<?php if ($teller2 == 1) : ?>
						<div class="col-12">
							<p class="mb-5 rem15"><strong>Leidsters</strong></p>
						</div>
						<?php else: ?>
						<div class="col-12">
							<p class="mb-5 rem15"><strong>&nbsp;</strong></p>
						</div>
						<?php endif; ?>
						<div class="col-4">
							<img class="rounded-circle w-100" src="<?php the_sub_field('leidster_foto'); ?>" alt="Locatiecoördinator" width="100%">
						</div>
						<div class="col-6 col-sm-8 d-flex align-items-center">
							<p><?php the_sub_field('leidster_naam'); ?></p>
						</div>
					</div>
				</div>
				<?php 
				endwhile;
			endif;
			?> 
		</div>
	</div>
</section>

<section id="over" class="vlak-wit">
	<div class="container">
		<div class="row pt-5 pb-5">
			
			<?php
			if( have_rows('over_kinderopvang_opsomming') ):
				while ( have_rows('over_kinderopvang_opsomming') ) : the_row(); ?>
				<div class="col-1 mb-4 pr-lg-3">
					<span class="social-icons-header">
                    	<span class="fa-stack rem15 tekst-primair" style="margin-top:-8px"> <i class="fa fa-circle fa-stack-2x" aria-hidden="true"></i> <i class="fal fa-long-arrow-right fa-stack-1x fa-inverse" aria-hidden="true"></i></span>
          			</span>
				</div>
				<div class="col-11 mb-4">
					<h3 class="rem13"><?php the_sub_field('titel'); ?></h3>
					<?php the_sub_field('tekst'); ?>
				</div>
				<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>

<section id="visieslider">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 p-0">
				<div class="owl-carousel owl-theme " id="visie-slider">
					<?php
					if( have_rows('slider_beelden') ):
                        while ( have_rows('slider_beelden') ) : the_row();
                            if ( get_sub_field('slide_foto') ): $t=0; $t++;
                                $slideAfbeelding = get_sub_field('slide_foto');
                                $size = 'large';
                                $afbeeldingID = $slideAfbeelding['ID'];
                                $afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
                                $afbeelding_url = $afbeelding_array[0];
                            endif; ?>
						<div class="item p-0">
							<img src="<?php echo $afbeelding_url; ?>" alt="Stel je vraag aan" width="100%">
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

<section id="content" style="background-color: <?php the_field('kleurvlak_team'); ?>">
	<div class="container">
		<div class="row pt-5">
			<div class="col-12 pt-5 pb-5">
				<h2>Praktische informatie</h2>
			</div>
		</div>
		<div class="row pb-5">
			<!-- ACCORDION KO -->
			<?php
            if( have_rows('tekstblokken_ko') ): $blokTeller = 0; ?>
			<div class="col-12">
				<p class="mb-4"><strong>Kinderopvang</strong></p>
                <div id="visie1">
                    <?php
					while ( have_rows('tekstblokken_ko') ) : the_row(); $blokTeller++; 
						$visieAfbeelding = get_sub_field('foto');
						$size = 'full';
						$afbeeldingID = $visieAfbeelding['ID'];
						$afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
						$afbeelding_url = $afbeelding_array[0];
                    ?>
					<div class="card pl-1">
						<div class="card-header" id="heading-<?php echo $blokTeller;?>">
							<h4>
								<div data-toggle="collapse" data-target="#collapse-<?php echo $blokTeller;?>" aria-expanded="false" aria-controls="collapse-<?php echo $blokTeller;?>" class="pl-0 btn-link text-left"  onclick="gtag('event', 'Klik', { event_category:  'PLUS - <?php echo get_the_title();?>', event_action: '<?php echo get_sub_field('titel');?>'});">
									<?php echo get_sub_field('titel');?>
								</div>
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
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>
			
			<!-- ACCORDION BSO -->
			<?php
            if( have_rows('tekstblokken_bso') ): $blokTellerBSO = 100; ?>
			<div class="col-12 mt-5">
				<p class="mb-4"><strong>Buitenschoolse opvang</strong></p>
                <div id="visie1">
                    <?php
					while ( have_rows('tekstblokken_bso') ) : the_row(); $blokTellerBSO++; 
						$visieAfbeeldingBSO = get_sub_field('foto');
						$sizeBSO = 'full';
						$afbeeldingIDBSO = $visieAfbeeldingBSO['ID'];
						$afbeeldingArrayBSO = wp_get_attachment_image_src($afbeeldingIDBSO, $sizeBSO);
						$afbeeldingUrlBSO = $afbeeldingArrayBSO[0];
                    ?>
					<div class="card pl-1">
						<div class="card-header" id="heading-<?php echo $blokTellerBSO;?>">
							<h4>
								<div data-toggle="collapse" data-target="#collapse-<?php echo $blokTellerBSO;?>" aria-expanded="false" aria-controls="collapse-<?php echo $blokTellerBSO;?>" class="pl-0 btn-link text-left"  onclick="gtag('event', 'Klik', { event_category:  'PLUS - <?php echo get_the_title();?>', event_action: '<?php echo get_sub_field('titel');?>'});">
									<?php echo get_sub_field('titel');?>
								</div>
							</h4>
						</div>
						<div id="collapse-<?php echo $blokTellerBSO;?>" class="collapse pt-2 pl-3 mb-3" aria-labelledby="heading-<?php echo $blokTellerBSO;?>" data-parent="" >
							<div class="card-body pl-0 pt-0">
								<?php echo get_sub_field('tekst'); ?>
								<?php if(get_sub_field('foto')) { ?>
                                <img class="mb-4 mt-2" src="<?php echo $afbeeldingUrlBSO; ?>" alt="<?php echo get_sub_field('titel');?>" width="100%">
                                <?php } ?>
                                <hr />
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>