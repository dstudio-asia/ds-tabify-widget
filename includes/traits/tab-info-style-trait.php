<?php

// Elementor Classes
use \Elementor\Controls_Manager;

use Elementor\Group_Control_Border;

use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

trait TabInfoStyleTrait

{
	function uptabs_tab_info_style()
	{

		// ===========================================
		// STYLE TAB: IMAGE
		// ===========================================
		$this->start_controls_section(
			'uptabs_section_image_style',
			[
				'label' => esc_html__('Image', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_responsive_control(
			'uptabs_image_width',
			[
				'label' => esc_html__('Image Width', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => ['min' => 100, 'max' => 1000, 'step' => 5],
					'%' => ['min' => 10, 'max' => 100],
				],
				'mobile_default' => [
					'size' => 100,
					'unit' => '%',
				],
				'default'    => [
					'size' => 40,
					'unit' => '%',
				],

				'selectors' => [
					'{{WRAPPER}} .uptabs-card-image' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'uptabs_image_border_radius',
				'label' => __('Content Border', 'uptabs'),
				'selector' => '{{WRAPPER}} .uptabs-card-image img',
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

		$this->add_control(
			'uptabs_image_border_radius',
			[
				'label' => esc_html__('Border Radius', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}}  .uptabs-card-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'selector' => '{{WRAPPER}} .uptabs-card-image img',
			]
		);

		$this->add_responsive_control(
			'uptabs_image_spacing',
			[
				'label' => esc_html__('Spacing', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 100]],
				'selectors' => [
					'{{WRAPPER}} .uptabs-image-position-left .uptabs-card-image' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-image-position-right .uptabs-card-image' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-image-position-top .uptabs-card-image' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-image-position-bottom .uptabs-card-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: HEADING
		// ===========================================
		$this->start_controls_section(
			'uptabs_section_heading_style',
			[
				'label' => esc_html__('Heading', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->add_control(
			'uptabs_heading_color',
			[
				'label' => esc_html__('Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-header' => 'color: {{VALUE}};'],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'uptabs_heading_typography',
				'selector' => '{{WRAPPER}} .uptabs-header',
			]
		);

		$this->add_responsive_control(
			'uptabs_heading_spacing',
			[
				'label' => esc_html__('Spacing', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 500]],
				'selectors' => [
					'{{WRAPPER}} .uptabs-header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: DESCRIPTION
		// ===========================================
		$this->start_controls_section(
			'uptabs_section_description_style',
			[
				'label' => esc_html__('Description', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'uptabs_description_color',
			[
				'label' => esc_html__('Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-description' => 'color: {{VALUE}};'],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'uptabs_description_typography',
				'selector' => '{{WRAPPER}} .uptabs-card-description',
			]
		);

		$this->add_responsive_control(
			'uptabs_description_spacing',
			[
				'label' => esc_html__('Spacing', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 500]],
				'default' => ['size' => 20, 'unit' => 'px'],
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: BUTTON
		// ===========================================
		$this->start_controls_section(
			'uptabs_section_button_style',
			[
				'label' => esc_html__('Button', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs('tabs_button_style');

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__('Normal', 'uptabs'),
			]
		);

		$this->add_control(
			'uptabs_button_text_color',
			[
				'label' => esc_html__('Text Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-button' => 'color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'uptabs_button_bg_color',
			[
				'label' => esc_html__('Background Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'default' => '#54595F',
				'selectors' => ['{{WRAPPER}} .uptabs-card-button' => 'background-color: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'uptabs_tab_button_hover',
			[
				'label' => esc_html__('Hover', 'uptabs'),
			]
		);

		$this->add_control(
			'uptabs_button_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-button:hover' => 'color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'uptabs_button_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-button:hover' => 'background-color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'uptabs_button_hover_border_color',
			[
				'label' => esc_html__('Border Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-button:hover' => 'border-color: {{VALUE}};'],
				'condition' => ['button_border_border!' => ''],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'uptabs_button_typography',
				'selector' => '{{WRAPPER}} .uptabs-card-button',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'uptabs_button_border',
				'selector' => '{{WRAPPER}} .uptabs-card-button',
			]
		);

		$this->add_control(
			'uptabs_button_border_radius',
			[
				'label' => esc_html__('Border Radius', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'uptabs_button_padding',
			[
				'label' => esc_html__('Padding', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'uptabs_button_margin',
			[
				'label' => esc_html__('Margin', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	
	}
}
