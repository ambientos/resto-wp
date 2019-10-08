<?php
/**
 * weedgets Theme Customizer
 *
 * @package resto
 */

add_action('customize_register', function($wp_customize){

	/**
	 * Updating Settings type
	 * @var string
	 */

	$transport = 'refresh';


	/**
	 * Init customize data
	 */

	$customize_data = array(
		'transport' => $transport,
		'sections' => array(
			'resto_socials' => array(
				'panel' => '',
				'title' => __( 'Social Items', 'resto' ),
				'priority' => 50,
				'settings' => array(
					// WhatsApp
					'resto_wa' => array(
						'label' => __( 'WhatsApp', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Viber
					'resto_vb' => array(
						'label' => __( 'Viber', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Telegram
					'resto_tg' => array(
						'label' => __( 'Telegram', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Skype
					'resto_sk' => array(
						'label' => __( 'Skype', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Facebook
					'resto_fb' => array(
						'label' => __( 'Facebook', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Instagram
					'resto_im' => array(
						'label' => __( 'Instagram', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),
				),
			),
			'resto_settings' => array(
				'panel' => '',
				'title' => __( 'Extra Site Settings', 'resto' ),
				'priority' => 50,
				'settings' => array(
					// Mail General
					'resto_mail' => array(
						'label' => __( 'E-mail', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Phone
					'resto_tel' => array(
						'label' => __( 'Phone', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Copyrights
					'resto_cr' => array(
						'label' => __( 'Copyrights', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Checkbox ad
					'resto_ad_show' => array(
						'label' => __( 'Enable Advertisement and Analytics Code?', 'resto' ),
						'setting_type' => 'option',
						'control_type' => 'checkbox',
					),

					// Analytics
					'resto_ac' => array(
						'label' => __( 'Analytics Code', 'resto' ),
						'default_content' => '',
						'setting_type' => 'option',
						'control_type' => 'textarea',
					),
				),
			),
		),
	);


	/**
	 * Create customize options
	 */

	foreach ($customize_data['sections'] as $section_name => $section) {

		/**
		 * Add settings and controls
		 */

		foreach ($section['settings'] as $setting_name => $setting) {
			$wp_customize->add_setting(
				$setting_name,
				array(
					'type'      => $setting['setting_type'],
					'default'   => $setting['default_content'],
					'transport' => $customize_data['transport'],
				)
			);

			$wp_customize->add_control(
				$setting_name,
				array(
					'section' => $section_name,
					'label' => $setting['label'],
					'type' => $setting['control_type'],
				)
			);
		}

		/**
		 * Add sections
		 */

		$wp_customize->add_section(
			$section_name,
			array(
				'panel' => $section['panel'],
				'title' => $section['title'],
				'priority' => $section['priority'],
			)
		);
	}
});
