<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="format-detection" content="telephone=no" />
<meta name="format-detection" content="address=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header">
		<div class="container">
			<div class="header-container">
				<div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-between">
					<figure class="header-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img class="header-logo-thumb" src="<?php bloginfo( 'template_directory' ); ?>/i/logo-thumb.svg" width="60" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img class="header-logo-title" src="<?php bloginfo( 'template_directory' ); ?>/i/logo-title.svg" width="80" alt="">
						</a>
					</figure>

					<div class="header-callback d-none d-lg-block">
						<span class="btn btn-primary" data-fancybox data-src="#popup-callback"><?php _e( 'Call Me!', 'resto' ) ?></span>
					</div>

					<div class="header-phone d-none d-sm-block">
						<?php $site_phone = get_option('resto_tel'); ?>
						<a class="navi-with-icon d-flex align-items-center tel" href="tel:<?php echo esc_attr( resto_get_phone_raw( $site_phone ) ); ?>"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="ico" fill="currentColor"><path d="m497.39 361.8-112-48a24 24 0 0 0 -28 6.9l-49.6 60.6a370.66 370.66 0 0 1 -177.19-177.19l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112a24.16 24.16 0 0 0 -27.5-13.9l-104 24a24 24 0 0 0 -18.6 23.39c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0 -14.01-27.6z"/></svg><span class="header-phone-text"><?php echo esc_html( $site_phone ); ?></span></a>
					</div>

					<div class="header-social-list navi-social-list">
						<?php if ( ! empty(get_option('resto_wa')) ) : ?>
							<a class="header-social-item navi-social-item _top-wa ico" href="<?php echo esc_attr( get_option('resto_wa') ); ?>" title="WhatsApp">&nbsp;</a>
						<?php endif; ?>

						<?php if ( ! empty(get_option('resto_tg')) ) : ?>
							<a class="header-social-item navi-social-item _top-tg ico" href="<?php echo esc_attr( get_option('resto_tg') ); ?>" title="Telegram">&nbsp;</a>
						<?php endif; ?>

						<?php if ( ! empty(get_option('resto_sk')) ) : ?>
							<a class="header-social-item navi-social-item _top-sk ico" href="<?php echo esc_attr( get_option('resto_sk') ); ?>" title="Skype">&nbsp;</a>
						<?php endif; ?>
					</div>

					<div class="header-cart _cart-mini ico d-flex align-items-center">
						<?php resto_header_cart(); ?>
					</div>
				</div>
			</div>
		</div>
		<nav class="header-nav navbar navbar-dark navbar-expand-lg">
			<div class="container">
				<div class="header-nav-toggler d-flex d-lg-none justify-content-end">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo esc_attr( 'Toggle navigation', 'resto' ) ?>"><span class="navbar-toggler-icon"></span></button>
				</div>

				<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
					<?php wp_nav_menu( array(
						'theme_location'  => 'main_menu',
						'menu_class'      => 'header-nav-list navbar-nav',
						'item_spacing'    => 'discard',
						'container_class' => false,
						'walker'          => new bs4navwalker(),
					) ); ?>

					<form class="header-nav-search form-inline" action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" role="search">
						<input type="text" class="form-control" name="s" value="" placeholder="<?php _e( 'Search', 'resto' ) ?>">
						<button class="btn btn-ico" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ico _search" fill="currentColor"><path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path></svg></button>
					</form>
				</div>
			</div>
		</nav>
	</header>

	<main class="main">
