		<?php if ( is_active_sidebar( 'after-content' ) ) : ?>
			<?php dynamic_sidebar( 'after-content' ); ?>
		<?php endif; ?>
	</main>

	<footer class="footer">
		<div class="footer-main">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 d-none d-sm-block">
						<figure class="footer-logo">
							<a class="d-flex flex-column" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php bloginfo( 'template_directory' ); ?>/i/logo-thumb.svg" width="120" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/i/logo-title.svg" width="120" alt="">
							</a>
						</figure>
					</div>

					<?php if ( is_active_sidebar( 'footer-menu-list' ) ) : ?>
						<?php dynamic_sidebar( 'footer-menu-list' ); ?>
					<?php endif; ?>

					<div class="col-md col-sm-4 col-6">
						<?php wp_nav_menu( array(
							'theme_location'  => 'footer_menu_1',
							'menu_class'      => 'footer-menu list-unstyled _important',
							'item_spacing'    => 'discard',
							'container_class' => 'footer-menu-container',
						) ); ?>

						<?php wp_nav_menu( array(
							'theme_location'  => 'footer_menu_2',
							'menu_class'      => 'footer-menu list-unstyled',
							'item_spacing'    => 'discard',
							'container_class' => 'footer-menu-container',
						) ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-sub">
			<div class="container">
				<div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-between">
					<div class="footer-copy"><?php echo esc_html( str_replace('%%year%%', date('Y'), get_option('resto_cr')) ) ?></div>

					<div class="footer-social-list navi-social-list">
						<a class="footer-social-item navi-social-item _bottom-fb ico" href="<?php echo esc_attr( get_option('resto_fb') ) ?>" title="Facebook">&nbsp;</a>
						<a class="footer-social-item navi-social-item _bottom-wa ico" href="<?php echo esc_attr( get_option('resto_wa') ) ?>" title="WhatsApp">&nbsp;</a>
						<a class="footer-social-item navi-social-item _bottom-in ico" href="<?php echo esc_attr( get_option('resto_im') ) ?>" title="Instagram">&nbsp;</a>
					</div>

					<?php $site_phone = get_option( 'resto_tel' ); ?>
					<div class="footer-phone d-none d-lg-block"><a class="navi-with-icon d-flex align-items-center tel" href="tel:<?php echo esc_attr( resto_get_phone_raw( $site_phone ) ); ?>"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="ico" fill="currentColor"><path d="m497.39 361.8-112-48a24 24 0 0 0 -28 6.9l-49.6 60.6a370.66 370.66 0 0 1 -177.19-177.19l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112a24.16 24.16 0 0 0 -27.5-13.9l-104 24a24 24 0 0 0 -18.6 23.39c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0 -14.01-27.6z"/></svg><span><?php echo esc_html( $site_phone ) ?></span></a></div>

					<?php $site_mail = get_option('resto_mail'); ?>
					<div class="footer-mail d-none d-sm-block"><a class="navi-with-icon d-flex align-items-center" href="mailto:<?php echo esc_attr( $site_mail ) ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ico" fill="currentColor"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg><span><?php echo esc_html( $site_mail ) ?></span></a></div>
					<div class="footer-callback d-none d-md-block"><span class="btn btn-sm btn-primary"><?php _e( 'Call Me!', 'resto' ) ?></span></div>
				</div>
			</div>
		</div>
	</footer>

	<?php if ( is_active_sidebar( 'sidebar-hidden' ) ) : ?>
		<div hidden>
			<?php dynamic_sidebar( 'sidebar-hidden' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( resto_is_show_ad() ) : ?>
		<?php echo get_option('resto_ac'); ?>
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>