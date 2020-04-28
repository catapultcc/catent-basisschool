<?php
/**
 * Template Name: Team
 */
get_header();

if (have_posts()) : while (have_posts()) : the_post();
?>

<?php include_once('includes/header-vervolg-intro.php'); ?>

<?php include_once('includes/header-vervolg-breadcrumbs.php'); ?>

<section id="team-overzicht" class="pt-3 pb-3 vlak-lichtgrijs">
	<div class="container">
		<div class="row">
		<?php
			$args_team = array (
				'post_type' 		=> 'team',
				'post_status' 		=> 'publish', 
				'orderby' 			=> 'menu_order',
				'order' 			=> 'ASC',
				'posts_per_page'	=> -1,
			);
			$query_team = new WP_Query( $args_team );
				if ($query_team->have_posts()) :
					$team_teller = 1;
					while ($query_team->have_posts()) :
						$query_team->the_post();
						if ( get_field('teamlid_foto') ):
							$hoofdAfbeeldingTeam = get_field('teamlid_foto');
							$sizeTeam = 'medium';
							$afbeeldingIDTeam = $hoofdAfbeeldingTeam['ID'];
							$afbeelding_altTeam = $hoofdAfbeeldingTeam['alt'];
							$afbeelding_arrayTeam = wp_get_attachment_image_src($afbeeldingIDTeam, $sizeTeam);
							$afbeelding_urlTeam = $afbeelding_arrayTeam[0];
						endif; ?>
						<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
							<div class="pr-2 pl-2 mb-5">
								<div class="row">
									<div class="col-12 afbeelding-team pb-3">
                                        <a data-fancybox="team2" data-src="#team-<?php echo $team_teller; ?>" href="javascript:;" class="team-klik2" >
                                        <img src="<?php echo $afbeelding_urlTeam; ?>" class="hoef team-img mt-3" alt="<?php echo $afbeelding_altTeam; ?>" width="100%"></a>
									</div>
									<div class="col-7 col-sm-6 col-xl-7">
										<h3 class="rem12 mt-2"><?php echo ucfirst(get_field('teamlid_voornaam')); ?></h3>
									</div>
									<div class="col-5 col-sm-6 col-xl-5 right">
										<a data-fancybox="team" data-src="#team-<?php echo $team_teller; ?>" href="javascript:void(0);" class="team-klik button button-secondair over">Over</a>
									</div>
                                  <div class="col-12 rem10"><?php echo ucfirst(get_field('teamlid_functie')); ?></div>
								</div>
								
								<div class="fancybox-team" style="display: none;" id="team-<?php echo $team_teller; ?>">
									<img src="<?php echo $afbeelding_urlTeam; ?>" class="mt-3" alt="<?php echo $afbeelding_altTeam; ?>" width="200">
								  	<div class="row team-info px-1 px-md-4 pb-5">
										<div class="col-12">
                                            <button data-fancybox-close="" class="fancybox-close-small sluit" title="Close"><i class="fas fa-times"></i></button>
											<h5><?php the_title(); ?></h5>
								  			<p><?php the_content(); ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
                    $team_teller ++;
					endwhile; 
				endif;
			wp_reset_postdata(); ?>
		</div>
		<div class="row">
			<div class="col-12">
				<?php $the_content = apply_filters('the_content', get_the_content());
				if ( !empty($the_content) ) {
					echo $the_content;
				} ?>
			</div>
		</div>
	</div>
</section>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>