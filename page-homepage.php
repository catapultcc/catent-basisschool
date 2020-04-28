<?php
/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if ( get_field('headerafbeelding_rechts') ):
    $hoofdAfbeelding = get_field('headerafbeelding_rechts');
    $size = 'full';
    $afbeeldingID = $hoofdAfbeelding['ID'];
    $afbeeldingAlt = $hoofdAfbeelding['alt'];
    $afbeeldingArray = wp_get_attachment_image_src($afbeeldingID, $size);
    $afbeeldingUrl = $afbeeldingArray[0];
endif; ?>

<section id="home-intro" style="overflow: hidden">
	<div class="container ">
		<div class="row row-eq-height">
            <?php if( get_field('youtube_video') == ''): ?>
            <div class="col-12 d-lg-none p-0">
                <img class="d-lg-none" src="<?php echo $afbeeldingUrl; ?>" alt="<?php echo $afbeeldingAlt; ?>" width="100%">
            </div>
            <style>
            @media (min-width: 992px) { 
                #home-intro-rechts {
                    background-image: url('<?php echo $afbeeldingUrl; ?>'); 
                    background-size: cover;
                } 
                #home-intro-tekst {
                    height: 50vh
                }
            }
            </style>
            <?php endif; ?>
			<div id="home-intro-tekst" class="col-12 col-lg-6 d-flex pb-3 align-items-center pt-2 pt-md-5">
				<div class="d-inline-block">
                    <h3 class="mb-2 mt-5 mt-lg-0"><?php echo get_field('subtitel_pagina');?></h3>
                    <h1 class="mb-4"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
					<div class="intro-buttons mt-4 mb-3">
						<?php if( get_field('button_1_intro_link') ): ?>
							<a href="<?php the_field('button_1_intro_link'); ?>" class="button button-secondair mr-3 mb-2"><?php the_field('button_1_intro_tekst'); ?> <i class="fal fa-long-arrow-right"></i></a>
						<?php endif; ?>
						<?php if( get_field('button_2_intro_link') ): ?>
							<a href="<?php the_field('button_2_intro_link'); ?>" class="button button-secondair"><?php the_field('button_2_intro_tekst'); ?> <i class="fal fa-long-arrow-right"></i></a>
						<?php endif; ?>
					</div>
                </div>
			</div>
            <?php if( get_field('youtube_video') ): ?>
            <div class="col-12 col-lg-6" >
                <div style="position:relative;padding-top:56.6%; margin-top: 10vh;">
                    <iframe  src="https://www.youtube.com/embed/<?php echo get_field('youtube_video');?>?controls=0&autoplay=1&fs=0&loop=1&rel=0&showinfo=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" frameborder="0" allowfullscreen style="position:absolute;top:0;left:0;width:99%;height:99%;border:2px solid #fff" ></iframe>
                </div>
            </div>
            <?php else : ?>
            <div class="col-12 col-lg-6" style="overflow-x: visible;">
                <div id="home-intro-rechts" class="rem30 tekst-secondair d-none d-md-block">
                </div>
            </div>
            <?php endif; ?>
		</div>
	</div>
</section>

