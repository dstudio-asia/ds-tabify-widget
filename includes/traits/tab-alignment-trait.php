<?php

// Elementor Classes
use \Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

trait TabAlignmentTrait

{

	function uptabs_tab_alignment(){

		$this->add_responsive_control(
			'uptabs_tabs_position',
			[
				'label'       => esc_html__('Tab Position', 'uptabs'),
				'type'        => Controls_Manager::CHOOSE,
				'options'     => [
					'column'        => ['title' => esc_html__('Top', 'uptabs'),    'icon' => 'eicon-v-align-top'],
					'column-reverse' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
					'row'     => ['title' => esc_html__('Left', 'uptabs'),   'icon' => 'eicon-h-align-left'],
					'row-reverse'    => ['title' => esc_html__('Right', 'uptabs'),  'icon' => 'eicon-h-align-right'],
				],
				'default'     => 'column',
				// 'prefix_class' => 'uptabs-tabs-view-',
				'render_type' => 'template',
				'selectors'   => [
					// 1. Main flex-direction control
					'{{WRAPPER}} .uptabs-tabs-inner' => 'flex-direction: {{VALUE}};',
				],

			]
		);


		$this->add_responsive_control(
			'uptabs_tabs_justify',
			[
				'label' => esc_html__('Justify', 'uptabs'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__('Start', 'uptabs'),
						'icon' => 'eicon-align-start-h',
					],
					'center' => [
						'title' => esc_html__('Center', 'uptabs'),
						'icon' => 'eicon-align-center-h', // ✅ fixed icon
					],
					'end' => [
						'title' => esc_html__('End', 'uptabs'),
						'icon' => 'eicon-align-end-h',
					],
					'stretch' => [
						'title' => esc_html__('Stretch', 'uptabs'),
						'icon' => 'eicon-align-stretch-h',
					],
				],
				'default' => 'center',
				'prefix_class' => 'uptabs-tabs-align-', // ✅ applies alignment class
			]
		);

		$this->add_responsive_control(
			'uptabs_title_align',
			[
				'label' => esc_html__('Title Align', 'uptabs'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [

					'start' => ['title' => esc_html__('Start', 'uptabs'), 'icon' => 'eicon-text-align-left'],
					'center' => ['title' => esc_html__('Center', 'uptabs'), 'icon' => 'eicon-text-align-center'],
					'end' => ['title' => esc_html__('End', 'uptabs'), 'icon' => 'eicon-text-align-right'],

				],
				'default' => 'center',
				'selectors'   => [
					'{{WRAPPER}} .uptabs-tab-title'  => 'justify-content: {{VALUE}};',
				],


			]
		);

		$this->add_responsive_control(
			'uptabs_width',
			[
				'label' => esc_html__('Width', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => ['size' => 10, 'unit' => '%'],
				'range' => [
					'px' => ['min' => 10, 'max' => 500],
					'%' => ['min' => 10, 'max' => 50],
					'em' => ['min' => 1, 'max' => 50],
					'rem' => ['min' => 1, 'max' => 50],
				],
				'selectors' => [
					// '{{WRAPPER}}.uptabs-position-row .uptabs-tabs-inner > .uptabs-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}}; flex: 0 0 {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-row-reverse .uptabs-tabs-inner > .uptabs-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}}; flex: 0 0 {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-position-row .uptabs-tabs-wrapper, .uptabs-position-row-reverse .uptabs-tabs-wrapper' => 'flex-basis: {{SIZE}}{{UNIT}}'
				],
				'condition' => ['uptabs_tabs_position' => ['row', 'row-reverse']],
			]
		);
	}
}