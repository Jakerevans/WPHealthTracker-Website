<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Vendd
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'vendd' ); ?></a>

	<?php if ( ! vendd_is_checkout() && ! vendd_is_landing_page() && ( '' != get_theme_mod( 'vendd_info_bar' ) || 1 == get_theme_mod( 'vendd_info_bar_social_profiles' ) || has_nav_menu( 'info_bar' ) ) ) : ?>
		<div id="info-bar" class="info-bar">
			<div class="page-inner">
				<?php if ( '' != get_theme_mod( 'vendd_info_bar' ) ) : ?>
					<span class="info-bar-text"><?php echo get_theme_mod( 'vendd_info_bar' ); ?></span>
				<?php endif; ?>

				<?php
					if ( 1 == get_theme_mod( 'vendd_info_bar_social_profiles' ) ) {
						do_action( 'vendd_social_profiles' );
					}
				?>

				<?php if ( has_nav_menu( 'info_bar' ) ) : ?>
					<div id="info-bar-navigation" class="secondary-navigation" role="navigation">
						<?php
							wp_nav_menu( array(
								'theme_location'	=> 'info_bar',
								'menu_class'		=> 'info-bar-navigation',
								'fallback_cb'		=> '__return_false',
								'depth'				=> -1,
							) );
						?>
					<?php if ( vendd_edd_is_activated() && ! vendd_is_checkout() && ! vendd_is_landing_page() ) : ?>

						<?php if ( apply_filters( 'vendd_show_header_cart_info', true, $post ) ) : ?>
							<a href="<?php echo edd_get_checkout_uri(); ?>" class="header-cart">
								<i class="fa fa-shopping-cart"></i>
								<?php printf( __( 'Cart total: %s', 'vendd' ), '<span class="header-cart-total">' . edd_currency_filter( edd_format_amount( edd_get_cart_total() ) ) . '</span>' ); ?>
							</a>
						<?php endif; ?>
						
					<?php endif; ?>
					</div><!-- #info-bar-navigation -->
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		

	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="page-inner">
