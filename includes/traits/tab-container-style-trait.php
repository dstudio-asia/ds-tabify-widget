<?php

// Elementor Classes
use \Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

trait TabContainerStyleTrait

{
	function uptabs_container_style($control){
		
		$control->add_responsive_control(
			'tab_gap',
			[
				'label' => esc_html__('Gap Between Tabs', 'uptabs'),
				'type' => Controls_Manager::SLIDER,

				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => ['size' => 15, 'unit' => 'px'],
				'range' => [
					'px' => ['min' => 0, 'max' => 500],
					'em' => ['min' => 0, 'max' => 50],
					'rem' => ['min' => 0, 'max' => 50],
				],

				'selectors' => [
					'{{WRAPPER}}.uptabs-tabs-view-horizontal .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.uptabs-tabs-view-horizontal-bottom .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.uptabs-tabs-view-vertical-left .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.uptabs-tabs-view-vertical-right .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$control->add_responsive_control(
			'content_spacing',
			[
				'label' => esc_html__('Distance from content', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 100]],
				'default' => ['size' => 0, 'unit' => 'px'],
				'selectors' => [
					'{{WRAPPER}}.uptabs-tabs-view-horizontal .uptabs-tabs-inner' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.uptabs-tabs-view-horizontal-bottom .uptabs-tabs-inner' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.uptabs-tabs-view-vertical-left .uptabs-tabs-inner' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.uptabs-tabs-view-vertical-right .uptabs-tabs-inner' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
	}
}