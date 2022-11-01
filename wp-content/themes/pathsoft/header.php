<?php
/**
 * The header for our theme
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<main class="main">
		
		<div class="main-inner">

			<?php if(!is_404()) { ?>

			<nav class="mob-main-mnu">
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_class' => 'mob-main-mnu-content',
						'container_id'    => '',
						'menu_class'      => 'mob-main-mnu-list',
						'fallback_cb'     => '',
						'menu_id'         => '',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker_Mobile(),
					)
				); ?>
			</nav>

			<!-- Begin header -->
			<header class="header">
				<!-- Begin header fixed -->
				<nav class="header-fixed">
					<div class="container">
						<div class="row flex-nowrap align-items-center justify-content-between">
							<div class="col-auto d-block d-lg-none header-fixed-col">
								<div class="main-mnu-btn">
									<span class="bar bar-1"></span>
									<span class="bar bar-2"></span>
									<span class="bar bar-3"></span>
									<span class="bar bar-4"></span>
								</div>
							</div>
							<div class="col-auto header-fixed-col">
								<?php if ( ! has_custom_logo() ) { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
										<?php bloginfo( 'name' ); ?>
									</a>
								<?php } else { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
										<?php the_custom_logo(); ?>
									</a>
								<?php } ?>
							</div>
							<div class="col-lg col-auto col-static header-fixed-col">
								<div class="row flex-nowrap align-items-center justify-content-end">
									<div class="col justify-content-center header-fixed-col d-none d-lg-flex col-static">
										<?php wp_nav_menu(
											array(
												'theme_location'  => 'primary',
												'container'       => 'nav',
												'container_class' => 'main-mnu',
												'container_id'    => '',
												'menu_class'      => 'main-mnu-list',
												'fallback_cb'     => '',
												'menu_id'         => '',
												'depth'           => 2,
												'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
											)
										); ?>
									</div>
									<div class="col-auto header-fixed-col col-static">
										<!-- Begin header search -->
										<div class="header-search">
											<div class="header-search-ico">
												<i class="material-icons md-22 header-search-ico-search">search</i>
												<i class="material-icons md-22 header-search-ico-close">close</i>
											</div>
											<form method="get" class="header-search-form" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
												<div class="container">
													<div class="row">
														<div class="col-12">
															<div class="form-field">
																<label for="field-search" class="form-field-label"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
																<input class="form-field-input" id="field-search" name="s" type="text" autocomplete="off" value="<?php the_search_query(); ?>">
																<button name="submit" type="submit" class="header-search-btn"><i class="material-icons md-22">search</i></button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div><!-- End header search -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</nav><!-- End header fixed -->
			</header><!-- End header -->
			
			<?php } 

if (function_exists('pathsoft_breadcrumbs') && !is_front_page()) pathsoft_breadcrumbs();
