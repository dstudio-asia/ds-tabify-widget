<?php

// Elementor Classes
use \Elementor\Controls_Manager;


use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Border;
trait TabTitleStyleTrait

{
	function uptabs_tab_title_style($control){


		$this->start_controls_tabs('tabs_title_style');
		


		// Normal Tab
		$control->start_controls_tab(
			'uptabs_tab_title_normal',
			[
				'label' => esc_html__('Normal', 'uptabs'),
			]
		);

		$control->add_control(
			'uptabs_tab_bg_color',
			[
				'label' => esc_html__('Background Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-tab-title' => 'background-color: {{VALUE}};'],
			]
		);

		$control->add_control(
			'uptabs_tab_text_color',
			[
				'label' => esc_html__('Text Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-tab-title' => 'color: {{VALUE}};'],
			]
		);

		$control->end_controls_tab();

		// Hover Tab
		// Hover Tab
		$control->start_controls_tab(
			'uptabs_tab_title_hover',
			[
				'label' => esc_html__('Hover', 'uptabs'),
			]
		);

		$control->add_control(
			'uptabs_tab_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// apply on hover/focus-visible ONLY if not active
					'{{WRAPPER}} .uptabs-tab-title:not(.uptabs-active):hover'         => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .uptabs-tab-title:not(.uptabs-active):focus-visible' => 'background-color: {{VALUE}};',
				],
			]
		);

		$control->add_control(
			'uptabs_tab_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uptabs-tab-title:not(.uptabs-active):hover'                          => 'color: {{VALUE}};',
					'{{WRAPPER}} .uptabs-tab-title:not(.uptabs-active):hover .uptabs-tab-title-text'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .uptabs-tab-title:not(.uptabs-active):hover .uptabs-tab-icon svg'    => 'fill: {{VALUE}};',
					'{{WRAPPER}} .uptabs-tab-title:not(.uptabs-active):focus-visible'                 => 'color: {{VALUE}};',
					'{{WRAPPER}} .uptabs-tab-title:not(.uptabs-active):focus-visible .uptabs-tab-title-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .uptabs-tab-title:not(.uptabs-active):focus-visible .uptabs-tab-icon svg'   => 'fill: {{VALUE}};',
				],
			]
		);

		$control->end_controls_tab();


		// Active Tab
		// Active Tab
		$control->start_controls_tab(
			'uptabs_tab_title_active',
			[
				'label' => esc_html__('Active', 'uptabs'),
			]
		);

		$control->add_control(
			'uptabs_tab_active_bg_color',
			[
				'label' => esc_html__('Background Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uptabs-tab-title.uptabs-active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$control->add_control(
			'uptabs_tab_active_text_color',
			[
				'label' => esc_html__('Text Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .uptabs-tab-title.uptabs-active'                         => 'color: {{VALUE}};',
					'{{WRAPPER}} .uptabs-tab-title.uptabs-active .uptabs-tab-title-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .uptabs-tab-title.uptabs-active .uptabs-tab-icon svg'   => 'fill: {{VALUE}};',
				],
			]
		);

		$control->end_controls_tab();

		$control->end_controls_tabs();

		// $control->add_group_control(
		// 	Group_Control_Border::get_type(),
		// 	[
		// 		'name' => 'uptabs_tab_border',
		// 		'selector' => '{{WRAPPER}} .uptabs-tab-title',
		// 	]
		// );

		$control->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'uptabs_tab_typography',
				'selector' => '{{WRAPPER}} .uptabs-tab-title',
			]
		);

		$control->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'uptabs_title_shadow',
				'selector' => '{{WRAPPER}} .uptabs-tab-title',
			]
		);

		$control->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'uptabs_text_stroke',
				'selector' => '{{WRAPPER}} .uptabs-tab-title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'uptabs_tab_border',
				'label' => __('Content Border', 'uptabs'),
				'selector' => '{{WRAPPER}} .uptabs-tab-title',
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width' => [
						'default' => [
							'top' => 1,
							'right' => 1,
							'bottom' => 1,
							'left' => 1,
							'isLinked' => true,
						],
					],
					'color' => [
						'default' => '#000000',
					],
				],
			]
		);

		$control->add_control(
			'uptabs_tab_border_radius',
			[
				'label' => esc_html__('Border Radius', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .uptabs-tab-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$control->add_responsive_control(
			'uptabs_tab_padding',
			[
				'label' => esc_html__('Padding', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'unit' => 'px',
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .uptabs-tab-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

	

		$this->end_controls_section();


	}

}