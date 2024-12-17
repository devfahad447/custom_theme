<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qca_schools
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); 
	include 'assets/css/theme_options.php';
	?>
	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header" style="background-color:<?php echo get_option( "themecolorPicker")?>">
		<div class="container">
			<div class="inner">
				<div class="logo">
					<?php the_custom_logo(); ?>
				</div>	

				<!-- desktop menu -->
				<nav id="site-navigation" class="navbar__wrap d-lg-block d-none">
					<?php	
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
				</nav>

				<div class="header__cta d-lg-block d-none">
					<a href="<?php echo get_option( "headerBtnCTA")?>" class="header__cta--btn btn" >SCHEDULE STRATEGY SESSION</a>
				</div>

				<button id="mobile__menu--button" class="mobile-menu-button--collapse d-lg-none" type="button">
					<span class="mobile-menu-button-box">
						<span class="mobile-menu-button-inner"></span>
					</span>
				</button>
			</div>
		</div>

		<!-- mobile menu -->
		<nav id="mobile__menu" class="mob__menu d-lg-none">
			<div class="container text-center">
				<?php	
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
				<div class="header__cta">
					<a href="<?php echo get_option( "headerBtnCTA")?>" class="header__cta--btn btn">SCHEDULE STRATEGY SESSION</a>
				</div>
				
			</div>
		</nav>
		
	</header><!-- #masthead -->
