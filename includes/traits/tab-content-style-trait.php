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

		$this->start_controls_section(
			'uptabs_section_tab_content_style',
			[
				'label' => esc_html__('Tab Content', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
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
		$control->add_responsive_control(
			'uptabs_content_margin',
			[
				'label' => esc_html__('Margin', 'uptabs'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
					
				],
				'selectors' => [
					'{{WRAPPER}} .uptabs-tab-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$this->end_controls_section();
	}
}
