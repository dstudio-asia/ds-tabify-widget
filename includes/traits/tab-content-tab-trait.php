<?php

// Elementor Classes
use \Elementor\Controls_Manager;

use Elementor\Group_Control_Border;

use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;

trait TabContentTabTrait

{

	function uptabs_tab_content_tab(){

		$this->start_controls_section(
			'uptabs_section_content_tab',
			[
				'label' => esc_html__('Content Tab', 'marquee-addons-for-elementor'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'uptabs_tab_heading_tag',
			[
				'label' => esc_html__('Heading Tag', 'elementor-addon'),
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
			'uptabs_image_postion',
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

				// 'prefix_class' => 'uptabs-image-position-'
			]
		);

		$this->add_responsive_control(
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
					'uptabs_image_postion' => ['left', 'right'],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-content-wrapper' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .uptabs-image-position-left .uptabs-card-content-wrapper' => 'align-items: {{VALUE}};',
				],

			]
		);




		$this->end_controls_section();
	}


}