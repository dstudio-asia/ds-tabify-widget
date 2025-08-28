<?php

// Elementor Classes
use \Elementor\Controls_Manager;

trait TabIconStyleTrait

{
	function uptabs_tab_icon_style($control){

		$this->start_controls_section(
			'uptabs_section_tab_icon_style',
			[
				'label' => esc_html__('Tab Icon', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'uptabs_tab_icon_size',
			[
				'label' => esc_html__('Icon Size', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				// 'range' => ['px' => ['min' => 10, 'max' => 100]],
				// 'default' => ['size' => 20, 'unit' => 'px'],

				'size_units' => ['px', '%', 'em', 'rem'],
				'default' => ['size' => 20, 'unit' => 'px'],
				'range' => [
					'px' => ['min' => 0, 'max' => 500],
					'em' => ['min' => 0, 'max' => 50],
					'rem' => ['min' => 0, 'max' => 50],
				],
				// 'render_type' => 'template',
				'selectors' => [
					// '{{WRAPPER}} .uptabs-tab-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-tab-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_responsive_control(
			'uptabs_tab_icon_spacing',
			[
				'label' => esc_html__('Icon Spacing', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				// 'range' => ['px' => ['min' => 0, 'max' => 50]],
				// 'default' => ['size' => 8, 'unit' => 'px'],

				'size_units' => ['px', '%', 'em', 'rem'],
				'default' => ['size' => 8, 'unit' => 'px'],
				'range' => [
					'px' => ['min' => 0, 'max' => 500],
					'em' => ['min' => 0, 'max' => 50],
					'rem' => ['min' => 0, 'max' => 50],
				],


				// 'render_type' => 'template',
				'selectors' => [
					// '{{WRAPPER}} .uptabs-tab-title-inner' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-tab-title-inner' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-icon-wrapper-top' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-icon-wrapper-bottom' => 'gap: {{SIZE}}{{UNIT}};',

				],
			]
		);

		// $this->add_responsive_control(
		// 	'tab_icon_position',
		// 	[
		// 		'label' => esc_html__('Direction', 'uptabs'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'horizontal' => ['title' => esc_html__('Top', 'uptabs'), 'icon' => 'eicon-v-align-top'],
		// 			'horizontal-bottom' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
		// 			'vertical-left' => ['title' => esc_html__('Left', 'uptabs'), 'icon' => 'eicon-h-align-left'],
		// 			'vertical-right' => ['title' => esc_html__('Right', 'uptabs'), 'icon' => 'eicon-h-align-right'],
		// 		],

		// 		'default' => 'horizontal',
		// 		'prefix_class' => 'uptabs-tabs-view-',
		// 		'render_type' => 'template',
		// 	]
		// );

		$this->add_responsive_control(
			'uptabs_tab_icon_position',
			[
				'label' => esc_html__('Icon Position', 'uptabs'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'top' => ['title' => esc_html__('Top', 'uptabs'), 'icon' => 'eicon-v-align-top'],
					'bottom' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
					'left' => ['title' => esc_html__('Left', 'uptabs'), 'icon' => 'eicon-h-align-left'],
					'right' => ['title' => esc_html__('Right', 'uptabs'), 'icon' => 'eicon-h-align-right'],
				],
				'render_type' => 'template',
				// 'selectors' => [
				// 	'{{WRAPPER}} .uptabs-icon-wrapper' => 'flex-direction: {{VALUE}};',
				// ],
			]
		);

		// $this->add_responsive_control(
		// 	'uptabs_tab_icon_position',
		// 	[
		// 		'label' => esc_html__('Icon Position', 'uptabs'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'default' => 'left',
		// 		'options' => [
		// 			'top' => [
		// 				'title' => esc_html__('Top', 'uptabs'),
		// 				'icon' => 'eicon-v-align-top',
		// 			],
		// 			'bottom' => [
		// 				'title' => esc_html__('Bottom', 'uptabs'),
		// 				'icon' => 'eicon-v-align-bottom',
		// 			],
		// 			'left' => [
		// 				'title' => esc_html__('Left', 'uptabs'),
		// 				'icon' => 'eicon-h-align-left',
		// 			],
		// 			'right' => [
		// 				'title' => esc_html__('Right', 'uptabs'),
		// 				'icon' => 'eicon-h-align-right',
		// 			],
		// 		],
		// 		'render_type' => 'template',
		// 		'selectors_dictionary' => [
		// 			'top' => 'flex-direction: column;',
		// 			'bottom' => 'flex-direction: column-reverse;',
		// 			'left' => 'flex-direction: row;',
		// 			'right' => 'flex-direction: row-reverse;',
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .uptabs-icon-wrapper' => '{{VALUE}}',
		// 		],
		// 	]
		// );



		$this->start_controls_tabs('tab_icon_colors');

		$this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => esc_html__('Normal', 'uptabs'),
			]
		);

		$this->add_control(
			'uptabs_tab_icon_color',
			[
				'label' => esc_html__('Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-tab-icon svg' => 'fill: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'uptabs_tab_icon_hover',
			[
				'label' => esc_html__('Hover', 'uptabs'),
			]
		);

		$this->add_control(
			'uptabs_tab_icon_hover_color',
			[
				'label' => esc_html__('Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-tab-title:hover .uptabs-tab-icon svg' => 'fill: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'uptabs_tab_icon_active',
			[
				'label' => esc_html__('Active', 'uptabs'),
			]
		);

		$this->add_control(
			'uptabs_tab_icon_active_color',
			[
				'label' => esc_html__('Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-tab-title.uptabs-active .uptabs-tab-icon svg' => 'fill: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}


}