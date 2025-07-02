<?php

// Elementor Classes
use \Elementor\Controls_Manager;

use Elementor\Group_Control_Border;

use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

trait TabInfoStyleTrait

{
	function uptabs_tab_info_style($control)
	{


		// ===========================================
		// STYLE TAB: HEADING
		// ===========================================
		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__('Heading', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'uptabs_tab_heading_tag',
			[
				'label' => esc_html__('HTML Tag', 'elementor-addon'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-heading' => 'color: {{VALUE}};'],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .uptabs-card-heading',
			]
		);

		$this->add_responsive_control(
			'heading_spacing',
			[
				'label' => esc_html__('Spacing', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 500]],
				'selectors' => [
					'{{WRAPPER}} .uptab-header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: DESCRIPTION
		// ===========================================
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => esc_html__('Description', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-description' => 'color: {{VALUE}};'],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .uptabs-card-description',
			]
		);

		$this->add_responsive_control(
			'description_spacing',
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
			'section_button_style',
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
			'button_text_color',
			[
				'label' => esc_html__('Text Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-button' => 'color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-button' => 'background-color: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__('Hover', 'uptabs'),
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-button:hover' => 'color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'uptabs'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .uptabs-card-button:hover' => 'background-color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'button_hover_border_color',
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
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .uptabs-card-button',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .uptabs-card-button',
			]
		);

		$this->add_control(
			'button_border_radius',
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
			'button_padding',
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
			'button_margin',
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

		// ===========================================
		// STYLE TAB: IMAGE
		// ===========================================
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__('Image', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'image_position',
			[
				'label' => esc_html__('Image Position', 'uptabs'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'right' => ['title' => esc_html__('Left', 'uptabs'), 'icon' => 'eicon-h-align-left'],
					'left' => ['title' => esc_html__('Right', 'uptabs'), 'icon' => 'eicon-h-align-right'],
					'bottom' => ['title' => esc_html__('Top', 'uptabs'), 'icon' => 'eicon-v-align-top'],
					'top' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
				],
				'default' => 'left',
				'toggle' => true,

				// 'prefix_class' => 'image-position-'
			]
		);

		$this->add_control(
			'image_width',
			[
				'label' => esc_html__('Image Width', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => ['min' => 100, 'max' => 1000, 'step' => 5],
					'%' => ['min' => 10, 'max' => 100],
				],
				'default' => ['unit' => '%', 'size' => 40],
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-image' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => esc_html__('Border Radius', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .uptabs-card-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => esc_html__('Border Radius', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'image_spacing',
			[
				'label' => esc_html__('Spacing', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 100]],
				'selectors' => [
					'{{WRAPPER}} .image-position-left .uptabs-card-image' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .image-position-right .uptabs-card-image' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .image-position-top .uptabs-card-image' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .image-position-bottom .uptabs-card-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}
}
