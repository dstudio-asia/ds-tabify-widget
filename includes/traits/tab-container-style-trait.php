<?php

// Elementor Classes
use \Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

trait TabContainerStyleTrait

{
	
	function uptabs_container_style($control){

		
		
		$control->add_responsive_control(
			'uptabs_tab_gap',
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
					// '{{WRAPPER}}.uptabs-position-column .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-column-reverse .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-row .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-row-reverse .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};'
					
				],
			]
		);

		$control->add_responsive_control(
			'uptabs_content_spacing',
			[
				'label' => esc_html__('Distance from content', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px','em', 'rem'],
				'range' => [
					'px' => ['min' => 0, 'max' => 400],
					'em' => ['min' => 0, 'max' => 40],
					'rem' => ['min' => 0, 'max' => 40],
				],
				'default' => ['size' => 20, 'unit' => 'px'],
			
					// '{{WRAPPER}}.uptabs-position-column .uptabs-tabs-inner' => 'gap: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-column-reverse .uptabs-tabs-inner' => 'gap: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-row .uptabs-tabs-inner' => 'gap: {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-row-reverse .uptabs-tabs-inner' => 'gap: {{SIZE}}{{UNIT}};',
					// For top/bottom positions (column layouts)
					'selectors'   => [
						'{{WRAPPER}} .uptabs-tabs-inner'  => 'gap: {{SIZE}}{{UNIT}};',
					],
				
				
			]
		);
	}
}