<?php
/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'large' );?>

<style>@media (min-width: 992px) { 
    /* #home-intro {background-image: url('<?php echo $image_attributes[0]; ?>'); */
    } }</style>

<section id="home-intro">
	<div class="container ">
		<div class="row pt-2 pt-md-5">
            <div class="col-12 p-0">
                <img class="d-lg-none" src="<?php echo $image_attributes[0]; ?>" alt="<?php the_title(); ?>" width="100%">
            </div>
			<div id="home-intro-tekst" class="col-12 col-lg-6 d-flex pb-3 align-items-center">
				<div class="d-inline-block">
                    <h3 class="mb-2 mt-3 mt-lg-0"><?php echo get_field('subtitel_pagina');?></h3>
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
            <div class="d-none d-lg-block col-lg-6 " >
                <div class="d-inline rem30 tekst-secondair">

                        
                        <iframe src="https://player.vimeo.com/video/333334061?autoplay=1&loop=1&title=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        <script src="https://player.vimeo.com/api/player.js"></script>

                </div>
            </div>
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
                <a href="<?php the_sub_field('blok_link'); ?>"  onclick="gtag('event', 'Klik', { event_category:  'Homepage', event_action: '<?php echo strip_tags(get_sub_field('blok_titel')); ?>'});"> 
                    <div class="blok-inner 
                                <?php if($blokTeller == 1) : echo "vlak-primair"; endif; ?>
                                <?php if($blokTeller <= 3) : echo "blok-inner-uitgelicht vierkant-box"; endif; ?>
                                ">
                        <h3 class="<?php if($blokTeller == 1) : echo "tekst-wit"; endif; ?>"><?php the_sub_field('blok_titel'); ?></h3>
                        <?php
                        //if($blokTeller <= 3) : 
                            echo '<div class="icoon-hoek';
                            if($blokTeller == 1) : echo ' tekst-wit '; endif;
                            echo '">'.get_sub_field('blok_icoon').'</div>'; 
                        //endif; ?>
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
                <a href="https://www.catent.nl/" target="_blank">
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
			<div class="col-12 center">
				<h3>Wat zeggen</h3>
				<h2>onze ouders en leerlingen</h2>
			</div>
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
                            if($tel < 5) :
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