<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package RazorAndTie
 * @since RazorAndTie 0.1
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title>
            <?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;
            
            wp_title( '|', true, 'right' );
            
            // Add the blog name.
            bloginfo( 'name' );
            
            // Add the blog description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
                echo " | $site_description";
            
            ?>
        </title>
        <meta name="description" content="<?php echo $site_description; ?>" />
        <link type="text/plain" rel="author" href="/humans.txt" />
        <!-- ========== Favicons for all platforms -->
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
        <link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196">
        <link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <meta name="msapplication-TileColor" content="#f3f3f3">
        <meta name="msapplication-TileImage" content="/mstile-144x144.png">
        <!-- ========== Allow to conform to mobile screens -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:600,800|Maven+Pro:900,700' rel='stylesheet' type='text/css'>        
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/style.css" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        
        <?php wp_enqueue_scripts(); ?>
        
        <?php wp_head(); ?>
        
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/modernizr.2.7.2.min.js"></script>
        
        <script type="text/javascript">
            var templateDirectoryUrl = '<?php echo get_template_directory_uri(); ?>';
            var siteUrl = '<?php echo get_site_url(); ?>';
        </script>
        
        <?php
            if( is_single() ) {
                
                $title = get_the_title();
                $band = rawurlencode(strtolower($title));
        ?>
            <script type="text/javascript">
                // Tour Dates variables
                var currentBand = '<?php echo $band; ?>';
                var currentID = '<?php echo $post->ID; ?>';
            </script>
        <?php
            }
        ?>
    </head>
    
    <body <?php body_class();?>>
    
    <?php include_once('analytics/ga.php'); ?>
    
    <div id="page">
        <header id="branding" role="banner">
          <div class="section-inner">
            <div id="logo">
                <h1 id="site-title">
                    <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></span></a>
                </h1>
            </div>
            <!-- Nav Toggle -->
            <div id="nav-trigger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span id="nav-close"></span>
            <nav id="main-menu" role="navigation">
                <?php
                    // default menu
                    wp_nav_menu( array( 'theme_location' => 'primary' ) );
                ?>
            </nav>
          </div>
        </header>
        
        <div id="main">