<footer class="">

    <div class="menu-footer vlak-groen tekst-zwart pt-4 pb-5">

        <div class="container-fluid">

            <div class="container"> 

                <div class="row">

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 pr-md-4 mb-5 mb-md-0">

						<div class="row">

							<div class="col-12">

								<h5 class="tekst-zwart mt-3 mb-3"><?php echo get_field('footer_kop', 'option'); ?></h5>

							</div>

							<div class="col-12 mb-3">

								<?php echo get_field('footer_tekst', 'option'); ?>

							</div>

							<div class="col-6 col-md-4">

                                <a href="https://www.catent.nl" target="_blank" onclick="gtag('event', 'Klik', { event_category:  'Footer', event_action: 'Catent'});">

                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/catent_logo_payoff.svg" alt="Stichting Catent Logo" width="90%"></a>

							</div>

							<div class="col-6 col-md-8 social-icons">

								<a class="m-0" href="https://www.linkedin.com/company/catent" target="_blank" onclick="gtag('event', 'Klik', { event_category:  'Footer', event_action: 'Linkedin'});">

									<span class="fa-stack fa-2x">

										<i class="fa fa-circle fa-stack-2x"></i>

										<i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>

									</span>

								</a>

							</div>

						</div>	

                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3  mb-5 mb-md-0">

                        <h5 class="tekst-zwart mt-3 mb-3">Contact</h5>

                        <div>

                             <?php echo get_field('footer_contact', 'option'); ?>

                        </div>

                        <p><a href="<?php echo get_field('google_maps_link', 'option'); ?>" target="_blank" class="button button-secondair" onclick="gtag('event', 'Klik', { event_category:  'Footer', event_action: 'Route'});">Route <i class="fal fa-long-arrow-right"></i></a></p>

                    </div>

                    

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3"> 

                        <h5 class="tekst-zwart mt-3 mb-3">Kennismaken</h5>

                        <div>

                            <?php echo get_field('footer_kennismaken', 'option'); ?>

                        </div>

                        <p><a href="<?php echo home_url();?>/contact/"  class="button button-secondair" onclick="gtag('event', 'Klik', { event_category:  'Footer', event_action: 'Contact'});">Maak een afspraak <i class="fal fa-long-arrow-right"></i></a></p>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="container-fluid pt-4 pt-md-2 pb-2 vlak-wit copyright"> 

        <div class="container">

            <div class="row">

                <div class="col-12 col-sm-6">

                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container'=> false, 'menu_class'=> false, 'menu_id'=> 'menu-footer','items_wrap' => '<ul class="footermenu">%3$s</ul>' ) ); ?>

                </div>

                <div class="col-12 col-sm-6 text-left text-md-right">

                    <p class="m-0"><?php 
                        if(get_field('footer_extra_copyright', 'option') != '') :
                        echo get_field('footer_extra_copyright', 'option'); 
                        endif;?> Ontwerp en realisatie: <a href="https://www.catapult.nl" style="color: #000;" onclick="gtag('event', 'Klik', { event_category:  'Footer', event_action: 'Catapult'});"><u>Catapult creëert</u></a></p>

					<br class="d-block d-md-none">

                </div>

            </div>

        </div>

    </div>

</footer>



<a href="#0" class="hoef cd-top">

	<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="20" height="20" version="1.1">

   		<path stroke="white" fill = "white" stroke-width="1" d="M0 16.67l2.829 2.83 9.175-9.339 9.167 9.339 2.829-2.83-11.996-12.17z"/>

	</svg>

</a>



<?php wp_footer(); ?>



</body>

</html>