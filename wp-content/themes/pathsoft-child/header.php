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
			
			<?php 
				$header_style = get_theme_mod('header_style', 'default');

				$header_class = 'header';				
				if($header_style == 'center') {
					$header_class .= ' header-center';
				}

			?>
			<!-- Begin header -->
			<header class="<?php echo esc_attr( $header_class ); ?>">
				<?php if($header_style == 'default') { 
					$header_top_mnu = get_theme_mod( 'header_top_mnu');
					$header_social = get_theme_mod( 'header_social');
				?>
				<!-- Begin header top -->
				<nav class="header-top">
					<div class="container">
						<div class="row align-items-center justify-content-between">
							<div class="col-auto">
								<?php if( $header_top_mnu ) { ?>
								<!-- Begin header top info -->
								<ul class="header-top-info">
									<?php foreach ($header_top_mnu as $mnu) { ?>
									<li>
										<?php if($mnu['style'] == 'email') { ?>
											<a href="<?php echo esc_attr('mailto:'. $mnu['value']) ?>">
												<?php if( isset( $mnu['icon'] ) ) { ?>
												<i class="material-icons md-18"><?php echo esc_html($mnu['icon']); ?></i>
												<?php } ?>
												<span><?php echo esc_html($mnu['value']); ?></span>
											</a>
										<?php } else if($mnu['style'] == 'phone') { ?>
											<a href="#!" class="formingHrefTel">
												<?php if( isset( $mnu['icon'] ) ) { ?>
												<i class="material-icons md-18"><?php echo esc_html($mnu['icon']); ?></i>
												<?php } ?>
												<span><?php echo esc_html($mnu['value']); ?></span>
											</a>
										<?php } else if($mnu['style'] == 'text') { ?>
											<div>
												<?php if( isset( $mnu['icon'] ) ) { ?>
												<i class="material-icons md-18"><?php echo esc_html($mnu['icon']); ?></i>
												<?php } ?>
												<span><?php echo esc_html($mnu['value']); ?></span>
											</div>	
										<?php } ?>
									</li>
									<?php } ?>
								</ul><!-- Ennd header top info -->
								<?php } ?>
							</div>
							<div class="col-auto">
								<div class="header-top-links">
									<?php if($header_social) { ?>
									<!-- Begin social links -->
									<ul class="social-links">
										<?php foreach ($header_social as $social) { 
											$id = $social['select'];	
										?>
										<li>
											<a href="<?php echo esc_url( $social['link'] ); ?>">
												<svg viewBox="<?php echo esc_attr( pathsoft_svg_viewBox($id) ); ?>"><use xlink:href="<?php echo esc_attr( get_template_directory_uri() . '/assets/img/sprite.svg#' . $id . '' ); ?>"></use></svg>
											</a>
										</li>
										<?php } ?>
									</ul><!-- End social links -->
									<?php } if ( true == get_theme_mod( 'popup_switch', true ) ) { ?>
									<div class="header-top-btn">
										<a href="#сallback_popup" class="header-call-back-link сallback_popup_open">
											<i class="material-icons"><?php echo esc_html(get_theme_mod( 'popup_icon', 'ring_volume' )); ?></i>
											<span><?php echo esc_html(get_theme_mod( 'popup_title_link', 'Callback' )); ?></span>
										</a>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</nav><!-- End header top -->
				<?php } if($header_style == 'center') { ?>
				<div class="header-logo-center d-none d-lg-block">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-auto">
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
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- Begin header fixed -->
				<nav class="header-fixed">
					<div class="container">
						<div class="row flex-nowrap align-items-center justify-content-between">
							<div class="col-auto d-block d-lg-none header-fixed-col header-s-open">
								<div class="main-mnu-btn">
									<span class="bar bar-1"></span>
									<span class="bar bar-2"></span>
									<span class="bar bar-3"></span>
									<span class="bar bar-4"></span>
								</div>
							</div>
							<?php 
								$col_class = 'col-auto header-fixed-col header-s-open';
								if($header_style == 'center') { 
									$col_class .= ' d-block d-lg-none';
								} ?>
							<div class="<?php echo esc_attr( $col_class ); ?>">
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
								<?php $row_class = "row flex-nowrap align-items-center";
									  if($header_style == 'center') {
										$row_class .= ' justify-content-between';
									  } else {
										$row_class .= ' justify-content-end';
									  }
								?>
								<div class="<?php echo esc_attr( $row_class ); ?>">
									<div class="col justify-content-center header-fixed-col d-none d-lg-flex col-static header-s-open">
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
									<?php  if($header_style == 'default' /*|| $header_style == 'center'*/) { ?>
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
									<?php }  ?>
									<div class="col-auto d-block d-lg-none col-static header-fixed-col">
										<div class="header-navbar">
											<div class="header-navbar-btn">
												<i class="material-icons md-24">more_vert</i>
											</div>
											<ul class="header-navbar-content">
												<?php if($header_top_mnu) { foreach ($header_top_mnu as $mnu) { ?>
												<li>
													<?php if($mnu['style'] == 'email') { ?>
														<a href="<?php echo esc_attr('mailto:'. $mnu['value']) ?>">
															<?php if( isset( $mnu['icon'] ) ) { ?>
															<i class="material-icons md-18"><?php echo esc_html($mnu['icon']); ?></i>
															<?php } ?>
															<span><?php echo esc_html($mnu['value']); ?></span>
														</a>
													<?php } else if($mnu['style'] == 'phone') { ?>
														<a href="#!" class="formingHrefTel">
															<?php if( isset( $mnu['icon'] ) ) { ?>
															<i class="material-icons md-18"><?php echo esc_html($mnu['icon']); ?></i>
															<?php } ?>
															<span><?php echo esc_html($mnu['value']); ?></span>
														</a>
													<?php } else if($mnu['style'] == 'text') { ?>
														<div>
															<?php if( isset( $mnu['icon'] ) ) { ?>
															<i class="material-icons md-18"><?php echo esc_html($mnu['icon']); ?></i>
															<?php } ?>
															<span><?php echo esc_html($mnu['value']); ?></span>
														</div>	
													<?php } ?>
												</li>
												<?php } } if ( true == get_theme_mod( 'popup_switch', true ) ) { ?>
												<li>
													<a href="#сallback_popup" class="header-call-back-link сallback_popup_open">
														<i class="material-icons"><?php echo esc_html(get_theme_mod( 'popup_icon', 'ring_volume' )); ?></i>
														<span><?php echo esc_html(get_theme_mod( 'popup_title_link', 'Callback' )); ?></span>
													</a>
												</li>
												<?php } if($header_social) { ?>
												<li>
													<!-- Begin social links -->
													<ul class="social-links">
														<?php foreach ($header_social as $social) { 
															$id = $social['select'];	
														?>
														<li>
															<a href="<?php echo esc_url( $social['link'] ); ?>">
																<svg viewBox="<?php echo esc_attr( pathsoft_svg_viewBox($id) ); ?>"><use xlink:href="<?php echo esc_attr( get_template_directory_uri() . '/assets/img/sprite.svg#' . $id . '' ); ?>"></use></svg>
															</a>
														</li>
														<?php } ?>
													</ul><!-- End social links -->
												</li>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</nav><!-- End header fixed -->
			</header><!-- End header -->
			
			<?php } 

$breadcrumbs = get_field('breadcrumbs');
if(is_author() || is_category() || is_single() || is_tag() || is_day() || is_month() || is_year() || is_author() || is_search() || is_archive() || is_tax()) {
	$breadcrumbs = true;
}
if (function_exists('pathsoft_breadcrumbs') && $breadcrumbs) pathsoft_breadcrumbs();
