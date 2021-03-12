<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<title><?php bloginfo('name'); ?></title>
    
<?php wp_head(); ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<div style="background-color:red; color:#ffffff; padding: 25px; position:fixed; z-index:99999; width:100%;">

	<p>Helaas kunnen wij uw browser niet ondersteunen.</p>

	<p>Het is nodig om uw browser te updaten naar een nieuwe versie!</p><a href="http://windows.microsoft.com/nl-nl/internet-explorer/download-ie">UPDATE NU</a></div>
<![endif]--> 
    
<!-- SCRIPTS INLADEN IVM AVG -->
<?php
if ( in_array( 'cc-dashboard/cc-dashboard.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
  if ( get_theme_mod( "cookie_melding_v2" ) ) {
    require_once ABSPATH . '/wp-content/plugins/cc-dashboard/koekje.php';
  }
}
?>

<!-- SCRIPTS INLADEN IVM AVG -->
<?php if (get_theme_mod("google_tagmanager_code")) { ?>
<!-- Google Tag Manager --> 
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo get_theme_mod("google_tagmanager_code");?>');</script> 
<!-- End Google Tag Manager -->
<?php } ?>
</head>

<body <?php if(is_home() || is_front_page()) { echo 'class="home-body" '; } ?>>
    
<?php if (get_theme_mod("google_tagmanager_code")) { ?>
<!-- Google Tag Manager (noscript) -->
<noscript>
<iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_theme_mod("google_tagmanager_code");?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<?php } ?>
    
<div id="preloader"></div>
    
<div id="menuTop" class="pos-f-t fixed-top vlak-wit">
    <div class="container">
        <div class="row"> <a class="navbar-brand" href="<?php echo home_url(); ?>"> <img class="headerlogo hoef" src="<?php echo get_theme_mod( 'eigen_logo' ); ?>" alt="<?php bloginfo('name'); ?>"> </a>
      
            <div class="topinfo"> <a href="tel:<?php echo get_field('telefoonnummer', 'option'); ?>" class="tekst-secondair d-none d-lg-inline-block" onclick="gtag('event', 'Klik', { event_category:  'Header', event_action: 'Telefoonnummer'});">T. <?php echo get_field('telefoonnummer', 'option'); ?></a> 

                <span class="social-icons-header">
                    <!-- ICON FACEBOOK -->
                    <?php if(get_field('social_media_facebook', 'option')) : ?>
                    <a href="<?php echo get_field('social_media_facebook', 'option'); ?>" target="_blank" class="d-none d-lg-inline-block"  onclick="gtag('event', 'Klik', { event_category:  'Header', event_action: 'Facebook'});"> <span class="fa-stack fa-2x tekst-secondair" style="margin-top:-8px"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i> </span> </a>
                    <?php endif; ?>
                    <!-- ICON LINKEDIN -->
                    <?php if(get_field('social_media_linkedin', 'option')) : ?>
                    <a href="<?php echo get_field('social_media_linkedin', 'option'); ?>" target="_blank" class="d-none d-lg-inline-block"  onclick="gtag('event', 'Klik', { event_category:  'Header', event_action: 'Linkedin'});"> <span class="fa-stack fa-2x tekst-secondair" style="margin-top:-8px"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i> </span> </a>
                    <?php endif; ?>
                    <!-- ICON TWITTER -->
                    <?php if(get_field('social_media_twitter', 'option')) : ?>
                    <a href="<?php echo get_field('social_media_twitter', 'option'); ?>" target="_blank" class="d-none d-lg-inline-block" onclick="gtag('event', 'Klik', { event_category:  'Header', event_action: 'Twitter'});"> <span class="fa-stack fa-2x tekst-secondair" style="margin-top:-8px"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fab fa-twitter fa-stack-1x fa-inverse"></i> </span> </a>
                    <?php endif; ?>
                    <!-- ICON TELEFOON -->
                    <a href="tel:<?php echo get_field('telefoonnummer', 'option'); ?>" target="_blank" class="d-inline-block d-lg-none" onclick="gtag('event', 'Klik', { event_category:  'Header', event_action: 'Telefoon'});"> <span class="fa-stack fa-2x tekst-secondair" style="margin-top:-8px"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fas fa-phone fa-stack-1x fa-inverse"></i> </span> </a>
                    <!-- ICON SEARCH -->
                    <button data-toggle="modal" data-target="#searchModal"  onclick="gtag('event', 'Klik', { event_category:  'Header', event_action: 'Zoekfunctie'});"> <span class="fa-stack fa-2x tekst-secondair" style="margin-top:-8px"> <i class="fa fa-circle fa-stack-2x"></i> <i class="far fa-search fa-stack-1x fa-inverse"></i> </span> </button>
                </span> 

                <a href="<?php echo home_url(); ?>/contact" class="button button-secondair mt-2 mb-5 d-none d-md-inline-block" style="margin-left: 15px; display: inline;"  onclick="gtag('event', 'Klik', { event_category:  'Header', event_action: 'Contact'});">Contact <i class="fal fa-long-arrow-right"></i></a> 
            </div>
        
            <label>
                <input type="checkbox">
                <span id="uitklapper" class="menu"> <span class="hamburger"></span> </span>
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container'=> false, 'menu_class'=> false, 'menu_id'=> 'menu-1','items_wrap' => '<ul class="hoofdmenu">%3$s</ul>' ) ); ?>
            </label>
        </div>
    </div>
    
    <div class="sub-header d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <?php wp_nav_menu( array( 'theme_location' => 'second-header-menu', 'container'=> false, 'menu_class'=> false, 'menu_id'=> 'menu-2','items_wrap' => '<ul class="second-menu">%3$s</ul>' ) ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zoeken...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <div id="zoekveld">
          <?php include('searchform.php'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
