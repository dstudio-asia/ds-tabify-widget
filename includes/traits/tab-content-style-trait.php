<?php

// Elementor Classes
use \Elementor\Controls_Manager;

use Elementor\Group_Control_Border;

use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;

trait TabContentStyleTrait

{
	function uptabs_tab_content_style($control)
	{

		$control->add_responsive_control(
			'uptabs_content_align',
			[
				'label' => esc_html__('Alignment', 'elementor-addon'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'elementor-addon'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor-addon'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'elementor-addon'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [

					'{{WRAPPER}} .uptabs-card-left-section' => 'align-items: {{VALUE}};',

					// Conditional mapping for flex values
					'{{WRAPPER}}.elementor-align-left .uptabs-image-position-bottom .uptabs-card-content-wrapper' => 'align-items: flex-start;',
					'{{WRAPPER}}.elementor-align-center .uptabs-image-position-bottom .uptabs-card-content-wrapper' => 'align-items: center;',
					'{{WRAPPER}}.elementor-align-right .uptabs-image-position-bottom .uptabs-card-content-wrapper' => 'align-items: flex-end;',

					'{{WRAPPER}}.elementor-align-left .uptabs-image-position-top .uptabs-card-content-wrapper' => 'align-items: flex-start;',
					'{{WRAPPER}}.elementor-align-center .uptabs-image-position-top .uptabs-card-content-wrapper' => 'align-items: center;',
					'{{WRAPPER}}.elementor-align-right .uptabs-image-position-top .uptabs-card-content-wrapper' => 'align-items: flex-end;',

					// For left/right positions
					'{{WRAPPER}}.elementor-align-left .uptabs-image-position-left .uptabs-card-content-wrapper' => 'justify-content: flex-start;',
					'{{WRAPPER}}.elementor-align-center .uptabs-image-position-left .uptabs-card-content-wrapper' => 'justify-content: center;',
					'{{WRAPPER}}.elementor-align-right .uptabs-image-position-left .uptabs-card-content-wrapper' => 'justify-content: flex-end;',

					'{{WRAPPER}}.elementor-align-left .uptabs-image-position-right .uptabs-card-content-wrapper' => 'justify-content: flex-start;',
					'{{WRAPPER}}.elementor-align-center .uptabs-image-position-right .uptabs-card-content-wrapper' => 'justify-content: center;',
					'{{WRAPPER}}.elementor-align-right .uptabs-image-position-right .uptabs-card-content-wrapper' => 'justify-content: flex-end;',
				],
				'prefix_class' => 'elementor-align-',
			]
		);

		$this->add_control(
			'uptabs_content_vertical_alignment',
			[
				'label' => esc_html__('Vertical Align (Content)', 'uptabs'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__('Top', 'uptabs'),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__('Center', 'uptabs'),
						'icon' => 'eicon-v-align-middle',
					],
					'end' => [
						'title' => esc_html__('Bottom', 'uptabs'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'condition' => [
					'uptabs_image_postion!' => ['left', 'right'],
				],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-content-wrapper' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .uptabs-image-position-left .uptabs-card-content-wrapper' => 'align-items: {{VALUE}};',
				],

				'separator' => 'before',
			]
		);




		$control->add_control(
			'uptabs_content_bg_color',
			[
				'label' => esc_html__('Background Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-tab-content' => 'background-color: {{VALUE}};'],
			]
		);



		$control->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'uptabs_content_shadow',
				'selector' => '{{WRAPPER}} .uptabs-tab-content',
			]
		);



		$control->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'uptabs_content_border',
				'label' => __('Content Border', 'uptabs'),
				'selector' => '{{WRAPPER}} .uptabs-tab-content',
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
			'uptabs_content_border_radius',
			[
				'label' => esc_html__('Border Radius', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .uptabs-tab-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$control->add_responsive_control(
			'uptabs_content_padding',
			[
				'label' => esc_html__('Padding', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'top' => '20',
					'right' => '20',
					'bottom' => '20',
					'left' => '20',
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .uptabs-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$control->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'uptabs_content_box_shadow',
				'selector' => '{{WRAPPER}} .uptabs-tab-content',
			]
		);
	}
}