<section id="blokken" class="pt-3 pb-2 vlak-lichtgrijs">
	<div class="container">
		<div class="row pt-5 pb-2">
			<?php
			if( have_rows('blokken') ): $blokTeller = 0;
				while ( have_rows('blokken') ) : the_row(); $blokTeller++; ?>
            <div class="col-12 col-md-<?php if($blokTeller <= 3){echo'4';}else{echo'6';}?> col-lg-4 mb-4 vierkant-wrapper">
                <a href="<?php the_sub_field('blok_link'); ?>" onclick="gtag('event', 'Klik', { event_category:  'Homepage', event_action: '<?php echo strip_tags(get_sub_field('blok_titel')); ?>'});"> 
                    <div class="blok-inner 
                                <?php if($blokTeller == 1) : echo "vlak-primair"; endif; ?>
                                <?php if($blokTeller <= 3) : echo "blok-inner-uitgelicht vierkant-box"; endif; ?>
                                ">
                        <h3 class="<?php if($blokTeller == 1) : echo "tekst-wit"; endif; ?>"><?php the_sub_field('blok_titel'); ?></h3>
                        <?php
                            echo '<div class="icoon-hoek';
                            if($blokTeller == 1) : echo ' tekst-wit '; endif;
                            echo '">'.get_sub_field('blok_icoon').'</div>'; 
                        ?>
                        <div class="arrow-hoek <?php if($blokTeller == 1) : echo "tekst-wit"; endif; ?>">
                            <i class="fal fa-long-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
				<?php 
				endwhile;
			endif;
			?>
            <div class="col-12 col-md-6 col-lg-4 mb-4 vierkant-wrapper">
                <a href="https://www.catent.nl/" target="_blank"  onclick="gtag('event', 'Klik', { event_category:  'Homepage', event_action: 'Website Catent'});">
                    <div class="blok-inner ">
                        <h3>Onderdeel van<br class="d-none d-xl-inline"> Stichting Catent</h3>
                        <div class="arrow-hoek ">
                            <i class="fal fa-long-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
		</div>
	</div>
</section>

<section id="wat-zeggen" class="pt-2 pb-3 vlak-lichtgrijs">
	<div class="container">
		<div class="row pt-5 pb-5">
			<?php if( have_rows('slider') ): ?>
			<div class="col-12 center">
				<h3>Wat zeggen</h3>
				<h2>onze ouders en leerlingen</h2>
			</div>
            <?php endif; ?>
		</div>
	</div>
	<?php
	if ( get_field('achtergrondafbeelding_slider') ):
		$hoofdAfbeelding1 = get_field('achtergrondafbeelding_slider');
		$size1 = 'full';
		$afbeeldingID1 = $hoofdAfbeelding1['ID'];
		$afbeelding_array1 = wp_get_attachment_image_src($afbeeldingID1, $size1);
		$afbeelding_url1 = $afbeelding_array1[0];
	endif; ?>
	<div class="container-fluid mb-5 ouders-slider-wrapper" style="background-image: url(<?php echo $afbeelding_url1; ?>)">
		<div class="row">
			<div class="col-12 col-md-8 offset-md-2">
				<div class="owl-carousel owl-theme pt-5" id="ouders-slider">
					<?php
                    $tel = 0;
					if( have_rows('slider') ):
						while ( have_rows('slider') ) : the_row(); $tel++;
                            if($tel < 6) :
                                if ( get_sub_field('slide_foto')) :
                                    $hoofdAfbeelding = get_sub_field('slide_foto');
                                    $size = 'medium';
                                    $afbeeldingID = $hoofdAfbeelding['ID'];
                                    $afbeelding_array = wp_get_attachment_image_src($afbeeldingID, $size);
                                    $afbeelding_url = $afbeelding_array[0];
                                endif; ?>
                                <div class="item center">
                                    <p><?php the_sub_field('slide_tekst'); ?></p>
                                    <p>- <?php the_sub_field('slide_naam'); ?> -</p>
                                </div>
						<?php
                            endif;
						endwhile;
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
<?php
if( have_rows('slider') ): $slideTeller = 0;
	while ( have_rows('slider') ) : the_row(); $slideTeller++;
        $hoofdAfbeelding2 = get_sub_field('slide_foto');
        $size2 = 'medium';
        $afbeeldingID2 = $hoofdAfbeelding2['ID'];
        $afbeelding_array2 = wp_get_attachment_image_src($afbeeldingID2, $size2);
        $afbeelding_url2 = $afbeelding_array2[0];
    ?>
		#ouders-slider .owl-dots .owl-dot:nth-child(<?php echo $slideTeller; ?>) > span {
			background-image: url(<?php echo $afbeelding_url2; ?>);
		}
<?php
	endwhile;
endif;
?>
</style>

<?php endwhile; endif; ?>

<?php get_footer(); ?>